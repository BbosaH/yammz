<?php 


?>
<div class="row" ng-controller="FullUserCtrl">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
		
		<span  class="redbright pull-right" style="padding-right:95px;" ><B><a class="redbright" ng-href="{{BaseURL}}edit_user_profile.php?id={{fullUser.user.id}}" style="text-decoration:none;font-size:16px;">Edit Profile
		

		</a></B></span>	
		<!-- <span  class="redbright pull-right" style="padding-right:95px;" ><B><a class="redbright" ng-href="page_unavailable.html" style="text-decoration:none;font-size:16px;">Edit Profile
		

		</a></B></span> -->
			
	</div>
</div>

<div class="row" ng-controller="FullUserCtrl">
	<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 " style="padding-left:70px;">		
		<img style="background-color:grey;" ng-src="{{fullUser.user.avatar}}" class="img-circle" width="350px" height="350px">		
	</div>
	<div class="col-lg-9 col-sm-9 col-md-9 col-xs-12 " style="padding-top:50px; padding-left:200px;" >
		<h4><B>Profile: </B><span style="color:#BD2532; padding-left:25px;">{{fullUser.user.first_name}}  {{fullUser.user.last_name}}</span></h4>
		<h4 style="padding-top:10px;"><B>Friends: </B><span style="color:#BD2532;padding-left:20px;">{{fullUser.friend_count}} friends</span></h4>
		<h4 style="padding-top:10px;"><B>Reviews: </B><span style="color:#BD2532;padding-left:10px;">{{fullUser.review_count}} Reviews</span></h4>							
		<div class="row"style="padding-top:25px;">
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
				<table>
					<tr >
						<td ng-repeat="photomodel in fullUser.photos | limitTo:3" style="margin-left: 10px;">
							<div style="margin-left: 15px;" ng-show="$index!=2">
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
														<a type="btn" style="background-color:#EBEAEF; color:#D0CCC9; border-color:white;border-radius:20;height:149px;width:150px;" class="btn btn-default noborderStyle ">
															<div style="height:15px;"></div>
															<div><img src="images/icons/profile logo .png" style="height:75px;width:80px;"/></div>
															<div style="height:15px;"></div>
															<span style="font-size:18px;">Add Photo</span>
														</a>
													</td>
													<td width="15px;"></td>
													<td ng-show='fullUser.photos.length<1'>
														<!-- <img src="images/profiles/right hand side 2.png"  width="150px" height="150px"></span> -->
														<a type="btn" style="background-color:#EBEAEF; color:#D0CCC9; border-color:white;border-radius:20;height:149px;width:150px;" class="btn btn-default noborderStyle ">
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
<div style="height:10px;"></div>
	