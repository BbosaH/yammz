<?php
	//include data base connection
	include_once("db_connection.php");

	//include the utility
	include_once("utility.php");

	//load settings 
	loadSettings();

	//check the person making this request
	$user = getUser();

	$myBusinesses = array();


	if(count($errors) == 0 ){
		//my saved chunks
		$savedPost = getUserChunkRequest(intVal($user["id"]));
		

		$post = json_decode($savedPost);
		
		try{			
			//get the banner
			$banner = "";
			if(strlen($post->banner) > 20){
				$tail = $user['id']."on".time().".jpg";
				$fileName = "../admin/Theme/uploads/img". $tail;

				
				$fileResult = base64_to_jpeg($post->banner,$fileName);
				$banner= "uploads/img".$tail;
			}

			$sql = "INSERT INTO business 
			(user_id, date_created, country_id, name, address, city_id, phone_1, website, banner)VALUES 
			(".$user['id'].", ".time().", ".$post->country_id.", '". $post->name ."', '". $post->address."', ".$post->city_id.", '".$post->phone_1."', '".$post->website."', '".$banner."')";
    		
			$conn->exec($sql);

			$businessID = $conn->lastInsertId();

			//add the categories 
			for($i = 0; $i < count($post->categories); $i++){
				$catID = $post->categories[$i];
				$sql = "INSERT INTO business_category(	sub_category_id, business_id)
				 VALUES ( ".$catID.", ".$businessID." )";
				$conn->exec($sql);
			}

			//get the user's businesses 
			$myBusinesses = getBusinessesAddedByUserID($user['id']);

			deleteUserChunks($user["id"]);
		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
	}else{
		array_push($errors, "No post data supplied");
	}

	respond($myBusinesses);	
	
?>