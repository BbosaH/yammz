<!-- Start of Shared a review -->

	<div class="panel-body">
		<!-- Start row with the right most three dots -->
		<div class="row">
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
				<span style="" class="icon icon-three-dots-more-indicator three_dots pull-right"></span>
			</div>
		</div>
		<!-- End of row with the right most three dots -->

		<!-- Start of row with the user profile photo,name,date, welcome note ,like,comments and commenting field -->
		<div class="row">
			<!-- column with avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space" style="margin-top:-30px; margin-left:-10px;">
				<img ng-src="{{feed.user_avatar}}" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left" style="margin-top:-30px;">
			
				<h6 style="padding-left:6px;">					
					<B>
									

										<a style="text-decoration:none;" ng-show="feed.un_enc_user_id == user_id" ng-href="user_profile.php?id={{feed.user_id}}" class="black">
											{{feed.user_name}} 
										</a>
									

										<a style="text-decoration:none;" ng-show="feed.un_enc_user_id != user_id" ng-href="user_profile_3.php?id={{feed.user_id}}" class="black">
											{{feed.user_name}} 
										</a>

									

					</B> 
					shared a Review
					<label class="help-block " style="color:#CFCFCF;margin-top: 0px;">06/06/2016 3hrs ago</label>
				</h6>

			</div>
		</div>
		<div class="row">
			<!-- <div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1"></div> -->
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">

				<div class="empty_right_side_frame" style="margin-top:10px;">
					<div class="row" style="margin-top:5px;margin-bottom:10px;margin-left:10px;">
						<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">	
							<div class="inner_profile_letter">
								<div class="inner_profile_letter_center">{{feed.inner_feed.user.first_name.charAt(0)}}</div>	
							</div>
						</div>
						<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10" style="margin-top:10px; margin-left:10px;">
							<div class="profile_name" style="font-size:11px;">{{feed.inner_feed.user.first_name}}  {{feed.inner_feed.user.last_name}} <span style="font-weight:lighter;">wrote  review for</span> {{feed.inner_feed.business.name}}</div>
							<div class="profile_updte_time " style="color:#CFCFCF;">{{feed.date_created}}</div>

							<div class="row">
								<div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5">
									<div ng-show="feed.inner_feed.rate>-1 && feed.inner_feed.price>-1 ">

									<span> 
											<span>
											<i ng-repeat="star in feed.inner_ratings" class="ion ion-ios-star redbright" width="15px" height="15px"/>
											</span>

											<span style="margin-left:-4px;">
										
											<i ng-repeat="star in feed.inner_noratings" class="ion ion-ios-star-outline redbright" width="15px" height="15px"/>
											</span>
											

										
									</span>
									&nbsp;&nbsp;
									<span> 

											
											<span>
											<i ng-repeat="star in feed.inner_pricings" class="ion ion-social-usd " style="color:#00cc00;" width="15px" height="15px"/>
											</span>
											
											<span style="margin-left:-4px;">
											
											<i ng-repeat="usd in feed.inner_nopricings" class="ion ion-social-usd-outline " style="color:#00cc00;" width="15px" height="15px"/>
											</span>
										
									</span>

								</div>
								<div ng-show="feed.inner_feed.rate==-1 && feed.inner_feed.price==-1 ">
										<span> 

											<i ng-repeat="star in [1,2,3,4,5]" class="ion ion-ios-star-outline redbright" width="15px" height="15px"/>
											
										</span>
										&nbsp;&nbsp;
										<span> 
												<i ng-repeat="usd in [1,2,3,4,5]" class="ion ion-social-usd-outline " style="color:#00cc00;" width="15px" height="15px"/>
											
										</span>

								</div>
								</div>
								
								
							</div>
							<div class="row">
								<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
									{{feed.inner_feed.details}}
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">	
				
				<h6 >
								
								<hr style="margin-bottom:4px; " ng-show="feed.comments.length>0"></hr>
								<div id="srcommentors{{feed.id}}" style="margin-bottom:-15px;">
											
														<table ng-repeat="comment in feed.comments track by comment.id">
															<tr style="">
																<td style=" width:22px; height:22px; vertical-align:top;"><img ng-src="{{comment.user.avatar}}"  class="img-circle" style="width:35px;height:35px"  alt="Generic placeholder thumbnail"></td>
																
																<td style="vertical-align:top;">

																	<span>																									
																	
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
											
																		
																		<div style="margin-top:-10px; margin-left:10px;" ng-show="comment.isLikedByUser==0">
																		<span style="font-size:11; visibility :visible; font-color:grey;" id="likecard{{comment.id}}" ><span  class="icon icon-like85 " ng-click="likeItem(user_id,comment.id,feed.id)" ></span>
																		    <span ng-show="comment.like_number>1">{{comment.like_number}} likes
																			</span>
																			<span ng-show="comment.like_number<=1">{{comment.like_number}} like
																			</span>&nbsp;
																			<span  style="font-size:10;padding-top:50px;color:#CFCFCF;padding-left:3px;">{{comment.date_created}}
																			</span>
																		</span>
																		</div>
																							
																	    <div style="margin-top:-10px; margin-left:10px;" ng-show="comment.isLikedByUser==1">
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
										<td style="width:140px;">									<a class=" btn simplegrey " style="text-decoration:none;"  data-toggle="collapse" data-target="#">
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
														<input ng-model="comment_details" type="text" class="form-control form-control-no-border post_comment"  userid="{{user_id}}" ourfeedid="{{feed.id}}" commentdetails="{{comment_details}}" datecreated="{{feed.date_created}}" feedtype="sr" rows="1" id="srcontent{{feed.id}}" name="content" style="background-color:#E9EAEE;text-align:left; width:300px;height:30px; border:none; border-radius: 0px;" ng-enter placeholder="Write a comment...">					
														
														
													</td>
													<td style="vertical-align:top;">
														<div style="width:65px;"></div>
														<input type="button"   style="background-color:#E9EAEE;height:30px;text-align: center;line-height: 15px; width:60px;font-weight:bold;background-color:#BD2532; color:white;border-radius:10;" class=" form-control submit pull-right post_comment" value="Send" post-random-feed userid="{{user_id}}" ourfeedid="{{feed.id}}" commentdetails="{{comment_details}}" datecreated="{{feed.date_created}}" feedtype="sr" />
														

													</td>
												</tr>
											</table>										
									 </div>
								</form>
								
							</h6>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>

<!-- End of Shared a review -->