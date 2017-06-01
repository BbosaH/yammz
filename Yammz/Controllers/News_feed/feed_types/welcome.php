<!-- Start of New user welcome feed -->

	<div class="panel-body">
		<!-- Start row with the right most three dots -->
		<div class="row">
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
				<span style="" class="icon icon-three-dots-more-indicator three_dots pull-right"></span>
			</div>
		</div>
		<!-- End of row with the right most three dots -->

		<!-- Start of row with the user profile photo,name,date, welcome note ,like,comments and commenting field -->
		<div class="row">
			<!-- column with avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space">
				<img class="img_profile" ng-src="{{fullUser.user.avatar}}">
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
				<h6>
					<span class="profile_name">{{fullUser.user.first_name}} {{fullUser.user.last_name}}</span><br/>
					<span class="help-block " style="color:#CFCFCF;">03/02/2016 &nbsp; 4hrs ago</span>
				</h6>
				<div class="welcome_notice redbright">Welcome to Yammzit {{fullUser.user.first_name}} {{fullUser.user.last_name}}</div>
				
				<!-- Row with like button and comment button-->
				
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<div class="row" style="height:50px;">
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>

<!-- End of New user welcome feed -->