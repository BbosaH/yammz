<?php 
class Dbase 
{
	
	
	

	
	public function test_db_connect($host,$dbname,$username,$password)
	{

		$_config_db = array (

		'host'  => $host,
		'dbname'  =>$dbname,
		'username' => $username,
		'password' => $password
		


		);
		$db = new PDO('mysql:host='.$_config_db['host'].';dbname='.$_config_db['dbname'],$_config_db['username'],$_config_db['password']);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		return $db;

		

	}
	



}

?>