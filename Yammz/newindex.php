<?php
// echo 'ini: ', get_cfg_var('cfg_file_path');
// exit(0);

session_start();
//require_once('classes/db_config.php');

	unset($_SESSION['SESS_MEMBER_ID']);
include("classes/connector.php");
$conn = new connector();
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

		<link rel="stylesheet" href="css.css">
		<link rel="stylesheet" href="ionicons-2.0.1/css/ionicons.css">
		<link href="styles.css" rel="stylesheet">
        <link rel="stylesheet" href="distjpicker/styles.css" />

        <link rel="stylesheet" href="node_modules/ng-dialog/css/myth/ngDialog.css" />
        <link rel="stylesheet" href="node_modules/ng-dialog/css/myth/ngDialog-theme-default.css" />




		<style>
			body {
			    color: #797979;
				background: #FFFFFF;
			    font-family: Helvetica;
			  
			    font-size:13px;
			    background-image: url("../admin/Theme/uploads/IndexPage2background.jpg") ;
			    background-repeat: no-repeat;
			    background-position: bottom;

			}

			.form-control:focus{
				border-color:#CCCCCC;
				box-shadow:0px 1px 1px rgba(0,0,0,0.015) inset, 0px 0px 8px rgba(255, 100, 255, 0);
			}

			.black{color:#424242;}
 input {
    background-color:#E8E8E8;
    color:black;
  }
  /* placeholder only style */   
  input.address:-ms-input-placeholder {
    font-style:italic;        
    color: red;
    background-color: yellow;
  }
		</style>


	</head>

	<body ng-app="starter">
		
		<div class="navbar navbar-inverse navbar-fixed-top" style="background-color:#BD2532" >
		  	<div class="" style="margin-left: 40px;margin-right: 80px;">
				<div class="navbar-header" style="padding-top:5px;">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
				 
				  	<table>
				  		<tr>
				  			<td><h1 style="color:white;font-size: 50px;">Yammzit</h1> </td>
				  			<td><img style="margin-left: 15px;" src="images/icons/yammz_logo.png"  width="65" height="65" /></td>
				  		</tr>
				  	</table>
					
			    </div>
			    <div class="collapse navbar-collapse" style="padding-top:5px; margin-right:0px;">
						
						<ul class="nav navbar-nav navbar-right" style="padding-top:10px;padding-right:9px;">
							<form class="navbar-form" action="Controllers/Auth/login.php"  role="search" method="post">
								
									<div class="row" style="margin-right: -58px;">
										<!-- <div class="col-lg-1 col-xlg-1 col-sm-12 col-md-1 col-xs-12"></div> -->
										<div class="col-lg-5 col-xlg-5 col-sm-12 col-md-5 col-xs-12" style="margin-right: -15px;">
											<label style="color: #F1F1F1">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
											<input type="text" name="username" class="form-control pull-right noborderStyle" style="border-radius:0;height:35px;width: 100%;" placeholder="" >
											<br>

											<label style="margin-top: 5px;margin-bottom: 0px; margin-left: 0px;color: #FFFFFF;"><i class="ion ion-alert" style="font-size: 20px;color: #FFFFFF;"></i> <?php
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

										</div>
										<div class="col-lg-5 col-sm-12 col-xlg-5 col-md-5 col-xs-12">

											<label class="" style="color: #F1F1F1">Password</label><br>
											<input type="password" name="password" class="form-control pull-right noborderStyle" style="border-radius:0;height:35px;width: 100%;" placeholder="">

											<label style="margin-top: 5px;margin-bottom: 0px; margin-left: 0px;  "><a href="forgot_password.php" style="color: #F1F1F1; text-decoration: none; font-weight: lighter;"> forgot password / account ?</a></label>

										</div>
										<div class="col-lg-2 col-xlg-2 col-sm-12 col-md-2 col-xs-12" style="margin-left: -40px;">
											<label></label><br><br>
											<button class="btn btn-small noborderStyle pull-right" type="submit" style="height:35px;min-height:27px;min-width:60px;background-color:white;text-align: center;color:#000000;font-weight:bold;padding-top:6px;" value="Login">
												LOG IN
											</button>
										</div>

									</div>

							</form>

						</u>
			    </div>
		  	</div>
		</div>
		<div style="margin-top: 135px;"></div>
		<div style="margin-right:100px; ">
		<div ng-controller="SignupCtrl">

			<form name="signUpForm" ng-submit="postData()">

				<div class="row" style="margin-left: 25px;">

					<div class="col-md-3 col-lg-3 col-xl-3">
						<label class="pull-right  black" style="font-weight: bold;font-size: 24px;">Sign up for free</label>
					</div>

				

					<div class="col-md-3 col-lg-3 col-xl-3">
						<input class="form-control" type=""  style="width: 104%;background-color: #EBE6E3;border-color: #EBE6E3;border-radius: 8px;margin-bottom: 23px;
						" id="first_name" name="first_name" placeholder=" * First Name...." ng-model="signobject.first_name" ng-minlength=2 ng-maxlength=20 required>
					</div>
					<div class="col-md-3 col-lg-3 col-xl-3">
						<input class="form-control" type="" name="" style="width: 104%;background-color: #EBE6E3;border-color: #EBE6E3;border-radius: 8px;margin-bottom: 23px;" id="last_name" name="last_name" ng-minlength=2 ng-maxlength=20 placeholder=" * Last Name...." ng-model="signobject.last_name"
														required>
					</div>
					<div class="col-md-3 col-lg-3 col-xl-3">
						
						<select class="form-control" id="countrry" name="countrry" style="background-color: #EBE6E3;border-color: #EBE6E3;border-radius: 8px;margin-bottom: 23px;" ng-model="signobject.country_id">
							<option  value=""> Select country </option>
							<option ng-repeat="country in countryModels" ng-model='selectedItem' value="{{country.id}}">{{country.name}}</option>
						</select>

					</div>
				</div>

				<div class="row" style="margin-left: 25px;">
					<div class="col-md-3 col-lg-3 col-xl-3">
						
					</div>
					<div class="col-md-3 col-lg-3 col-xl-3">

						<select class="form-control" id="city" name="city" style="background-color: #EBE6E3;border-color: #EBE6E3;border-radius: 8px;width: 104%;margin-bottom: 23px;" ng-model="signobject.city_id" required>
							<option  value=""> Select city </option>
							<option ng-repeat="city in cityModels"   value="{{city.id}}"  >{{city.name}}</option>
						</select>

					</div>
					<div class="col-md-3 col-lg-3 col-xl-3">

						<input class="form-control" type="" name="" style="width: 104%;background-color: #EBE6E3;border-color: #EBE6E3;border-radius: 8px;margin-bottom: 23px;" id="email" name="email" ng-minlength=4 ng-maxlength=50 placeholder=" * Email Adress...." ng-model="signobject.email" required>

						<span ng-show="signUpForm.email.$error.minlength">
										<label class="redbright"> email too short </label>
						</span>
						<span ng-show="signUpForm.email.$error.maxlength">
										<label class="redbright">email too long </label>
						</span>

					</div>
					<div class="col-md-3 col-lg-3 col-xl-3">

						<input class="form-control" type="text" name="" style="width: 104%;background-color: #EBE6E3;border-color: #EBE6E3;border-radius: 8px;margin-bottom: 23px;" id="phone" name="phone" ng-minlength=4 ng-maxlength=15 placeholder=" * phonenumber" ng-model="signobject.phone_number" required>					
					</div>
				</div>

				<div class="row" style="margin-left: 25px;">
					<div class="col-md-3 col-lg-3 col-xl-3">
						
					</div>
					<div class="col-md-3 col-lg-3 col-xl-3">

						<input class="form-control" type="password" name="signpass" style="width: 104%;background-color: #EBE6E3;border-color: #EBE6E3;border-radius: 8px;margin-bottom: 23px;"  id="signpass" ng-model="signobject.password" ng-minlength=4 ng-maxlength=50 placeholder="password" required>

						

					</div>
					<div class="col-md-3 col-lg-3 col-xl-3">

						<input class="form-control" type="password" style="width: 104%;background-color: #EBE6E3;border-color: #EBE6E3;border-radius: 8px;margin-bottom: 23px;" name="confirmpass"  id="confirmpass" ng-model="signobject.confirmpass" ng-minlength=4 ng-maxlength=50 placeholder="confirm password" pw-check='signpass' required>
						<span  ng-show='signUpForm.confirmpass.$error.pwmatch'>
   							 <label class="redbright">Passwords don't match</label>
  						</span>
					</div>
					<div class="col-md-3 col-lg-3 col-xl-3">
						<div class="example">

						<input class="form-control" style="width: 104%;background-color: #EBE6E3;border-color: #EBE6E3;border-radius: 8px;margin-bottom: 23px;" ng-model="signobject.dob"  type="hidden" id="example2">



						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 25px;margin-left: 25px;">
					<div class="col-md-3 col-lg-3 col-xl-3">
						
					</div>
					<div class="col-md-3 col-lg-3 col-xl-3">
						<span class="radio" style="size:50px;">
						  	<label style="margin-top:-10px;">

						  		<div style="float: left;width: 100px;">
						  			<table>
						  				<td>
						  					<input type="radio"  name="gender" value="male" style="color:red;height: 25px;width:25px;"  ng-model="signobject.gender"> &nbsp;&nbsp;&nbsp; 
						  				</td>
						  				<td><br>Male</td>
						  			</table>
						  		</div>
						  		<div style="float:right">
						  			<table>
						  				<td>
						  					<input type="radio"  name="gender" value="female" style="color:red;height: 25px;width:25px;"  ng-model="signobject.gender"> &nbsp;&nbsp;&nbsp; 
						  				</td>
						  				<td><br>Female</td>
						  			</table>
						  		</div>
						  		
					  		</label>
						</span>
					</div>
					<div class="col-md-6 col-lg-6 col-xl-6">
						 <p style="margin-left: 15px;padding-top: 20px;">
						 By clicking create an account, you agree to our <a href=""> Terms</a> and that you have read our <a href="">Data Policy , </a>including our <a href="">Cookie Use.</a> 
						 </p>
					</div>
					
				</div>


				<div class="row" style="margin-top: 25px;margin-left: 20px;">
					<div class="col-md-6 col-lg-6 col-xl-6">
						
					</div>
					
					<div class="col-md-6 col-lg-6 col-xl-6">
					<button class="form-control" ng-disabled="signUpForm.first_name.$invalid || signUpForm.last_name.$invalid || signUpForm.email.$invalid || signUpForm.phonenumber.$invalid || signUpForm.password.$invalid || signUpForm.dob.$invalid"  style="background-color: #BD2532;color: #FFFFFF;height: 55px;font-size: 24px;padding-top: 2px;margin-left: 40px;width: 93%;font-weight: bold;">Create Account</button>
					</div>
					
				</div>
			</form>
		</div>

			<div class="row" style="margin-top: 45px;">
				<div class="col-md-4 col-lg-4 col-xl-4 col-sm-2 col-xs-2 ">
					
				</div>
				
				<div class="col-md-8 col-lg-8 col-xl-8 col-sm-10 col-xs-10">
					<p style="font-size: 35px;" class="pull-right black">
					<span style="font-weight: bold;">Connecting</span> <span style="font-weight: lighter;">people to great</span> <span style="font-weight: bold;">local</span> <span style="font-weight: lighter;">businesses</span> </p>
				</div>
				
			</div>

			<div style="position:relative;bottom:-20px;">
				<div class="row" >
					<div class="col-md-3 col-lg-3 col-xl-3 col-sm-3 col-xs-3">
						
					</div>
					
					<div class="col-md-9 col-lg-9 col-xl-9 col-sm-9 col-xs-9" style="font-size: 10px;">
						<div style="margin-right: 0px;" class="pull-right">
							<label style="margin-left: 15px;">Privacy policy</label>
							<label style="margin-left: 15px;">Ad choices</label>
							<label style="margin-left: 15px;">Business support</label>
							<label style="margin-left: 15px;">Content guidelines</label>
							<label style="margin-left: 15px;">About yammzit</label>
							<label style="margin-left: 15px;">Terms of service</label>
							<label style="margin-left: 15px;">Contact yammzit</label>
							
						</div>

					</div>
					
				</div>
				<div class="row" >
					<div class="col-md-3 col-lg-3 col-xl-3"></div>
					
					<div class="col-md-9 col-lg-9 col-xl-9" style="font-size: 10px;">
						<div style="margin-right: 0px;" class="pull-right">
							<label class="" style="margin-right: 8px;">Yammzit@2016</label>
							<label style="">Claim your business page</label>
						</div>
					</div>
				</div>
			</div>

		</div>
		

	</div>
		
		<!--  -->	
		<script src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
		<script type="text/javascript" src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>

		<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>

		<script src="assets/js/docs.min.js"></script>
		<script src="distjpicker/jquery.date-dropdowns.min.js"></script>

		 <script>
			$(function() {

				$("#example2").dateDropdowns({
					submitFieldName: 'example2',
					submitFormat: "dd/mm/yyyy"
				});

				
			});
		</script>
		<!--my own javascript order-->
		<script src="js/js/yammz.js" type="text/javascript"></script>
		<script src="js/js/home-models.js" type="text/javascript"></script>
		<script src="js/js/home.js" type="text/javascript"></script>
		<script src="js/js/starter.js" type="text/javascript"></script>
		

		<script src="node_modules/ng-dialog/js/ngDialog.js" type="text/javascript"></script>	
	</body>

</html>
