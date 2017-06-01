<?php  
//session_start();
error_reporting(0);

	 					include("../classes/connector.php");
							 $conn = new connector();

							 //echo session_status();

						if (session_status() == PHP_SESSION_NONE) {

						    $session_id=0;
						    //echo $session_id;
						    // echo "kabuto";
						}else
						{
							$session_id=$_SESSION['SESS_MEMBER_ID'];
	 						$user =$conn->getAll("SELECT *FROM user WHERE id='".$session_id."'");
							 $city_id =$user[0]['city_id'];
							 //echo "kabaata";
						}


							 

								?>
<input type="hidden" id="current_id_holder" ng-model="user_id" ng-init="user_id='<?php echo $session_id ?>'" />
<input type="hidden"  ng-model="city_id" ng-init="city_id='<?php echo $city_id; ?>'" />

<div ng-repeat="businessModel in businessModels | limitTo:5" id="buz{{businessModel.un_enc_id}}">
		<div class="row"  >
			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
				<img ng-src="{{businessModel.logo}}" width="80px" height="80px" style="border-radius:10px;">
			</div>
			<div class="col-lg-9 col-sm-9 col-md-9 col-xs-9">
				 <div class="caption" style="margin-top:-4px;">
					<p ><div class="redbright" style="width:160px;white-space: nowrap; overflow: hidden;  text-overflow:ellipsis;" ><a class="redbright" style="text-decoration:none" href="{{BaseURL}}business_page_3.php?current_business_id={{businessModel.id}}">{{businessModel.name}}</a></div>
					<?php require_once("user_profile/followdialog.php") ?>
						<span class="pull-right" style="padding-top:0px;" ng-click="followItem('business',user_id,businessModel.un_enc_id)"  data-toggle="modal" data-target="#follow_example" >
						  &nbsp; <img src="images/icon_files_white/folow_icon.png" width="15px" height="15px"/>
						  <span style="font-size:10;color:#7D7D7D;" ><br/>Follow</span>
						</span>
						
					</p>
					<!-- <div  style="width:160px;white-space: nowrap; overflow: hidden;  text-overflow:ellipsis;" >{{businessModel.address}}</div> -->
					<h6 style="width:160px;white-space: nowrap; overflow: hidden;  text-overflow:ellipsis; margin-top:-7px;margin-bottom:8px;">{{businessModel.address}}</h6>

						<div ng-show="businessModel.pricing>0 || businessModel.rating>0">
							<div style=" width:80px; margin-top: -6px margin-left:5px; ">
								<i class="ion ion-ios-star redbright" style="font-size:15px;" ng-repeat="item in businessModel.ratings"></i>
								<i class="ion ion-ios-star-outline redbright" style="font-size:15px;" ng-repeat="item in businessModel.noratings"></i>
								

							</div>
							<div style="margin-left:0px; margin-top: 3px; margin-left: -5px; ">
								
								
								<i class="ion ion-social-usd" style="color:#00cc00;padding-left:5px;" ng-repeat="item in businessModel.pricings"></i>
								<i class="ion ion-social-usd-outline" style="color:#00cc00;padding-left:5px;"  ng-repeat="item in businessModel.nopricings"></i>

							</div>
						</div>

						<div ng-show="businessModel.pricing<=0 || businessModel.rating<=0" style="margin-top: -5px;">
							<div style=" width:80px; margin-top: -8px margin-left:5px; ">
								
								<i class="ion ion-ios-star-outline redbright" style="font-size:15px;" ng-repeat="item in [1,2,3,4,5]"></i>
								

							</div>
							<div style="margin-left:0px; margin-top: 5px; margin-left: -5px; ">
								
								
								
								<i class="ion ion-social-usd-outline" style="color:#00cc00;padding-left:5px;"  ng-repeat="item in [1,2,3,4,5]"></i>

							</div>
						</div>


				</div>
			</div>
		</div>
	<h1></h1>
</div>


