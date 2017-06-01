<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	

	$notifications = array();
	
	if(count($errors) == 0 && isset($_REQUEST["id"]) && isset($_REQUEST["lastid"])){
		$id = intval($_REQUEST["id"]);
		$lastid =  intval($_REQUEST["lastid"]);
		try{				
			
			$sql = "SELECT * FROM user_notification WHERE user_id =  " . $id . 
			" AND id > " . $lastid;

			//respond($sql);	
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				//update this notification as read
				$sql = "UPDATE user_notification SET status = 1 WHERE id = " .$row["id"];
				$conn->exec($sql);

				$thisNotification = array(
					"id" => $row["id"],
					"details" => $row["details"],
					"date_created" =>  date("Y/m/d H:i:s",$row["date_created"]),
					"type" => $row["type"],
					"status" => 1,
					"origin_id" => $row["origin_id"]
				);

				//if its typea
				if(strcasecmp("typea", $row["type"]) == 0){
					//get the person who made was responsible for this
					$origin = getUserOfId($row["origin_id"]);
					$thisNotification["details"] = "<b>".$origin["name"]."</b> " . $thisNotification["details"];
				}
				//if its typeb
				if(strcasecmp("typeb", $row["type"]) == 0){
					//get owner of the review
					$owner = getUserOfId(intval($thisNotification["details"]));
					//get the person who made was responsible for this
					$origin = getUserOfId($row["origin_id"]);
					$thisNotification["details"] = "<b>".$origin["name"]."</b> commented on <b>" . $owner["name"] . "</b>\'s review";
				}

				array_push($notifications, $thisNotification);
			}

		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($notifications);	
	
?>