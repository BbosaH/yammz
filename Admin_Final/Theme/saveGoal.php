<?php 
	session_start();
	require_once "classes/connector.php";
 	$conn = new connector();

	$id=$_GET['id'];
	$goal=$_GET['goal'];

	$user_type=$_SESSION['admin_type']; //Admin level	
	
	// $Error="yes";
	// $content="Just on the server";

	if(strcmp($user_type, "Manager")==0){
		$goal=$conn->Assign_Goal_ToSupervisor($id,$goal);
	}elseif(strcmp($user_type, "Supervisor")==0){
		$goal=$conn->Assign_Goal_ToOperator($id,$goal);
	}
	foreach ($goal as $key => $value) {
		$Error=$value['Error'];
		$content=$value['content'];
	}

	    
	$data=array(
		'Error' =>$goal ,
		'content'=>$content

	);

	// $goal=$conn->Assign_Goal_ToSupervisor($id,$goal);

	// var_dump($data);

	echo json_encode($goal);
	
 ?>