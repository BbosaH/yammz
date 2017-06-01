<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//check the person making this request
	$user = getUser();

	$businesses = array();
	
	if(count($errors) == 0 ){
		
		try{			
			
			//get the business favorited for this user
			$sql = "SELECT * FROM business_favorite WHERE user_id = " . $user["id"];
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				$thisBusiness = getBusinessOfId(intval($row["business_id"]));
				array_push($businesses , $thisBusiness);
			}

		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($businesses);	
	
?>