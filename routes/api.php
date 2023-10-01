<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//genarated_images/2018/11/24/15430794526.jpg











Route::post('/worker-servers-status', array('uses' => 'APIController@Serverstatus'));

Route::get('/outbox/{id}', array('uses' => 'APIController@outbox'));
Route::post('/mailsendshit', array('uses' => 'APIController@mailsendshit'));