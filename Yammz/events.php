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
						<h6 ><li ><a style="color:grey " href="EVENTS2.php">EVENTS BY DATE</a></li></B></h6>
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
				<?php require_once('Controllers/events_show.php');?>
				
				
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