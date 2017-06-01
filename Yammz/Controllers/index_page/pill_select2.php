<?php 
	
		$qry="SELECT * FROM  sub_category,business_category,business WHERE sub_category.category_id='$id' AND  business_category.sub_category_id=sub_category.id AND business_category.business_id= business.id LIMIT 3";
		$result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());
		$row=mysql_num_rows($result);
		if($row>=1){						
			while($rows=mysql_fetch_array($result)){
				$logo=$rows['logo'];
				$name=$rows['name'];
				
				$name=$rows['name'];
?>
				  <div class="row">
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
						<img src="images/icons/2.png" class="img-circle img-responsive" style="width:39px;height:37px"  alt="Generic placeholder thumbnail Responsive image">
					</div>
					<!--//////////////// -->
					<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
						 <div class="caption">
							<p>go<?php echo"$name"; ?> </p>
							<p >
								<span style="font-weight:Bold; font-size:11px;">
								<p>Price</p>
								</span>
								<img src="images/icons/star.png" width="10px" height="10px"/>&nbsp;
								<img src="images/icons/star.png" width="10px" height="10px"/>&nbsp;
								<img src="images/icons/star.png" width="10px" height="10px"/>&nbsp;
								<img src="images/icons/star.png" width="10px" height="10px"/>&nbsp;
								<img src="images/icons/star.png" width="10px" height="10px"/>&nbsp;
								<span style="color:grey; font-size:12px;" >Very Good	</span>
							</p>
							<h6 >
								<span style="font-weight:Bold; font-size:11px;">Price &nbsp;</span><span style="margin-left:44px;">
									<img src="images/icon_files_white/cash_green.png" width="10px" height="15px"/>&nbsp;&nbsp;
									<img src="images/icon_files_white/cash_green.png" width="10px" height="15px"/>&nbsp;&nbsp;
									<img src="images/icon_files_white/cash_green.png" width="10px" height="15px"/>&nbsp;&nbsp;
									<img src="images/icon_files_white/cash_green.png" width="10px" height="15px"/>&nbsp;&nbsp;
									<img src="images/icon_files_white/cash_green.png" width="10px" height="15px"/>&nbsp;
									<span style="color:grey; font-size:12px;" >Expensive	</span>
								</span>
							</h6>
							<h6>
								<span style="font-weight:Bold; font-size:11px;">Category: &nbsp;</span><span style="margin-left:5px; color:grey; font-size:12px;">Cafe Restaurant</span>
							</h6>
							
							<h6>
								<span style="font-weight:Bold; font-size:11px;">Reviews: &nbsp;</span><span style="margin-left:5px; color:grey; font-size:12px;">110 Reviews</span>
							</h6>
						</div> 
					</div>
					<!-- ////////////////////// -->

				</div>
				<hr></hr/>
<?php
			}
		}
		
	
?>