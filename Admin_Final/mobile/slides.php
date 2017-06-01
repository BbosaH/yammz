<?php

	//include data base connection
	include_once("db_connection.php");
	
	//include the utility
	include_once("utility.php");
	//load settings 
	loadSettings();
	//get the user who is making this request
	$user = getUser();

	$slides = array();
	//you can only continue if there are no errors
	if(count($errors) == 0){
		//get slides for this user
		try{
			$sql = "SELECT * FROM slide ";
			//echo $sql;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisSlide = array();
				$keys = array_keys($slide);
				foreach($keys as $key){
					$thisSlide[$key] = $key;
				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			$thisSlide[$key] = is_numeric($value) ? intval($value) : $value;
		    		}
		    	}
		    	//add the business for this  slide
		    	$thisBusinesses = getBusinessOfId($thisSlide["business_id"], false);
		    	$thisSlide["business"] = $thisBusinesses;
		    	array_push($slides, $thisSlide);
			}
		}catch(PDOException $e)
		{			
			array_push($errors, $e->getMessage());
		}
	}

	respond($slides);


?>