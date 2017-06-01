					
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"   id="friend_{{friend_request.id}}" >
					 <input type="hidden" ng-model="date_created" ng-init="date_created='<?php echo time(); ?>'"> 
						
							<div class="row" style="margin-top: 10px;" >
								<div class="col-sm-2 col-md-2 col-lg-2">
									<div style="padding-left:20px;padding-top:0px;padding-bottom:10px;"><img  class="img-circle" ng-src="{{friend_request.avatar}}" width="55px" height="55px"/></div>
									
								</div>
								<div class="col-sm-7 col-md-7 col-lg-7" style="margin-top: 10px;" >


										<span>
											{{friend_request.first_name}} {{friend_request.last_name}}  sent you a friend request
										</span><br/>
										<span style="color:#C1C1C1;">{{friend_request.date_created}}</span>
									
									

								</div>
							<div class="col-sm-3 col-md-3 col-lg-3" style=" margin-top:10px;">

										<input type="hidden" id = "acceptHid" value="{{friend_request.id}}" />
										
										<span><a class = "redbright"  style="text-decoration: none" href="#" ng-click="accept_request(user_id,friend_request.id,date_created)" >
											Accept</a>&nbsp&nbsp&nbsp<a class = "redbright" style=" text-decoration: none;" href="#" ng-click="deny_request(user_id,friend_request.id,date_created)">
											Deny</a>
										</span>
										
									
									

								</div>

								
							</div>
							
					</div>

					


					
					
			