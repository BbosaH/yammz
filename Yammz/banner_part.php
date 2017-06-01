<?php 
	
	$business_id=16;
	$qry="SELECT * FROM  business,city WHERE business.id='$business_id' AND business.city_id=city.id";
	$result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());
	$row=mysql_num_rows($result);
	if($row>=1){
		while($rows=mysql_fetch_array($result)){
			$business_name=$rows['business_name'];
			$address=$rows['address'];
			$city=$rows['city_name'];
			$business_id=$rows['id'];
		

	

?>
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 img-responsive  business_profile_cover_photo" style="width:1135; height:370; padding-left:10px"> 
						<!-- <img src="images/icons/great_music.jpg" class="img-responsive" style="width:1123; height:370;" /> -->
						
					<div class="row" style="padding-top:220px;">
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<table>
								<tr >
									<td>
										<a class="btn" href="business_page_3.php?"style="height:40px" >
											<span style="color:#FFFFFF;font-size:30px;"><B><?php echo" $business_name"; ?></B></span>
										</a>
									</td>
								</tr>
								<tr>
									<td>
										<a class="btn" href="business_page_3.php?" >
											<span style="color:#FFFFFF;font-size:15px;padding-left:0px;"><?php echo"$address  $city"; ?><span>
										</a>
									</td>
								</tr>
							
							</table>
							
							<div class="row" style="padding-left:17px; padding-left:12px">
								
								<span>
									<button type="submit" style="background-color:#231E1A; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle ">
										<img src="images/icons/medical109.png" width="15px" height="14px"/>
										<br><span style="font-size:11px;">Add photo</span>
									</button>
								</span>
								<span>
									<button type="submit" style="background-color:#231E1A; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle ">
										<img src="images/icons/download43.png" width="15px" height="14px"/>
										<br><span style="font-size:11px;">Message</span>
									</button>
								</span>
								<span>
									<button type="submit" style="background-color:#231E1A; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle ">
										<img src="images/icons/add182.png" width="15px" height="14px"/>
										<br><span style="font-size:11px;">Follow</span>
									</button>
								</span>
								<span>
									<button type="submit" style="background-color:#231E1A; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle ">
										<img src="images/icons/share5-2.png" width="15px" height="14px"/>
										<br><span style="font-size:11px;">Share</span>
									</button>
								</span>
								<span>
									<button type="submit" style="background-color:#231E1A; color:#D0CCC9; border-color:grey;" class="btn btn-default noborderStyle ">
										<img src="images/icons/23.png" width="15px" height="14px"/>
										<br><span style="font-size:11px;">Add to favourites</span>
									</button>
								</span>
								<span>
									<button type="submit" style="background-color:#231E1A; height:44px; color:#D0CCC9; border-color:grey;" class="btn btn-default  noborderStyle">Rate Business&nbsp;&nbsp;
										<img src="images/icons/star.png" width="20px" height="18px"/>
										<img src="images/icons/star.png" width="18px" height="18px"/>
										<img src="images/icons/star.png" width="18px" height="18px"/>
										<img src="images/icons/star.png" width="18px" height="18px"/>
										<img src="images/icons/starwhite.png" width="18px" height="18px"/>
									</button>
								</span>
								<span>
									<button type="submit" style="background-color:#231E1A; color:#D0CCC9; height:44px; border-color:grey;" class="btn btn-default noborderStyle">Price Rating &nbsp;
										<img src="images/icons/currency16.png" width="12px" height="15px"/>&nbsp;
										<img src="images/icons/currency16.png" width="12px" height="15px"/>&nbsp;
										<img src="images/icons/currency16.png" width="12px" height="15px"/>&nbsp;
										<img src="images/icons/currency16.png" width="12px" height="15px"/>&nbsp;
										<img src="images/icons/currencywhiteicon.png" width="12px" height="15px"/>
									</button>
								</span>			
												
							</div>
						</div>
					</div>
				</div>		

<?php
		}
	}
 ?>