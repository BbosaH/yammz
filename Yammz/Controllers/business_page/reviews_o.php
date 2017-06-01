<div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
	<?php 
		include("Controllers/News_feed/view_feeds.php");
		$business_id=$_GET['e8701ad48ba05a91604e480dd60899a3'];            
		getreviews("userid",$business_id,$business_id,10,"user_profile.php?&e8701ad48ba05a91604e480dd60899a3="+$business_id);
	?>
</div>
<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
	<?php include("Controllers/claim.php");?>
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
		<?php include("Controllers/business_ads.php")?>

</div>
