<?php
 ob_start();

	//include data base connection
	include_once("db_connection.php");
	
	//include the utility
	include_once("utility.php");
	
	//check the person making this request
	$user = getUser();

	$tst = "";
	$users = array();
	//you can only continue if there are no errors though
	if(count($errors) == 0){
		try{
			$friendIds = array();
			//get all the guys friends
			$sql = "SELECT * FROM user_friend WHERE user_id = ". $user["id"]  ;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	array_push($friendIds, intval($row["friend_id"]));
		    }

		    $sql = "SELECT * FROM user_friend WHERE friend_id = ". $user["id"] ;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	array_push($friendIds, intval($row["user_id"]));
		    }
		    //the where the string
		    $str = "";
		    for($i = 0; $i < count($friendIds); $i++){
		    	$str = $str . " id != " . $friendIds[$i] . " AND ";
		    }
		    $str = $str . " id !=  " . $user["id"] ;

			$sql = "SELECT * FROM user WHERE ". $str ." ORDER BY reviews_count DESC LIMIT 20" ;
		    $tst = $sql;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisUser = getUserOfId(intval($row["id"]));
		    	$thisUser["reviews_count"] = $row["reviews_count"];
		    	array_push($users, $thisUser);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
	}
	
	

	respond($users);
  
?>