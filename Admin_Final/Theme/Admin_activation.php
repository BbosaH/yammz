<?php 
	session_start();
	require_once "classes/connector.php";
 	$conn = new connector();
 	$id=$_GET['id'];
 	$deact=$conn->ActivateAdmin($id);

 	if (strcmp($deact, "enabled")==0) {
 		echo $id;
 	}else{
 		echo "error";
 	}
?>
