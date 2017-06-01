<?php
	
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");
	//since its a signup you dont need to get the user making this request


	$postdata = "";
	if(isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);

		try{
			//check if this username is not taken
			$testUser = checkExistsUserOfNameOrEmail($post->name, $post->email);

			if( $testUser == true){
				array_push($errors, "This user name or email is already taken");
			}else{

				
				//generate activation code
				$code = rand(1000, 9999);

	    		$sql = "INSERT INTO user 
	    		(name, email, avatar, password, login_status, last_login_date, is_authorised, social_id)
	    		VALUES (
	    				'". $post->name ."', 
	    				'". $post->email ."', 
	    				'',
	    				'". $post->password ."', 
	    				0,
	    				0,
	    				0,
	    				'". $code ."')";
				$conn->exec($sql);

				//mail_utf8($post->email, "Yammzit","yammz.co@gmail.com", $subject = 'YAMMZIT Comfirmation email', $message = 'Thank you for testing this out');

				
				//send activation code to email 
				$message = '<h1>Yammzit Confirmation Email</h1> <br/> Thanks for joining yammzit. <br/> Please enter this code to activate your account ' . $code;
				$subject = 'Yammzit Confirmation Email';
				$to = $post->email;
				$tag = "Confirmation";
				sendTheMail($message,$subject,$to,$tag);

				//get the user who has just signed up
				$user = getUser($post->email, $post->password);
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