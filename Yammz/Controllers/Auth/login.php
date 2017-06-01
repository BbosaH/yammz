
<?php //Start session
	session_start();
	//require_once __DIR__ . '/db_connect.php';
	//include("../db_connect.php");
	include("../../classes/connector.php");
	//require_once __DIR__ . '/error_message.php';
	//$db = new DB_CONNECT();
	 $conn = new connector();
	 $msgb ="";

	$username = $_POST['username'];
	$password = $_POST['password'];
	//echo "The username is ." . $username;
	//echo "password is ." . $password;
	//$username="steven@yammzit.com";
	//$password="123456";
	//Input Validations
	if(strcmp($username ,'')==0) {
		$errmsg_arr[] = '<i class="ion ion-alert" style="font-size: 20px;color: #FFFFFF;"></i> username missing';
		$errflag = true;
		if($errflag) {
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: ../../index.php");
			exit();
		}
	}
	if(strcmp($password ,'')==0) {
		$errmsg_arr[] = '<i class="ion ion-alert" style="font-size: 20px;color: #FFFFFF;"></i> Password missing';
		$errflag = true;
		if($errflag) {
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: ../../index.php");
			exit();
		}
	}

	try{

		// $qry="SELECT * FROM user WHERE email='$username' AND password='$password'";
		// $result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());;
		$password =md5($password);
		$result = $conn->getAll("SELECT * FROM user WHERE email='$username' AND password='$password'");

		//Check whether the query was successful or not
		if($result) {
			if(count($result) > 0) {
				echo 'Login Successful';
				session_regenerate_id();

				$member = $result[0];
				$city = $conn->getCityOfId($member['city_id']);
				$country=$city['country'];
				$country_id =$country['id'];
			    $_SESSION['SESS_MEMBER_ID'] = $member['id'];
			    $_SESSION['SESS_USERNAME'] = $member['name'];
			    $_SESSION['SESS_COUNTRY_ID'] = $country_id;

			   // session_write_close();

				$id=$_SESSION['SESS_MEMBER_ID'];

				header("location: ../../home2.php");

			}else {
				echo 'Login failed';
				// $errmsg_arr[] = 'Error! Wrong Username or Password';
				// $errflag = true;
				// if($errflag) {
				// 	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				// 	session_write_close();
				// 	header("location: ../../home2.php");
				// 	exit();
				// }
			}
		}else {
			//echo '';
			$errmsg_arr[] = ' <i class="ion ion-alert" style="font-size: 20px;color: #FFFFFF;"></i>  Wrong Username or Password !!!';
			$errflag = true;
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			header("location: ../../index.php");
			die("Query failed");

		}
	}catch(PDOException $e){

		$msgb = $e->getMessage();
    }

    function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
?>
