<?php
	session_start();
	include("../upload_photo.php");
	include("../db_connect.php");
	$errmsg_arr = array();
	$errflag = false;
	$db = new DB_CONNECT();
	if($_POST)
	{
		$user=$_SESSION['SESS_MEMBER_ID'];
		$business_name=clean($_POST['name']);
		$description=clean($_POST['description']);
		$country_id=clean($_POST['country']);
		$city=clean($_POST['city']);
		$website=clean($_POST['website']);
		$email=clean($_POST['email']);
		$tel1=clean($_POST['tel1']);
		$tel1=clean($_POST['tel1']);
		$address=clean($_POST['address']);
		$location=clean($_POST['location']);
		$category1=clean($_POST['category1']);
		$subategory1=clean($_POST['subategory1']);
		$category2=clean($_POST['category2']);
		$subcategory2=clean($_POST['subcategory2']);
		$category3=clean($_POST['category3']);
		$subcategory3=clean($_POST['subcategory3']);
		/*
		$mon_f=clean($_POST['mon_f']);
		$mon_t=clean($_POST['mon_t']);
		$tue_f=clean($_POST['tue_f']);
		$tue_t=clean($_POST['tue_t']);
		$wed_f=clean($_POST['wed_f']);
		$wed_t=clean($_POST['wed_t']);
		$thur_f=clean($_POST['thur_f']);
		$thur_t=clean($_POST['thur_t']);
		$fri_f=clean($_POST['fri_f']);
		$fri_t=clean($_POST['fri_t']);
		$sat_f=clean($_POST['sat_f']);
		$sat_t=clean($_POST['sat_t']);
		$sun_f=clean($_POST['sun_f']);
		$sun_t=clean($_POST['sun_t']);
		$logo=image();
		/* 
		*/
		$date_created=date("d-m-Y");
		
		$result=mysql_query("insert into business(user_id,date_created,country_id,name,address,city_id,phone_1,phone_2,email,website,logo,description,location) values
		('$user','$date_created','$country_id','$business_name','$address','$city','$tel1','$tel1','$email','$website','$logo','$description','$location')") or die ('Unable to execute query!!'.mysql_error());
		if($result){

			$errmsg_arr[] = 'Business successfully registered';
			$errflag = true;
			if($errflag) {
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: ../../add_business.php");
			exit();
			}
		}
		else{
			
			echo"Error has happened"; 
		}
	}
	else{
		
		echo"Nothing posted"; 		
	}
?>