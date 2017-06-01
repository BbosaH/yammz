<?php
	
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");
	//since its a signup you dont need to get the user making this request


	$postdata = "";
	if(isset($_REQUEST['postdata'])){
		$queryString = $_SERVER['QUERY_STRING'];
		$parts = explode("postdata=", $queryString);
		$str = $parts[1];
		$str = rawurldecode($str);
		//echo $str;
		$post = json_decode($str);
		//echo "<br/>".json_last_error() . "<br/>";
        ///var_dump($post);
        //exit(0);
		try{
			//check if this username is not taken
			$testUser = getUserOfNameOrEmail($post->name, $post->email);

			if(strcmp($testUser["id"], "0" ) !=  0 ||   $testUser["id"] > 0 ){
				array_push($errors, "This user name or email is already taken");
			}else{
				$yearNow = Date("Y");
				$dob = intval($yearNow) - intval($post->age);
				$dob = mktime(0, 0, 0, 1, 1, $dob);
	    		$sql = "INSERT INTO user 
	    		(name, email, avatar, password, login_status, last_login_date, is_authorised, date_of_birth,sex,social)
	    		VALUES (
	    				'". $post->name ."', 
	    				'". $post->email ."', 
	    				'". $post->avatar ."',
	    				'". $post->password ."', 
	    				0,
	    				0,
	    				0,
	    				". $dob .",
	    				'". $post->sex ."',
	    				'google')";
				$conn->exec($sql);

				

				//get the user who has just signed up
				$user = getUserOfGoogleById($post->password);
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