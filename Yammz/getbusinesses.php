<?php
include("Controllers/db_connect.php");
$db = new DB_CONNECT();

if(isset($_POST["pic"]) && is_numeric($_POST["pic"]))
{
	$current_picture = filter_var($_POST["pic"], FILTER_SANITIZE_NUMBER_INT);
}else{
	$result =mysql_query("SELECT id FROM business ORDER BY RAND() LIMIT 1");
	$newsrow=mysql_num_rows($result);
	
	if($newsrow>=1){
		while($rows=mysql_fetch_array($result)){
			$picture = $rows['id'];
		}
	}

	
	$current_picture=$picture;
}

//get next picture id
$result =mysql_query("SELECT id FROM business WHERE id > $current_picture ORDER BY id ASC LIMIT 1");
$newsrow=mysql_num_rows($result);
if($newsrow>=1){
	while($rows=mysql_fetch_array($result)){
		$next_id = $rows['id'];
	}
}
//get previous picture id
$result = mysql_query("SELECT id FROM business WHERE id < $current_picture ORDER BY id DESC LIMIT 1");
$newsrow=mysql_num_rows($result);
if($newsrow>=1){
	while($rows=mysql_fetch_array($result)){
		$prev_id = $rows['id'];
	}

}

//get details of current from database
$result =mysql_query("SELECT *FROM business WHERE id = $current_picture LIMIT 1");
$newsrow=mysql_num_rows($result);
if($newsrow>=1){
	while($rows=mysql_fetch_array($result)){
		$logo=$rows['logo'];
	
	//construct next/previous button
	$prev_button = (isset($prev_id) && $prev_id>0)?'<a href="#" data-id="'.$prev_id.'" class="get_pic"><img src="images/icons/arrow 2.png" style="width:6px;height:12px;" border="0" /></a>':'';
	$next_button = (isset($next_id) && $next_id>0)?'<a href="#" data-id="'.$next_id.'" class="get_pic"><img src="images/icons/arrow.png" style="width:6px;height:12px;" border="0" /></a>':'';
	
	?>
	
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 " style="padding-right:0px;">
		
				<table>
					
					<tr style="padding-top:0px;">
						<td style="padding-top:0px;padding-bottom:5px;">
						
							<img src="<?php 	
								if(!empty($logo)) {
									echo"$logo";
								}else{
									echo"images/icons/2.png";
								} ?>" class="img-circle img-responsive pull-left" style="width:40px;height:40px"  alt="Generic placeholder thumbnail Responsive image">
						</td>
						<td style="padding-left:8px;">
							<span style="font-size:14; font-weight:bold;"><?php echo $rows['name']; ?></span>
							<p  class="simplegrey" style="font-size:10;"><?php
								$add=$rows['address'];
								
								$bcat=substr($add,0,13);
							echo $bcat; ?></p>
						</td> 
						<td> </td> 
						<td style="width:157px;"> </td> 
						<td class="pull-right">	
								
								<span class="pull-right" style="padding-right:13px;"><?php echo"$prev_button"; ?></span>
								<span class="pull-right" style="padding-right:13px;"><?php echo"$next_button"; ?></span>
								<div style="height:35px;"></div>
							
						</td>	
							
					
					</tr>
					<tr>
						<td></td>
						<td style="padding-left:8px;">
							
							<img src="images/icons/star.png" width="14px" height="15px"/>
							<img src="images/icons/star icon red prt 2.png" width="14px" height="15px"/>
							<img src="images/icons/star icon red prt 2.png" width="14px" height="15px"/>
							<img src="images/icons/star icon red prt 2.png" width="14px" height="15px"/>
							<img src="images/icons/star icon red prt 2.png" width="14px" height="15px"/>
							<p><span style="font-size:10px;padding-left:2px;">Rate the business</span></p>
						</td>
						
						<td style="" >
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<img src="images/icon_files_white/cash_green.png" width="10px" height="13px"/>
							<img src="images/icon_files_white/cash_green.png"  width="10px" height="13px"/>
							<img src="images/icon_files_white/cash_green.png"  width="10px" height="13px"/>
							<img src="images/icon_files_white/cash_green.png"  width="10px" height="13px"/>
							<img src="images/icon_files_white/cash_green.png"  width="10px" height="13px"/>
							<p><span style="font-size:10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price the business</span></p>
						</td>
					</tr>
				</table>
		
		</div>
		
	</div>
	<div class="row">
		
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
			<form action="Controllers/News_feed/post_on_business.php" method="post">
				<span class="form-group"> 
					<input type="hidden" name="kind" value="business"/>
				</span>
				<span class="form-group"> 
					<input type="hidden" name="cost" value="<?php echo $rows['cost']; ?>"/>
				</span>
				<span class="form-group"> 
					<input type="hidden" name="good" value="<?php echo $rows['good']; ?>"/>
				</span>
				<span class="form-group"> 
					<input type="hidden" name="business_id" value="<?php echo $rows['id']; ?>"/>
				</span>
				
				<span class="form-group"> 												
					<textarea class="form-control" rows="2" name="details" style="background-color:#E9EAEE; resize:none;" placeholder="Write a comment...">
					
					</textarea>   
				</span> 
				<div style="height:7px;"></div>
				<span style="font-size:11px;"></span>
				<span id="image_attach" style="font-size:16px;margin-left:2px; cursor:pointer;" class="icon" data-icon="F"></span>&nbsp;
				<input type="file" id="file_attach" name="file_attach" />
				<script>
					//$(function(){
						document.getElementById("image_attach").onclick = function(){
							alert("really ");	
							//$("#file_attach").click();
						});
						
					//});
				</script>
				<span style="font-size:11px;font-weight:bold;margin-bottom:50px;">Attach photo</span>
				<span class="badge pull-right" style="background-color:#CB525B;">
					<button type="submit" value="post_business" style="background-color:#CB525B;border:0px;">Post review</button>
				</span>
			</form>
		</div>
	</div>
	
	<?php
	}
}  
