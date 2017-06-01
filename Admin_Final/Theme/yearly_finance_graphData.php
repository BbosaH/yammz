<?php 
	require_once "classes/connector.php";
 	$conn = new connector();
 	
  $colors=array();
  $MonthTotal=array();
 	
 	$data=$_GET['data'];
 	$status=$_GET['status'];
  $country_code=$_GET['country_code'];

  // $data="TotalAfterCommission";
  // $status="all";
  // $country_code="UG";
  
 	if (strcmp($status, "all")==0) {
 		$status="";
    $status_value="";
 	}else{
    $status_value=$status;
    $status="yes";
  }

  $clientDate=$conn->getCountryLocalTime($country_code);

  $year=date("Y",strtotime($clientDate['localtime']));

  $min=0;
  $max=0;
    
  for ($i=1; $i <13 ; $i++) { 
    $month=$conn->getYearMonthDates($i,$year);

    $previous_TotalAmount=0;

      if (strcmp($data, "TotalAfterCommission")==0) {
        $TotalAmount=$conn->getDateAdTotalAfterCommission("range",$month['date_from'],$month['date_to'],$status,$status_value,$country_code);

      }else if (strcmp($data, "TotalAmountReceived")==0) {
        $TotalAmount=$conn->getDateAdTotalAmountReceived("range",$month['date_from'],$month['date_to'],$status,$status_value,$country_code);

      }else if (strcmp($data, "TotalCommissionPaidOut")==0) {
        $TotalAmount=$conn->getDateAdTotalCommissionPaidOut("range",$month['date_from'],$month['date_to'],$status,$status_value,$country_code);
      }


      $diff=$TotalAmount-$previous_TotalAmount;
      if ($diff <1) {
        $changeState=array("#BD2532");
      }else{
        $changeState=array("#5390E9");
      }

      array_push($colors, $changeState);

      // Finding the highest Total after commission
      if ($TotalAmount < $min) {
        $min=$TotalAmount;
      } 

      // Finding the lowest Total after commission
      if ($TotalAmount > $max) {
        $max=$TotalAmount;
      }  
 
      // Calculating the interval scale for the vertical axis
      $scale=($max-$min)/10;

      $info=array('y'=>$TotalAmount,'label'=>$month['month']." ".$year);
      array_push($MonthTotal, $info);

      $previous_TotalAmount=$TotalAmount;   
  }

    $finalArray=array(
      'color'=>$colors,
      'data'=>$MonthTotal,
      'scale'=>$scale
    );
    echo json_encode($finalArray);
?>