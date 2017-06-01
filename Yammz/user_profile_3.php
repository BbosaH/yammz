<html lang="en">
<style>

</style>
<?php
require_once('imports.php');
require_once('classes/gstring_funcs.php');
include('classes/connector.php');
// include('classes/db_config.php');
$conn = new connector();
?>
	<body style="background-color:#E9EAEE" ng-app="home">


 <?php
 if(isset($_GET['id'])){

    $profile_user_id =gStringId($_GET['id']);
    $profile_user = $conn->getUserOfId($profile_user_id);
    if($profile_user['avatar']==null || $profile_user['avatar']=='')
    {
    	$profile_user['avatar'] = BaseImageURL."uploads/defavatar.png";

    }else if(strpos($profile_user['avatar'],'http', 0)===0){
	    	$profile_user['avatar']=$profile_user['avatar'];

    }else
    {
    	$profile_user['avatar']=BaseImageURL.$profile_user['avatar'];
    }

    $alreadyFollows = $conn->getAll("SELECT * FROM user_follower WHERE user_id='".$profile_user_id."' AND follower_id='".$_SESSION['SESS_MEMBER_ID']."' ");
    $toggle=0;
    if(empty($alreadyFollows))
    {
    	 $toggle=0;

    }else
    {
    	 $toggle=1;
    }

    $alreadySents = $conn->getAll("SELECT * FROM user_friend WHERE

	    	(user_id='".$profile_user_id."' AND friend_id='".$_SESSION['SESS_MEMBER_ID']."' )
	    	OR
	    	(user_id='".$_SESSION['SESS_MEMBER_ID']."' AND friend_id='".$profile_user_id."' )

    	 ");
    $friendtoggle=0;

    if(empty($alreadySents))
    {
    	 $friendtoggle=0;

    }else
    {
    	foreach ($alreadySents as $alreadySent) {
    		# code...

	    	if($alreadySent['status']==0){


	    	 $friendtoggle=1;

	    	}else if($alreadySent['status']==1)
	    	{
	    		$friendtoggle=2;
	    	}
    	}
    }


  ?>
  
  <?php include('Controllers/Logged_header2_o.php'); ?>
		<div class="container" ng-controller="FullUserCtrl">
			<input type="hidden" ng-init="friendtoggle='<?php echo $friendtoggle; ?>'" />
  			<input type="hidden" ng-init="toggle='<?php echo $toggle; ?>'" />
  			<input type="hidden" ng-model="reciever_id"  ng-init="reciever_id='<?php echo $profile_user_id; ?>'" />
  			<input type="hidden" ng-model="idVal"  ng-init="idVal='<?php echo $profile_user_id; ?>'" />
  			<input type="hidden" ng-init="sender_id='<?php echo $_SESSION['SESS_MEMBER_ID']; ?>'" />
			<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $_SESSION['SESS_MEMBER_ID']; ?>'"></input>
			<input type="hidden" ng-model="who" ng-init="who='him'" />
			<!-- <label >this is a freind of id==>   {{user_id}}</label> -->
			<input type="hidden" ng-model ="date_created" ng-init="date_created='<?php echo time() ?>'"/>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
									<!-- <span  class="redbright pull-right" style="padding-right:95px;"><B></B></span> -->
								</div>
							</div>

							<div class="row">
								<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 " style="padding-left:70px;">
									<img style="background-color:grey;" src="<?php echo $profile_user['avatar']; ?>" class="img-circle" width="350px" height="350px">
								</div>
								<div class="col-lg-9 col-sm-9 col-md-9 col-xs-12 " style="padding-top:50px; padding-left:200px;">
									<h4><B>Profile: </B><span style="color:#BD2532; padding-left:25px;"><?php echo $profile_user['first_name'].' '.$profile_user['last_name'] ?></span></h4>
									<h4 style="padding-top:10px;"><B>Friends: </B><span style="color:#BD2532;padding-left:20px;">{{fullUser.friend_count}} friends</span></h4>
									<h4 style="padding-top:10px;"><B>Reviews: </B><span style="color:#BD2532;padding-left:10px;">{{fullUser.review_count}} Reviews</span></h4>
									<div class="row"style="padding-top:25px;">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
											<table>
												<tr >
													<td ng-repeat="photomodel in fullUser.photos | limitTo : 3 " style="margin-left: 10px;" >
														<div style="padding-left: 10px; padding-right:10px;" ng-show="$index!=2">
														<img ng-src="{{photomodel.photo}}"  width="150px" height="150px" style="border-radius: 10px;">
														</div>
														<div id="photo_number_container" style="margin-left: -17px; margin-top:-60px;" ng-show="$index==2" >
															<img id="ex_image" ng-src="{{photomodel.photo}}"  width="150px" height="150px" style="border-radius: 10px;">
															<div style="background-color:rgba(0,0,0,0.5) ; width:150px ;height:150px; border-radius: 10px; z-index: 100px; position: absolute; left: 35px;
							 									 top: 30px;"></div>
															<p id="ex_text" >
																	    +{{fullUser.photos.length-3}}
															</p>

														</div>

													</td>

													<!-- <td>
														<img src="images/profiles/right hand side 2.png"  width="150px" height="150px"></span>
													</td> -->
													<td width="15px;"></td>
													<td ng-show='fullUser.photos.length<3'>
														<!-- <img src="images/profiles/right hand side 2.png"  width="150px" height="150px"></span> -->
														<a type="btn" style="background-color:#EBEAEF; color:#D0CCC9; border-color:white;border-radius:10px;height:149px;width:150px;" class="btn btn-default noborderStyle ">
															<div style="height:15px;"></div>
															<div><img src="images/icons/profile logo .png" style="height:75px;width:80px;"/></div>
															<div style="height:15px;"></div>
															<span style="font-size:18px;">Add Photo</span>
														</a>
													</td>
													<td width="15px;"></td>
													<td ng-show='fullUser.photos.length<2'>
														<!-- <img src="images/profiles/right hand side 2.png"  width="150px" height="150px"></span> -->
														<a type="btn" style="background-color:#EBEAEF; color:#D0CCC9; border-color:white;border-radius:10px;height:149px;width:150px;" class="btn btn-default noborderStyle ">
															<div style="height:15px;"></div>
															<div><img src="images/icons/profile logo .png" style="height:75px;width:80px;"/></div>
															<div style="height:15px;"></div>
															<span style="font-size:18px;">Add Photo</span>
														</a>
													</td>
													<td width="15px;"></td>
													<td ng-show='fullUser.photos.length<1'>
														<!-- <img src="images/profiles/right hand side 2.png"  width="150px" height="150px"></span> -->
														<a type="btn" style="background-color:#EBEAEF; color:#D0CCC9; border-color:white;border-radius:10px;height:149px;width:150px;" class="btn btn-default noborderStyle ">
															<div style="height:15px;"></div>
															<div><img src="images/icons/profile logo .png" style="height:75px;width:80px;"/></div>
															<div style="height:15px;"></div>
															<span style="font-size:18px;">Add Photo</span>
														</a>
													</td>
												</tr>
											</table>

										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>

		</div>
		<div class="row">
			<div class="container">
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 " style="background-color:white; ">

						<?php require_once("Controllers/user_profile/addfriend.php"); ?>
						<table style="font-size:12;">
							<tr>
								<td style="width:50px;">
									<span  ng-click="send_friend_request(sender_id,reciever_id)" ng-show="friendtoggle==0">
									<a class="btn btn-default"  style="background-color:white; color:black; border:0px;" class="btn btn-default noborderStyle " >
										<span style="font-size:12px; color:white; font-weight:bold;"><div class="ion ion-person-add" style="font-size:30px; color:#000000"></div></span>
										<br>
										<span style="font-size:11px;">Add Friend</span>


									</a>
									</span>


									<span ng-show="friendtoggle==1">
									<a class="btn btn-default"  style="background-color:white; color:black; border:0px;" class="btn btn-default noborderStyle " >
										<span style="font-size:12px; color:white; font-weight:bold;"><div class="ion ion-person-add" style="font-size:30px; color:#000000"></div></span>
										<br>
										<span style="font-size:11px;">Request sent</span>


									</a>
									</span>

									<span  ng-click="unfriend_person(sender_id,reciever_id)" ng-show="friendtoggle==2">
									<a class="btn btn-default"  style="background-color:white; color:black; border:0px;" class="btn btn-default noborderStyle " >
										<span style="font-size:12px; color:white; font-weight:bold;"><div class="ion ion-person-add" style="font-size:30px; color:#BD2532"></div></span>
										<br>
										<span style="font-size:11px;">Friends</span>


									</a>
									</span>

								</td>
								<td style="width:20px;">
									<hr style="height:45;width:4; background-color:#EBEAEF;"></hr>
								</td>
								<td style="width:45px;">

									<div style="font-size:25px;margin-left:15px;margin-top:0px; color:black;" class="icon icon-email5"></div>
									<div style="height:4px;"></div>
									<span style="font-size:11px;padding-bottom:0px;color:black;margin-left:5px;">Message</span>

								</td>
								<td style="width:20px;">

									<hr style="height:45;width:4; background-color:#EBEAEF;"></hr>

								</td>
								<td style="width:65px;" ng-controller="RandomBusinessCtrl">
									<button ng-show="toggle==0" style="background-color:white; color:black; border:0px;" class="btn btn-default noborderStyle " ng-click="followItem('person',sender_id,reciever_id)">
										<span style="font-size:12px; color:white; font-weight:bold;"><img src="images/icons/follow icon black.png"  width="30px" height="30px"></span>
									 <br><span style="font-size:11px; ">Follow</span>
									</button>
									<button style="background-color:white; color:black; border:0px;" class="btn btn-default noborderStyle " ng-show="toggle==1" ng-click="unfollowItem('person',sender_id,reciever_id)">
										<span style="font-size:12px; color:white; font-weight:bold;"><div class="ion ion-android-checkmark-circle" style=" font-size:30px; color:#BD2532"></div></span>
									 <br><span style="font-size:11px; ">following</span>
									</button>
								</td>
								<td>
									<hr style="height:45;width:4; background-color:#EBEAEF;"></hr>
								</td>
								<td style="width:65px;">
									<button type="submit" style="background-color:white; color:black; border:0px;" class="btn btn-default noborderStyle " id="reviews_tab" onclick="toggle_profile_page('reviews_tab')">
										<span style="font-size:12px; color:white; font-weight:bold;"><img src="images/icons/review icon black.png"  width="30px" height="30px"></span>
									 <br><span style="font-size:11px; ">Reviews</span>
									</button>
								</td>
							</tr>
						</table>



			</div>
			</div>
		</div>
		<div class="row"  style="padding-top:20px;">
			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-4 " >
				<div class="panel panel-default">
					<div class="panel-body">

							<B class="redbright" style="margin-left:15px;"><?php echo $profile_user['first_name'].' '.$profile_user['last_name'] ?>'s Profile</B>
							<br>

							<ul class="nav nav-tab nav-stacked" style="padding-left:0px; margin-top: 10px; ">

								<li ng-controller="FullUserCtrl"  style="padding-bottom:3px;font-size:11px;font-weight:bold;"  class="user_profile_tab" id="friends_tab" ng-click="toggle_profile_page('friends_tab')"><a href="#friends" data-toggle="tab" ><B>Friends</B><span  style="color:#BD2532;" class="">  {{friendsCount}}</span></a>
								</li>

								<li style="padding-bottom:3px;font-size:11px;font-weight:bold;" class="user_profile_tab" id="reviews_tab" ng-click="toggle_profile_page('reviews_tab')" ><a href="#reviews" data-toggle="tab" ><B>Reviews</B></a>
								</li>

								<li  ng-controller="favouriteBusinessCtrl" style="padding-bottom:3px;font-size:11px;font-weight:bold;" class="user_profile_tab" id="favourites_tab" ng-click="toggle_profile_page('favourites_tab')"><a href="#favourites" data-toggle="tab"  ><B>Favourites</B><span  style="color:#BD2532;" class="">  {{count}}</span></a>
								</li>

								<li ng-controller="FullUserCtrl" style="padding-bottom:3px;font-size:11px;font-weight:bold;" class="user_profile_tab" id="business__profile_photos_tab" ng-click="toggle_profile_page('business__profile_photos_tab')"><a href="#business_photos" data-toggle="tab" ><B>Photos</B> <span  style="color:#BD2532;" class=""> {{photo_count}}</span></a>
								</li>


								<li ng-controller="AddedBusinessCtrl" style=" margin-left:15px; margin-top:9px; padding-bottom:3px;font-size:11px;font-weight:bold;" class="user_profile_tab"  ><B>Discoveries</B><span  style="color:#BD2532;" class=""> {{count}}</span>
								</li>

							</ul>


					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<?php require_once("Controllers/profile_contact.php"); ?>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<?php require_once("Controllers/social_media.php"); ?>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<h5><B class="redbright">About :</B><B> {{::fullUser.user.first_name+" "+fullUser.user.last_name | uppercase}}</B></h5>
						<p>
							<h5>
							{{::fullUser.user.about_me }}

							</h5>
							<h5 ng-show="fullUser.user.about_me==''">

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

							<div class="tab-pane active" id="reviews_profile_tab">

									

									<div>
									<?php require_once("Controllers/user_profile_reviews.php");?>
									</div>


							</div>

							<!-- reviews -->


							<!-- friends -->

							<div class="tab-pane " id="friends_profile_tab" ng-controller="FullUserCtrl">



								<div class="panel panel-default" style="padding-bottom:10px;" ng-show="friendsCount==0">
								<?php require("Controllers/no_my_friends.php"); ?>
								</div>

								<div ng-show="friendsCount !=0">
								<?php require("Controllers/user_profile/friends.php"); ?>
								</div>

							</div>
							<!-- freinds -->

							<!-- my favourite businesses -->

							<div class="tab-pane " id="favourites_profile_tab" ng-controller="favouriteBusinessCtrl">
								<div class="panel panel-default" style="padding-bottom:10px;">
									<div class="panel-body" ng-show="businessModels.length==0" >
										 <?php require_once("Controllers/no_favourites.php");?>
									</div>
									<div class="panel-body" ng-show="businessModels.length>0" ng-repeat="business in businessModels" style="padding-bottom:0px !important; padding-top:10px !important;">
										 <?php require_once("Controllers/favourites.php");?>
									</div>

								</div>
							</div>
							<!-- my favourite businesses -->

							<!-- bussiness photos -->

							<div class="tab-pane " id="photos_profile_tab" ng-controller="FullUserCtrl">
								<div id="/photos"></div>
								<div class="panel panel-default">
									<div class="panel-body" ng-show="fullUser.photos.length==0">
										<?php require("Controllers/no_friends_photos.php");?>
									</div>
									<div class="panel-body" ng-show="fullUser.photos.length!=0">
										<?php require("Controllers/business_page/view_photos.php");?>
									</div>

								</div>

							</div>
							<!-- bussiness photos -->



						</div>

			</div>

		</div>
	</div>
	<?php
		}
		 require_once("footer.php");
	 ?>
	 <!--<script src="dist/js/bootstrap.min.js"></script>-->
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
