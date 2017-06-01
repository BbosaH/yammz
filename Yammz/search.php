<?php

require_once('Controllers/auth/auth.php');
include("classes/connector.php");
require_once('classes/gstring_funcs.php');
$conn = new connector();

?>

 <html lang="en">
 <?php require_once('imports.php'); ?>


	<body style="background-color:#E9EAEE" ng-app="home" ng-cloak>
		<?php require_once('Controllers/Logged_header2_o.php'); ?>
		<br/>
	
		<div class="container" ng-controller="SearchCtrl" >
			
			<div class="row">
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-4">
					<span class="redbright"><B>FILTERS </B>	</span>
					<div class="form-group">
						 <div>
							 <div style="height:8px;"></div>
 							<div >
 							  <input type="radio" name="events_choice_name" ng-checked="all" ng-click="setAllFilters()" id="all_radio" value="all" >
 							  <span for="events_choice_public" style="font-size:11px;font-weight:bold;">All</span>

 							</div>
							<div style="height:8px;"></div>
							<div>
							  <input type="radio" name="events_choice_name" ng-click="setBusinessFilters()" id="events_choice_public" value="business">
							  <span for="events_choice_public" style="font-size:11px;font-weight:bold;">Business</span>

							</div>
							<div style="height:8px;"></div>
							<div>
							  <input type="radio" name="events_choice_name" id="choice_event" ng-click="setPeopleFilters()" value="user">
							  <span for="choice_event" style="font-size:11px;font-weight:bold;">People</span>
							</div>
							<div style="height:8px;"></div>
							<!-- <div>
							  <input type="radio" name="events_choice_name" id="choice_event" value="most_reviewed">
							  <span style="font-size:11px;font-weight:bold;" for="choice_event">Most Reviewed </span>
							</div>
							<div style="height:8px;"></div>
							<div>
							  <input type="radio" name="events_choice_name" id="choice_event" value="event">
							  <span for="choice_event" style="font-size:11px;font-weight:bold;">Events</span>
							</div>
							<div style="height:8px;"></div>
							<div>
							  <input type="radio" name="events_choice_name" id="choice_event" value="gossip">
							  <span for="choice_event" style="font-size:11px;font-weight:bold;">Gossip</span>
							</div> -->
						</div>
						<!-- <div style="height:8px;"></div>
						<span style="font-size:11px;"><B>Highest Rated </B>	</span>
						<div style="height:8px;"></div> -->

						<!-- <div class="form-group">
							 <div>
								<table>
									<tr>
										<td>
											<div>
												<table>
													<tr>
														<td><input type="radio" name="events_choice_name" id="choice_event"></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
													</tr>
													<tr>
														<td><input type="radio" name="events_choice_name" id="choice_event"></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
													</tr>
													<tr>
														<td><input type="radio" name="events_choice_name" id="choice_event"></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
													</tr>
													<tr>
														<td><input type="radio" name="events_choice_name" id="choice_event"></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
													</tr>
													<tr>
														<td><input type="radio" name="events_choice_name" id="choice_event"></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icons/star.png" width="15px" height="15px"/></span></td>
													</tr>
												</table>

											</div>
										</td>
									</tr>
								</table>

							</div>
						</div> -->
						<!-- <div style="height:5px;"></div>
						<span style="font-size:11px;"><B>Pricing </B>	</span>
						<div style="height:8px;"></div> -->

						<!-- <div class="form-group">
							 <div>
								<table>
									<tr>
										<td>
											<div>
												<table>
													<tr>
														<td><input type="radio" name="events_choice_name" id="choice_event"></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
													</tr>
													<tr>
														<td><input type="radio" name="events_choice_name" id="choice_event"></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
													</tr>
													<tr>
														<td><input type="radio" name="events_choice_name" id="choice_event"></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
													</tr>
													<tr>
														<td><input type="radio" name="events_choice_name" id="choice_event"></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
													</tr>
													<tr>
														<td><input type="radio" name="events_choice_name" id="choice_event"></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
														<td>&nbsp;<span for="choice_event"><img src="images/icon_files_white/cash_green.png" width="12px" height="15px"/></span></td>
													</tr>
												</table>

											</div>
										</td>
									</tr>
								</table>

							</div>
						</div> -->

						<div style="height:5px;"></div>
						 <!-- <span style="font-size:11px;"><B>{{countryModels}} </B>	</span> -->
						<div style="height:8px;"></div> 
						<table>
							<tr>
								<td>
									<select id="sl_privileges" ng-model="my_country_id"  class="form-control" style="width:85px;height:24px;padding-top:1px;padding-left:0px; border-radius:2px;" ng-options=" country.id as country.name for country in countryModels" ng-change="search_resultsFunction(myfilter,my_country_id)">
										<option value="" style="">Country</option>
									</select>
								</td>
								<!-- <td>
									<select id="sl_privileges" class="form-control" style="width:70px;margin-left:5px; border-radius:2px;height:24px;padding-top:1px;padding-left:0px;">
										<option value="">City...</option>
									</select>
								</td> -->
							</tr>
						</table>


					</div>



				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-8">

					<!-- <input type="hidden"   ng-model="searchvalue" ng-init="searchvalue=<?php //echo $_POST['search'];?>"/> -->
					<div class="panel panel-default"  >

					
						<input type="hidden"   ng-model="user_id" ng-init="user_id=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"/>

							<div class="panel_body"  >

								<div ng-repeat="person in people track by person.id" ng-show="all==true || persons==true" ng-hide="buzinesses==true">
								<div style="padding-top:10px;"></div>

								<?php require("Controllers/search/people_search_pill.php"); ?>
								</div>

							   <div ng-repeat="business in businesses track by business.id" 
							        ng-show="all==true || buzinesses==true" ng-hide="persons==true">
								<div style="padding-top:10px;"></div>

								<?php require("Controllers/search/business_search_pill.php");?>


								</div>
								

							</div>


							<div class="panel_body"  ng-show="defaults==1" >

							   <div class="row">

							   	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
							   		<div >
									<img  src="{{BaseImageURL}}uploads/sad_emoji.jpg" style="width:150px;height:150px;margin-left:17%;margin-top:15%">
									</div>

							   	</div>

							   	<div class="col-lg-8 col-sm-8 col-md-8 col-xs-8">

							   		<div style="padding-top:60px;"></div>

									<h3 class="redbright" style="margin-left:10px;">No search Results !!!</h3>

									<div style="padding-top:25px;"></div>

							   	</div>

							   </div>
							   <div style="height:28px;"></div>
								

							</div>
					
					</div>
					<img ng-show="loaderToggle==1"  style="width:30px; height:30px; margin-left:230px; margin-bottom: 30px;" src="../admin/Theme/uploads/feed_loader.gif">
					

					<!-- <button style="margin-bottom:20px; height:70px;" class="loadmore" data-page="2">
						<table style="margin-left:170px;">
							<tr>
								<td >

									<span><div style="height:10px;"></div><B>Load More&nbsp;</B></span>
								</td>
								<td>
									<span style="font-size:43px;" class="icon icon-sort-desc"></span>
								</td>
							</tr>
						</table>
					</button> -->
				</div>
				<div class="col-lg-4 co3-sm-4 col-md-4 col-xs-8">
					<?php require("Controllers/create_event_button.php"); ?>

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
							<?php require_once('Controllers/search_suggested_places_to_follow.php');?>
						</div>
					</div>

					<?php

					 require_once('Controllers/business_ads.php');?>

				</div>
			</div>

		</div>
		

		<script type="text/javascript" src="angularplugins/angular/angular.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular/angular-animate.min.js"></script>
		<script type="text/javascript" src="angularplugins/angular-ui/angular-ui-router.min.js"></script>
		<script src="bootstrap-3.2.0-dist/js/ui-bootstrap-tpls-1.3.3.min.js"></script>
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="bootstrap-3.2.0-dist/js/jquery.tmpl.js" type="text/javascript"></script>


		<!--my own javascript order-->
		<script src="js/js/yammz.js" type="text/javascript"></script>
		<script src="js/js/home-models.js" type="text/javascript"></script>
		<script src="js/js/home.js" type="text/javascript"></script>
		<script src="js/js/starter.js" type="text/javascript"></script>
		<!--<script src="Rating/js/star-rating.js" type="text/javascript"></script>-->
		<script src="Rating/js/star-rating.js" type="text/javascript"></script>

		<script type="text/javascript" src="js/function.js"></script>
		<script src="node_modules/ng-dialog/js/ngDialog.js" type="text/javascript"></script>


	</body>
</html>
