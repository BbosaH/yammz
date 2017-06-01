<?php
require_once('classes/connector.php');    		
  $conn = new connector();

  $business_id=$_GET['business_id'];
  $user_id=$_GET['user_id'];

  $approve=$conn-> DeactivateClaimed_business($business_id,$user_id);

  echo json_encode($approve);
  
 ?>