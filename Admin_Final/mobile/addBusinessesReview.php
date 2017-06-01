<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//load settings 
	loadSettings();

	//check the person making this request
	$user = getUser();
	
	//get the data that was post
	$postdata = "";
	if(count($errors) == 0 && isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);
		//echo "<img src='".$post->banner."' />";
		//respond($myBusinesses);

		try{			
			
			//add a business review
			$sql = "INSERT INTO newsfeed 
			(date_created, user_id, kind, cost, good, details, business_id)VALUES 
			(".time().", ".$user['id'].", 'review', ". $post->cost .", ". $post->good.", '".$post->comment."', ".$post->business_id.")";
    		
			$conn->exec($sql);

			$newsFeedId = $conn->lastInsertId();

			//nyd
			//adjust the business's rating


			//add this to your wall
			$sql = "INSERT INTO user_wall 
			(user_id, review_id, date_created )VALUES 
			(".$user['id'].", ".$newsFeedId.",".time().")";
    		
			$conn->exec($sql);
			
			//nyd
			//add this as a notification to you and all your followers
			

		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond(true);	
	
?>