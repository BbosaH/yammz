<?php 
	session_start();
	require_once "classes/connector.php";
 	$conn = new connector();

	$month=$_GET['month'];
	$year=$_GET['year'];
	$week=$_GET['week'];
	$myday=$_GET['myday'];

	$today="false";
	
	$date_from="";
	$date_to="";

	//Getting the real date range in from the selected week 
	if($week==1){
		$date_from="".$year."-".$month."-01";
		$date_to="".$year."-".$month."-07";
	}elseif ($week==2) {
		$date_from="".$year."-".$month."-08";
		$date_to="".$year."-".$month."-14";
	}elseif ($week==3) {
		$date_from="".$year."-".$month."-15";
		$date_to="".$year."-".$month."-21";
	}elseif ($week==4) {
		$date_from="".$year."-".$month."-22";
		$date_to="".$year."-".$month."-28";
	}elseif ($week==5) {
		$date_from="".$year."-".$month."-29";
		$date_to="".$year."-".$month."-31";
	}

	//Getting date for a day in the selected range
	$date5=$conn->getDateInRange($date_from,$date_to,$myday);
	
	$goal=0;
	
	$id=$_GET['id'];
	$goal=$conn->Weekly_total_ads("specific",$date5,$id);
	foreach ($goal as $key => $value) {
		$goal=$value['result'];
	}

	// Checking whether the selected date is today

	$current = strtotime(date("Y-m-d"));
   	$date    = strtotime($date5);

   	$datediff = $date - $current;
   	$difference = floor($datediff/(60*60*24));
   	if($difference==0)
   	{
      $today="true";
   	}
    
	$data=array(
		'goal' =>$goal ,
		'today'=>$today
	);

	// var_dump($data);

	echo json_encode($data);
	
 ?>