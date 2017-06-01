<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//check the person making this request
	$user = getUser();

	$messages = 0;
	
	//get the data that was post
	$postdata = "";
	if(count($errors) == 0){
		
		try{	

			
			//get unread messages that they have sent me
			$sql = "SELECT * FROM user_message WHERE user_id =  " . $user["id"] . 
			" AND status = 0 ";
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				$thisUserx = getUserOfId($row["sender_id"]);
				if($thisUserx["id"] == 0){
					continue;
				}
				$messages = $messages + 1;
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