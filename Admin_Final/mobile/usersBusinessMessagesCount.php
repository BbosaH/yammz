<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	

	$count = 0;
	
	if(count($errors) == 0 && isset($_REQUEST["id"])){
		$id = intval($_REQUEST["id"]);
		try{	

			//the interface of the application cannot accept an owner of a business
			//to send him self a message		
			
			//get unread messages that businesses have sent me
			$sql = "SELECT * FROM business_message WHERE user_id =  " . $id . 
			" AND is_from_user = 0 AND status = 0 ";
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				$count = $count + 1;
			}


		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($count);	
	
?>