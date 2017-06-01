<?php 
	session_start();
	//require_once __DIR__ . '/db_connect.php';
	include("db_connect.php");
	//require_once __DIR__ . '/error_message.php';
	$db = new DB_CONNECT();
	if (isset($_POST['submit'])){
		$user=$_SESSION['SESS_MEMBER_ID'];
		$review_id=$_POST['review_id'];
		$details=$_POST['content'];
		$result=mysql_query("insert into comment(user_id,review_id,details) values ('$user','$review_id','$details')") or die ('Unable to execute query!!'.mysql_error());
		
		if($result){
			header("location: ../home2.php");
				exit();
		}
	}
	else{
		
		echo"Failed to post comment";
	}
?>