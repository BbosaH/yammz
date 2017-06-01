<?php 

	include("classes/connector.php");
	$conn = new connector();
	
	$branch_id=$_GET['branchId']; 
	$department=$_GET['departmentId'];
	// $branch_id=1; 
	// $department=1;
	$pssw=$conn->getBranchSupervisors($branch_id,$department);
	
	echo json_encode($pssw);
	
?>