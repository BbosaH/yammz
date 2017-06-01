<?php 
	require_once("classes/Connector.php");
	$conn= new Connector();

	$country_info=$conn->getCurrentUsersCountryInfo();

	$country_code=$country_info['country_code'];


	$clientDate=$conn->getCountryLocalTime($country_code);
    
    $year=date("Y",strtotime($clientDate['localtime']));
    $month=date("M",strtotime($clientDate['localtime']));
    $day=$conn->addOrdinalNumberSuffix(date("d",strtotime($clientDate['localtime'])));


	$code=array('code'=>$country_code,'year'=>$year,'month'=>$month,'day'=>$day);

	echo json_encode($code);
?>