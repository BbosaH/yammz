<?php

	//include data base connection
	include_once("db_connection.php");
	
	//include the utility
	include_once("utility.php");
	//this is open anyone can have access 

	
	$thisBusiness = array();


	//get the business id
	$business_id = 0;
	if(isset($_REQUEST['business_id'])){
		$business_id = intval($_REQUEST['business_id']);
	}else{
		array_push($errors, "You need to supply a business id");
	}

	//you can only continue if there are no errors though
	if(count($errors) == 0){
		try{
			
			$thisBusiness =  getBusinessOfId($business_id, true);
		}catch(PDOException $e)
		{			
			array_push($errors, $e->getMessage());
		}
	}

	respond($thisBusiness);


?>