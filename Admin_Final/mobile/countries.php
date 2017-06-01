<?php
 ob_start();

	//include data base connection
	include_once("db_connection.php");
	
	//include the utility
	include_once("utility.php");
	//this is open anyone can have access to countries

	$countries = array();
	//you can only continue if there are no errors though
	if(count($errors) == 0){
		//get countries
		try{
			$sql = "SELECT * FROM country " ;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thisCountry = array();
				  $keys = array_keys($country);
				foreach($keys as $key){
					$thisCountry[$key] = $key;
				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			$thisCountry[$key] = is_numeric($value) ? intval($value) : $value;
		    		}
		    	}
		    	//add cities of this country
		    	$cities = getCitiesOfCountryId($thisCountry["id"]);
		      $thisCountry["cities"] = $cities;
		    	array_push($countries, $thisCountry);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
	}
	
	

	respond($countries);
  
?>