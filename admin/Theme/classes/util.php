<?php
require_once('connector.php');
$conn = new connector();
function AdminImageUploader($submitName, $fileToUpload, $target_dir = "uploads/"){
		
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

	function fill_country_drop_down($countries)
	{

		foreach($countries as $country)
		{
						 
						 
			echo '<option value="'.$country['id'].'">'; echo $country['name']; echo'</option>';
							
						  
		}

	}
	function return_citie($conn)
	{

		/*if(isset($_POST['country']))
		{*/
			$countryName =$_GET['name'];
			$countries=$conn->getAll("SELECT * FROM country Where name =".$countryName);
			foreach($countries as $country)
			{
				$cities =$conn->getAll("SELECT * FROM city Where country_id =".$country['id']);
				echo 'cmon man no error';
				return $cities;
			}
			echo 'cmon man there is error';
		//}
	}
	function fill_city_drop_down($cities)
	{
		foreach($cities as $city)
		{
			echo '<option value="'.$city['id'].'">'; echo $city['name']; echo'</option>';
		}
	}
	function fill_category_drop_down($categories)
	{   echo "<option value=''> -- select category -- </option>";
		foreach($categories as $category)
		{
			echo '<option value="'.$category['id'].'">'; echo $category['name']; echo'</option>';
		}
	}
	function fill_subcategory_drop_down($subcategories)
	{
		echo "<option value=''> -- select subcategory -- </option>";
		foreach($subcategories as $subcategory)
		{
			echo '<option value="'.$subcategory['id'].'">'; echo $subcategory['name']; echo'</option>';
		}
	}
	function fill_business_category_edits($busines_id)
	{
		global $conn;
		$fill_Items = array();
		$fill_Item = array(
			'category_name' =>'',
			'subcategory_name' => ''
		);
		$business_categories =$conn->getAll("SELECT * FROM business_category WHERE business_id='".$busines_id."'");
		foreach($business_categories as $business_category )
		{
			//global $fill_Item;
			//global $fill_Items;
			$sub_category_id = $business_category['sub_category_id'];
			$subcategory=$conn->getSubCategoryOfId($sub_category_id);
			$subcategoryname = $subcategory['name'];
			$category_id = $subcategory['category_id'];
			$category =$conn->getCategoryOfId($category_id);
			$categoryname = $category['name'];
			$fill_Item['category_name']=$categoryname;
			$fill_Item['subcategory_name']= $subcategoryname;
			array_push($fill_Items,$fill_Item);


		}
		echo '<pre>',print_r($fill_Items),'</pre>';
		
		return $fill_Items;

	}
	if(isset($_GET['country_id']))
	{

      		
      		
      		$cities=$conn->getAll("SELECT * FROM city WHERE country_id ='".$_GET['country_id']."'");
      		fill_city_drop_down($cities);

      		
		

	}else if (isset($_GET['category_id']))
	{
		$subcategories=$conn->getAll("SELECT * FROM sub_category WHERE category_id ='".$_GET['category_id']."'");
      		fill_subcategory_drop_down($subcategories);

	}else if (isset($_GET['edit_business_whose_id']))
	{
		$business_id = $_GET['edit_business_whose_id'];
		$business = $conn->getAll("SELECT * FROM business WHERE id ='".$business_id."'");

		echo '<pre>', print_r($business), '</pre>';

	}


?>