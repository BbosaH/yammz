
			

			<div ng-repeat="event in events">
				<div class="row"  >
					
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<table>
							<tr>
								<td style="vertical-align:top;">
									<img ng-src="{{event.picture}}" class="img-responsive" style="width:55px;height:55px; border-radius: 10px;"  alt="Generic placeholder thumbnail Responsive image" >
								</td>
								<td style="padding-left:6px;" >
									
									
										<span  style="font-size:12px;"><span class="redbright">{{event.title}}</span> <br/>
										Starts On {{event.start_date}} <br/>
										Ends On {{event.end_date}}<br/>
										{{event.interested_count}} Interested
										
										
										</span>
								</td>
							</tr>
						</table>
					
					</div>
				</div>
				<h1></h1>
			</div>

		