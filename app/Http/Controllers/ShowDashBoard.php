<?php

namespace App\Http\Controllers;

use App\Severs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShowDashBoard extends Controller
{


    public function show()
    {

//       $data = session()->all();
//       session(['users' => '89']);
//


       if (session()->exists('user_logged')) {
           //





           $umail = session('user_logged');

           $sever_data = Severs::getServers($umail);
           $outboxd = Severs::getOutboxlist();
           $total=0;
           $successful_sent_count=0;
           $today=0;
           $todaydate=date("d-m-Y");

           foreach ($outboxd as $data){

              // var_dump($data); die;

               $total=$total+ $data->total;
               $successful_sent_count=$successful_sent_count + $data->successful_sent_count;
               if($data->date==$todaydate){
                   $today=$today+ $data->total;

               }


           }

           //var_dump($sever_data);die;

           $sendarr=array(

               'servers'=>count($sever_data),
               'total'=>$total,
               'today'=>$today,
               'successful_sent_count'=>$successful_sent_count,

           );

           return view('panel.index',$sendarr);
       }else{

           return Redirect::to('bitH-login');
       }





    }




    public function severView(){

        if (session()->exists('user_logged')) {
            //

            $umail = session('user_logged');

            $sever_data = Severs::getServers($umail);

           // var_dump($sever_data); die;
            return view('panel.severs')->with('serverd', $sever_data);
        }
            else{

            return Redirect::to('bitH-login');
        }

    }

    public function sever_one_View($id){

        if (session()->exists('user_logged')) {
            //


         $serv= Severs::getseverstus($id);
         $servd= Severs::getSeverDetailsById($id);
$wdsfs=array(
    'serverst'=>$serv,
    'serverdt'=>$servd,

);

            return view('panel.one_server')->with($wdsfs);



        }else{

            return Redirect::to('bitH-login');
        }

    }



    public function outboxView(){

        if (session()->exists('user_logged')) {
            //
          // Severs::outboxUpdate_done(127);

            $outboxd=Severs::getOutbox();



            return view('panel.outbox')->with('outbox_data',$outboxd);
            //return view('panel.outbox');
        }else{

            return Redirect::to('bitH-login');
        }

    }

    public function MailerView(){

        if (session()->exists('user_logged')) {
            //

            $dsd=Severs::getSeverHash();
            return view('panel.mailer')->with('server',$dsd);
        }else{

            return Redirect::to('bitH-login');
        }

    }

    public function KeyMailerView(){

        if (session()->exists('user_logged')) {
            //

            $dsd=Severs::getSeverHash();
            return view('panel.keymailer');
        }else{

            return Redirect::to('bitH-login');
        }

    }

    public function PaswordView(){

        if (session()->exists('user_logged')) {
            //

           // $dsd=Severs::getSeverHash();
            return view('panel.product_add');
        }else{

            return Redirect::to('bitH-login');
        }

    }



}
