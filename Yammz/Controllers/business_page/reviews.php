
<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
	<?php 
		//include("Controllers/News_feed/view_feeds.php");		
	?>
</div>
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
	<?php include("Controllers/create_event_button.php");?>
		<?php include("Controllers/day_review.php"); ?>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php include("Controllers/latest_events.php"); ?> 
				
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php include("Controllers/suggested_places_to_follow.php");?>
				
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php include("Controllers/latest_gossip.php");?>
				
			</div>
		</div>
		<?php include("Controllers/business_ads.php") ?>

</div>
