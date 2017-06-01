<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	

	$friends = array();
	
	if(count($errors) == 0 && isset($_REQUEST["id"])){
		$id = intval($_REQUEST["id"]);
		try{			
			
			$friends = getFriendsOfUserOfId($id);

		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($friends);	
	//0771061008 daada
?>