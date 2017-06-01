<?php

	//include data base connection
	include_once("db_connection.php");
	
	//include the utility
	include_once("utility.php");
	//this is open anyone can have access 

	//load settings 
	loadSettings();

	$results = null;

	//get the user id
	$user_id = 0;
	if(isset($_REQUEST['user_id'])){
		$user_id = intval($_REQUEST['user_id']);
	}else{
		array_push($errors, "You need to supply a user id");
	}

	//you can only continue if there are no errors though
	if(count($errors) == 0){
		try{
			$results = getUserOfId($user_id, true);
		}catch(PDOException $e)
		{			
			array_push($errors, $e->getMessage());
		}
	}

	respond($results);


?>