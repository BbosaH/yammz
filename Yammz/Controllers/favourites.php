<table>
	<tr>
		<td style="vertical-align:top;" width="10px;">


					<img src="{{business.logo}}" style="border-radius:10px;" width="104px" height="104px" >


		</td>
		<td style="padding-left:10px; margin-top:5px; margin-bottom:5px;" >
			<div style="height:7px;"></div>
			<a class="redbright" ng-if="business.owner_id!=user_id" ng-href="{{BaseURL}}business_page_3.php?current_business_id={{business.id}}" style="padding-top:15px; text-decoration:none;">
				{{business.name}}
			</a>

			<a class="redbright" ng-if="business.owner_id==user_id" ng-href="{{BaseURL}}business_page_owners_view.php?current_business_id={{business.id}}" style="padding-top:15px; text-decoration:none;">
				{{business.name}}
			</a>

			<br/>
			<p class="grey" style="margin-top:5px;font-size:12;">
				{{business.address}}
			</p>
			<h6 class="grey">
				<img src="images/icons/star.png" width="10px" height="10px"/>
				<img src="images/icons/star.png" width="10px" height="10px"/>
				<img src="images/icons/star.png" width="10px" height="10px"/>
				<img src="images/icons/star.png" width="10px" height="10px"/>
				<img src="images/icons/star.png" width="10px" height="10px"/>

			</h6>
			<h6 style="padding-left:3px;" class="grey">
				<img src="images/icon_files_white/cash_green.png" width="7px" height="10px"/>&nbsp;
				<img src="images/icon_files_white/cash_green.png" width="7px" height="10px"/>&nbsp;
				<img src="images/icon_files_white/cash_green.png" width="7px" height="10px"/>&nbsp;
				<img src="images/icon_files_white/cash_green.png" width="7px" height="10px"/>&nbsp;
				<img src="images/icon_files_white/cash_green.png" width="7px" height="10px"/>

			</h6>

		</td>
		<span class="pull-right" style="padding-top:10px;margin-right:20px;" ng-click="unfollowItem('business',user_id,business.id)">
		  &nbsp;&nbsp;&nbsp; <span style="font-size:16px; color:#BD2532" class="icon icon-add182"></span>
		  <span style="font-size:10;color:#C2C2C2;"><br/>following</span>
		</span>
	</tr>
</table>
<hr style="height:2px; background-color:#EBEAEF; margin-top:10px; margin-bottom:0px;"></hr>
