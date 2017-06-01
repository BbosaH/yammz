<?php
	//include data base connection
	include_once("mobile/db_connection.php");

	//include the utility
	include_once("mobile/utility.php");
	
	    
			try{
	    		$sql = "SELECT * FROM sub_category WHERE category_id = 9";
	    		$res = $conn->query($sql);
	    		$a = array();
				  foreach ($res as $row ) {
				    array_push($a,$row);
				    
				    echo json_encode($row);
				    $e = false;
				    switch (json_last_error()) {
                case JSON_ERROR_NONE:
                    echo ' - No errors';
                    $e = false;
                break;
                case JSON_ERROR_DEPTH:
                    echo ' - Maximum stack depth exceeded';
                    $e = true;
                break;
                case JSON_ERROR_STATE_MISMATCH:
                    echo ' - Underflow or the modes mismatch';
                    $e = true;
                break;
                case JSON_ERROR_CTRL_CHAR:
                    echo ' - Unexpected control character found';
                    $e = true;
                break;
                case JSON_ERROR_SYNTAX:
                    echo ' - Syntax error, malformed JSON';
                    $e = true;
                break;
                case JSON_ERROR_UTF8:
                    echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
                    $e = true;
                break;
                default:
                  $e = true;
                break;
            }
            if($e){
              var_dump( $row);
              break;
            }
				  }
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
			}catch(PDOException $e)
	    	{
	    		array_push($errors, $e->getMessage());
	    	}
		
// echo json_encode("Children’s Clothing");
// echo json_last_error();
?>