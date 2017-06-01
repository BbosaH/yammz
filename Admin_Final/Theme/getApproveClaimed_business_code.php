<?php
require_once('classes/connector.php');    		
  $conn = new connector();

  $business_id=$_GET['business_id'];
  $user_id=$_GET['user_id'];

  $approve=$conn-> getApprove_Claimed_business_code($business_id,$user_id);

  echo json_encode($approve);
  // $n=array('user_id'=>$user_id,'business_id'=>$business_id);
  // echo json_encode($n);
  // echo $approve;
 ?>