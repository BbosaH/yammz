<div class="navbar navbar-inverse navbar-fixed-top" style="background-color:#BD2532; height:65px;" >
  <div class="container">
		<div class="navbar-header" style="padding-top:4px;">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		 
		  <table >
			  <tr >
				<td >
					
					<span style=""><a class="btn" href="home2.php"  style=" noborderStyle;color:white; border:0px;padding-top:24px;"> <span style="font-size:32;">Yammz it<span>&nbsp; </span>
				</td >
				<td style="height:40px;padding-top:10px;">
					<img src="images/icons/yammz_logo.png" width="35" height="35" />
				</td>
			  </tr>
		  
		  </table>
		 
		 
		</div>
		<div class="collapse navbar-collapse" style="padding-top:10px; margin-right:18px;">
				<ul class="nav navbar-nav " style="padding-top:10px;">
					<form class="navbar-form navbar-left" action="search.php" role="search" method="post">
						<div class="input-group" style="width:230%;">
							<input type="text" name="search" class="form-control pull-left noborderStyle" style="border-radius:0;" >
							  <span class="input-group-btn">
								<button class="btn " type="submit" name="searching" style="border-radius:0;">
									<span class="glyphicon glyphicon-search"></span>
									Search
								</button>
							  </span>
						</div>
					</form>
				</ul>
				
			  <ul class="nav navbar-nav navbar-right" style="padding-top:20px;font-size:13">
				<li><a href="home2.php" style="color:white;background-color:#BD2532; height:8px;">Home</a></li>
				<li class="dropdown">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="color:white;background-color:#BD2532;height:8px;">Uganda
						<b class="caret"></b>
					</a>
						<div style="height:15px;"> </div>
						
							<ul class="dropdown-menu" style="text-align:center; font-size:11;" >
								<li ><a href="#">Kenya</a></li>
								<li><a href="#">Tanzania</a></li>
								<li><a href="#">Burundi</a></li>
								<li class="divider"></li>
								<li><a href="#">South Africa</a></li>
							</ul>
						
					
				</li>
			
				<li class="dropdown">
                    <a href="#" style="color:white;background-color:#BD2532;height:8px;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><img src="images/icons/notification icon.png" width="13" height="14px">&nbsp;Notifications</a>
                    <div style="height:15px;"> </div>
					<ul class="dropdown-menu message-dropdown" style="font-size:11;">
                        <li class="message-preview" >
							
                            <a href="#">
                                <div class="media">
									<table >
										<tr>
											<td style="width:55px;"><img class="media-object" src="http://placehold.it/50x50" alt=""></td>
											<td >
												<h5 class="media-heading" style="font-size:11;padding-top:10px;">Steven Byamugisha liked your review 
												</h5>
												<p class="small text-muted" style="font-size:12;"><i class="fa fa-clock-o"></i>  30 mins ago</p>
											</td>
										</tr>
									</table>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
									<table >
										<tr>
											<td style="width:55px;"><img class="media-object" src="http://placehold.it/50x50" alt=""></td>
											<td >
												<div class="media-body">
													<h5 class="media-heading" style="font-size:11;padding-top:10px;">Steven Byamugisha liked your review 
													</h5>
													<p class="small text-muted" style="font-size:12;"><i class="fa fa-clock-o"></i>  30 mins ago</p>
												</div>
											</td>
										</tr>
									</table>
                                   
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                       <h5 class="media-heading"> Steven Byamugisha liked your review 
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i>  30 min ago</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer ">
                            <a style="color:red;" href="notifications.php" >Read All Notifications</a>
                        </li>
                    </ul>
                </li>
				<li class="dropdown" >
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="color:white;background-color:#BD2532;height:8px;">
					<?php include("Controllers/Profile/profile_image_nameview.php"); ?>
						<b class="caret"></b>
					</a>
					<div style="height:15px;"> </div>
					<ul class="dropdown-menu" style="font-size:11;size:20x20;">
						<li>
							<a href="user_profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-envelope"></i>My inbox</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-fw fa-gear"></i>Change password</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="Controllers/auth/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
						</li>
					</ul>
				</li>
			  </ul>
			  
		  
		</div>
	  </div>
</div>