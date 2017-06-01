

<html lang="en">

<style>

</style>
<?php
require_once('imports.php');
require_once('Controllers/auth/auth.php');
include('classes/connector.php');
require_once('classes/gstring_funcs.php');
// include('classes/db_config.php');
$conn = new connector();

?>
<body style="background-color:#E9EAEE" ng-app="home">
<?php require_once('Controllers/Logged_header2_o.php'); ?>

 <?php
 if(isset($_GET['id'])){

 	 //include('Controllers/Logged_header2.php');
 	 $enc_id = $_GET['id'];
     $profile_user_id =gStringId($_GET['id']);

    // $profile_user = $conn->getUserOfId($profile_user_id);
    // if($profile_user['avatar']==null || $profile_user['avatar']=='')
    // {
    // 	$profile_user['avatar'] = BaseImageURL."uploads/defavatar.png";

    // }else if(strpos($profile_user['avatar'],'http', 0)===0){
	//     	$profile_user['avatar']=$profile_user['avatar'];

    // }else
    // {
    // 	$profile_user['avatar']=BaseImageURL.$profile_user['avatar'];
    // }

  ?>
		<div class="container" ng-controller="FullUserCtrl">
			<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $profile_user_id; ?>'"></input>
			<input type="hidden" ng-model="enc_user_id" ng-init="enc_user_id='<?php echo $enc_id; ?>'"></input>
			<input type="hidden" ng-model="idVal"  ng-init="idVal='<?php echo $profile_user_id; ?>'" />
			<input type="hidden" ng-model ="date_created" ng-init="date_created='<?php echo time() ?>'"/>
			<input type="hidden" ng-model="who" ng-init="who='me'" />
			<!-- <label >this is a memememem of id==>   {{user_id}}</label> -->
			
			<div class="row"  >
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
					<div class="panel panel-default">
					
						<div class="panel-body">
							<div ng-include="'Controllers/Profile/user_profile_header.php'"> </div>
						</div>
					</div>

				</div>

			</div>

		<div class="row"  >
			<!-- <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 " >	 -->
			<div class=" col-md-6 " >
				<span>
					<a type="btn" style="background-color:white;width:77;height:70px; color:#D0CCC9;" class="btn btn-default noborderStyle ">
						<table style="background-color:white;">
							<tr>
								<td>
									<div style="font-size:25px;margin-left:15px;margin-top:10px;" class="icon icon-email5"></div>
									<div style="height:4px;"></div>
									<span style="font-size:11px;padding-bottom:0px;color:black;margin-left:5px;">Message</span>
								</td>
							</tr>
						</table>
					</a>
				</span>
				<span>
					<a type="btn" style="background-color:white;width:77;height:70px; color:#D0CCC9;" class="btn btn-default noborderStyle " id="people_i_follow_tab" ng-click="toggle_profile_page('people_i_follow_tab')">
						<table style="background-color:white;">
							<tr>
								<td>
									<div style="font-size:25px;margin-left:15px;margin-top:10px;" class="icon icon-add182"></div>
									<div style="height:4px;"></div>
									<span style="font-size:11px;padding-bottom:0px;color:black;margin-left:4px;">Following</span>
								</td>
							</tr>
						</table>
					</a>
				</span>
				<span>
					<a type="btn" style="background-color:white;width:77;height:70px; color:#D0CCC9;" class="btn btn-default noborderStyle ">
						<table style="background-color:white;">
							<tr>
								<td>
									<div style="font-size:25px;margin-left:15px;margin-top:10px;" class="icon icon-sharing6"></div>
									<div style="height:4px;"></div>
									<span style="font-size:11px;padding-bottom:0px;color:black;margin-left:11px;">Share</span>
								</td>
							</tr>
						</table>
					</a>
				</span>

				<span>
					<a type="btn" style="background-color:white;height:70px; color:#D0CCC9;" class="btn btn-default noborderStyle ">
						<table style="background-color:white;">
							<tr>
								<td>
									<div style="font-size:25px;margin-left:23px;margin-top:10px;" class="icon icon-download43"></div>
									<div style="height:4px;"></div>
									<span style="font-size:11px;padding-bottom:0px;color:black;">Business inbox</span>
								</td>
							</tr>
						</table>
					</a>
				</span>
				<span>
					<a type="btn" style="background-color:white;height:70px; color:#D0CCC9;" class="btn btn-default noborderStyle " id="friend_request_tab" ng-click="toggle_profile_page('friend_request_tab')">
						<table style="background-color:white;">
							<tr>
								<td>
									<div style="font-size:25px;margin-left:27px;margin-top:10px;" class="icon icon-network60"></div>
									<div style="height:4px;"></div>
									<span style="font-size:11px;padding-bottom:0px;color:black;">Friend Requests</span>
								</td>
							</tr>
						</table>
					</a>
				</span>
			</div>
			<div class="col-md-6 " style="margin-left: -127px; " >
				<span>
					<div  style="background-color:white;height:68px;width:681px; color:#D0CCC9; border-radius:3px;" >

					</div>
				</span>
			</div>

		</div>

		<div class="row"  style="padding-top:20px;">
			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-4 " >
				<div class="panel panel-default">
					<div class="panel-body" >

							<ul class="nav nav-tab nav-stacked" style="padding-left:0px; ">

								<li style="padding-bottom:3px;font-size:11px;font-weight:bold;" class="user_profile_tab" id="wall_tab" ng-click="toggle_profile_page('reviews_tab')"><a href="#" data-toggle="tab" ><B>Wall</B></a>
								</li>

								<li ng-controller="FullUserCtrl" style="padding-bottom:3px;font-size:11px;font-weight:bold;"  class="user_profile_tab" id="friends_tab" ng-click="toggle_profile_page('friends_tab')"><a href="#friends" data-toggle="tab" ><B>Friends</B><span  style="color:#BD2532;" class="">  {{friendsCount}}</span></a>
								</li>

								<li style="padding-bottom:3px;font-size:11px;font-weight:bold;" class="user_profile_tab" id="reviews_tab" ng-click="toggle_profile_page('reviews_tab')" ><a href="#reviews" data-toggle="tab" ><B>Reviews</B></a>
								</li>
								<li  ng-controller="favouriteBusinessCtrl" style="padding-bottom:3px;font-size:11px;font-weight:bold;" class="user_profile_tab" id="favourites_tab" ng-click="toggle_profile_page('favourites_tab')"><a href="#favourites" data-toggle="tab"  ><B>Favourites</B><span  style="color:#BD2532;" class="">
								<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $profile_user_id; ?>'"></input>
								  {{count}}</span></a>
								</li>

								<li style="padding-bottom:3px;font-size:11px;font-weight:bold;" class="user_profile_tab" id="ad_manager_tab"><a href="#"  ><B>Advert Manager </B></a>
								</li>

								<li ng-controller="MyBusinessCtrl" style="padding-bottom:3px;font-size:11px;font-weight:bold;" class="user_profile_tab" id="my_business_tab" ng-click="toggle_profile_page('my_business_tab')"><a href="#business_inbox" data-toggle="tab" ><B>My Pages</B><span  style="color:#BD2532;" class="">
								<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $profile_user_id; ?>'"></input>
								  {{count}}</span></a>
								</li>

								<li ng-controller="FullUserCtrl" style="padding-bottom:3px;font-size:11px;font-weight:bold;" class="user_profile_tab" id="mylikes_tab" ng-click="toggle_profile_page('mylikes_tab')"><a href="#business_inbox" data-toggle="tab" ><B>My Likes</B><span  style="color:#BD2532;" class=""> {{IfollowBusinessModels.length}}</span></a>
								</li>

								<li ng-controller="AddedBusinessCtrl" style="padding-bottom:3px;font-size:11px;font-weight:bold;"class="user_profile_tab" id="added_business_tab" ng-click="toggle_profile_page('added_business_tab')"><a href="#business_adds" data-toggle="tab" ><B>My Discovers</B><span  style="color:#BD2532;" class="">
								<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $profile_user_id; ?>'"></input>
								 {{count}}</span></a>
								</li>
							</ul>

					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body" ng-controller="FullUserCtrl">
						<?php  require_once("Controllers/profile_contact.php");
							 ?>
					</div>
				</div>
				<div class="panel panel-default">
						<div class="panel-body">
							<div class="row" ng-controller="FullUserCtrl">
								<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
									<?php include("Controllers/business_page/reviews_photos_followers.php"); ?>
								</div>

							</div>
						</div>
					</div>
				<div class="panel panel-default" ng-controller="FullUserCtrl">
					<div class="panel-body">
						<?php require_once("Controllers/social_media.php"); ?>
					</div>
				</div>
				<div class="panel panel-default" ng-controller="FullUserCtrl">
					<div class="panel-body">
						<h5><B class="redbright">About :</B><B> {{fullUser.user.first_name+" "+fullUser.user.last_name | uppercase}}</B></h5>
						<p>
							<h5>
							{{fullUser.user.about_me }}

							</h5>
							<h5 ng-if="fullUser.user.about_me==''" style="font-size:13px;line-height: 20px;">

								Responding to positive reviews should be easy, right? It does sound easy, but it's surprisingly easy to get this wrong
								.When contacting a positive reviewer, your purpose should be simply to deliver a human thank you and let them know you care
							</h5>
						</p>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-sm-9 col-md-9 col-xs-8 " style="padding-top:2px;">


						<div class="tab-content">

							<!-- reviews -->

							<div class="tab-pane active" id="reviews_profile_tab" ng-controller="UserWallFeedsCtrl">

									
									<div>
									<?php require("Controllers/user_profile_reviews.php"); ?>
									</div>



							</div>

							<!-- reviews -->


							<!-- friends -->

							<div class="tab-pane " id="friends_profile_tab" ng-controller="FullUserCtrl">
								<div class="panel panel-default" style="padding-bottom:10px;" ng-if="friendsCount==0">
								<?php require("Controllers/no_my_friends.php"); ?>
								</div>

								<div ng-if="friendsCount !=0">
								<?php require("Controllers/user_profile/friends.php"); ?>
								</div>




							</div>

							<!-- freinds -->






							<!-- my favourite businesses -->

							<div class="tab-pane " id="favourites_profile_tab" ng-controller="favouriteBusinessCtrl">
								<div class="panel panel-default" style="padding-bottom:10px;">

									 <div class="panel-body" ng-if="businessModels.length==0" >
										 <?php require_once("Controllers/no_favourites.php");?>
									</div>
									<div class="panel-body" ng-if="businessModels.length>0" ng-repeat="business in businessModels" style="padding-bottom:0px !important; padding-top:10px !important;">
										 <?php require_once("Controllers/favourites.php");?>
									</div>

								</div>
							</div>
							<!-- my favourite businesses -->



							<!-- missing addmanager -->

							<div class="tab-pane " id="add_manager_profile_tab">
								<div class="panel panel-default">
									<div class="panel-body">
										<?php require("Controllers/User_added_businesses.php");?>
									</div>
								</div>
							</div>



							<!-- missing addmanager -->



							<!-- my owned businesses -->

							<div class="tab-pane " id="owned_business_profile_tab" ng-controller="MyBusinessCtrl">
								<div class="panel panel-default" style="padding-bottom:10px;" >

                                    <div class="panel-body" ng-if="businessModels.length==0">

										<?php require("Controllers/no_owned_businesses.php"); ?>
									</div>

									<div ng-if="businessModels.length>0" class="panel-body" ng-repeat="business in businessModels " style="padding-bottom:0px !important; padding-top:10px !important;" >

										<?php require("Controllers/User_owned_businesses.php");?>
									</div>


								</div>
							</div>



							<!-- my owned businesses -->




							<!-- bussiness photos -->

							<div class="tab-pane " id="photos_profile_tab" ng-controller="FullUserCtrl">
								<div id="/photos"></div>
								<div class="panel panel-default">

								    <div class="panel-body" ng-if="fullUser.photos.length==0">
										<?php require("Controllers/no_business_photos.php");?>
									</div>

									<div class="panel-body" ng-if="fullUser.photos.length!=0">
										<?php require("Controllers/business_page/view_photos.php");?>
									</div>


								</div>

							</div>
							<!-- bussiness photos -->

							<!-- my added businesses -->

							<div class="tab-pane " id="added_business_profile_tab" ng-controller="AddedBusinessCtrl">
								<div class="panel panel-default" style="padding-bottom:10px;">

									<div ng-if="businessModels.length==0" class="panel-body">
										<?php require("Controllers/no_discovers.php");?>
									</div>

									<div ng-if="businessModels.length!=0" class="panel-body" ng-repeat="business in businessModels" style="padding-bottom:0px !important; padding-top:10px !important;">
										<?php require("Controllers/User_added_businesses.php");?>
									</div>



								</div>
							</div>
							<!-- my added businesses -->

							<!-- friend requests-->

							<div class="tab-pane " id="friend_requests_profile_tab" ng-controller="FullUserCtrl">
								<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $profile_user_id; ?>'"></input>
								<div class="panel panel-default" style="height:2240px;">

									<div class="panel-body">
									<div>
											<span colspan="2" style="padding-left:45px;padding-top:15px;" class="redbright"></span>
									</div>
									<br/>
											<div ng-if="friend_requests.length==0" >
											<?php require("Controllers/no_friend_requests.php");?>

											</div>

											<div ng-if="friend_requests.length>0" ng-repeat="friend_request in friend_requests track by $index">
											<?php require("Controllers/user_profile/friend_requests.php");?>

											</div>
									</div>
								</div>

							</div>
							<!-- friend requests -->

							<!--following-->

						    <div class="tab-pane " id="following_profile_tab" ng-controller="FullUserCtrl">
						    	<div id="/followers"></div>

						    	<div class="panel panel-default" ng-if="follower_number==0">

									<?php require("Controllers/no_followers.php"); ?>
								</div>

						    	<div ng-if="follower_number!=0">

								<?php require("Controllers/user_profile/following.php"); ?>
								</div>




							</div>

							<!-- following -->
							<!-- people i follow -->
							<div class="tab-pane " id="people_i_follow_profile_tab" ng-controller="FullUserCtrl">
								<div class="panel panel-default" ng-if="people_i_follow_count==0">
									<?php require("Controllers/no_people_i_follow.php"); ?>
								</div>
								<div ng-if="people_i_follow_count!=0">
								<?php require("Controllers/user_profile/peopleIFollow.php"); ?>
								</div>

							</div>

							<!-- peolpe i follow -->

							<!--  businesses i follow-->

							<div class="tab-pane " id="mylikes_profile_tab" ng-controller="FullUserCtrl">
								<div class="panel panel-default">

									<div class="panel panel-default" ng-if="IfollowBusinessModels.length==0">
									<?php require("Controllers/no_following_businesses.php"); ?>
									</div>

									<div class="panel-body" ng-if="IfollowBusinessModels.length!=0" ng-repeat="business in IfollowBusinessModels" style="padding-bottom:0px !important; padding-top:10px !important;">
										<?php require("Controllers/User_added_businesses.php");?>
									</div>



								</div>
							</div>
							<!-- businesses i follow -->


						</div>


			</div>

		</div>
	</div>
	<?php
		}
		 require_once("footer.php");
	 ?>
	 <!--<script src="dist/js/bootstrap.min.js"></script>-->
		<!--<script type="text/javascript" src="bootstrap-3.2.0-dist/js/jquery-1.9.0.js"></script>-->
		<!--<script type="text/javascript" src="bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>-->
		<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
    	<!--<script type="text/javascript" src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>-->
		
		<script src="distjpicker/jquery.date-dropdowns.min.js"></script>

		<script src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="bootstrap-3.2.0-dist/js/jquery.tmpl.js" type="text/javascript"></script>


		<script src="js/js/yammz.js" type="text/javascript"></script>
		<script src="js/js/home-models.js" type="text/javascript"></script>
		<script src="js/js/home.js" type="text/javascript"></script>
		<script src="js/js/starter.js" type="text/javascript"></script>
		<script src="Rating/js/star-rating.js" type="text/javascript"></script>

		<script type="text/javascript" src="js/function.js"></script>
        <script src="node_modules/ng-dialog/js/ngDialog.js" type="text/javascript"></script>

</body>



</html>
