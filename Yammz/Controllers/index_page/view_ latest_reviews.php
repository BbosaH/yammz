<?php //include("selector_functions.php"); ?>

<?php 	
			$resultsPerPage=3;
			$news="SELECT user.id as uid,business.id as bid,business.name as business_name, newsfeed.id as id, user.name as name, user.avatar as avatar, newsfeed.details as details,newsfeed.date_created as date_created FROM  newsfeed, user,business WHERE newsfeed.user_id = user.id AND newsfeed.business_id=business.id ORDER BY  business.date_created ASC LIMIT 0,$resultsPerPage";
		
	?>
	<div class="news_list" id="refresh">
	<div id="time">
					
	<?php
		$newsresult=mysql_query($news) or die ('Unable to execute query!!'.mysql_error());
		$newsrow=mysql_num_rows($newsresult);
		if($newsrow>=1){
			while($rows=mysql_fetch_array($newsresult)){
				$uid=$rows['uid'];
				$feeds_id=$rows['id'];
				$bid=$rows['bid'];
				$profile_photo=$rows['avatar'];
				$user_name=$rows['name'];
				$news_content=$rows['details'];
				$business_name=$rows['business_name'];
				$date_created=$rows['date_created'];	
	?>
			
				<div class="panel panel-default" style="border:none; border-radius:0px"> 
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
								
										<table>
												<tr>
													<td style="vertical-align:top;" width="10px;">
														<img src="<?php echo"$profile_photo"; ?>" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">
													</td>
													<td >
														
														<span >
														<h6><B>&nbsp; <?php echo"$user_name"; ?></B> Made a review on <B><?php echo"$business_name"; ?></B>				
														<span class="help-block " style="color:#CFCFCF;">&nbsp;&nbsp; <?php echo"$date_created"; ?> &nbsp; 3hrs ago</span>
														</h6>
														&nbsp;
															<?php  include('Controllers/rate_pricing.php')?>
															<br/>
														</span>
													</td>
													
												</tr>
												<tr>
													<td colspan="2" style="padding-left:15px;">
														<h6 >
															<p>
																<?php echo"$news_content"; ?>
															</p>
															
															
														</h6>
													</td>
												</tr>
												
										</table>
																
							</div>
						</div>
						<hr></hr>
					</div>
				</div>
				
						

	<?php
				
			}
		}
	?>
	<li class="loadbutton"><button class="loadmore" data-page="2">Load More</button></li>
	</div>
</div>
	
