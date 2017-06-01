<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//check the person making this request
	$user = getUser();

	$outcome = false;
	
	//get the data that was post
	$postdata = "";
	if(count($errors) == 0 && isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);
		//echo "<img src='".$post->banner."' />";
		//respond($myBusinesses);

		try{
			
			//add a comment
			$sql = "DELETE FROM business_follower WHERE id = ".$post->follower_id;
    		
			$conn->exec($sql);

			$outcome = true;
      
		}catch(PDOException $e)
  	{
  		array_push($errors, $e->getMessage());
  	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($outcome);
	
?>