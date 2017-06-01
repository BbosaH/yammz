<?php
	session_start();
	ob_start();

	//include db connection
	include_once("../mobile/db_connection.php");

	$msg = "";
	if(isset($_POST["login"])){
		try{
			$sql = "SELECT * FROM admin WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password']. "' AND status = 'enabled'";
		    $res = $conn->query($sql);
		    foreach ($res as $row ) {
		    	$_SESSION['admin_id'] = $row['id'];
		    	header("Location: Theme/index.php");
		    	exit(0);
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
		$_SESSION['admin_id'] = null;
	}

	if(isset($_SESSION['admin_id'])){
		header("Location: Theme/index.php");
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

    <!-- Bootstrap core CSS -->
    <link href="Theme/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="Theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="Theme/assets/css/style.css" rel="stylesheet">
    <link href="Theme/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  		<style type="text/css">
  			.yammzit{
  				background-color: #BE2633 !important;
  			}
  		</style>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  		
		      <form class="form-login" method="POST" action="index.php" style="background-color:rgba(255,255,255,0.4);">
		        <h2 class="form-login-heading yammzit">Admin sign in area</h2>
		        <div class="login-wrap" style="background-color:rgba(255,255,255,0.4);">
		        	<div style="color:red; padding: 10px;"><?php  echo $msg; ?></div>
		            <input type="text" class="form-control" placeholder="User name" name="username" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="password">
		            <label class="checkbox">
		                <!-- <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span> -->
		            </label> 
		            <button class="btn btn-theme btn-block yammzit" type="submit" name="login"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		            
		            <!-- <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="#">
		                    Create an account
		                </a>
		            </div> -->
		
		        </div>
		
		          <!-- Modal -->
		          <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div> -->
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="Theme/assets/js/jquery.js"></script>
    <script src="Theme/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="Theme/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("Theme/assets/img/yammz_logo.png", {speed: 1000});
    </script>


  </body>
</html>
<?php
	ob_flush();
?>