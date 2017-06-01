<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//get the data that was post
	$postdata = "";
	if(isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);
		try{
			//check the person making this request
			$testUser = getUser($post->email, $post->password);
			if(strcmp($testUser["id"], "0" ) !=  0 ||   $testUser["id"] > 0 ){
				$sql = "UPDATE user SET login_status = 1, 
						last_login_date = ". time() ." , 
						is_authorised = 1 
						WHERE id = " . $testUser["id"];
	    		
				$conn->exec($sql);

				//get the user who has just logged in
				$user = getUser($post->email, $post->password);
			}else{
				array_push($errors, "Account not found");
			}
		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($user);	
	
?>