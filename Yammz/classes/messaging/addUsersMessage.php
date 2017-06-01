<?php
	//include data base connection
	include_once("../db_connection.php");

	//include the utility
	//include_once("utility.php");

	//check the person making this request
	//$user = getUser();

	//i will pass the current session user_id from ethe browser hencce i dnt need the utility include

	$thisMessage = array();
	
	//get the data that was post
	$postdata = "";
	if(count($errors) == 0 && isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);
		//echo "<img src='".$post->banner."' />";
		//respond($myBusinesses);

		try{			
			
			//add a comment 
			$sql = "INSERT INTO user_message 
			(user_id, sender_id, details, date_created, status )VALUES 
			(".$post->user_id.",".$user['id'].",'".addslashes($post->details)."',".time().", 0)";
    		
			$conn->exec($sql);

			$messageId = $conn->lastInsertId();

			//get back this message
			$thisMessage  = getUserMessageOfId($messageId);

			//add this to your wall
			
			//nyd
			//add this as a notification to you and all your followers
			

		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($thisMessage);	
	
?>