<?php 
	require_once "classes/connector.php";
 	$conn = new connector();

 	$dayAmounts=array();
 	//$clientDate=$conn->getCountryLocalTime("UG"); To be uncommented when having internet availability
 	$data=$_GET['data'];
 	$status=$_GET['status'];
  $country_code=$_GET['country_code'];

  // $data="TotalAfterCommission";
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

    // $SortedArray=$conn->moveElementInArray($dates,"Mon",0);

   	$previous_dayAmount=0;
   	$changeState="Rise";

    $colors=array();

    $min=0;
    $max=0;
   	foreach ($dates as $key => $value) {
   		$date=$value->format('Y-m-d');

   		// $dayId=date("N",strtotime($date));
   		$dayName=date("D",strtotime($date));


   	if (strcmp($data, "totalAmountReceived")==0) {

	 		$TotalAmount=$conn->getDateAdTotalAmountReceived("",$date,"",$status,$status_value,$country_code);
      $prev_date=$conn->getPrevioiusDate($date);
      $previous_dayAmount=$conn->getDateAdTotalAmountReceived("",$prev_date,"",$status,$status_value,$country_code);

	 	}else if(strcmp($data, "TotalAfterCommission")==0){

	 		$TotalAmount=$conn->getDateAdTotalAfterCommission("",$date,"",$status,$status_value,$country_code);

      $prev_date=$conn->getPrevioiusDate($date);
      $previous_dayAmount=$conn->getDateAdTotalAfterCommission("",$prev_date,"",$status,$status_value,$country_code);

	 	}else if(strcmp($data, "TotalCommissionPaidOut")==0){

      $TotalAmount=$conn->getDateAdTotalCommissionPaidOut("",$date,"",$status,$status_value,$country_code);

      $prev_date=$conn->getPrevioiusDate($date);
      $previous_dayAmount=$conn->getDateAdTotalCommissionPaidOut("",$prev_date,"",$status,$status_value,$country_code);
    }
    
   		// Finding the highest total day amount received
   		if ($TotalAmount > $max) {
        $max=$TotalAmount;
      }

      // Finding the lowest total day amount received
      if ($TotalAmount < $min) {
        $min=$TotalAmount;
      }

   		$diff=$TotalAmount-$previous_dayAmount;
   		if ($diff <0 ){
   			$changeState=array("#BD2532");
   		}else{
   			$changeState=array("#5390E9");
   		}

      $daysuffix=$conn->addOrdinalNumberSuffix(date("d",strtotime($date)));

   		$info=array('TotalAmount'=>$TotalAmount,'day'=>$dayName,'color'=>$changeState,'daySuffix'=> $daysuffix);
   		array_push($dayAmounts, $info);

      // $previous_dayAmount=$TotalAmount;
   	}

    // Calculating the interval scale for the graph in 10 grids vertically
    $scale= ($max-$min)/10;

    // Arranging data from monday to sunday
    $arrangedDays=array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
    $arrangedFinalData=array();
    foreach ($arrangedDays as $value) {

      foreach ($dayAmounts as $key => $value2) {
        if (strcmp($value, $value2['day'])==0) {

         $tdata=array('y'=>$value2['TotalAmount'],'label'=>$value2['day']." ".$value2['daySuffix']);
         array_push($arrangedFinalData,  $tdata);

          array_push($colors, $value2['color']);      

        }
      }
    
    }
    

    // $colors="#5390E9,#BD2532";
    $finalArray=array(
      'color'=>$colors,
      'data'=>$arrangedFinalData,
      'interval'=>$scale
    );
    echo json_encode($finalArray);

?>