
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
							
							
							<h6 ng-show="isOwner==false"><B><a href="user_profile_3.php?id={{mymodel.person_id}}" style="text-decoration:none" class="black">{{mymodel.person_name}}</a></B> Made a review on <B><a href="business_page_3.php?current_business_id={{mymodel.business_id}}" style="text-decoration:none"class="black">{{mymodel.business_name}}</a></B></h6>	
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
