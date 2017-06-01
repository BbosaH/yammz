<?php

	//include data base connection
	include_once("db_connection.php");
	
	//include the utility
	include_once("utility.php");
	//this is open anyone can have access to categories

	$categories = array();
	//you can only continue if there are no errors though
	if(count($errors) == 0){
		//get categories
		try{
			$sql = "SELECT * FROM category " ;
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$thiscategory = array();
				$keys = array_keys($category);
				foreach($keys as $key){
					$thiscategory[$key] = $key;
				}
		    	foreach ($row as $key => $value) {
		    		if(is_numeric($key) == false){
		    			$thiscategory[$key] = is_numeric($value) ? intval($value) : $value;
		    		}
		    	}
		    	//add subcategories of this category
		    	$subcategories = getSubCategoriesOfCategoryId($thiscategory["id"]);
		    	$thiscategory["sub_categories"] = $subcategories;
		    	array_push($categories, $thiscategory);
			}
		}catch(PDOException $e)
		{
			array_push($errors, $e->getMessage());
		}
	}

	respondV2_Arrays($categories);


?>