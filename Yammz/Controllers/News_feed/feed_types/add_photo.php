	<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table>
						<tr>
							<td style="vertical-align:top;" width="10px;">

								<img ng-src="{{feed.user_avatar}}" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">													

							</td>
							<td>
								<span>
									<h6 style="padding-left:6px;">
										<B>
                                               <a style="text-decoration:none;" ng-show="feed.un_enc_user_id == user_id" ng-href="user_profile.php?id={{feed.user_id}}" class="black">
													{{feed.user_name}} 
												</a>
									

												<a style="text-decoration:none;" ng-show="feed.un_enc_user_id != user_id" ng-href="user_profile_3.php?id={{feed.user_id}}" class="black">
													{{feed.user_name}} 
												</a>
										</B>
										added photo to <B>

										 <a ng-show="feed.business_owner_id==feed.un_enc_user_id" ng-href="business_page_owners_view.php?current_business_id={{feed.business_id}}" style="text-decoration:none;" class="black">{{feed.business_name}}</a>


									<a ng-show="feed.business_owner_id!=feed.un_enc_user_id" href="business_page_3.php?current_business_id={{feed.business_id}}" style="text-decoration:none;" class="black">{{feed.business_name}}</a>

									</B>
					
									<label class="help-block " style="color:#CFCFCF;margin-top: 0px;">&nbsp;&nbsp; {{feed.date_created}} </label>
                                    
							        </h6>
									&nbsp;
                        
								
	
									
								</span>

							</td>

						</tr>
						</table>
						

                        <div style="margin-top:-5px;">

                        <img ng-src="{{BaseImageURL+feed.details}}" class="img-responsive"  style="width:440px;height:250px"  alt="Generic placeholder thumbnail">

                        </div>
	
						<table >
						<tr>
							<td>


	

							</td>
							<td colspan="" style="padding-left:0px;">
								<h6 >

								

									
                                        <hr style="margin-bottom:4px; width:440px; " ng-show="feed.comments.length>0"></hr>
										<div id="apcommentors{{feed.id}}" style="margin-left:55px;">
											
														<table ng-repeat="comment in feed.comments track by comment.id">
															<tr style="">
																<td style=" width:22px; height:22px; vertical-align:top;"><img ng-src="{{comment.user.avatar}}"  class="img-circle" style="width:35px;height:35px"  alt="Generic placeholder thumbnail"></td>
																
																<td style="vertical-align:top;">

																	<span>																									
																	
																		<span style="font-size:11;padding-left:8px;"> <span style='color:#555555;font-size:12;'><B class="redbright  ">{{comment.user.first_name}} {{comment.user.last_name}}</B></span> &nbsp; </span>
																		<div style="height:0px;"></div>
																		<p style="font-size:11;  padding-left:8px;padding-right:50px;">
																			{{comment.details}}
																		</p>
																		<div style="height:0px;"></div>
											
																		
																		<div style="margin-top:0px; margin-left:10px;" ng-show="comment.isLikedByUser==0">
																		<span style="font-size:11; visibility :visible; font-color:grey;" id="likecard{{comment.id}}" ><span  class="icon icon-like85 " ng-click="likeItem(user_id,comment.id,feed.id)" ></span>
																		    <span ng-show="comment.like_number>1">{{comment.like_number}} likes
																			</span>
																			<span ng-show="comment.like_number<=1">{{comment.like_number}} like
																			</span>&nbsp;
																			<span  style="font-size:10;padding-top:50px;color:#CFCFCF;padding-left:3px;">{{comment.date_created}}
																			</span>
																		</span>
																		</div>
																							
																	    <div style="margin-top:0px; margin-left:10px;" ng-show="comment.isLikedByUser==1">
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

											<hr style="margin-bottom:4px; width:440px; "></hr>															
								        <span style="margin-left:30px;">
																				
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


                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

																					
											<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
												<span style="font-size:16px;margin-right: 10px;" class="glyphicon glyphicon-comment pull-left"></span>&nbsp;{{feed.comment_count}}&nbsp;<span ng-if="feed.comment_count>1">Comments</span>
												<span ng-if="feed.comment_count<2">Comment</span>
											</a>	
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;									
										
												
											<?php// require_once("../share_model.php") ?>															
											<a class="simplegrey btn " style="text-decoration:none;" data-toggle="modal" data-target="#mdl_example">
											<span class="icon icon-sharing6" ng-click="shareItem('new_feed',feed.id)"></span>&nbsp;&nbsp; Share
											<?php //share(" Steven Byamugisha has shared a review by Nomis Wilson on Cafe Javas from Yammzit.com","Page Name(I.e: Home.php)","Content to share","image attached to the content being shared"); ?>
											</a>											
										</span>									
								<h6></h6>
								<div class="space"></div>
								<div id="flash" align="left"  ></div>
								<div id="show" align="left"></div>								
								<form class=" noborderStyle" role="form" action="#" style="margin-left:30px;" >
									 <div class="form-group"> 										
											<table>
												<tr>
													<td>																				
														<input ng-model="comment_details" type="text" class="form-control form-control-no-border post_comment"  userid="{{user_id}}" ourfeedid="{{feed.id}}" commentdetails="{{comment_details}}" datecreated="{{feed.date_created}}" feedtype="ap" rows="1" id="apcontent{{feed.id}}" name="content" style="background-color:#E9EAEE;text-align:left; width:300px;height:30px; border:none; border-radius: 0px;" ng-enter placeholder="Write a comment...">						
														
														
													</td>
													<td style="vertical-align:top;">
														<div style="width:65px;"></div>
														<input type="button"   style="background-color:#E9EAEE;height:30px;text-align: center;line-height: 15px; width:60px;font-weight:bold;background-color:#BD2532; color:white;border-radius:10;" class=" form-control submit pull-right post_comment" value="Send"post-random-feed userid="{{user_id}}" ourfeedid="{{feed.id}}" commentdetails="{{comment_details}}" datecreated="{{feed.date_created}}" feedtype="ap" />
														

													</td>
												</tr>
											</table>										
									 </div>
								</form>
								
							</h6>
						</td>
					</tr>
						
				</table>
												
			</div>
		</div>
	