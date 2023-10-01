<?php

namespace App\Http\Controllers;

use App\Qapp;
use App\Severs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use Validator;
use Genderize;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use phpseclib\Net\SSH2;

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
			$username = Input::get('username');
			$password = Input::get('password');
			$command = 'uname -s';
			$port = Input::get('port');

			$ssh = new SSH2($host, 2222);
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


			$output = $ssh->exec('sudo su -');
			$output = $ssh->exec('su -');
			$output = $ssh->exec('whoami');
			$ver = (int) $ssh->exec('rpm --eval \'%{centos_ver}\'');
			$pout = __LINE__ . '---';

			if ($ver >= 7) {
				//  var_dump("sdfdsf");
				$output = $ssh->exec('sudo yum install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm -y');
				$pout .= $output . '-' . __LINE__ . '---';
				$output = $ssh->exec('sudo rpm -Uvh http://mirror.innosol.asia/remi/enterprise/remi-release-7.rpm');
				$pout .= $output . '-' . __LINE__ . '---';
				if ($ver == 8) {
					$output = $ssh->exec('yes Y | sudo yum module enable perl:5.26');
					$output = $ssh->exec('sudo yum config-manager --enable remi-php70 -y');
					$pout .= $output . '-' . __LINE__ . '---';
				} else {
					$output = $ssh->exec('sudo yum-config-manager --enable remi-php70 -y');
					$pout .= $output . '-' . __LINE__ . '---';
				}

				$output = $ssh->exec('sudo yum install mailx -y');
				$output = $ssh->exec('sudo ln -s /bin/mailx /bin/email');
				$output = $ssh->exec('sudo yum install postfix -y');
				$output = $ssh->exec('sudo mkfifo /var/spool/postfix/public/pickup');
				$output = $ssh->exec('systemctl restart postfix');

				$output = $ssh->exec('sudo yum install tar -y');
				$output = $ssh->exec('sudo yum install php -y');
				$pout .= $output . '-' . __LINE__ . '---';
				//  $output = $ssh->exec('sudo yum install php -y');
				$output = $ssh->exec('sudo yum install php-mbstring -y');
				$pout .= $output . '-' . __LINE__ . '---';
				$output = $ssh->exec('sudo yum install php-json -y');
				$pout .= $output . '-' . __LINE__ . '---';
				///    $output = $ssh->exec('sudo yum install php-php-mysqlnd php-php-devel php-php-gd php-php-mcrypt php-php-mbstring php-php-pear php-php-pecl-imagick php-php-pecl-zip -y');
				$output = $ssh->exec('sudo yum install php-opcache -y');
				$pout .= $output . '-' . __LINE__ . '---';
				$output = $ssh->exec('sudo yum install php-bcmath -y');
				$pout .= $output . '-' . __LINE__ . '---';
				// var_dump($output);
			} else {
				$output = $ssh->exec('sudo rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-6.noarch.rpm');
				$output = $ssh->exec('sudo rpm -Uvh https://mirror.webtatic.com/yum/el6/latest.rpm');
				$output = $ssh->exec('sudo yum install php70w php70w-opcache -y');
				$output = $ssh->exec('sudo yum install php70w-mysql php70w-xml php70w-soap php70w-xmlrpc -y');
				$output = $ssh->exec('sudo yum install php70w-mbstring -y');
				$output = $ssh->exec('sudo yum install php70w-bcmath -y');
			}

			//  var_dump($ver);die;


			//   var_dump($output);
			if ($ver == 8) {
				$output = $ssh->exec('sudo pkill -9 php');
				$pout .= $output . '-' . __LINE__ . '---';
			} else {
				$output = $ssh->exec('sudo killall -9 php');
				$pout .= $output . '-' . __LINE__ . '---';
			}
			$output = $ssh->exec('yes Y | sudo yum install wget');
			$pout .= $output . '-' . __LINE__ . '---';
			//   var_dump('ls',$output);
			$output = $ssh->exec('sudo wget http://62.210.208.242/xtra_worker/XtraWorker.tar.gz');
			$pout .= $output . '-' . __LINE__ . '---';
			//  var_dump($output);
			$output = $ssh->exec('sudo tar -zxvf XtraWorker.tar.gz');
			$pout .= $output . '-' . __LINE__ . '---';
			//  var_dump($output);
			$output = $ssh->exec('yes Y | sudo rm XtraWorker.tar.gz');
			$pout .= $output . '-' . __LINE__ . '---';
			//$output = $ssh->exec('cd XtraWorker/');
			$output = $ssh->exec('ls -a');
			$pout .= $output . '-' . __LINE__ . '---';
			// var_dump('ls',$output);

			//			var_dump('sudo nohup php XtraWorker/worker.php '.$id.' 62.210.208.242 62.210.208.242 test test '.$hash.' / > /dev/null 2>&1 &');

			$output = $ssh->exec('sudo nohup php XtraWorker/worker.php ' . $id . ' 62.210.208.242 62.210.208.242 test test ' . $hash . ' / > /dev/null 2>&1 &');
			$pout .= $output . '-' . __LINE__ . '---';


			//			var_dump($pout);
			//			die;
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
