<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Qapp;
use App\Severs;
use App\User;
use Illuminate\Support\Facades\Input;

Route::get('/tr', function () {
//var_dump(\App\User::all());
//
//    testfdsf();
//
//// create a file
 //$re=  $disk->put('avatars/1bvcvfb', 'CVgfccfsd');

// var_dump($re); die;
  // $disk->move('avatars/1bb', 'CVgfccfsd');
   // $disk->move($re, '/'.'cdcdcd');


// check if a file exists
  //  $exists = $disk->exists('file.jpg');
   // echo($exists);


    //return view('shopf');


//    public function testLogin()
//    {
        $user = new User;
        $user->name = 'joe';
//        $user->lname = 'joe';
        $user->email = 'joe@gmail.com';
        $user->password = Hash::make('123456');

        if ( ! ($user->save()))
        {
            dd('user is not being saved to database properly - this is the problem');
        }

        if ( ! (Hash::check('123456', Hash::make('123456'))))
        {
            dd('hashing of password is not working correctly - this is the problem');
        }

        if ( ! (Auth::attempt(array('email' => 'joe@gmail.com', 'password' => '123456'))))
        {
            dd('storage of user password is not working correctly - this is the problem');
        }

        else
        {
            dd('everything is working when the correct data is supplied - so the problem is related to your forms and the data being passed to the function');
        }


});
Route::get('ww', function (){

    $id=1;
    $hash='dfdfdsfdsf';
   echo('nohup php worker.php '.$id.' '.$_SERVER['SERVER_ADDR'].' '.$_SERVER['SERVER_ADDR'].' test test '.$hash.' / &' );
});

// Route::get('/bitH-login', function () {
//     return view('panel.login');
// });



// route to show the login form
Route::get('XtraMailerLogin', array('uses' => 'LoginController@show'));
Route::get('bitH-login', array('uses' => 'LoginController@show'));



Route::post('saveLog', array('uses' => 'APIController@savelog'));

Route::get('/',function (){

    return view('welcome');

});


Route::get('/product/{name}', array('uses' => 'ProductController@getProductDetails'));




// route to process the form



Route::post('bitH_do_login', array('uses' => 'LoginController@doLogin','as' => 'bitH_do_login'));
Route::post('bitH_do_app_add', array('uses' => 'QappController@doQappSave','as' => 'bitH_do_app_add'));


Route::get('bitH_set_shared/{image_name}', array('uses' => 'QappController@set_shared','as' => 'bitH_set_shared'));

//logut

//using

Route::get('bitH-logout', array('uses' => 'LoginController@doLogout','as' => 'bitH-logout'));
Route::get('bitH-dashboard', array('uses' => 'ShowDashBoard@show','as' => 'bitH-dashboard'));
Route::get('bitH-pass', array('uses' => 'ShowDashBoard@PaswordView','as' => 'bitH-pass'));
Route::get('bitH-server', array('uses' => 'ShowDashBoard@severView','as' => 'bitH-server'));
Route::get('bitH-outbox', array('uses' => 'ShowDashBoard@outboxView','as' => 'bitH-outbox'));
Route::get('bitH-mailer', array('uses' => 'ShowDashBoard@MailerView','as' => 'bitH-mailer'));
Route::get('bitH-keymailer', array('uses' => 'ShowDashBoard@KeyMailerView','as' => 'bitH-keymailer'));
Route::post('saveServer', array('uses' => 'QappController@saveServer','as' => 'saveServer'));
Route::post('refreshWorker', array('uses' => 'QappController@refreshWorker','as' => 'refreshWorker'));
Route::post('SendNewMail', array('uses' => 'MailerController@SendNewMail','as' => 'SendNewMail'));
Route::post('SendServerStatus', array('uses' => 'MailerController@SendServerStatus','as' => 'SendServerStatus'));
Route::post('getserversatus', array('uses' => 'MailerController@getserversatus','as' => 'getserversatus'));
Route::post('disableSever', array('uses' => 'MailerController@disableSever','as' => 'disableSever'));
Route::post('getemailLog', array('uses' => 'MailerController@getemailLog','as' => 'getemailLog'));
Route::post('getOutboxupdates', array('uses' => 'MailerController@getOutboxupdates','as' => 'getOutboxupdates'));
Route::post('deleteServer', array('uses' => 'MailerController@deleteServer','as' => 'deleteServer'));
Route::get('clearOutbox', array('uses' => 'MailerController@clearOutbox','as' => 'clearOutbox'));
Route::post('bith-changepw', array('uses' => 'LoginController@chnagePasswordanduser','as' => 'bith-changepw'));

//test
Route::get('testMail', array('uses' => 'MailerController@testMail','as' => 'testMail'));
Route::get('testMailRec', array('uses' => 'MailerController@testMailRec','as' => 'testMailRec'));

//not


Route::get('/bitH-sever_one_View/{id}', array('uses' => 'ShowDashBoard@sever_one_View'));


Route::get('getpass', function (){


    $ty= Hash::make('xt11109tsxh123sffssfrc3');

    Severs::updateshit($ty);
});

