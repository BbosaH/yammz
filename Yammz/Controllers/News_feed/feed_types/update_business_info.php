
<style type="text/css">
			p.small {
			    line-height: 20px;
			}

			p.big {
			    line-height: 30px;
			}
</style>
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
		<div class="row" >
			<!-- column with avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space" style="margin-top:-30px; margin-left:-10px;">
				<img ng-src="{{feed.user_avatar}}" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left" style="margin-top:-25px; margin-left:-15px;">
				
				<h6 style="margin-top:4px;">					
					<span class="profile_name"><a ng-href="{{BaseURL}}/user_profile.php?id={{feed.user_id}}" style="text-decoration:none;color:#000000">{{feed.user_name}}</a>&nbsp; <span style="font-weight:lighter;">updated <a ng-href="{{BaseURL}}/business_page_3.php?current_business_id={{feed.business_id}}" style="text-decoration:none;color:#000000"><b>{{feed.business_name}}'s<b></a> info</span></span><br/>
					<label class="help-block " style="color:#CFCFCF;margin-top: 0px;">{{feed.date_created}}</label>
				</h6>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-lg-3 col-sm-3 col-xl-3 col-xs-3">	

			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-xs-6" style="margin-top:10px;">	
			<img ng-src="{{BaseImageURL}}uploads/info.png" style="width:170px;height:120px;">
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xl-3 col-xs-3">	

			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">	
				<hr class="horizontal_line" ng-show="feed.comments.length>0"></hr>
							<div id="uinfocommentors{{feed.id}}" style="margin-bottom:-15px;">
											
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
										<td style="width:140px;">											
											<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
												<span style="font-size:16px;" class="glyphicon glyphicon-comment pull-left"></span>&nbsp;&nbsp;Comment
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
														<input ng-model="comment_details" type="text" class="form-control form-control-no-border post_comment"  userid="{{user_id}}" ourfeedid="{{feed.id}}" commentdetails="{{comment_details}}" datecreated="{{feed.date_created}}" feedtype="uinfo" rows="1" id="uinfocontent{{feed.id}}" name="content" style="background-color:#E9EAEE;text-align:left; width:300px;height:30px; border:none; border-radius: 0px;" ng-enter placeholder="Write a comment...">						
														
														
													</td>
													<td style="vertical-align:top;">
														<div style="width:65px;"></div>
														<input type="button"   style="background-color:#E9EAEE;height:30px;text-align: center;line-height: 15px; width:60px;font-weight:bold;background-color:#BD2532; color:white;border-radius:10;" class=" form-control submit pull-right post_comment" value="Send" post-random-feed userid="{{user_id}}" ourfeedid="{{feed.id}}" commentdetails="{{comment_details}}" datecreated="{{feed.date_created}}" feedtype="uinfo" />
														

													</td>
												</tr>
											</table>										
									 </div>
								</form>
					
			</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>

<!-- End of Became Friends Review -->