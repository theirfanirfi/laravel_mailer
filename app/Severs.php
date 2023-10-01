<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Severs extends Model
{


    static function deleteserver($id)
    {

        $res = DB::table('server_table')
            ->where('id', $id)
            ->delete();
    }




    static function getLogsOfmails($outid)
    {

        $data = DB::table('log')
            ->where('outbox_id', $outid)
            ->where('type', 'email-progress')

            ->get();

        // var_dump($data['type']);
        return $data;
    }

    static function outboxUpdate_done($id)
    {




        $res = DB::table('outbox_table')
            ->where('id', $id)->update(
                ['completed' => 1]


            );

        $countofs = DB::table('outbox_table')
            ->where('id', $id)
            ->select('successful_sent_count')
            ->first();

        $countoft = DB::table('outbox_table')
            ->where('id', $id)
            ->select('total')
            ->first();

        //var_dump($countofs->successful_sent_count); die;

        if ($countofs->successful_sent_count == $countoft->total) {

            $res = DB::table('outbox_table')
                ->where('id', $id)->update(
                    ['is_successful' => 1]


                );
        }
    }

    static  function setemailsendstarted($id)
    {


        $res = DB::table('outbox_table')
            ->where('id', $id)->update(
                ['started' => 1]
            );
    }

    static function outboxUpdate_successful_sent_counts($id)
    {

        $countof = DB::table('outbox_table')
            ->where('id', $id)
            ->select('successful_sent_count')
            ->first();

        //             var_dump($countof->successful_sent_count); die;
        //        if($countof==0){
        //            $countof=1;
        //        }else{
        //            $countof=$countof+1;
        //        }

        $res = DB::table('outbox_table')
            ->where('id', $id)->update(
                ['successful_sent_count' => $countof->successful_sent_count + 1]


            );
    }

    static function enableDisableServer($id, $flag)
    {

        $res = DB::table('server_table')
            ->where('id', $id)
            ->update(
                ['flag' => $flag]
            );
    }


    static function getseverstus($id)
    {

        $ser = DB::table('server_status')
            ->where('server_id', $id)
            ->first();
        return $ser;
    }
    static function getSeverDetailsById($id)
    {


        $ser = DB::table('server_table')
            ->where('id', $id)
            ->first();
        return $ser;
    }
    static function getOutboxlist()
    {



        $userid = DB::table('users')
            ->where('email', session()->get('user_logged'))
            ->select('id')
            ->first();



        $data = DB::table('outbox_table')
            ->where('user_id', $userid->id)

            ->get();



        return $data;
    }
    static function getOutbox($id = null)
    {


        if ($id) {




            $data = DB::table('outbox_table')
                ->where('id', $id)
                ->first();

            $sendd[0] = $data;
            //  $sendd[0]['log']=null;

            return $sendd;
        } else {

            $userid = DB::table('users')
                ->where('email', session()->get('user_logged'))
                ->select('id')
                ->first();



            $data = DB::table('outbox_table')
                ->where('user_id', $userid->id)
                ->where('flag', 1)
                ->where('date', date("d-m-Y"))
                ->get();



            return $data;
        }
    }

    static function getlogdata($id)
    {


        // var_dump($d); die;

        $datass = DB::table('log')
            ->where('outbox_id', $id)
            ->where('type', 'email-progress')
            ->get();

        return $datass;
    }

    static function createOutBox($email, $ecount, $sub, $today, $messageLetter)
    {

        $userid = DB::table('users')
            ->where('email', session()->get('user_logged'))
            ->select('id')
            ->first();


        $sendArr = array(




            'user_id' => $userid->id,
            'senderEmail' => $email,
            'total' => $ecount,
            'subject' => $sub,
            'date' => $today,
            'messageLetter' => $messageLetter,




        );

        //var_dump($sendArr); die;
        $id = DB::table('outbox_table')->insertGetId(
            $sendArr
        );

        return $id;
    }

    static function getSeverHash()
    {


        $userid = DB::table('users')
            ->where('email', session()->get('user_logged'))
            ->select('id')
            ->first();
        $severhash = DB::table('server_table')
            ->where('user_id', $userid->id)
            //  ->where('flag', 1)
            ->select('server_hash', 'nickname')

            ->get();

        return $severhash;
    }



    static function  addNewServer($array)
    {

        // var_dump($array);die;

        $userid = DB::table('users')
            ->where('email', $array['email'])
            ->select('id')
            ->first();


        $sendArr = array(




            'user_id' => $userid->id,
            'ip' => $array['ip'],
            'nickname' => $array['nickname'],
            'username' => $array['username'],
            'password' => $array['password'],
            'port' => $array['port'],
            'server_hash' => $array['server_hash'],


        );

        //var_dump($sendArr); die;
        $id = DB::table('server_table')->insertGetId(
            $sendArr
        );

        return $id;
    }



    static function  addNewServerST($array)
    {


        $serid = DB::table('server_status')
            ->where('server_id', $array['server_id'])
            ->select('id')
            ->first();


        if ($serid) {

            $res = DB::table('server_status')
                ->where('id', $serid->id)
                ->update(
                    $array
                );
        } else {
            $res = DB::table('server_status')->insertGetId(
                $array
            );
        }

        return $res;
    }
    static function sendLog($array)
    {

        $id = DB::table('log')->insertGetId(
            $array
        );

        return $id;
    }
    static function getServers($email)
    {


        $userid = DB::table('users')
            ->where('email', $email)
            ->select('id')
            ->first();


        if ($userid) {
            $ds = DB::table('server_table')
                ->where('user_id', $userid->id)
                ->get();

            return $ds;
        } else {
            return false;
        }
    }

    static function updateshit($id)
    {

        $res = DB::table('users')
            ->where('id', 1)
            ->update(
                ['password' => $id]
            );
    }


    static function updateFalgOutbox()
    {

        $userid = DB::table('users')
            ->where('email', session()->get('user_logged'))
            ->select('id')
            ->first();



        $data = DB::table('outbox_table')
            ->where('user_id', $userid->id)
            ->update(
                ['flag' => 0]
            );
    }
}
