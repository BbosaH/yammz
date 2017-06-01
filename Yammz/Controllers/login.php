<?php //Start session
	session_start();
	require_once __DIR__ . '/Controllers/db_connect.php';

	$db = new DB_CONNECT();
	$errmsg_arr = array();
	$errflag = false;

	function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
	$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
	}
	 
	//Sanitize the POST values
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);

	//Input Validations
	if($username == '') {
	$errmsg_arr[] = 'Username missing';
	$errflag = true;
	if($errflag) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: index.php");
	exit();
	}
	}
	if($password == '') {
	$errmsg_arr[] = 'Password missing';
	$errflag = true;
	if($errflag) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: index.php");
	exit();
	}
	}


	 
	$qry="SELECT * FROM users WHERE email='$username' AND password='$password'";
	$result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());;
	 
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['user_id'];
			$_SESSION['SESS_USERNAME'] = $member['username'];
			$id=$_SESSION['SESS_MEMBER_ID'];
			session_write_close();
			
			header("location:home.php");
		}else {
			//Login failed
			$errmsg_arr[] = 'Login Error: Ensure correct Username or Password and try again.';
			$errflag = true;
			if($errflag) {
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: index.php");
			exit();
			}
		}
	}else {
	die("Query failed");
	}
?>