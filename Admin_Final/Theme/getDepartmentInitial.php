<?php

	require_once "classes/connector.php";
	$conn = new connector();

	$initial=$conn->getDepartmentInitial($_GET['id']);

	$ini=array('initial'=>$initial);
	echo json_encode($ini);
 ?>