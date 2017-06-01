<?php
require_once('classes/connector.php');    		
  $conn = new connector();

  $business_id=$_GET['business_id'];
  $user_id=$_GET['user_id'];

  $code=$conn->randomCode();
  $approve=$conn-> Approve_Claimed_business($business_id,$user_id,$code);

  $arr=array('code'=>$code,'response'=>$approve);

  echo json_encode($arr);
 ?>