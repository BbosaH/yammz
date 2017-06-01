<div class="row" >
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 " style="padding-right:0px;">
		<input type="hidden" id="storebiz" value="{$business['id']}"/>
				<table>

					<tr style="padding-top:0px;">
						<td style="padding-top:0px;padding-bottom:5px;">

							<img src="{$business['logo']}" class="img-circle img-responsive pull-left" style="width:40px;height:40px"  alt="Generic placeholder thumbnail Responsive image">
						</td>
						<td style="padding-left:8px;">

							<div style="font-size:14; font-weight:bold;width:210px; white-space: nowrap; overflow: hidden;  text-overflow:ellipsis;"><a class="badblack" style="text-decoration:none;" href="{$business_url}">{$business['name']}</a></div>
							<p class="simplegrey" style="font-size:10; width:210px;">{$business['address']}</p>

						</td>
						<td> </td>
						<td style="width:157px;"> </td>
						<td class="pull-right">
								<div>
								<span class="pull-left" style="padding-right:13px;">$prev_button</span>
								<span class="pull-right" style="padding-right:13px;">$next_button</span>
								</div>
								<div style="height:35px;"></div>

						</td>


					</tr>
				</table>
				<table ng-controller="RatingDemoCtrl">
					<tr>
						<td>
							<uib-rating  ng-model="rate" max="max" read-only="isReadonly" on-hover="hoveringOver(value)" on-leave="overStar = null" titles="['one','two','three']" aria-labelledby="default-rating"></uib-rating>
						    <span class="label" ng-class="{'label-warning': percent<30, 'label-info': percent>=30 && percent<70, 'label-success': percent>=70}" ng-show="overStar && !isReadonly">{{percent}}%</span>
						    <pre style="margin:15px 0;">Rate: <b>{{rate}}</b> - Readonly is: <i>{{isReadonly}}</i> - Hovering over: <b>{{overStar || "none"}}</b></pre>
						</td>
						<td style="padding-left:45px;">

								<span class="ion-ios-star-outline redbright " width="14px" height="15px" ></span>
								<span class="ion-ios-star-outline redbright" width="14px" height="15px"></span>
								<span class="ion-ios-star-outline redbright" width="14px" height="15px" ></span>
								<span class="ion-ios-star-outline redbright" width="14px" height="15px" ></span>
								<span class="ion-ios-star-outline redbright" width="14px" height="15px" ></span>


							<p><span style="font-size:10px;padding-left:2px;">Rate the business</span></p>
						</td>

						<td style="" >
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<span class="ion-ios-star-outline redbright " width="14px" height="15px" ></span>
							<img src="images/icon_files_white/cash_green_bag.png"  width="10px" height="13px"/>
							<img src="images/icon_files_white/cash_green_bag.png"  width="10px" height="13px"/>
							<img src="images/icon_files_white/cash_green.png"  width="10px" height="13px"/>
							<img src="images/icon_files_white/cash_green.png"  width="10px" height="13px"/>
							<p><span style="font-size:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price the business</span></p>
						</td>
					</tr>
				</table>

		</div>

	</div>
	<div class="row" >

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
			<form action="Controllers/News_feed/post_on_business.php" method="post">
				<!--<span class="form-group">
					<input type="hidden" name="kind" value="business"/>
				</span>
				<span class="form-group">
					<input type="hidden" name="cost" value="cost"/>
				</span>
				<span class="form-group">
					<input type="hidden" name="good" value="good"/>
				</span>
				<span class="form-group">
					<input type="hidden" name="business_id" value="id"/>-->
				</span>

				<span class="form-group">

					<textarea class="form-control" rows="2" id="user_post_details" style="margin-left:0px;background-color:#E9EAEE;height:100px;color:black; resize:none; border:none;border-radius: 0px;" placeholder="Write a review..."></textarea>
				</span>
				<div style="height:7px;"></div>
				<!--<span style="font-size:11px;"></span>
				<span id="image_attach" style="font-size:16px;margin-left:2px; cursor:pointer;" class="icon" data-icon="F"></span>&nbsp;-->





			<span id="image_attach" style="font-size:16px;margin-left:6px; cursor:pointer;" class="icon icon-camera" onclick="upload_fille()"></span>
			<span style="font-size:11px;font-weight:bold;margin-left:6px; margin-top:-5px;">Attach a Photo to Post</span></td>
				<input type="file" id="file_attach" style="width:80px;height:0px"name="file_attach" class="hidden"   />


				<script>

				</script>

				<span class="badge pull-right" style="background-color:#CB525B;">
					<button type="button" value="post_business" style="background-color:#CB525B; height:15px;border:0px;`" onclick="postReview({$business['id']},$user_id,$date_created)">Post review</button>
				</span>
			</form>
		</div>
	</div>