<?php 
	
	require_once "classes/connector.php";
 	$conn = new connector();

	$month=DATE('m');
	$year=DATE('Y');
	
	$id=$_GET["id"];
	// $id="11217398596135766";
	$goal="Achieved";
	$ads_worked_on=0;
	$extra_ads=0;
	$monthly_total=0;
	$approved=0;

	$declined=0;
 
  	$total_monthly=$conn->getAdminTotalAdsInMonth($month,$id,$year);
  	foreach ($total_monthly as $key => $value) {
  		$monthly_total=$value['result'];
  	}

	$monthly_declined=$conn->getAdminAdsDeclinedInMonth($month,$id,$year);
	foreach ($monthly_declined as $key => $value) {
  		$declined=$value['result'];
  	}

	$monthly_approved=$conn->getAdminAdsApprovedInMonth($month,$id,$year);

	foreach ($monthly_approved as $key => $value) {
  		$approved=$value['result'];
  	}

	$total_work=$declined+$approved;
	$diff=$monthly_total-$total_work;

	$print_color="#BE2633";

	if($diff <=0 && $total_work >=1){
		$goal="Achieved";
		$extra_ads=$total_work-$monthly_total;
		$print_color="#4EA280";

	}else{
		$goal="Not Achieved";
	}


	// $total_work=10;
	// $goal=75;
	// $extra_ads=35;
                                
	// $data=array(
	// 	'ads_worked_on' =>$total_work ,
	// 	'goal' =>$goal,
	// 	'extra_ads' =>$extra_ads		
		
	// 	);

	// echo json_encode($data);
	
 ?>