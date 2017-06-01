<?php
//session_start();
require_once "Dbase.php";
require_once "utilmodels.php";
//require_once "gstring_funcs.php";
include("db_config.php");



class connector
{
	public $dbase ;
	public function __construct(){
		global $dbase;
		$dbaseobj = new Dbase();
		$dbase= $dbaseobj->test_db_connect(DB_SERVER,DB_DATABASE,DB_USER,DB_PASSWORD);
		//mysql_set_charset('utf8');
		//('localhost','yammzit','root','YES');
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
	function getMAxId($table)
	{
		global $dbase;
		//$querystring ="SELECT MAX(id) FROM '".$table."'";
		$kind='review';
		$querystring ="SELECT MAX(id)  AS latest_id FROM newsfeed WHERE kind='".$kind."'";
		$lastidObj=$dbase->prepare($querystring);
		$lastidObj->execute();
		$lastid=$lastidObj->fetch(PDO::FETCH_ASSOC);
		//echo '<pre>'; echo $lastid['id'] ; echo '</pre>';
		return $lastid['latest_id'];
	}
	function getLatestEvents()
	{
		global $dbase;
		$events_array = array();
		$eventViewModel = array(
			'picture' => '',
			'title' => '',
			'start_date' => '',
			'end_date' =>'',
			'interested_count' => 0


		);
		//$querystring ="SELECT MAX(id) FROM '".$table."'";
		$event_querystring ="SELECT id,tittle,image,start_time,end_time FROM event ORDER BY id DESC
       LIMIT 3";
      /*$event_querystring ="SELECT * FROM ( SELECT * FROM event ORDER BY id DESC LIMIT 3) sub ORDER BY id DESC";*/
		$last_events_Obj=$dbase->prepare($event_querystring);
		$last_events_Obj->execute();
		$last_events=$last_events_Obj->fetchAll(PDO::FETCH_ASSOC);
		//waiting for adding event to be okay...........///
		//echo '<pre>', print_r($last_events),'</pre>';

		foreach($last_events as $last_event)
		{
			//processing business photo
			$eventViewModel['picture']=$last_event['image'];
			//event title
			$eventViewModel['title']=$last_event['tittle'];
			//start and end dates
			$dateTimeStart =  date("F j, Y, g:i a",$last_event['start_time']);
			$dateTimeEnd =  date("F j, Y, g:i a",$last_event['end_time']);
			$eventViewModel['start_date']=$dateTimeStart;
			$eventViewModel['end_date']=$dateTimeEnd;
			//interested people count
			$eventViewModel['interested_count']=$this->getUsersCountInterestedInEventOfId($last_event['id']);
			//adding event model to array that will be displayed
			array_push($events_array , $eventViewModel);



		}
		//echo '<pre>'; echo $lastid['id'] ; echo '</pre>';
		return $events_array;
	}
	function getLikesOfCommentOfId($id){
    	global $dbase;
    	global $databasename;
		global $errors;
		global $like;

		$likes = array();

		try{
			$sql = "SELECT * FROM `like` WHERE comment_id = ". $id;
		    $res = $dbase->query($sql);
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
		    	array_push($likes, $thisLike);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $likes;
    }

	function getEventsOfBusiness($business_id)
	{
		global $dbase;
		$events_array = array();
		$eventViewModel = array(
			'picture' => '',
			'title' => '',
			'start_date' => '',
			'end_date' =>'',
			'interested_count' => 0


		);
		//$querystring ="SELECT MAX(id) FROM '".$table."'";
		$event_querystring ="SELECT id,tittle,image,start_time,end_time FROM event WHERE business_id='".$business_id."' ORDER BY id DESC
       LIMIT 2";
      /*$event_querystring ="SELECT * FROM ( SELECT * FROM event ORDER BY id DESC LIMIT 3) sub ORDER BY id DESC";*/
		$last_events_Obj=$dbase->prepare($event_querystring);
		$last_events_Obj->execute();
		$last_events=$last_events_Obj->fetchAll(PDO::FETCH_ASSOC);
		//waiting for adding event to be okay...........///
		//echo '<pre>', print_r($last_events),'</pre>';

		foreach($last_events as $last_event)
		{
			//processing business photo
			$eventViewModel['picture']=$last_event['image'];
			//event title
			$eventViewModel['title']=$last_event['tittle'];
			//start and end dates
			$dateTimeStart =  date("F j, Y, g:i a",$last_event['start_time']);
			$dateTimeEnd =  date("F j, Y, g:i a",$last_event['end_time']);
			$eventViewModel['start_date']=$dateTimeStart;
			$eventViewModel['end_date']=$dateTimeEnd;
			//interested people count
			$eventViewModel['interested_count']=$this->getUsersCountInterestedInEventOfId($last_event['id']);
			//adding event model to array that will be displayed
			array_push($events_array , $eventViewModel);



		}
		//echo '<pre>'; echo $lastid['id'] ; echo '</pre>';
		return $events_array;
	}
	// function getWorkingHoursOfBusiness($business_id)
	// {
	// 	global $dbase;
	// 	$business_working_hours = array();
	// 	$workingHourViewModel = array(
	// 		'day' => '',
	// 		'start_time' => '',
	// 		'end_time' =>''
	// 	);
	// 	$claim_querystring ="SELECT *FROM user_business_claim WHERE business_id='".$business_id."'";
	// 	$claim_business_Obj=$dbase->prepare($claim_querystring);
	// 	try{
	// 		$claim_business_Obj->execute();
	// 		$claim_businesses=$claim_business_Obj->fetchAll(PDO::FETCH_ASSOC);
	// 		//echo json_encode($claim_businesses);
	// 		foreach ($claim_businesses as $claim_business) {
	// 			# code...
	// 			$hour_querystring ="SELECT week_day_id,start_time,end_time FROM business_working_hour WHERE user_business_claim_id='".$claim_business['id']."'";
	// 			$res_obj=$dbase->prepare($hour_querystring);
	// 			$res_obj->execute();
	// 			$res=$res_obj->fetchAll(PDO::FETCH_ASSOC);
	// 			foreach ($res as $working_time) {
	// 				# code...
	// 				$workingHourViewModel['day']=$this->getDayOfId($working_time['week_day_id']);
	// 				$workingHourViewModel['start_time']=$working_time['start_time'];
	// 				$workingHourViewModel['end_time']=$working_time['end_time'];
	// 				array_push($business_working_hours,$workingHourViewModel);
	// 			}
	// 		}
	// 	}catch(PDOException $ex){
	// 		die($ex->getMessage());
	// 	}

	// 	return $business_working_hours;
	// }
	function getDayOfId($id)
	{
		global $dbase;
		$thisDay = array(
			'name'=>''
		);
		$days=$this->getAll("SELECT * FROM week_day WHERE id ='".$id."'");
		foreach ($days as $day) {
			# code...
			$thisDay['name']=$day['name'];
		}
		//echo json_encode($thisDay);
		return $thisDay;
	}
	function getLatestGossips()
	{
		global $dbase;
		$gossips_array =array();
		$gossipViewModel = array(
				"picture"=>'',
				"gossip_title"=>'',
				"date_of_post" => '',
				"details"=>'',
				"following_count"=>0

		);
		$gossip_querystring ="SELECT id,tittle,image,date_created,details FROM gossip ORDER BY id DESC
       LIMIT 3";
       $last_gossips_Obj=$dbase->prepare($gossip_querystring);
		$last_gossips_Obj->execute();
		$last_gossips=$last_gossips_Obj->fetchAll(PDO::FETCH_ASSOC);

		foreach($last_gossips as $last_gossip)
		{
			//processing business photo
			$gossipViewModel['picture']=$last_gossip['image'];
			//event title
			$gossipViewModel['gossip_title']=$last_gossip['tittle'];
			//start and end dates
			$dateTimeCreated =  date("F j, Y, g:i a",$last_gossip['date_created']);

			$gossipViewModel['date_of_post']=$dateTimeCreated;

			$gossipViewModel['details']=$last_gossip['details'];

			//interested people count

			//$eventViewModel['following_count']=$this->getUsersCountInterestedInEventOfId($last_event['id']);
			//adding event model to array that will be displayed
			$eventViewModel['following_count']=0;  //now wwe shall correct it after db change
			array_push($gossips_array , $gossipViewModel);



		}
		return $gossips_array;

	}

	function getUsersCountInterestedInEventOfId($event_id)
	{
		global $dbase;
		$interested_users_count=0;
		$querystring1 = "SELECT * FROM user_event_interested WHERE event_id = '".$event_id."'";
		$statement_Obj =$dbase->prepare($querystring1);
		$statement_Obj->execute();
		$interested_users = $statement_Obj->fetchAll(PDO::FETCH_ASSOC);
		foreach($interested_users as $interested_user)
		{
		 $interested_users_count =$interested_users_count +1;

		}
		return $interested_users_count;

	}

	public function getAll($querystring)
	{
		global $dbase;
		

		 //returns pdo statement object
		//$qry_array=explode(" ",$querystring);

		//echo "Type of query :".$qry_array[0]; 
		$final_rows=[];

		try{
			
			if(strpos($querystring, "SELEC") !== false){
				$query = $dbase->query($querystring);
				$rows = $query->fetchAll(PDO::FETCH_ASSOC); 
				// foreach($rows as $row)
				// {
					
				// 	$final_rows[] = array_map('utf8_encode', $row);
				// 	//array_push($final_rows,$final_row);
				// }
				
				return $rows;
		    }
		    else
			 {
			 	$query = $dbase->prepare($querystring);
			 	$query->execute();
				return;

			 } //returns an sccociative array of requests
			//echo '<pre>' ,print_r ($rows,true), '</pre>';
			


		}catch(PDOException $ex){
			die($ex->getMessage());
		}

		return;
	}
	public function getResById($querystring,$id)
	{
		global $dbase;
		$query = $dbase->prepare($querystring); //returns pdo statement object
		try{
			$query->execute();

			$rows = $query->fetchAll(PDO::FETCH_ASSOC);  //returns an sccociative array of requests
			foreach($rows as $row)
			{
				if($row['id'] == $id)
				{
					return $row;
				}

			}



		}catch(PDOException $ex){
			die($ex->getMessage());
		}

		return;

	}



	function getUserOfId($id){
		global $errors;
		global $dbase;

		$thisUser = array(
			'id' => 0,
			'first_name' => '',
			'last_name' => '',
			'avatar' => '',
			'email'=>'',
			'city_id' => 0,
			'city' => null
		);

		if(is_numeric($id) && $id > 0 ){
			try{
				$sql = "SELECT * FROM user WHERE id = ". $id;
			    $res = $dbase->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			//this function skips passwords for this user
			    			if(array_key_exists($key, $thisUser)){
			    				$thisUser[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	break;
				}
				//get the city
				$thisCity = $this->getCityOfId($thisUser["city_id"]);
				$thisUser["city"] = $thisCity;
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
	function getCountryOfId($country_id = 0){
		global $errors;
		global $country;
		global $dbase;

		$thisCountry = array();
		$keys = array_keys($country);
		foreach($keys as $key){
			$thisCountry[$key] = $country[$key];
		}

		if(is_numeric($country_id) && $country_id >= 0 ){
			try{
				$sql = "SELECT * FROM country WHERE id = ". $country_id;
				$sql2 = "SELECT * FROM city WHERE country_id = ". $country_id;
			    $res = $dbase->query($sql);
			    $res2 = $this->getAll($sql2);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisCountry)){
			    				$thisCountry[$key] = is_numeric($value) ? intval($value) : $value;
			    				$thisCountry["towns"]=$res2;
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
		global $dbase;

		$thisCity = array();
		$keys = array_keys($city);
		foreach($keys as $key){
			$thisCity[$key] = $city[$key];
		}

		if(is_numeric($city_id) && $city_id >= 0 ){
			try{
				$sql = "SELECT * FROM city WHERE id = ". $city_id;
			    $res = $dbase->query($sql);
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
				$thisCountry = $this->getCountryOfId($thisCity["country_id"]);
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



	function getBusinessOfId($id, $has_details = false){
		global $errors;
		global $business;
		global $dbase;

		$thisBusiness = array();
		$keys = array_keys($business);
		foreach($keys as $key){
			$thisBusiness[$key] = $business[$key];
		}

		if(is_numeric($id) && $id > 0 ){
			try{
				$sql = "SELECT * FROM business WHERE id = ". $id;
			    $res = $dbase->query($sql);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisBusiness)){
			    				$thisBusiness[$key] = is_numeric($value) ? intval($value) : $value;
			    			}
			    		}
			    	}
			    	break;
				}
				
				return $thisBusiness;
			}catch(PDOException $e)
			{
				array_push($errors, $e->getMessage());
			}
		}else{
			array_push($errors, "This business of id : " . $id . ", does not exist");
		}
		return $thisBusiness;
	}


	public function insertBusiness($model)
	{
		$querystring= "INSERT INTO business (user_id,date_created,country_id,logo,name,address,city_id,phone_1,phone_2,email,website,banner,description)VALUES ('".$model->getWhoAddedId()."','".$model->getDateAdded()."','".$model->getCountryId()."','".$model->getProfilePhoto()."','".$model->getName()."','".$model->getAddress()."','".$model->getCityId()."','".$model->getPhone1()."','".$model->getPhone2()."','".$model->getEmail()."','".$model->getWebsite()."','".$model->getBanner()."','".$model->getDescription()."')";

		global $dbase;
		$query = $dbase->prepare($querystring); //returns pdo statement object
		try{
			$query->execute();
			$business_id=$dbase->lastInsertId();
			if($model->getSubCategory1Id()!='' && $model->getSubCategory2Id() !='' && $model->getSubCategory3Id() !=''){
				$querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring1);
				$query->execute();
				$querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring2);
				$query->execute();

				$querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
			$query = $dbase->prepare($querystring3);
			$query->execute();


			}
			else if(strcmp($model->getSubCategory1Id(),'')==0 && strcmp($model->getSubCategory2Id(),'')!=0 && strcmp($model->getSubCategory3Id(),'')!=0){

				$querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring2);
				$query->execute();
			$querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
			$query = $dbase->prepare($querystring3);
			$query->execute();


			}else if(strcmp($model->getSubCategory1Id(),'')!=0 && strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')!=0)
			{
				$querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring1);
				$query->execute();

				$querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring3);
				$query->execute();

			}else if (strcmp($model->getSubCategory1Id(),'')!=0 && strcmp($model->getSubCategory2Id(),'')!=0 && strcmp($model->getSubCategory3Id(),'')==0)
			{
				$querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring1);
				$query->execute();
				$querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring2);
				$query->execute();

			}else if(strcmp($model->getSubCategory1Id(),'')==0 && strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')!=0)
			{
				$querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring3);
				$query->execute();

			}else if (strcmp($model->getSubCategory1Id(),'')!=0 &&strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')==0)
			{
				$querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring1);
				$query->execute();

			}else if(strcmp($model->getSubCategory1Id(),'')==0 &&strcmp($model->getSubCategory2Id(),'')!=0 && strcmp($model->getSubCategory3Id(),'')==0)
			{
				$querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring2);
				$query->execute();

			}else
			{

			}

