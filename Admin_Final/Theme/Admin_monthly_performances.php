<?php 
	session_start();
	require_once "classes/connector.php";
 	$conn = new connector();

	$month=$_GET['month'];
	$year=$_GET['year'];
	
	$id=$_GET["id"];
	// $id="11217398596135766";
	$goal="Achieved";
	$ads_worked_on=0;
	$extra_ads=0;
	$monthly_total=0;
	$approved=0;

	$declined=0;
 
  	$total_monthly=$conn->getAdminTotalAdsInMonth($month,$id);
  	foreach ($total_monthly as $key => $value) {
  		$monthly_total=$value['result'];
  	}

	$monthly_declined=$conn->getAdminAdsDeclinedInMonth($month,$id);
	foreach ($monthly_declined as $key => $value) {
  		$declined=$value['result'];
  	}

	$monthly_approved=$conn->getAdminAdsApprovedInMonth($month,$id);

	foreach ($monthly_approved as $key => $value) {
  		$approved=$value['result'];
  	}

	$total_work=$declined+$approved;
	$diff=$monthly_total-$total_work;

	if($diff <=0){
		$goal="Achieved";
		$extra_ads=$total_work-$monthly_total;
	}else{
		$goal="Not Achieved";
	}

	
                                
	$data=array(
		'ads_worked_on' =>$total_work ,
		'goal' =>$goal,
		'extra_ads' =>$extra_ads		
		
		);

	echo json_encode($data);
	
 ?>