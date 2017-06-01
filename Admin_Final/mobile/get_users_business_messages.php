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
			
			//add a comment 
			$sql = "SELECT * FROM business_message WHERE business_id = " .$post->business_id ." AND user_id = " .$user['id'] . " ORDER BY date_created ASC ";
    		
			$res = $conn->query($sql);

			foreach ($res as $row ) {
				$thisMessage = array();
				foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			$thisMessage[$key] = is_numeric($value) ? intval($value) : $value;
		    		}
		    	}
		    	$thisMessage["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
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