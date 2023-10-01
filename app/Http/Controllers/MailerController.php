<?php

namespace App\Http\Controllers;

use App\Severs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Validator;
use Illuminate\Support\Facades\Request as Input;
class MailerController extends Controller
{
function deleteServer(){


Severs::deleteserver(Input::get('server_id'));





return 0;

}

    function getOutboxupdates(){


      $rest  =Severs::getOutbox(Input::get('id'));

      return json_encode($rest[0]);
    }

    function getemailLog(){
$fsdf=Severs::getLogsOfmails(Input::get('id'));

       return json_encode($fsdf);
    }

function ennableSever(){

    Severs::enableDisableServer(Input::get('id'),1);

}

    function disableSever(){

        Severs::enableDisableServer(Input::get('id'),0);

    }

    function getserversatus(){

        $rules = array(
            'server_id' => 'required',



        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return 0;
        }else{
            $sid=Input::get('server_id');

          $data=  Severs::getseverstus($sid);

            return json_encode($data);

        }



    }


    function SendServerStatus(){


        $rules = array(
            'server_id' => 'required',



        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return 0;
        }else{



//get random sever hash
            $sid=Input::get('server_id');

            $hash=Severs::getSeverDetailsById($sid);
            $hash='email_queue_'.$hash->server_hash;


            //$email_list= $this->splitNewLine( Input::get('emailList'));
            //var_dump($email_list);die;

//            want to use foreach |emailList

            //$outid=Severs::createOutBox($senderEmail);


            $sendaa=array(
                'type'=>'server-health-status'


            );

//            create outbox





//var_dump($hash);
//var_dump($sendaa);

            $connection = new AMQPStreamConnection(env('RMQ_SERVER'), env('RMQ_PORT'),  env('RMQ_USER'),  env('RMQ_PASSWORD'));
            $channel = $connection->channel();

            $channel->queue_declare($hash, false, true, false, false);

            $msg = new AMQPMessage(json_encode($sendaa));
            $channel->basic_publish($msg, '', $hash);

            //echo " [x] Sent 'Hello World!'\n";
            $channel->close();
            $connection->close();


            //let show temp outbox

           // $outboxd=Severs::getOutbox($outid);

            //  var_dump($outboxd);die;

           // return view('panel.outbox')->with('outbox_data',$outboxd);


        }




    }


