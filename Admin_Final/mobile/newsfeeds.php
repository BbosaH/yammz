<?php

	//include data base connection
	include_once("db_connection.php");
	
	//include the utility
	include_once("utility.php");
	//load settings
	loadSettings();
	//get the user who is making this request
	$user = getUser();

	$newsfeeds = array();
	//you can only continue if there are no errors
	if(count($errors) == 0){
		$lastid = 0;
		//check the last id
		if(isset($_REQUEST['lastid'])){
			$lastid = $_REQUEST['lastid'];
		}
		//get news feeds for this user from his wall
		try{

			$sql = "SELECT * FROM user_wall WHERE user_id = ". $user['id'] ." AND  review_id > ". $lastid ." LIMIT " . $settings["newsfeed_chunk"];
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisNewsFeed = getNewsFeedOfId($row["review_id"]);
		    	array_push($newsfeeds, $thisNewsFeed);
		    }
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
	}

	respond($newsfeeds);

	

?>