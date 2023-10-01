<?php

namespace App\Http\Controllers;

use App\Qapp;

//use Illuminate\Http\File;
//use Faker\Provider\File;

use App\Severs;
use DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Image;
use http\Exception;
//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Input;
use Illuminate\Support\Facades\Storage;


use Validator;

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"');


class APIController extends Controller
{
    //






    function Serverstatus(){

        $rules = array(
            'php_mail_status' => 'required',
            'sendmail_status' => 'required',
            'memory_usage' => 'required',
            'server_load' => 'required',
            'server_id' => 'required',


        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {

            $arss=array(

                'result'=>'error validate',
                'states'=>400
            );

            return  $arss;

        }


return Severs::addNewServerST(Input::all());






    }





function outbox(){
        //return true;


}


function savelog(){


$dert=Input::all();

if(!isset($dert['outbox_id'])){
    $dert['outbox_id']=null;
}



$sedara=array(

    'type'=>$dert['type'],
    'data'=>json_encode($dert['data']),
    'outbox_id'=>$dert['outbox_id'],
    'worker_server_id'=>$dert['worker_server_id'],


);

//var_dump($dert);die;
    Severs::sendLog($sedara);

   // Severs::outboxUpdate_successful_sent_counts($dert['outbox_id']);

    if($dert['type']=='email-progress'){

        if($dert['outbox_id']!=null){

            Severs::setemailsendstarted($dert['outbox_id']);

            if($dert['data']['sent']==1){
                Severs::outboxUpdate_successful_sent_counts($dert['outbox_id']);
            }


        }


    }

    if($dert['type']=='outbox-result'){
        Severs::outboxUpdate_done($dert['outbox_id']);
    }


}









function mailsendshit(){


    $email=Input::post('email');

    $subject=Input::post('subject');
    $body=Input::post('body');



    Mail::send([], [], function ($message ) use($email, $subject, $body){
        $message->to($email)
    ->subject($subject)
    // here comes what you want
    ->setBody($body); // assuming text/plain
    // or:

});
}

}


