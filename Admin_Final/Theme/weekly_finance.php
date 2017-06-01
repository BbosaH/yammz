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
 	}else{
    $status_value=$status;
    $status="yes";
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

      $prev_date=$conn->getPrevioiusDate($date);
   		// $dayId=date(format)te("N",strtotime($date)); $prev_date=$conn->getPrevioiusDate($date);
   		$dayName=date("D",strtotime($date));

 		if (strcmp($data, "totalAmountReceived")==0) {
	 		$TotalAmount=$conn->getDateAdTotalAmountReceived("",$date,"",$status,$status_value,$country_code);

      $previous_dayAmount=$conn->getDateAdTotalAmountReceived("",$prev_date,"",$status,$status_value,$country_code);

	 	}else if(strcmp($data, "TotalAfterCommission")==0){
	 		$TotalAmount=$conn->getDateAdTotalAfterCommission("",$date,"",$status,$status_value,$country_code);

      $previous_dayAmount=$conn->getDateAdTotalAfterCommission("",$prev_date,"",$status,$status_value,$country_code);

	 	}else if(strcmp($data, "TotalCommissionPaidOut")==0){
      $TotalAmount=$conn->getDateAdTotalCommissionPaidOut("",$date,"",$status,$status_value,$country_code);
     
      $previous_dayAmount=$conn->getDateAdTotalCommissionPaidOut("",$prev_date,"",$status,$status_value,$country_code);
    }
   	
    if($TotalAmount > $previous_dayAmount){
   			$changeState="Rise";
   		}else{
        $changeState="Dropdown";
      }

      // $todayStamp=strtotime($today);
      // $dateStamp=strtotime($date);
      // if ($todayStamp== $dateStamp){
      //   $dayName=$dayName;
      // }
      
      // $dayName=$dayName;
      // $day_suffix=$conn->addOrdinalNumberSuffix(date("d",$dateStamp));

   		// $previous_dayAmount=$TotalAmount;

   		$info=array('changeState'=>$changeState,'TotalAmount'=>$TotalAmount,'day_name'=>$dayName,'date'=>$date);
   		array_push($dayAmounts, $info);
   	}

     // Arranging data from monday to sunday
    // $arrangedDays=array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
     $arrangedDays=array("Sun","Sat","Fri","Thu","Wed","Tue","Mon");
    $arrangedFinalData=array();
    foreach ($arrangedDays as $value) {

      foreach ($dayAmounts as $key => $value2) {
        if (strcmp($value, $value2['day_name'])==0) {

          $todayStamp=strtotime($today);
          $dateStamp=strtotime($value2['date']);
          if ($todayStamp== $dateStamp){
            $dayName="Today"." ".$conn->addOrdinalNumberSuffix(date("d",$dateStamp));;
          }else{
            $Name=date("D",strtotime($value2['date']));
            $dayName=$Name." ".$conn->addOrdinalNumberSuffix(date("d",$dateStamp));
          }
          
          // $dayName=$dayName;
          // $day_suffix=$conn->addOrdinalNumberSuffix(date("d",$dateStamp));

         $tdata=array('TotalAmount'=>$value2['TotalAmount'],'day_name'=>$dayName,'changeState'=>$value2['changeState']);
         array_push($arrangedFinalData,  $tdata);     

        }
      }
    
    }

    echo json_encode($arrangedFinalData);

?>