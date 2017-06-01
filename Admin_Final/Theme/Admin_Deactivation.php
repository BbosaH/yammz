<?php 
	session_start();
	require_once "classes/connector.php";
 	$conn = new connector();
 	$id=$_GET['id'];
 	$deact=$conn->DeactivateAdmin($id);

 	if (strcmp($deact, "disabled")==0) {
 		echo $id;
 	}else{
 		echo "error";
 	}
?>
