<!-- Start of Suggested places  Tip -->

	<div class="panel-body">
		<!-- Start row with the right most three dots -->
		<div class="row">
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
				<span style="" class="icon icon-three-dots-more-indicator three_dots pull-right"></span>
			</div>
		</div>
		<!-- End of row with the right most three dots -->

		<!-- Start of row with the Business Tips  -->
		<div class="row">
			<!-- column with Tip avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space">
			<img class="img_profile" ng-src="{{BaseImageURL}}uploads/Tip_logo.png">
			</div>
			<!-- End of column with Tip avatar -->
			<!-- Start of column with Tip profile photo,name,date, Tip note and searching field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
				
				<h6>
					<span class="profile_name">Tips</span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>
				<div class="suggested_business_tip_header" style="margin-top:4%;">Suggested Businesses to follow</div>
				
				<hr style="margin-top:4%;margin-bottom:5%;"></hr>
				<!-- Business Tip 1 -->
				<div ng-controller="RandomBusinessCtrl">
					<div ng-include="'Controllers/suggested_places_to_follow.php'"></div>

				</div>
			<!-- End of Business tip 3 -->

				<hr style="margin-top:3%;margin-bottom:10px;"></hr>
			<!-- End of column with Tip profile photo,date, Tip note Searching field -->
		</div>
		<div style="height:10px;"></div>
		<!-- Start of row with the Tips  -->
	</div>

<!-- End of row with the Business Tips  -->