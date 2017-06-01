<?php
//
require('Controllers/auth/auth.php');
require_once('classes/connector.php');
require_once('classes/db_config.php');
require_once('classes/gstring_funcs.php');

$conn = new connector();
if(isset($_GET['current_business_id'])){
	//session_start();
	$business_id=gStringId($_GET['current_business_id']);
	$_SESSION['business_id']=$business_id;
	$business=$conn->getBusinessOfId($business_id,true);

	$business_events = $conn->getEventsOfBusiness($business_id);

	//$working_hours =$conn->getWorkingHoursOfBusiness($business_id);
	
	$rate = $business['good'];
	$price =$business['cost'];
	//echo json_encode($working_hours);
	if(strcmp($business['logo'],"")==0 ||strcmp($business['logo'],'null')==0)
	{
		$business['logo']=BaseImageURL."uploads/deflogo.png";

	}else
	{
		$business['logo']=BaseImageURL.$business['logo'];
	}

	if(strcmp($business['banner'],"")==0 ||strcmp($business['banner'],'null')==0)
	{
		//$business['banner']="http://localhost:89//yammzit/admin/Theme/uploads/defbanner.png";
		$business['banner']=BaseImageURL."uploads/defphoto.jpg";
	}else
	{
		$business['banner']=BaseImageURL.$business['banner'];
	}
	if(strcmp($business['phone_1'],"")==0 ||strcmp($business['phone_1'],'null')==0)
	{
		$business['phone1'] ="________________________________";
	}
	if(strcmp($business['email'],"")==0 ||strcmp($business['email'],'null')==0)
	{
		$business['email'] ="_______________________________";
	}
	if(strcmp($business['website'],"")==0 ||strcmp($business['website'],'null')==0)
	{
		$business['website'] ="________________________________";
	}
	if(strcmp($business['location'],"")==0 ||strcmp($business['location'],'null')==0)
	{
		$business['location'] ="_______________________________";
	}
	$subcategory_ids =$conn->getAll("SELECT sub_category_id FROM business_category WHERE business_id='".$business_id."'");
	//echo json_encode($subcategory_ids);
	$categories=array();
	$subcategories=array();
	foreach($subcategory_ids as  $subcategory_id)
	{
		$subcategory = $conn->getSubCategoryOfId($subcategory_id['sub_category_id']);
		if($subcategory!=null || $subcategory!='')
		{
			$category_id=$subcategory['category_id'];
			$category =$conn->getCategoryOfId($category_id);
			array_push($categories,$category);
			array_push($subcategories,$subcategory);
		}else
		{
			array_push($categories,'null');
			array_push($subcategories,'null');
		}

	}

	$user_business_rating = $conn->getAll("SELECT * FROM user_business_rating WHERE user_id='".$_SESSION['SESS_MEMBER_ID']."' AND business_id='".$business_id."' ");
    if(!empty($user_business_rating))
    {
    	$ratee = $user_business_rating[0]['good'];
    	$pricee = $user_business_rating[0]['cost'];

    }else
    {
    	$ratee =$rate;
    	$pricee=$price;
    }

	//echo json_encode($business);
	//echo json_encode($categories);
	//echo json_encode($subcategories);

?>
		<html lang="en">
		<?php require('imports.php'); ?>
		<style>
			.badge-background {
			background-color: #E0DFE4;
			}

		</style>
			<body style="background-color:#E9EAEE;" ng-app="home" >
				<?php require('Controllers/Logged_headerb.php');?>

				<div class="container" ng-controller="FullBusinessCtrl">
				<input type="hidden" ng-model="business_id" ng-init="business_id='<?php echo $business_id; ?>'" >
				<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo $_SESSION['SESS_MEMBER_ID'];?>'" >
				<input type="hidden" ng-model="date_created" ng-init="date_created='<?php echo time();?>'" >


					<div class="row" style="padding-left:17px; padding-right:17px">
							<h1 ng-bind="mybusiness_id"></h1>
						<?php //include("Controllers/business_page/banner/banner_part_business_owner.php"); ?>
	<!--  banner part cmon //////////////////////////********************888/************888
						-->
						<script>
						$(function(){
							$('.business_profile_cover_photo').css({
								'background':"transparent url('<?php echo $business['banner']; ?>') no-repeat top center fixed",
								'-webkit-background-size':'cover',
								'-moz-background-size':'cover',
								'-o-background-size':'cover',
								'-o-background-size':'cover',
								'background-size':'100%'

							}); 
							
						});

						</script>
						<!--<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 img-responsive " back-img="{{FullBusiness.business.banner}}"  style="width:1135; height:390; padding-left:10px">-->
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 img-responsive business_profile_cover_photo " style="width:1135; height:390; padding-left:10px">
								<div style="background-color:rgba(0,0,0,0.7) ; width:1135px ;height:390px; border-radius: 0px; z-index: 100px; position: absolute; left: 0px;
							 									 top: 00px;"></div>
						
								
									<div class="row" style="padding-top:220px;" ng-cloak>
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<table>
												<tr >
													<td>
														<a class="btn" href="business_page_owners_view.php" style="height:40px" >
															<span style="color:#FFFFFF;font-size:30px;">
																<B>
																	 <table>
																		 <tr>
																			<td><span style="color:#FFFFFF;font-size:30px;"><B><?php echo $business['name']; ?></B></span></td>
																			<td ng-if="FullBusiness.isclaimed==1" ><div style="color:#901C25;font-size:31px;margin-left:10px;" class="icon icon-shield"></div></td>
																		  </tr>
																	 </table>
																 </B>
															</span>
														</a>
													</td>
												</tr>
												<tr>
													<td>
														<a class="btn" href="business_page_owners_view.php" >
															<span style="color:#FFFFFF;font-size:15px;padding-left:0px;"><?php echo $business['address']; ?><span>
														</a>
													</td>
												</tr>

											</table>
											<p style="padding-left:13px;color:#FFFFFF;"> Category: <?php
											if(empty($categories) || empty($categories[0]))
											{
												echo "No category";
											}else{
											 echo $categories[0]['name'];
											  }
											 ?> > <?php
											 if(empty($subcategories) || empty($subcategories[0]))
											 {
												echo "No subcategory";
											 }else{
											 echo $subcategories[0]['name'];
											 }
											   ?>  &nbsp;&nbsp;&nbsp; Category:
											   <?php
											   if(empty($categories) || empty($categories[1]))
											{
												echo "No category";
											}else{
											 echo $categories[1]['name'];
											  }
											     ?> > <?php
											     if(empty($subcategories) || empty($subcategories[1]))
											 {
												echo "No subcategory";
											 }else{
											 echo $subcategories[1]['name'];
											 }
											  ?>  &nbsp;&nbsp;&nbsp; Category:
											  <?php
											   if(empty($categories) || empty($categories[2]))
											{
												echo "No category";
											}else{
											 echo $categories[2]['name'];
											  }
											   ?> > <?php
											    if(empty($subcategories) || empty($subcategories[2]))
											 {
												echo "No subcategory";
											 }else{
											 echo $subcategories[2]['name'];
											 }
											    ?></p>
											<div class="row" style="padding-left:12px; ">
												<span>

													<a type="btn" style="background-color:#231E1A;width:80px;height:53px; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle ">

														<table style="background-color:#231E1A;">
															<tr>
																<td>

																	<div style="font-size:14px;font-weight:bold;color:#D0CCC9;margin-left:30px;margin-top:5px;"> {{follower_number}}</div>

																	<div style="font-size:11px;padding-bottom:0px;color:#D0CCC9;margin-left:6px;margin-top:4px;">Followers</div>
																</td>
															</tr>
														</table>

													</a>
												</span>
												<span>
															<div  style="background-color:#231E1A;width:80px; color:#D0CCC9; border-color:grey; margin-left:0px;  margin-top:1px;" class=" fileUpload btn btn-default noborderStyle ">


																	<div style="font-size:20px;margin-left:0px;color:#D0CCC9;margin-top:1px;" class="icon icon-medical109"></div>

																	<span  style="font-size:11px;padding-bottom:0px;color:#D0CCC9; padding-top:2px;">Add Photo</span>
																	 <input  type="file"  name="business_image" class="upload" file-model="myFile"
																	  onchange="angular.element(this).scope().uploadBusinessFile(<?php echo $_SESSION['SESS_MEMBER_ID'];?>,<?php echo $business_id; ?>,this,'owner',<?php echo $pricee ;?>,<?php echo $ratee;?>)" />


															</div>
												</span>
												<span>
													<a type="btn" style="background-color:#231E1A;width:80px; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle ">
														<table style="background-color:#231E1A;">
															<tr>
																<td>
																	<div style="font-size:20px;margin-left:15px;color:#D0CCC9;margin-top:1px;" class="icon icon-download43"></div>
																	<div style="height:4px;"></div>
																	<span style="font-size:11px;padding-bottom:0px;margin-left:3px;color:#D0CCC9;">Message</span>
																</td>
															</tr>
														</table>
													</a>
												</span>
												<span>
													<a type="btn" style="background-color:#231E1A;width:80px; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle "
													onclick="toggleBusinessPage('events_tab')">
														<table style="background-color:#231E1A;">
															<tr>
																<td>
																	<div style="font-size:20px;margin-left:15px;color:#D0CCC9;margin-top:1px;" class="icon icon-carnival48"></div>
																	<div style="height:4px;"></div>
																	<span style="font-size:11px;padding-bottom:0px;margin-left:7px;color:#D0CCC9;">Events</span>
																</td>
															</tr>
														</table>
													</a>
												</span>

												<span>
													<a type="btn" style="background-color:#231E1A;width:80px; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle ">
														<table style="background-color:#231E1A;">
															<tr>
																<td>
																	<div style="font-size:20px;margin-left:15px;color:#D0CCC9;margin-top:1px;" class="icon icon-sharing6"></div>
																	<div style="height:4px;"></div>
																	<span style="font-size:11px;padding-bottom:0px;margin-left:10px;color:#D0CCC9;">Share</span>
																</td>
															</tr>
														</table>
													</a>

												</span>
																<span>
													<button type="submit" style="background-color:#231E1A; height:54px; color:#D0CCC9; border-color:grey;" class="btn btn-default  noborderStyle">
														<table>
															<tr>
																<td><div style="height:13px; color:#D0CCC9;font-size:13;">Business Rating&nbsp;&nbsp;</div></td>
																<td>
																	<?php for ($x = 0; $x < $rate; $x++) { ?>
																		<i class="ion ion-ios-star redbright" style="font-size:25px;"/>
																		<?php }?>
																	<?php for ($x = 0; $x < 5-$rate; $x++) { ?>
																<i class="ion ion-ios-star-outline redbright" style="font-size:25px;" />
				

																	<?php }?>
																</td>
															</tr>
														</table>

													</button>
												</span>
												<span>
													<button type="submit" style="background-color:#231E1A; color:#D0CCC9; height:54px; border-color:grey;" class="btn btn-default noborderStyle">
														<table>
															<tr>
																<td><div style="height:13px; color:#D0CCC9;font-size:13;">Price Rating&nbsp;&nbsp;</div></td>
																<td>
																	<?php for ($x = 0; $x < $price; $x++) { ?>
																<i class="ion ion-social-usd " style="color:#00cc00;  padding-left:8px;font-size:20px;" />
																<?php }?>
			
																	<?php for ($x = 0; $x < 5-$price; $x++) { ?>
				
																	<i class="ion ion-social-usd-outline " style="color:#00cc00;  padding-left:8px;font-size:20px;" />
																<?php } ?>
																</td>
															</tr>
														</table>
															
													</button>
												</span>

											</div>
										</div>
									</div>
								</div>
<!----------cccccccccccccccccccccccccc-------->
					</div>
					<div style="height:30px;"></div>
					<div class="row">
						<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<img src="<?php echo $business['logo']; ?>" style="margin-left:27px;margin-right:35px;" width="180px" height="180px" class="img-circle " />
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<span style="font-size:23;color:#DDDDDD;margin-top:0px;" class="icon icon-three-dots-more-indicator pull-right"></span>
											<div style="height:13px;"></div>
											<B>DESCRIPTION <B>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="">
											<h6 ng-show="FullBusiness.business.description==''"><p>
												Responding to positive reviews should be easy,right?, it does sound easy but but it's also surprisingly easy to get this wrong
											</p></h6>
											<h6 ng-show="FullBusiness.business.description!=''" ><p>
												{{FullBusiness.business.description}}
											</p></h6>
										</div>
									</div>

								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-body">
	<!-- profile contact -->
									<span style="font-size:23;color:#DDDDDD;margin-top:0px;" class="icon icon-three-dots-more-indicator pull-right"></span>
									<div style="height:13px;"></div>
									<p class="redbright"><B><a class="redbright" href="edit_business_info.php?current_business_id=<?php echo gString($business['id']); ?>" style="text-decoration:none;" >EDIT BUSINESS INFO</a><B></p>
									<hr></hr>
									<div ng-if="FullBusiness.business.phone_1.length || FullBusiness.business.phone_2.length">
										<p><B>PHONE NUMBER<B></p>

										<h6 ng-show="FullBusiness.business.phone_1.length">{{FullBusiness.business.phone_1}}
										</h6>
										<h6 ng-show="FullBusiness.business.phone_2.length && !FullBusiness.business.phone_1.length">{{FullBusiness.business.phone_2}}
										</h6>
										<hr></hr>
									</div>
									
									<div ng-if="FullBusiness.business.location.length">
										<p>LOCATION</p>
										<h6>
											{{FullBusiness.business.location}}
										</h6>
										<hr></hr>
									</div>

									<div ng-if="FullBusiness.business.email.length">
										<p>Email</p>
										<h6>{{FullBusiness.business.email}}</h6>
										<hr></hr>
									</div>

									<div ng-if="FullBusiness.business.website.length">
										<p>WEB LINK</p>
										<h6><!-- <a style="color:black;text-decoration:none;" href="<?php //echo $business['website']; ?>"><?php //echo $business['website'];?></a> -->
										 {{FullBusiness.business.website}}
										</h6>
										<hr></hr>
									</div>
<!-- /end profile contact -->

								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
<!-----reviews photos followers - -->
						<ul class="nav nav-pills" ng-cloak>
							<table style="font-size:12;">
								<tr>
									<td style="width:50px;">
										<li class="home_side_tab" onclick="toggleBusinessPage('reviews_tab')">
											<a class="btn black2 " href="#business_reviews_tab" data-toggle="tab">
												<span class=""><B>{{review_count}}</B></span><br/>
												<span class="">reviews</span>
											</a>
										</li>
									</td>
									<td style="width:20px;">
										<hr style="height:30;width:2; background-color:#EBEAEF;"></hr>
									</td>
										<td style="width:45px;">
											<li class="home_side_tab" onclick="toggleBusinessPage('photos_tab')">
												<a class="btn black2" href="#business_photos_tab" data-toggle="tab">
													<span class=""><B>{{photo_count}}</B></span><br/>
													<span class="">Photos</span>
												</a>
											</li>
										</td>
									<td style="width:20px;">
										<hr style="height:30;width:2; background-color:#EBEAEF;"></hr>
									</td>
										<td style="width:65px;">
											<li class="home_side_tab" onclick="toggleBusinessPage('followers_tab')">
												<a class="btn black2" href="#business_followers_tab" data-toggle="tab">
													<span class=""><B>{{follower_number}}</B></span><br/>
													<span class="">Followers</span>
												</a>
											</li>
										</td>
									<td>
										<hr style="height:30;width:2; background-color:#EBEAEF;"></hr>
									</td>
								</tr>
							</table>
				</ul>



<!-- /end reviews photos followers-->
											<?php //include("Controllers/business_page/reviews_photos_followers.php"); ?>
										</div>

									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-body">
<!-- business event-->
					<p><B class="redbright">EVENTS AT <?php echo $business['name']; ?></B></P>
					<?php  if(empty($business_events)){
					}else{
					?>
					<div class="row">

							<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
								<table>
									<tr>
										<td style="vertical-align:top;">
											<img src="<?php echo $business['logo']; ?>" class="" style="width:55px;height:55px"  alt="Generic placeholder thumbnail Responsive image">
										</td>
										<td style="padding-left:6px;" >


												<?php if(empty($business_events[0])){?>

												<span  style="font-size:12px;"><span class="redbright"><?php echo 'No event' ?></span> <br/>

												</span>

												<?php }else {?>
												<span  style="font-size:12px;"><span class="redbright"><?php echo $business_events[0]['title']; ?></span> <br/>
												<?php echo $business_events[0]['start_date']; ?> -<?php echo $business_events[0]['end_date']; ?><br/>
												<?php echo $business_events[0]['interested_count']; ?> Interested


												</span>
												<?php } ?>
										</td>
									</tr>
								</table>

							</div>
						</div>
						<h1></h1>
						<div class="row">

							<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
								<table>
									<tr>
										<td style="vertical-align:top;">
											<img src="<?php echo $business['logo']; ?>" class="" style="width:55px;height:55px"  alt="Generic placeholder thumbnail Responsive image">
										</td>
										<td style="padding-left:6px;" >


												<?php if(empty($business_events[1])){?>

												<span  style="font-size:12px;"><span class="redbright"><?php echo 'No event' ?></span> <br/>

												</span>

												<?php }else {?>
												<span  style="font-size:12px;"><span class="redbright"><?php echo $business_events[1]['title']; ?></span> <br/>
												<?php echo $business_events[1]['start_date']; ?> -<?php echo $business_events[1]['end_date']; ?><br/>
												<?php echo $business_events[1]['interested_count']; ?> Interested


												</span>
												<?php } ?>
										</td>
									</tr>
								</table>

							</div>
						</div>
					<h6 > <a class="redbright">view All</a></h6>

<!-- /business event-->
									<?php }//require("Controllers/business_event.php"); ?>

								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-body">
									<span style="font-size:23;color:#DDDDDD;margin-top:0px;" class="icon icon-three-dots-more-indicator pull-right"></span>
									<div style="height:13px;"></div>
									<p class="redbright">SOCIAL MEDIA</p>
									<div style="height:10px;"></div>
									<div ng-if="FullBusiness.facebook_link.length">
										<p>Facebook</p>
										<h6><a style="color:black;text-decoration:none;" href="{{FullBusiness.facebook_link}}">{{FullBusiness.facebook_link}}</a></h6>
										<div style="height:10px;"></div>
									</div>
									<div ng-if="FullBusiness.twitter_link.length">

										<p>Twitter</p>
										<h6><a style="color:black;text-decoration:none;" href="{{FullBusiness.twitter_link}}">{{FullBusiness.twitter_link}}</a></h6>
										<div style="height:10px;"></div>
									</div>

									<div ng-if="FullBusiness.instagram_link.length">

										<p>Instagram</p>
										<h6><a style="color:black;text-decoration:none;" href="{{FullBusiness.instagram_link}}">{{FullBusiness.instagram_link}}</a></h6>
										<div style="height:10px;"></div>
									</div>

									<div ng-if="FullBusiness.youtube_link.length"">

										<p>Youtube</p>
										<h6><a style="color:black;text-decoration:none;" href="{{FullBusiness.youtube_link}}">{{FullBusiness.youtube_link}}</a></h6>
										<div style="height:10px;"></div>
									</div>

									
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<span style="font-size:23;color:#DDDDDD;margin-top:0px;" class="icon icon-three-dots-more-indicator pull-right"></span>
											<div style="height:13px;"></div>
											<!-- <B>Working hours <B> -->
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="padding-left:25px;">
											<B>Working hours <B>
											<?php // require("Controllers/working_hours.php"); ?>
											<hr></hr>

											<div class="row">
												<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" >
													<B>More info <B>
													<div ng-repeat="service in FullBusiness.services">
													<?php require("Controllers/more_info.php"); ?>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="padding-left:25px;">

												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
						<?php require("Controllers/business_page/business_page_controller2.php");?>

					</div>


				</div>
				<?php require("footer.php"); ?>

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
<?php
}
?>
