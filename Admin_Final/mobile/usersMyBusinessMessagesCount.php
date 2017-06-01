<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	

	$count = 0;
	
	if(count($errors) == 0 && isset($_REQUEST["id"])){
		$id = intval($_REQUEST["id"]);
		try{	

			//get the businesses of this user
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