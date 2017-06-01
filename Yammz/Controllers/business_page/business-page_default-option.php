

<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
	
	<input type="hidden" ng-model="photo_toggle" ng-init="photo_toggle=0"/>
	<table>
		<tr >
			<td width="118px;">
				<span>
					<img ng-if="photo_names.length==0" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>0" ng-model="photo_names[photo_names.length-1]" ng-src="{{photo_names[photo_names.length-1]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
			<td width="118px;">
				<span>
					<img ng-if="photo_names.length <= 1" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>1" ng-src="{{photo_names[photo_names.length-2]}}" width="100px" height="98px" style="border-radius:4px;">

				</span>
			</td>
			<td width="118px;">
				<span>
					<img ng-if="photo_names.length <= 2 " src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>2" ng-src="{{photo_names[photo_names.length-3]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
			<td>
				<span>
					<img ng-if="photo_names.length<=3" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>3" ng-src="{{photo_names[photo_names.length-4]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
		</tr>
		<tr ><td height="15px"></td></tr >
		<tr >
			<td width="115px;">
				<span>
					<img ng-if="photo_names.length<=4" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>4" ng-src="{{photo_names[photo_names.length-5]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
			<td width="115px;">
				<span>
					<img ng-if="photo_names.length<=5" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>5" ng-src="{{photo_names[photo_names.length-6]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
			<td width="115px;">
				<span>
					<img ng-if="photo_names.length<=6" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>6" ng-src="{{photo_names[photo_names.length-7]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
			<td >
				<span>
					<img ng-if="photo_names.length<=7" src="<?php echo BaseImageURL; ?>uploads/capture.png" width="100px" height="98px" style="border-radius:4px;">
					<img ng-if="photo_names.length>7" ng-src="{{photo_names[photo_names.length-8]}}" width="100px" height="98px" style="border-radius:4px;">
				</span>
			</td>
		</tr>
	</table>
	<h1></h1>

						<div class="panel panel-default">
								<form action="#"style="margin-bottom:0px;" method="post" >

									<div style="height:5px;"> </div>
									<span class="form-group" >
										<textarea class="form-control"  ng-model="details" ng-init="details=''" rows="4" id="user_post_details_3" style="margin-left:5px;background-color:#D9D9D9;width:445px;resize:none;font-weight: lighter;" placeholder="Write a review..."></textarea>


									</span>

									<div style="height:7px;"></div>
									<span style="font-size:11px;"></span>
									
 							<div class="row">
										<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12">
											<div>
												<div>
													<span id="image_attach" style="font-size:16px;margin-left:6px; cursor:pointer;" class="icon icon-camera" ng-click="upload_fille()">												
													</span>
										   			 <span ng-show="photo_toggle==0 && details.length==0" style="font-size:11px;font-weight:bold;margin-left:6px; margin-top:-5px;">Attach a Photo to Post
										   			 </span>
										   			 <span  ng-show="photo_toggle==1"  style="font-size:11px;margin-top:-10px;font-weight:bold;margin-left:6px; ">Photo Uploaded
										   			 <i class="ion ion-checkmark-circled" style="color:#00cc00;margin-left:20px;font-size:20px;margin-top:4px;"></i>
										   			 </span>
												</div>
												<div>
													<input type="file" id="post_biz_file_attach" style="width:80px;height:0px" name="post_biz_file_attach" class="hidden" file-model="myFile"  />
												</div>
											</div>

											<span class="badge pull-right" style="background-color:#CB525B;margin-right:6px;margin-top:-20px;">
												<button ng-disabled="photo_toggle==0 && details.length==0" type="button" class="post_review" post-random-feed value="post_business" style="background-color:#CB525B;border:0px;" businessid="{{FullBusiness.business.id}}" userid="{{user_id}}" randrate="0" randprice="0" randdate="{{date_created}}" randdetails={{details}} page="business_page_3_">Post</button>
											</span>
											<div style="height:10px;"></div>
										</div>
									</div>
								</form>
							</div>

		<div  id="business_page_3_posters" ng-controller="RandomBusinessCtrl" >
		
		<div ng-controller="UserWallFeedsCtrl">
			<input type="hidden" ng-model="user_id" ng-init="user_id='<?php echo  $_SESSION['SESS_MEMBER_ID'];  ?>'" />
	        <input type="hidden" ng-model="picker_type" ng-init="picker_type='business_profile'" />
			<input type="hidden" ng-model="picker_business_id" ng-init="picker_business_id='<?php echo $_SESSION['business_id']; ?>'" />
			
			<div ng-if="UserMyWallFeeds.length>0">
				<div ng-include="'Controllers/News_feed/view_reviews.php'" ></div> 
			</div>
			<div ng-show="defaults==1">
				<div ng-include="'Controllers/News_feed/no_business_review.php'" ></div> 
			</div>
		 </div>

		</div>


</div>
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
   <!-- {{FullBusiness.isclaimed}} -->
	<div ng-if="FullBusiness.isclaimed==1">
	<div ng-include="'Controllers/add_business.php'" ></div>
	</div>
	<!-- <div ng-if="FullBusiness.isclaimed==0"> -->
	  <div ng-include="'Controllers/claim.php'" ></div>
	<!-- </div> -->

	 <div class="panel panel-default" style="border:none; border-radius:0px" ng-controller="ReviewCtrl">
							<div class="panel-body">
								<p class="redbright"><B>Review of the day</B></p>

									<div ng-include="'Controllers/day_review.php'" ></div>
							</div>
						</div>

			<div class="panel panel-default" ng-controller="EventCtrl">
							<div class="panel-body">
								<p class="redbright">Latest Events</P>

									<div ng-include="'Controllers/latest_events.php'"></div>

								<h6 > <!-- <a class="redbright">view All</a> --></h6>
							</div>
			</div>

			<div class="panel panel-default" ng-controller="GossipCtrl">
							<div class="panel-body">
								<p class="redbright">Latest Gossip </p>
								<?php //require("Controllers/latest_gossip.php");?>
								<div ng-include="'Controllers/latest_gossip.php'"></div>
								<h6 > <!-- <a class="redbright">view All</a> --></h6>

							</div>
						</div>

			<div class="panel panel-default" ng-controller="RandomBusinessCtrl">
				<div class="panel-body">
					<p class="redfaint">Suggested Places to Follow </p>

					<div ng-include="'Controllers/suggested_places_to_follow.php'"></div>

				</div>
			</div>


			<?php require("Controllers/business_ads.php");?>
</div>
