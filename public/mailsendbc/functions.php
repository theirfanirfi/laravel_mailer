<?php

require_once __DIR__ . '/mailer.php';


sendshit();





function getTodayLogFile(){
    clearOldLogs();

    $today = date('d-m-Y');
    $file = __DIR__ ."/logs/$today.json";

    if(!file_exists(__DIR__ ."/logs")){
        mkdir(__DIR__ ."/logs");
    }

    if(!file_exists($file)){
        file_put_contents( $file, json_encode(['sent' => 0,'emails' => []]));
    }
    return $file;
}

function resetSentLogs(){
    $file = getTodayLogFile();
    unlink($file);
    file_put_contents( $file, json_encode(['sent' => 0,'emails' => []]));
}


function clearOldLogs(){
    $folderName =  __DIR__ ."/logs";

    if (file_exists($folderName)) {
        $time =  7*24*60*60;
        foreach (new DirectoryIterator($folderName) as $fileInfo) {
            if ($fileInfo->isDot()) {
                continue;
            }
            if ($fileInfo->isFile() && time() - $fileInfo->getCTime() >= $time) {
                unlink($fileInfo->getRealPath());
            }
        }
    }
}

function updateTodayLog($data){
    $log = getTodayLogFile();
    file_put_contents($log, json_encode($data));
}

function getConfigItem($key,$default = null){
    $config = getConfig();
    if(!isset($config[$key])){
        return $default;
    }

    return $config[$key];
}

function getConfig(){
    $file = __DIR__ ."/config.json";

    if(!file_exists($file)){
        file_put_contents( $file, json_encode(['capacity' => 10000]));
    }

    return json_decode(file_get_contents($file),true);
}

function setConfig($data){
    logger(json_encode($data,JSON_PRETTY_PRINT));
    $file = __DIR__ ."/config.json";
    file_put_contents( $file, json_encode($data));
    return json_decode(file_get_contents($file),true);
}

function checkPhpMail(){
    try{
        $response = mail('test@example.com','Example','E');
        return $response == 1;
    }catch(Exception $e){
        logerror($e);
        return false;
    }
}

function checkSendmail(){
    try{
        $response = exec("which sendmail");
        return file_exists($response);
    }catch(Exception $e){
        logerror($e);
        return false;
    }
}

function get_server_memory_usage(){
    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = preg_split("/[\s]+/", $free_arr[1]);
    if($mem[1]==0){
        $mem[1]=1;
    }

    $memory_usage = $mem[2]/$mem[1]*100;
    return $memory_usage;
}

function get_server_cpu_usage(){
    $load = sys_getloadavg();
    return $load[0];
}

function SendServerStatus($data = [])
{
    $baseUrl = getConfigItem('baseUrl');
    $serverId = getConfigItem('serverId');
    
    $url = "$baseUrl/api/worker-servers-status";

    logger("Sending Status ".$url );
    

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);

    logger("Sending Status Output: ".$server_output );
}


/**
 * @param array $data
 * @return array|boolean
 * @throws Exception
 */



 function sendshit(){

    $data=array(
        'senderEmail'=>'naveenenushan@gmail.com',
        'senderName'=>'naveen',
        'subject'=>'naveen',

    );

   var_dump(sendEmail($data));

}

function executeSendEmail($data = [])
{
    $config = getConfig();
    $logFile = getTodayLogFile();
    $todayConfig = json_decode(file_get_contents($logFile),true);
    $sent = 0;
    var_dump(1);
    if(isset($todayConfig['sent'])){
        $sent = $todayConfig['sent'];
    }

    if($sent > $config['capacity']){
        throw New Exception("Capacity for the day exceeded!");
    }

    if(isset($data['emailList']) && is_array($data['emailList']) && count($data['emailList']) > $config['capacity']){
        throw New Exception("Email List greater than capacity for the day exceeded!");
    }

    $outboxId = $data['outbox_id'];

    if(!doesOutboxExists($outboxId)){
        logger("No More $outboxId. Cant send");
        return false;
    }


    $output = sendEmail($data);

    $sentCount = array_filter($output,function($item){
        print_r($item);
        return $item['sent'] == true;
    });

    $log = ['sent' => $todayConfig['sent'] + count($sentCount),'emails' => !is_array($todayConfig['emails']) ? $output : array_merge($todayConfig['emails'],$output) ];

    updateTodayLog($log);

    sendLogToHomeServer(['type' => 'email','data' => $output]);

    return $output;
}


function sendLogsFor($date){
    $today = $date;
    $file = __DIR__ ."/logs/$today.json";

    if(!file_exists($file)){
        file_put_contents( $file, json_encode(['sent' => 0,'emails' => []]));
    }
    $data = json_decode(file_get_contents($file),true);
    sendLogToHomeServer(['type' => 'email-activity-log','data' => $data]);
}


function sendLogToHomeServer($data)
{
    $baseUrl = getConfigItem('baseUrl');
    $serverId = getConfigItem('serverId');

    $data['worker_server_id'] = $serverId;

    $url = "$baseUrl/saveLog";


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    
    $e = "Sending Log ".$url . " | Data: ".json_encode($data). " | Output: " . $server_output;

    logger($e);
}

function doesOutboxExists($outboxId){

    $baseUrl = getConfigItem('baseUrl');

    $url = "$baseUrl/api/outbox/$outboxId";


    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close ($ch);

    logger("Does Outbox $outboxId Exists? => $httpcode. => $server_output");

    return $httpcode == '200' || $httpcode == '201' || $httpcode == '202';
}

function logger($e){
    logerror($e);
}

function logerror($e){
    if($e instanceof Exception){
        echo $e->getMessage()."\n";
        file_put_contents("worker.log",$e->getMessage(),FILE_APPEND);
        file_put_contents("worker.log",$e->getTraceAsString(),FILE_APPEND);
    }

    if(is_string($e)){
        echo $e."\n";
        file_put_contents("worker.log",$e,FILE_APPEND);
    }
}
