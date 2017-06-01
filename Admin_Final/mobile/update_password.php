<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//check the person making this request
	$user = getUser();
	
	//get the data that was post
	$postdata = "";
	if(count($errors) == 0 && isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);
		//echo "<img src='".$post->banner."' />";
		//respond($myBusinesses);

		try{	
			//get the user with this password
			if( strcmp($post->old_password, $user["password"]) != 0 ){
				array_push($errors, "No user found");
				respond($user);
			}
			
			//update user
			$sql = "UPDATE user SET password = '".$post->new_password."' WHERE id = " . $user["id"];
    		
			$conn->exec($sql);

			//get the updated user
			$user = getUserOfEmail($user["email"]);

		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($user);	
	
?>