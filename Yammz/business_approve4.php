<?php 
session_start();
require_once('classes/connector.php');
require_once('classes/db_config.php');
require_once('classes/gstring_funcs.php');

$conn = new connector();

?>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		 <link rel="icon" href="images/icons/yammz_logo.png">
		<title>Yammz it</title>
		<link rel = "stylesheet" href = "bootstrap-3.2.0-dist/css/bootstrap.min.css">

		<!--<link rel="stylesheet" href="bootstrap.vertical-tabs.css">-->
		<link rel="stylesheet" href="css.css">
		
		<link href="offcanvas.css" rel="stylesheet">
		<link href="styles.css" rel="stylesheet">
		
        <style type="text/css">
        	body {
			    color: #797979;
				background: #f2f2f2;
			    font-family: Helvetica;
			   /* padding: 0px !important;
			    margin: 0px !important;*/
			    font-size:13px;
			}
			.input_field{
				border-radius:0px;height:30px;background-color:#F2F2F2;border:0px;margin-right:5px;margin-bottom: 5px;
			}
			.search_btn{
				background-color:#BD2532;color:#ffffff;width:15%;height:30px;border:0px;
			}
			.center{
				text-align: center;
			}
			.redColor{
				color:#BD2532;
			}
			.redback{
				background-color:#BD2532; 
			}
			.blackColor{
				color:#C3C3C3;
			}
			.left13{
				margin-left:13px;
			}
			.top_10{
				margin-top: -7px;
			}
			.font20{
				font-size:20px
			}
			.panelstyle{
				background-color:#ffffff;border-radius:0px;border:0px;margin-bottom:3px;
			}
			.panelstyle2{
				background-color:#ffffff;border-radius:0px;border:0px;margin-bottom:1px;
			}
			.left_10{
				margin-left: -10px;
			}
			.noborderRadius{
				border-radius:0px;
				border:0px;
			}
			.codeheight{
				height:50px;
			}
			.greyBack{
				background-color:#F2F2F2;
			}
			.width{
				width:90%;
			}
        </style>
	</head>

	<body style="background-color:#F2F2F2;" ng-app="starter"  ng-controller="FullBusinessCtrl">
	

	<?php require_once('Controllers/Logged_header2_o.php'); ?>

	<input type="hidden" ng-model="enc_business_id" ng-init="enc_business_id='<?php echo $_GET['current_business_id']; ?>'">

	<input type="hidden" ng-model="business_id" ng-init="business_id='<?php echo gStringId($_GET['current_business_id']); ?>'">
				<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $_SESSION['SESS_MEMBER_ID'];?>'" >
				<input type="hidden" ng-model="date_created" ng-init="date_created='<?php echo time();?>'" >
		<!-- <div class="container"> -->

			<div class="row" style="padding-top:85px"></div>
			<div class="row" style="margin-bottom:10px;">
				<div class="col-lg-3 col-xlg-3 hidden-xs col-md-3 hidden-sm" ></div>

				<div class="col-lg-6 col-xlg-6 col-sm-12  col-md-6 col-xs-12 " >			
					<div style="text-align: center;font-size:20px;font-weight:lighter;margin-left:-10%;">
						<div style="color:#333333;font-size:20px;">You have successfully claimed <span style="font-weight:bold;color:#333333;font-size:25px;">{{FullBusiness.business.name}}</span></div>
						 
					</div>
				</div>

				<div class="col-lg-3 col-xlg-3 hidden-xs col-md-3 hidden-sm" ></div>
			</div>

			<div class="row">
				<div class="col-lg-3 col-xlg-3 hidden-xs col-md-3 hidden-sm" ></div>

				<div class="col-lg-6 col-xlg-6 col-sm-12  col-md-6 col-xs-12 " >			
					<div class="panel panel-default panelstyle2 width">
						<div class="panel-body">
							<div class="col-md-1 col-lg-1 col-xl-1 col-sm-12 col-xs-12">
								
							</div>
							<div class="col-md-10 col-lg-10 col-xl-10 col-sm-12 col-xs-12">
								<div class="row" style="margin-top:8px;">
									<div class="col-md-3 col-lg-3 col-xl-3" style="margin-right:15px;">
										<img ng-src="{{FullBusiness.business.logo}}" style="width:125px;height:140px;border-radius:8px;">
									</div>
									<div class="col-md-8 col-lg-8 col-xl-8" style="line-height:20px;">
										<div class="row" >
											<div class="col-md-2 col-lg-2 col-xl-2 col-sm-2 col-xs-2" >
												<div class="icon icon-map-pointer7" style="font-size:30px;"></div>
											</div>
											<div class="col-md-10 col-lg-10 col-xl-10 col-sm-10 col-xs-10" style="margin-left:-20px;">
												<span class="redColor" style="font-weight:bold;">{{FullBusiness.business.name}}</span>
												<br/>
												<span style="font-size:11px;font-weight:bold;">{{FullBusiness.business.address}}</span>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">
												<p style="margin-left: 32px;" class="left13">Email: {{FullBusiness.business.email}}</p>
												<p style="margin-left: 32px;" class="left13 top_10">Phone: {{FullBusiness.business.phone_1}}</p>
												<!-- <p class="left13 top_10">Address: {{FullBusiness.business.address}}</p> -->
											</div>										
										</div>

										<div class="row">
											<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12 col-xs-12">											
												<div class="left13" style="margin-top:-5px;">
													<span class="icon icon-mark1 redColor font20"></span>
													<span class="icon icon-mark1 redColor font20"></span>
													<span class="icon icon-mark1 redColor font20"></span>
													<span class="icon icon-mark1 redColor font20"></span>
													<span class="icon icon-mark1 redColor font20"></span>
												</div>
												
											</div>										
										</div>										
										
									</div>
								</div>
								<button class="btn form-control redback noborderRadius" ng-click="sendtoPage(enc_business_id)" style="margin-bottom:15px;height:40px;margin-top:15px;color:#ffffff;">View page</button>

							</div>
							<div class="col-md-1 col-lg-1 col-xl-1  col-sm-12 col-xs-12 "></div>					
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-xlg-3 hidden-xs col-md-3 hidden-sm" ></div>
			</div>
			
			<!-- <div ng-include="'footer.php'" ></div> -->
		<!-- </div> -->
		<div>
			<img ng-src="{{BaseImageURL}}/uploads/city4.0.png" style="width:100%;margin-top:-30px;">
		</div>

		<!-- Footer -->
			<div style="margin-bottom:0px;margin-top:30px;">
				<div class="row">
					<div class="col-md-1 col-lg-1 col-xl-1"></div>
					<div class="col-md-8 col-lg-8 col-xl-8">
						<div class="row">
							<div class="col-md-2 col-lg-2 col-xl-2 col-sm-6 col-xs-6">About yammzit</div>
							<div class="col-md-2 col-lg-2 col-xl-2 col-sm-6 col-xs-6"><span style="margin-left:-40px;">Claim your Business Page</span></div>
							<div class="col-md-2 col-lg-2 col-xl-2 col-sm-6 col-xs-6">Privacy Policy</div>
							<div class="col-md-2 col-lg-2 col-xl-2 col-sm-6 col-xs-6">Business support</div>
							<div class="col-md-2 col-lg-2 col-xl-2 col-sm-6 col-xs-6">Contact Yammzit</div>
							<div class="col-md-2 col-lg-2 col-xl-2 col-sm-6 col-xs-6">Content guidelines</div>

						</div>
					</div>
					<div class="col-md-3 col-lg-3 col-xl-3">
						<div class="row">
							<div class="col-md-4 col-lg-4 col-xl-4 col-sm-6 col-xs-6">Ad choice</div>
							<div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 col-xs-6">Terms of service</div>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:50px;">
					<div class="col-md-12 col-lg-12 col-xl-12">
						<p style="text-align:center;">Copyright &copy;2016 Yammzit</p>
					</div>
				</div>
			<div>
		<!--<script src="dist/js/bootstrap.min.js"></script>-->
		<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
					<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
					<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
						<script type="text/javascript" src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>
					<script src="js/jquery-1.10.2.min.js"></script>


					<!--my own javascript order-->
					<script src="js/js/yammz.js" type="text/javascript"></script>
					<script src="js/js/home-models.js" type="text/javascript"></script>
					<script src="js/js/home.js" type="text/javascript"></script>
					<script src="js/js/starter.js" type="text/javascript"></script>
					<!--<script src="Rating/js/star-rating.js" type="text/javascript"></script>-->
					<script src="Rating/js/star-rating.js" type="text/javascript"></script>

					<script type="text/javascript" src="js/function.js"></script>
					<script type="text/javascript" src="js/function.js"></script>
                    <script src="node_modules/ng-dialog/js/ngDialog.js" type="text/javascript"></script>
	</body>

</html>
