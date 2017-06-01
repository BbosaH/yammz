<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//check the person making this request
	$user = getUser();

	$messages = array();
	
	if(count($errors) == 0 ){
		
		try{			
			
			//get the business claimed for this user
			$sql = "SELECT * FROM business WHERE owner_id = " . $user["id"];
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				$thisBusiness = getBusinessOfId(intval($row["id"]));
				//get the messages
				$thisBusiness["messages"] = getMessagesOfBusinessOfId(intval($row["id"]));
				array_push($messages, $thisBusiness);
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