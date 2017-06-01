
<?php //Start session
	session_start();
	//require_once __DIR__ . '/db_connect.php';
	include("../db_connect.php");
	//require_once __DIR__ . '/error_message.php';
	$db = new DB_CONNECT();
	 $msgb ="";
	
	$username = clean($_POST['username']);
	$password = clean($_POST['password']);
	//$username="steven@yammzit.com";
	//$password="123456";
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'username missing';
		$errflag = true;
		if($errflag) {
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: ../../index.php");
			exit();
		}
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
		if($errflag) {
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: ../../index.php");
			exit();
		}
	}

	try{
		 
		$qry="SELECT * FROM user WHERE email='$username' AND password='$password'";
		$result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());;
		 
		//Check whether the query was successful or not
		if($result) {
			if(mysql_num_rows($result) > 0) {
				//Login Successful
				session_regenerate_id();
				$member = mysql_fetch_assoc($result);
				$_SESSION['SESS_MEMBER_ID'] = $member['id'];
				$_SESSION['SESS_USERNAME'] = $member['name'];
				
				session_write_close();

					$id=$_SESSION['SESS_MEMBER_ID'];
				
					header("location: ../../home2.php");

			}else {
				//Login failed
				$errmsg_arr[] = 'Error! Wrong Username or Password';
				$errflag = true;
				if($errflag) {
					$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
					session_write_close();
					header("location: ../../home2.php");
					exit();
				}
			}
		}else {
			die("Query failed");
		}
	}catch(PDOException $e){
	  
		$msgb = $e->getMessage();
    }
?>