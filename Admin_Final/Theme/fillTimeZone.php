<?php
require_once "classes/connector.php";

$conn = new connector();
$countyr_m=$conn->getCountryNameOfId($_GET['country_name']);
$data=array();
// $countyr_m="Uganda";
$query =$dbase->query("SELECT * FROM country_code WHERE name LIKE '%".$countyr_m."%' ORDER BY name ASC");

foreach ($query as $key => $row) {

	// $local_time=null;
	// $time_zone="";
	// $uganda_time="";

	// $ltime=$conn->getCountryLocalTime($row['code']);
	// var_dump($ltime);
	// foreach ($ltime as $key => $value) {
	// 	// $local_time=$value['localtime'];
	// 	$time_zon=$value->localtime;
	// }

	// echo typeOf($ltime);

	// $ug_code="UG";
	// $ug_time=$conn->getCountryLocalTime($ug_code);
	// foreach ($ltime as $key => $value) {
	// 	$uganda_time=$value['localtime'];		
	// }
	$timezones=DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $row['code']);

	 //Calculating local time based on the selected country
	date_default_timezone_set(''.$timezones[0].'');
	$local_time= date('m-d-Y h:i:s') ;
	$time_zon=$timezones[0];

	// Calculating the  current time in uganda
	$ug_code="UG";
	$uganda_timezone=DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $ug_code);
	date_default_timezone_set(''.$uganda_timezone[0].'');
	$uganda_time= date('m-d-Y h:i:s') ;

	$dat=array('local_time'=>$local_time,'time_zone'=>$time_zon,'gmt'=>$uganda_time);
	array_push($data, $dat);
}

echo json_encode($data);
?>