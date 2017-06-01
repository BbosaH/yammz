<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	
	//get the data that was post
	$postdata = "";
	if(count($errors) == 0 && isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);
		//echo "<img src='".$post->banner."' />";
		//respond($myBusinesses);

		$user = getUserOfResetCode($post->old_password);
		

		try{	
			//get the user with this password
			if(array_key_exists('alternative_email', $user) == false){
				$errors = array();
				array_push($errors, "Invalid reset code");
				respond($user);
			}

			if( strcmp($post->old_password, $user["alternative_email"]) != 0 ){
				array_push($errors, "No user found");
				respond($user);
			}
			
			//update user
			$sql = "UPDATE user SET password = '".$post->new_password."', alternative_email = '' WHERE alternative_email = '" . $user["alternative_email"] . "'";
    		//var_dump($sql);
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