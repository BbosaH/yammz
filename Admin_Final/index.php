<?php
	session_start();
	ob_start();

	require_once "Theme/classes/connector.php";
  	$conn = new connector();

	$msg = "";
	if(isset($_POST["login"])){
		try{
			$sql =$conn->getAll("SELECT * FROM admin WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password']. "' AND status = 'enabled'");
		     // $res = $conn->query($sql);
		     // $res = $dbase->query($sql);
	    foreach ($sql as $row ) {
		    	$_SESSION['admin_id'] = $conn->gString($row['id']);
		    	$account_type_d=$_SESSION['account_type_id']=$row['account_type_id'];
		    	$department_id=$row['department_id'];

		    	$sql5 = $conn->getAll("SELECT * FROM account_type WHERE id = '".$account_type_d."'");
		    	// $res5 = $conn->query($sql5);
		    	$admin_tpe="";
		    	foreach ($sql5 as $row5 ) {
		    		$admin_tpe=$row5['name'];
		    	}

		    	$sql6 = $conn->getAll("SELECT * FROM department WHERE id = '".$department_id."'");
		    	// $res6 = $conn->query($sql6);
		    	$department="";
		    	foreach ($sql6 as $row6 ) {
		    		$department=$row6['name'];
		    	}

		    	//Creating user session info
		    	$_SESSION['users_name'] =$row['first_name']." ".$row['last_name'];
		    	$_SESSION['department'] =$department;
		    	$_SESSION['admin_type'] =$admin_tpe;

		    	
		    	//Redirecting user
		    	if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Advertising")==0 && strcmp($_SESSION['admin_type'], "Manager")==0){

		    		$log=$conn->Update_work_log("only_me",$_SESSION['users_name']." logged in",0);

		    		header("Location: Theme/advertising_manager_stats.php?");
		    		exit(0);

		    	}else if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Advertising")==0 && strcmp($_SESSION['admin_type'], "Supervisor")==0){

		    		$log=$conn->Update_work_log("me_and_above",$_SESSION['users_name']." logged in",0);
		    		header("Location: Theme/advertising_manager_stats.php?");
		    		exit(0);
		    	}else if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Advertising")==0 && strcmp($_SESSION['admin_type'], "Operator")==0){
		    		
		    		$log=$conn->Update_work_log("me_and_above",$_SESSION['users_name']." logged in",0);
		    		header("Location: Theme/advertising_manager_stats.php?");
		    		exit(0);
		    	}else if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Yammzit")==0 && strcmp($_SESSION['admin_type'], "General")==0){

		    		$log=$conn->Update_work_log("only_me",$_SESSION['users_name']." logged in",0);		    		

		    		header("Location: Theme/user_profile.php?");
		    		exit(0);
		    	}else if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Accounting")==0 && strcmp($_SESSION['admin_type'], "Manager")==0){

		    		$log=$conn->Update_work_log("only_me",$_SESSION['users_name']." logged in",0);		    		

		    		header("Location: Theme/finance_dashboard.php");
		    		exit(0);
		    	}else if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "I.T Technical")==0){

		    		$log=$conn->Update_work_log("only_me",$_SESSION['users_name']." logged in",0);		    		

		    		header("Location: Theme/manage_accounts.php");
		    		exit(0);
		    	}


		    	
			}
			$msg = "Account not found";
		}catch(PDOException $e)
		{			
			$msg = $e->getMessage();
		}
	}

	if(isset($_POST['logout'])){
		session_destroy();
		unset($_SESSION['admin_id']);
		unset($_SESSION['department']);
		unset($_SESSION['admin_type']);
		$_SESSION['admin_id'] = null;
		$_SESSION['admin_type']=null;
	}
// Redirecting user to dashboard
	if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Advertising")==0 && strcmp($_SESSION['admin_type'], "Manager")==0){

 		header("Location: Theme/advertising_manager_stats.php?");
 		exit(0);

 	}else if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Advertising")==0 && strcmp($_SESSION['admin_type'], "Supervisor")==0){

 		header("Location: Theme/advertising_manager_stats.php?");
 		exit(0);
 	}else if(isset($_SESSION['admin_id']) && strcmp($_SESSION['department'], "Advertising")==0 && strcmp($_SESSION['admin_type'], "Operator")==0){
 		
 		header("Location: Theme/advertising_manager_stats.php?");
 		exit(0);
 	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>YAMMZIT - Admin</title>

    <!-- Bootstrap CSS -->
    <link href="Theme/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="Theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="Theme/assets/css/style.css" rel="stylesheet">
    <link href="Theme/assets/css/style-responsive.css" rel="stylesheet">

  </head>

  <body>

	<style type="text/css">
		.yammzit{
			background-color: #BE2633 !important;
		}
	</style>
	  <div id="login-page">
	  	<div class="container">	  		
		      <form class="form-login" method="POST" action="" style="background-color:rgba(255,255,255,0.4);">
		        <h2 class="form-login-heading yammzit">Admin sign in area</h2>
		        <div class="login-wrap" style="background-color:rgba(255,255,255,0.4);">
		        	<div style="color:red; padding: 10px;"><?php  echo $msg; ?></div>
		            <input type="text" class="form-control" placeholder="User name" name="username" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="password">
		            <label class="checkbox">
		              
		            </label> 
		            <button class="btn btn-theme btn-block yammzit" type="submit" name="login"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		            
		        </div>		
		      </form>	
	  	
	  	</div>
	  </div>

    <script src="Theme/assets/js/jquery.js"></script>
    <script src="Theme/assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="Theme/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("Theme/assets/img/yammz_logo.png", {speed: 1000});
    </script>


  </body>
</html>
<?php
	ob_flush();
?>