<?php 
	require_once "classes/connector.php";
 	$conn = new connector();

 	$monthAmounts=array();	

 	// $data=$_GET['data'];
 	$status=$_GET['status'];
 	$country_code=$_GET['country_code'];

  
 	if (strcmp($status, "all")==0) {
 		$status="";
 		$status_value="";
 	}else{
    $status_value=$status;
    $status="yes";
  }

  $clientDate=$conn->getCountryLocalTime($country_code);
  // $clientDate=array('localtime'=>"2016-10-07");
	
    $year=date("Y",strtotime($clientDate['localtime']));
    $month=date("m",strtotime($clientDate['localtime']));
    $day=date("d",strtotime($clientDate['localtime']));

    $today=date("Y-m-d",strtotime($clientDate['localtime']));
    $week=$conn->getWeekfromMonthday($clientDate['localtime']);

    $min_weekDates=$conn->getMinWeekDates(); 

    $monthtoday=date("m",strtotime($clientDate['localtime']));

    for ($i=$monthtoday; $i >=1 && $i >=$monthtoday-3  ; $i--) { 

      $month=$conn->getYearMonthDates($i,$year);

      $totalAmountReceived=$conn->getDateAdTotalAmountReceived("range",$month['date_from'],$month['date_to'],$status,$status_value,$country_code);

      $TotalAfterCommission=$conn->getDateAdTotalAfterCommission("range",$month['date_from'],$month['date_to'],$status,$status_value,$country_code);

      $TotalCommissionPaidOut=$conn->getDateAdTotalCommissionPaidOut("range",$month['date_from'],$month['date_to'],$status,$status_value,$country_code);      

      $mont_display=date("M",strtotime($month['date_from']))." ".$year;

      $info=array('TotalCommissionPaidOut'=>$TotalCommissionPaidOut,'TotalAfterCommission'=>$TotalAfterCommission,'totalAmountReceived'=>$totalAmountReceived,'month'=>$mont_display);
      array_push($monthAmounts, $info);

    }

    $date_from=$year."-01-01";
    $date_to=$year."-12-31";

    // Total amount received in the year
    $amountreceivedFinal =$conn->getDateAdTotalAmountReceived("range",$date_from,$date_to,$status,$status_value,$country_code);

    // Total commission paidout in the year
    $commissionPaidFinal =$conn->getDateAdTotalCommissionPaidOut("range",$date_from,$date_to,$status,$status_value,$country_code);

    // Total  after commission paidout in the year
    $afterCommissionFinal =$conn->getDateAdTotalAfterCommission("range",$date_from,$date_to,$status,$status_value,$country_code);

    $finalTotals=array('amountreceivedFinal'=>$amountreceivedFinal,'commissionPaidOutFinal'=>$commissionPaidFinal,'afterCommissionFinal'=>$afterCommissionFinal);

    array_push($monthAmounts, $finalTotals);

    echo json_encode($monthAmounts);

?>