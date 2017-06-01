<?php 
	session_start();
	//require_once __DIR__ . '/db_connect.php';
	include("db_connect.php");
	//require_once __DIR__ . '/error_message.php';
	$db = new DB_CONNECT();
	if (isset($_POST['followed'])){
		$msg ="";
		try{	
			$state=$_POST['input'];
			$user=$_SESSION['SESS_MEMBER_ID'];
			$bid=$_POST['business_id'];
			$sql=mysql_query("UPDATE follow SET followed_state='$state' WHERE user_id  ='$user' AND followed_id='$bid' ") or die ('Unable to execute query!!'.mysql_error());

			if(!$sql){
				echo 'Can not select from the database'.mysql_error();
			}
			else{
				$result=mysql_query("insert into follow(user_id,followed_id ,followed_state) values ('$user','$bid','$state')") or die ('Unable to execute query!!'.mysql_error());
				if(!$result){
					echo 'Can not select from the database'.mysql_error();
				}
				else{
					header("location: ../search.php");
				}
				
			}
		}
		catch( PDOException $e){
			$msg = $e->getMessage();	
		}
		
	}
	?>