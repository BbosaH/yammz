<?php
require_once('Controllers/auth/auth.php');
?>

<html lang="en">
	<?php require_once('imports.php'); ?>
	<body style="background-color:#E9EAEE">
		<?php require_once('Controllers/Logged_header2.php'); ?>
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-4">
				
						<span class="redbright"><B>EVENTS </B>	</span>			
					﻿<ul class="nav nav-pills nav-stacked" >
						
						<h6><li   class="#"><a class="black" href="events.php">My events</a></li></h6>
						<h1></h1>
						<h6><li><a  href="events2.php" class="black">My Invitations</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">Going to</a></li></h6>
						<h1></h1>
						<h6><li><a href="create_event.php" class="black">Create Event</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">Recently added events</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">Most popular events nearby Kampala</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">other events</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">Recently updated events</a></li></h6>
					</ul>					
					
										
					
					﻿<ul class="nav nav-pills nav-stacked" >
						<h6 style="color:grey"><B>EVENTS BY DATE</B></h6>
						<h1></h1>
						<h6><li   class="#"><a class="black" href="">Today</a></li></h6>
						<h1></h1>
						<h6><li><a  href="" class="black">Tomorrow</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">This weekend</a></li></h6>
						<h1></h1>
						<h6><li><a href="" class="black">This week</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">This month</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">This year</a></li></h6>
						
					</ul>	
					<ul class="nav nav-pills nav-stacked" >
						<h6 style="color:grey"><B>EVENTS CATEGORY</B></h6>
						<h1></h1>
						<h6><li   class="#"><a class="black" href="">Charities</a></li></h6>
						<h1></h1>
						<h6><li><a  href="" class="black">Children & Fmily</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">Fashion</a></li></h6>
						<h1></h1>
						<h6><li><a href="" class="black">Film</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">Festivals & Fairs</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">Music</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">Nightlife</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">Others</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">Performing Arts</a></li></h6>
						<h1></h1>
						<h6><li><a href="#" class="black">Sports & Active Life</a></li></h6>
						
					</ul>	
					
					
				</div>
				<div class="col-lg-6 co3-sm-6 col-md-6 col-xs-8">
				<?php  //require_once('Controllers/events_show.php');?>
				<div class="panel panel-default">					
					<div class="panel-body">
						<p class="redbright" style="font-size:18">KCCA Kampala street party</p>
						<div class="thumbnail" style="background-color:#F5F6F1;">
							<div class="row">
								<div class="col-lg-4 co3-sm-4 col-md-4 col-xs-4">
									<img style="background-color:white;" src="images/icons/create_event.png" height="250px" width="175px"/>
								</div>
								<div class="col-lg-8 co3-sm-8col-md-8 col-xs-8">
									<div class="row">
										<div class="col-lg-1 co3-sm-1 col-md-1 col-xs-1">
											<img  src="images/icons/coffee-shop1.png" height="18px" width="13px"/>
										</div>
										<div class="col-lg-11 co3-sm-11 col-md-11 col-xs-11">
											<span class="redbright" style="font-size:12">KCCA Kampala street party</span><br/>
											<span style="font-size:12">
												<img src="images/icons/star.png" width="13px" height="13px"/>
												<img src="images/icons/star.png" width="13px" height="13px"/>
												<img src="images/icons/star.png" width="13px" height="13px"/>
												<img src="images/icons/star.png" width="13px" height="13px"/>
												<img src="images/icons/star.png" width="13px" height="13px"/>
												&nbsp; 1 review	
											</span><br/>
											<span style="font-size:12">
												Kampala road street 56 <br/>
												Kampala, Uganda <br/>
												+256775995738
											</span>
											
										</div>
									</div>
									<hr style="height:2px; background-color:#CFCFCF;"></hr>
									<div class="row">
										<div class="col-lg-1 co3-sm-1 col-md-1 col-xs-1">
											<img  src="images/icons/calendar181.png" height="18px" width="13px"/>
										</div>
										<div class="col-lg-11 co3-sm-11 col-md-11 col-xs-11">
											
											<span>
												From: Sunday, 20 Dec, 15:00 <br/>
												To: 17:00 <br/>
												+256775995738
											</span>
											
										</div>
									</div>
									<hr style="height:2px; background-color:#CFCFCF;"></hr>
									<div class="row">
										<div class="col-lg-1 co3-sm-1 col-md-1 col-xs-1">
											<img  src="images/icons/currency16.png" height="18px" width="13px"/>
										</div>
										<div class="col-lg-11 co3-sm-11 col-md-11 col-xs-11">
											
											<span style="font-size:12">
												Free											
											</span>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<p class="redbright">Description</P>
						<p>This is hard, before responding to a negative review, take a deep breath and think very carefully about what you're going to write. Or even 
							better, don't think too much: just keep it simple by thinking your customer for the patronage and feedback. 
						</p>
						<span>
							<button type="submit" style="background-color:white; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle ">
								<img  src="images/icons/currency16.png" height="18px" width="13px"/>
								<span style="font-size:11px;">Share event</span>
								
							</button>
						</span>
						<span class="pull-right">
							
							<button type="submit" style="background-color:white; color:#D0CCC9; border-color:grey;">
								Flag
							</button>
						</span>
								
						<span>
							<form>
								<div class="form-group"> 
									 <h6> <label for="name" class="redbright" >Comment on event</label> </h6>
									 <textarea class="form-control" rows="3" style="background-color:#E9EAEE; width:520px; height:65px;" placeholder="">
									 </textarea>  
								 </div>
							</form>
						</span>
						<span class="pull-right">
							Read our Talk Guidelines 
							<button type="submit" style="background-color:#BD2532;border:0; border-radius:2; color:#D0CCC9;">
								Post
							</button>
						</span>
					</div>
				</div>
				
				
				</div>
				<div class="col-lg-4 co3-sm-4 col-md-4 col-xs-8">
					<div class="panel panel-default noborderStyle">					
						<div class="panel-body"style="padding-left:50px;"> 
							&nbsp;&nbsp;&nbsp;
							<button type="button" class="btn btn-default btn-block btn-primary"  style="border-radius:3;background-color:#BD2532; height:70px; width:220px">
								<span style="padding-left:2px"><img src="images/icons/create_event.png" width="40px"/></span>&nbsp;&nbsp;
								<B>Create Event</B> 
							</button>
							
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<?php require_once('Controllers/suggested_places_to_follow.php');?>
						</div>
					</div>
					
					<?php require_once('Controllers/business_ads.php');?>
					
				</div>
			</div>
			
		</div>
		
	</body>
</html>