			//$thisbusiness = $this->getBusinessOfId($business_id);



			return $business_id;




		}catch(PDOException $ex){
			die($ex->getMessage());
		}



	}
	public function updateBusiness($model,$id)
	{
		$bannerstring = $model->getBanner();
		if($bannerstring='')
		{
			echo 'this is the querystring 1';
			$querystring ="UPDATE business SET country_id='".$model->getCountryId()."' ,name='".$model->getName()."',city_id='".$model->getCityId()."',phone_1='".$model->getPhone1()."',phone_2='".$model->getPhone2()."',email='".$model->getEmail()."',website='".$model->getWebsite()."',description='".$model->getDescription()."' WHERE id ='".$id."'";

		}else{
			echo 'this is the querystring 2';

		$querystring ="UPDATE business SET country_id='".$model->getCountryId()."' ,name='".$model->getName()."',city_id='".$model->getCityId()."',phone_1='".$model->getPhone1()."',phone_2='".$model->getPhone2()."',email='".$model->getEmail()."',website='".$model->getWebsite()."',banner='".$model->getBanner()."',description='".$model->getDescription()."' WHERE id ='".$id."'";
		}
		/*$querystring ="UPDATE business SET country_id='".$model->getCountryId()."' ,name='".$model->getName()."',city_id='".$model->getCityId()."',phone_1='".$model->getPhone1()."',phone_2='".$model->getPhone2()."',email='".$model->getEmail()."',website='".$model->getWebsite()."',banner='".$model->getBanner()."',description='".$model->getDescription()."' WHERE id ='".$id."'";*/

		/*$querystring= "INSERT INTO business (user_id,date_created,country_id,name,address,city_id,phone_1,phone_2,email,website,banner,description)VALUES ('".$model->getWhoAddedId()."','".$model->getDateAdded()."','".$model->getCountryId()."','".$model->getName()."','".$model->getAddress()."','".$model->getCityId()."','".$model->getPhone1()."','".$model->getPhone2()."','".$model->getEmail()."','".$model->getWebsite()."','".$model->getBanner()."','".$model->getDescription()."')";*/
		global $dbase;
		$query = $dbase->prepare($querystring); //returns pdo statement object
		try{
			$query->execute();
			$business_id=$id;
			

			if(strcmp($model->getSubCategory1Id(),'')!=0 &&strcmp($model->getSubCategory2Id(),'' )!=0 && strcmp($model->getSubCategory3Id() ,'')!=0){
				/*echo '<br/>';
				echo 'am into the first if';
				echo '<br/>';*/
				$delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
				$query = $dbase->prepare($delquery1);
				$query->execute();
				/*echo '<br/>';
				echo 'executed delete';
				echo '<br/>';*/

				$querystring1="INSERT INTO business_category (sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring1);
				$query->execute();
				/*echo '<br/>';
				echo 'after query';
				echo '<br/>';*/
				$querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring2);
				$query->execute();

				$querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
			$query = $dbase->prepare($querystring3);
			$query->execute();


			}
			else if(strcmp($model->getSubCategory1Id(),'')==0 && strcmp($model->getSubCategory2Id(),'') !=0 && strcmp($model->getSubCategory3Id(),'') !=0){
				$delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
				$query = $dbase->prepare($delquery1);
				$query->execute();

				$querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring2);
				$query->execute();
			$querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
			$query = $dbase->prepare($querystring3);
			$query->execute();


			}else if(strcmp($model->getSubCategory1Id(),'')!=0 && strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')!=0)
			{
				$delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
				$query = $dbase->prepare($delquery1);
				$query->execute();

				$querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring1);
				$query->execute();

				$querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring3);
				$query->execute();

			}else if (strcmp($model->getSubCategory1Id(),'')!=0 &&strcmp($model->getSubCategory2Id(),'')!=0 && strcmp($model->getSubCategory3Id(),'')==0)
			{
				$delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
				$query = $dbase->prepare($delquery1);
				$query->execute();

				$querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring1);
				$query->execute();
				$querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring2);
				$query->execute();

			}else if(strcmp($model->getSubCategory1Id(),'')==0 && strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')!=0)
			{
				$delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
				$query = $dbase->prepare($delquery1);
				$query->execute();

				$querystring3="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory3Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring3);
				$query->execute();

			}else if (strcmp($model->getSubCategory1Id(),'')!=0 &&strcmp($model->getSubCategory2Id(),'')==0 && strcmp($model->getSubCategory3Id(),'')==0)
			{
				$delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
				$query = $dbase->prepare($delquery1);
				$query->execute();

				$querystring1="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory1Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring1);
				$query->execute();

			}else if(strcmp($model->getSubCategory1Id(),'')==0 && strcmp($model->getSubCategory2Id(),'')!=0 && strcmp($model->getSubCategory3Id(),'')==0)
			{
				$delquery1="DELETE  FROM business_category WHERE business_id='".$business_id."'";
				$query = $dbase->prepare($delquery1);
				$query->execute();

				$querystring2="INSERT INTO business_category(sub_category_id,business_id) VALUES('".$model->getSubCategory2Id()."','".$business_id."')";
				$query = $dbase->prepare($querystring2);
				$query->execute();

			}else
			{

			}



			echo 'successfully updated';




		}catch(PDOException $ex){
			die($ex->getMessage());
		}



	}

	function getCategoryOfId($category_id){
		global $errors;
		global $category;
		global $dbase;

		$thisCategory = array();
		$keys = array_keys($category);
		foreach($keys as $key){
			$thisCategory[$key] = $category[$key];
		}

		if(is_numeric($category_id) && $category_id > 0 ){
			try{
				$sql = "SELECT * FROM category WHERE id = ". $category_id;
				$sql2 ="SELECT *FROM sub_category WHERE category_id=".$category_id;
			    $res = $dbase->query($sql);
			    $res2 = $this->getAll($sql2);
			    foreach ($res as $row ) {
			    	foreach ($row as $key => $value) {
			    		if(is_numeric($key) == false){
			    			if(array_key_exists($key, $thisCategory)){
			    				$thisCategory[$key] = is_numeric($value) ? intval($value) : $value;
			    				$thisCategory['sub_categories']=$res2;
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

	function getAdminOfId($id)
	{  global $dbase;
		try{
			$sql = "SELECT * FROM admin WHERE id = ". $id;
			$res = $dbase->query($sql);
			echo '<pre>',print_r($res),'</pre>';
	    }catch(PDOException $e)
	    {

	    }
	    return $res;

	}

	function getSubCategoryOfId($sub_category_id){
		global $errors;
		global $subCategory;
		global $dbase;

		$thisSubCategory = array();
		$keys = array_keys($subCategory);
		foreach($keys as $key){
			$thisSubCategory[$key] = $subCategory[$key];
		}

		if(is_numeric($sub_category_id) && $sub_category_id > 0 ){
			try{
				$sql = "SELECT * FROM sub_category WHERE id = ". $sub_category_id;
			    $res = $dbase->query($sql);
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
			//array_push($errors, "This sub category of id : " . $sub_category_id . ", does not exist");
			echo "no kabadi result";
		}
		return $thisSubCategory;
	}

	function getNewsFeedOfId($newsfeed_id){
		global $dbase;
		global $errors;
		global $newsfeed;

		//newsfeed

		$thisNewsFeed = array();
		$keys = array_keys($newsfeed);
		foreach($keys as $key){

			$thisNewsFeed[$key] = $key;
		}


		try{
			$sql = "SELECT * FROM newsfeed WHERE id = ". $newsfeed_id;
		    $res = $dbase->query($sql);
		    foreach ($res as $row ) {
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			$thisNewsFeed[$key] = is_numeric($value) ? intval($value) : $value;
		    		}
		    	}
		    	//get the users of this news feeds

		    	$thisUser = $this->getUserOfId($thisNewsFeed["user_id"]);
		    	$thisNewsFeed["user"] = $thisUser;
				//get the business for this news feed
				$thisBusiness = $this->getBusinessOfId($thisNewsFeed["business_id"]);
		    	$thisNewsFeed["business"] = $thisBusiness;
		    	//get the likes
		    	$thisLikes = $this->getLikesOfNewsFeedOfId($thisNewsFeed["id"] );
		    	$thisNewsFeed["likes"] = $thisLikes;
		    	//comments
		    	$thisComments =$this->getCommentsOfNewsFeedOfId($thisNewsFeed["id"] );
		    	$thisNewsFeed["comments"]  = $thisComments;
		    	return $thisNewsFeed;
			}
		}catch(PDOException $e)
		{
			//echo $e->getMessage();
			array_push($errors, $e->getMessage());


		}

		return null;
	}

	function getLikesOfNewsFeedOfId($id){
    	global $dbase;
        $databasename='yammzit';
		global $errors;
		global $like;

		$likes = array();

		try{
			$sql = "SELECT * FROM `like` WHERE newsfeed_id = ". $id;
		    $res = $dbase->query($sql);
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
		    	array_push($likes, $thisLike);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $likes;
    }

    function getCommentsOfNewsFeedOfId($id){
    	global $dbase;
		global $errors;
		global $comment;

		$comments = array();

		try{
			$sql = "SELECT * FROM comment WHERE review_id = ". $id . " ORDER BY date_created DESC ";
		    $res = $dbase->query($sql);
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
		    	//add a user for this comment
		    	$thisUser = $this->getUserOfId($thisComment["user_id"]);
		    	$thisComment["user"] = $thisUser;
		    	//get the likes of this comment
		    	$thisComments =$this->getLikesOfCommentOfId($thisComment["id"]);
		    	$thisComment["likes"] = $thisComments;
		    	array_push($comments, $thisComment);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $comments;
    }
     function getCommentOfId($id){
    	global $dbase;
		global $errors;
		global $comment;

		$thisComment = array();
		$keys = array_keys($comment);
		foreach($keys as $key){
			$thisComment[$key] = $key;
		}

		try{
			$sql = "SELECT * FROM comment WHERE id = ". $id;
		    $res = $dbase->query($sql);
		    foreach ($res as $row ) {
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisComment)){
		    				$thisComment[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	//add a user for this comment
		    	$thisUser =$this->getUserOfId($thisComment["user_id"]);
		    	$thisComment["user"] = $thisUser;
		    	//get the likes of this comment
		    	$thisComments = $this->getLikesOfCommentOfId($thisComment["id"]);
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
    	global $dbase;
    	global $databasename;
		global $errors;
		global $like;

		$thisLike = array();
		$keys = array_keys($like);
		foreach($keys as $key){
			$thisLike[$key] = $key;
		}

		try{
			$sql = "SELECT * FROM `like` WHERE id = ". $id;
		    $res = $dbase->query($sql);
		    foreach ($res as $row ) {
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			if(array_key_exists($key, $thisLike)){
		    				$thisLike[$key] = is_numeric($value) ? intval($value) : $value;
		    			}
		    		}
		    	}
		    	break;
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
		return $thisLike;
    }


    function renderCategories()
    {
    	global $dbase;

      $mycategories = array();
      $categoriess =$this->getAll("SELECT id,name,icon FROM category");

    	foreach($categoriess as $category)
    	{

    		$category_array = array(

					'category_id'=>'',
    			'categoryname' => '',
					'category_icon'=>'',
					'category_subcategories'=>array(),
    			 'businesses' => array()
    		);

				$category_array['category_id']= $category['id'];
    		    $category_array['categoryname']= $category['name'];
				$category_array['category_icon']= $category['icon'];
				$category_subcategories = array();

    		//echo $category_array['categoryname'];
    		$businesses =array();
    		$subquery ="SELECT * FROM sub_category WHERE category_id ='".$category['id']."'";
    		$subcategories =$this->getAll($subquery);

    		foreach($subcategories as $subcategory)
	    	{
					array_push($category_subcategories,$subcategory);
	    		$business_category_query="SELECT * FROM business_category WHERE sub_category_id ='".$subcategory['id']."'";
	    		$business_categories =$this->getAll($business_category_query);
	    		foreach($business_categories as $business_category)
			    {
			    		$business = $this->getBusinessOfId($business_category['business_id'],true);
			    		$newfeeds = $this->getAll("SELECT *FROM newsfeed WHERE business_id='".$business['id']."'");
			    		$business['news_feed_count']=count($newfeeds);
			    		array_push($businesses, $business );
			    }

	    	}

	    	$category_array['businesses']=$businesses;
			$category_array['category_subcategories']=$category_subcategories;
			//echo json_encode($category_array);
	    	array_push($mycategories,$category_array);
				
    	}
    	//header("Content-type: application/json; charset=utf-8");
    	//echo json_encode($mycategories);
    	return $mycategories;

    }

    function insertNewUser($first_name,$last_name,$email,$password,$city_id,$date_of_birth,$gender,$social,$avatar,$phone,$social_id='null')
    {
    	global $dbase;

    	$querystring= "INSERT INTO user (first_name,last_name,email,password,city_id,date_of_birth,sex,social,avatar,social_id,phone_number)VALUES ('".$first_name."','".$last_name."','".$email."','".$password."','".$city_id."','".$date_of_birth."','".$gender."','".$social."','".$avatar."','".$social_id."','".$phone."')";

    	$query = $dbase->prepare($querystring);
    	//echo $query;
    	try{
    		$query->execute();
    		$querystring2 ="SELECT id FROM user WHERE email ='".$email."'";
    		$res = $this->getAll($querystring2);


    		//echo $res[0]["id"];
    		 $logObj =array(
    		 	"email"=>$email,
    		 	"password"=>$password
    		 );
    		return $logObj;
    	}catch(PDOException $ex){
			die($ex->getMessage());
		}

    }

    function dropcategories()
    {
    	global  $dbase;
    	$category_array =array();
    	$categoriess =$this->getAll("SELECT id,name FROM category");
    	foreach($categoriess as $category)
    	{

    		$subcategories = $this->getAll("SELECT id,name FROM sub_category WHERE category_id ='".$category['id']."'");

    		$categoryModel = array(
    			'categoryname' => $category['name'],
    			'category_id' =>$category['id'],
    			'subcategories' =>$subcategories
    		);

    		array_push($category_array,$categoryModel);


    	}

    	return $category_array;

    }

    function getSuggestedDataToFollow($table,$limit,$city_id,$user_id)
    {
    	global $dbase;
    	$querystring ="SELECT * FROM ".$table." WHERE city_id ='".$city_id."' ORDER BY RAND() LIMIT $limit";
    	$query = $dbase->query($querystring);
    	
    	try{
			//$query->execute();

			$rows = $query->fetchAll(PDO::FETCH_ASSOC);  //returns an sccociative array of requests
			//echo '<pre>' ,print_r ($rows,true), '</pre>';

			if($table=='business')
			{
				$businesses_to_render =array();
				foreach($rows as $row)
				{
					$followquery="SELECT *FROM business_follower WHERE user_id ='".$user_id."' AND business_id='".$row['id']."' ";
					$business_followers=$this->getAll($followquery);
					if(empty($business_followers))
					{
						array_push($businesses_to_render,$row);
					}
				}
				return $businesses_to_render;

			}else if($table=='user')
			{
				$users_to_render =array();
				foreach($rows as $row)
				{
					$followquery="SELECT *FROM user_follower WHERE follower_id ='".$user_id."' AND user_id='".$row['id']."' ";
					$user_followers=$this->getAll($followquery);
					if(empty($user_followers))
					{
						array_push($users_to_render,$row);
					}
				}

				return $users_to_render;

			}
			
			
			return;

		}catch(PDOException $ex){
			die($ex->getMessage());
		}

    }

    function getAllDataRandomly($table,$limit)
    {

    	global $dbase;
    	
    	$querystring ="SELECT * FROM ".$table." ORDER BY RAND() LIMIT $limit";


		$query = $dbase->query($querystring); //returns pdo statement object

		try{
			//$query->execute();

			$rows = $query->fetchAll(PDO::FETCH_ASSOC);  //returns an sccociative array of requests
			//echo '<pre>' ,print_r ($rows,true), '</pre>';
			return $rows;


		}catch(PDOException $ex){
			die($ex->getMessage());
		}

		return;
    }

    function insertCommentLike($user_id,$comment_id,$newsfeed_id,$date_created)
    {
    	global $dbase;
    	$querystring ="INSERT INTO `like` (user_id,comment_id,newsfeed_id,date_created) VALUES ('".$user_id."','".$comment_id."','".$newsfeed_id."','".$date_created."')";
    	$query = $dbase->prepare($querystring); //returns pdo statement object
		try{
			$query->execute();
			$returnQuery ="SELECT *FROM `like` WHERE comment_id= $comment_id";
			$likes = $this->getAll($returnQuery);
			echo json_encode(count($likes));
		}catch(PDOException $ex){
			die($ex->getMessage());
		}

    }

    function deleteCommentLike($user_id,$comment_id,$newsfeed_id,$date_created)
    {
    	global $dbase;
    	$querystring = "DELETE FROM `like` WHERE user_id='".$user_id."' AND comment_id='".$comment_id."'";
    	$query = $dbase->prepare($querystring); //returns pdo statement object
		try{
			$query->execute();
			$returnQuery ="SELECT *FROM `like` WHERE comment_id= $comment_id";
			$likes = $this->getAll($returnQuery);
			echo json_encode(count($likes));
		}catch(PDOException $ex){
			die($ex->getMessage());
		}

    }


    function insertNewsFeedLike($user_id,$newsfeed_id,$date_created)
    {
    	global $dbase;
    	$comment_id=0;
    	$querystring ="INSERT INTO `like` (user_id,newsfeed_id,date_created,comment_id) VALUES ('".$user_id."','".$newsfeed_id."','".$date_created."','".$comment_id."')";
    	$query = $dbase->prepare($querystring); //returns pdo statement object
		try{
			$query->execute();

			$returnQuery ="SELECT *FROM `like` WHERE newsfeed_id=$newsfeed_id ";
			$likes = $this->getAll($returnQuery);
			echo json_encode(count($likes));
		}catch(PDOException $ex){
			die($ex->getMessage());
		}

    }

    function deleteNewsFeedLike($user_id,$newsfeed_id,$date_created)
    {
    	global $dbase;
    	$querystring = "DELETE FROM `like` WHERE user_id='".$user_id."' AND newsfeed_id='".$newsfeed_id."'";
    	$query = $dbase->prepare($querystring); //returns pdo statement object
		try{
			$query->execute();
			$returnQuery ="SELECT *FROM `like` WHERE newsfeed_id= $newsfeed_id";
			$likes = $this->getAll($returnQuery);
			echo json_encode(count($likes));
		}catch(PDOException $ex){
			die($ex->getMessage());
		}

    }

   function acceptRequest($acceptor_id,$requestor_id,$date_created)
    {
    	global $dbase;
    	$friendly_status =2;
    	$querystring="UPDATE user_friend SET status='".$friendly_status."' WHERE user_id='".$acceptor_id."' AND friend_id='".$requestor_id."'";
    	$query = $dbase->prepare($querystring); //returns pdo statement object
		try{
			$query->execute();

			echo ("Accepted friend request");

		}catch(PDOException $ex){
			echo ("feiled buddy man");
			die($ex->getMessage());
		}


    }
    function denyRequest($denier_id,$requestor_id)
    {
    	global $dbase;
    	$friendly_status =2;
    	$querystring="DELETE  FROM user_friend  WHERE user_id='".$denier_id."' AND friend_id='".$requestor_id."'";
    	$query = $dbase->prepare($querystring); //returns pdo statement object
		try{
			$query->execute();

			echo ("denied friend request");

		}catch(PDOException $ex){
			echo ("feiled buddy man");
			die($ex->getMessage());
		}


    }
    function insertNewFeedLike($user_id,$comment_id,$newsfeed_id,$date_created)
    {
    	global $dbase;
    	$querystring ="INSERT INTO `like` (user_id,comment_id,newsfeed_id,date_created) VALUES ('".$user_id."','".$comment_id."','".$newsfeed_id."','".$date_created."')";
    	$query = $dbase->prepare($querystring); //returns pdo statement object
		try{
			$query->execute();
			$returnQuery ="SELECT *FROM `like` WHERE newsfeed_id= $newsfeed_id";
			$likes = $this->getAll($returnQuery);
			echo json_encode(count($likes));
		}catch(PDOException $ex){
			die($ex->getMessage());
		}

 
    }
    function insertNewsfeed($date_created,$user_id,$kind,$cost,$good,$details,$business_id)
    {
    	global $dbase;
    	$querystring = "INSERT INTO newsfeed(date_created,user_id,kind,cost,good,details,business_id) VALUES ('".$date_created."','".$user_id."','".$kind."','".$cost."','".$good."','".$details."','".$business_id."')";

    	$ratings = $this->getAll("SELECT *FROM user_business_rating WHERE user_id ='".$user_id."' AND business_id='".$business_id."'");
    	if(!empty($ratings))
    	{
    		$querystring2="UPDATE user_business_rating SET good='".$good."',cost='".$cost."' WHERE business_id ='".$business_id."' AND user_id='".$user_id."'";
    	}else
    	{
    		$querystring2="INSERT INTO user_business_rating(user_id,business_id,good,cost) VALUES ('".$user_id."','".$business_id."','".$good."','".$cost."')";
    	}

    	$query = $dbase->prepare($querystring); //returns pdo statement object
    	$query2 = $dbase->prepare($querystring2);

		try{
			$query->execute();
			$query2->execute();

			$newsfeeds=$this->getAll("SELECT *FROM newsfeed WHERE business_id='".$business_id."' ORDER BY id DESC");
			//$id = $dbase->lastInsertId();
			
			$id=$newsfeeds[0]['id'];
			
			$querystring3 = "INSERT INTO user_wall(user_id,review_id,date_created) VALUES ('".$user_id."','".$id."','".$date_created."')";
    		$query3 = $dbase->prepare($querystring3);
    		$query3->execute();

    		
    		

			$newsfeed =$this->getNewsFeedOfId($id);
			return ($newsfeed);

		}catch(PDOException $ex){
			die($ex->getMessage());
		}


    }
    function insertComment($user_id,$review_id,$kind,$details,$date_created,$commentTo)
    {
    	global $dbase;
    	$querystring = "INSERT INTO comment(user_id,review_id,kind,details,date_created,commenTo) VALUES ('".$user_id."','".$review_id."','".$kind."','".$details."','".$date_created."','".$commentTo."')";
    	$query = $dbase->prepare($querystring);
    	 //returns pdo statement object

		try{

			$query->execute();
			$comments=$this->getAll("SELECT id FROM comment WHERE review_id='".$review_id."' ORDER BY id DESC");
			//$id = $dbase->lastInsertId();

			$id=$comments[0]['id'];
			//echo "the isdiodidisi".$id;
			$comment =$this->getCommentOfId($id);
			//echo json_encode($comment);
			return ($comment);

		}catch(PDOException $ex){
			die($ex->getMessage());
		}

    }



    function updateDb($id,$new_password)
    {

        global $dbase;
        $querystring="UPDATE user SET password='".$new_password."' WHERE id='".$id."'";
    	$query = $dbase->prepare($querystring);
    	try{

			$query->execute();

			//$id = $dbase->lastInsertId();

			// $id=$comments[0]['id'];
			// echo "the isdiodidisi".$id;
			// $comment =$this->getCommentOfId($id);
			// echo json_encode($comment);

			//return ("success");

		}catch(PDOException $ex){
			die($ex->getMessage());
		}


    }

    function followItem($item_type,$user_id,$item_id)
    {
    	global $dbase;
    	$date_created =time();
    	$querystring='';
    	if(strcmp($item_type,'business')==0)
    	{
    		//first check if thie userid already followed this business
    		$alreadyFollows = $this->getAll("SELECT * FROM business_follower WHERE user_id='".$user_id."' AND business_id='".$item_id."' ");
    		if(empty($alreadyFollows))
    		{
    			$querystring ="INSERT INTO business_follower(user_id,business_id,date_created) VALUES ('".$user_id."','".$item_id."','".$date_created."')";
    			$query = $dbase->prepare($querystring);
    			try{

					$query->execute();

					echo ("Sucessfully followed business");

				}catch(PDOException $ex){
					die($ex->getMessage());
				}

    		}else
    		{
    			echo ("Already followed by you");
    		}


    	}elseif (strcmp($item_type,'person')==0) {
    		# code...
    		$alreadyFollows = $this->getAll("SELECT * FROM user_follower WHERE user_id='".$item_id."' AND follower_id='".$user_id."' ");
    		if(empty($alreadyFollows)){
    			$querystring ="INSERT INTO user_follower(user_id,follower_id,date_created) VALUES ('".$item_id."','".$user_id."','".$date_created."')";
    			$query = $dbase->prepare($querystring);
    			try{

					$query->execute();

					echo ("Sucessfully followed person");

				}catch(PDOException $ex){
					die($ex->getMessage());
				}
    		}else
    		{
    			echo ("Already followed by you");
    		}
    	}



    }
    function unFollowItem($item_type,$user_id,$item_id)
    {
    	global $dbase;

    	$querystring='';
    	if(strcmp($item_type,'business')==0)
    	{
    		//first check if thie userid already followed this business

    			$querystring ="DELETE FROM business_follower where user_id='".$user_id."' AND business_id='".$item_id."'";
    			$query = $dbase->prepare($querystring);
    			try{

					$query->execute();

					echo ("Sucessfully unfollowed business");

				}catch(PDOException $ex){
					die($ex->getMessage());
				}




    	}elseif (strcmp($item_type,'person')==0) {
    		# code...
    		$querystring ="DELETE FROM user_follower where user_id='".$item_id."' AND follower_id='".$user_id."'";



    			$query = $dbase->prepare($querystring);
    			try{

					$query->execute();

					echo ("Sucessfully unfollowed person");

				}catch(PDOException $ex){
					die($ex->getMessage());
				}

    	}



    }

    function  sendFriendRequest($sender_id,$reciever_id)
    {
    	global $dbase;
    	$date_created =time();
    	$status=1;
    	$querystring='';

    	$alreadySents = $this->getAll("SELECT * FROM user_friend WHERE user_id='".$reciever_id."' AND friend_id='".$sender_id."' ");
    	//echo $alreadySents;
    	if(empty($alreadySents))
    	{
    		$querystring ="INSERT INTO user_friend(user_id,friend_id,date_created,status,date_last_modified) VALUES ('".$reciever_id."','".$sender_id."','".$date_created."','".$status."','".$date_created."')";
    			$query = $dbase->prepare($querystring);
    			try{

					$query->execute();

					echo ("Sucessfully sent  freind request");

				}catch(PDOException $ex){
					die($ex->getMessage());
				}

    	}else
    	{
    		echo ("Request already sent");
    	}


    }

    function unFriendPerson($chucker_id,$chucked_id)
    {
    	global $dbase;
    	$querystring='';

    	$querystring ="DELETE FROM user_friend where user_id='".$chucked_id."' AND friend_id='".$chucker_id."'";
    	$querystring2 ="DELETE FROM user_friend where user_id='".$chucker_id."' AND friend_id='".$chucked_id."'";

    	$query = $dbase->prepare($querystring);
    	$query2 = $dbase->prepare($querystring2);
    	try{

				$query->execute();
				$query2->execute();

				echo ("Sucessfully chucked person");

			}catch(PDOException $ex){
				die($ex->getMessage());
		}

    }

    function editProfile($id,$picture,$first_name,$last_name,$cityid,$email,$alternative_email,$phone_number,$gender,$dob,$password,$facebook_link,$twitter_link,$instagram_link,$youtube_link)
    {
    	global $dbase;

    	$querystring ="UPDATE user SET first_name='".$first_name."',last_name='".$last_name."',city_id='".$cityid."',avatar='".$picture."',email='".$email."',alternative_email='".$alternative_email."',phone_number='".$phone_number."',date_of_birth='".$dob."',sex='".$gender."',password='".$password."',facebook_link='".$facebook_link."',twitter_link='".$twitter_link."',instagram_link='".$instagram_link."',youtube_link='".$youtube_link."' WHERE id='".$id."'";
    	$query = $dbase->prepare($querystring);

    	try{

				$query->execute();

				return $id;

		}catch(PDOException $ex){

				die($ex->getMessage());
		}





    }

    function addToFavourites($item_type,$user_id,$business_id)
    {

    	global $dbase;
    	$date_created =time();
    	$querystring='';
    	if(strcmp($item_type,'business')==0)
    	{
    		//first check if thie userid already followed this business
    		$alreadyFavourites= $this->getAll("SELECT * FROM business_favorite WHERE user_id='".$user_id."' AND business_id='".$business_id."' ");
    		if(empty($alreadyFavourites))
    		{
    			$querystring ="INSERT INTO business_favorite(user_id,business_id,date_created) VALUES ('".$user_id."','".$business_id."','".$date_created."')";
    			$query = $dbase->prepare($querystring);
    			try{

					$query->execute();

					echo ("Sucessfully added to favourites business");

				}catch(PDOException $ex){
					die($ex->getMessage());
				}

    		}else
    		{
    			echo ("Already favourite");
    		}


    	}

    }
    function submitBusinessPhoto($user_id,$business_id,$photo)
    {
    	global $dbase;
    	$date_created = time();
    	$querystring ="INSERT INTO business_photo(user_id,business_id,photo,date_created) VALUES ('".$user_id."','".$business_id."','".$photo."','".$date_created."')";
    	$query = $dbase->prepare($querystring);

    	try{

				$query->execute();

				//echo ("Sucessfully added photo");

		}catch(PDOException $ex){

				die($ex->getMessage());
		}

    }

	function submitNewsFeedPhoto($newsfeed_id,$photo)
    {
    	global $dbase;
    	$date_created = time();
    	$querystring ="INSERT INTO newsfeed_photo(newsfeed_id,photo,date_created) VALUES ('".$newsfeed_id."','".$photo."','".$date_created."')";
    	$query = $dbase->prepare($querystring);

    	try{

				$query->execute();

				//echo ("Sucessfully added photo");

		}catch(PDOException $ex){

				die($ex->getMessage());
		}

    }

    function rateBusiness($userid,$date_created,$good,$cost,$business_id)
    {
    	global $dbase;
    	$date_created = time();
    	$ratings = $this->getAll("SELECT *FROM user_business_rating WHERE user_id ='".$userid."' AND business_id='".$business_id."'");
    	if(!empty($ratings))
    	{
    		$querystring2="UPDATE user_business_rating SET good='".$good."',cost='".$cost."' WHERE business_id ='".$business_id."' AND user_id='".$userid."'";
    	}else
    	{
    		$querystring2="INSERT INTO user_business_rating(user_id,business_id,good,cost) VALUES ('".$user_id."','".$business_id."','".$good."','".$cost."')";
    	}
    	
    	$query = $dbase->prepare($querystring2);
    	try{

				$query->execute();
				//$query2->execute();
				$business_ratings=$this->getAll("SELECT *FROM user_business_rating WHERE  business_id ='".$business_id."'");
				$rate=0;
				$price=0;
				$final_rate=0;
				$final_price=0;
				foreach ($business_ratings as $business_rating) {
					# code...
					$rate = $rate+intval($business_rating['good']);
					$price = $price+intval($business_rating['cost']);


				}
				if($rate>-1 && $rate<50)
				{
					$final_rate=0;

				}else if($rate>49 && $rate<100)
				{
					$final_rate=1;

				}else if($rate>99 && $rate<150)
				{
					$final_rate=2;
				}else if($rate>149 && $rate<200)
				{
					$final_rate=3;
				}else if($rate>199 && $rate<250)
				{
					$final_rate=4;
				}else if($rate>249)
				{
					$final_rate=5;
				}


				if($price>-1 && $price<50)
				{
					$final_price=0;
				}else if($price>49 && $price<100)
				{	
					$final_price=1;

				}else if($price>99 && $price<150)
				{
					$final_price=2;
				}else if($price>149 && $price<200)
				{
					$final_price=3;	
				}else if($price>199 && $price<250)
				{
					$final_price=4;
				}else if($price>249)
				{
					$final_price=5;
				}
    	        
    	        $sqql = "UPDATE business SET cost='".$final_price."', good='".$final_rate."' WHERE id='".$business_id."'";
    	        //echo($sqql);
    	        $sqqlquery= $dbase->prepare($sqql);
    	        $sqqlquery->execute();


				//echo ("Sucessfully added photo");

		}catch(PDOException $ex){

				die($ex->getMessage());
		}



    }

    function editPublicInfo($user_id,$business_id,$date_created,$business_name,$business_email,$business_website,$country_id,$city_id,$phone_1,$phone_2,$category_1_id,$category_2_id,$category_3_id,$sub_category_1_id,$sub_category_2_id,$sub_category_3_id,$address,$description,$cover_photo,$logo,$category_1_post,$category_2_post,$category_3_post)
    {
    	global $dbase;
    	$querystring ="UPDATE business SET name='".$business_name."',email='".$business_email."',website='".$business_website."',country_id='".$country_id."',city_id='".$city_id."',address='".$address."',banner='".$cover_photo."',logo='".$logo."',phone_1='".$phone_1."',phone_2='".$phone_2."',description='".$description."' WHERE id ='".$business_id."'";
    	$querystring2 = "DELETE FROM business_category WHERE business_id='".$business_id."'";

    	$querystring3="INSERT INTO business_category (sub_category_id, business_id) VALUES ('".$sub_category_1_id."','".$business_id."')";
    	$querystring4="INSERT INTO business_category (sub_category_id, business_id) VALUES ('".$sub_category_2_id."','".$business_id."')";
    	$querystring5="INSERT INTO business_category (sub_category_id, business_id) VALUES ('".$sub_category_3_id."','".$business_id."')";

    	$query = $dbase->prepare($querystring);
    	$query2 = $dbase->prepare($querystring2);
    	$query3 = $dbase->prepare($querystring3);
    	$query4 = $dbase->prepare($querystring4);
    	$query5 = $dbase->prepare($querystring5);
    	

    	try{

			$query->execute();
			$query2->execute();
			if($category_1_post==1){
				$query3->execute();
			}
			if($category_2_post==1)
			{
				$query4->execute();
			}
			if($category_2_post==2){
				$query5->execute();
			}
			
			
					

			echo $business_id;

		}catch(PDOException $ex){

			die($ex->getMessage());
		}


    }

    function insertBusinessClaimOrEdit($transaction,$business_name,$address,$user_id,$business_id,$phone_1,$phone_2,$email,$website,$position,$banner_web,$logo_web,$date_created,$status,$description,$category1_id,$category2_id,$category3_id,$sub_category_1_id,$sub_category_2_id,$sub_category_3_id,$monday_open,$monday_close,$tuesday_open,$tuesday_close,$wednesday_open,$wednesday_close,$thursday_open,$thursday_close,$friday_open,$friday_close,$saturday_open,$saturday_close,$sunday_open,$sunday_close,$facebook_link,$twitter_link,$youtube_link,$instagram_link,$other_take_away,$other_accepts_credit_card,$other_good_for_children,$other_good_for_dancing,$other_good_for_groups,$other_music,$other_alcohol,$other_happy_hour,$other_best_night,$other_outdoor_seating,$other_has_wi_fi,$other_has_tv,$other_delivery,$other_take_reservation,$other_waiter_service,$other_has_pool_table,$country_id,$city_id,$category_1_post,$category_2_post,$category_3_post)
    {

    	global $dbase;

    	if(strcmp($transaction,"super_claim")==0){

    	$querystring="INSERT INTO user_business_claim (user_id,business_id,phone_1,phone_2,email,position,banner_web,logo_web,date_created,status,description,category1_id,category2_id,category3_id,monday_open,monday_close,tuesday_open,tuesday_close,wednesday_open,wednesday_close,thursday_open,thursday_close,friday_open,friday_close,saturday_open,saturday_close,sunday_open,sunday_close,facebook_link,twitter_link,youtube_link,instagram_link,other_take_away,other_accepts_credit_card,other_good_for_children,other_good_for_dancing,other_good_for_groups,other_music,other_alcohol,other_happy_hour,other_best_night,other_outdoor_seating,other_has_wi_fi,other_has_tv,other_delivery,other_take_reservation,other_waiter_service,other_has_pool_table,country_id,city_id)VALUES ('".$user_id."','".$business_id."','".$phone_1."','".$phone_2."','".$email."','".$position."','".$banner_web."','".$logo_web."','".$date_created."','".$status."','".$description."','".$category1_id."','".$category2_id."','".$category3_id."','".$monday_open."','".$monday_close."','".$tuesday_open."','".$tuesday_close."','".$wednesday_open."','".$wednesday_close."','".$thursday_open."','".$thursday_close."','".$friday_open."','".$friday_close."','".$saturday_open."','".$saturday_close."','".$sunday_open."','".$sunday_close."','".$facebook_link."','".$twitter_link."','".$youtube_link."','".$instagram_link."','".$other_take_away."','".$other_accepts_credit_card."','".$other_good_for_children."','".$other_good_for_dancing."','".$other_good_for_groups."','".$other_music."','".$other_alcohol."','".$other_happy_hour."','".$other_best_night."','".$other_outdoor_seating."','".$other_has_wi_fi."','".$other_has_tv."','".$other_delivery."','".$other_take_reservation."','".$other_waiter_service."','".$other_has_pool_table."','".$country_id."','".$city_id."')";

    		$query = $dbase->prepare($querystring);

	    	try{

					$query->execute();
					

					return $business_id;

			}catch(PDOException $ex){

					die($ex->getMessage());
			}
    	}else if(strcmp($transaction,"super_edit")==0)
    	{
    		
    		$magicClaims =$this->getAll("SELECT *FROM user_business_claim WHERE user_id ='".$user_id."' AND business_id ='".$business_id."' AND status ='".$status."' ");

    		if(!empty($magicClaim))
    		{


    			$magicClaim=$magicClaims[0];

    			if($country_id == 0 || $country_id ==null)
    			{
    				$country_id = $magicClaim['country_id'];
    			}else
    			{
    				$country_id = $country_id; 
    			}

    			if($city_id == 0 || $city == null)
    			{
    				$city_id = $magicClaim['city_id'];
    			}else
    			{
    				$city_id = $city_id; 
    			}

    			if($category1_id == 0 || $category1_id == null)
    			{
    				$category1_id = $magicClaim['category1_id'];
    			}else
    			{
    				$category1_id = $category1_id; 
    			}

    			if($category2_id == 0 || $category2_id == null)
    			{
    				$category2_id = $magicClaim['category2_id'];
    			}else
    			{
    				$category2_id = $category2_id; 
    			}


    			if($category3_id == 0 || $category3_id == null)
    			{
    				$category3_id = $magicClaim['category3_id'];
    			}else
    			{
    				$category3_id = $category3_id; 
    			}



    			





    		}


    		$mystatus = "approved";
    		$querystring ="UPDATE user_business_claim SET position='".$position."',email='".$email."',country_id='".$country_id."',city_id='".$city_id."',phone_1='".$phone_1."',phone_2='".$phone_2."',category1_id='".$category1_id."',category2_id='".$category2_id."',category3_id='".$category3_id."',address='".$address."',description='".$description."',monday_open='".$monday_open."',monday_close='".$monday_close."',tuesday_open='".$tuesday_open."',tuesday_close='".$tuesday_close."',wednesday_open='".$wednesday_open."',wednesday_close='".$wednesday_close."',thursday_open='".$thursday_open."',thursday_close='".$thursday_close."',friday_open='".$friday_open."',friday_close='".$friday_close."',saturday_open='".$saturday_open."',saturday_close='".$saturday_close."',sunday_open='".$sunday_open."',sunday_close='".$sunday_close."',facebook_link='".$facebook_link."',twitter_link='".$twitter_link."',instagram_link='".$instagram_link."',youtube_link='".$youtube_link."',banner_web='".$banner_web."',logo_web='".$logo_web."' ,other_accepts_credit_card='".$other_accepts_credit_card."',other_take_reservation='".$other_take_reservation."',other_good_for_children='".$other_good_for_children."',other_good_for_dancing='".$other_good_for_dancing."',other_good_for_groups='".$other_good_for_groups."',other_take_away='".$other_take_away."',other_delivery='".$other_delivery."',other_music='".$other_music."',other_outdoor_seating='".$other_outdoor_seating."',other_has_pool_table='".$other_has_pool_table."',other_waiter_service='".$other_waiter_service."',other_happy_hour='".$other_happy_hour."',other_best_night='".$other_best_night."',other_alcohol='".$other_alcohol."',other_has_tv='".$other_has_tv."',other_has_wi_fi='".$other_has_wi_fi."' WHERE user_id ='".$user_id."' AND business_id ='".$business_id."' AND status ='".$mystatus."' ";

    		$querystring2 ="UPDATE business SET name='".$business_name."',email='".$email."',website='".$website."',country_id='".$country_id."',city_id='".$city_id."',address='".$address."',banner='".$banner_web."',logo='".$logo_web."',phone_1='".$phone_1."',phone_2='".$phone_2."',description='".$description."' WHERE id ='".$business_id."'";

    		$querystring3="INSERT INTO business_category (sub_category_id, business_id) VALUES ('".$sub_category_1_id."','".$business_id."')";

    		$querystring4="INSERT INTO business_category (sub_category_id, business_id) VALUES ('".$sub_category_2_id."','".$business_id."')";

    		$querystring5="INSERT INTO business_category (sub_category_id, business_id) VALUES ('".$sub_category_3_id."','".$business_id."')";


    		$query = $dbase->prepare($querystring);
    		$query2 = $dbase->prepare($querystring2);
    		$query3 = $dbase->prepare($querystring3);
    		$query4 = $dbase->prepare($querystring4);
    		$query5 = $dbase->prepare($querystring5);


	    	try{

					$query->execute();
					$query2->execute();

					//echo "whatman yo yo".$business_id;
					if($category_1_post==1){
						$query3->execute();
					}
					if($category_2_post==1)
					{
						$query4->execute();
					}
					if($category_2_post==2){
						$query5->execute();
					}
				

					return $business_id;

			}catch(PDOException $ex){
					echo "kabadi nsobi".$ex->getMessage();
					die($ex->getMessage());
			}

    	}

    	



    }


    function checkCode($code)
    {
    	global $dbase;
    	$sql ="SELECT *FROM user_business_claim WHERE code='".$code."'";

    	$claims = $this->getAll($sql);

    	if(!empty($claims))
    	{
    		$status='Approved';
    		$date_claimed =time();
    		$date_of_approve =time();

    		$claim = $claims[0];
    		$sql2="UPDATE user_business_claim SET  status='".$status."',date_approved='".$date_of_approve."'  WHERE id='".$claim['id']."'";

    		$sql3="UPDATE business SET  owner_id='".$claim['user_id']."',date_claimed='".$date_claimed."',country_id='".$claim['country_id']."',city_id='".$claim['city_id']."',address='".$claim['address']."',phone_1='".$claim['phone_1']."',phone_2='".$claim['phone_2']."',email='".$claim['email']."',website='".$claim['website']."',logo='".$claim['logo_web']."',banner='".$claim['banner_web']."',description='".$claim['description']."' WHERE  id='".$claim['business_id']."'";

    		
    		
			$query1 = $dbase->prepare($sql2); //returns pdo statement object
			$query2 = $dbase->prepare($sql3);
			try{

				 $query1->execute();
				 $query2->execute();

				 return $claim['business_id'];

			}catch(PDOException $ex){
				echo "kabadi nsobi".$ex->getMessage();
				die($ex->getMessage());
				return 0;
			}

    	}else
    	{

    		return -1;
    	}

    }







}



?>
