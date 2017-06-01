<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//check the person making this request
	$user = getUser();

	$messages = array();
	
	//get the data that was post
	$postdata = "";
	if(count($errors) == 0 && isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);
		//echo "<img src='".$post->banner."' />";
		//respond($myBusinesses);

		try{	

			//update the messages to seen that this user sent me
			$sql = "UPDATE user_message SET status = 2 WHERE user_id =  " . $user["id"] .
			" AND sender_id = " . $post->user_id;
			$res = $conn->query($sql);
			
			//add a comment 
			$sql = "SELECT * FROM user_message WHERE ( user_id =  " . $user["id"] . 
			" AND sender_id = " . $post->user_id . 
			" ) OR  ( user_id = " . $post->user_id  . 
			" AND sender_id = " . $user["id"] . 
			" ) ORDER BY date_created ASC ";
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				$thisMessage = array();
				foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			$thisMessage[$key] = is_numeric($value) ? intval($value) : $value;
		    		}
		    	}
		    	$thisMessage["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	//$thisMessage["status"] = 2; 
		    	array_push($messages, $thisMessage);
			}

			


		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($messages);	
	
?>