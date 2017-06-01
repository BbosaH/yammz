<?php 
	session_start();
	require_once "classes/connector.php";
 	$conn = new connector();

	$month=$_GET['month'];
	$year=$_GET['year'];
	$week=$_GET['week'];
	$myday=$_GET['myday'];
	
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
		//$gwe="saturday";
	//Getting date for a day in the selected range
	$date5=$conn->getDateInRange($date_from,$date_to,$myday);
	
	//Calculating the ads worked on nd left on the selected day
	$ads_worked_on=0;
	$ads_left=0;
	$goal="Not Achieved";
	$color="#B8233A";
	$extra_ads=0;
	
  	$test=$conn->get_daily_worked_on_and_left_ads("",$date5,"");
  	foreach ($test as $key => $value) {
  		 $ads_worked_on=$value['worked_on_ads'];
		$ads_left=$value['left_ads'];
		$goal=$value['goal'];
		$extra_ads=$value['extra_ads'];
 	}

 	if(strcmp($goal, "Achieved")==0){
 		
 		$color="#77AF80";
 	}	 
                                
	$data=array(
		'ads_worked_on' =>$ads_worked_on ,
		'ads_left' =>$ads_left,
		'goal' =>$goal,
		'color'=>$color,
		'extra_ads'=>$extra_ads,
		'posted_Date'=>$date5
	);

	echo json_encode($data);
	
 ?>