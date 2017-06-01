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
	<div class="panel-body" ng-if="feed.kind=='new_friend'">
		<div ng-include="'./Controllers/News_feed/feed_types/new_friend.php'"></div>
	</div>
	<div class="panel-body" ng-if="feed.kind=='add_business'">
		<div ng-include="'./Controllers/News_feed/feed_types/add_business.php'"></div>
	</div>
	<div class="panel-body" ng-if="feed.kind=='rate'">
		<div ng-include="'./Controllers/News_feed/feed_types/rate.php'"></div>
	</div>
	
	<div class="panel-body" ng-if="feed.kind=='business_photo'">
		<div ng-include="'./Controllers/News_feed/feed_types/business_photo.php'"></div>
	</div>
	<div class="panel-body" ng-if="feed.kind=='business_favourite'">
		<div ng-include="'./Controllers/News_feed/feed_types/add_to_favourite.php'"></div>
	</div>
	<div class="panel-body" ng-if="feed.kind=='business_follow'">
		<div ng-include="'./Controllers/News_feed/feed_types/follow_business.php'"></div>
	</div>
	<div class="panel-body" ng-if="feed.kind=='shared_review'">
		<div ng-include="'./Controllers/News_feed/feed_types/shared_review.php'"></div>
	</div>
	<div class="panel-body" ng-if="feed.kind=='shared_add_business'">
		<div ng-include="'./Controllers/News_feed/feed_types/shared_add_business.php'"></div>
	</div>
	<div class="panel-body" ng-if="feed.kind=='shared_follow_business'">
		<div ng-include="'./Controllers/News_feed/feed_types/shared_following.php'"></div>
	</div>
	<div class="panel-body" ng-if="feed.kind=='shared_favourite'">
		<div ng-include="'./Controllers/News_feed/feed_types/shared_favourite.php'"></div>
	</div>
	  
	 <div class="panel-body" ng-if="feed.kind=='add_photo'">
		<div ng-include="'./Controllers/News_feed/feed_types/add_photo.php'"></div>
	</div>

	<div class="panel-body" ng-if="feed.kind=='business_edit_info'">
		<div ng-include="'./Controllers/News_feed/feed_types/update_business_info.php'"></div>
	</div> 
	
</div>	

<div ng-if="picker_type=='home'">

	<div class="panel panel-default no_border"  style="border:none; border-radius:0px" ng-if="defaults==1">
			<div ng-controller="FullUserCtrl">
			<div ng-include="'./Controllers/News_feed/feed_types/welcome.php'"></div>
			</div>
			
	</div>
	<div class="panel panel-default no_border" style="border:none; border-radius:0px" ng-if="defaults==1">
		<div ng-include="'./Controllers/News_feed/feed_types/tip_search_friends.php'"></div>
	</div>
	<div class="panel panel-default no_border" style="border:none; border-radius:0px" ng-if="defaults==1">
		<div ng-include="'./Controllers/News_feed/feed_types/tip_suggested_businesses_to_follow.php'"></div>
	</div>
	<div class="panel panel-default no_border" style="border:none; border-radius:0px" ng-if="defaults==1">
		<div ng-controller="RandomPeopleCtrl">
			<div ng-include="'./Controllers/News_feed/feed_types/tip_suggested_people_to_follow.php'"></div>
		</div>
	</div>
	<div class="panel panel-default no_border" style="border:none; border-radius:0px" ng-if="defaults==1">
		<div ng-include="'./Controllers/News_feed/feed_types/tip_discover_businesses.php'"></div>
	</div> 

</div>
<img   style="width:30px; height:30px; margin-left:200px; margin-bottom: 30px;" ng-src="{{BaseImageURL}}uploads/feed_loader.gif">
<!-- <img ng-show="UserMyWallFeeds>10"  style="width:30px; height:30px; margin-left:200px; margin-bottom: 30px;" ng-src="{{BaseImageURL}}uploads/feed_loader.gif"> -->

<!-- <div ng-if="UserMyWallFeeds.length>=15"><button class="loadmore" style="height:100px;" >Load More <div class="icon icon-caret-down" style="font-size:50px;"></div></button></div> -->




