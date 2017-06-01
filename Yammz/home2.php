

<?php

/*
*@ Author  Henry Bbosa 
*New home page home2.php
*includes new layout and New search bar.
*functionalities
* Added links to search page
* Loading of news feeds discovering new businesses
* suggested places to follow
* Redirect here with session from index.php
* Review of the day
*/

require_once('Controllers/auth/auth.php');
include("classes/connector.php");
require_once('classes/gstring_funcs.php'); 
$conn = new connector();

?>

 <html lang="en">
	<?php require_once('imports.php'); ?>


	<style type="text/css">
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
        .cover_button{
    		height:35px;min-height:27px;min-width:60px;background-color:white;text-align: center;color:#5D5D5D;font-weight:lighter;margin-top:18px;padding-top:7px
        }
        .search_margin_left{margin-left: 250px;}

	  	@media screen and (max-width: 500px) /* Mobile */ {
	  		.quick_search_top{margin-top: -60px;}
	  		.search_margin_left{margin-left: 0px;}
	  	}

	  	.heading_out_icon_size{width: 20px;height:20px;}
	  	.search_height{height: 43px;}
	  	.head_out_text-color{color: #3E3E3E;}
	  	.redColor{color: #BD2532;font-weight: bold;}
	  	.bold{font-weight: bold;}
	  	.red_back{background-color: #BD2532;border-color: #BD2532;}
	  	.black{color: #5A5A5A;}

        .size30{font-size:30px;}
        .menu_icon{font-size:80px;padding-top: 45px}
        .menu_text_top{padding-top: 30px;}
        .noborder_radius{border-radius: 0px;}
        .menuDiv{margin-left: 80px;margin-right: 60px;margin-top: 15px;}
        .left90{margin-left: 90px;}

        .submenu_catIcon{font-size: 25px;margin-top: -5px;}
        .left20{margin-left: 20px;}
        .vertical_line{height:10px;width:1px;background-color:white;}
        .footer_links{color: #898A8C;}

        .submenu_labelTop{margin-top: 20px;}
        .font14{font-size: 14px;}
        li:hover {background: none;}
        li a:hover{ background: none; }

        .navbar-nav>li>a:hover{background-color:transparent;}

        .navbar-nav>li.active> a {background-color:transparent;}

        nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
		    background-color:transparent;
		    border-color: #337ab7;
		}

		.navbar-nav li {background-color: transparent;}

	</style>
	<script>

	</script>


<body style="background-color:#E9EAEE" ng-app="home">

<?php //require_once('Controllers/Logged_header2_o.php'); ?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 col-md-12 header_cover">
		<div class="container">
			<div class="pull-right">
				<div class="row gutter-size" style="margin-top: 15px;">
					<!-- <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-xs-6"></div> -->
					<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
						<ul class="nav navbar-nav navbar-right" style="background-color: transparent;">
							<li class="topList" style="background-color: transparent;">
					          <a class="" href="home2.php" style="text-decoration: none" ><span class="glyphicon glyphicon-home white"></span>&nbsp;<span class="white">Home</span></a>
					        </li>
					        <li class="hidden-xs hidden-sm">
					        	<hr class="vertical_line"></hr>
					        </li>
					        <li class="topList">
					          <a  href="#"  style=""><span class="glyphicon glyphicon-envelope white"></span>&nbsp;<span class="white">Message</span></a>
					        </li>
					        <li class="hidden-xs hidden-sm">
					        	<hr class="vertical_line"></hr>
					        </li>
					        <li class="dropdown topList">
          						<a href="#" class="dropdown-toggle " data-toggle="dropdown" style="height:20px;">
          							<img src="images/icons/notification icon.png" width="13" height="14px">&nbsp;<span class="white">Notifications</span></a>

      							<ul class="dropdown-menu message-dropdown" style="font-size:11;margin-top:12px;width:320px;margin-right:-118px;">

      								<li class="message-preview" >
      									<a href="#">
						                    <div class="media">
						                      <table >
						                        <tr>
						                          <td style="width:55px;"><img class="media-object" src="http://placehold.it/50x50" alt=""></td>
						                          <td >
						                            <h5 class="media-heading" style="font-size:11;padding-top:10px;">Steven Byamugisha liked your review
						                            </h5>
						                            <p class="small text-muted" style="font-size:12;"><i class="fa fa-clock-o"></i>  30 mins ago</p>
						                          </td>
						                        </tr>
						                      </table>                     
						                    </div>
						                </a>
      								</li>
  								</ul>
							</li>
							
							<li>
								<label><hr style="height:10px;width:1px;background-color:white;"></hr></label>					          
					        </li>
					        <li class="dropdown" >
          						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height:20px;">
          							
          							<span class="white">
	          							<?php include("Controllers/Profile/profile_image_nameview.php"); ?>
	          							 <b class="caret"></b>
          							 </span>						            
					          	</a>
					          	<ul class="dropdown-menu" style="font-size:11;size:20x20;margin-top:10px;margin-right:18px;">
						            <li class="">
						              <a href="user_profile.php?id=<?php  echo gString($_SESSION['SESS_MEMBER_ID']); ?>" class=""><i class="glyphicon glyphicon-user"></i>&nbsp;My Profile</a>
						            </li>
						            <li>
						              <a href="#"><i class="glyphicon glyphicon-cog"></i>&nbsp;My inbox</a>
						            </li>
						            <li>
						              <a href="#"><i class="glyphicon glyphicon-list"></i>&nbsp;Change password</a>
						            </li>
						            <li class="divider"></li>
						            <li>
						              <a href="Controllers/auth/logout.php"><i class="glyphicon glyphicon-off"></i>&nbsp;Log Out</a>
						            </li>
					            </ul>

				          	</li>


							


						</ul>
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
						<form  role="search" method="post" action="search.php" >
							<div class="input-group col-lg-7 col-md-7 search_margin_left">		
								<input class="form-control noborder_radius search_height" placeholder="Search for any service, product, place...." 
								  name="q"   type="text" ng-model="searchInputValue">

								<div class="input-group-btn">
		                            <button class="btn btn-default noborder_radius search_height red_back"  style="width:70px;" ng-click="storeLoggedWord(searchInputValue)" type="submit"><i class="glyphicon glyphicon-search white" style="font-size: 25px;"></i></button>
		                        </div>
		                    </div>
	                    </form>
	                    <div class="col-lg-3 col-md-3"></div>
					</div>
		</div>
	</div>
</div>

<div class="menuDiv" ng-controller="IconCtrl">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="panel panel-default noborder_radius">
				<div class="panel-body">
					<div class="left90">
						<div class="row">
							<div class="col-md-3 col-lg-3 col-xl-3 col-sm-4">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">

									<div class="icon icon-pass3 menu_icon"></div>
									<div class="bold menu_text_top"><text style="">Hotels & Travel</text>
									</div>
								</a>
							</div>

							<div class="col-md-3 col-lg-3 col-xl-3 col-sm-4">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">

									<div class="icon icon-meal2 menu_icon"></div>
									<div class="bold menu_text_top"><text style="color:#5A5A5A;">Restaurants</text>
									</div>
								</a>
							</div>

							<div class="col-md-3 col-lg-3 col-xl-3 col-sm-4">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">

									<div class="icon icon-marker20 menu_icon"></div>
									<div class="bold menu_text_top"><text style="color:#5A5A5A;">Shopping</text>
									</div>
								</a>
							</div>
							<div class="col-md-3 col-lg-3 col-xl-3 col-sm-4">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">

									<div class="icon icon-medical109 menu_icon"></div>
									<div class="bold menu_text_top"><text style="color:#5A5A5A;">Health & Medical</text>
									</div>
								</a>
							</div>
						</div>						
					</div>
					<div class="row">
						<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
							<hr style="margin-left: 20px;margin-right: 20px;height: 4px;background-color: #E9EAEE;border: 0px;margin-bottom: 0px;">
						</div>
					</div>
					<div style="margin-left: 90px;">
						<div class="row">
							<div class="col-md-3 col-lg-3 col-xl-3 col-sm-4">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">

									<div class="icon icon-cocktail-with-lemon-slice menu_icon"></div>
									<div class="bold menu_text_top"><text style="color:#5A5A5A;">Nightlife</text>
									</div>
								</a>
							</div>

							<div class="col-md-3 col-lg-3 col-xl-3 col-sm-4">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">

									<div class="icon icon-college1 menu_icon"></div>
									<div class="bold menu_text_top"><text style="color:#5A5A5A;">Education</text>
									</div>
								</a>
							</div>
							<div class="col-md-3 col-lg-3 col-xl-3 col-sm-4">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">

									<div class="icon icon-call37 menu_icon"></div>
									<div class="bold menu_text_top"><text style="color:#5A5A5A;">Local services</text>
									</div>
								</a>
							</div>
							<div class="col-md-3 col-lg-3 col-xl-3 col-sm-4">
								<a data-toggle="collapse" style="text-decoration: none;" href="#showlessmore">
									<div class="icon icon-three-dots-more-indicator black menu_icon"></div>
									<div class="bold menu_text_top black">Show more</div>
								</a>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="menuDiv" style="margin-top: 0px;margin-bottom: 0px;" ng-controller="IconCtrl">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="panel panel-default noborder_radius collapse" id="showlessmore">
				<div class="panel-body">
					<div class="left90">
						<div class="row" style="">

							<label class="submenu_labelTop">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">
									<div class="col-lg-1 col-md-1">
										<div class="icon icon-businessman254 submenu_catIcon"></div>
									</div>
									<label class="left20 font14"><text>Professional services</text></label>
								</a>
								
							</label>
							<label class="submenu_labelTop">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">
									<div class="col-lg-1 col-md-1">
										<div class="icon icon-hot51 submenu_catIcon"></div>
									</div>
									<label class="left20 font14"><text>Food</text></label>
								</a>
								
							</label>
							<label class="submenu_labelTop">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">
									<div class="col-lg-1 col-md-1">
										<div class="icon icon-tv41 submenu_catIcon"></div>
									</div>
									<label class="left20 font14"><text>Mass Media</text></label>
								</a>
								
							</label>
							<label class="submenu_labelTop">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">
									<div class="col-lg-1 col-md-1">
										<div class="icon icon-factory6 submenu_catIcon"></div>
									</div>
									<label class="left20 font14"><text>Manufacturing</text></label>
								</a>
								
							</label>
							<label class="submenu_labelTop">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">
									<div class="col-lg-1 col-md-1">
										<div class="icon icon-home168 submenu_catIcon"></div>
									</div>
									<label class="left20 font14"><text>Home Services</text></label>
								</a>
								
							</label>
							<label class="submenu_labelTop">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">
									<div class="col-lg-1 col-md-1">
										<div class="icon icon-silhouette66 submenu_catIcon"></div>
									</div>
									<label class="left20 font14"><text>Active Life</text></label>
								</a>
								
							</label>
							<label class="submenu_labelTop">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">
									<div class="col-lg-1 col-md-1">
										<div class="icon icon-buildings36 submenu_catIcon"></div>
									</div>
									<label class="left20 font14"><text>Public Services & Government</text></label>
								</a>
								
							</label>							
						<!-- </div> -->
						<!-- <div class="row" style="margin-top:20px;"> -->
							<label class="submenu_labelTop">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">
									<div class="col-lg-1 col-md-1">
										<div class="icon icon-quaver11 submenu_catIcon"></div>
									</div>
									<label class="left20 font14"><text>Art & Entertainment</text></label>
								</a>
								
							</label>
							
							<label class="submenu_labelTop">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">
									<div class="col-lg-1 col-md-1">
										<div class="icon icon-rent4 submenu_catIcon"></div>
									</div>
									<label class="left20 font14"><text>Real Estate</text></label>
								</a>
								
							</label>
							<label class="submenu_labelTop">
								<a href="{{BaseURL}}/home_tab.php" style="color:#5A5A5A;text-decoration: none">
									<div class="col-lg-1 col-md-1">
										<div class="icon icon-coins15 submenu_catIcon"></div>
									</div>
									<label class="left20 font14"><text>Financial Services</text></label>
								</a>
								
							</label>			
						<!-- </div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12 ">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4 " id="sidebar" role="navigation">
				
        		<div class="row" style="margin-top:10px;">
					<div class="col-md-12">	
						<ul class="nav nav-pills nav-stacked"  >

							<p style="color:#B3B7C0; font-weight:bold;padding-left:15px;font-size:14; "><B>PROFILE</B></p>

							
							<?php $usid=$_SESSION['SESS_MEMBER_ID']; ?>
							<input type= "hidden" id="sessionholder" value="$usid"/>
							<li   class="home_side_tab"><a style="text-decoration:none;font-size:13px;" class="black " href="user_profile.php?id=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">My Profile</a></li>

							<li class="home_side_tab"><a style="text-decoration:none;font-size:13px;" href="edit_user_profile.php?id=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" class="black">Edit Profile</a></li>

							<li class="home_side_tab"><a href="#" style="text-decoration:none;font-size:13px;" class="black">In box</a></li>

							<li class="home_side_tab"><a  style="text-decoration:none;font-size:13px;" class="black " href="user_profile.php?id=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">My Reviews</a></li>


						</ul>
						<div style="height:14px;"></div>
						<ul class="nav nav-pills nav-stacked">

							<p style="color:#B3B7C0; font-weight:bold;padding-left:15px;font-size:14"><B><br/>	MY PAGES</B></p>

							<li class="home_side_tab"><a style="text-decoration:none;font-size:13px;" href="claim_business.php" class="black">Claim my Business</a></li>

							<li class="home_side_tab"><a style="text-decoration:none;font-size:13px;" href="" class="black">Create Advert</a></li>

							<li class="home_side_tab"><a style="text-decoration:none;" href="" class="black">Cafe Javas</a></li>

							<li class="home_side_tab"><a style="text-decoration:none;font-size:13px;" href="" class="black">All My Businesses</a></li>
							<li class="home_side_tab"><a style="text-decoration:none;font-size:13px;" href="" class="black">Ad Manager</a></li>

						</ul>
						<div style="height:4px;"></div>
						<ul class="nav nav-pills nav-stacked" >
							<p style="color:#B3B7C0; font-weight:bold;padding-left:15px;font-size:14"><B><br/>	FRIENDS</B></p>

							<li   class="home_side_tab"><a style="text-decoration:none;font-size:13px;"class="black" href="">All Friends</a></li>

							<li class="home_side_tab"><a style="text-decoration:none;font-size:13px;" href="" class="black">Invite friends</a></li>

						</ul>
						<div style="height:14px;"></div>
						<ul class="nav nav-pills nav-stacked" >
							<p style="color:#B3B7C0; font-weight:bold;padding-left:15px;font-size:14"><B><br/>	GOSSIP</B></p>
							<li class="home_side_tab"><a class="black" style="text-decoration:none;font-size:13px;" href="create_gossip.php">All Gossips</a></li>

							<li class="home_side_tab"><a class="black" style="text-decoration:none;font-size:13px;" href="create_gossip.php">Create Gossip</a></li>

						</ul>
						<div style="height:14px;"></div>
						<ul class="nav nav-pills nav-stacked" >

							<p style="color:#B3B7C0; font-weight:bold;padding-left:15px;font-size:14"><B><br/>EVENTS</B></p>
							<li   class="home_side_tab"><a style="text-decoration:none;" class="black" href="create_event.php">All Events</a></li>

							<li   class="home_side_tab"><a style="text-decoration:none;" class="black" href="create_event.php">Create Event</a></li>

						</ul>
						<div style="height:4px;"></div>
						<ul class="nav nav-pills nav-stacked" >
							<p style="color:#B3B7C0; font-weight:bold;padding-left:15px;font-size:14"><B><br/>	FAVOURITES</B></p>

							<li  class="home_side_tab"><a style="text-decoration:none;font-size:13px;" class="black" href="">Cafe Javas</a></li>

							<li   class="home_side_tab"><a style="text-decoration:none;font-size:13px;" class="black" href="">Yammz.com LTD</a></li>

							<li   class="home_side_tab"><a style="text-decoration:none;font-size:13px;" class="black" href="">All Favourites</a></li>

						</ul>
					</div>
				</div>

			</div>
			<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12 ">
				<br/>
				<!-- <div class="panel panel-default "  style="border:none; height: 240px; border-radius:0px" ng-controller="RandomBusinessCtrl" ng-init="pickRandomBiz()" >
					<div class="panel-body" >
						<?php //require_once("Controllers/home_page/new_businesses_pill.php");?>
						
					</div>
				</div> -->

				<div id="home_posters" ng-controller="RandomBusinessCtrl" >
               		<!-- <div ng-include="'Controllers/home_page/new_post_pill.php'" ></div>   -->
               		<!-- <content-item  content="random_business"></content-item> -->
               		<div ng-controller="UserWallFeedsCtrl" >
               		  <input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo  $_SESSION['SESS_MEMBER_ID'];  ?>'" />
               		  <input type="hidden" ng-model="picker_type" ng-init="picker_type='home'" />
 				      <div ng-include="'Controllers/News_feed/view_feeds.php'" ></div>
 				      

 				    </div> 
						
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<br/>

			<div ng-include="'Controllers/add_business.php'" ></div>


			<div class="panel panel-default" style="border:none; border-radius:0px" ng-controller="ReviewCtrl">
						<input type="hidden" ng-model="page" ng-init="page='home'" />
							<div class="panel-body">
								<p class="redbright"><B>Review of the day</B></p>

									<div ng-include="'Controllers/day_review.php'" ></div>
							</div>
						</div>

			<div class="panel panel-default" ng-controller="EventCtrl">
							<div class="panel-body">
								<p class="redbright">Latest Events</P>

									<div ng-include="'Controllers/latest_events.php'"></div>

								<h6 > <!-- <a class="redbright">view All</a> --></h6>
							</div>
			</div>

			<div class="panel panel-default" ng-controller="GossipCtrl">
							<div class="panel-body">
								<p class="redbright">Latest Gossip </p>
								<!--<?php //require_once("Controllers/latest_gossip.php");?>-->
								<div ng-include="'Controllers/latest_gossip.php'"></div>
								<h6 > <!-- <a class="redbright">view All</a> --></h6>

							</div>
						</div>

			<div class="panel panel-default" ng-controller="RandomBusinessCtrl">
				<div class="panel-body">
					<p class="redbright">Suggested Places to Follow </p>

					
					<div ng-include="'Controllers/suggested_places_to_follow.php'"></div>

				</div>
			</div>

			<?php require_once("Controllers/business_ads.php");?>
			<h6 style="line-height: 20px;">
				<a href="#" class="footer_links"> Privacy</a>,&nbsp;&nbsp; 
				<a href="#" class="footer_links"> Terms</a>, &nbsp;&nbsp;
				<a href="#" class="footer_links"> Advertising</a>,&nbsp;&nbsp;
				<a href="#" class="footer_links"> Claim your business</a>,&nbsp;&nbsp;
				<a href="#" class="footer_links"> Business support</a>, &nbsp;&nbsp;
				<a href="#" class="footer_links"> About</a>, &nbsp; &nbsp;
				<a href="#" class="footer_links"> Yammzit &copy 2016</a>
			</h6>
		</div>

	</div>
	<?php //require_once("footer.php"); ?>
</div>
<?php require_once("share_model.php"); ?>
<!--<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>
<script type="text/javascript" src="bootstrap-3.2.0-dist/js/jquery-1.9.0.js"></script>
<script type="text/javascript" src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
<script src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="bootstrap-3.2.0-dist/js/jquery.tmpl.js" type="text/javascript"></script>


<!--my own javascript order-->
<script src="js/js/yammz.js" type="text/javascript"></script>
<script src="js/js/home-models.js" type="text/javascript"></script>
<script src="js/js/home.js" type="text/javascript"></script>
<script src="js/js/starter.js" type="text/javascript"></script>
<!--<script src="Rating/js/star-rating.js" type="text/javascript"></script>-->
<script src="Rating/js/star-rating.js" type="text/javascript"></script>

<script type="text/javascript" src="js/function.js"></script>
<script src="node_modules/ng-dialog/js/ngDialog.js" type="text/javascript"></script>



		<!-- end of my own javascript order-->


</body>
</html>
