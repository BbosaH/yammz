<?php 
	require_once "classes/connector.php";
 	$conn = new connector();
 	
  $monthTotal=array();
 
 	$status=$_GET['status'];
  $country_code=$_GET['country_code'];

  // $status="all";
  // $country_code="UG";
  
 	if (strcmp($status, "all")==0) {
    $status_value="";
    $status="";   
  }else{
    $status_value=$status;
    $status="yes";
  }

  $clientDate=$conn->getCountryLocalTime($country_code);
	// $clientDate=array('localtime'=>'2016-09-27');

    $year=date("Y",strtotime($clientDate['localtime']));
    $month=date("m",strtotime($clientDate['localtime']));
    $day=date("d",strtotime($clientDate['localtime']));

    $weeks=$conn->getMonthlyWeekDates($year,$month);

    $amountreceivedFinal=0;
    $commissionPaidFinal=0;
    $afterCommissionFinal=0;

    foreach ($weeks as $key => $value) {      

      $TotalAfterCommission=$conn->getDateAdTotalAfterCommission("range",$value['from'],$value['to'],$status,$status_value,$country_code);

      $TotalCommissionPaidOut=$conn->getDateAdTotalCommissionPaidOut("range",$value['from'],$value['to'],$status,$status_value,$country_code);

      $TotalAmountReceived=$conn->getDateAdTotalAmountReceived("range",$value['from'],$value['to'],$status,$status_value,$country_code);


      $info=array('week'=>$key,'TotalAfterCommission'=>$TotalAfterCommission,'TotalCommissionPaidOut'=>$TotalCommissionPaidOut,'TotalAmountReceived'=>$TotalAmountReceived,'date'=>$value['to']);

      array_push($monthTotal, $info); 
    }

    $date_from=date("Y-m-01",strtotime($clientDate['localtime']));
    $date_to=date("Y-m-t",strtotime($clientDate['localtime']));


    $amountreceivedFinal  = $conn->getDateAdTotalAmountReceived("range",$date_from,$date_to,$status,$status_value,$country_code);

    $commissionPaidFinal  = $conn->getDateAdTotalCommissionPaidOut("range",$date_from,$date_to,$status,$status_value,$country_code);
    
    $afterCommissionFinal = $conn->getDateAdTotalAfterCommission("range",$date_from,$date_to,$status,$status_value,$country_code);

    $finalTotals=array('amountreceivedFinal'=>$amountreceivedFinal,'commissionPaidOutFinal'=>$commissionPaidFinal,'afterCommissionFinal'=>$afterCommissionFinal);

    array_push($monthTotal, $finalTotals);

    echo json_encode($monthTotal);
?>