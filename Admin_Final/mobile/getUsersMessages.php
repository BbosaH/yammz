<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//check the person making this request
	$user = getUser();

	$chats = array();
	
	//get the data that was post
	$postdata = "";
	if(count($errors) == 0){
		try{			
			
			//add a comment 
			$sql = "SELECT * FROM user_message WHERE ( user_id =  " . $user["id"] . 
			" AND sender_id != " . $user["id"] . 
			" ) OR  ( user_id != " . $user["id"]  . 
			" AND sender_id = " . $user["id"] . 
			" ) ORDER BY date_created ASC ";

			
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				$wasSentToMe = false;
				$id = intval($row["user_id"]);
				if($id == intval($user["id"])){ //this message was sent to me
					$id = intval($row["sender_id"]);
					$wasSentToMe = true;
				}
				
				$thisUserx = getUserOfId($id);
				if($thisUserx["id"] == 0){
					continue;
				}
				if(array_key_exists($id,$chats) == false){
					$chats[$id] = array(
						"user" => null,
						"chats" => array(),
						"unread" => 0
					);
				}	
				$chats[$id]["user"] = $thisUserx;
				$thisMessage = array();
				foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			$thisMessage[$key] = is_numeric($value) ? intval($value) : $value;
		    		}
		    		$thisMessage["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	}
		    	if($thisMessage["status"] == 0 && $wasSentToMe == true){
		    		$chats[$id]["unread"] = $chats[$id]["unread"]  + 1;
		    	}
		    	array_push($chats[$id]["chats"], $thisMessage);
			}

		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($chats);	
	
?>