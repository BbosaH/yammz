<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	if(isset($_REQUEST['id'])){
		$id = $_REQUEST['id'];
		try{
			
			//check the person's id making this request
			$testUser = getUserOfFacebookById($id);
			$user =$testUser;
		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($user);	