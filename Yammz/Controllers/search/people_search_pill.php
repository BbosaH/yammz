
<table style=" margin-left:10px;" ng-cloak>
	<tr>
		<td style="vertical-align:top;" width="10px;"  >


					<img src="{{person.avatar}}" class="img-circle" style="margin:left:20px;" width="104px" height="104px" >


		</td>
		<td style="padding-left:10px; margin-top:5px; margin-bottom:5px;" >
			<div style="height:7px;"></div>
			<a class="redbright" ng-if="person.un_enc_id==user_id" ng-href="{{BaseURL}}user_profile.php?id={{person.id}}" style="padding-top:15px; text-decoration:none;padding-left:5px;" ng-bind="person.first_name+' '+person.last_name">
				
			</a>
			<a class="redbright" ng-if="person.un_enc_id!=user_id" ng-href="{{BaseURL}}user_profile_3.php?id={{person.id}}" style="padding-top:15px; text-decoration:none;padding-left:5px;" ng-bind="person.first_name+' '+person.last_name">
				
			</a>
			<br/>
			<p class="grey" style="margin-top:5px;font-size:12;padding-left:5px;" ng-bind="person.email">
				
			</p>
			

		</td>

		<span class="pull-right" style="padding-top:10px;margin-right:15px;" ng-show="person.isfollowed=='false'" ng-click="followItem('person',user_id,person.id,person.isfollowed)">
		  &nbsp;&nbsp;&nbsp; <span  style="font-size:16px; margin-right:15px; " class="icon icon-add182"></span>
		  <span id="follow_word" style="font-size:10;color:#C2C2C2;margin-right:10px;"><br/>&nbsp;&nbsp;follow</span>
		</span>

		<span class="pull-right" style="padding-top:10px;margin-right:15px;" ng-show="person.isfollowed=='true'" ng-click="unfollowItem('person',user_id,person.id,person.isfollowed)">
		  &nbsp;&nbsp;&nbsp; <span id="unfollow_icon" style="font-size:20px; margin-left: 0px; font-weight:bold" class="ion-android-checkmark-circle redbright"></span>
		  <span id="unfollow_word" style="font-size:10;color:#C2C2C2;margin-left:-2px;"><br/>following</span>
		</span>

	</tr>
</table>
<hr style="height:2px; background-color:#EBEAEF; margin-top:10px; margin-bottom:0px;"></hr>
