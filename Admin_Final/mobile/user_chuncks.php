<?php
	
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");
	//get the user who is making this request
	$user = getUser();

	if(count($errors) > 0){
		respond(false);
	}else{
		if(isset($_REQUEST['postdata']) && isset($_REQUEST['num'])){
			$post = $_REQUEST['postdata'];
			$num = intval($_REQUEST['num']);
			try{
	    		$sql = "INSERT INTO user_chunk (user_id, chunk, num) VALUES ( ". $user['id'] .", 
	    				'". $post."', ".$num.")";
				$conn->exec($sql);
			}catch(PDOException $e)
	    	{
	    		array_push($errors, $e->getMessage());
	    	}
		}else{
			array_push($errors, "No post data supplied");
		}

		respond(intVal($_REQUEST['num']));
	}

			
?>