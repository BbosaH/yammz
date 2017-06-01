<?php
/*Created file business page free to be visited by users before loggin in*/
//require('Controllers/auth/auth.php');
require_once('classes/connector.php');
require_once('classes/db_config.php');
require_once('classes/gstring_funcs.php');

$conn = new connector();
$my_page="not_owner";
if(isset($_GET['current_business_id'])){
	$business_id=gStringId($_GET['current_business_id']);
	//echo("The business id is ".$business_id);
	//$_SESSION['business_id']=$business_id;
	$business=$conn->getBusinessOfId($business_id,true);
	$business_events = $conn->getEventsOfBusiness($business_id);
	// $working_hours =$conn->getWorkingHoursOfBusiness($business_id);
	$rate = $business['good'];
	$price =$business['cost'];
	//$my_page='not_owner';
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

	//echo json_encode($business);
	//echo json_encode($categories);
	//echo json_encode($subcategories);

	$alreadyFavourites= $conn->getAll("SELECT * FROM business_favorite WHERE business_id='".$business_id."'");

	 $favouritetoggle=0;

    if(empty($alreadyFavourites))
    {
    	 $favouritetoggle=0;

    }else
    {
    	foreach ($alreadyFavourites as $alreadyFavourite) {
    		# code...
    		$favouritetoggle=1;

    	}
    }

    $alreadyFollows = $conn->getAll("SELECT * FROM business_follower WHERE  business_id='".$business_id."' ");
    $toggle=0;
    if(empty($alreadyFollows))
    {
    	 $toggle=0;

    }else
    {
    	 $toggle=1;
    }

    $user_business_rating = $conn->getAll("SELECT * FROM user_business_rating WHERE  business_id='".$business_id."' ");
    if(!empty($user_business_rating))
    {
    	$ratee = $user_business_rating[0]['good'];
    	$pricee = $user_business_rating[0]['cost'];

    }else
    {
    	$ratee =$rate;
    	$pricee=$price;
    }


?>
		<html lang="en">
		<?php require('imports.php'); ?>
		<style type="text/css">

			.badge-background {
			background-color: #E0DFE4;
			}

		
		.modal2 {
		    position: fixed;
		    /*top: 0;*/
		    right: 0;
		    bottom: 0;
		    left: 0;
		    z-index: 1050;
		    display: none;
		    overflow: hidden;
		    -webkit-overflow-scrolling: touch;
		    outline: 0;
		}
		.modal-dialog{
			width: 65%;
		}
		.modal-content{border-radius: 0px;}
	</style>
			<body style="background-color:#E9EAEE;" ng-app="home">
				<?php require('unlogged_header.php');?>

				<div class="container" ng-controller="FullBusinessCtrl">


				<input type="hidden" ng-model="business_id" ng-init="business_id='<?php echo $business_id ?>'">
				
				<input type="hidden" ng-model="date_created" ng-init="date_created='<?php echo time();?>'" >

				<input type="hidden"  ng-init="favouritetoggle='<?php echo $favouritetoggle; ?>'" />
				<input type="hidden"  ng-init="toggle='<?php echo $toggle; ?>'" />

					<div class="row" style="padding-left:17px; padding-right:17px">
						<?php

						//include("Controllers/business_page/banner/banner_part.php"); ?>
	<!--  banner part cmon //////////////////////////********************888/************888
						-->
						<script>
							$(function(){
								$('.business_profile_cover_photo').css({
									'background':"transparent url('<?php echo $business['banner'];  ?>') no-repeat top center fixed",
									'-webkit-background-size':'cover',
									'-moz-background-size':'cover',
									'-o-background-size':'cover',
									'background-size':'100%'

								});
							});

						</script>
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 img-responsive business_profile_cover_photo "  style="width:1135; height:390; padding-left:10px">

							<div style="background-color:rgba(0,0,0,0.3) ; width:1135px ;height:390px; border-radius: 0px; z-index: 100px; position: absolute; left: 0px;
							 									 top: 00px;"></div>

						<input type="hidden" id="storebiz" value="<?php echo $business_id; ?>"/>
									<div class="row" style="padding-top:220px;">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<table>
												<tr >
													<td>
														<a class="btn" onclick="location.reload();" style="height:40px" >
															<span style="color:#FFFFFF;font-size:30px;">
																<B>
																	 <table>
																		 <tr>
																			<td><span style="color:#FFFFFF;font-size:30px;"><B><?php echo $business['name'] ?></B></span></td>
																			<td ng-show="FullBusiness.isclaimed==1"><div style="color:#901C25;font-size:31px;margin-left:10px;" class="icon icon-shield"></div></td>
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
															<span style="color:#FFFFFF;font-size:15px;padding-left:0px;"><?php echo $business['address'] ?><span>
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
						<a type="btn" style="background-color:#231E1A;width:77; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle ">
							<table style="background-color:#231E1A;">
								<tr ng-show="favouritetoggle==0" onclick="showModal()">
									<td >
										<div style="font-size:20px;margin-left:15px;color:#D0CCC9;margin-top:1px;" class="icon icon-book86"></div>
										<div style="height:4px;"></div>
										<span style="font-size:11px;padding-bottom:0px;color:#D0CCC9">Favourites</span>
									</td>
								</tr>
								<tr ng-show="favouritetoggle==1" >
									<td >
										<div style="font-size:20px;margin-left:15px;color:#BD2532;margin-top:1px;" class="icon icon-book86
										"></div>
										<div style="height:4px;"></div>
										<span style="font-size:11px;padding-bottom:0px;color:#D0CCC9">Favourites</span>
									</td>
								</tr>
							</table>
						</a>
					</span>
					<span>
						<a type="btn" style="background-color:#231E1A;width:77px; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle ">

							<table style="background-color:#231E1A;">
								<tr ng-show="toggle==0" onclick="showModal()">
									<td>
										<div style="font-size:20px;margin-left:15px;color:#D0CCC9;margin-top:1px;" class="icon icon-add182"></div>
										<div style="height:4px;"></div>
										<span style="font-size:11px;padding-bottom:0px;color:#D0CCC9;margin-left:10px;">Follow</span>
									</td>
								</tr>
								<tr ng-show="toggle==1" onclick="showModal()">
									<td>
										<div style="font-size:20px;margin-left:15px;color:#BD2532;margin-top:1px;" class="ion ion-android-checkmark-circle"></div>
										<div style="height:4px;"></div>
										<span style="font-size:11px;padding-bottom:0px;color:#D0CCC9;margin-left:0px;">Following</span>
									</td>
								</tr>
							</table>

						</a>
					</span>
					<span>
							<div  style="background-color:#231E1A;width:80px; color:#D0CCC9; border-color:grey; margin-left:0px;  margin-top:1px;" class=" fileUpload btn btn-default noborderStyle ">


												<div style="font-size:20px;margin-left:0px;color:#D0CCC9;margin-top:1px;" class="icon icon-medical109" onclick="showModal()" ></div>

												<div  style="font-size:11px;margin-bottom:-2px;color:#D0CCC9;padding-top: 5px;" onclick="showModal()">Add Photo</div>
												<!--  <input  type="file"  name="business_image" class="upload" file-model="myFile"
												  onchange="angular.element(this).scope().uploadBusinessFile(<?php echo $_SESSION['SESS_MEMBER_ID'];?>,<?php echo $business_id; ?>,this,'not_owner',<?php echo $pricee ;?>,<?php echo $ratee;?>)" /> -->


							</div>
				    </span>
												<span>
													<a type="btn" style="background-color:#231E1A;width:80px; color:#D0CCC9; margin-left: -10px; border-color:grey;" class="btn btn-default noborderStyle ">
														<table style="background-color:#231E1A;">
															<tr>
																<td>
																	<div style="font-size:20px;margin-left:15px;color:#D0CCC9;margin-top:1px;" class="icon icon-download43" onclick="showModal()"></div>
																	<div style="height:4px;"></div>
																	<span style="font-size:11px;padding-bottom:0px;margin-left:3px;color:#D0CCC9;" onclick="showModal()">Message</span>
																</td>
															</tr>
														</table>
													</a>
												</span>
												<span>
													<a type="btn" style="background-color:#231E1A;width:80px; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle "
													>
														<table style="background-color:#231E1A;">
															<tr>
																<td>
																	<div style="font-size:20px;margin-left:15px;color:#D0CCC9;margin-top:1px;" class="icon icon-carnival48" onclick="showModal()"></div>
																	<div style="height:4px;"></div>
																	<span style="font-size:11px;padding-bottom:0px;margin-left:7px;color:#D0CCC9;" onclick="showModal()">Events</span>
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
																	<div style="font-size:20px;margin-left:15px;color:#D0CCC9;margin-top:1px;" class="icon icon-sharing6" onclick="showModal()"></div>
																	<div style="height:4px;"></div>
																	<span style="font-size:11px;padding-bottom:0px;margin-left:10px;color:#D0CCC9;" onclick="showModal()">Share</span>
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
							</div>
								<br/>

<!--  new row -->
		<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="panel panel-default" style="background-color:#231E1A;">
						<div class="panel-body">
							<h4 >
								<span  style="color:white; margin-top:-5px;">Help us Rate this Business </span>&nbsp;&nbsp;&nbsp;
								<span style="padding-top:3px; width:100px;">
								<uib-rating class="redbright" style="font-size:40px;"   ng-model="rate" max="max" read-only="isReadonly" on-hover="hoveringOver(value)" onclick="showModal()" on-leave="overStar = null" titles="['one','two','three']" aria-labelledby="default-rating"></uib-rating>
              					<span class="label" ng-class="{'label-warning': percent<30, 'label-info': percent>=30 && percent<70, 'label-success': percent>=70}" ng-show="overStar && !isReadonly">{{overStar}}</span>
              
								</span>
							</h4>
						</div>
					</div>

				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="panel panel-edfault" style="background-color:#231E1A;">
						<div class="panel-body">
							<h4> <span  style="color:white; ">Help us Price this Business</span> &nbsp;
							<uib-rating style="color:#00cc00; font-size:40px;" ng-model="price" max="5" state-on="'ion-social-usd'" state-off="'ion-social-usd-outline'" read-only="isReadonly" on-hover="hoveringOverPrice(value)" 
							onclick="showModal()" on-leave="overPrice = null" titles="['one','two','three']" aria-labelledby="custom-icons-1"></uib-rating>
             				 <span class="label" ng-class="{'label-warning': percent<30, 'label-info': percent>=30 && percent<70, 'label-success': percent>=70}" ng-show="overPrice && !isReadonly">{{overPrice}}</span>
							<h4>
						</div>

					</div>
				</div>
			</div>
<!----------cccccccccccccccccccccccccc-------->

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
									<div class="row" >
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<span style="font-size:23;color:#DDDDDD;margin-top:0px;" class="icon icon-three-dots-more-indicator pull-right"></span>
											<div style="height:0px;"></div>
											<B >DESCRIPTION <B>
										</div>
									</div>
									<div class="row" >
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" >
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
									<div style="height:0px;"></div>
									<p ng-show="FullBusiness.isclaimed==0" class="redbright"><B><a class="redbright" href="#" style="text-decoration:none;" onclick="showModal()" >EDIT BUSINESS INFO</a><B></p>
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
						<ul class="nav nav-pills">
							<table style="font-size:12;">
								<tr>
									<td style="width:50px;">
										<li class="home_side_tab" onclick="showModal()">
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
											<li class="home_side_tab" onclick="showModal()">
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
											<li class="home_side_tab" onclick="showModal()">
												<a class="btn black2" href="#business_followers_tab" data-toggle="tab">
													<span class=""><B>{{follower_number}}</B></span><br/>
													<span class="">Followers</span>
												</a>
											</li>
										</td>

									<td>
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
					<h6 > <!-- <a class="redbright">view All</a> --></h6>

<!-- /business event-->
									<?php } //require("Controllers/business_event.php"); ?>

								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-body">
									<span style="font-size:23;color:#DDDDDD;margin-top:0px;" class="icon icon-three-dots-more-indicator pull-right"></span>
									<div style="height:0px;"></div>
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
											<div style="height:0px;"></div>

											<p class="">WORKING HOURS</p>

										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="padding-left:25px;">
											<!-- <B>Working hours <B>
											 -->
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
						<!-- <?php //require("Controllers/business_page/business_page_controller.php");?>
 -->
						<!-- included business controller codes -->

						 <div class="tab-content" >


	<div class="tab-pane active " id="business_reviews_tab">
					<div id="/business_reviews_tab"></div>
         
					<div>

						<!-- <?php //require("Controllers/business_page/business-page_default-option.php");?> -->

						<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
	
	<input type="hidden" ng-model="photo_toggle" ng-init="photo_toggle=0"/>
	<table>
		<tr >
			<td width="118px;">
				<span>
					<img ng-if="photo_names.length==0" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>0" ng-model="photo_names[photo_names.length-1]" ng-src="{{photo_names[photo_names.length-1]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
			<td width="118px;">
				<span>
					<img ng-if="photo_names.length <= 1" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>1" ng-src="{{photo_names[photo_names.length-2]}}" width="100px" height="98px" style="border-radius:4px;">

				</span>
			</td>
			<td width="118px;">
				<span>
					<img ng-if="photo_names.length <= 2 " src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>2" ng-src="{{photo_names[photo_names.length-3]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
			<td>
				<span>
					<img ng-if="photo_names.length<=3" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>3" ng-src="{{photo_names[photo_names.length-4]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
		</tr>
		<tr ><td height="15px"></td></tr >
		<tr >
			<td width="115px;">
				<span>
					<img ng-if="photo_names.length<=4" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>4" ng-src="{{photo_names[photo_names.length-5]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
			<td width="115px;">
				<span>
					<img ng-if="photo_names.length<=5" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>5" ng-src="{{photo_names[photo_names.length-6]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
			<td width="115px;">
				<span>
					<img ng-if="photo_names.length<=6" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>6" ng-src="{{photo_names[photo_names.length-7]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
			<td >
				<span>
					<img ng-if="photo_names.length<=7" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>7" ng-src="{{photo_names[photo_names.length-8]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
		</tr>
	</table>
	<h1></h1>

						<div class="panel panel-default">
								<form action="#"style="margin-bottom:0px;" method="post" >

									<div style="height:5px;"> </div>
									<span class="form-group" >
										<textarea class="form-control"  ng-model="details" ng-init="details=''" rows="4" id="user_post_details_3" style="margin-left:5px;background-color:#D9D9D9;width:445px;resize:none;font-weight: lighter;" placeholder="Write a review..."></textarea>


									</span>

									<div style="height:7px;"></div>
									<span style="font-size:11px;"></span>
									
 							<div class="row">
										<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12">
											<div>
												<div>
													<span id="image_attach" style="font-size:16px;margin-left:6px; cursor:pointer;" class="icon icon-camera" onclick="showModal()">												
													</span>
										   			 <span ng-show="photo_toggle==0 && details.length==0" style="font-size:11px;font-weight:bold;margin-left:6px; margin-top:-5px;">Attach a Photo to Post
										   			 </span>
										   			 <span  ng-show="photo_toggle==1"  style="font-size:11px;margin-top:-10px;font-weight:bold;margin-left:6px; ">Photo Uploaded
										   			 <i class="ion ion-checkmark-circled" style="color:#00cc00;margin-left:20px;font-size:20px;margin-top:4px;"></i>
										   			 </span>
												</div>
												<div>
													<input type="file" id="post_biz_file_attach" style="width:80px;height:0px" name="post_biz_file_attach" class="hidden" file-model="myFile"  />
												</div>
											</div>

											<span class="badge pull-right" style="background-color:#CB525B;margin-right:6px;margin-top:-20px;">
												<button ng-disabled="photo_toggle==0 && details.length==0" type="button" class="post_review" post-random-feed value="post_business" style="background-color:#CB525B;border:0px;" businessid="{{FullBusiness.business.id}}" userid="{{user_id}}" randrate="0" randprice="0" randdate="{{date_created}}" randdetails={{details}} page="business_page_3_" onclick="showModal()">Post</button>
											</span>
											<div style="height:10px;"></div>
										</div>
									</div>
								</form>
							</div>

		<div id="business_page_3_posters" ng-controller="RandomBusinessCtrl" >
		
		<div ng-controller="UserWallFeedsCtrl">
			<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo 0  ?>'" />
	        <input type="hidden" ng-model="picker_type" ng-init="picker_type='business_profile'" />
			<input type="hidden" ng-model="picker_business_id" ng-init="picker_business_id='<?php echo $business_id ?>'" />
			
			<div ng-if="UserMyWallFeeds.length>0">
				<div ng-include="'Controllers/News_feed/free_view_reviews.php'" ></div> 
			</div>
			<div ng-if="defaults==1">
				<div ng-include="'Controllers/News_feed/no_business_review.php'" ></div> 
			</div>
		 </div>

		</div>


</div>
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
   <!-- {{FullBusiness.isclaimed}} -->
	<div ng-if="FullBusiness.isclaimed==1">
	<div ng-include="'Controllers/add_business.php'" ></div>
	</div>
	<!-- <div ng-if="FullBusiness.isclaimed==0"> -->
	 <!--  <div ng-include="'Controllers/claim.php'" ></div> -->

	 <div class="panel panel-default noborderStyle">					
	<div class="panel-body"style="padding-left:40px;">
		&nbsp;
		
		<a type="button" onclick="showModal()" ng-if="my_business_status=='Deactivated'" ng-href="#" class="btn btn-default btn-block btn-primary"  style="background-color:#BE2633; padding-top:15px; border-radius:10px; border-color:#BE2633; height:70px; width:280px">
			<span ><img src="images/icon_files_white/claim business icon.png" width="40px"/></span>&nbsp;&nbsp;
			<span style="font-size:14px; color:#E5DDDD; padding-top:20px;"><B>Claim your business</B> </span>
		</a>

		<a type="button" onclick="showModal()" ng-if="my_business_status == 'Pending'" ng-href="#" class="btn btn-default btn-block btn-primary"  style="background-color:#BE2633; padding-top:15px; border-radius:10px; border-color:#BE2633; height:70px; width:280px">
			<span ><img src="images/icon_files_white/claim business icon.png" width="40px"/></span>&nbsp;&nbsp; 
			<span style="font-size:14px; color:#E5DDDD; padding-top:20px;"><B>Pending Admin Approval</B> </span>
		</a>

		<h6></h6>
		
		<p style="margin-left:50px;">Do you work here?</p>
	</div>
</div>

	<!-- </div> -->

	 <div class="panel panel-default" style="border:none; border-radius:0px" ng-controller="ReviewCtrl">
							<div class="panel-body">
								<p class="redbright"><B>Review of the day</B></p>


									<div class="row">
		
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<table>
					<tr>
						<td style="vertical-align:top;">
							<img ng-src="{{mymodel.business_picture}}" class="img-circle" style="width:45px;height:45px"  alt="Responsive image">
						</td>
						<td style="padding-left:6px;" >
							
							<span>


							<h6 ng-show="page=='index'"><B><a href="" style="text-decoration:none" class="black">{{mymodel.person_name}}</a></B> Made a review on <B><a href="" style="text-decoration:none"class="black">{{mymodel.business_name}}</a></B></h6>
							

							<span ng-show="page!='index'">
							<h6 ng-show="isOwner==true"><B><a href="user_profile.php?id={{mymodel.person_id}}" style="text-decoration:none" class="black">{{mymodel.person_name}}</a></B> Made a review on <B><a href="business_page_owners_view.php?current_business_id={{mymodel.business_id}}" style="text-decoration:none"class="black">{{mymodel.business_name}}</a></B></h6>	
							
							
							<h6 ng-show="isOwner==false"><B><a href="#" style="text-decoration:none" class="black" onclick="showModal()">{{mymodel.person_name}}</a></B> Made a review on <B><a href="business_page_free.php?current_business_id={{mymodel.business_id}}" style="text-decoration:none"class="black">{{mymodel.business_name}}</a></B></h6>	
							</span>
							

							

								
							<div ng-show="mymodel.rate>-1 && mymodel.price>-1 ">

									<span> 
											<span>
											<i ng-repeat="star in mymodel.ratings" class="ion ion-ios-star redbright" style="font-size:25px;"/>
											</span>

											<span style="margin-left:-4px;">
										
											<i ng-repeat="star in mymodel.noratings" class="ion ion-ios-star-outline redbright" style="font-size:25px;"/>
											</span>
											

										
									</span>
									&nbsp;&nbsp;
									<span> 

											
											<span>
											<i ng-repeat="star in mymodel.pricings" class="ion ion-social-usd " style="color:#00cc00; padding-left:8px; font-size:20px;"/>
											</span>
											
											<span style="margin-left:-4px;">
											
											<i ng-repeat="usd in mymodel.nopricings" class="ion ion-social-usd-outline " style="color:#00cc00; padding-left:8px; font-size:20px;" />
											</span>
										
									</span>

								</div>
								<div ng-show="mymodel.rate==-1 && mymodel.price==-1 ">
										
							</div>


							
							<h6>
								{{mymodel.content}} 
							
								
							</h6>
							
							</span>
						</td>
					</tr>
				</table>
			
			</div>
		</div>
							</div>
						</div>

			<div class="panel panel-default" ng-controller="EventCtrl">
							<div class="panel-body">
								<p class="redbright">Latest Events</P>

									<!-- <div ng-include="'Controllers/latest_events.php'"></div> -->

								<h6 > <!-- <a class="redbright">view All</a> --></h6>
							</div>
			</div>

			<div class="panel panel-default" ng-controller="GossipCtrl">
							<div class="panel-body">
								<p class="redbright">Latest Gossip </p>
								<?php //require("Controllers/latest_gossip.php");?>
								<!-- <div ng-include="'Controllers/latest_gossip.php'"></div> -->
								<h6 > <!-- <a class="redbright">view All</a> --></h6>

							</div>
						</div>

			<div class="panel panel-default" ng-controller="RandomBusinessCtrl">
				<div class="panel-body">
					<p class="redfaint">Suggested Places to Follow </p>

					<div ng-include="'Controllers/free_search_suggested_places_to_follow.php'"></div>

				</div>
			</div>


			<?php require("Controllers/free_business_ads.php");?>
</div>
					</div>



	</div>

  <div class="col-lg-9 col-sm-9 col-md-9 col-xs-8 " style="padding-top:2px;">

	 <div class="tab-pane active " id="business_photos_tab">
								<div id="/business_photos_tab"></div>
								<div class="panel panel-default">
									<div class="panel-body" ng-show="photo_count==0">
										<?php require("Controllers/no_friends_photos.php");?>
									</div>
									<div class="panel-body" ng-show="photo_count!=0" style="margin-top:-25px;">
										<?php require("Controllers/business_page/view_business_photos.php");?>
									</div>

								</div>
	</div>
	<div class="tab-pane active " id="business_followers_tab">

		<div id="/business_followers_tab"></div>

						    	<div class="panel panel-default" ng-show="follower_number==0">

									<?php require("Controllers/no_followers.php"); ?>
								</div>

						    	<div ng-show="follower_number!=0">

								<?php require("Controllers/business_page/business_followers.php"); ?>
		</div>

	</div>

	<div class="tab-pane active " id="business_events_tab">

								<div id="/business_followers_tab"></div>

						    	<div class="panel panel-default">

									<?php require("Controllers/no_events.php"); ?>

								</div>


		</div>

	</div>

</div>
</div>



						<!-- included business controller codes -->

					</div>


				</div>
				<?php require("footer.php"); ?>

				<div id="myModal" class="modal2 fade" tabindex="-1" >
					    <div class="modal-dialog" style="border-radius: 0px;">
					        <div class="modal-content">
					            <div class="modal-body">
					            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					                <p></p>
					                <div class="text-center" style="margin-top: 60px;">
					                	<h4 style="font-weight: bold;color: #000;">See more and do more on this page</h4>
					                	<h5>Send Messages, Write a review, rate, like, comment and share. if you don't have a Yammzit account, you can <br> create one to do much more.</h5>

					                	<div style="margin-top: 25px;">
					                		<a href="signup.html" class="btn" style="background-color:#BD2532;color:#ffffff;width:120px;margin-right: 20px;border-radius: 0px;">Sign Up</a> 
					                		<a href="login.html" class="btn" style="width:120px;border-radius: 0px;color:#474B4F;background-color: #E9EAEE;">Log In</a>
					                	</div>
					                </div>
					                <br>
					            </div>
					        </div>
					    </div>
					</div>

					<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
					<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
					<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
					
					<script type="text/javascript" src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>
					


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

                    <script type="text/javascript">
						// window.setTimeout(function() {
						//    $("#myModal").modal('show');
						// }, 3000);
						var showModal = function()
						{
							$("#myModal").modal('show');
						}
					</script>
</body>
			</body>
		</html>
<?php
}
?>
