 <div class="tab-pane active" id="<?php echo"id"; ?>">	
	<h4 style="margin-top:0px;margin-bottom:20px;"><span class="redbright">{{(categorymodels.length>0)?categorymodels[currentobjectPosition].categoryname:''}}s</span></h4>
					
</div>

<div  ng-repeat="categorybusiness  in ((categorymodels.length>0)?categorymodels[currentobjectPosition].businesses:[])| limitTo: 3 ">

 <div class="row">
		<div class="col-lg-2 col-sm-1 col-md-2 col-xs-2">
			<img ng-src="{{categorybusiness.logo}}" class="img-circle img-responsive" style="width:39px;height:39px"  alt="Generic placeholder thumbnail Responsive image">
		</div>
		<!--//////////////// -->
		<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
			 <div class="caption" style="margin-left:-40px;margin-top:5px;">
				<p>
					<span class="redbright" style="font-weight:Bold; font-size:12px;">
					{{categorybusiness.name}} &nbsp;
					</span>
				</p>

				<h6 ng-show="categorybusiness.cost>0 || categorybusiness.good>0" style="margin-top:-5px;">
					<span style="font-weight:Bold; font-size:11px;">Rate </span>
					<span style="margin-left:43px;">
					
						<span>
						<i class="ion ion-ios-star redbright" style="font-size:15px;" ng-repeat="rating in categorybusiness.ratings"></i>
						</span>
						<span>
						<i class="ion ion-ios-star-outline redbright" style="font-size:15px;" ng-repeat="norating in categorybusiness.no_ratings"></i>
						</span>
					
					
					</span>

					
					<div style="margin-top:10px;">
						<span style="font-weight:Bold; font-size:11px;">Price &nbsp;</span>
						<span style="margin-left:33px;">
						<span>
						<i class="ion ion-social-usd" style="color:#00cc00;padding-left:5px;" ng-repeat="pricing in categorybusiness.pricings"></i>
						</span>
						<span
						<i class="ion ion-social-usd-outline" style="color:#00cc00;padding-left:5px;"  ng-repeat="nopricing in categorybusiness.no_pricings"></i>
						</span>
						</span>
					</div>
					
				</h6>
				<h6 ng-show="categorybusiness.cost<=0 && categorybusiness.good<=0">
					<span style="font-weight:Bold; font-size:11px;">Rate </span>
					<span style="margin-left:43px;">
						
							<span>
							<i class="ion ion-ios-star-outline redbright" style="font-size:15px;" ng-repeat="norating in [1,2,3,4,5]" ></i>
							</span>
						
					</span>
					
					<div  style="margin-top:10px;">
						<span style="font-weight:Bold; font-size:11px;">Price &nbsp;</span>
						<span style="margin-left:33px;">
						<span>
						<i class="ion ion-social-usd-outline" style="color:#00cc00;padding-left:5px;" ng-repeat="nopricing in [1,2,3,4,5]" ></i>
						</span>
						</span>
					</div>
					
				</h6>


				
				<h6>
					<span style="font-weight:Bold; font-size:11px;">Category: &nbsp;</span><span style="margin-left:15px; color:grey; font-size:12px;">{{categorymodels[currentobjectPosition].categoryname}}</span>
				</h6>
				
				<h6>
					<span style="font-weight:Bold; font-size:11px;">Reviews: &nbsp;</span><span style="margin-left:16px; color:grey; font-size:12px;">{{categorybusiness.news_feed_count}} Reviews</span>
				</h6>
			</div> 
		</div>
		<!-- ////////////////////// -->

	</div>

				<hr></hr/>
</div>

	