    function SendNewMail(Request $request){


        $rules = array(
            'senderEmail' => 'required',
            'senderName' => 'required',
            'subject' => 'required',
            'messageLetter' => 'required',
            'emailList' => 'required',
            'server' => 'required',


        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('bitH-mailer')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::all())
                ->with('error', 'Process Not Completed'); // send back the input (not the password) so that we can repopulate the form
        }else{
            $image=null;
            if($request->file('attachment')) {
                $image = $request->file('attachment');

//                $name = time() . $image->getClientOriginalName();
//                $destinationPath = public_path('/process_images/app_cat_image/');
//                $image->move($destinationPath, $name);

            }

//get random sever hash

$outboxarry=[];
        $hash=Input::get('server');
            $email_list= $this->splitNewLine( Input::get('emailList'));
            $sever_list=Severs::getSeverHash();
            $sever_count=count($sever_list);
            $email_count=count($email_list);
            //var_dump($sever_count);
           // var_dump($email_count);

        if($hash=='0771856t'){
          //  var_dump(($email_list));
           // echo"\n";
            ///$halved = array_chunk($email_list,$sever_count,false);

         //   var_dump(($halved));
            //echo"_____________________";
            $lenth=2;
            $counter=0;

            $halved = array_chunk($email_list, ceil($email_count/$sever_count));
           // var_dump(($halved));die;


            foreach ($halved as $key => $value){

            $ere=    $this->sendmailsysynew($sever_list[$key]->server_hash,$value,$image);
                $outboxarry[]=$ere[0];




//function to




              //array_push( $outboxarry, $setarrya);

            }

            //var_dump($outboxarry); die;
        }else{
            $outboxarry=null;

            $outboxarry= $this->sendmailsysynew($hash,$email_list,$image);
        }




            $arrt=array(

                'outbox_data'=>$outboxarry,
                'current'=>true,
            );

          // var_dump($arrt);

            return view('panel.outbox')->with($arrt);


        }




    }

    function sliptfukarray($email_list){

//        $setarrya=array(
//            'outbox_data'=>$this->sendmailsysynew($sever_list[0]->server_hash,$value)
//
//        );

    }

    function sendmailsysynew($hash,$email_list,$image){


        $hash='email_queue_'.$hash;

        //var_dump($hash);die;

        $senderEmail=Input::get('senderEmail');


        $counte=count($email_list);
        //var_dump($email_list);

//            want to use foreach |emailList
        $today = date("d-m-Y");
        $outid=Severs::createOutBox($senderEmail,$counte,Input::get('subject'),$today,Input::get('messageLetter'));
        //var_dump($outid);
        //$outboxd=Severs::getOutbox($outid);
        //var_dump($outboxd);die;
//return $outboxd;
      //  $files = $request->file('attachment');
        $sendaa=array(
            'type'=>'email-dispatch',
            'data'=>[


                'emailList'=>$email_list,
                'outbox_id'=>$outid,
                'senderEmail'=>Input::get('senderEmail'),
               //'attachment'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNTMBuRZHWwY47mOZ706Yg-ZgEmYl_FFUO2XxzFUtUEhJg_gav',
                'senderName'=>Input::get('senderName'),
                'replyTo'=>Input::get('replyTo'),
                'subject'=>Input::get('subject'),
                'messageType'=>Input::get('messageType'),
                'messageLetter'=>Input::get('messageLetter'),
                'encode'=>Input::get('encode'),
                'is_demo'=>Input::get('is_demo')

            ]


        );

//            create outbox




//var_dump($hash);
//var_dump($sendaa);

        $connection = new AMQPStreamConnection(env('RMQ_SERVER'), env('RMQ_PORT'),  env('RMQ_USER'),  env('RMQ_PASSWORD'));
        $channel = $connection->channel();

        $channel->queue_declare($hash, false, true, false, false);

        $msg = new AMQPMessage(json_encode($sendaa));
        $channel->basic_publish($msg, '', $hash);

        //echo " [x] Sent 'Hello World!'\n";
        $channel->close();
        $connection->close();


        //let show temp outbox

        $outboxd=Severs::getOutbox($outid);
        return $outboxd;
//        $arrt=array(
//
//            'outbox_data'=>$outboxd,
//            'current'=>true,
//        );

    }



    function splitNewLine($text) {
        $code=preg_replace('/\n$/','',preg_replace('/^\n/','',preg_replace('/[\r\n]+/',"\n",$text)));
        return explode("\n",$code);
    }

    function testMail(){

        $connection = new AMQPStreamConnection(env('RMQ_SERVER'), env('RMQ_PORT'),  env('RMQ_USER'),  env('RMQ_PASSWORD'));
        $channel = $connection->channel();

        $channel->queue_declare('email_queue_dd13e1ad28888a6bee6c2d8560d0ad74', false, true, false, false);
        $random=rand(1,1000);

        $testara='{"menu": {
  "id": "file",
  "value": "File",
  "popup": {
    "menuitem": [
      {"value": "New", "onclick": "CreateNewDoc()"},
      {"value": "Open", "onclick": "OpenDoc()"},
      {"value": "Close", "onclick": "CloseDoc()"}
    ]
  }
},
"type":\'server-health-status\'



}
';
        $sendaa=array(
            'type'=>'server-health-status'


        );


        $sendaa=array(
            'type'=>'email-dispatch',
            'data'=>[


                        'emailList'=>['naveenenushan@gmail.com'],
                'outbox_id'=>1,
                'senderEmail'=>'naveenw@ec2-54-208-139-118.compute-1.amazonaws.com',
                'senderName'=>'newnohup',
                'replyTo'=>'',
                'subject'=>'New nohup',
                'messageType'=>1,
                'messageLetter'=>'<html >No 0a0895f86a620096cc368db9dd9495f3 today new.</html>',
                'encode'=>'utf8',
                'is_demo'=>false









            ]


        );
//        $sendaa=array(
//            'type'=>'email-activity-log',
//            'data'=>[
//
//
//                        'date'=>'08-05-2019'
//
//
//
//
//
//
//
//
//
//            ]
//
//
//        );





        $msg = new AMQPMessage(json_encode($sendaa));
        $channel->basic_publish($msg, '', 'email_queue_dd13e1ad28888a6bee6c2d8560d0ad74');

        echo " [x] Sent 'Hello World!'\n";
        $channel->close();
        $connection->close();
    }


    function testMailRec(){

        $connection = new AMQPStreamConnection(env('RMQ_SERVER'), env('RMQ_PORT'),  env('RMQ_USER'),  env('RMQ_PASSWORD'));
        $channel = $connection->channel();
        $channel->queue_declare('56cad1653cf4b0e8ccfe73c498832ddc', false, false, false, false);
        echo " [*] Waiting for messages. To exit press CTRL+C\n";
        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
        };
        $channel->basic_consume('56cad1653cf4b0e8ccfe73c498832ddc', '', false, true, false, false, $callback);
        while (count($channel->callbacks)) {
            $channel->wait();
        }
        $channel->close();
        $connection->close();
    }

    function clearOutbox(){

    Severs::updateFalgOutbox();

        return Redirect::to('bitH-outbox');

    }

}
