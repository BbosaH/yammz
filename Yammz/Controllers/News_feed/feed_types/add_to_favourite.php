<style>
	/* removing border radius from a panel*/
	.no_border{
		border-radius:0px;
	}
		/* Defining properties of the user profile picture*/
	.img_profile{
		width:50px;
		height: :50px;

	}

	/* Defining properties of the user profile name*/
	.profile_name{
		
		font-weight: bold;
		
	}
	/* Defining properties of the user profile update time*/
	.profile_updte_time{
		font-size: 11px;
		font-weight: bold;
		color:#CFCFCF;

	}
	/*Pushing the profile ndame and date section to the left*/
	.profile_name_section_left{
		margin-left:-3%;

	}
	/* Defining properties of the welcome note text*/
	.welcome_notice{
		font-size: 14px;
		font-weight: bold;
		margin-top:7%;
	}
	.suggested_business_tip_header{
		font-size: 14px;
		font-weight: bold;
		margin-top:2%;
	}
	.post_send_button{
		
		height:20px;
		text-align: center;
		border:0px;
		min-width: 50px;
		 font-weight:bold;
		 background-color:#BD2532; 
		 color:white;
		 font-size: 10px;
		 border-radius:6px;
	}
	.comment_field{
		height:20px;
		border:0px;
		background-color: #E9EAEE;
		border-radius: 0px;
		font-size: 10px;
	}
	.send_button_column{
		margin-left: -5%;
	}
	.search_button_column{
		margin-left: -11%;
	}
	.search_button{
		height:20px;
		text-align: center;
		border:0px;
		min-width: 50px;
		 font-weight:bold;
		 background-color:#BD2532; 
		 color:white;
		 font-size: 10px;
		 border-radius:0px;

	}
	.three_dots{
		font-size:23;
		color:#DDDDDD;
		margin-top:-30%;
		
	}
	.horizontal_line{
		margin-bottom: 4px;
	}
	.business_logo_photo{:
		
		height: 380px;
		width: 70px;
	}
	.price_icon_style{color:#00cc00;margin-right:4px;}
	.business_tip_anchor{

		font-size:11px;
		text-decoration:none;

	}
	.friend_tip_anchor{
		text-decoration:none;
		color:#515151;
		

	}
	.suggested_friend_name_position{
		margin-top:10px;
	}
	.add_friend_button{
		font-size:10px;
		background-color:#E9EAEE;
		min-width:90px;
		margin-left:25%;
		height:20px;
		padding-top:4px;
		border:0px;
		margin-top:7px;
		color:#000;
	}
	.empty_right_side_frame{
		border-top:1px;
		border-left:1px;
		border-bottom:1px;
		border-style: solid;
		border-color:#E0E0E0;
		border-right:0px;
		margin-top: 7px;
		margin-left: 10px;
	}
	.outer_profile_letter{
		width:50px;
		height:50px;
		border-radius:30px;
		background-color:#BD2532;
		color:#ffffff;
	}
	.outer_profile_letter_center{
		margin-left:35%;
		padding-top:17%;
		font-size:23px;
	}
	.inner_profile_letter{
		width:28px;
		height:28px;
		border-radius:15px;
		background-color:#BD2532;
		color:#ffffff;
		margin-top:3px;

	}
	.inner_profile_letter_center{
		margin-left:35%;
		padding-top:20%;
		font-size:11.5px;
	}
	.like_commenting_row{
		margin-left:-1%;
		margin-top: 10px;
	}
	.right_most_top_Outer_badge{
		background-color:#BD2532;
		height:50px;
		border-radius:0px;
		border:0px;
		margin-top:-32%;
		margin-bottom: -95%;
	}
	.right_most_top_inner_badge{
		background-color:#BD2532;
		height:50px;
		border-radius:0px;
		border:0px;
		margin-top:-3%;
		margin-bottom: -95%;
	}
	.badge_icon_position{
		font-size:21px;
		margin-top:85%;
	}
	.discovered_rate_icon_size{
		font-size: 18px;
	}
	.going_filled_buttons{
		background-color:#BD2532;
		color:#ffffff;
		font-size:12px;
		height:20px;
		padding-top:1px;
	}
	.going_un_filled_buttons{
		border-color:#BD2532;
		background-color:#ffffff;
		color:#ffffff;
		font-size:12px;
		height:20px;
		padding-top:1px;
		color: #6A6A6A;
		margin-left: 10px;
		
	}
	.going_un_filled_buttons2{
		border-color:#BD2532;
		background-color:#ffffff;
		color:#ffffff;
		font-size:12px;
		height:20px;
		padding-top:1px;
		color: #6A6A6A;
		margin-left: 0px;

	}
	.right_space{
		margin-right: -7px;
	}
	.tip_aling_top{
		margin-top: 10px;
	}
	.follow_icon{
		margin-left:7px;margin-top:4px;font-size:16px;margin-bottom:5px;color:#B1B1B1;
	}
	.follow_text{
		font-size:10px;color:#7D7D7D;
	}
	.light_text{
		color:#CFCFCF;margin-top:2px;font-size:10px;margin-bottom:0px;
	}
	/*today 28.06.2016*/
	.event_title_name{
		margin-bottom:-40px;
		font-size:16px;
	}

	
</style>
	
		<div class="row">
						<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
						<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
							<div class="badge right_most_top_Outer_badge" >
								 <div class="icon icon-book86 " style="font-size:25px;margin-top:65%;"></div> 
							</div>
						</div>
					</div>
		<!-- End of row with the right most three dots -->

		<!-- Start of row with the user profile photo,name,date, welcome note ,like,comments and commenting field -->
		<div class="row">
			<!-- column with avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space" style="margin-top:-10px;">
				<img ng-src="{{feed.user_avatar}}" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">
				</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-9 col-lg-9 col-sm-9 col-xl-9 col-xs-9 profile_name_section_left">
				
				<p>					
					<span class="profile_name">
										<a style="text-decoration:none;" ng-show="feed.un_enc_user_id == user_id" ng-href="user_profile.php?id={{feed.user_id}}" class="black">
											{{feed.user_name}} 
										</a>
									

										<a style="text-decoration:none;" ng-show="feed.un_enc_user_id != user_id" ng-href="user_profile_3.php?id={{feed.user_id}}" class="black">
											{{feed.user_name}} 
										</a> <span style="font-weight:lighter">added</span> 


										<B> 
										<a ng-show="feed.business_owner_id==feed.un_enc_user_id" ng-href="business_page_owners_view.php?current_business_id={{feed.business_id}}" style="text-decoration:none;" class="black">{{feed.business_name}}</a>


									<a ng-show="feed.business_owner_id!=feed.un_enc_user_id" href="business_page_3.php?current_business_id={{feed.business_id}}" style="text-decoration:none;" class="black">{{feed.business_name}}</a>

									
										<span style="font-weight:lighter">&nbsp;&nbsp;to favourites</span> 
										</B>


											 </span><br/>
					<label class="help-block " style="color:#CFCFCF;margin-top: 0px;">{{feed.date_created}}</label>
				</p>
			</div>
		</div>
		
			<!-- <div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1"></div> -->
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12 ">
				
				 <img ng-src="{{feed.business_photo}}" class="img-responsive"  style="width:440px;height:250px"  alt="Generic placeholder thumbnail">

				 <p style="margin-top:15px;font-weight:bold;">
					<a href="business_page_3.php?current_business_id={{feed.business_id}}" ng-show="feed.business_owner_id!=feed.user_id" class="redbright" style="margin-top:10px;text-decoration:none;">{{feed.business_name}}</a>

					<a href="business_page_owners_view.php?current_business_id={{feed.business_id}}" ng-show="feed.business_owner_id==feed.user_id" class="redbright" style="margin-top:10px; text-decoration:none;">{{feed.business_name}}</a>
				 </p>
				
				<div class="profile_updte_time" style="margin-top:-5px; margin-bottom:10px;">{{feed.business_address}}</div>
								
								<table>
								<tr>
									<td style="width:500px;">
									<div ng-show="feed.rate>-1 && feed.price>-1 ">

									<span> 
											<span>
											<i ng-repeat="star in feed.ratings" class="ion ion-ios-star redbright" width="15px" height="15px"/>
											</span>

											<span style="margin-left:-4px;">
										
											<i ng-repeat="star in feed.noratings" class="ion ion-ios-star-outline redbright" width="15px" height="15px"/>
											</span>
											

										
									</span>
									&nbsp;&nbsp;
									<span> 

											
											<span>
											<i ng-repeat="star in feed.pricings" class="ion ion-social-usd " style="color:#00cc00;" width="15px" height="15px"/>
											</span>
											
											<span style="margin-left:-4px;">
											
											<i ng-repeat="usd in feed.nopricings" class="ion ion-social-usd-outline " style="color:#00cc00;" width="15px" height="15px"/>
											</span>
										
									</span>

								</div>
								<div ng-show="feed.rate==-1 && feed.price==-1 ">
										<span> 

											<i ng-repeat="star in [1,2,3,4,5]" class="ion ion-ios-star-outline redbright" width="15px" height="15px"/>
											
										</span>
										&nbsp;&nbsp;
										<span> 
												<i ng-repeat="usd in [1,2,3,4,5]" class="ion ion-social-usd-outline " style="color:#00cc00;line-height: 20px;" width="15px" height="15px"/>
											
										</span>

								</div>
								</td>
								
					<td>	
							<input type="hidden" ng-model="sender_id" ng-init="sender_id='<?php echo $_SESSION['SESS_MEMBER_ID'] ?>'" >
							<input type="hidden" ng-model="toggle" ng-init="toggle=feed.business_followed_by_me" >	

							<div ng-show="feed.business_followed_by_me==0" ng-click="followItem('business',sender_id,feed.business_id,feed.id)" >
								<div class="icon icon-add182" style="color:#ECCB37;font-size:16px;margin-top:-15px;" ></div>
								<div style="font-size:10px;margin-left:-7px;color:#C4C4C4;margin-top:4px;">Follow</div>
							</div>
							<div ng-show="feed.business_followed_by_me==1" ng-click="unfollowItem('business',sender_id,feed.business_id,feed.id)" >
								<div class="ion ion-android-checkmark-circle" style="color:#BD2532;font-size:16px;margin-top:-15px;" ></div>
								<div style="font-size:10px;margin-left:-7px;color:#C4C4C4;margin-top:4px;">following</div>
							</div>
					</td>
					</tr>

					</table>
					
				
			</div>
			
		
		<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12 ">
				<table>

					<tr>
						<td></td>
						<td colspan="" style="padding-left:8px;" >

						
						
							<h6 >
								
								<hr style="margin-bottom:15px; " ng-show="feed.comments.length>0"></hr>
								<div id="atfcommentors{{feed.id}}">
											
														<table ng-repeat="comment in feed.comments track by comment.id">
															<tr style="">
																<td style=" width:22px; height:22px; vertical-align:top;"><img ng-src="{{comment.user.avatar}}"  class="img-circle" style="width:35px;height:35px"  alt="Generic placeholder thumbnail"></td>
																
																<td style="vertical-align:top;">

																	<p class="small" style="font-size:11;padding-left:8px;"> 
																			<span style='color:#555555;font-size:12;'>
																				<B class="redbright  ">
																					{{comment.user.first_name}} {{comment.user.last_name}}
																				</B>
																				<span style="font-size:12;">
																					 {{comment.details}} 
																					<!-- Nomis wilson is going back home right now Nomis wilson is going back home right now Nomis wilson is going back home right now Nomis wilson is going back home right now Nomis wilson is going back home right now -->
																				</span>
																			</span> &nbsp; 
																		</p>
																		<div style="height:0px;"></div>
											
																		
																		
																		<div style="margin-top:-5px; margin-left:10px;" ng-show="comment.isLikedByUser==0">
																		<div style="font-size:11; visibility :visible; font-color:grey;" id="likecard{{comment.id}}" ><span  class="icon icon-like85 " ng-click="likeItem(user_id,comment.id,feed.id)" ></span>
																		    <i ng-show="comment.like_number>1">{{comment.like_number}} likes
																			</i>
																			<span ng-show="comment.like_number<=1">{{comment.like_number}} like
																			</span>
																			<span  style="font-size:10;padding-top:50px;color:#CFCFCF;padding-left:3px;">{{comment.date_created}}
																			</span>
																		</div>
																		</div>
																							
																	    <div style="margin-top:-5px; margin-left:10px;" ng-show="comment.isLikedByUser==1">
																		<span style="font-size:11; visibility :visible; font-color:grey;" id="unlikecard{{comment.id}}" ><span  class="icon icon-like85 redbright " ng-click="unlikeItem(user_id,comment.id,feed.id)" ></span>
																			<span ng-show="comment.like_number>1">{{comment.like_number}} likes
																			</span>
																			<span ng-show="comment.like_number<=1">{{comment.like_number}} like
																			</span>
																			<span  style="font-size:10;padding-top:50px;color:#CFCFCF;padding-left:3px;">{{comment.date_created}}
																			</span>
																		</span>
																		</div>


																	</span >

																		
						    
																</td>
															</tr>
															<tr>
															<td>
															<div style="height:20px;"></div>
															</td>
															</tr>
														</table>
													



												
								</div>

								<hr style="margin-bottom:4px; "></hr>															
								<table>
									<tr>
										<td style="width:110px;" >										
											<a href="javascript:void();" ng-show="feed.likeToggleValue==0"  style="font-size:9px; background-color:white;text-decoration:none;" id=""><span class="icon icon-like85 simplegrey  " style="font-size:16px;"  ng-click="likeNFItem(user_id,feed.id)" > &nbsp;<span class="simplegrey" style="font-size:12;">{{feed.likeNo}} </span>
											<span style="font-size:12;" class="simplegrey" ng-show="feed.likeNo<=1">
												Like
											</span>
											<span style="font-size:12;" class="simplegrey" ng-show="feed.likeNo>1">
												Likes
											</span>

											</a>

											<a href="javascript:void();" ng-show="feed.likeToggleValue==1"  style="font-size:9px; background-color:white;text-decoration:none;" id=""><span class="icon icon-like85 redbright  " style="font-size:16px;"  ng-click="unlikeNFItem(user_id,feed.id)"> &nbsp;<span class="simplegrey" style="font-size:12;">{{feed.likeNo}} </span>
											<span style="font-size:12;" class="simplegrey" ng-show="feed.likeNo<=1">
												Like
											</span>
											<span style="font-size:12;" class="simplegrey" ng-show="feed.likeNo>1">
												Likes
											</span>

											</a>


										</td>
										<td style="width:140px;">											
											<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#">
												<i style="font-size:16px;margin-right: 10px;" class="glyphicon glyphicon-comment pull-left"></i>{{feed.comment_count}}&nbsp;<span ng-if="feed.comment_count>1">Comments</span>
												<span ng-if="feed.comment_count<2">Comment</span>
											</a>										
										</td>
										<td>
												
											<?php //require_once("../share_model.php") ?>															
											<a class="simplegrey btn " style="text-decoration:none;" data-toggle="modal" data-target="#mdl_example">
											<span class="icon icon-sharing6" ng-click="shareItem('new_feed',feed.id)"></span>&nbsp;&nbsp; Share
											<?php //share(" Steven Byamugisha has shared a review by Nomis Wilson on Cafe Javas from Yammzit.com","Page Name(I.e: Home.php)","Content to share","image attached to the content being shared"); ?>
											</a>											
										</td>
									</tr>
								</table>									
								<h6></h6>
								<div class="space"></div>
								<div id="flash" align="left"  ></div>
								<div id="show" align="left"></div>								
								<form class=" noborderStyle" role="form" action="#" >
									 <div class="form-group"> 										
											<table>
												<tr>
													<td>																				
														<input ng-model="comment_details" type="text" class="form-control form-control-no-border post_comment"  userid="{{user_id}}" ourfeedid="{{feed.id}}" commentdetails="{{comment_details}}" datecreated="{{feed.date_created}}" feedtype="atf" rows="1" id="atfcontent{{feed.id}}" name="content" style="background-color:#E9EAEE;text-align:left; width:300px;height:30px; border:none; border-radius: 0px;" ng-enter placeholder="Write a comment...">						
														
														
													</td>
													<td style="vertical-align:top;">
														<div style="width:65px;"></div>
														<input type="button"   style="background-color:#E9EAEE;height:30px;text-align: center;line-height: 15px; width:60px;font-weight:bold;background-color:#BD2532; color:white;border-radius:10;" class=" form-control submit pull-right post_comment" value="Send" npost-random-feed userid="{{user_id}}" ourfeedid="{{feed.id}}" commentdetails="{{comment_details}}" datecreated="{{feed.date_created}}" feedtype="atf" />
														

													</td>
												</tr>
											</table>										
									 </div>
								</form>
								
							</h6>
						</td>
					</tr>
					</table>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	

<!-- End of discovered business -->