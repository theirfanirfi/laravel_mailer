<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Qapp extends Model
{
    static function  saveQApp($array)
    {

        $id = DB::table('q_app_master')->insertGetId(
            $array
        );

        return $id;
    }

    //qapp_shared_images

    static function  saveSharedQApp_images($array)
    {

        DB::table('qapp_shared_images')->insert(
            $array
        );

        // return $id;
    }

    static function  erros_log_db($array)
    {

        DB::table('log_table')->insert(
            $array
        );

        // return $id;
    }

    static function  usage_log_db($ref)
    {

        $product = DB::table('usage_app')

            ->where('app_ref', $ref)
            ->first();

        //dd($product);

        if ($product) {
            $res = DB::table('usage_app')
                ->where('app_ref', $ref)
                ->update(
                    [
                        'count' => DB::raw('count+1'),

                    ]
                );
            //dd($res);
        } else {

            $er =    DB::table('usage_app')->insert(
                [
                    'app_ref' => $ref,
                    'count' => 1,

                ]
            );
            //dd($er);
        }




        // return $id;
    }

    static function getApps()
    {

        $product = DB::table('q_app_master')

            ->where('flag', 1)
            ->inRandomOrder()
            ->get();

        //        var_dump($product); die;


        return $product;
    }

    static function getAppsbydate()
    {
        //$today= date('Y-m-d H:i:s');
        $threeDayAfter = (new DateTime())->modify('-3 day')->format('Y-m-d H:i:s');

        $product = DB::table('q_app_master')

            ->where('flag', 1)
            ->whereDate('added_date', '>=', $threeDayAfter)
            ->select('app_ref')
            ->get();

        //dd($product);


        return $product;
    }
    static function getAppsOderby()
    {

        $product = DB::table('usage_app')
            // ->select('app_ref' )
            //->groupBy('app_ref_0')
            ->orderBy('count', 'dsec')
            ->get();

        //var_dump($producte); die;


        return $product;
    }
    static function get_hot_and_trnd()
    {

        $users = DB::table('usage_app')
            ->select(
                'q_app_master.is_hot AS is_hot',
                'q_app_master.app_ref AS app_ref',
                'q_app_master.cover_image AS cover_image',
                'q_app_master.is_hot AS is_hot',
                'q_app_master.is_friend AS is_friend'
            )
            ->leftJoin('q_app_master', 'usage_app.app_ref', '=', 'q_app_master.app_ref')
            ->orderBy('usage_app.count', 'desc')
            ->get();
        return $users;
    }

    static function getDisApps()
    {

        $product = DB::table('q_app_master')

            ->where('flag', 0)
            ->inRandomOrder()
            ->get();

        //        var_dump($product); die;


        return $product;
    }

    static function checkNotDisApp($id)
    {

        $product = DB::table('q_app_master')

            ->where('flag', 1)
            ->where('app_ref', $id)
            ->select('language')
            ->first();

        //        var_dump($product); die;


        return $product;
    }

    static function getAppsList()
    {

        $product = DB::table('q_app_master')

            //->where('flag', 1)

            ->get();

        //        var_dump($product); die;


        return $product;
    }


    static function getSingleApp($id)
    {

        $product = DB::table('q_app_master')

            ->where('app_ref', $id)
            ->first();

        //        var_dump($product); die;


        return $product;
    }

    static function getSingleAppRef($id)
    {

        $product = DB::table('q_app_master')

            ->where('context_id', $id)
            ->first();

        //        var_dump($product); die;


        return $product;
    }


    static function getAppRandomData($id)
    {

        return DB::table('q_app_random_data')

            ->where('qam_id', $id)
            ->inRandomOrder()
            ->first();
    }


    static function getAppRandomDataByGender($id, $sex)
    {

        return DB::table('q_app_random_data')

            ->where('qam_id', $id)
            ->where('sex', $sex)
            ->inRandomOrder()
            ->first();
    }

    static function  saveRnadomAppData($array)
    {

        $id = DB::table('q_app_random_data')->insertGetId(
            $array
        );

        return $id;
    }

    static function  saveNewAPPCount($array)
    {

        $id = DB::table('usage_app')->insertGetId(
            $array
        );

        return $id;
    }
}
