<?php
	
	require_once("classes/Connector.php");
	$conn= new Connector();

	$status=$_GET['status'];
	$dateKey=$_GET['dateKey'];
	$dateValue1=$_GET['dateValue1'];
	$dateValue2=$_GET['dateValue2'];
	$country_code=$_GET['country_code'];

	// $status="Pending";
	// $dateKey="today";
	// $dateValue1="";
	// $dateValue2="";

	$limit=$_GET['limit'];

	if (strcmp($status, "all")==0) {
		$status_value="";
		$status="";		
	}else{
		$status_value=$status;
		$status="yes";
	}

	if (strcmp($dateKey, "range")==0) {
		$key="range";
		$date1=$dateValue1;
		$date2=$dateValue2;
	}else if(strcmp($dateKey, "today")==0){
		$key="today";

		$date1=""; //Dummt i's supposed to be client's current date 
		$date2="";
	}else{
		$key="";
		$date1=$dateValue1;
		$date2="";
	}

	$dt=$conn->getDayAccountableAdsDetails($key,$date1,$date2,$status,$status_value,$limit,$country_code);

	// getDayAccountableAdsDetails($key,$date1,$date2,$status,$status_value,$limit);
	// $dt=$conn->getDayAccountableAdsDetails("","2016-09-25 13:05","","yes","Pending",2);   
    echo json_encode($dt);
 ?>