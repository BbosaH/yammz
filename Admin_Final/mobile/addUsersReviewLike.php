<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//check the person making this request
	$user = getUser();

	$thisLike = array();
	
	//get the data that was post
	$postdata = "";
	if(count($errors) == 0 && isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);
		//echo "<img src='".$post->banner."' />";
		//respond($myBusinesses);

		try{			
			
			//add a comment 
			$sql = "INSERT INTO " . $databasename.".like 
			 (user_id, newsfeed_id, comment_id, date_created )VALUES 
			(".$user['id'].",".$post->newsfeed_id.",0,".time().")";
    		
			$conn->exec($sql);

			$likeID = $conn->lastInsertId();

			//get back this like
			$thisLike  = getLikeOfId($likeID);

			//add this to your wall
			
			//nyd
			//add this as a notification to you and all your followers
			

		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($thisLike);	
	
?>