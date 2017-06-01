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


	//get the subcategory id
	$sub_category_id = 0;
	if(isset($_REQUEST['sub_category_id'])){
		$sub_category_id = intval($_REQUEST['sub_category_id']);
	}else{
		array_push($errors, "You need to supply a sub category id");
	}

	//you can only continue if there are no errors though
	if(count($errors) == 0){
		try{
			$sql = "SELECT * FROM business_category WHERE sub_category_id = " . $sub_category_id ;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$business_id = intval($row["business_id"]);
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