<?php 
	session_start();
	require_once "classes/connector.php";
 	$conn = new connector();

	// $id=$_GET['id'];
	// $goal=$_GET['goal'];

	// $user_type=$_SESSION['admin_type']; 	
	
	// $Error="yes";
	// $content="Just on the server";
	
	// if(strcmp($user_type, "Manager")==0){
	// 	EditSupervisorGoal($id,$goal)
	// }elseif(strcmp($user_type, "Supervisor")==0){
	// 	$goal=$conn->Assign_Goal_ToOperator($id,$goal);
	// }
	// foreach ($goal as $key => $value) {
	// 	$Error=$value['Error'];
	// 	$content=$value['content'];
	// }

	    
	// $data=array(
	// 	'Error' =>$Error ,
	// 	'content'=>$content
		
	// );

	// var_dump($data);

	// echo json_encode($data);
	echo "Nomis wilson the great";
	
 ?>