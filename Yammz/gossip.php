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
					<a type="button" href="create_event.php" class="btn btn-default btn-block btn-primary btn-block"  style="background-color:#BE2633; border-radius:10px; border-color:#BE2633; ">
						<span ><img src="images/icons/Gossip icon .png" width="40px"/></span>&nbsp;&nbsp;
						<span style="font-size:14px; color:#E5DDDD;padding-top:50px;"><B>Create Event</B> </span>
					</a>
						<br/>
						<span class="simplegrey"><B>GOSSIP </B>	</span>	
					
					﻿<ul class="nav nav-tabs nav-stacked"  >
						
										
						<li style="padding-left:0px;"  class="#"><h6><a class="black" href="#mygossip" data-toggle="tab">My Gossip </a></h6></li>
						<h1></h1>
						<li class="active"><h6><a  href="#allgossip" data-toggle="tab" class="black active">All Gossip</a></h6></li>
						
						<h1></h1>
						<span class="simplegrey"><B>CATEGORY </B>	</span>	
						
						<h1></h1>
						<li   class="#"><h6><a class="black" href="#events" data-toggle="pill">Events</a><h6></li>
						<h1></h1>
						<li><h6><a  href="#food" data-toggle="pill" class="black">Food</a></h6></li>
						<h1></h1>
						<li><h6><a href="#shopping_products" data-toggle="pill" class="black">Shopping & Products </a></h6></li>
						<h1></h1>
						<li><h6><a href="#travel" data-toggle="pill" class="black">Travel</a></h6></li>
						<h1></h1>
						<li><h6><a href="#relationship_dating" data-toggle="pill" class="black">Relationships & Dating</a></h6></li>
						<h1></h1>
						<li><h6><a href="#humour_offbeat" data-toggle="pill" class="black">Humour & Offbeat</a></h6></li>
						<h1></h1>
						<li><h6><a href="#entertainment_pop" data-toggle="pill" class="black">Entertainment & Pop Culture </a></h6></li>
						<h1></h1>
						<li><h6><a href="#sports" data-toggle="pill" class="black">Sports</a></h6></li>
						<h1></h1>
						<li><h6><a href="#news_politics" data-toggle="pill" class="black">News & Politics</a></h6></li>
						<h1></h1>
						<li><h6><a href="#family_parenting" data-toggle="pill" class="black">Family & Parenting</a></h6></li>
						<h1></h1>
						<li><h6><a href="#yammzit_questions" data-toggle="pill" class="black">Questions for Yammz-it</a></h6></li>
						<h1></h1>
						<li><h6><a href="#humour_offbeat" data-toggle="pill" class="black">Others</a></h6></li>
						
					</ul>	
					
				</div>
				<div class="col-lg-10 co3-sm-10 col-md-10 col-xs-8">
				<?php require_once('Controllers/gossip/gossip_show.php');?>
				
				
				</div>
				
			</div>
			
		</div>
		
	</body>
</html>