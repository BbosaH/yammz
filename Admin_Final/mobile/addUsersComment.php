<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//check the person making this request
	$user = getUser();

	$thisComment = array();
	
	//get the data that was post
	$postdata = "";
	if(count($errors) == 0 && isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);
		//echo "<img src='".$post->banner."' />";
		//respond($myBusinesses);

		try{	
			//get all those that have commented on this review
			//apart form this user
			$commenters = array();
			$sql = "SELECT * FROM comment WHERE review_id = " . $post->review_id . " 
			AND user_id != ". $user['id'];
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				array_push($commenters, array("id" => $row["user_id"],"finised" => false));
			}
			
			//add a comment 
			$sql = "INSERT INTO comment 
			(user_id, review_id, kind, details, date_created, commenTo )VALUES 
			(".$user['id'].",".$post->review_id.",'normal','".$post->details."',".time().",".$post->commenTo.")";
    		
			$conn->exec($sql);

			$commentId = $conn->lastInsertId();

			//get back this comment
			$thisComment  = getCommentOfId($commentId);

			//update the number of reviews for the user
			$sql = "SELECT * FROM USER WHERE id = " . $user['id'];
			$res = $conn->query($sql);
			$cnt = 0;
			foreach ($res as $row ) {
				$cnt = intval($row["reviews_count"]);
				break;
			}
			$cnt = $cnt + 1;
			$sql = "UPDATE USER SET reviews_count = " .  $cnt . " WHERE id = " . $user['id'];
			$conn->exec($sql);

			//get the newsfeed
			$thisNewsFeed = getReviewOfId(intval($post->review_id));

			//Notifications generated
			//typea
			//the owner of the review receives a notification saying that 
			//Steven B. commented on your review
			$sql  = "INSERT INTO `user_notification`( 
				`user_id`, `type`, `details`,  `origin_id`, `status`, date_created) VALUES (
				".$thisNewsFeed["user_id"].", 'typea', 'commented on your review',".$user['id'].", 0, ".time().")";
			$conn->exec($sql);
			//typeb
			//to the commenters
			foreach ($commenters as $commenter) {
				$sql = "INSERT INTO `user_notification`( 
				`user_id`, `type`, `details`,  `origin_id`, `status`, date_created) VALUES (
				".$commenter["id"].", 'typeb', '".$thisNewsFeed["user_id"]."',
				".$user['id'].", 0, ".time().")";
				$conn->exec($sql);
			}

			
		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($thisComment);	
	
?>