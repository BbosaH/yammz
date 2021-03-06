<!--
/**
*New index.php to show categories without login credentials
*added angular home module
*Controllers : IndexCtrl that manages index page , CategoryCtrl that
*manages business categories
*linked login button to login page , Signup button to signup page
*Picked  latest discoveries in descending order
*Create googleplay button link it to googleplay link
*Linked categories
**/
-->
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




		<style>

			body {
			    color: #797979;
				background: #E9EAEE;
			    font-family: Helvetica;			  
			    font-size:13px;	
			    overflow-x: hidden;    
			    
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

			  .row-eq-height {
		          display: -webkit-box;
		          display: -webkit-flex;
		          display: -ms-flexbox;
		          display:         flex;

		          margin-bottom: 20px;
		        }

		        .bold{font-weight: bold;}

		        .white_back{background-color: #FFFFFF;}
		        .float_left{float: left;}
		        .float_right{float: right;}
		        .left_pad8{padding-left:8px;}
		        .cat_title{font-size: 20px;padding-top: 10px;}
		        .cat_image_property{width:140px;height: 130px;}
		        .cat_description{margin-top: -3px;}
		        .discover_image_property{width:160px;height: 160px;border-radius: 50%;}
		        .redColor{color: #BD2532;font-weight: bold;}

		        .red_back{background-color: #BD2532;border-color: #BD2532;}

		        .size30{font-size:30px;}
		        .discovery_address{font-size:11px;font-weight:bold;}
		        .discovery_title{margin-top:0px;margin-bottom: -15px;}
		        .discover_left_top{margin-top: 35px;}
		        .top0{margin-top:0px;}
		        .discovered_by{margin-bottom: 1px;margin-top: 25px;}
		        .top20{margin-top: 20px;}
		        .noborder_radius{border-radius: 0px;}
		        .size25{font-size: 25px;}

		        .header_cover{
		        	background:transparent url('../admin/Theme/index_page_photos/Inxed_image1.png') no-repeat top center fixed;
		        	-webkit-background-size:cover;
		        	-moz-background-size:cover;
					-o-background-size:cover;
					background-size:100.25%;
					width: 100%;
    				height:490px;
    				background-color: #3E3E3E;
		        }

		        .cover_button{height:35px;min-height:27px;min-width:60px;background-color:white;text-align: center;color:#5D5D5D;font-weight:lighter;margin-top:18px;padding-top:7px
		        }

		        .gutter-size.row {
				    margin-right: -5px;
				    margin-left: -5px;
			  	}
			  	.gutter-size > [class^="col-"], .gutter-size > [class^=" col-"] {
				    padding-right: 3px;
				    padding-left: 3px;
			  	}

			  	.search_margin_left{margin-left: 250px;}

			  	@media screen and (max-width: 500px) /* Mobile */ {
			  		.quick_search_top{margin-top: -60px;}
			  		.search_margin_left{margin-left: 0px;}
			  	}

			  	.heading_out_icon_size{width: 20px;height:20px;}
			  	.search_height{height: 43px;}
			  	.head_out_text-color{color: #3E3E3E;}
			  	.footer_text{font-size: 11px;padding-right: 20px;}
			  
		</style>

	</head>

	<body ng-app="starter">

		<!-- <div class="header_cover">
			
		</div> -->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-md-12 header_cover">
				<div class="container">
					<div class="pull-right">
						<div class="row gutter-size">
							<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-xs-6"></div>
							<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-3">
								<a href="signup.html" class="btn btn-small noborderStyle pull-right cover_button" type="submit">Sign Up</a>
							</div>
							<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-3">
								<a href="login.html" class="btn btn-small noborderStyle cover_button" type="submit">Log In</a>
							</div>
						</div>
					</div>

					<div style="display: block;text-align: center;margin-top: 150px;">		
						<label class="white" style="font-size: 75px;"> Yammzit<label><label>
							&nbsp;<img style="height: 65px;width: 65px;" src="images/icons/yammz_logo.png">
						</label>
					</div>

					<h5 style="text-align: center;font-size: 23px;margin-top: 0px;" class="bold white">Read, Review & Rate any place or business</h5>

					<div style="display: block;text-align: center;" ng-controller="IndexCtrl" >
						<div class="col-lg-2 col-md-2"></div>	
						<form  role="search" method="post" action="freesearch.php" >
							<div class="input-group col-lg-7 col-md-7 search_margin_left">		
								<input class="form-control noborder_radius search_height" placeholder="Search for any service, product, place...." 
								  name="q"   type="text" ng-model="searchInputValue">

								<div class="input-group-btn">
		                            <button class="btn btn-default noborder_radius search_height red_back"  style="width:70px;" ng-click="storeWord(searchInputValue)" type="submit"><i class="glyphicon glyphicon-search white" style="font-size: 25px;"></i></button>
		                        </div>
		                    </div>
	                    </form>
	                    <div class="col-lg-3 col-md-3"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="container" ng-controller="CategoryCtrl">			
			<div class="row quick_search_top">
				<div class="col-md-12 col-sm-12 col-xs-12 col-md-12">
					<h3 class="bold">Quick searches</h3>
					<h6>Discover new places, businesses, services or products using Yammzit.</h6>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 col-md-4">
					<div class="white_back row-eq-height">
						<div class="float_left">
							<img src="../admin/Theme/index_page_photos/travel-hotel-22.jpg" class="cat_image_property">
						</div>
						<div class="left_pad8 float_right">
							<p class="bold cat_title"><a href="{{BaseURL}}/free_home_tab.php" style="text-decoration:none"><text style="color:#797979;">Hotels & Travel</text></a></p>
							<h6 class="cat_description">Find your ideal hotel at the lowest prices </h6>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 col-md-4">
					<div class="white_back row-eq-height">
						<div class="float_left">
							<img src="../admin/Theme/index_page_photos/fancy-dinner-restaurant.jpg" class="cat_image_property">
						</div>
						<div class="left_pad8 float_right">
							<p class="bold cat_title"><a href="{{BaseURL}}/free_home_tab.php" style="text-decoration:none"><text style="color:#797979;">Restaurant</text></a></p>
							<h6 class="cat_description">Find the best restaurants, cafés, and bars</h6>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 col-md-4">
					<div class="white_back row-eq-height">
						<div class="float_left">
							<img src="../admin/Theme/index_page_photos/102659300-shopping-mall.530x298.jpg" class="cat_image_property">
						</div>
						<div class="left_pad8 float_right">
							<p class="bold cat_title"><a href="{{BaseURL}}/free_home_tab.php" style="text-decoration:none"><text style="color:#797979;">Shopping</text></a></p>
							<h6 class="cat_description">Shopping made easy and fun. Shop online from the comfort of your home</h6>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 col-md-4">
					<div class="white_back row-eq-height">
						<div class="float_left">
							<img src="../admin/Theme/index_page_photos/real_estate.jpg" class="cat_image_property">
						</div>
						<div class="left_pad8 float_right">
							<p class="bold cat_title"><a href="{{BaseURL}}/free_home_tab.php" style="text-decoration:none"><text style="color:#797979;">Real Estate</text></a></p>
							<h6 class="cat_description">Search millions of Real Estate listings, compare  home values and connect with local professionals</h6>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12 col-md-4">
					<div class="white_back row-eq-height">
						<div class="float_left">
							<img src="../admin/Theme/index_page_photos/night-life.jpg" class="cat_image_property">
						</div>
						<div class="left_pad8 float_right">
							<p class="bold cat_title"><a href="{{BaseURL}}/free_home_tab.php" style="text-decoration:none"><text style="color:#797979;">Night Life</text></a></p>
							<h6 class="cat_description">Find the best bars, clubs, lounge & Pubs in your city</h6>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12 col-md-4">
					<div class="white_back row-eq-height">
						<div class="float_left">
							<img src="../admin/Theme/index_page_photos/health-booster.jpg" class="cat_image_property">
						</div>
						<div class="left_pad8 float_right">
							<p class="bold cat_title"><a href="{{BaseURL}}/free_home_tab.php" style="text-decoration:none"><text style="color:#797979;">Health & Medical</text></a></p>
							<h6 class="cat_description">Find the right health and medical facility to use</h6>
						</div>
					</div>
				</div>
			</div>

			<div class="row top20" ng-controller="IndexCtrl">
				<div class="col-md-12 col-sm-12 col-xs-12 col-md-12">
					<h3 class="bold">New Discoveries</h3>
					<h6>Some of the new places, businesses, services, products added to Yammzit.</h6>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 col-md-4" ng-repeat="discovery in discoveries track by $index">
					<div class="white_back row-eq-height">
						<div class="float_left">
							<img src="{{BaseImageURL+discovery.user_pic}}" class="discover_image_property">
						</div>
						<div class="left_pad8 float_right">
							<div class="row discover_left_top">
								<div class="col-md-1 col-lg-1 col-xl-1 col-sm-2 col-xs-2" >
									<div class="icon icon-map-pointer7 size30"></div>
								</div>
								<div class="col-md-10 col-lg-10 col-xl-10 col-sm-10 col-xs-10">
									<h5 class="redColor bold discovery_title" ng-click=goToBusiness(discovery.id)><a href="{{BaseUrl}}/business_page_free.php?current_business_id={{discovery.id}}" style="text-decoration: none"><text class="redBright">{{discovery.name}}</text></a></h5>
									<br/>
									<span class="discovery_address">{{discovery.address}}</span>
									<h5 class="discovered_by">Discovered by</h5>
									<h5 class="bold top0">{{discovery.user_name}}</h5>
								</div>
							</div>
						</div>
					</div>
				</div>

				
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default noborder_radius">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-5 col-lg-5 col-xl-5 col-sm-5">									
									<img src="../admin/Theme/index_page_photos/NewVisionAd.jpg" class="img-responsive" style="min-height:100px;max-width: 100%;margin-top: -15px;">
								</div>
								<div class="col-md-7 col-lg-7 col-xl-7 col-sm-7">									
									<h3 class="bold" style="padding-top: 60px;">Heading out? Bring <span class="redColor">Yammzit</span> with you</h3>
									<h5>The free <span class="bold">Yammzit mobile app</span> is the fastest and easiest way to search for a business near you. <span class="bold">Download it from the google play store to get started.</span> </h5>

									<div class="col-md-4 col-lg-4 col-xl-4 col-sm-4">
										<h5>
											<img src="../admin/Theme/index_page_photos/magnifying-glass34.svg" class="heading_out_icon_size">
											<span class="head_out_text-color">Local search engine</span>
										</h5>
									</div>
									<div class="col-md-8 col-lg-8 col-xl-8 col-sm-8">
									
										<h5>
											<img src="../admin/Theme/index_page_photos/map-pointer7.svg" class="heading_out_icon_size">
											<span class="head_out_text-color">Discover new places</span>
									</div>

									<div class="col-md-4 col-lg-4 col-xl-4 col-sm-4">
										<h5>
											<img src="../admin/Theme/index_page_photos/network60.svg" class="heading_out_icon_size">
											<span class="head_out_text-color">Connect with friends</span>
										</h5>
									</div>
									<div class="col-md-8 col-lg-8 col-xl-8 col-sm-8">
									
										<h5>
											<img src="../admin/Theme/index_page_photos/phone403.svg" class="heading_out_icon_size">
											<span class="head_out_text-color">Get business emails, phone no. and others</span>
										</h5>
									</div>

									<div class="col-md-4 col-lg-4 col-xl-4 col-sm-4">
										<h5>
											<img src="../admin/Theme/index_page_photos/mark1.svg" class="heading_out_icon_size">
											<span class="head_out_text-color">Write & read reviews</span>
										</h5>
									</div>
									<div class="col-md-8 col-lg-8 col-xl-8 col-sm-8">
									
										<h5>
											<img src="../admin/Theme/index_page_photos/email5.svg" class="heading_out_icon_size">
											<span class="head_out_text-color">Message businesses & friends</span>
										</h5>
									</div>

									<div class="col-md-4 col-lg-4 col-xl-4 col-sm-4">
										<h5>
											<img src="../admin/Theme/index_page_photos/photo-camera.svg" class="heading_out_icon_size">
											<span class="head_out_text-color">Share & view photos</span>
										</h5>
									</div>
									<div class="col-md-8 col-lg-8 col-xl-8 col-sm-8">
									
										<h5>
											<img src="../admin/Theme/index_page_photos/book86.svg" class="heading_out_icon_size">
											<span class="head_out_text-color">Save your favorite business</span>
										</h5>
									</div>

									<div class="col-md-8 col-lg-8 col-xl-8 col-sm-8">		<a href="https://play.google.com/store/apps/details?id=com.ionicframework.ionictodo196446" target="_blank">
											<img src="../admin/Theme/uploads/Googleplayyyy.png" style="width:85%;height:115px;margin-bottom:5px;margin-top:40px;">
										</a>
									</div>
									<div class="col-md-4 col-lg-4 col-xl-4 col-sm-4">
									
										<h3 class="bold head_out_text-color" style="margin-top: 70px;margin-left:-60px;margin-bottom: 0px;">
											Download for
										</h3>
										<h3 class="bold head_out_text-color" style="margin-top: 0px;margin-left:-30px;">
											Free Now
										</h3>
									</div>


								</div>
							</div>
							<div class="row gutter-size" style="margin-left: 130px;">
								<div class="col-md-12 col-lg-12 col-xl-12">
									<label class="footer_text">Claim your Business Page</label>
									<label class="footer_text">About Yammzit</label>
									<label class="footer_text">Privacy Policy</label>
									<label class="footer_text">Contact Yammzit</label>
									<label class="footer_text">Terms of service</label>
									<label class="footer_text">Yammzit Ads</label>
									<label class="footer_text">Copyright&copy2016 yammzit</label>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
		
		

		<script src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
		<script type="text/javascript" src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>

		<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>

		<script src="assets/js/docs.min.js"></script>
		

		 
		<!--my own javascript order-->
		<script src="js/js/yammz.js" type="text/javascript"></script>
		<script src="js/js/home-models.js" type="text/javascript"></script>
		<script src="js/js/home.js" type="text/javascript"></script>
		<script src="js/js/starter.js" type="text/javascript"></script>
		

		<script src="node_modules/ng-dialog/js/ngDialog.js" type="text/javascript"></script>			
	</body>

</html>
