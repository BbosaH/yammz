<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	

	$count = 0;
	
	if(count($errors) == 0 && isset($_REQUEST["id"])){
		$id = intval($_REQUEST["id"]);
		try{	

			//unread messages
			$sql = "SELECT * FROM user_message WHERE user_id =  " . $user["id"] . 
			" AND status = 0 ";
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				$thisUserx = getUserOfId($row["sender_id"]);
				if($thisUserx["id"] == 0){
					continue;
				}
				$count = $count + 1;
			}


			//business messages count
			$sql = "SELECT * FROM business_message WHERE user_id =  " . $id . 
			" AND is_from_user = 0 AND status = 0 ";
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				$count = $count + 1;
			}

			//friend request count
			$sql = "SELECT * FROM user_friend WHERE user_id =  " . $id . 
			" AND status = 1 ";
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				$count = $count + 1;
			}

			//mybusiness messages count
			$myBusinesses = getBusinessesOwnedByUserOfID($id);	
			
			//var_dump($myBusinesses);
			//foreach business get the unread messages
			for($i=0;$i<count($myBusinesses); $i++){
				$thisBusiness = $myBusinesses[$i];
				//get unread messages that users have sent to this business
				$sql = "SELECT * FROM business_message WHERE business_id =  " . $thisBusiness["id"] . " AND is_from_user = 1 AND status = 0 ";
	    		
				$res = $conn->query($sql);
				foreach ($res as $row ) {
					$count = $count + 1;
				}
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