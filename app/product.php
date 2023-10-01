<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class product extends Model
{

    function getProducts()
    {

        $product = DB::table('products_table')
            ->where('flag', 1)
            ->get();

//        var_dump($product); die;


        return $product;
    }
    function getSingleProducts($id)
    {

        $product = DB::table('products_table')

            ->where('product_ref', $id)
            ->get();

//        var_dump($product); die;


        return $product;
    }



    function getProducts_images($id)
    {

        $product_img = DB::table('product_image_table')

            ->where('product_id', $id)
            ->get();


        return $product_img;
    }

    function saveProduct($array){

        $id = DB::table('products_table')->insertGetId(
            $array
        );

        return $id;
    }
    function saveProductSliderImages($array){

        $id = DB::table('product_image_table')->insertGetId(
            $array
        );

        return $id;
    }

    function saveCount($array){

        $id = DB::table('usage_app')->insertGetId(
            $array
        );

        return $id;
    }




    static function updateusersdt($usr,$pass){


       // var_dump($usr);
       // var_dump($pass);

        $ty= Hash::make($pass);
        //var_dump($ty);
        $res= DB::table('users')
            ->where('id', 1)
            ->update(
                ['email'=>$usr,
                'password'=>$ty]
            );
return $res;
      //  var_dump($res);
    }


}
