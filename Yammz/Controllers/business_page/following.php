<div class="panel panel-default" style="height:2240px;">
	<div class="panel-body" ng-repeat="row in rowCollection">
		<div class="row" style="padding-top:40px;" >
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6"> 
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<a href="user_profile.php" class="black2">							
							<span>								
								<table>									
									<tr>
										<td>
											<img ng-src="{{twotwoFriends[$index][0].avatar}}" class="img-circle" style="width:100px;height:100px"  alt="Generic placeholder thumbnail">
										</td>
										<td>
											<span style="margin-bottom:0px;font-size:12px;font-weight:bold;">&nbsp;&nbsp;{{twotwoFriends[$index][0].name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Friend</span>
											<hr style="margin-bottom:-15px;margin-left:0px;margin-top:0px;height:8px;width:248px;"></hr>
											&nbsp;<span style="margin-top:-10px;font-size:25px;margin-left:223px;color:#BD2532;" class="icon icon-caret-down"></span>
										</td>
									</tr>
									
								</table>
								
							</span>
						</a>
						
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6"> 
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" ng-show="twotwoFriends[$index][1].avatar.length>0">
						<a href="user_profile.php" class="black2">
							<span>								
								<table>									
									<tr>
										<td>
											<img ng-src="{{twotwoFriends[$index][1].avatar}}" class="img-circle" style="width:100px;height:100px"  alt="Generic placeholder thumbnail">
										</td>
										<td>
											<span style="margin-bottom:0px;font-size:12px;font-weight:bold;">&nbsp;&nbsp;{{twotwoFriends[$index][1].name}} 
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Friend</span>
											<hr style="margin-bottom:-15px;margin-left:0px;margin-top:0px;height:8px;width:248px;"></hr>
											&nbsp;<span style="margin-top:-10px;font-size:25px;margin-left:223px;color:#BD2532;" class="icon icon-caret-down"></span>
										</td>
									</tr>
									
								</table>
								
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<br/><br/>
		
		
	</div>			
</div>
