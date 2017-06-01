<?php 
	require_once "classes/connector.php";
 	$conn = new connector();

 	$dayAmounts=array();	

 	// $data=$_GET['data'];
 	$status=$_GET['status'];
 	$country_code=$_GET['country_code'];

  // $status="all";
  // $dateKey="today";
  $dateValue1="";
  $dateValue2="";

    $country_code="UG";

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

    $Daytoday=date("d",strtotime($clientDate['localtime']));
    for ($i=$Daytoday; $i >= $min_weekDates[$week] && $i >=$Daytoday-3  ; $i--) { 

      $date=$year."-".$month."-".$i;

      $dayName=date("D",strtotime($date));

      $totalAmountReceived=$conn->getDateAdTotalAmountReceived("",$date,"",$status,$status_value,$country_code);

      $TotalAfterCommission=$conn->getDateAdTotalAfterCommission("",$date,"",$status,$status_value,$country_code);

      $TotalCommissionPaidOut=$conn->getDateAdTotalCommissionPaidOut("",$date,"",$status,$status_value,$country_code);      

      $todayStamp=strtotime($today);
      $dateStamp=strtotime($date);
      if ($todayStamp== $dateStamp){
        $dayName="Today";
      }
      
      $dayName=$dayName." ".$conn->addOrdinalNumberSuffix(date("d",$dateStamp));

      $info=array('TotalCommissionPaidOut'=>$TotalCommissionPaidOut,'TotalAfterCommission'=>$TotalAfterCommission,'totalAmountReceived'=>$totalAmountReceived,'day_name'=>$dayName);
      array_push($dayAmounts, $info);

    }
   
      $weekDates=$conn->getStartEndOFMonthWeek($week,$year,$month);

      // Getting total amount received for the whole week
      $amountreceivedFinal = $conn->getDateAdTotalAmountReceived("range",$weekDates['date_from'],$weekDates['date_to'],$status,$status_value,$country_code);

       // Getting total commission paid out for the whole week

      $commissionPaidFinal =$conn->getDateAdTotalCommissionPaidOut("range",$weekDates['date_from'],$weekDates['date_to'],$status,$status_value,$country_code);

      // Getting total after commission paid out for the whole week
      $afterCommissionFinal =$conn->getDateAdTotalAfterCommission("range",$weekDates['date_from'],$weekDates['date_to'],$status,$status_value,$country_code);


    $finalTotals=array('amountreceivedFinal'=>$amountreceivedFinal,'commissionPaidOutFinal'=>$commissionPaidFinal,'afterCommissionFinal'=>$afterCommissionFinal);

    array_push($dayAmounts, $finalTotals);

    echo json_encode($dayAmounts);

?>