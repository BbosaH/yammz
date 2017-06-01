	<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table>
						<tr>
							<td style="vertical-align:top;" width="10px;">

								<img ng-src="{{feed.user_avatar}}" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">													

							</td>
							<td>
								<span>
									<h6>
										<B>
                                                <a style="text-decoration:none;" ng-show="feed.user_id == user_id" ng-href="user_profile.php?id={{feed.user_id}}" class="black">&nbsp;
                                                    {{feed.user_name}} 
                                                </a>
                                            

                                                <a style="text-decoration:none;" ng-show="feed.user_id != user_id" ng-href="user_profile_3.php?id={{feed.user_id}}" class="black">&nbsp;
                                                    {{feed.user_name}} 
                                                </a>
										</B>
										Made a review on <B><B ng-show="feed.business.owner_id==feed.user.id"><a ng-href="business_page_owners_view.php?current_business_id={{feed.business_id}}" style="text-decoration:none;" class="black">{{feed.business_name}}</a></B>	


									<B ng-show="feed.business.owner_id!=feed.user.id"><a href="business_page_3.php?current_business_id={{feed.business_id}}" style="text-decoration:none;" class="black">{{feed.business_name}}</a></B>	
					
									<span class="help-block " style="color:#CFCFCF;">&nbsp;&nbsp; {{feed.date_created}} &nbsp; 23 days ago</span>
                                    
							        </h6>
									&nbsp;
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
												<i ng-repeat="usd in [1,2,3,4,5]" class="ion ion-social-usd-outline " style="color:#00cc00;" width="15px" height="15px"/>
											
										</span>

								</div>
								
	
									<br/>
								</span>

							</td>

						</tr>
						</table>
						

                        <div style="margin-top:-5px;">

                        <img ng-src="{{feed.photo}}"  style="width:440px;height:250px"  alt="Generic placeholder thumbnail">

                        </div>
	
						<table >
						<tr>
							<td>


	

							</td>
							<td colspan="" style="padding-left:0px;">
								<h6 >

								<p style="width:350px; margin-left:0px; margin-top:10px;">
										{{feed.details}}
									</p>

									
                                        <hr style="margin-bottom:4px; width:440px; " ng-show="feed.comments.length>0"></hr>
										<div id="commentors{{feed.id}}" style="margin-left:55px;">
											
														<table ng-repeat="comment in feed.comments">
															<tr style="">
																<td style=" width:22px; height:22px; vertical-align:top;"><img ng-src="{{BaseImageURL}}{{comment.user.avatar}}" class="img-circle" style="width:35px;height:35px"  alt="Generic placeholder thumbnail"></td>
																
																<td style="vertical-align:top;">
																	<span>																									
																		
																		<span style="font-size:11;padding-left:8px;"> <span style='color:#555555;font-size:12;'><B>{{comment.user.first_name}} {{comment.user.last_name}}</B></span> &nbsp; </span>
																		<div style="height:0px;"></div>
																		<p style="font-size:11;  padding-left:8px;padding-right:50px;">
																			{{comment.details}}
																		</p>
									
																		&nbsp;<span style="font-size:11; visibility :visible; margin-top:-5px; " id="unlikecard{{comment.id}}"  ng-show="comment.isLikedByUser==0"><span  class="icon icon-like85 redbright" ng-click="likeItem(user_id,comment.id,feed.id)"></span><span>&nbsp;&nbsp;Like</span>
																		&nbsp;<span  style="font-size:10;padding-top:50px;color:#CFCFCF;padding-left:8px;">12/03/2016</span>
																	    </span >
																							
																	    
																		<span style="font-size:11; visibility :visible; font-color:grey;" id="unlikecard{{comment.id}}" ng-show="comment.isLikedByUser==1"><span  class="icon icon-like85 " ng-click="unlikeItem(user_id,comment.id,feed.id)" ></span><span>&nbsp;&nbsp;unlike</span>
																	</span >

																		
						    
																</td>
															</tr>
															<div style="height:20px;"></div>
														</table>
												
								        </div>

											<hr style="margin-bottom:4px; width:440px; "></hr>															
								        <span style="margin-left:30px;">
																				
											<a href="" ng-show="feed.likeToggleValue==0"  style="font-size:9px; background-color:white;text-decoration:none;" id=""><span class="icon icon-like85 redbright " style="font-size:16px;"  ng-click="likeNFItem(user_id,feed.id)" > &nbsp;<span class="simplegrey" style="font-size:12;">{{feed.likeNo}} </span>&nbsp;<span style="font-size:12;" class="simplegrey">
												Likes
											</span></a>

											<a href="" ng-show="feed.likeToggleValue==1"  style="font-size:9px; background-color:white;text-decoration:none;" id=""><span class="icon icon-like85  " style="font-size:16px;"  ng-click="unlikeNFItem(user_id,feed.id)"> &nbsp;<span class="simplegrey" style="font-size:12;">{{feed.likeNo}} </span>&nbsp;<span style="font-size:12;" class="simplegrey">
												Likes
											</span></a>

                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

																					
											<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
												<span style="font-size:16px;" class="glyphicon glyphicon-comment pull-left"></span>&nbsp;&nbsp;Comment
											</a>	
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;									
										
												
											<?php// require_once("../share_model.php") ?>															
											<a class="simplegrey btn " style="text-decoration:none;" data-toggle="modal" data-target="#mdl_example">
											<span class="icon icon-sharing6"></span>&nbsp;&nbsp; Share
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
														<input ng-model="details" type="text" class="form-control form-control-no-border " rows="1" id="content{{feed.id}}" name="content" style="background-color:#E9EAEE;text-align:left; width:300px;height:30px; border:none; border-radius: 0px;" placeholder="Write a comment...">					
														
														
													</td>
													<td style="vertical-align:top;">
														<div style="width:65px;"></div>
														<input type="button"   style="background-color:#E9EAEE;height:30px;text-align: center;line-height: 15px; width:60px;font-weight:bold;background-color:#BD2532; color:white;border-radius:10;" class=" form-control submit pull-right" value="Send" ng-click="postComment(user_id,feed.id,details,date_created)" />
														

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
	