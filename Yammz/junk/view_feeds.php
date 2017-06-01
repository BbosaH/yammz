<style>
	/* removing border radius from a panel*/
	.no_border{
		border-radius:0px;
	}
		/* Defining properties of the user profile picture*/
	.img_profile{
		width:50px;
		height: :50px;

	}

	/* Defining properties of the user profile name*/
	.profile_name{
		
		font-weight: bold;
		
	}
	/* Defining properties of the user profile update time*/
	.profile_updte_time{
		font-size: 11px;
		font-weight: bold;
		color:#CFCFCF;

	}
	/*Pushing the profile ndame and date section to the left*/
	.profile_name_section_left{
		margin-left:-3%;

	}
	/* Defining properties of the welcome note text*/
	.welcome_notice{
		font-size: 14px;
		font-weight: bold;
		margin-top:7%;
	}
	.suggested_business_tip_header{
		font-size: 14px;
		font-weight: bold;
		margin-top:2%;
	}
	.post_send_button{
		
		height:20px;
		text-align: center;
		border:0px;
		min-width: 50px;
		 font-weight:bold;
		 background-color:#BD2532; 
		 color:white;
		 font-size: 10px;
		 border-radius:6px;
	}
	.comment_field{
		height:20px;
		border:0px;
		background-color: #E9EAEE;
		border-radius: 0px;
		font-size: 10px;
	}
	.send_button_column{
		margin-left: -5%;
	}
	.search_button_column{
		margin-left: -11%;
	}
	.search_button{
		height:20px;
		text-align: center;
		border:0px;
		min-width: 50px;
		 font-weight:bold;
		 background-color:#BD2532; 
		 color:white;
		 font-size: 10px;
		 border-radius:0px;

	}
	.three_dots{
		font-size:23;
		color:#DDDDDD;
		margin-top:-30%;
		
	}
	.horizontal_line{
		margin-bottom: 4px;
	}
	.business_logo_photo{:
		
		height: 380px;
		width: 70px;
	}
	.price_icon_style{color:#00cc00;margin-right:4px;}
	.business_tip_anchor{

		font-size:11px;
		text-decoration:none;

	}
	.friend_tip_anchor{
		text-decoration:none;
		color:#515151;
		

	}
	.suggested_friend_name_position{
		margin-top:10px;
	}
	.add_friend_button{
		font-size:10px;
		background-color:#E9EAEE;
		min-width:90px;
		margin-left:25%;
		height:20px;
		padding-top:4px;
		border:0px;
		margin-top:7px;
		color:#000;
	}
	.empty_right_side_frame{
		border-top:1px;
		border-left:1px;
		border-bottom:1px;
		border-style: solid;
		border-color:#E0E0E0;
		border-right:0px;
		margin-top: 7px;
		margin-left: 10px;
	}
	.outer_profile_letter{
		width:50px;
		height:50px;
		border-radius:30px;
		background-color:#BD2532;
		color:#ffffff;
	}
	.outer_profile_letter_center{
		margin-left:35%;
		padding-top:17%;
		font-size:23px;
	}
	.inner_profile_letter{
		width:28px;
		height:28px;
		border-radius:15px;
		background-color:#BD2532;
		color:#ffffff;
		margin-top:3px;

	}
	.inner_profile_letter_center{
		margin-left:35%;
		padding-top:20%;
		font-size:11.5px;
	}
	.like_commenting_row{
		margin-left:-1%;
		margin-top: 10px;
	}
	.right_most_top_Outer_badge{
		background-color:#BD2532;
		height:50px;
		border-radius:0px;
		border:0px;
		margin-top:-32%;
		margin-bottom: -95%;
	}
	.right_most_top_inner_badge{
		background-color:#BD2532;
		height:50px;
		border-radius:0px;
		border:0px;
		margin-top:-3%;
		margin-bottom: -95%;
	}
	.badge_icon_position{
		font-size:21px;
		margin-top:85%;
	}
	.discovered_rate_icon_size{
		font-size: 18px;
	}
	.going_filled_buttons{
		background-color:#BD2532;
		color:#ffffff;
		font-size:12px;
		height:20px;
		padding-top:1px;
	}
	.going_un_filled_buttons{
		border-color:#BD2532;
		background-color:#ffffff;
		color:#ffffff;
		font-size:12px;
		height:20px;
		padding-top:1px;
		color: #6A6A6A;
		margin-left: 10px;
		
	}
	.going_un_filled_buttons2{
		border-color:#BD2532;
		background-color:#ffffff;
		color:#ffffff;
		font-size:12px;
		height:20px;
		padding-top:1px;
		color: #6A6A6A;
		margin-left: 0px;

	}
	.right_space{
		margin-right: -7px;
	}
	.tip_aling_top{
		margin-top: 10px;
	}
	.follow_icon{
		margin-left:7px;margin-top:4px;font-size:16px;margin-bottom:5px;color:#B1B1B1;
	}
	.follow_text{
		font-size:10px;color:#7D7D7D;
	}
	.light_text{
		color:#CFCFCF;margin-top:2px;font-size:10px;margin-bottom:0px;
	}
	/*today 28.06.2016*/
	.event_title_name{
		margin-bottom:-40px;
		font-size:16px;
	}

	
</style>
<!-- Start of New user welcome feed -->
<div class="panel panel-default no_border">
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
				<img class="img_profile" src="../../admin/Theme/uploads/defavatar.png">
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
				<h6>
					<span class="profile_name">Steven Byamugisha II</span><br/>
					<span class="help-block " style="color:#CFCFCF;">03/02/2016 &nbsp; 4hrs ago</span>
				</h6>
				<div class="welcome_notice">Welcome to Yammzit Steven Byamugisha</div>
				<hr class="horizontal_line"></hr>
				<!-- Row with like button and comment button-->
				<div class="row">
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12">
						<a href=""  style="font-size:9px; background-color:white;text-decoration:none;" id="">
							<span class="icon icon-like85 redbright " style="font-size:16px;"> &nbsp;
								<span class="simplegrey" style="font-size:12;margin-left:-7px;">10 </span>&nbsp;
								<span style="font-size:12;margin-left:-7px;" class="simplegrey">Likes</span>
						</a>
					</div>
					<div class="col-md-6 col-lg-6 col-sm-12 col-xl-6 col-xs-12" style="margin-left:-40px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="glyphicon glyphicon-comment col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Comments</div>
						</div>	
						</a>
					</div>

				</div>
				<!-- End of Row with like and comment buttons -->
				<!-- start of Row with comment field -->
				<div class="row">
					<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
						<form action="" >
							<div class="form-group">
								<input type="text" class="form-control comment_field" placeholder="Write a comment....">
							</div>
						</form>

					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 send_button_column">
						<button class="post_send_button">Send</button>
					</div>
				</div>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>
</div>
<!-- End of New user welcome feed -->

<!-- Start of Search for friend welcome feed -->
<div class="panel panel-default no_border">
	<div class="panel-body">
		<!-- Start row with the right most three dots -->
		<div class="row">
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
				<span style="" class="icon icon-three-dots-more-indicator three_dots pull-right"></span>
			</div>
		</div>
		<!-- End of row with the right most three dots -->

		<!-- Start of row with the Tips profile photo,name,date, Search note and Searching field -->
		<div class="row">
			<!-- column with Tip avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space">
				<img class="img_profile" src="../../admin/Theme/uploads/Tip_logo.png">
			</div>
			<!-- End of column with Tip avatar -->
			<!-- Start of column with Tip profile photo,name,date, Tip note and searching field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">

				<h6>
					<span class="profile_name">Tips</span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>
				<div class="welcome_notice">Search for friends on Yammzit using email</div>
				 <div class="welcome_notice" style="margin-left:20%;margin-top:0px;">Adress and Names</div>
						
				<!-- start of Row with Search field -->
				<div style="margin-top:18px;"></div>
				<div class="row">
					<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">

						<form action="" >
							<div class="form-group">

								<input type="text" class="form-control comment_field" placeholder="Search for Friends....">
							</div>
						</form>

					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 search_button_column">
						<button class="search_button">Search</button>
					</div>
				</div>
				<hr style="margin-top:0%;margin-bottom:0%;"></hr>
				<!-- End of Row with Search field -->
			</div>
			<!-- End of column with Tip profile photo,date, Tip note Searching field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>
</div>
<!-- End of Search for friend welcome feed -->

<!-- Start of Suggested places  Tip -->
<div class="panel panel-default">
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
				<img class="img_profile" src="../../admin/Theme/uploads/Tip_logo.png">
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
				<div class="row">
					<div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 col-xl-3">
						<img class="" width="90px" height="83px" style="border-radius:10px;" src="../../admin/Theme/uploads/3504732_6_b.jpg"/>
					</div>

					<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 col-xl-6">
						<div style="height:7px;"></div>
						<a class="redbright business_tip_anchor" href="" style="font-size:11px;">Cafe Javas</a>
						<span class="help-block light_text" >Plot 36 Bukoto, Kampala, Uganda</span>
						<!-- printing 5 stars -->
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<br/>
						<!-- printing 5 price icons -->
						<i class="ion ion-social-usd price_icon_style"  height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
					</div>

					<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 col-xl-2">
						<div class="icon icon-add182 follow_icon"></div>
						<span class="follow_text">Follow</span>
					</div>
				
				</div>
				<!-- End of Business tip 1 -->

				<!-- Business Tip 2 -->
				<div style="height:20px;"></div>

				<div class="row">
					<div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 col-xl-3">
						<img class="" width="90px" height="83px" style="border-radius:10px;" src="../../admin/Theme/uploads/3504732_6_b.jpg"/>
					</div>

					<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 col-xl-6">
						<div style="height:7px;"></div>
						<a class="redbright business_tip_anchor" href="">Cafe Javas</a>
						<span class="help-block light_text" >Plot 36 Bukoto, Kampala, Uganda</span>
						<!-- printing 5 stars -->
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<br/>
						<!-- printing 5 price icons -->
						<i class="ion ion-social-usd price_icon_style"  height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
					</div>

					<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 col-xl-2">
						<div class="icon icon-add182 follow_icon"></div>
						<span class="follow_text">Follow</span>
					</div>
				</div>
			
				<!-- End of Business tip 2 -->

				<!-- Business Tip 3 -->
				<div style="height:20px;"></div>

				<div class="row">
					<div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 col-xl-3">
						<img class="" width="90px" height="83px" style="border-radius:10px;" src="../../admin/Theme/uploads/3504732_6_b.jpg"/>
					</div>

					<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 col-xl-6">
						<div style="height:7px;"></div>
						<a class="redbright business_tip_anchor" href="">Cafe Javas</a>
						<span class="help-block light_text" >Plot 36 Bukoto, Kampala, Uganda</span>
						<!-- printing 5 stars -->
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<i class="ion ion-ios-star redbright" width="15px" height="15px"/>
						<br/>
						<!-- printing 5 price icons -->
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
						<i class="ion ion-social-usd price_icon_style"  width="15px" height="15px"/>
					</div>

					<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 col-xl-2">
						<div class="icon icon-add182 follow_icon"></div>
						<span class="follow_text">Follow</span>
					</div>
				
				</div>
			</div>
			<!-- End of Business tip 3 -->

			<hr style="margin-top:3%;margin-bottom:10px;"></hr>
			<!-- End of column with Tip profile photo,date, Tip note Searching field -->
		</div>
		<div style="height:10px;"></div>
		<!-- Start of row with the Tips  -->
	</div>
</div>
<!-- End of row with the Business Tips  -->

<!-- Start of Suggested People to follow  Tip -->
<div class="panel panel-default">
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
				<img class="img_profile" src="../../admin/Theme/uploads/Tip_logo.png">
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
				
				<div class="row">
					<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 col-xl-2 right_space">
						<img class="img-circle img_profile" style="" src="../../admin/Theme/uploads/defavatar.png"/>
					</div>

					<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 col-xl-6">
						<div class="suggested_friend_name_position" ><a class="friend_tip_anchor" href="">Steven Byamugisha II</a></div>
						<span class="help-block light_text" >Dubai, United Arab Emirates</span>
						
						
					</div>

					<div class="col-sm-5 col-md-3 col-xs-5 col-lg-3 col-xl-3">					
						<div class="form-group">
							<button class="btn btn-responsive add_friend_button">
								<span class="icon icon-user "></span>
								<span>Add Friend</span>
							</button>
						</div>
					</div>
				</div>
			
				<!-- Suggested Friend 1 -->

				<!-- Suggested Friend 2 -->
				<div style="height:20px;"></div>
				<div class="row">
					<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 col-xl-2 right_space">
						<img class="img-circle img_profile" style="" src="../../admin/Theme/uploads/defavatar.png"/>
					</div>

					<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 col-xl-6">
						<div class="suggested_friend_name_position" ><a class="friend_tip_anchor" href="">Kevin Gasta</a></div>
						<span class="help-block light_text" >Dubai, United Arab Emirates</span>
						
						
					</div>

					<div class="col-sm-5 col-md-3 col-xs-5 col-lg-3 col-xl-3">					
						<div class="form-group">
							<button class="btn btn-responsive add_friend_button">
								<span class="icon icon-user "></span>
								<span>Add Friend</span>
							</button>
						</div>
					</div>
				</div>
			
				<!-- End Suggested Friend 2 -->

				<!-- Suggested Friend 3 -->
				<div style="height:20px;"></div>
				<div class="row">
					<div class="col-sm-2 col-md-2 col-xs-2 col-lg-2 col-xl-2 right_space">
						<img class="img-circle img_profile" style="" src="../../admin/Theme/uploads/defavatar.png"/>
					</div>

					<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 col-xl-6">
						<div class="suggested_friend_name_position" ><a class="friend_tip_anchor" href="">Nomis Wilson</a></div>
						<!-- <div class="profile_updte_time">wilsnomis@gmail.com</div> -->
						<span class="help-block light_text" >wilsnomis@gmail.com</span>
						
					</div>

					<div class="col-sm-5 col-md-3 col-xs-5 col-lg-3 col-xl-3">					
						<div class="form-group">
							<button class="btn btn-responsive add_friend_button">
								<span class="icon icon-user "></span>
								<span>Add Friend</span>
							</button>
						</div>
					</div>
				</div>
			
				<!-- Suggested Friend 3 -->
				
			</div>
			<!-- End of Business tip 3 -->

		</div>
		<!-- Start of row with the Tips  -->
		<div style="height:10px;"></div>
	</div>
</div>
<!-- End of Suggested People to follow  Tip -->

<!-- Start of Discover places/Businesses and share with your friends -->
<div class="panel panel-default">
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
				<img class="img_profile" src="../../admin/Theme/uploads/Tip_logo.png">
			</div>
			<!-- End of column with Tip avatar -->
			<!-- Start of column with Tip profile photo,name,date, Tip note and searching field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
				
				<h6>
					<span class="profile_name">Tips</span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>
				<div class="suggested_business_tip_header" style="margin-top:4%;">
					Discover New Places / Businesses and share
					<div style="margin-left:25%;">with your Friends</div> 
				</div>
				
				<hr style="margin-top:3%;margin-bottom:4%;"></hr>
				
				<div class="row">
					<div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-xs-4">
						<img src="../../admin/Theme/uploads/Discover business.png" width="80px" height="80px;">
					</div>
					<div class="col-md-8 col-lg-8 col-sm-8 col-xl-8 col-xs-8" style="margin-left:-10%;margin-right:0%;">
						<div style="color:#E04343;font-size:11px;margin-top:20px;">
							Connect People with <B>Great</B> Local <B>Businesses</B> 
						</div>
						<div style="color:#E04343;font-size:11px;margin-top:0px;margin-left:25%;">around the world.</div>

						<button class="btn btn-responsive" style="background-color:#BD2532;color:#ffffff;font-size:10px;height:20px;padding-top:2px;margin-top:10px;border-radius:6px;margin-left:25%;">							
							<span>Add Business</span>
						</button>
					</div>
					
				</div>
				
			</div>
			<!-- End of Business tip 3 -->

		</div>
		<!-- Start of row with the Tips  -->
		<div style="height:30px;"></div>
	</div>
</div>
<!-- ENd of Discover places/Businesses and share with your friends -->

<!-- Start of Rate Review -->
<div class="panel panel-default no_border">
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
				<div class="outer_profile_letter">
					<div class="outer_profile_letter_center">B</div>					
				</div>
			</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
				<h6>					
					<span class="profile_name">Steven Byamugisha II <span style="font-weight:lighter">rated</span> Cafe Javas</span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>
			</div>
		</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		<div class="row" style="margin-left:-1%;">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12 ">
				

				<div class="row" style="margin-top:10px;">
					<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-xs-6">
						<i class="ion ion-ios-star redbright" style="font-size:25px;" />&nbsp;
						<i class="ion ion-ios-star-outline redbright" style="font-size:25px;"/>&nbsp;
						<i class="ion ion-ios-star-outline redbright" style="font-size:25px;"/>&nbsp;
						<i class="ion ion-ios-star-outline redbright" style="font-size:25px;"/>&nbsp;
						<i class="ion ion-ios-star-outline redbright" style="font-size:25px;"/>
					</div>
					<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-xs-6" style="margin-left:0%;">
						<i class="ion ion-social-usd price_icon_style" style="font-size:25px;" />&nbsp;
						<i class="ion ion-social-usd-outline price_icon_style" style="font-size:25px;" />&nbsp;
						<i class="ion ion-social-usd-outline price_icon_style" style="font-size:25px;" />&nbsp;
						<i class="ion ion-social-usd-outline price_icon_style" style="font-size:25px;" />&nbsp;
						<i class="ion ion-social-usd-outline price_icon_style" style="font-size:25px;" />
					</div>
					
				</div>

				<hr class="horizontal_line"></hr>
				<!-- Row with like button and comment button-->
				
				<div class="row">
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12">
						<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="">
							<span class="icon icon-like85 redbright " style="font-size:16px;"> &nbsp;
								<span class="simplegrey" style="font-size:12;margin-left:-7px;">10 </span>&nbsp;
								<span style="font-size:12;margin-left:-7px;" class="simplegrey">Likes</span>
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:-40px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="glyphicon glyphicon-comment col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Comments</div>
						</div>	
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:0px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="icon icon-sharing6 col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Shares</div>
						</div>	
						</a>
					</div>
				</div>			
		
				<!-- End of Row with like and comment buttons -->
				<!-- start of Row with comment field -->
				<div style="height:5px;"></div>
				<div class="row">
					<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
						<form action="" >
							<div class="form-group">
								<input type="text" class="form-control comment_field" placeholder="Write a comment....">
							</div>
						</form>

					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 send_button_column">
						<button class="post_send_button">Send</button>
					</div>
				</div>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>
</div>
<!-- End of Rate Review -->

<!-- Start of Became Friends Review -->
<div class="panel panel-default no_border">
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
				<div class="outer_profile_letter">
					<div class="outer_profile_letter_center">B</div>					
				</div>
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
				
				<h6 style="margin-top:4px;">					
					<span class="profile_name">Steven Byamugisha II <span style="font-weight:lighter">and</span>Gasta Kevin<br/> <span style="font-weight:lighter;">are now Friends</span></span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-lg-3 col-sm-3 col-xl-3 col-xs-3">	

			</div>
			<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-xs-6">	
			<img src="../../admin/Theme/uploads/New_friends_icon.png" style="width:170px;height:120px;">
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3 col-xl-3 col-xs-3">	

			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">	
				<hr class="horizontal_line"></hr>
				<!-- Row with like button and comment button-->
				<div class="row">
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12">
						<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="">
							<span class="icon icon-like85 redbright " style="font-size:16px;"> &nbsp;
								<span class="simplegrey" style="font-size:12;margin-left:-7px;">10 </span>&nbsp;
								<span style="font-size:12;margin-left:-7px;" class="simplegrey">Likes</span>
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:-40px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="glyphicon glyphicon-comment col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Comments</div>
						</div>	
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:0px;">
						<!-- <a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="icon icon-sharing6 col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Shares</div>
						</div>	
						</a> -->
					</div>
				</div>
				<!-- End of Row with like and comment buttons -->
				<!-- start of Row with comment field -->
				<div style="height:5px;"></div>
				<div class="row">
					<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
						<form action="" >
							<div class="form-group">
								<input type="text" class="form-control comment_field" placeholder="Write a comment....">
							</div>
						</form>

					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 send_button_column">
						<button class="post_send_button">Send</button>
					</div>
				</div>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>
</div>
<!-- End of Became Friends Review -->

<!-- Start of Shared a review -->
<div class="panel panel-default no_border">
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
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space" >
				<div class="outer_profile_letter">
					<div class="outer_profile_letter_center">B</div>					
				</div>
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
			
				<h6>					
					<span class="profile_name">Steven Byamugisha II <span style="font-weight:lighter">shared a Review</span> </span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>

			</div>
		</div>
		<div class="row">
			<!-- <div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1"></div> -->
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">

				<div class="empty_right_side_frame">
					<div class="row" style="margin-top:5px;margin-bottom:10px;margin-left:0px;">
						<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">	
							<div class="inner_profile_letter">
								<div class="inner_profile_letter_center">K</div>	
							</div>
						</div>
						<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
							<div class="profile_name" style="font-size:11px;">Kevin Gasta <span style="font-weight:lighter;">wrote  review for</span> Cafe Javas</div>
							<div class="profile_updte_time " style="color:#CFCFCF;">06/06/2016 3hrs ago</div>

							<div class="row">
								<div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5">
									<i class="ion ion-ios-star redbright" style="font-size:15px;" />
									<i class="ion ion-ios-star-outline redbright" style="font-size:15px;"/>
									<i class="ion ion-ios-star-outline redbright" style="font-size:15px;"/>
									<i class="ion ion-ios-star-outline redbright" style="font-size:15px;"/>
									<i class="ion ion-ios-star-outline redbright" style="font-size:15px;"/>
								</div>
								<div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5">
									<i class="ion ion-social-usd price_icon_style" style="font-size:15px;" />
									<i class="ion ion-social-usd-outline price_icon_style" style="font-size:15px;" />
									<i class="ion ion-social-usd-outline price_icon_style" style="font-size:15px;" />
									<i class="ion ion-social-usd-outline price_icon_style" style="font-size:15px;" />
									<i class="ion ion-social-usd-outline price_icon_style" style="font-size:15px;" />
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
									ikikik ikiki kikik ikgklb klk gjkltkll jkk  fdjjkj jkjkj jkjk
									ikikik ikiki kikik ikgklb klk gjkltkll jkk  fdjjkj jkjkj jkjk
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">	
				
				<!-- Row with like button and comment button-->
				<div class="row like_commenting_row">
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12">
						<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="">
							<span class="icon icon-like85 redbright " style="font-size:16px;"> &nbsp;
								<span class="simplegrey" style="font-size:12;margin-left:-7px;">10 </span>&nbsp;
								<span style="font-size:12;margin-left:-7px;" class="simplegrey">Likes</span>
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:-40px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="glyphicon glyphicon-comment col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Comments</div>
						</div>	
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:0px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="icon icon-sharing6 col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Shares</div>
						</div>	
						</a>
					</div>
				</div>
				<!-- End of Row with like and comment buttons -->
				<!-- start of Row with comment field -->
				<div class="row like_commenting_row">
					<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
						<form action="" >
							<div class="form-group">
								<input type="text" class="form-control comment_field" placeholder="Write a comment....">
							</div>
						</form>

					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 send_button_column">
						<button class="post_send_button">Send</button>
					</div>
				</div>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>
</div>
<!-- End of Shared a review -->

<!-- Start of created New Gossip Topic -->
<div class="panel panel-default no_border">
	<div class="panel-body">
		<!-- Start row with the right most three dots -->
		<div class="row">
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
				<div class="badge right_most_top_Outer_badge" >
					<div class="icon icon-leader badge_icon_position"></div>
				</div>
			</div>
		</div>
		<!-- End of row with the right most three dots -->

		<!-- Start of row with the user profile photo,name,date, welcome note ,like,comments and commenting field -->
		<div class="row">
			<!-- column with avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space">
				<div class="outer_profile_letter">
					<div class="outer_profile_letter_center">B</div>					
				</div>
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
			
				<h6>					
					<span class="profile_name">Steven Byamugisha II <span style="font-weight:lighter">shared a Review</span> </span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>
			</div>
		</div>
		<div class="row like_commenting_row">
			<!-- <div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1"></div> -->
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12 ">
				<p class="redbright">Kampala Hood Nation</p>
				<img src="../../admin/Theme/uploads/7333626_orig.jpg" style="width:100%;height:200px;">

				<p style="margin-top:8px;">
					Hello bosss, jkjkgtf hjjhjh jhjkjk hjkjkdf jj kj kds jj kj k df kj l lkdx kjl jkl kl jklk jl kld Hello bosss, jkjkgtf hjjhjh jhjkjk hjkjkdf jjkjkds jjkj kdf kj l lkdx kjl jkl kl jklk jl kld....... <a href="" class="redbright" style="text-decoration:none;font-size:12px;" Data-target="#"> Read More</a>				
				</p>				
				<h6>
					<span class="help-block " style="color:#CFCFCF;margin-bottom:-30px;">06/06/2016 by Steven Byamugisha</span>
				</h6>
			</div>
			
		</div>
		<div class="row ">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">	
				<hr class="horizontal_line"></hr>
				<!-- Row with like button and comment button-->
				<div class="row like_commenting_row">
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12">
						<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="">
							<span class="icon icon-like85 redbright " style="font-size:16px;"> &nbsp;
								<span class="simplegrey" style="font-size:12;margin-left:-7px;">10 </span>&nbsp;
								<span style="font-size:12;margin-left:-7px;" class="simplegrey">Likes</span>
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:-40px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="glyphicon glyphicon-comment col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Comments</div>
						</div>	
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:0px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="icon icon-sharing6 col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Shares</div>
						</div>	
						</a>
					</div>
				</div>
				<!-- End of Row with like and comment buttons -->
				<!-- start of Row with comment field -->
				<div class="row like_commenting_row">
					<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
						<form action="" >
							<div class="form-group">
								<input type="text" class="form-control comment_field" placeholder="Write a comment....">
							</div>
						</form>

					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 send_button_column">
						<button class="post_send_button">Send</button>
					</div>
				</div>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>
</div>
<!-- End of Shared a review -->

<!-- Start of shared a Gossip Topic -->
<div class="panel panel-default no_border">
	<div class="panel-body">	

		<!-- Start of row with the user profile photo,name,date, welcome note ,like,comments and commenting field -->
		<div class="row">
			<!-- column with avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space">
				<div class="outer_profile_letter">
					<div class="outer_profile_letter_center">B</div>					
				</div>
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
				<h6>					
					<span class="profile_name">Steven Byamugisha II <span style="font-weight:lighter">shared a Review</span> </span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>
			</div>
		</div>
		<div class="row">
			<!-- <div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1"></div> -->
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">

				<div class="empty_right_side_frame">
					<!-- Start row with the right most badge -->
					<div class="row">
						<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
						<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
							<div class="badge right_most_top_inner_badge" >
								<div class="icon icon-leader badge_icon_position"></div>
							</div>
						</div>
					</div>
					<!-- End of row with the right most badge -->
					<div class="row" style="margin-top:5px;margin-bottom:10px;margin-left:0px;">
						<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">	
							<div class="inner_profile_letter">
								<div class="inner_profile_letter_center">K</div>	
							</div>
						</div>
						<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">							
							<div class="profile_name" style="font-size:11px;">Kevin Gasta <span style="font-weight:lighter;">wrote  review for</span> Cafe Javas</div>
							<div class="profile_updte_time" style="color:#CFCFCF;">06/06/2016 3hrs ago</div>
						</div>
					</div>
					<div class="row" style="margin-left:0px;" >
						<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
							<p class="redbright">Kampala Hood Nation</p>
							<img src="../../admin/Theme/uploads/7333626_orig.jpg" style="width:100%;height:200px;">

							<p style="margin-top:8px;">
								Hello bosss, jkjkgtf hjjhjh jhjkjk hjkjkdf jj kj kds jj kj k df kj l lkdx kjl jkl kl jklk jl kld Hello bosss, jkjkgtf hjjhjh jhjkjk hjkjkdf jjkjkds jjkj kdf kj l lkdx kjl jkl kl jklk jl kld....... <a href="" class="redbright" style="text-decoration:none;font-size:12px;" Data-target="#"> Read More</a>				
							</p>
							
							<h6>
								<span class="help-block " style="color:#CFCFCF;margin-bottom:0px;">06/06/2016 by Steven Byamugisha</span>
							</h6>
						</div>
					</div>
				</div>
			</div>			
		</div>
		<div class="row ">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">	
				
				<!-- Row with like button and comment button-->
				<div class="row like_commenting_row" style="margin-top:10px;">
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12">
						<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="">
							<span class="icon icon-like85 redbright " style="font-size:16px;"> &nbsp;
								<span class="simplegrey" style="font-size:12;margin-left:-7px;">10 </span>&nbsp;
								<span style="font-size:12;margin-left:-7px;" class="simplegrey">Likes</span>
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:-40px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="glyphicon glyphicon-comment col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Comments</div>
						</div>	
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:0px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="icon icon-sharing6 col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Shares</div>
						</div>	
						</a>
					</div>
				</div>
				<!-- End of Row with like and comment buttons -->
				<!-- start of Row with comment field -->
				<div class="row like_commenting_row">
					<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
						<form action="" >
							<div class="form-group">
								<input type="text" class="form-control comment_field" placeholder="Write a comment....">
							</div>
						</form>

					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 send_button_column">
						<button class="post_send_button">Send</button>
					</div>
				</div>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>
</div>
<!-- End of shared a Gossip topic -->

<!-- Start of discovered business -->
<div class="panel panel-default no_border">
	<div class="panel-body">
		<!-- Start row with the right most three dots -->
	<!-- 	<div class="row">
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
				<div class="badge right_most_top_Outer_badge" >
					<div class="icon icon-carnival48 " style="font-size:26px;margin-top:17px;"></div>
				</div>
			</div>
		</div>
 -->
		<div class="row">
						<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
						<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
							<div class="badge right_most_top_Outer_badge" >
								<div class="icon icon-carnival48 badge_icon_position"></div>
							</div>
						</div>
					</div>
		<!-- End of row with the right most three dots -->

		<!-- Start of row with the user profile photo,name,date, welcome note ,like,comments and commenting field -->
		<div class="row">
			<!-- column with avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space">
				<div class="outer_profile_letter">
					<div class="outer_profile_letter_center">B</div>					
				</div>
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
				
				<h6>					
					<span class="profile_name">Steven Byamugisha II <span style="font-weight:lighter">discovered</span> Cafe Javas </span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>
			</div>
		</div>
		<div class="row like_commenting_row">
			<!-- <div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1"></div> -->
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12 ">
				
				<img src="../../admin/Theme/uploads/7333626_orig.jpg" style="width:100%;height:200px;">
				<p class="redbright" style="margin-bottom:1px;margin-top:10px;">Cafe Javas</p>
				
				<div class="profile_updte_time" style="margin-bottom:5px;">Plot 36 Bukoto, Kampala, Uganda</div>
				
				<div class="row">
					<div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5 ">
						<i class="ion ion-ios-star-outline redbright discovered_rate_icon_size" />
						<i class="ion ion-ios-star-outline redbright discovered_rate_icon_size" />	
						<i class="ion ion-ios-star-outline redbright discovered_rate_icon_size"/>	
						<i class="ion ion-ios-star-outline redbright discovered_rate_icon_size" />	
						<i class="ion ion-ios-star-outline redbright discovered_rate_icon_size" />							
					</div>

					<div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5 ">						
						<i class="ion ion-social-usd-outline price_icon_style discovered_rate_icon_size"/>
						<i class="ion ion-social-usd-outline price_icon_style discovered_rate_icon_size" />
						<i class="ion ion-social-usd-outline price_icon_style discovered_rate_icon_size"/>
						<i class="ion ion-social-usd-outline price_icon_style discovered_rate_icon_size"/>
						<i class="ion ion-social-usd-outline price_icon_style discovered_rate_icon_size"/>
					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
						<div class="icon icon-add182" style="color:#ECCB37;font-size:16px;margin-top:-15px;"></div>
						<div style="font-size:10px;margin-left:-7px;color:#C4C4C4;margin-top:4px;">Follow</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="row ">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">	
				<hr class="horizontal_line" style="margin-top:8px;"></hr>
				<!-- Row with like button and comment button-->
				<div class="row like_commenting_row">
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12">
						<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="">
							<span class="icon icon-like85 redbright " style="font-size:16px;"> &nbsp;
								<span class="simplegrey" style="font-size:12;margin-left:-7px;">10 </span>&nbsp;
								<span style="font-size:12;margin-left:-7px;" class="simplegrey">Likes</span>
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:-40px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="glyphicon glyphicon-comment col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Comments</div>
						</div>	
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:0px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="icon icon-sharing6 col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Shares</div>
						</div>	
						</a>
					</div>
				</div>
				<!-- End of Row with like and comment buttons -->
				<!-- start of Row with comment field -->
				<div class="row like_commenting_row">
					<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
						<form action="" >
							<div class="form-group">
								<input type="text" class="form-control comment_field" placeholder="Write a comment....">
							</div>
						</form>

					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 send_button_column">
						<button class="post_send_button">Send</button>
					</div>
				</div>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>
</div>
<!-- End of discovered business -->

<!-- Start of shared discovery -->
<div class="panel panel-default no_border">
	<div class="panel-body">	

		<!-- Start of row with the user profile photo,name,date, welcome note ,like,comments and commenting field -->
		<div class="row">
			<!-- column with avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space">
				<div class="outer_profile_letter">
					<div class="outer_profile_letter_center">B</div>					
				</div>
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">			
				<h6>					
					<span class="profile_name">Steven Byamugisha II <span style="font-weight:lighter">shared</span> Kevin Gasta's <span style="font-weight:lighter">discovery</span></span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>
			</div>
		</div>
		<div class="row">
			<!-- <div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1"></div> -->
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">

				<div class="empty_right_side_frame">
					<!-- Start row with the right most badge -->
					<div class="row">
						<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
						<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
							<div class="badge right_most_top_inner_badge" >
								<div class="icon icon-carnival48 badge_icon_position"></div>
							</div>
						</div>
					</div>
					<!-- End of row with the right most badge -->
					<div class="row" style="margin-top:5px;margin-bottom:10px;margin-left:0px;">
						<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">	
							<div class="inner_profile_letter">
								<div class="inner_profile_letter_center">K</div>	
							</div>
						</div>
						<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
							<div class="profile_name">Kevin Gasta <span style="font-weight:lighter;">discovered</span> Cafe Javas</div>
							<div class="profile_updte_time">06/06/2016 3hrs ago</div>

						</div>
					</div>
					<div class="row" style="margin-left:0px;" >
						<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
						
							<img src="../../admin/Theme/uploads/7333626_orig.jpg" style="width:100%;height:200px;">
							<p class="redbright" style="margin-bottom:1px;margin-top:10px;">Cafe Javas</p>
				
							<div class="profile_updte_time" style="margin-bottom:5px;">Plot 36 Bukoto, Kampala, Uganda</div>
							
							<div class="row">
								<div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5 ">
									<i class="ion ion-ios-star-outline redbright discovered_rate_icon_size" />
									<i class="ion ion-ios-star-outline redbright discovered_rate_icon_size" />	
									<i class="ion ion-ios-star-outline redbright discovered_rate_icon_size"/>	
									<i class="ion ion-ios-star-outline redbright discovered_rate_icon_size" />	
									<i class="ion ion-ios-star-outline redbright discovered_rate_icon_size" />							
								</div>

								<div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5 ">						
									<i class="ion ion-social-usd-outline price_icon_style discovered_rate_icon_size"/>
									<i class="ion ion-social-usd-outline price_icon_style discovered_rate_icon_size" />
									<i class="ion ion-social-usd-outline price_icon_style discovered_rate_icon_size"/>
									<i class="ion ion-social-usd-outline price_icon_style discovered_rate_icon_size"/>
									<i class="ion ion-social-usd-outline price_icon_style discovered_rate_icon_size"/>
								</div>
								<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
									<div class="icon icon-add182" style="color:#ECCB37;font-size:16px;margin-top:-15px;"></div>
									<div style="font-size:10px;margin-left:-7px;color:#C4C4C4;margin-top:4px;">Follow</div>
								</div>
							</div>
							<div style="height:5px;"></div>							
						</div>
					</div>
				</div>
			</div>			
		</div>
		<div class="row ">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">				
				<!-- Row with like button and comment button-->
				<div class="row like_commenting_row" style="margin-top:10px;">
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12">
						<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="">
							<span class="icon icon-like85 redbright " style="font-size:16px;"> &nbsp;
								<span class="simplegrey" style="font-size:12;margin-left:-7px;">10 </span>&nbsp;
								<span style="font-size:12;margin-left:-7px;" class="simplegrey">Likes</span>
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:-40px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="glyphicon glyphicon-comment col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Comments</div>
						</div>	
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:0px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="icon icon-sharing6 col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Shares</div>
						</div>	
						</a>
					</div>
				</div>
				<!-- End of Row with like and comment buttons -->
				<!-- start of Row with comment field -->
				<div class="row like_commenting_row">
					<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
						<form action="" >
							<div class="form-group">
								<input type="text" class="form-control comment_field" placeholder="Write a comment....">
							</div>
						</form>

					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 send_button_column">
						<button class="post_send_button">Send</button>
					</div>
				</div>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>
</div>
<!-- End of shared discovery -->

<!-- Start of New Created Event -->
<div class="panel panel-default no_border">
	<div class="panel-body">

		<div class="row">
						<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
						<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
							<div class="badge right_most_top_Outer_badge" >
								<div class="icon icon-carnival48 badge_icon_position"></div>
							</div>
						</div>
					</div>
		<!-- End of row with the right most three dots -->

		<!-- Start of row with the user profile photo,name,date, welcome note ,like,comments and commenting field -->
		<div class="row">
			<!-- column with avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space">
				<div class="outer_profile_letter">
					<div class="outer_profile_letter_center">B</div>					
				</div>
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
				
				<h6>					
					<span class="profile_name">
						Steven Byamugisha II <span style="font-weight:lighter">created a New Public Event</span>
					</span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>
			</div>
		</div>
		<div class="row like_commenting_row">
			<!-- <div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1"></div> -->
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12 ">
				
				<img src="../../admin/Theme/uploads/7333626_orig.jpg" style="width:100%;height:200px;">
				
				<div class="row" style="margin-top:15px;">
					<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">
						<div style="font-size:16px;margin-top:2px;" class="icon icon-map-pointer7"></div>												
					</div>

					<div class="col-md-11 col-lg-11 col-sm-11 col-xl-11 col-xs-11 ">						
						<p class="redbright event_title_name">KCCA Kampala street party</p>					
					</div>
					
				</div>
				<div class="row" style="margin-top:8px;" >
					<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">
																		
					</div>

					<div class="col-md-11 col-lg-11 col-sm-11 col-xl-11 col-xs-11 ">						
						<i class="ion ion-ios-star redbright" />
						<i class="ion ion-ios-star redbright" />
						<i class="ion ion-ios-star redbright" />
						<i class="ion ion-ios-star redbright" />
						<i class="ion ion-ios-star redbright" />
						<span style="font-size:12px;">1 Comments</span>					
					</div>					
				</div>

				<div class="row" style="margin-top:15px;">
					<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">
						<div style="font-size:16px;margin-top:2px;" class="icon icon-calendar181"></div>												
					</div>

					<div class="col-md-11 col-lg-11 col-sm-11 col-xl-11 col-xs-11 ">						
						<p style="font-size:12px;">From: Sunday, 20 Dec, 15:00</p>
						<p style="font-size:12px;margin-top:-10px;">To: 17:00</p>						
					</div>
					
				</div>

				<div class="row" style="margin-top:5px;">
					<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">
						<div style="font-size:16px;margin-top:2px;" class="icon icon-money191"></div>												
					</div>

					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 " style="margin-right:5%;">						
						<p style="font-size:12px;">Free</p>											
					</div>
					<div class="col-md-2 col-lg-2 col-sm-12 col-xl-2 col-xs-6 ">						
						
						<button class="btn going_filled_buttons" >I'm Going</button>									
					</div>
					<div class="col-md-3 col-lg-3 col-sm-12 col-xl-3 col-xs-6 ">						
						<button class="btn going_un_filled_buttons" >Sounds Cool</button>						
					</div>
					<div class="col-md-3 col-lg-3 col-sm-12 col-xl-3 col-xs-12 ">						
						<button class="btn going_un_filled_buttons2" >Invite Friends</button>			
					</div>
					
				</div>
			</div>			
		</div>
		<div class="row ">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">	
				<hr class="horizontal_line" style="margin-top:6px;"></hr>
				<!-- Row with like button and comment button-->
				<div class="row like_commenting_row">
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12">
						<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="">
							<span class="icon icon-like85 redbright " style="font-size:16px;"> &nbsp;
								<span class="simplegrey" style="font-size:12;margin-left:-7px;">10 </span>&nbsp;
								<span style="font-size:12;margin-left:-7px;" class="simplegrey">Likes</span>
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:-40px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="glyphicon glyphicon-comment col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Comments</div>
						</div>	
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:0px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="icon icon-sharing6 col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Shares</div>
						</div>	
						</a>
					</div>
				</div>
				<!-- End of Row with like and comment buttons -->
				<!-- start of Row with comment field -->
				<div class="row like_commenting_row">
					<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
						<form action="" >
							<div class="form-group">
								<input type="text" class="form-control comment_field" placeholder="Write a comment....">
							</div>
						</form>

					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 send_button_column">
						<button class="post_send_button">Send</button>
					</div>
				</div>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>
</div>
<!-- End of New Created Event -->

<!-- Start of shared New public Event -->
<div class="panel panel-default no_border">
	<div class="panel-body">	

		<!-- Start of row with the user profile photo,name,date, welcome note ,like,comments and commenting field -->
		<div class="row">
			<!-- column with avatar -->
			<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 right_space">
				<div class="outer_profile_letter">
					<div class="outer_profile_letter_center">B</div>					
				</div>
			</div>
			<!-- End of column with avatar -->
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
			<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10 profile_name_section_left">
				
				<h6>					
					<span class="profile_name">
						Steven Byamugisha II <span style="font-weight:lighter">shared</span>
						Kevin Gasta's <span style="font-weight:lighter">discovery</span>
					</span><br/>
					<span class="help-block " style="color:#CFCFCF;">06/06/2016 3hrs ago</span>
				</h6>
			</div>
		</div>
		<div class="row">
			<!-- <div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1"></div> -->
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">

				<div class="empty_right_side_frame">
					<!-- Start row with the right most badge -->
					<div class="row">
						<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10"></div>
						<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2">
							<div class="badge right_most_top_inner_badge" >
								<div class="icon icon-carnival48 badge_icon_position"></div>
							</div>
						</div>
					</div>
					<!-- End of row with the right most badge -->
					<div class="row" style="margin-top:5px;margin-bottom:10px;margin-left:0px;">
						<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">	
							<div class="inner_profile_letter">
								<div class="inner_profile_letter_center">K</div>	
							</div>
						</div>
						<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
							<div class="profile_name">Kevin Gasta <span style="font-weight:lighter;">created a New Public Event</span></div>
							<div class="profile_updte_time">06/06/2016 3hrs ago</div>

						</div>
					</div>
					<div class="row" style="margin-left:0px;" >
						<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
						
							<img src="../../admin/Theme/uploads/7333626_orig.jpg" style="width:100%;height:200px;">

								<div class="row" style="margin-top:15px;">
									<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">
										<div style="font-size:16px;margin-top:2px;" class="icon icon-map-pointer7"></div>												
									</div>

									<div class="col-md-11 col-lg-11 col-sm-11 col-xl-11 col-xs-11 ">						
										<p class="redbright event_title_name">KCCA Kampala street party</p>					
									</div>
									
								</div>
								<div class="row" style="margin-top:8px;" >
									<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">
																						
									</div>

									<div class="col-md-11 col-lg-11 col-sm-11 col-xl-11 col-xs-11 ">						
										<i class="ion ion-ios-star redbright" />
										<i class="ion ion-ios-star redbright" />
										<i class="ion ion-ios-star redbright" />
										<i class="ion ion-ios-star redbright" />
										<i class="ion ion-ios-star redbright" />
										<span style="font-size:12px;">1 Comments</span>					
									</div>					
								</div>

								<div class="row" style="margin-top:15px;">
									<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">
										<div style="font-size:16px;margin-top:2px;" class="icon icon-calendar181"></div>												
									</div>

									<div class="col-md-11 col-lg-11 col-sm-11 col-xl-11 col-xs-11 ">						
										<p style="font-size:12px;">From: Sunday, 20 Dec, 15:00</p>
										<p style="font-size:12px;margin-top:-10px;">To: 17:00</p>						
									</div>
									
								</div>

								<div class="row" style="margin-top:5px;">
									<div class="col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1 right_space">
										<div style="font-size:16px;margin-top:2px;" class="icon icon-money191"></div>												
									</div>

									<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 " style="margin-right:5%;">						
										<p style="font-size:12px;">Free</p>											
									</div>
									<div class="col-md-2 col-lg-2 col-sm-12 col-xl-2 col-xs-6 ">						
										
										<button class="btn going_filled_buttons" >I'm Going</button>									
									</div>
									<div class="col-md-3 col-lg-3 col-sm-12 col-xl-3 col-xs-6 ">						
										<button class="btn going_un_filled_buttons" >Sounds Cool</button>						
									</div>
									<div class="col-md-3 col-lg-3 col-sm-12 col-xl-3 col-xs-12 ">						
										<button class="btn going_un_filled_buttons2" >Invite Friends</button>			
									</div>
									
								</div>
							<div style="height:5px;"></div>							
						</div>
					</div>
				</div>
			</div>			
		</div>
		<div class="row ">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">				
				<!-- Row with like button and comment button-->
				<div class="row like_commenting_row" style="margin-top:10px;">
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12">
						<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="">
							<span class="icon icon-like85 redbright " style="font-size:16px;"> &nbsp;
								<span class="simplegrey" style="font-size:12;margin-left:-7px;">10 </span>&nbsp;
								<span style="font-size:12;margin-left:-7px;" class="simplegrey">Likes</span>
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:-40px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="glyphicon glyphicon-comment col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Comments</div>
						</div>	
						</a>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 col-xl-4 col-xs-12" style="margin-left:0px;">
						<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
						<div class="row">
							<div style="font-size:16px;margin-top:-3px;" class="icon icon-sharing6 col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 pull-left"></div>
							<div class="simplegrey col-md-1 col-lg-1 col-sm-1 col-xl-1 col-xs-1" style="font-size:12;margin-left:-7px;font-weight:bold;margin-top:-3px;">2 </div>
							<div class="simplegrey col-md-5 col-lg-5 col-sm-5 col-xl-5 col-xs-5" style="font-size:12;margin-left:-18px;margin-top:-3px;font-weight:bold;">Shares</div>
						</div>	
						</a>
					</div>
				</div>
				<!-- End of Row with like and comment buttons -->
				<!-- start of Row with comment field -->
				<div class="row like_commenting_row">
					<div class="col-md-10 col-lg-10 col-sm-10 col-xl-10 col-xs-10">
						<form action="" >
							<div class="form-group">
								<input type="text" class="form-control comment_field" placeholder="Write a comment....">
							</div>
						</form>

					</div>
					<div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-xs-2 send_button_column">
						<button class="post_send_button">Send</button>
					</div>
				</div>
				<!-- End of Row with comment field -->
			</div>
			<!-- Start of column with user profile photo,name,date, welcome note ,like,comments nd commenting field -->
		</div>
		<!-- End of row with the user profile photo,name,date, welcome note ,like,commentss nd commenting -->
	</div>
</div>
<!-- End of shared New public Event -->