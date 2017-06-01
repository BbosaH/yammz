<table style=" margin-left:10px;" ng-cloak>
	<tr>
		<td style="vertical-align:top;" width="10px;"  >


					<img src="{{business.logo}}" style="border-radius:10px; margin:left:20px;" width="104px" height="104px" >


		</td>
		<td style="padding-left:10px; margin-top:5px; margin-bottom:5px;" >
			<div style="height:7px;"></div>
			
			<a class="redbright" ng-if="business.owner_id!=user_id" ng-href="{{BaseURL}}business_page_free.php?current_business_id={{business.id}}" style="padding-top:15px; text-decoration:none;padding-left:5px;" ng-bind="business.name">
				
			</a><br/>
			<p class="grey" style="margin-top:5px;font-size:12;padding-left:5px;" ng-bind="business.address">
				
			</p>
			<div ng-show="business.cost>0 || business.good>0" style="margin-top:-5px;">
				<div style="padding-left:5px;">
					<span>
					<i class="ion ion-ios-star redbright" style="font-size:15px;" ng-repeat="rating in business.ratings"></i>
					</span>
					<span>
					<i class="ion ion-ios-star-outline redbright" style="font-size:15px;" ng-repeat="norating in business.no_ratings"></i>
					</span>
				
				</div>
				<div>
					<span>
					<i class="ion ion-social-usd" style="color:#00cc00;padding-left:5px;" ng-repeat="pricing in business.pricings"></i>
					</span>
					<span
					<i class="ion ion-social-usd-outline" style="color:#00cc00;padding-left:5px;"  ng-repeat="nopricing in business.no_pricings"></i>
					</span>
					
				</div>
			</div>
			<div ng-show="business.cost<=0 && business.good<=0" style="padding-left: 3px;">
				<div class="grey" style="padding-left:5px;margin-top: -5px;margin-bottom: 7px;">
					<span>
					<i class="ion ion-ios-star-outline redbright" style="font-size:15px;" ng-repeat="norating in [1,2,3,4,5]" ></i>
					</span>
				</div>
				<div  class="grey">
					<span>
					<i class="ion ion-social-usd-outline" style="color:#00cc00;padding-left:5px;" ng-repeat="nopricing in [1,2,3,4,5]" ></i>
					</span>

				</div>
			</div>

		</td>

		<span class="pull-right" style="padding-top:10px;margin-right:15px;" ng-show="business.isfollowed=='false'" ng-click="followItem('business',user_id,business.id,business.isfollowed)">
		  &nbsp;&nbsp;&nbsp; <span  style="font-size:16px; margin-right:15px; " class="icon icon-add182"></span>
		  <span id="follow_word" style="font-size:10;color:#C2C2C2;margin-right:10px;"><br/>&nbsp;&nbsp;follow</span>
		</span>

		<span class="pull-right" style="padding-top:10px;margin-right:15px;" ng-show="business.isfollowed=='true'" ng-click="unfollowItem('business',user_id,business.id,business.isfollowed)">
		  &nbsp;&nbsp;&nbsp; <span id="unfollow_icon" style="font-size:20px; margin-left: 0px; font-weight:bold" class="ion-android-checkmark-circle redbright"></span>
		  <span id="unfollow_word" style="font-size:10;color:#C2C2C2;margin-left:-2px;"><br/>following</span>
		</span>

	</tr>
</table>
<hr style="height:2px; background-color:#EBEAEF; margin-top:10px; margin-bottom:0px;"></hr>
