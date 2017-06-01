<?php
	function getUser($email = "", $password = ""){
		global $errors;
		global $user;
		global $conn;

		if(isset($_REQUEST['email']) && isset($_REQUEST['password'])){
			$email = $_REQUEST['email'];
			$password = $_REQUEST['password'];
		}
		if(strlen($email) > 0 && strlen($password) > 0 ){
			try{
				$sql = "SELECT * FROM user WHERE email = '" . $email . "' AND password = '" . $password . "'";
			    //echo $sql;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			$user[$key] = is_numeric($value) ? intval($value) : $value;
			    		}
			    	}
			    	$user['id'] = $row["id"];
			    	$user['password'] = $row["password"];
			    	$user["date_of_birth"] = date("Y/m/d H:i:s",$row["date_of_birth"]);
					$user["last_login_date"] = date("Y/m/d H:i:s",$row["last_login_date"]);
			    	break;
				}
				if(strcmp($user['is_authorised'] , '0') == 0 || $user['is_authorised']  == 0){
					$user['is_authorised'] = false;
				}elseif(strcmp($user['is_authorised'] , '1') == 0 || $user['is_authorised']  == 1){
					$user['is_authorised'] = true;
				}else{
					$user['is_authorised'] = false;
				}
				
				//get the city
				$thisCity = getCityOfId($user["city_id"]);
				$user["city"] = $thisCity;
				//get the users directory
			  //  echo $user["id"] . ":";
				$user["directory"] = getDirectoryOfUserOfID($user['id']);
				return $user;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "User is not recognised, please supply credentials");
		}
		return $user;
	}

	function getUserOfFacebookById($id=0){
		global $errors;
		global $user;
		global $conn;

		
		if($id == 0){
			array_push($errors, "User is not recognised, please signup with facebook ");
		}else{
			try{
				$sql = "SELECT * FROM user WHERE social_id = '" . $id . "' AND social = 'facebook'";
			    //echo $sql;
			    //exit(0);
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			$user[$key] = is_numeric($value) ? intval($value) : $value;
			    		}
			    	}
			    	$user['password'] = $row["password"];
			    	$user['social_id'] = $row["social_id"];
			    	$user["date_of_birth"] = date("Y/m/d H:i:s",$row["date_of_birth"]);
					$user["last_login_date"] = date("Y/m/d H:i:s",$row["last_login_date"]);
			    	break;
				}

				if(strcmp($user['is_authorised'] , '0') == 0 || $user['is_authorised']  == 0){
					$user['is_authorised'] = false;
				}elseif(strcmp($user['is_authorised'] , '1') == 0 || $user['is_authorised']  == 1){
					$user['is_authorised'] = true;
				}else{
					$user['is_authorised'] = false;
				}
				//get the city
				$thisCity = getCityOfId($user["city_id"]);
				$user["city"] = $thisCity;
				//get the users directory
				$user["directory"] = getDirectoryOfUserOfID($user["id"]);
				return $user;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}
		return $user;
	}

	function getUserOfGoogleById($id=0){
		global $errors;
		global $user;
		global $conn;

		
		if($id == 0){
			array_push($errors, "User is not recognised, please signup with facebook ");
		}else{
			try{
				$sql = "SELECT * FROM user WHERE password = '" . $id . "' AND social = 'google'";
			    //echo $sql;
			    //exit(0);
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			$user[$key] = is_numeric($value) ? intval($value) : $value;
			    		}
			    	}
			    	$user['password'] = $row["password"];
			    	$user["date_of_birth"] = date("Y/m/d H:i:s",$row["date_of_birth"]);
					$user["last_login_date"] = date("Y/m/d H:i:s",$row["last_login_date"]);
			    	break;
				}

				if(strcmp($user['is_authorised'] , '0') == 0 || $user['is_authorised']  == 0){
					$user['is_authorised'] = false;
				}elseif(strcmp($user['is_authorised'] , '1') == 0 || $user['is_authorised']  == 1){
					$user['is_authorised'] = true;
				}else{
					$user['is_authorised'] = false;
				}
				//get the city
				$thisCity = getCityOfId($user["city_id"]);
				$user["city"] = $thisCity;
				//get the users directory
				$user["directory"] = getDirectoryOfUserOfID($user["id"]);
				return $user;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}
		return $user;
	}

	function getUserOfName($name){
		global $errors;
		global $user;
		global $conn;

		if(strlen($name) > 0 ){
			try{
				$sql = "SELECT * FROM user WHERE name = '" . $name . "'";
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			$user[$key] = is_numeric($value) ? intval($value) : $value;
			    		}
			    	}
			    	$user["date_of_birth"] = date("Y/m/d H:i:s",$row["date_of_birth"]);
					$user["last_login_date"] = date("Y/m/d H:i:s",$row["last_login_date"]);
			    	break;
			    	
				}
				if(strcmp($user['is_authorised'] , '0') == 0 || $user['is_authorised']  == 0){
					$user['is_authorised'] = false;
				}elseif(strcmp($user['is_authorised'] , '1') == 0 || $user['is_authorised']  == 1){
					$user['is_authorised'] = true;
				}else{
					$user['is_authorised'] = false;
				}
				
				//get the city
				$thisCity = getCityOfId($user["city_id"]);
				$user["city"] = $thisCity;
				//get the users directory
				$user["directory"] = getDirectoryOfUserOfID($user["id"]);
				return $user;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "User not found, supply a name for this user");
		}
		return $user;
	}

	function getUserOfEmail($email){
		global $errors;
		global $user;
		global $conn;

		if(strlen($email) > 0 ){
			try{
				$sql = "SELECT * FROM user WHERE email = '" . $email . "'";
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			$user[$key] = is_numeric($value) ? intval($value) : $value;
			    		}
			    	}
			    	$user["date_of_birth"] = date("Y/m/d H:i:s",$row["date_of_birth"]);
					$user["last_login_date"] = date("Y/m/d H:i:s",$row["last_login_date"]);
			    	break;
				}
				if(strcmp($user['is_authorised'] , '0') == 0 || $user['is_authorised']  == 0){
					$user['is_authorised'] = false;
				}elseif(strcmp($user['is_authorised'] , '1') == 0 || $user['is_authorised']  == 1){
					$user['is_authorised'] = true;
				}else{
					$user['is_authorised'] = false;
				}
				
				//get the city
				$thisCity = getCityOfId($user["city_id"]);
				$user["city"] = $thisCity;
				//get the users directory
				$user["directory"] = getDirectoryOfUserOfID($user["id"]);
				return $user;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "User not found, supply  an email for this user");
		}
		return $user;
	}

	function getUserOfResetCode($code){
		global $errors;
		global $user;
		global $conn;

		if(strlen($code) > 0 ){
			try{
				$sql = "SELECT * FROM user WHERE password = '" . (intval($code) * 3) . "'";
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			$user[$key] = is_numeric($value) ? intval($value) : $value;
			    		}
			    	}
			    	$user["date_of_birth"] = date("Y/m/d H:i:s",$row["date_of_birth"]);
					$user["last_login_date"] = date("Y/m/d H:i:s",$row["last_login_date"]);
			    	break;
				}
				if(strcmp($user['is_authorised'] , '0') == 0 || $user['is_authorised']  == 0){
					$user['is_authorised'] = false;
				}elseif(strcmp($user['is_authorised'] , '1') == 0 || $user['is_authorised']  == 1){
					$user['is_authorised'] = true;
				}else{
					$user['is_authorised'] = false;
				}
				
				//get the city
				$thisCity = getCityOfId($user["city_id"]);
				$user["city"] = $thisCity;
				//get the users directory
				$user["directory"] = getDirectoryOfUserOfID($user["id"]);
				return $user;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "User not found, supply  a reset code for this user");
		}
		return $user;
	}

	function checkExistsUserOfNameOrEmail($name, $email){
		global $errors;
		global $user;
		global $conn;

		
		if(strlen($email) > 0 && strlen($name) > 0){

			try{
				$sql = "SELECT * FROM user WHERE email = '" . $email . "' OR name = '". $name ."'";
                            //echo $sql;
			    $res = $conn->query($sql);
                            foreach ($res as $row ) {
                                              return true;
                              }

				return false;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "User not found, supply  an email or name for this user to check");
		}
		return false;
	}


	function getUserOfNameOrEmail($name, $email){
		global $errors;
		global $user;
		global $conn;

		

		if(strlen($email) > 0 && strlen($name) > 0){

			try{
				$sql = "SELECT * FROM user WHERE email = '" . $email . "' OR name = '". $name ."'";
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_string($key)){
			    			$user[$key] = (is_numeric($value))? intval($value) : $value;
			    		}
			    	}
			    	$user["date_of_birth"] = date("Y/m/d H:i:s",$row["date_of_birth"]);
					$user["last_login_date"] = date("Y/m/d H:i:s",$row["last_login_date"]);
			    	break;
				}

				if(strcmp($user['is_authorised'] , '0') == 0 || $user['is_authorised']  == 0){
					$user['is_authorised'] = false;
				}elseif(strcmp($user['is_authorised'] , '1') == 0 || $user['is_authorised']  == 1){
					$user['is_authorised'] = true;
				}else{
					$user['is_authorised'] = false;
				}
				//get the city
				$thisCity = getCityOfId($user["city_id"]);
				$user["city"] = $thisCity;
				//get the users directory
				$user["directory"] = getDirectoryOfUserOfID($user["id"]);
				return $user;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "User not found, supply  an email or name for this user");
		}
		return $user;
	}

	function getUserOfId($id, $getDetails = false){
		global $errors;
		global $conn;

		$thisUser = array(
			'id' => 0,
			'name' => '',
			'avatar' => '',
			'city_id' => 0,
			'city' => null
		);

		if(is_numeric($id) && $id > 0 ){
			try{
				$sql = "SELECT * FROM user WHERE id = ". $id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			//this function skips passwords for this user
			    			if(array_key_exists($key, $thisUser)){
			    				$thisUser[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	$user["date_of_birth"] = date("Y/m/d H:i:s",$row["date_of_birth"]);
					$user["last_login_date"] = date("Y/m/d H:i:s",$row["last_login_date"]);
			    	break;
				}
				//get the city
				$thisCity = getCityOfId($thisUser["city_id"]);
				$thisUser["city"] = $thisCity;
				if($getDetails == true){
					//get followers
					$thisUser["followers"] = getFollowersOfUserOfId($id);
					//the friends
					$thisUser["friends"] = getFriendsOfUserOfId($id);
					//reviews
					$thisUser["reviews"] = getReviewsOfUserOfId($id);
					//photoes
					$thisUser["photoes"] = getPhotoesOfUserOfId($id);
				}
				//get the users directory
				$thisUser["directory"] = getDirectoryOfUserOfID($id);
				return $thisUser;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This user of id : " . $id . ", does not exist");
		}
		return $thisUser;
	}

	function getUserFollowOfId($id){
		global $errors;
		global $conn;

		$follower = null;

		if(is_numeric($id) && $id > 0 ){
			try{
				$sql = "SELECT * FROM user_follower WHERE id = ". $id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$this_user = getUserOfId(intval($row["follower_id"]));
			    	if($this_user["id"] == 0){
			    		continue;
			    	}
			    	$this_user["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
			    	$follower = $this_user;			    	
			    	break;
				}
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This user follow of id : " . $id . ", does not exist");
		}
		return $follower;
	}

	function getFollowersOfUserOfId($id){
		global $errors;
		global $conn;

		$followers = array();

		if(is_numeric($id) && $id > 0 ){
			try{
				$sql = "SELECT * FROM user_follower WHERE user_id = ". $id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$this_user = getUserOfId(intval($row["follower_id"]));
			    	$this_user["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
			    	array_push($followers, $this_user);
				}
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This user follower of id : " . $id . ", does not exist");
		}
		return $followers;
	}

	function getPeopleThatAreFollowedByUserOfId($id){
		global $errors;
		global $conn;

		$followers = array();

		if(is_numeric($id) && $id > 0 ){
			try{
				$sql = "SELECT * FROM user_follower WHERE follower_id = ". $id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$this_user = getUserOfId(intval($row["user_id"]));
			    	if($this_user["id"] == 0){
			    		continue;
			    	}
			    	$this_user["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
			    	array_push($followers, $this_user);
				}
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This user follower of id : " . $id . ", does not exist");
		}
		return $followers;
	}

	function getFriendOfId($id){
		global $errors;
		global $conn;

		$friend = null;

		if(is_numeric($id) && $id > 0 ){
			try{
				$sql = "SELECT * FROM user_friend WHERE id = ". $id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$this_user = getUserOfId(intval($row["friend_id"]));
			    	$this_user["status"] = intval($row["status"]);	
			    	$this_user["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
			    	$this_user["date_last_modified"] = date("Y/m/d H:i:s",$row["date_last_modified"]);
			    	$friend = $this_user;
			    	break;
				}
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This friend of id : " . $id . ", does not exist");
		}
		return $friend;
	}

	function getFriendsOfUserOfId($id){
		global $errors;
		global $conn;

		$friends = array();

		if(is_numeric($id) && $id > 0 ){
			try{
				$sql = "SELECT * FROM user_friend WHERE user_id = ". $id  ;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$this_user = getUserOfId(intval($row["friend_id"]));
			    	if($this_user["id"] == 0){
						continue;
					}
			    	$this_user["status"] = intval($row["status"]);		    	
			    	$this_user["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
			    	$this_user["date_last_modified"] = date("Y/m/d H:i:s",$row["date_last_modified"]);
			    	array_push($friends, $this_user);
				}

				$sql = "SELECT * FROM user_friend WHERE friend_id = ". $id ;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$this_user = getUserOfId(intval($row["user_id"]));
			    	if($this_user["id"] == 0){
						continue;
					}
			    	$this_user["status"] = intval($row["status"]);		    	
			    	$this_user["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
			    	$this_user["date_last_modified"] = date("Y/m/d H:i:s",$row["date_last_modified"]);
			    	array_push($friends, $this_user);
				}
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This user friend of id : " . $id . ", does not exist");
		}
		return $friends;
	}

	function getFriendRequestsOfUserOfId($id){
		global $errors;
		global $conn;

		$friends = array();

		if(is_numeric($id) && $id > 0 ){
			try{
				$sql = "SELECT * FROM user_friend WHERE user_id = ". $id . " AND status = 1 " ;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$this_user = getUserOfId(intval($row["friend_id"]));
			    	if($this_user["id"] == 0){
						continue;
					}
			    	$this_user["status"] = intval($row["status"]);		    	
			    	$this_user["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
			    	$this_user["date_last_modified"] = date("Y/m/d H:i:s",$row["date_last_modified"]);
			    	array_push($friends, $this_user);
				}

			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This user friend of id : " . $id . ", does not exist");
		}
		return $friends;
	}

	function getReviewsOfUserOfId($id){
		global $conn;
		global $errors;
		global $newsfeed;
		global $settings;
		$newsfeeds = array();
		try{
			$sql = "SELECT * FROM newsfeed
			WHERE user_id = ". $id .
			" AND kind = 'review' ORDER BY date_created DESC LIMIT " . $settings["newsfeed_chunk"];

		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisNewsFeed = array();
				$keys = array_keys($newsfeed);
				foreach($keys as $key){
					$thisNewsFeed[$key] = $newsfeed[$key];
				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisNewsFeed)){
		    				$thisNewsFeed[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	//add the business
		    	$thisBusiness = getBusinessOfId(intval($thisNewsFeed["business_id"]));
		    	$thisNewsFeed["business"] = $thisBusiness;
		    	//add the user, 
				$thisUser  = getUserOfId(intval($thisNewsFeed["user_id"]));
				$thisNewsFeed["user"] = $thisUser;
				//get the likes
		    	$thisLikes = getLikesOfNewsFeedOfId($thisNewsFeed["id"] );
		    	$thisNewsFeed["likes"] = $thisLikes;
		    	//comments
		    	$thisComments = getCommentsOfNewsFeedOfId($thisNewsFeed["id"] );
		    	$thisNewsFeed["comments"]  = $thisComments;
				array_push($newsfeeds, $thisNewsFeed);

			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $newsfeeds;
	}

	function getPhotoesOfUserOfId($id){
		global $conn;
		global $errors;
		global $business_photo;
		$photoes = array();
		try{
			$sql = "SELECT * FROM business_photo WHERE user_id = ". $id ;

		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisPhoto = array();
				$keys = array_keys($business_photo);
				foreach($keys as $key){
					$thisPhoto[$key] = $business_photo[$key];
				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisPhoto)){
		    				$thisPhoto[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	$thisPhoto["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	$thisPhoto["business"] = getBusinessOfId(intval($thisPhoto["business_id"]));
				array_push($photoes, $thisPhoto);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $photoes;
	}

	function getBusinessOfId($id, $has_details = false){
		global $errors;
		global $business;
		global $conn;

		$thisBusiness = array();
		$keys = array_keys($business);
		foreach($keys as $key){
			$thisBusiness[$key] = $business[$key];
		}

		if(is_numeric($id) && $id > 0 ){
			try{
				$sql = "SELECT * FROM business WHERE id = ". $id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisBusiness)){
			    				$thisBusiness[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	$thisBusiness["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
			    	$thisBusiness["date_claimed"] = date("Y/m/d H:i:s",$row["date_claimed"]);
			    	break;
				}
				//get the user for this business, this is the person who added the business
				$thisUser  = getUserOfId(intval($thisBusiness["user_id"]));
				$thisBusiness["user"] = $thisUser;
				//get the owner for this business
				// $thisOwner  = getUserOfId(intval($thisBusiness["owner_id"]));
				// $thisBusiness["owner"] = $thisOwner;
				//the city
				$thisCity = getCityOfId($thisBusiness["city_id"]);
				$thisBusiness["city"] = $thisCity;
				//add other details about the business
				if(is_bool($has_details) && $has_details == true){
					//categories
					$thisCategories = getCategoriesOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["sub_categories"] =  $thisCategories;
					//reviews
					$thisReviews = getReviewsOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["reviews"] =  count($thisReviews);
					//followers
					$thisFollowers = getFollowersOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["followers"] =  $thisFollowers;
					//photoes
					$thisPhotoes = getPhotoesOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["photoes"] =  $thisPhotoes;
					//get favorites
					$thisFavorites = getFavoritesOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["favorites"] =  $thisFavorites;
				}
				return $thisBusiness;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This business of id : " . $id . ", does not exist : getBusinessOfId");
		}
		return $thisBusiness;
	}

	function loadSettings(){
		global $errors;
		global $settings;
		global $conn;

		try{
			$sql = "SELECT * FROM app_setting ";
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $settings)){
		    				$settings[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	break;
			}
			return $settings;
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
	}

	function getCitiesOfCountryId($country_id = 0){
		global $errors;
		global $city;
		global $conn;

		$cities = array();

		if(is_numeric($country_id) && $country_id > 0 ){
			try{
				$sql = "SELECT * FROM city WHERE country_id = ". $country_id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$thisCity = array();
					$keys = array_keys($city);
					foreach($keys as $key){
						$thisCity[$key] = $city[$key];
					}
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisCity)){
			    				$thisCity[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	array_push($cities, $thisCity);
				}
				return $cities;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This country of id : " . $country_id . ", does not exist");
		}
		return $cities;
	}

	function getCountryOfId($country_id = 0){
		global $errors;
		global $country;
		global $conn;

		$thisCountry = array();
		$keys = array_keys($country);
		foreach($keys as $key){
			$thisCountry[$key] = $country[$key];
		}

		if(is_numeric($country_id) && $country_id >= 0 ){
			try{
				$sql = "SELECT * FROM country WHERE id = ". $country_id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisCountry)){
			    				$thisCountry[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	break;
				}
				return $thisCountry;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This country of id : " . $country_id . ", does not exist");
		}
		return $thisCountry;
	}

	function getCityOfId($city_id = 0){
		global $errors;
		global $city;
		global $conn;

		$thisCity = array();
		$keys = array_keys($city);
		foreach($keys as $key){
			$thisCity[$key] = $city[$key];
		}

		if(is_numeric($city_id) && $city_id >= 0 ){
			try{
				$sql = "SELECT * FROM city WHERE id = ". $city_id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisCity)){
			    				$thisCity[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	break;
				}
				//add the country
				$thisCountry = getCountryOfId($thisCity["country_id"]);
				$thisCity["country"] = $thisCountry;
				return $thisCity;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This city of id : " . $city_id . ", does not exist");
		}
		return $thisCity;
	}

	function getSubCategoriesOfCategoryId($category_id = 0){
		global $errors;
		global $category;
		global $subCategory;
		global $conn;

		$subCategories = array();

		if(is_numeric($category_id) && $category_id > 0 ){
			try{
				$sql = "SELECT * FROM sub_category WHERE category_id = ". $category_id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$thisSubCategory = array();
					$keys = array_keys($subCategory);
					foreach($keys as $key){
						$thisSubCategory[$key] = $subCategory[$key];
					}
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisSubCategory)){
			    				$thisSubCategory[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	array_push($subCategories, $thisSubCategory);
				}
				return $subCategories;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This category of id : " . $category_id . ", does not exist");
		}
		return $subCategories;
	}

	function getCategoryOfId($category_id){
		global $errors;
		global $category;
		global $conn;

		$thisCategory = array();
		$keys = array_keys($category);
		foreach($keys as $key){
			$thisCategory[$key] = $category[$key];
		}

		if(is_numeric($category_id) && $category_id > 0 ){
			try{
				$sql = "SELECT * FROM category WHERE id = ". $category_id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisCategory)){
			    				$thisCategory[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	break;
				}
				return $thisCategory;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This category of id : " . $category_id . ", does not exist");
		}
		return $thisCategory;
	}

	function getSubCategoryOfId($sub_category_id){
		global $errors;
		global $subCategory;
		global $conn;

		$thisSubCategory = array();
		$keys = array_keys($subCategory);
		foreach($keys as $key){
			$thisSubCategory[$key] = $subCategory[$key];
		}

		if(is_numeric($sub_category_id) && $sub_category_id > 0 ){
			try{
				$sql = "SELECT * FROM sub_category WHERE id = ". $sub_category_id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisSubCategory)){
			    				$thisSubCategory[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	break;
				}
				return $thisSubCategory;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This sub category of id : " . $category_id . ", does not exist");
		}
		return $thisSubCategory;
	}

	function respond($data){
		global $conn;
		global $errors;

		$conn = null;

		//The response
		$res= array(
			"data" => $data,
			"errors" => $errors
		);
		//include the header file
		include_once("get_headers.php");
		echo $_GET["callback"] . "(" . json_encode($res) . ")";
		exit(0);
	}
	
	function respondV2_Arrays($data){
		global $conn;
		global $errors;

		$conn = null;
		
		$c = "[";
	  foreach ($data as $row ) {
	    $c = $c . json_encode($row) . ",";
	  }
	  $c = $c .  "]";

		//The response
		$res= "{\"data\":". $c . ",\"errors\":". json_encode($errors) . "}";
		//include the header file
		include_once("get_headers.php");
		echo $_GET["callback"] . "(" . $res . ")";
		exit(0);
	}

	function active($name){
		$self = $_SERVER['PHP_SELF'];
		if(is_array($name)){
			foreach ($name as $value) {
				if(stripos($self, $value)){
					echo 'active';
					return;
				}
			}
			echo 'notactive';
		}else{
			if(stripos($self, $name)){
				echo 'active';
			}else{
				echo 'notactive';
			}
		}
	}

	function loadPageAdminOfId($id){
		global $conn;
		global $admin;

		$id=gStringId($id);
		try{
			$sql = "SELECT * FROM admin WHERE id = ".$id;
		    $res = $conn->query($sql);
	
		    foreach ($res as $row ) {
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $admin)){
		    				$admin[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	return;
			}
			echo "!!! Page administrator not found";
			exit(0);
		}catch(PDOException $e)
		{
			echo $e->getMessage();
			exit(0);
		}
	}

	function gString($id){
		srand ((double) microtime() * 1000000);
        $random1 = rand(1000,9999);
        $random2 = rand(1100,1999);
        $random3 = rand(200,999);
        
        $added=($random1)+($random2)+($id);

        $sto=$random1.$random2.$added.$random3;
        return $sto;
	}

	function gStringId($strg){

 		$a[] = substr($strg,0,4); // Get the first 5 digit of string

        $b[] = substr($strg,4,4);  // Get the next 5 digit of string 

        $brk[] = substr($strg,0,8); 
        $wt[] = substr($strg,8);

        $lgh=strlen($wt[0]);

        $useful_lenght=$lgh-3;
        $final_added=substr($wt[0],0,$useful_lenght);

        $id= $final_added-$a[0] -$b[0]; 

		return $id;
	}

	function AdminImageUpload($submitName, $fileToUpload, $target_dir = "uploads/"){
		
		$target_file = $target_dir . basename($_FILES[$fileToUpload]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$uploadErrors = array();
		try{
			// Check if image file is an actual image or fake image
			if(isset($_POST[$submitName])) {
				$nem = $_FILES[$fileToUpload]["tmp_name"];
				if($nem == null || strlen($nem ) == 0){
					array_push($uploadErrors, "Possibly no file was uploaded") ;
				}else{
		    		$check = getimagesize($nem );
		    		if($check !== false) {
		        		//echo "File is an image - " . $check["mime"] . ".";
		        		$uploadOk = 1;
		    		} else {
		        		array_push($uploadErrors, "File is not an image.") ;
		        		$uploadOk = 0;
		    		}
		    	}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
	    		array_push($uploadErrors, "Sorry, file already exists.");
	    		$uploadOk = 0;
			}
			// Check file size
			if ($_FILES[$fileToUpload]["size"] > 500000) {
			    array_push($uploadErrors, "Sorry, your file is too large.");
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" && $imageFileType != "PNG"  ) {
			    array_push($uploadErrors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    array_push($uploadErrors, "Sorry, your file was not uploaded.");
			} else {// if everything is ok, try to upload file
			    if (move_uploaded_file($_FILES[$fileToUpload]["tmp_name"], $target_file)) {
			        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        array_push($uploadErrors, "Sorry, there was an error uploading your file.");
			    }
			}
		}catch(Exception $e)
		{
			echo $e->getMessage();
			exit(0);
		}
		return (count($uploadErrors)>0)? $uploadErrors : "uploads/" . basename($_FILES[$fileToUpload]["name"]);
	}

	function base64_to_jpeg($base64_string, $output_file) {
		global $errors;
		
		try{
		    $ifp = fopen($output_file, "wb");

		    $base64_string = str_replace(' ', '+', $base64_string);

		    $data = explode(',', $base64_string);

		    fwrite($ifp, base64_decode($data[1]));
		    fclose($ifp);
	    }catch(Exception $e)
		{
			array_push($errors, $e->getMessage());
		}
		
	    return $output_file;
	}

	function jpeg_to_base64($filePath){
		global $errors;
		$res = "";
		try{
			$handle = fopen($filePath, "r");
	    	$fileContents = fread($handle, filesize($filePath));
	    	fclose($handle);
	    	$res = "data:image/jpg;base64,".base64_encode($fileContents);
    	}catch(Exception $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $res;
	}

	function getBusinessesAddedByUserID($user_id){
		global $errors;
		global $business;
		global $conn;

		$businesses = array();

		if(is_numeric($user_id) && $user_id > 0 ){
			try{
				$sql = "SELECT * FROM business WHERE user_id = ". $user_id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$thisBusiness = array();
					$keys = array_keys($business);
					foreach($keys as $key){
						$thisBusiness[$key] = $business[$key];
					}
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisBusiness)){
			    				$thisBusiness[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	$thisBusiness["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
			    	$thisBusiness["date_claimed"] = date("Y/m/d H:i:s",$row["date_claimed"]);
			    	//city
			    	$thisCity = getCityOfId($thisBusiness["city_id"]);
			    	$thisBusiness["city"] =  $thisCity;
			    	//get the owner for this business
					//$thisOwner  = getUserOfId(intval($thisBusiness["owner_id"]));
					//$thisBusiness["owner"] = $thisOwner;
					//add other details about the business
					//categories
					$thisCategories = getCategoriesOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["sub_categories"] =  $thisCategories;
					//reviews
					$thisReviews = getReviewsOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["reviews"] =  count($thisReviews);
					//followers
					$thisFollowers = getFollowersOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["followers"] =  $thisFollowers;
					//photoes
					$thisPhotoes = getPhotoesOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["photoes"] =  $thisPhotoes;
					//get favorites
					$thisFavorites = getFavoritesOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["favorites"] =  $thisFavorites;
					array_push($businesses, $thisBusiness);
				}
				
			}catch(PDOException $e){
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This user for businesses is not found");
		}
		return $businesses;
	}

	function getBusinessesOwnedByUserOfID($user_id){
		global $errors;
		global $business;
		global $conn;

		$businesses = array();

		if(is_numeric($user_id) && $user_id > 0 ){
			try{
				$sql = "SELECT * FROM business WHERE owner_id = ". $user_id;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$thisBusiness = array();
					$keys = array_keys($business);
					foreach($keys as $key){
						$thisBusiness[$key] = $business[$key];
					}
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisBusiness)){
			    				$thisBusiness[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	$thisBusiness["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
			    	$thisBusiness["date_claimed"] = date("Y/m/d H:i:s",$row["date_claimed"]);
			    	//get the owner for this business
					//$thisOwner  = getUserOfId(intval($thisBusiness["owner_id"]));
					//$thisBusiness["owner"] = $thisOwner;
					//add other details about the business
					//categories
					$thisCategories = getCategoriesOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["sub_categories"] =  $thisCategories;
					//reviews
					$thisReviews = getReviewsOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["reviews"] =  count($thisReviews);
					//followers
					$thisFollowers = getFollowersOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["followers"] =  $thisFollowers;
					//photoes
					$thisPhotoes = getPhotoesOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["photoes"] =  $thisPhotoes;
					//get favorites
					$thisFavorites = getFavoritesOfBusinessOfId($thisBusiness["id"]);
					$thisBusiness["favorites"] =  $thisFavorites;
					array_push($businesses, $thisBusiness);
				}
				
			}catch(PDOException $e){
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This user for businesses is not found");
		}
		return $businesses;
	}

	function getDirectoryOfUserOfID($user_id){
		global $errors;
		global $business;
		global $conn;

		$businesses = array();
		//echo ($user_id);
		if(is_numeric($user_id) && $user_id > 0 ){
			try{
				$sql = "SELECT * FROM business WHERE owner_id = ". $user_id;
				//echo $sql;
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {			    	
					array_push($businesses, intval($row["id"]));
				}
				
			}catch(PDOException $e){
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This user for businessesx directory is not found");
		}
		return $businesses;
	}

	function getCategoriesOfBusinessOfId($business_id){
		global $conn;
		global $errors;
		global $subCategory;
		global $category;
		$categories = array();
		try{
			$sql = "SELECT * FROM business_category WHERE business_id = ". $business_id;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	//get the subcategory
			   	$thisSubCategory = getSubCategoryOfId($row['sub_category_id']);
		    	//add the category here
				$thisSubCategory["category"] = getCategoryOfId(intval($thisSubCategory["category_id"]));
				array_push($categories, $thisSubCategory);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $categories;
	}

	function getReviewsOfBusinessOfId($business_id){
		global $conn;
		global $errors;
		global $newsfeed;
		global $settings;
		$newsfeeds = array();
		try{
			$sql = "SELECT * FROM newsfeed
			WHERE business_id = ". $business_id .
			" AND kind = 'review' ORDER BY date_created DESC LIMIT " . $settings["newsfeed_chunk"];

		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisNewsFeed = array();
				$keys = array_keys($newsfeed);
				foreach($keys as $key){
					$thisNewsFeed[$key] = $newsfeed[$key];
				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisNewsFeed)){
		    				$thisNewsFeed[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	//add the user
				$thisUser  = getUserOfId(intval($thisNewsFeed["user_id"]));
				$thisNewsFeed["user"] = $thisUser;
				array_push($newsfeeds, $thisNewsFeed);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $newsfeeds;
	}

	function getReviewOfId($id){
		global $conn;
		global $errors;
		global $newsfeed;
		$thisNewsFeed = array();
		$keys = array_keys($newsfeed);
		foreach($keys as $key){
			$thisNewsFeed[$key] = $newsfeed[$key];
		}
		try{
			$sql = "SELECT * FROM newsfeed WHERE id = ". $id;
			
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisNewsFeed)){
		    				$thisNewsFeed[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	//add the user
				$thisUser  = getUserOfId(intval($thisNewsFeed["user_id"]));
				$thisNewsFeed["user"] = $thisUser;
				break;
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $thisNewsFeed;
	}

	function getFollowersOfBusinessOfId($business_id){
		global $conn;
		global $errors;
		global $business_follower;
		$followers = array();
		try{
			$sql = "SELECT * FROM business_follower WHERE business_id = ". $business_id ;

		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisFollower = array();
  				$keys = array_keys($business_follower);
  				foreach($keys as $key){
  					$thisFollower[$key] = $key;
  				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisFollower)){
		    				$thisFollower[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	$thisFollower["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	//add the user
				$thisUser  = getUserOfId(intval($thisFollower["user_id"]));
				$thisFollower["user"] = $thisUser;
				array_push($followers, $thisFollower);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $followers;
	}

	
	function getBusinessesFollowedByUserOfId($id){
		global $conn;
		global $errors;
		global $business;
		$businesses = array();
		try{
			$sql = "SELECT * FROM business_follower WHERE user_id = ". $id ;

		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisBusiness = getBusinessOfId($row["business_id"]);
		    	if($thisBusiness["id"] == 0){
		    		continue;
		    	}
				array_push($businesses, $thisBusiness);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $businesses;
	}

	function getFavoritesOfBusinessOfId($business_id){
		global $conn;
		global $errors;
		global $business_favorite;
		$favorites = array();
		try{
			$sql = "SELECT * FROM business_favorite WHERE business_id = ". $business_id ;

		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisFavorite = array();
  				$keys = array_keys($business_favorite);
  				foreach($keys as $key){
  					$thisFavorite[$key] = $key;
  				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisFavorite)){
		    				$thisFavorite[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	$thisFavorite["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	//add the user
				$thisUser  = getUserOfId(intval($thisFavorite["user_id"]));
				$thisFavorite["user"] = $thisUser;
				array_push($favorites, $thisFavorite);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $favorites;
	}

	function getPhotoesOfBusinessOfId($business_id){
		global $conn;
		global $errors;
		global $business_photo;
		$photoes = array();
		try{
			$sql = "SELECT * FROM business_photo WHERE business_id = ". $business_id ;

		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisPhoto = array();
				$keys = array_keys($business_photo);
				foreach($keys as $key){
					$thisPhoto[$key] = $business_photo[$key];
				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisPhoto)){
		    				$thisPhoto[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	$thisPhoto["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
				array_push($photoes, $thisPhoto);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $photoes;
	}

	function getSponsoredSearchResults(){
		global $conn;
		global $errors;
		global $settings;
		global $sponsored_search_result;
		$sponsored = array();
		try{
			$sql = "SELECT * FROM sponsored_search_results ORDER BY strength DESC LIMIT ". $settings["sponsored_search_results_chunk"];

		    $res = $conn->query($sql);
		    foreach ($res as $row ) {

		    	$thisAdd = array();
				$keys = array_keys($sponsored_search_result);
				foreach($keys as $key){
					$thisAdd[$key] = $sponsored_search_result[$key];
				}
				foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisAdd)){
		    				$thisAdd[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	$thisAdd["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	//get the business
		    	$thisBusiness = getBusinessOfId($thisAdd["business_id"], false);
		    	$thisAdd["business"] = $thisBusiness;
		    	
				array_push($sponsored , $thisAdd);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $sponsored;
	}


	function getUserChunkRequest($user_id){
		global $conn;
		global $errors;

		$chunk = "";
		try{
			$sql = "SELECT * FROM user_chunk WHERE user_id = ".$user_id." ORDER BY num ASC  ";
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$chunk = $chunk . $row['chunk'];
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $chunk;
	}

	function deleteUserChunks($user_id){
		global $conn;
		global $errors;

		try{
			$sql = "DELETE FROM user_chunk WHERE user_id = ".$user_id;
		    $res = $conn->exec($sql);
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
	}

	function getNewsFeedOfId($newsfeed_id){
		global $conn;
		global $errors;
		global $newsfeed;

		$thisNewsFeed = array();
		$keys = array_keys($newsfeed);
		foreach($keys as $key){
			$thisNewsFeed[$key] = $key;
		}

		try{
			$sql = "SELECT * FROM newsfeed WHERE id = ". $newsfeed_id;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			$thisNewsFeed[$key] = is_numeric($value) ? intval($value) : $value;
		    		}
		    	}
		    	$thisNewsFeed["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	//get the users of this news feeds
		    	$thisUser = getUserOfId($thisNewsFeed["user_id"]);
		    	$thisNewsFeed["user"] = $thisUser;
				//get the business for this news feed
				$thisBusiness = getBusinessOfId($thisNewsFeed["business_id"]);
		    	$thisNewsFeed["business"] = $thisBusiness;
		    	//get the likes
		    	$thisLikes = getLikesOfNewsFeedOfId($thisNewsFeed["id"] );
		    	$thisNewsFeed["likes"] = $thisLikes;
		    	//comments
		    	$thisComments = getCommentsOfNewsFeedOfId($thisNewsFeed["id"] );
		    	$thisNewsFeed["comments"]  = $thisComments;
		    	break;
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $thisNewsFeed;
	}

    function getLikesOfNewsFeedOfId($id){
    	global $conn;
    	global $databasename;
		global $errors;
		global $like;

		$likes = array();
		
		try{
			$sql = "SELECT * FROM ".$databasename.".like WHERE newsfeed_id = ". $id;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisLike = array();
				$keys = array_keys($like);
				foreach($keys as $key){
					$thisLike[$key] = $key;
				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisLike)){
		    				$thisLike[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	$thisLike["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	array_push($likes, $thisLike);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $likes;
    }

    function getCommentsOfNewsFeedOfId($id){
    	global $conn;
		global $errors;
		global $comment;

		$comments = array();
		
		try{
			$sql = "SELECT * FROM comment WHERE review_id = ". $id . " ORDER BY date_created DESC ";
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisComment = array();
				$keys = array_keys($comment);
				foreach($keys as $key){
					$thisComment[$key] = $key;
				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisComment)){
		    				$thisComment[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	$thisComment["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	//add a user for this comment
		    	$thisUser = getUserOfId($thisComment["user_id"]);
		    	$thisComment["user"] = $thisUser;
		    	//get the likes of this comment
		    	$thisComments = getLikesOfCommentOfId($thisComment["id"]);
		    	$thisComment["likes"] = $thisComments;
		    	array_push($comments, $thisComment);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $comments;
    }

    function getLikesOfCommentOfId($id){
    	global $conn;
    	global $databasename;
		global $errors;
		global $like;

		$likes = array();
		
		try{
			$sql = "SELECT * FROM ".$databasename.".like WHERE comment_id = ". $id;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisLike = array();
				$keys = array_keys($like);
				foreach($keys as $key){
					$thisLike[$key] = $key;
				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisLike)){
		    				$thisLike[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	$thisLike["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	array_push($likes, $thisLike);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $likes;
    }

    function getCommentOfId($id){
    	global $conn;
		global $errors;
		global $comment;

		$thisComment = array();
		$keys = array_keys($comment);
		foreach($keys as $key){
			$thisComment[$key] = $key;
		}
		
		try{
			$sql = "SELECT * FROM comment WHERE id = ". $id;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisComment)){
		    				$thisComment[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	$thisComment["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	//add a user for this comment
		    	$thisUser = getUserOfId($thisComment["user_id"]);
		    	$thisComment["user"] = $thisUser;
		    	//get the likes of this comment
		    	$thisComments = getLikesOfCommentOfId($thisComment["id"]);
		    	$thisComment["likes"] = $thisComments;
		    	break;
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $thisComment;
    }

    function getLikeOfId($id){
    	global $conn;
    	global $databasename;
		  global $errors;
		  global $like;

		$thisLike = array();
		$keys = array_keys($like);
		foreach($keys as $key){
			$thisLike[$key] = $key;
		}
		
		try{
			$sql = "SELECT * FROM ".$databasename.".like WHERE id = ". $id;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisLike)){
		    				$thisLike[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	$thisLike["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	break;
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $thisLike;
    }
    
    
    function getFollowerOfId($id){
      	global $conn;
      	global $databasename;
  		  global $errors;
  		  global $business_follower;
  
    		$thisFollower = array();
    		$keys = array_keys($business_follower);
    		foreach($keys as $key){
    			$thisFollower[$key] = $key;
    		}
    		
    		try{
    			  $sql = "SELECT * FROM business_follower WHERE id = ". $id;
    		    $res = $conn->query($sql);
    		    foreach ($res as $row ) {
    		    	foreach ($row as $key => $value) {
    		    		if(is_numeric($key) == false){
    		    			if(array_key_exists($key, $thisFollower)){
    		    				$thisFollower[$key] = is_numeric($value) ? intval($value) : $value;
    		    			}
    		    		}
    		    	}
    		    	$thisFollower["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
    		    	break;
    			  }
    		}catch(PDOException $e)
    		{
    			array_push($errors, $e->getMessage());
    		}
    		return $thisFollower;
    	
    }

    function getFavoriteOfId($id){
      	global $conn;
		global $errors;
		global $business_favorite;
  
		$thisFavorite = array();
		$keys = array_keys($business_favorite);
		foreach($keys as $key){
			$thisFavorite[$key] = $key;
		}
		
		try{
			  $sql = "SELECT * FROM business_favorite WHERE id = ". $id;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisFavorite)){
		    				$thisFavorite[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	$thisFavorite["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	break;
			  }
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $thisFavorite;
    	
    }


    function getUserMessageOfId($id){
    	global $conn;
  		global $errors;
  		
  		$thisMessage = null; 
    		
		try{			
			
			//add a comment 
			$sql = "SELECT * FROM user_message WHERE id = " . $id;
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				$thisMessage = array();
				foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			$thisMessage[$key] = is_numeric($value) ? intval($value) : $value;
		    		}
		    	}
		    	$thisMessage["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	break;
			}

		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
		return $thisMessage;
    }

    function getBusinessMessageOfId($id){
    	global $conn;
  		global $errors;
  		
  		$thisMessage = null; 
    		
		try{			
			
			//add a comment 
			$sql = "SELECT * FROM business_message WHERE id = " . $id;
    		
			$res = $conn->query($sql);
			foreach ($res as $row ) {
				$thisMessage = array();
				foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			$thisMessage[$key] = is_numeric($value) ? intval($value) : $value;
		    		}
		    	}
		    	$thisMessage["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
		    	break;
			}

		}catch(PDOException $e)
    	{
    		array_push($errors, $e->getMessage());
    	}
		return $thisMessage;
    }

    function getMessagesOfBusinessOfId($id){
    	global $errors;
		global $conn;

		$messages = array();

		if(is_numeric($id) && $id > 0 ){
			try{
				$sql = "SELECT * FROM business_message WHERE business_id = ". $id . " ORDER BY date_created ASC";
			    $res = $conn->query($sql);
			    foreach ($res as $row ) {
			    	$thisMessage = array();
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			$thisMessage[$key] = is_numeric($value) ? intval($value) : $value;
			    		}
			    	}
			    	$thisMessage["date_created"] = date("Y/m/d H:i:s",$row["date_created"]);
			    	//get the user of this message
					$thisUser  = getUserOfId(intval($thisMessage["user_id"]));
					$thisMessage["sender"] = $thisUser;
					array_push($messages, $thisMessage);
				}
				
			}catch(PDOException $e){
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This business is not found");
		}
		return $messages;
    }

    function getEventsOfUserOfId($id){
    	global $errors;
		global $conn;

		$events = array();

		throw new Exception("Function is not yet implemented", 1);
						
		return $events;
    }


    function mail_utf8($to, $from_user, $from_email, $subject = '(No subject)', $message = '')
   { 
      $from_user = "=?UTF-8?B?".base64_encode($from_user)."?=";
      $subject = "=?UTF-8?B?".base64_encode($subject)."?=";

      $headers = "From: $from_user <$from_email>\r\n". 
               "MIME-Version: 1.0" . "\r\n" . 
               "Content-type: text/html; charset=UTF-8" . "\r\n"; 

     return mail($to, $subject, $message, $headers); 
   }

   function sendTheMail($message,$subject,$to,$tag){
		global $errors;
   		try{
	   		require_once 'mandrill/src/Mandrill.php';

			$mandrill = new Mandrill('T0bQDPYGxH5Jf3hXgX_ldA');
			$message = array(
		        'html' => $message,
		        'text' => '',
		        'subject' => $subject,
		        'from_email' => 'postmaster@yammzit.com',
		        'from_name' => 'Yammzit',
		        'to' => array(
		            array(
		                'email' => $to,
		                'name' => $to,
		                'type' => 'to'
		            )
		        ),
		        'headers' => array('Reply-To' => 'postmaster@yammzit.com'),
		        'important' => true,
		        'track_opens' => null,
		        'track_clicks' => null,
		        'auto_text' => null,
		        'auto_html' => null,
		        'inline_css' => null,
		        'url_strip_qs' => null,
		        'preserve_recipients' => null,
		        'view_content_link' => null,
		        'bcc_address' => 'nyolamike@live.com',
		        'tracking_domain' => null,
		        'signing_domain' => null,
		        'return_path_domain' => null,
		        'merge' => true,
		        'merge_language' => 'mailchimp',
		        'global_merge_vars' => array(
		            array(
		                'name' => 'merge1',
		                'content' => 'merge1 content'
		            )
		        ),
		        'merge_vars' => array(
		            array(
		                'rcpt' => $to,
		                'vars' => array(
		                    array(
		                        'name' => 'merge2',
		                        'content' => 'merge2 content'
		                    )
		                )
		            )
		        ),
		        'tags' => array($tag),
		        'google_analytics_domains' => array('example.com'),
		        'google_analytics_campaign' => 'message.from_email@example.com',
		        'metadata' => array('website' => 'www.yammzit.com'),
		        'recipient_metadata' => array(
		            array(
		                'rcpt' => 'recipient.email@example.com',
		                'values' => array('user_id' => 123456)
		            )
		        )
		    );

			// array(
		 //        'type' => 'image/png',
		 //        'name' => 'IMAGECID',
		 //        'content' => 'ZXhhbXBsZSBmaWxl'
		 //    )
		    
		    $async = false;
		    $ip_pool = 'Main Pool';
		    $send_at = date("Y-m-d h:i:s", strtotime('2016-04-16'));
		    
		    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
		    //print_r($result);

	    }catch(Mandrill_Error $e) {
		    // Mandrill errors are thrown as exceptions
		    $err =  'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
		    array_push($errors, $err);
		    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
		    //throw $e;
		}


   }

?>





