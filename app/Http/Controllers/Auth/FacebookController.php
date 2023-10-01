<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;

use GuzzleHttp;
use App\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
//use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;



//use Social


use Exception;

use Auth;
use Illuminate\Support\Facades\URL;



class FacebookController extends Controller
{
    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function redirectToFacebook()

    {
        session([

            'last_shit_url' => URL::previous(),



        ]);

        return Socialite::driver('facebook')->stateless()->redirect();

    }


    /**

     * Create a new controller instance.

     *

     * @return void

     */



    public function logoutFB( Request $request){

//        $authenticateUser->deauthorize($this, $provider);



//        $url='https://graph.facebook.com/v2.4/me/permissions?access_token='. session('fb_id');
//
//
//        $client = new GuzzleHttp\Client();
//        $res = $client->get($url);
//        $res->getStatusCode(); // 200
//        echo $res->getBody();

        $request->session()->flush();
        return redirect()->route('home_path');

    }

    public function handleFacebookCallback()

    {

//        $user = Socialite::with ( 'facebook' )->user ();
        try{

//            $user = Socialite::driver('facebook')->user();
//            $user =     Socialite::driver('facebook')->stateless()->user();
//            $request->session()->put('state',Str::random(40));

            try {
                $user = Socialite::driver('facebook')->user();
            } catch (InvalidStateException $e) {
                $user =     Socialite::driver('facebook')->stateless()->user();
            }



//dd($user);
            //$user->getToken();

//            $token_key=
             $cover=$this->getfbcover($user->token);





            $create['name'] = $user->getName();

            $create['email'] = $user->getEmail();

            $create['facebook_id'] = $user->getId();
            try{
                $create['gender'] = $user->gender;
            }catch ( \Exception $e){

                $create['gender'] = 'male';
            }
          //  $create['gender'] = $user->getGender();

//            dd($create);

            $userModel = new User;
//            dd($create);

            $createdUser = $userModel->addNew($create);

            Auth::loginUsingId($createdUser->id);
            $high_avatar= substr_replace($user->getAvatar(), "large",-6);

//            $JSONString=file_get_contents('http://graph.facebook.com/2087823654582593?fields=cover');
//            $parsedJSON = json_decode($JSONString);
//            dd( $source = $parsedJSON->cover->source);
            session([

                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'avatar' => $user->getAvatar(),

                'fb_id' => $user->getId(),
                'fb_cover' => $cover,
                'high_avatar' => $high_avatar,


                ]);

//          return  URL::previous();
//            return Redirect::to(URL::previous());
            return Redirect::to(session('last_shit_url'));
            //return redirect()->route('home_path');


        }catch (Exception $r){
            dd($r);

        }


//        return view ( 'home' )->withDetails ( $user )->withService ( $service );

//        try {
//
////            $user = Socialite::driver('facebook')->user();
//            $user = Socialite::with ( 'facebook' )->user ();
//            dd($user);
//
//            $create['name'] = $user->getName();
//
//            $create['email'] = $user->getEmail();
//
//            $create['facebook_id'] = $user->getId();
//
//
//            $userModel = new User;
//
//            $createdUser = $userModel->addNew($create);
//
//            Auth::loginUsingId($createdUser->id);
//
//
//            return redirect()->route('home');
//
//
//        } catch (Exception $e) {
////
//           dd( $e);
////
////
//            return redirect('auth/facebook');
////
////
//        }

    }

    function getfbcover($token_key){


// get cURL resource
        $ch = curl_init();

// set url
        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v2.12/me?fields=cover');

// set method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

// return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// set headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer '.$token_key,
            'Content-Type: application/octet-stream',
        ]);

// send the request and save response to $response
        $response = curl_exec($ch);

        curl_close($ch);

// stop if fails


        if (!$response ) {
           return null;
        }


        $rs=json_decode($response);
        if(isset($rs->error)){
            return null;
        }

        if(!isset($rs->cover)){
            return null;
        }

        return($rs->cover->source);

// close curl resource to free up system resources
        //curl_close($ch);

    }
}
