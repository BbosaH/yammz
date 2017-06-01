<div class="row">
	<div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
		<?php 
			include("Controllers/News_feed/my_view_feeds.php");		
		?>
	</div>
	<div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
			
			<div ng-include="'Controllers/add_business.php'" ></div>


			<div class="panel panel-default" style="border:none; border-radius:0px" ng-controller="ReviewCtrl"> 
							<div class="panel-body">
								<p class="redbright"><B>Review of the day</B></p>
									
									<div ng-include="'Controllers/day_review.php'" ></div>
							</div>
						</div>

			<div class="panel panel-default" ng-controller="EventCtrl">
							<div class="panel-body">
								<p class="redbright">Latest Events</P>
								
									<div ng-include="'Controllers/latest_events.php'"></div>

								<h6 > <a class="redbright">view All</a></h6>
							</div>
			</div>

			<div class="panel panel-default" ng-controller="GossipCtrl">
							<div class="panel-body">
								<p class="redbright">Latest Gossip </p>
								<!--<?php //require_once("Controllers/latest_gossip.php");?>-->
								<div ng-include="'Controllers/latest_gossip.php'"></div>
								<h6 > <a class="redbright">view All</a></h6>
								
							</div>
						</div>

			<div class="panel panel-default" ng-controller="RandomBusinessCtrl">
				<div class="panel-body">
					<p class="redfaint">Suggested Places to Follow </p>
					
					<div ng-include="'Controllers/suggested_places_to_follow.php'"></div>
					
				</div>
			</div>
			
			<?php require_once("Controllers/business_ads.php");?>
		</div>

	</div>
</div>