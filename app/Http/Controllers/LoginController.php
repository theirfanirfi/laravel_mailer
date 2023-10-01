<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
//use Auth;
use Illuminate\Support\Facades\Request as Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{



  public function show()
   {
      return view('panel.login');
   }

   public function doLogin(){

//var_dump(Hash::make('saman123bithub'));
//die;
     // validate the info, create rules for the inputs
     $rules = array(
         'email_add'    => 'required|email', // make sure the email is an actual email
         'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
     );

     // run the validation rules on the inputs from the form
     $validator = Validator::make(Input::all(), $rules);


     // if the validator fails, redirect back to the form
     if ($validator->fails())

     {

         return Redirect::to('XtraMailerLogin')
             ->withErrors($validator) // send back all errors to the login form
             ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
     } else {

         // create our user data for the authentication
         $userdata = array(
             'email'     => Input::get('email_add'),
             'password'  => Input::get('password')
         );

         // attempt to do the login


         if (Auth::attempt($userdata)) {



             // validation successful!
             // redirect them to the secure section or whatever
             // return Redirect::to('secure');
             // for now we'll just echo success (even though echoing in a controller is bad)
             session(['user_logged' => Input::get('email_add')]);
             return Redirect::to('bitH-dashboard');


         } else {
           //  var_dump($userdata);
             // validation not successful, send back to form
//             return Redirect::to('bitH-login');
             $data = array(
                 'email'     => 'password error.',

             );
            return Redirect::to('XtraMailerLogin')
                 ->withErrors($data);

         }

     }


   }


    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        session()->flush();
        return Redirect::to('bitH-login'); // redirect the user to the login screen
    }


    public function chnagePasswordanduser()
    {

        $rules = array(
            'username' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' ,// password can only be alphanumeric and has to be greater than 3 characters
            'password_confirm' => 'required_with:password|same:password' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('bitH-pass')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput(Input::except('password'),Input::except('password_confirm')
                    ); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
//            $userdata = array(
//                'username' => Input::get('email_add'),
//                'password' => Input::get('password')
//            );
          $stt=  product::updateusersdt(Input::get('username'),Input::get('password'));
if($stt){

    Auth::logout(); // log the user out of our application
    session()->flush();
    return Redirect::to('bitH-login');
    //. ->with('success', 'updated');
}else{
    return Redirect::to('bitH-pass')
        ->with('error', 'try again');
}

            //var_dump(Input::get());

        }
    }




}
