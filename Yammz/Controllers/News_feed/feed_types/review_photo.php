	<style type="text/css">
			p.small {
			    line-height: 20px;
			}

			p.big {
			    line-height: 30px;
			}
</style>
	<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table>
						<tr>
							<td style="vertical-align:top;" width="10px;">

								<img ng-src="{{feed.user_avatar}}" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">													

							</td>
							<td>
								<span>
									<h6 style="padding-left:6px;line-height: 20px;">
									<B>
									

										<a style="text-decoration:none;" ng-show="feed.un_enc_user_id == user_id" ng-href="user_profile.php?id={{feed.user_id}}" class="black">
											{{feed.user_name}} 
										</a>
									

										<a style="text-decoration:none;" ng-show="feed.un_enc_user_id != user_id" ng-href="user_profile_3.php?id={{feed.user_id}}" class="black">
											{{feed.user_name}} 
										</a>

									

									</B> 
									reviewed  
									<B>

									

									<a ng-show="feed.business_owner_id==feed.un_enc_user_id" ng-href="business_page_owners_view.php?current_business_id={{feed.business_id}}" style="text-decoration:none;" class="black">{{feed.business_name}}</a>


									<a ng-show="feed.business_owner_id!=feed.un_enc_user_id" href="business_page_3.php?current_business_id={{feed.business_id}}" style="text-decoration:none;" class="black">{{feed.business_name}}</a>

									</B>	
									
									<label class="help-block " style="color:#CFCFCF;margin-top: 0px;">{{feed.date_created}}</label>

																		
												
									
								</h6>
									&nbsp;
                                 <div style="padding-left:8px;margin-top:-15px;" ng-show="feed.rate>-1 && feed.price>-1 ">

									<span> 
											<span>
											<i ng-repeat="star in feed.ratings" class="ion ion-ios-star redbright"
											style="font-size:25px;"/>
											</span>

											<span style="margin-left:-4px;">
										
											<i ng-repeat="star in feed.noratings" class="ion ion-ios-star-outline redbright"  style="font-size:25px;" />
											</span>
											

										
									</span>
									&nbsp;&nbsp;
									<span> 

											
											<span>
											<i ng-repeat="star in feed.pricings" class="ion ion-social-usd " style="color:#00cc00;padding-left:8px; font-size:20px;" />
											</span>
											
											<span style="margin-left:-4px;">
											
											<i ng-repeat="usd in feed.nopricings" class="ion ion-social-usd-outline " style="color:#00cc00;padding-left:8px; font-size:20px;" />
											</span>
										
									</span>

								</div>

								<div style="padding-left:8px;margin-top:-15px;" ng-show="feed.rate==-1 && feed.price==-1 ">
										<!-- <span> 

											<i ng-repeat="star in [1,2,3,4,5]" class="ion ion-ios-star-outline redbright" style="font-size:25px;"/>
											
										</span>
										&nbsp;&nbsp;
										<span> 
												<i ng-repeat="usd in [1,2,3,4,5]" class="ion ion-social-usd-outline " style="color:#00cc00; padding-left:8px; font-size:20px;" />
											
										</span> -->

								</div>
								
	
									<br/>
								</span>

							</td>

						</tr>
						</table>
						

                        <div style="margin-top:-5px;margin-left:15px;">

                        <img ng-src="{{feed.photo}}" class="img-responsive"  style="width:410px;height:250px"  alt="Generic placeholder thumbnail">

                        </div>
	
						<table >
						<tr>
							<td>


	

							</td>
							<td colspan="" style="padding-left:0px;">
								<h6 style="margin-left:15px;">

								<p style="width:350px;  margin-top:20px; font-size:14px;">
										{{feed.details}}
									</p>

									
                                        <hr style="margin-bottom:15px; width:440px; " ng-show="feed.comments.length>0"></hr>
										<div id="rpcommentors{{feed.id}}" style=" margin-bottom:-5px;">
											
														<table ng-repeat="comment in feed.comments track by comment.id">
															<tr style="">
																<td style=" width:22px; height:22px; vertical-align:top;"><img ng-src="{{comment.user.avatar}}"  class="img-circle" style="width:35px;height:35px"  alt="Generic placeholder thumbnail"></td>
																
																<td style="vertical-align:top;">

																	<span>																									
																	
																		<p class="small" style="font-size:12;padding-left:8px;"> 
																			<span style='color:#555555;font-size:12;'>
																				<B class="redbright  ">
																					{{comment.user.first_name}} {{comment.user.last_name}}
																				</B>
																				<span style="font-size:12;">
																					 {{comment.details}} 
																				 <!-- Nomis wilson is going back home right now Nomis wilson is going back home right now Nomis wilson is going back home right now Nomis wilson is going back home right now Nomis wilson is going back home right now  -->
																				</span>
																			</span> &nbsp; 
																		</p>

																		<div style="height:0px;"></div>

																		<div style="height:0px;"></div>
											
																		
																		<div style="margin-top:0px;margin-left:10px;" ng-show="comment.isLikedByUser==0">
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

											<hr style="margin-bottom:4px; width:440px; margin-top:10px; " ng-show="feed.comments.length>0"></hr>
											<hr style="margin-bottom:4px; width:111%; margin-top:20px; " ng-show="feed.comments.length==0"></hr>															
								        <span style="margin-left:2px;">
																				
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
								<form class=" noborderStyle" role="form" action="#" style="margin-left:18px;" >
									 <div class="form-group"> 										
											<table>
												<tr>
													<td>																				
														<input ng-model="comment_details" type="text" class="form-control form-control-no-border post_comment"  userid="{{user_id}}" ourfeedid="{{feed.id}}" commentdetails="{{comment_details}}" datecreated="{{feed.date_created}}" feedtype="rp" rows="1" id="rpcontent{{feed.id}}" name="content" style="background-color:#E9EAEE;text-align:left; width:300px;height:30px; border:none; border-radius: 0px;" ng-enter placeholder="Write a comment...">					
														
														
													</td>
													<td style="vertical-align:top;">
														<div style="width:65px;"></div>
														<input type="button"   style="background-color:#E9EAEE;height:30px;text-align: center;line-height: 15px; width:60px;font-weight:bold;background-color:#BD2532; color:white;border-radius:10;" class=" form-control submit pull-right post_comment" value="Send" post-random-feed userid="{{user_id}}" ourfeedid="{{feed.id}}" commentdetails="{{comment_details}}" datecreated="{{feed.date_created}}" feedtype="rp" />
														

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
	