<?php 
	 session_start();
	
		require_once('classes/connector.php');
		$conn = new connector();
					
	if (!empty($_POST['edit_business']) && $_POST['edit_business']=="edit_business" ){
		
		$insert=$conn->Edit_business_info($_SESSION['admin_id'],$_POST['name'],$_POST['country'],$_POST['city'],$_POST['phone1'],$_POST['phone2'],$_POST['email'],$_POST['website'],$_POST['address'],$_POST['desc'],$_POST['subcategory1'],$_POST['subcategory2'],$_POST['subcategory3'],$_POST['bus_id'],$_POST['business_banner'],$_POST['business_logo']);
		
		
		$message="";
		foreach($insert as $response){
			$message=$response['response'];
		}
		if($message=="true"){
			//$conn->success_alert("Business successfully Updated");
			$errmsg_arr[] = '<div class="alert alert-success fade in">
							<a href="#" class="close" data-dismiss="alert">X</a>
								<h6> Business successfully Updated</h6>
						</div>';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location:view_business.php?bus_id=".$_POST['bus_id']."");
				exit();
			}
		}
		else if($message=="false"){
			//$conn->Error_alert("Error! An error has occurred and Updating business has failed");
			
			$errmsg_arr[] = '<div class="alert alert-danger fade in">
							<a href="#" class="close" data-dismiss="alert">X</a>
								<h6> Error! An error has occurred and Updating business has failed</h6>
						</div>';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location:view_business.php?bus_id=".$_POST['bus_id']."");
				exit();
			}
		}
		else{
			//$conn->Error_alert("Unexpected Error has occurred. Please try again.");
			$errmsg_arr[] = '<div class="alert alert-danger fade in">
							<a href="#" class="close" data-dismiss="alert">X</a>
								<h6>Unexpected Error has occurred. Please try again.</h6>
						</div>';
			$errflag = true;
			if($errflag) {
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location:view_business.php?bus_id=".$_POST['bus_id']."");
				exit();
			}
		}

		$_POST=array();
		
	}
?>