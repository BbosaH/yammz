<ul class="nav nav-pills">
	<table style="font-size:12;">
		<tr>
			<td style="width:50px;">
				<li class="home_side_tab">
					<a class="btn black2 " id="reviews_tab" href="#reviews" data-toggle="tab" ng-click="toggle_profile_page('reviews_tab')">
						<span class=""><B>{{fullUser.review_count}}</B></span><br/>
						<span class="">reviews</span>
					</a>
				</li>
			</td>
			<td style="width:20px;">
				<hr style="height:30;width:2; background-color:#EBEAEF;"></hr>
			</td>
				<td style="width:45px;">
					<li class="home_side_tab">
						<a class="btn black2" href="#photos" data-toggle="tab" id="business__profile_photos_tab" ng-click="toggle_profile_page('business__profile_photos_tab')">
							<span class=""><B>{{fullUser.photo_count}}</B></span><br/>
							<span class="">Photos</span>
						</a>
					</li>
				</td>
			<td style="width:20px;">										
				<hr style="height:30;width:2; background-color:#EBEAEF;"></hr>
			</td>
				<td style="width:65px;">
					<li class="home_side_tab">
						<a class="btn black2"  href="#followers" data-toggle="tab" id="following_tab" ng-click="toggle_profile_page('following_tab')">
							<span class=""><B>{{fullUser.follower_count}}</B></span><br/>
							<span class="">Followers</span>
						</a>
					</li>
				</td>
			<td>
				<hr style="height:30;width:2; background-color:#EBEAEF;"></hr>
			</td>
		</tr>
	</table>
</ul>
