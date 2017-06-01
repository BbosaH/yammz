<?php 

	include("classes/connector.php");
	$conn = new connector();
	
	$id=$_GET['id']; 
	$password=$_GET['new_password'];
	$pssw=$conn->Change_password($id,$password);
	
	$resp="";
	foreach($pssw as $pd){
		$resp=$pd['response'];	
	}
	$true="true";
	if(strcmp($resp,"true")==0){
		
		$conn->success_alert("Password successfully changed");
	
	}
	else{
		
		$conn->Error_alert("Password change failed");
	}

?>