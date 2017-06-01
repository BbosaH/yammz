
 <div class="tab-content" >
	
	<div class="tab-pane active " id="business_reviews_tab">
					<div id="/business_reviews_tab"></div>
					
					<div>
						<?php require("Controllers/business_page/business-page_default-option2.php");?>
					</div>
		
		
	</div> 
<div class="col-lg-9 col-sm-9 col-md-9 col-xs-8 " style="padding-top:2px;">

	 <div class="tab-pane active " id="business_photos_tab">
								<div id="/business_photos_tab"></div>
								<div class="panel panel-default">
									<div class="panel-body" ng-show="photo_count==0">
										<?php require("Controllers/no_friends_photos.php");?>
									</div>
									<div class="panel-body" ng-show="photo_count!=0" style="margin-top:-25px;">
										<?php require("Controllers/business_page/view_business_photos.php");?>
									</div>
									
								</div>
	</div>
	<div class="tab-pane active " id="business_followers_tab">
		
							<div id="/business_followers_tab"></div>
						    	
						    	<div class="panel panel-default" ng-show="follower_number==0">
						    	
									<?php require("Controllers/no_followers.php"); ?>
								</div>
						    	
						    	<div ng-show="follower_number!=0" >
						    	
								<?php require("Controllers/business_page/business_followers.php"); ?>
								</div>
			
	</div>

	<div class="tab-pane active " id="business_events_tab">
		
								<div id="/business_followers_tab"></div>
						    	
						    	<div class="panel panel-default">
						    	
									<?php require("Controllers/no_events.php"); ?>

								</div>
						    	
						    	
		</div>
			
	</div>
 
</div>
</div>
 

