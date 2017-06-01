<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//load settings 
	loadSettings();

	//check the person making this request
	$user = getUser();

	if(count($errors) == 0 ){
		//my saved chunks
		$savedPost = getUserChunkRequest(intVal($user["id"]));
		

		$post = json_decode($savedPost);
		
		try{			
			//get the avatar
			$avatar = "";
			if(strlen($post->avatar) > 20){
				$tail = $user['id']."on".time().".jpg";
				$fileName = "../admin/Theme/uploads/img". $tail;				
				$fileResult = base64_to_jpeg($post->avatar,$fileName);
				$avatar= "uploads/img".$tail;
			}

			$sql = "";
			if(strlen($avatar)>20){
				$sql = "UPDATE user SET 
				name = '".$post->name."', email = '".$post->email."', city_id = ".$post->city_id.",  
				avatar = '".$avatar."' WHERE id = " . $user["id"];
			}else{
				$sql = "UPDATE user SET 
				name = '".$post->name."', email = '".$post->email."', city_id = ".$post->city_id." 
				WHERE id = " . $user["id"];
    		}
			$conn->exec($sql);

		
			//get the updated user
			$user = getUserOfEmail($post->email);

			deleteUserChunks($user["id"]);
		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($user);	
	
?>