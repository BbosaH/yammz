<?php 
	session_start();
	require_once __DIR__ . '/db_connect.php';

    $db = new DB_CONNECT();	
	if(isset($_POST["pic"]) && is_numeric($_POST["pic"]))
	{
		$current_picture = filter_var($_POST["pic"], FILTER_SANITIZE_NUMBER_INT);
	}else{
		$current_picture=2;
	}
	
	//get next picture id
	$result = mysql_query("SELECT id FROM  business WHERE id > $current_picture ORDER BY id ASC LIMIT 1");
	$row=mysql_num_rows($result);
	if($row>=1){
		while($rows=mysql_fetch_array($result)){
			$next_id = $rows['id'];
		}
	}

	//get previous picture id
	$result2 = mysql_query("SELECT id FROM  business WHERE id < $current_picture ORDER BY id DESC LIMIT 1");
	$row2=mysql_num_rows($result2);
	if($row2>=1){
		while($rows2=mysql_fetch_array($result2)){
			$prev_id = $rows2['id'];
		}
	}
	
	//get details of current from database
	$result3 = mysql_query("SELECT*FROM business WHERE id = $current_picture LIMIT 1");
	$row3=mysql_num_rows($result3);
	if($row3>=1){
		while($rows3=mysql_fetch_array($result3)){
		
		//construct next/previous button
		$prev_button = (isset($prev_id) && $prev_id>0)?'<a href="#" data-id="'.$prev_id.'" class="get_pic"><img src="prev.png" border="0" /></a>':'';
		$next_button = (isset($next_id) && $next_id>0)?'<a href="#" data-id="'.$next_id.'" class="get_pic"><img src="next.png" border="0" /></a>':'';
		$business_id=$rows4['id'];
		$logo=$rows4['logo'];
		$business_name=$rows4['business_name'];
		$address=$rows4['address'];
		$good=$rows4['good'];
		$cost=$rows4['cost'];
		//output html
		 echo" Testing right now";
		?>
			
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 " style="padding-right:0px;">
				
						<p>
						<form >
							<span class="pull-right" style="padding-right:15px;"><?php echo"$prev_button"; ?></span>
							<span class="pull-right" style="padding-right:4px;"><?php echo"$next_button"; ?></span>
						</form></p>
						<table>
							
							<tr style="padding-top:0px;">
								<td style="padding-top:0px;padding-bottom:5px;">
								
									<img src="images/icons/great_music.jpg" class="img-circle img-responsive" style="width:50px;height:50px"  alt="Generic placeholder thumbnail Responsive image">
								</td>
								<td style="padding-left:8px;">
									<span style="font-size:14; font-weight:bold;"><?php echo"$business_name"; ?></span><span style="color:#CFCFCF;font-size:11;font-weight:bold;">X</span>
									<p  class="simplegrey" style="font-size:10;"><?php echo"$address"; ?></p>
								</td> 
								<td>
									&nbsp;&nbsp;&nbsp;
									<img src="images/icons/star.png" width="14px" height="15px"/>
									<img src="images/icons/star.png" width="14px" height="15px"/>
									<img src="images/icons/star.png" width="14px" height="15px"/>
									<img src="images/icons/star.png" width="14px" height="15px"/>
									<img src="images/icons/star.png" width="14px" height="15px"/>
									<p><span style="font-size:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rate the business</span></p>
								</td>
								
								<td>
									&nbsp;&nbsp;&nbsp;
									<img src="images/icon_files_white/cash_green.png" width="10px" height="13px"/>
									<img src="images/icon_files_white/cash_green.png"  width="10px" height="13px"/>
									<img src="images/icon_files_white/cash_green.png"  width="10px" height="13px"/>
									<img src="images/icon_files_white/cash_green.png"  width="10px" height="13px"/>
									<img src="images/icon_files_white/cash_green.png"  width="10px" height="13px"/>
									<p><span style="font-size:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price  business</span></p>
								</td>
							</tr>
						</table>
				
				</div>
				
			</div>
			<div class="row">
				
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
					<form action="Controllers/News_feed/post_on_business.php" method="post">
						<div class="form-group"> 
							<input type="hidden" name="kind" value="business"/>
						</div>
						<div class="form-group"> 
							<input type="hidden" name="cost" value="expensive"/>
						</div>
						<div class="form-group"> 
							<input type="hidden" name="good" value="very good"/>
						</div>
						<div class="form-group"> 
							<input type="hidden" name="business_id" value="1"/>
						</div>
						<div class="form-group"> 												
							<textarea class="form-control" rows="3" name="details"style="background-color:#E9EAEE; resize:none;" placeholder="Write a comment...">
							
							</textarea>   
						</div> 
					
					<span style="font-size:11px;">Have you been to this place before? what was your experience</span><span class="badge pull-right" style="background-color:#CB525B;"><button type="submit" value="post_business" style="background-color:#CB525B;border:0px;">Post review</button></span>
					</form>
				</div>
			</div>
		
		<?php
	}  
	}
?>