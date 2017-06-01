<?php  session_start();

	unset($_SESSION['SESS_MEMBER_ID']);   
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		 <link rel="icon" href="images/icons/yammz_logo.png">
		<title>Yammz it</title>
		<link rel = "stylesheet" href = "bootstrap-3.2.0-dist/css/bootstrap.min.css">
 		
		<!--<link rel="stylesheet" href="bootstrap.vertical-tabs.css">-->
		<link rel="stylesheet" href="css.css">
		<!--<link href="dist/css/bootstrap.min.css" rel="stylesheet">-->
		<link href="carousel.css" rel="stylesheet">		
		<link href="offcanvas.css" rel="stylesheet">
		<link href="styles.css" rel="stylesheet">		
		<link rel="stylesheet" href="Rating/css/star-rating.css" media="all" type="text/css"/>
		<link rel="stylesheet" href="Rating/css/theme-krajee-fa.css" media="all" type="text/css"/>
		<link rel="stylesheet" href="Rating/css/theme-krajee-svg.css" media="all" type="text/css"/>
		<link rel="stylesheet" href="Rating/css/theme-krajee-uni.css" media="all" type="text/css"/>
        
        <link rel="stylesheet" href="distjpicker/styles.css" /> 
		
		
	</head>
	
	<body style="background-color:#E9EAEE" ng-app="starter">
		
		<div class="navbar navbar-inverse navbar-fixed-top" style="background-color:#BD2532" >
		  <div class="container">
				<div class="navbar-header" style="padding-top:3px;">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
				  <h1 style="color:white">
					&nbsp; Yammzit <img src="images/icons/yammz_logo.png" width="35" height="35" />
				  </h1>
			    </div>
			    <div class="collapse navbar-collapse" style="padding-top:15px; margin-right:16px;">
						 <ul class="nav navbar-nav " >
							<li style="padding-top:30px;padding-left:80px;">
								<label style="color:white;">
								<?php
									if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
										echo '<ul class="err">';
										foreach($_SESSION['ERRMSG_ARR'] as $msg) {
										echo '<li style="list-style-type: none;">',$msg,'</li>';
										}
										echo '</ul>';
										unset($_SESSION['ERRMSG_ARR']);
									}
								?>
							</label>
							</li>
						  </ul>
						  
						<ul class="nav navbar-nav navbar-right" style="padding-top:10px;padding-right:9px;">
							<form class="navbar-form navbar-left" action="Controllers/Auth/login.php"  role="search" method="post">
								<div class="input-group" >
									
									<div class="row">
										<div class="col-lg-5 col-xlg-5 col-sm-5 col-md-5 col-xs-5">
											<input type="text" name="username" class="form-control pull-left noborderStyle" style="border-radius:0;height:27" placeholder="USERNAME" >
										</div>
										<div class="col-lg-5 col-sm-5 col-xlg-5 col-md-5 col-xs-5">
											<input type="password" name="password" class="form-control pull-left noborderStyle" style="border-radius:0;height:27" placeholder="PASSWORD">
										</div>
										<div class="col-lg-2 col-xlg-2 col-sm-2 col-md-2 col-xs-2">
											<button class="btn btn-small" type="submit" style="border-radius:4;max-height:27px;min-height:27px;min-width:60px;background-color:white;text-align: center;padding-top:2px;" value="Login">											
												Login
											</button>
										</div>
									</div>
									
								</div>
							</form>
						</u>
					  
				  
			    </div>
			  </div>
		</div>
		<div class="container">
			<div class="row">
				<div class="container">
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<div class="panel panel-default" style="margin-top:30px;margin-right:0px;margin-left:3px;">
							<div class="panel-body">
								<span style="color:#BD2532;font-size:16px;"> <span style="font-weight:bold;">Enter Your Email Address or Phone Number</span></span>
								<hr style="margin-top:0px;margin-bottom:8px;height:1px;background-color:#E9EAEE;"></hr>
									<div style="height:20px;"></div>
									<form style="margin-top:10px;">
										<div class="row">									
											
												<div class="col-lg-2 col-xlg-2 col-md-2 col-sm-3 col-xsm-2">
													<div class="form-group">
														<div style="font-size:40px;color:red;margin-top:-3px;margin-left:80%;" class="icon icon-email5 "></div>
													</div>
												</div>
												<div class="col-lg-4 col-xlg-4 col-md-4 col-sm-12 col-xsm-12">
													<div class="form-group">
														<input type="text" class="form-control"style="width:300px; border-color:#868686;background-color:#E9EAEE;border:0px; border-radius:0;" placeholder="example@example.com or 0777777557" id="email_phone" >  
													</div >
												</div>
												<div class="col-lg-4 col-xlg-4 col-sm-4 col-md-4 hidden-xsm"></div>
																						
										</div>
									</form>	
									<div style="height:15px;"></div>									
							</div>
							<div class="panel-footer">
								<table >							
									<tr>
										<td style="width:200px;">
											
										</td>
										<td>
											<button  type="button" name="add_business" class="btn btn-default" style="height:22px;font-size:14px;padding-top:0px; width:50px; background-color:#BD2532; font-weight:bold;border-radius:6px;padding-left:7px;color:#EED1D5;margin-left:730px;" onclick="pickCre('<?php echo $_GET['username']; echo "'";?>)">Next</button>
											<B>&nbsp;&nbsp;&nbsp;&nbsp;Cancel</B>
										</td>
										
										
									</tr>
									
								</table>
							</div>
						</div>
					</div>
				</div>
				<div style="height:30px;"></div>
			</div>
			<div ng-include="'footer.php'" ></div>
		</div>
		<!--<script src="dist/js/bootstrap.min.js"></script>-->
		<script type="text/javascript" src="bootstrap-3.2.0-dist/js/jquery-1.9.0.js"></script>
		<script type="text/javascript" src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
		<script src="assets/js/docs.min.js"></script>
		<script src="distjpicker/jquery.date-dropdowns.min.js"></script>
		
		<!--my own javascript order-->
		<script src="js/js/yammz.js" type="text/javascript"></script>
		<script src="js/js/home-models.js" type="text/javascript"></script>
		<script src="js/js/home.js" type="text/javascript"></script>
		<script src="js/js/starter.js" type="text/javascript"></script>
		<script src="Rating/js/star-rating.js" type="text/javascript"></script>
		<!-- end of my own javascript order-->
	</body>

</html>