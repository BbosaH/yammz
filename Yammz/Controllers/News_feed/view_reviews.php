<?php
session_start();
require_once('../../classes/gstring_funcs.php');
 ?>




<!-- First review -->

<!-- <div class="panel panel-default" style="border:none; border-radius:0px" ng-cloak>  -->
<div class="panel panel-default" style="border:none; border-radius:0px" ng-cloak  ng-repeat="feed in UserMyWallFeeds track by feed.id"> 
	<input type="hidden" ng-model="date_created" ng-init="date_created='<?php echo  time(); ?>'" />
	<input type="hidden" ng-model="toggle" ng-init="toggle=feed.business_followed_by_me" >
	<input type="hidden" ng-model="thisuser_id" ng-init="thisuser_id='<?php echo gString($_SESSION['SESS_MEMBER_ID']) ?>'" >
	
	
	 <div class="panel-body" ng-if="feed.kind=='review'">
		<div ng-include="'./Controllers/News_feed/feed_types/review.php'"></div>
	</div>
	<div class="panel-body" ng-if="feed.kind=='review_photo'">
		<div ng-include="'./Controllers/News_feed/feed_types/review_photo.php'"></div>
	</div>
	
	
	<div class="panel-body" ng-if="feed.kind=='rate'">
		<div ng-include="'./Controllers/News_feed/feed_types/rate.php'"></div>
	</div>
	
	

	 
	
</div>	


<img   style="width:30px; height:30px; margin-left:200px; margin-bottom: 30px;" ng-src="{{BaseImageURL}}uploads/feed_loader.gif">





