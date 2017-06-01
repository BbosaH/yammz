<?php 
	require_once "classes/connector.php";
 	$conn = new connector();

 	$dayAmounts=array();	

 	$data=$_GET['data'];
 	$status=$_GET['status'];
 	$country_code=$_GET['country_code'];

 	if (strcmp($status, "all")==0) {
 		$status="";
 		$status_value="";
 	}

  $clientDate=$conn->getCountryLocalTime($_GET['country_code']);
	
    $year=date("Y",strtotime($clientDate['localtime']));
    $month=date("m",strtotime($clientDate['localtime']));
    $day=date("d",strtotime($clientDate['localtime']));

    $today=date("Y-m-d",strtotime($clientDate['localtime']));
    $week=$conn->getWeekfromMonthday($clientDate['localtime']);

    $dates=$conn->getStartEndOFMonthWeek($week,$year,$month);

    $date_from=$dates['date_from'];
    $date_to=$dates['date_to'];

  	// Getting dates of the current week
  	$dates=$conn->dateRange($date_from,$date_to);
   
   	$previous_dayAmount=0;
   	$changeState="Rise";
   	foreach ($dates as $key => $value) {
   		$date=$value->format('Y-m-d');

   		// $dayId=date("N",strtotime($date));
   		$dayName=date("D",strtotime($date));

   		if (strcmp($data, "totalAmountReceived")==0) {
	 		$TotalAmount=$conn->getDateAdTotalAmountReceived("",$date,"",$status,"",$country_code);
	 	}else if(strcmp($data, "TotalAfterCommission")==0){
	 		$TotalAmount=$conn->getDateAdTotalAfterCommission("",$date,"",$status,"",$country_code);
	 	}
   		
   		
   		$diff=$TotalAmount-$previous_dayAmount;
   		if ($diff <1) {
   			$changeState="Dropdown";
   		}else{
   			$changeState="Rise";
   		}

      $todayStamp=strtotime($today);
      $dateStamp=strtotime($date);
      if ($todayStamp== $dateStamp){
        $dayName="Today";
      }
      
      $dayName=$dayName." ".$conn->addOrdinalNumberSuffix(date("d",$dateStamp));

   		$previous_dayAmount=$TotalAmount;

   		$info=array('changeState'=>$changeState,'TotalAmount'=>$TotalAmount,'day_name'=>$dayName);
   		array_push($dayAmounts, $info);
   	}

    echo json_encode($dayAmounts);

?>