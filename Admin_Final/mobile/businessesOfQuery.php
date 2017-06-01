<?php

	//include data base connection
	include_once("db_connection.php");
	
	//include the utility
	include_once("utility.php");
	//this is open anyone can have access

	//load settings
	loadSettings();

	$results = array(
		"sponsored" => array(),
		"found" => array()
	);


	//get the query
	$query = "";
	if(isset($_REQUEST['query'])){
		$query = $_REQUEST['query'];
	}else{
		array_push($errors, "You need to supply a query");
	}

	//you can only continue if there are no errors though
	if(count($errors) == 0){
		try{
		  $foundIds = array();
		  //search from businesses table
		  $sql = "SELECT *  FROM business WHERE (
		    CONVERT(name USING utf8) LIKE '%".$query."%' OR
		    CONVERT(address USING utf8) LIKE '%".$query."%' OR
		    CONVERT(phone_1 USING utf8) LIKE '%".$query."%' OR
		    CONVERT(phone_2 USING utf8) LIKE '%".$query."%' OR
		    CONVERT(email USING utf8) LIKE '%".$query."%' OR
		    CONVERT(website USING utf8) LIKE '%".$query."%' OR
		    CONVERT(location USING utf8) LIKE '%".$query."%' OR
		    CONVERT(description USING utf8) LIKE '%".$query."%'
		  )";
		  $res = $conn->query($sql);
		  foreach ($res as $row ) {
		    if(!(in_array($row["id"], $foundIds))){
		      array_push($foundIds,$row["id"]);
		    }
		  }
		  
		  
		  //search from categories
		  //$sql = "SELECT * FROM business_category WHERE sub_category_id = " . $sub_category_id ;
		  
		  //search from country
		  
		  //search from city
		  
		  
			
		  for($i = 0; $i < count($foundIds);  $i++ ) {
		    	$business_id = intval($foundIds[$i]);
		    	$thisBusiness = getBusinessOfId($business_id, true);
		    	array_push($results["found"], $thisBusiness);
			}
		  

			//get sponsored results
			$results["sponsored"] = getSponsoredSearchResults();
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
	}

	respond($results);


?>