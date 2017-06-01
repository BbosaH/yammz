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
			
			//get the businesses that have not yet been claimed
			//and they are not under active claiming by him
			$sql = "SELECT * FROM business WHERE owner_id  IS NULL " ;   		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				//check that it is not under claiming by this user
				$sql = "SELECT * FROM user_business_claim WHERE user_id = " . $user["id"] . " AND business_id = " . $row["id"] 	;
				$res2 = $conn->query($sql);
				$hasRecord = false;
				foreach ($res2 as $row2 ) {
					$hasRecord = true;
				}
				if($hasRecord == true){
					continue;
				}
				$thisBusiness = getBusinessOfId(intval($row["id"]));
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