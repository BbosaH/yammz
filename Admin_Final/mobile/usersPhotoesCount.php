<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	

	$count = 0;
	
	if(count($errors) == 0 && isset($_REQUEST["id"])){
		$id = intval($_REQUEST["id"]);
		try{			
			
			//add a comment 
			$sql = "SELECT * FROM business_photo WHERE user_id =  " . $id ;

			
    		
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