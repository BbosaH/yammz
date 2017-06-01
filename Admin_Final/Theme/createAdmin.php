<?php

session_start();
require_once "classes/connector.php";
$conn = new connector();

$urlarr="";
if (! empty($_FILES)) {	

	if(is_array($_FILES)) {
		
		$upload=$conn->upload_image($_FILES['image']);

		$urlarr=$upload;
		
	}

}



$gender=$_POST['gender'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$permanent_address=$_POST['permanent_address'];
$permanent_address2=$_POST['permanent_address2'];
$country=$_POST['country'];
$city=$_POST['city'];
$phone=$_POST['phone'];
$privateemail=$_POST['privateemail'];
$workemail=$_POST['workemail'];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$new_password=$_POST['new_password'];
$confirm_password=$_POST['confirm_password'];
$department=$_POST['department'];
$position=$_POST['position'];
$branch_location=$_POST['branch_location'];
$securitylevel=$_POST['securitylevel'];
$team=$_POST['team'];

$username=$_POST['Username'];
$depInitial=$_POST['depInitial'];

$upload=$conn->createAdmin($urlarr,$gender,$username,$fname,$lname,$permanent_address,$permanent_address2,$country,$city,$phone,$privateemail,$workemail,$day,$month,$year,$new_password,$department,$position,$branch_location,$securitylevel,$team,$depInitial);

$resp=array('response'=>$upload);

echo json_encode($resp);
?>