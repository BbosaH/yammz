<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//check the person making this request
	$user = getUser();

	$thisFollower = null;
	
	//get the data that was post
	$postdata = "";
	if(count($errors) == 0 && isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);
		//echo "<img src='".$post->banner."' />";
		//respond($myBusinesses);

		try{
			
			//add a comment
			$sql = "INSERT INTO user_follower (user_id, follower_id, date_created )VALUES
			(".$post->user_id.",".$user['id'].",".time().")";
    		
			$conn->exec($sql);

			$followerid = $conn->lastInsertId();

			//get back this follower
			$thisFollower  = getUserFollowOfId($followerid);

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

	respond($thisFollower);
	
?>