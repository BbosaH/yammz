<?php 
	require_once "classes/connector.php";
 	$conn = new connector();
 	
  $colors=array();
  $WeekTotal=array();
 	//$clientDate=$conn->getCountryLocalTime("UG"); To be uncommented when having internet availability
 	$data=$_GET['data'];
 	$status=$_GET['status'];
  $country_code=$_GET['country_code'];
  
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

    $min=0;
    $max=0;
    $previous_TotalAmount=0;
    foreach ($weeks as $key => $value) {
      
      if (strcmp($data, "TotalAfterCommission")==0) {
      $TotalAmount=$conn->getDateAdTotalAfterCommission("range",$value['from'],$value['to'],$status,$status_value,$country_code);
      }else if (strcmp($data, "TotalCommissionPaidOut")==0) {
        $TotalAmount=$conn->getDateAdTotalCommissionPaidOut("range",$value['from'],$value['to'],$status,$status_value,$country_code);
        
      }else if (strcmp($data, "totalAmountReceived")==0) {
        $TotalAmount=$conn->getDateAdTotalAmountReceived("range",$value['from'],$value['to'],$status,$status_value,$country_code);
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

      $displ=$key." ".$value['to'];    

      $info=array('y'=>$TotalAmount,'label'=>$displ);
      array_push($WeekTotal, $info);

      $previous_TotalAmount=$TotalAmount;
    }

    $finalArray=array(
      'color'=>$colors,
      'data'=>$WeekTotal,
      'scale'=>$scale
    );
    echo json_encode($finalArray);
?>