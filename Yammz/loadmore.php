
<?php
	session_start();
	include('Controllers/like/like_functions.php');
	include("Controllers/db_connect.php");
	$db = new DB_CONNECT();
	$resultsPerPage=5;
	$user=$_SESSION['SESS_MEMBER_ID'];
	$current_user=$_SESSION['SESS_USERNAME'];
	if(isset($_POST['page'])):
 	$paged=$_POST['page'];
	$sql="SELECT user.id as uid,business.id as bid,business.name as business_name, newsfeed.id as id, user.name as name, user.avatar as avatar, newsfeed.details as details,newsfeed.date_created as date_created FROM  newsfeed, user,business WHERE newsfeed.user_id = user.id AND newsfeed.business_id=business.id AND  business.user_id=newsfeed.user_id ORDER BY  business.date_created DESC,$resultsPerPage ";
	//$sql="SELECT * FROM `news_feed`ORDER BY `news_feed`.`news_id` ASC";
	if($paged>0){
	       $page_limit=$resultsPerPage*($paged-1);
	       $pagination_sql=" LIMIT  $page_limit, $resultsPerPage";
	       }
	else{
	$pagination_sql=" LIMIT 0 , $resultsPerPage";
	}

	$result=mysql_query($sql.$pagination_sql);

	$rows = mysql_num_rows($result);
	if($rows>0){
		while($data=mysql_fetch_array($result)){
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
													<img src="images/profiles/right hand side 1.png" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">
												</td>
												<td >
													
													<span >
													<h6><B><a href="user_profile.php?<?php $key0=md5("user_id"); echo"$key0"; ?>=<?php $key1=md5($uid); echo"$uid"; ?>" class="black">&nbsp; <?php echo"$user_name"; ?></B> Made a review on <B><a href="business_page_3.php?bd=<?php echo"$bid"; ?>" class="black"><?php echo"$business_name"; ?></a></B>				
													<span class="help-block " style="color:#CFCFCF;">&nbsp;&nbsp; <?php echo"$date_created"; ?> &nbsp; 3hrs ago</span>
													</h6>
													&nbsp;
														<?php  require_once('Controllers/rate_pricing.php')?>
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
														<hr></hr>
														
															<div class="row">
																
																	<?php 	
																		
																		$qry="SELECT user.avatar as avatar,user.name as name,comment.details as comment_details, comment.date_created as date_created  FROM comment,newsfeed,user WHERE comment.user_id=user.id AND comment.review_id =  newsfeed.id AND comment.review_id='$feeds_id' ORDER BY comment.date_created ASC";
																		$result2=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());
																		$row2=mysql_num_rows($result2);
																		if($row2>=1){
																			while($rows2=mysql_fetch_array($result2)){
																				
																				$avatar=$rows2['avatar'];
																				$name=$rows2['name'];
																				$details=$rows2['comment_details'];
																				$date_created=$rows2['date_created'];
																	?>
																		<!-- Test comments 
																		<div class="row">
																			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
																				<div id="message-list" data-counter="<?php //echo check_changes($feeds_id);?>">
																					<?php //echo get_news($feeds_id);?>
																				</div>
																			</div>
																		</div>
																		
																		End of Test comments -->
																		
																		<ol id="<?php echo"$feeds_id"; ?>" style="list-style:none;">
																			<li>
																			<div class="row">
																				<table >
																					<tr >
																						<td style="padding-left:30px; width:55px;"><img src="<?php echo"$avatar"; ?>" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail"></td>
																						
																						<td>
																							<span style="font-size:11;padding-left:8px;"> <?php echo" <span style='color:#555555;font-size:12;'><B>$name</B></span> &nbsp; "; ?></span>
																							<div style="height:0px;"></div>
																							<span style="font-size:11; padding-right:10px; padding-left:8px;">
																								<?php echo" $details"; ?>
																							</span>
																							<div style="height:0px;"></div>
																							
																							<span  style="font-size:10;padding-top:50px;color:#CFCFCF;padding-left:8px;"> <?php  echo"$date_created";?></span>&nbsp;
																							
																							<span style="font-size:11;"><img src="images/icons/like85-3.png" width="13" height="13px">&nbsp;&nbsp;Like</span>
																						
																						</td>
																					</tr>
																					<div style="height:20px;"></div>
																				</table>																
																				
																			</div>
																			</li>
																		</ol>
																		
																		<div id="flash" align="left"  ></div>
																	<?php
																			}
																		}
																	?>
																
															</div>
														
														
														<div class="row" style="color:grey; padding-left:10px;">
															<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
																	<table>
																		<tr>
																			<td style="width:110px;">
																					
																					<?php
																						$like ="SELECT * FROM likes WHERE user_id ='$user' AND newsfeed_id ='$feeds_id' LIMIT 1";
																						$result_like=mysql_query($like) or die ('Unable to execute query!!'.mysql_error());
																						$row_like=mysql_num_rows($result_like);
																						if($row_like>=1){
																					?>
																							<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="<?php echo $feeds_id ?>"><span style="font-size:16;" class="icon icon-like85 redbright"></span> &nbsp;<span class="simplegrey" style="font-size:12;"><?php echo likes($feeds_id); ?> </span>&nbsp;<span style="font-size:12;" class="simplegrey">
																								<?php if(likes($feeds_id)>=2){
																									echo"Likes";
																								}
																								else{
																									echo"Like";
																								}
																								?>
																							</span></a>
																					<?php 
																						}
																						else{
																					?>
																					<!--<a href="javascript:void();"  style="font-size:9px"><span class='simplegrey' style='font-size:14;'><?php echo likes($feeds_id);?></span>&nbsp;<span style="font-size:16;" class="icon icon-like85 simplegrey"></span><span class='simplegrey' style='font-size:12;'>&nbsp<?php //echo"Like"; ?></span></a> -->
																					<a href="javascript:void();" class="like" style="font-size:9px;text-decoration:none; background-color:white" id="<?php echo $feeds_id ?>"><span style="font-size:16;" class="icon icon-like85 simplegrey"></span>
																					&nbsp;<span class="simplegrey" style="font-size:12;"><?php echo likes($feeds_id); ?> </span>&nbsp;<span style="font-size:12;color:#7D7D7D;">
																								<?php if(likes($feeds_id)>=2){
																									echo"Likes";
																								}
																								else{
																									echo"Like";
																								}
																								?>
																							</span></a>
																					
																					<?php 
																							
																						}
																							
																					?>
																					
																				
																			</td>
																			<td style="width:140px;">
																				
																					<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
																						<span style="font-size:16px;" class="glyphicon glyphicon-comment pull-left"></span>&nbsp;&nbsp;Comment
																					</a>
																				
																			
																			</td>
																			<td>
																				<?php require_once("share_model.php"); ?>
																									
																					<a class="simplegrey btn " style="text-decoration:none;" data-toggle="modal" data-target="#mdl_example">
																					<span class="glyphicon glyphicon-share pull-left"></span>&nbsp;&nbsp; Share
																					<?php //share($current_user." has shared a review by $user_name on".$business_name." from Yammzit.com",$redir,$news_content,$profile_photo); ?>
																					</a>
																				
																				
																			</td>
																		</tr>
																	</table>
																</div>
														</div>
														<h6></h6>
														<div class="space"></div>
														<div id="flash" align="left"  ></div>
														<div id="show" align="left"></div>
														<form action="#" method="post">
															 <div class="form-group"> 
																 <div class="col-lg-11 col-sm-11 col-md-11 col-xs-11" style=" padding-left:18px;"> 
																	
																	<input type="hidden" name="review_id" id="review_id" value="<?php echo"$feeds_id"; ?>"/>
																	<input type="hidden" name="up id="up" value="<?php echo"$feeds_id"; ?>"/>
																	
																	<p>
																	<table>
																		<tr>
																			<td>
																				<input class="form-control " name="content<?php echo"$feeds_id";?>" id="content<?php echo"$feeds_id"; ?>" style="background-color:#E9EAEE; width:300px;" id="focusedInput" type="text" placeholder="Write a comment..."/>
																			</td>
																			<td>
																				<input type="submit"  style="background-color:#E9EAEE; width:50px;" class=" form-control submit pull-right" value=" Post " />
																			</td>
																		</tr>
																	</table>
																	
																 </div> 
															 </div>
														</form>
													</h6>
												</td>
											</tr>
											
									</table>
															
						</div>
					</div>
				</div>
			</div>
<?php
		}
	}
	if($rows == $resultsPerPage){?>
 	<li class="loadbutton"><button class="loadmore" data-page="<?php echo  $paged+1 ;?>">Load More</button></li>
 <?php 
  }else{
  	echo "<li class='loadbutton'><h3>No More Reviews</h3></li>";
 }
  endif;
   ?>