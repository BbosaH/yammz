<?php
require_once "Dbase.php";

class connector 
{
	public $dbase ;
	public function __construct(){
		global $dbase;
		$dbaseobj = new Dbase();
		$dbase= $dbaseobj->test_db_connect('localhost','yammzit','root','');
		//('localhost','yammzit','root','YES');
	}

	public function getAll($querystring)
	{
		global $dbase;
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
				//get the user for this business, this is the person who added the business
				//$thisUser  = getUserOfId(intval($thisBusiness["user_id"]));
				//$thisBusiness["user"] = $thisUser;
				//get the owner for this business
				// $thisOwner  = getUserOfId(intval($thisBusiness["owner_id"]));
				// $thisBusiness["owner"] = $thisOwner;
				//the city
				//$thisCity = getCityOfId($thisBusiness["city_id"]);
				/*$thisBusiness["city"] = $thisCity;
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
				}*/
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
		$querystring= "INSERT INTO business (user_id,date_created,country_id,name,address,city_id,phone_1,phone_2,email,website,banner,description)VALUES ('".$model->getWhoAddedId()."','".$model->getDateAdded()."','".$model->getCountryId()."','".$model->getName()."','".$model->getAddress()."','".$model->getCityId()."','".$model->getPhone1()."','".$model->getPhone2()."','".$model->getEmail()."','".$model->getWebsite()."','".$model->getBanner()."','".$model->getDescription()."')";
		
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
			
			

			echo 'successfully true';
			 
			
			

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
			$querystring ="UPDATE business SET country_id='".$model->getCountryId()."' ,name='".$model->getName()."',city_id='".$model->getCityId()."',phone_1='".$model->getPhone1()."',phone_2='".$model->getPhone2()."',email='".$model->getEmail()."',website='".$model->getWebsite()."',
			address='".$model->getAddress()."',description='".$model->getDescription()."' WHERE id ='".$id."'";

		}else{
			echo 'this is the querystring 2';

		$querystring ="UPDATE business SET country_id='".$model->getCountryId()."' ,name='".$model->getName()."',city_id='".$model->getCityId()."',phone_1='".$model->getPhone1()."',phone_2='".$model->getPhone2()."',email='".$model->getEmail()."',website='".$model->getWebsite()."',banner='".$model->getBanner()."',address='".$model->getAddress()."',description='".$model->getDescription()."' WHERE id ='".$id."'";
		}
		/*$querystring ="UPDATE business SET country_id='".$model->getCountryId()."' ,name='".$model->getName()."',city_id='".$model->getCityId()."',phone_1='".$model->getPhone1()."',phone_2='".$model->getPhone2()."',email='".$model->getEmail()."',website='".$model->getWebsite()."',banner='".$model->getBanner()."',description='".$model->getDescription()."' WHERE id ='".$id."'";*/
		
		/*$querystring= "INSERT INTO business (user_id,date_created,country_id,name,address,city_id,phone_1,phone_2,email,website,banner,description)VALUES ('".$model->getWhoAddedId()."','".$model->getDateAdded()."','".$model->getCountryId()."','".$model->getName()."','".$model->getAddress()."','".$model->getCityId()."','".$model->getPhone1()."','".$model->getPhone2()."','".$model->getEmail()."','".$model->getWebsite()."','".$model->getBanner()."','".$model->getDescription()."')";*/
		global $dbase;
		$query = $dbase->prepare($querystring); //returns pdo statement object
		try{
			$query->execute();
			$business_id=$id;
			/*echo '<br/>';
			echo $model->getSubCategory1Id();
			echo '<br/>';
			echo $model->getSubCategory2Id();
			echo '<br/>';
			echo $model->getSubCategory3Id();

			echo '<br/>';*/

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
			    $res = $dbase->query($sql);
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
			array_push($errors, "This sub category of id : " . $category_id . ", does not exist");
		}		
		return $thisSubCategory;
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
			    $res = $dbase->query($sql);
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




	

}



?>