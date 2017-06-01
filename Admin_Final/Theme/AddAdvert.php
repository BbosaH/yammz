<?php 
	require_once('classes/connector.php');
	$conn = new connector();

	// $add_type_id=1;
	// $add_title="Nomis ad title";
	// $min_age=20;
	// $max_age=76;
	// $add_description="This is the testing description of the advert";
	// $ad_url="uploads/1.jpg";
	// $gender="male";
	// $currency="UGX";
	// $timezone="Africa/Kampala";
	// $account_country=2;
	// $marketing_agent_code="24536";
	// $folder_name=6;
	// $new_folder_name="Nomix";
	
	// $call_to_action_id=3;
	// $no_of_weeks=4;
	// $total_budget_cost=234500;

	// $business_id=5;

	$add_type_id=$_GET['add_type_id'];
	$add_title=$_GET['add_title'];
	$min_age=$_GET['min_age'];
	$max_age=$_GET['max_age'];
	$add_description=$_GET['add_description'];
	$ad_url=$_GET['ad_url'];
	// $ad_url="uploads/3504732_6_b.jpg";
	$gender=$_GET['gender'];
	$currency=$_GET['currency'];
	$timezone=$_GET['timezone'];
	$account_country=$_GET['account_country'];
	$marketing_agent_code=$_GET['agent_code'];
	$folder_name=$_GET['folder_name'];
	$new_folder_name=$_GET['new_folder_name'];
	
	$call_to_action_id=$_GET['call_to_action_id'];
	$no_of_weeks=$_GET['no_of_weeks'];
	$total_budget_cost=$_GET['total_budget_cost'];

	$business_id=$_GET['business_id'];

	$cost_per_week=$_GET['cost_per_week'];
	$exchange_rate=$_GET['exchange_rate'];


	$cities=json_decode(stripslashes($_GET['city_list']));
	$countries=json_decode(stripslashes($_GET['countries_list']));
	
	$categories=json_decode(stripslashes($_GET['category']));
	$subCategories=json_decode(stripslashes($_GET['subCategory']));

	$ad=$conn->AddAdvert($add_type_id,$add_title,$min_age,$max_age,$add_description,$ad_url,$gender,$currency,$timezone,$account_country,$marketing_agent_code,$folder_name,$new_folder_name,$call_to_action_id,$no_of_weeks,$total_budget_cost,$business_id,$cities,$countries,$categories,$subCategories,$cost_per_week,$exchange_rate);

	echo json_encode($ad);

?>