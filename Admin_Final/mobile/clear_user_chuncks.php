<?php
	
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");
	//get the user who is making this request
	$user = getUser();

	if(count($errors) > 0){
		respond(false);
	}else{
		deleteUserChunks(intVal($user["id"]));
		respond(true);
	}

			
?>