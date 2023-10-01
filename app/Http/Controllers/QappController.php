<?php

namespace App\Http\Controllers;
define('NET_SSH2_LOGGING', 2);


use App\Qapp;
use App\Severs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use Validator;
use Genderize;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request as Input;
use Illuminate\Support\Facades\Redirect;
use phpseclib3\Net\SFTP as SCP;
use phpseclib3\Net\SSH2;

class QappController extends Controller
{



	function saveServer()
	{

		//$scriptName = "  sshpass -p pasmak@wsx ssh root@173.44.48.235 -v exit  /dev/null 2>&1 &";

		$rules = array(
			'nickname' => 'required',
			'ipaddress' => 'required',
			'port' => 'required',
			'username' => 'required',
			'password' => 'required',


		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('bitH-server')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::all())
				->with('error', 'Process Not Completed'); // send back the input (not the password) so that we can repopulate the form
		} else {


			$nickname = Input::get('nickname');

			$host = Input::get('ipaddress');
			$username =  Input::get('username');
			$password = Input::get('password');
			$command = 'uname -s';
			$port = Input::get('port');

			$ssh = new SSH2($host, $port);
			if (!$ssh->login($username, $password)) {
				$output = 'Login Failed';
				return Redirect::to('bitH-server')

					->with('error', $output);
			} else {
				$output = $ssh->exec($command);

				$hash = md5(microtime(true) . mt_Rand());



				$sendArr = array(

					'email' => session()->get('user_logged'),
					'ip' => $host,
					'nickname' => $nickname . '|' . $output,
					'username' => $username,
					'password' => $password,
					'port' => $port,
					'server_hash' => $hash,


				);


				$id = Severs::addNewServer($sendArr);

				//var_dump($id); die;
				if ($id) {


					$this->installWorker($host, $username, $password, $port, $hash, $id);


					return Redirect::to('bitH-server')

						->with('success', 'Server Added');
				} else {
					return Redirect::to('bitH-server')

						->with('error', 'Try again');
				}
			}
		}
	}

	function installWorker($host, $username, $password, $port, $hash, $id)
	{
		$ssh = new SSH2($host, $port);
		if ($ssh->login($username, $password)) {
			$scp = new SCP($ssh);
			$scp->put('setup_worker.sh', File::get(storage_path('app/scripts/setup_worker.sh')));
			$ssh->exec('sudo chmod +x setup_worker.sh');
			$server = env('RMQ_SERVER');
			$rmq_user = env('RMQ_USER');
			$rmq_pw = env('RMQ_PASSWORD');
			$ssh->exec("sudo ./setup_worker.sh -i $id -h $hash -s $server  -u $rmq_user -p $rmq_pw &>install_log.txt &");
		}
	}

	function refreshWorker()
	{

		$serverId = Input::get('server_id');

		//  return $serverId;

		$serverd = Severs::getSeverDetailsById($serverId);



		$ssh = new SSH2($serverd->ip);
		if ($ssh->login($serverd->username, $serverd->password)) {

			$output = $ssh->exec('sudo su -');

			$output = $ssh->exec('sudo killall -9 php');
			$output = $ssh->exec('sudo kill -9 php');

			$rmq_server = env('RMQ_SERVER');
			$rmq_user = env('RMQ_USER');
			$rmq_password = env('RMQ_PASSWORD');
			$output = $ssh->exec("sudo nohup php XtraWorker/worker.php $serverd->id  $rmq_server $rmq_server $rmq_user $rmq_password $serverd->server_hash / > /dev/null 2>&1 &");


			return $output;
		}
	}



	function getUserSeverList()
	{

		$umail = session('name');

		$sever_data = Severs::getServers($umail);



		return Redirect::to('bitH-server')

			->with($sever_data);
	}
}
