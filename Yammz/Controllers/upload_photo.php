<?php 

	function image(){ 
	    function GetImageExtension($imagetype)
	     {
	       if(empty($imagetype)) return false;
	       switch($imagetype)
	       {
	           case 'image/bmp': return '.bmp';
	           case 'image/gif': return '.gif';
	           case 'image/jpeg': return '.jpg';
	           case 'image/png': return '.png';
	           default: return false;
	       }
	     }
	      
	      
	      
		if (!empty($_FILES["image"]["name"])) {
		 
			$file_name=$_FILES["image"]["name"];
			$temp_name=$_FILES["image"]["tmp_name"];
			$imgtype=$_FILES["image"]["type"];
			$ext= GetImageExtension($imgtype);
			$imagename=date("d-m-Y")."-".time().$ext;
			$target_path = "uploads/".$imagename;
			 
		 
			if(move_uploaded_file($temp_name, $target_path)) {
				$date=date("d-m-Y");
			 
			  
			  return $target_path;
			}else{
			 
			  // exit("Error While uploading news photo to the server. Try checking its format <a href='?admin=addfeeds'>Go back</a>");
			   $errmsg_arr[] = 'Error While uploading news photo to the server. Try checking its format';
				$errflag = true;
			}
		 
		}
	}

?>