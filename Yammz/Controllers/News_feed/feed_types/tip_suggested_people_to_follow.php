<!-- Start of Suggested People to follow  Tip -->

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
				<div class="suggested_business_tip_header" style="margin-top:4%;">
					Suggested People to follow
				</div>
				
				<hr style="margin-top:3%;margin-bottom:4%;"></hr>
				
				<!-- Suggested Friend 1 -->
				
				<div class="row" ng-repeat="person_to_follow in people_to_follow track by person_to_follow.id">
					<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 col-xl-2 right_space">
						<img class="img-circle img_profile" style="" ng-src="{{person_to_follow.user.avatar}}"/>
					</div>

					<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 col-xl-6">
						<div class="suggested_friend_name_position" ><a class="friend_tip_anchor" href="">{{person_to_follow.user.first_name}}  {{person_to_follow.user.last_name}}</a></div>
						<span class="help-block light_text" >{{person_to_follow.city.name}}, {{person_to_follow.country.name}}</span>
						
						
					</div>

					<div class="col-sm-5 col-md-3 col-xs-5 col-lg-3 col-xl-3">					
						<div class="form-group">
							<button class="btn btn-responsive add_friend_button" style="height:30px;">
								<span class="icon icon-user "></span>
								<span>Add Friend</span>
							</button>
						</div>
					</div>
				</div>
			
				<!-- Suggested Friend 1 -->

				
				
			</div>
			<!-- End of Business tip 3 -->

		</div>
		<!-- Start of row with the Tips  -->
		<div style="height:10px;"></div>
	</div>

<!-- End of Suggested People to follow  Tip -->