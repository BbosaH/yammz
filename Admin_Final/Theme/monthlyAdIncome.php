<?php 
	require_once "classes/connector.php";
 	$conn = new connector();
 	
  $colors=array();
  $MonthTotal=array();
 
 	$status=$_GET['status'];
  $country_code=$_GET['country_code'];

  $data=$_GET['data'];

  // $status="all";
  // $country_code="UG";
  $status_value="";
  
 	if (strcmp($status, "all")==0) {
    $status="";
    $status_value="";
  }else{
    $status_value=$status;
    $status="yes";
  }

  $clientDate=$conn->getCountryLocalTime($country_code);
  $date_to="";
  $date_from="";

  if (strcmp($data, "mothlyNetAdIncome")==0) {
    $date_to=date("Y-m-t",strtotime($clientDate['localtime']));
    $date_from=date("Y-m-01",strtotime($clientDate['localtime']));

  }else  if (strcmp($data, "weeklyNetAdIncome")==0) {
    $year=date("Y",strtotime($clientDate['localtime']));
    $month=date("m",strtotime($clientDate['localtime']));

    $week=$conn->getWeekfromMonthday($clientDate['localtime']);

    $dates=$conn->getStartEndOFMonthWeek($week,$year,$month);

    $date_from=$dates['date_from'];
    $date_to=$dates['date_to'];

  }else if (strcmp($data, "yearlyNetAdIncome")==0) {

    $date_to=date("Y-12-t",strtotime($clientDate['localtime']));
    $date_from=date("Y-01-01",strtotime($clientDate['localtime']));
  } 

  

  $TotalAfterCommission=$conn->getDateAdTotalAfterCommission("range",$date_from,$date_to,$status,$status_value,$country_code);

  $MonthTotalReceived=$conn->getDateAdTotalAmountReceived("range",$date_from,$date_to,$status,$status_value,$country_code);

  $TotalMonthNetIncome =($TotalAfterCommission/$MonthTotalReceived)*100; 

    echo $TotalMonthNetIncome ;
?>