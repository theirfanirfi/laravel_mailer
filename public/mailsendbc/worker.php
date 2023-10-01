<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/functions.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$SERVER_ID = isset($argv[1]) ? $argv[1] : getConfigItem('serverId');
$SERVER_URL = isset($argv[2]) ? $argv[2] : getConfigItem('baseUrl');
$RABBIT_SERVER = isset($argv[3]) ? $argv[3] : getConfigItem('rabbitServer');
$RABBIT_SERVER_USERNAME = isset($argv[4]) ? $argv[4] : getConfigItem('rabbitUsername');
$RABBIT_SERVER_PASSWORD = isset($argv[5]) ? $argv[5] : getConfigItem('rabbitPassword');
$SERVER_HASHCODE = isset($argv[6]) ? $argv[6] : getConfigItem('serverHashCode');
$RABBIT_HOST_PATH = isset($argv[7]) ? $argv[7] : getConfigItem('rabbitHostPath','/');

$EMAIL_QUEUE = "email_queue_$SERVER_HASHCODE";

setConfig([
    'capacity' => 30000,
    'baseUrl' => $SERVER_URL,
    'serverId' => $SERVER_ID,
    'rabbitServer' => $RABBIT_SERVER,
    'rabbitUsername' => $RABBIT_SERVER_USERNAME,
    'rabbitPassword' => $RABBIT_SERVER_PASSWORD,
    'serverHashCode' => $SERVER_HASHCODE
]);

SendServerStatus([
    'php_mail_status' => checkPhpMail(),
    'sendmail_status' => checkSendmail(),
    'memory_usage' => get_server_memory_usage(),
    'server_load' => get_server_cpu_usage(),
]);

$connection = new AMQPStreamConnection($RABBIT_SERVER, 5672, $RABBIT_SERVER_USERNAME, $RABBIT_SERVER_PASSWORD, $RABBIT_HOST_PATH);

$channel = $connection->channel();
logger($EMAIL_QUEUE);
$channel->queue_declare($EMAIL_QUEUE, false, true, false, false);
    echo " [*] Waiting for messages. To exit press CTRL+C\n";
    $callback = function ($msg) {
        
        logger( " [-] Received Request RPC requests");
        
        $payload = json_decode($msg->body, true);
        
        logger("Received Requestee: ".$msg->body);
                logger("Received Request: ".$payload['type']);
        if (isset($payload['type'])) {
            try {
                switch ($payload['type']) {
                    case 'server-health-status':
                        SendServerStatus([
                                         'php_mail_status' => checkPhpMail(),
                                         'sendmail_status' => checkSendmail(),
                                         'memory_usage' => get_server_memory_usage(),
                                         'server_load' => get_server_cpu_usage(),
                                         'server_id' => getConfigItem('serverId'),
                                         ]);
                      
                        break;
                    case 'email-dispatch':
                        $response = executeSendEmail($payload['data']);
                        if(is_array($response)) {
                            sendLogToHomeServer([
                                                'type' => 'outbox-result',
                                                'data' => $response,
                                                'outbox_id' => $payload['data']['outbox_id'],
                                                'outbox_item_id' => $payload['data']['outbox_item_id'],
                                                ]);
                        }
                        break;
                    case 'email-activity-log':
                        sendLogsFor($payload['data']['date']);
                        break;
                    case 'refresh-server':
                        resetSentLogs();
                        break;
                    default:
                        sleep(substr_count($msg->body, '.'));
                        break;
                }
            } catch (Exception $e) {
                logerror($e);
                sendLogToHomeServer(['type' => 'exception', 'data' => ['trace' => $e->getTrace(), 'message' => $e->getMessage()]]);
            }
        }
        //$msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
    };
    
    logger( " [x] Awaiting RPC requests");

    $channel->basic_consume($EMAIL_QUEUE, '', false, true, false, false, $callback);
    while (count($channel->callbacks)) {
        $channel->wait();
    }
    $channel->close();
    $connection->close();
