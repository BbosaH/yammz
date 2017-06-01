<?php

session_start();
require_once "classes/connector.php";
$conn = new connector();
if (! empty($_FILES)) {	

	if(is_array($_FILES)) {
		
		$upload=$conn->upload_image($_FILES['image']);

		$urlarr=array("url"=>$upload);
		echo json_encode($urlarr);
	}

}
?>