<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//check the person making this request
	$user = getUser();

	$res = false;


	if(count($errors) == 0 && isset($_REQUEST["id"]) ){
		$id = intval($_REQUEST["id"]);
		
		try{			

			$sql = "DELETE FROM user_friend  WHERE user_id = " . $user["id"] . 
			" AND friend_id = " . $id;

			$res = $conn->query($sql);

		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($res);	
	
?>