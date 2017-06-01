<?php
 require_once "classes/connector.php";
  $conn = new connector();
$logo=$conn->upload_image($_FILES['image']);

	echo $_FILES['image'];

	// echo "Nomis Wilson";
?>