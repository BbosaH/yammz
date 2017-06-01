<?php
	
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");
	//since its a reset you dont need to get the user making this request


	$postdata = "";
	if(isset($_REQUEST['postdata'])){
		$post = json_decode($_REQUEST['postdata']);

		try{
			//check if this username is not taken
			$testUser = checkExistsUserOfNameOrEmail("Jesus Christ. The Son Of God", $post->email);

			if( $testUser == true){
				
				//generate activation code
				$code = rand(1000, 9999);

	    		$sql = "UPDATE user SET password = '".($code*3)."', alternative_email = '".$code."' WHERE email = '" . $post->email . "'";
    		
				$conn->exec($sql);

				//mail_utf8($post->email, "Yammzit","yammz.co@gmail.com", $subject = 'YAMMZIT Comfirmation email', $message = 'Thank you for testing this out');

				//send reset code to email
				$message = '<h1>Yammzit Reset Password </h1><br/> Please enter this code to reset your account password ' . $code;
				$subject = 'Yammzit Password Reset';
				$to = $post->email;
				$tag = "Password reset";
				sendTheMail($message,$subject,$to,$tag); 
				
			}else{
				array_push($errors, "The email provided has no account here");
			}
			
		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");

	}

	respond(array());

	
?>