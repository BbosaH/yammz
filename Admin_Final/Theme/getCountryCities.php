<?php

	require_once "classes/connector.php";
	$conn = new connector();

	$cities=$conn->getCitiesofCountryId($_GET['id']);

	echo json_encode($cities);
 ?>