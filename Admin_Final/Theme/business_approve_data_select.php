<?php
  require_once "classes/connector.php";
	$add_id=$_GET['k'];
  $arres=$conn->getAll("SELECT * FROM `adds` WHERE `adds`.`id` = '$add_id'");
 // print_r($arres);
 
	foreach ($arres as $row) {
		
		$ad_url = $row['ad_url'];		
		$add_description = $row['add_description'];		
		$start_date = $row['start_date'];
		$end_dte = $row['end_dte']; 
		
		
		//$bus = $conn->getResById("SELECT * FROM business",$business_id);
	}
?>