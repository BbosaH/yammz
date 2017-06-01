<?php
//session_start();
require_once('db_config.php');

function fill_photo_post($feed)
{
	//$feed =json_decode($feed);

//var_dump($feed);

		$avatar=$feed["user"]["avatar"];
		if($feed["user"]["avatar"]==null || $feed["user"]["avatar"]=='')
	    {
	    	$feed["user"]["avatar"] = BaseImageURL."uploads/defavatar.png";
	    	$avatar=$feed["user"]["avatar"];
	    }
	    else if(strpos($avatar, 'http', 0)===0){
	    	$feed["user"]["avatar"]=$feed["user"]["avatar"];
	    	$avatar=$feed["user"]["avatar"];
	    }else
	    {
	    	$feed["user"]["avatar"]=BaseImageURL.$feed["user"]["avatar"];
	    	$avatar=$feed["user"]["avatar"];
	    }
		$feed['photo']=BaseImageURL.$feed['photo'];

	    $date_Created=time();





	$return = <<<newsfeedstring
	<div class="panel panel-default" style="border:none; border-radius:0px">
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table>
						<tr>
							<td style="vertical-align:top;" width="10px;">

								<img src="$avatar" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">

							</td>
							<td>
								<span>
									<h6>
										<B>
											<a style="text-decoration:none;" href="user_profile.php" class="black" onclick="toBusiness(<?php  ?>)">&nbsp;
												{$feed["user"]["first_name"]} {$feed["user"]["last_name"]}
											</a>
										</B>
										reviewed <B><a id="biz"  style="text-decoration:none;" class="black" onclick="toBusiness({$feed['user']["id"]} ,{$feed['business']["id"]})">{$feed["business"]["name"]}</a></B>

										<span class="help-block " style="color:#CFCFCF;">&nbsp;&nbsp; 03/02/2016 &nbsp; 23 days ago</span>
									</h6>
									&nbsp;

newsfeedstring;



	$return2=<<<newsfeedstring2
									<br/>
								</span>

							</td>

						</tr>
						</table>
						<br/>
newsfeedstring2;

	$return3=<<<newsfeedstring3
						<table >
						<tr>
							<td>


	

							</td>
							<td colspan="" style="padding-left:0px;">
								<h6 >

								<p style="width:350px; margin-left:0px; margin-top:10px;">
										{$feed["details"]}
									</p>

									

										<div id="commentors{$feed["id"]}" style="margin-left:55px;">


										</div>

										<hr style="margin-bottom:4px; margin-top: "></hr>
									
									<table>
										<tr>
											<td style="width:110px;">
												<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id=""><span class="icon icon-like85 redbright " style="font-size:16px;"> &nbsp;<span class="simplegrey" style="font-size:12;">10 </span>&nbsp;<span style="font-size:12;" class="simplegrey">
													Likes
												</span></a>
											</td>
											<td style="width:140px;">
												<a class=" btn simplegrey "style="text-decoration:none;"  data-toggle="collapse" data-target="#comment">
													<span style="font-size:16px;" class="glyphicon glyphicon-comment pull-left"></span>&nbsp;&nbsp;Comment
												</a>
											</td>
											<td>

newsfeedstring3;




	$return4=<<<newsfeedstring4


												<a class="simplegrey btn " style="text-decoration:none;" data-toggle="modal" data-target="#mdl_example">
												<span class="icon icon-sharing6"></span>&nbsp;&nbsp; Share
												<?php share(" Steven Byamugisha has shared a review by Nomis Wilson on Cafe Javas from Yammzit.com","Page Name(I.e: Home.php)","Content to share","image attached to the content being shared"); ?>
												</a>
											</td>
										</tr>
									</table>
									<h6></h6>
									<div class="space"></div>
									<div id="flash" align="left"  ></div>
									<div id="show" align="left"></div>
									<form class=" noborderStyle" role="form"  >
										 <div class="form-group">
												<table>
													<tr>
														<td>
															<input type="text"  class="form-control form-control-no-border" rows="1" name="content" id="content{$feed["id"]}" style="background-color:#E9EAEE;text-align:left; width:300px;height:30px; border:none; border-radius: 0px;" placeholder="Write a comment...">
															</textarea>
														</td>
														<td style="vertical-align:top;">
															<input type="button"   style="background-color:#E9EAEE;height:30px;text-align: center;line-height: 15px; width:60px;font-weight:bold;background-color:#BD2532; color:white;border-radius:10;" class=" form-control submit pull-right" value="Send" onclick="postComment({$_SESSION['SESS_MEMBER_ID']},{$feed["id"]},{$date_Created})" />
														</td>
													</tr>
												</table>
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
newsfeedstring4;




	if($feed["cost"]!=-1 && $feed["good"]!=-1){

		echo $return;
		require_once("../Controllers/rate_pricing.php");
		showRates($feed["good"],$feed["cost"]);
		echo $return2;
		require_once("picture_pill.php");
		echo $return3;
		require_once("../Controllers/share_model.php");
		echo $return4;
	}else if($feed["cost"]==-1 && $feed["good"]==-1)
	{
		echo $return;
		
		echo $return2;
		require_once("picture_pill.php");
		echo $return3;
		require_once("../Controllers/share_model.php");
		echo $return4;
	}


}

?>
