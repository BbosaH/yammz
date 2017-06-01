<?php
session_start();
//require_once __DIR__ . '/db_connect.php';
include("db_connect.php");
//require_once __DIR__ . '/error_message.php';
$db = new DB_CONNECT();
if($_POST)
{
	$user=$_SESSION['SESS_MEMBER_ID'];
	$review_id=$_POST['review_id'];
	$details=$_POST['content'];
	$result=mysql_query("insert into comment(user_id,review_id,details) values ('$user','$review_id','$details')") or die ('Unable to execute query!!'.mysql_error());
	
	if($result){

	?>
	<li class="box">
		<div class="row">
			<table >
				<tr >
					<?php 
						$date_created="12-02-2016";
						$qry="SELECT avatar,name FROM comment,user WHERE  user.id='$user' AND comment.review_id='$review_id'";
						$result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());
						$row=mysql_num_rows($result);
						if($row>=1){
							while($rows=mysql_fetch_array($result)){
								$avatar=$rows['avatar'];
								$name=$rows['name'];
								//$date_created=$rows['date_created'];
					?>
					
					<td style="padding-left:30px; width:55px;"><img src="<?php echo"$avatar"; ?>" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail"></td>
					
					<td>
					
						<span style="font-size:11;"> <?php echo" <span style='color:#555555;font-size:12;'><B>$name</B></span> &nbsp; "; ?></span>
						<div style="height:0px;"></div>
						<span style="font-size:11; padding-right:10px;">
							<?php echo" $details"; ?>
						</span>
						<div style="height:0px;"></div>
						
						<span  style="font-size:10;padding-top:50px;color:#CFCFCF;"> <?php  echo"$date_created";?></span>&nbsp;
						<span style="font-size:11;"><img src="images/icons/like85-3.png" width="13" height="13px">&nbsp;&nbsp;Like</span>
					
					</td>
					<?php
							}
						}
					?>
				</tr>
				<div style="height:20px;"></div>
			</table>																
			
		</div>
	</li>

	<?php
	}
	else{
		echo"Error posting comment".mysql_error();
		
	}
}

else {

	}
 ?>