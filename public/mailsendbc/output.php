<?php

require_once __DIR__ . '/vendor/autoload.php';

use Hhxsv5\SSE\SSE;
use Hhxsv5\SSE\Update;

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Access-Control-Allow-Origin: *');
header('Connection: keep-alive');
header('X-Accel-Buffering: no');//Nginx: unbuffered responses suitable for Comet and HTTP streaming applications

(new SSE())->start(new Update(function () {
    $newMsgs = [
        [
            'line' => getLastLine()
        ],
    ];//get data from database or servcie.
    if (!empty($newMsgs)) {
        return json_encode(['newMsgs' => $newMsgs]);
    }
    return false;//return false if no new messages
}), 'new-msgs');

function getLastLine(){
    $log_file = "/var/log/eworker/error.log";
    $line = exec('tail -1 '.$log_file);
    return $line;
}