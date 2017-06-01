<?php 
  	require_once "classes/connector.php";
  	$conn = new connector();
	$currency=$_GET['currency'];

	$excahnge_rate=$conn->exchangeRate("1","USD",$currency);
	
	$data=array('currency'=>$excahnge_rate);
	echo json_encode($data);
?>

