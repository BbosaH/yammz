<?php
	
	$id=$_SESSION['SESS_MEMBER_ID'];
	
	$qry="SELECT * FROM  likes WHERE user_id='$id' AND newsfeed_id='$feeds_id'";
	$result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());
	$row=mysql_num_rows($result);
	if($row>=1){
	?>
		<img src="images/icons/like85-3.png" width="13" height="13px">&nbsp;&nbsp;Like
			
	<?php	
	}
	else{
	?>
		<img src="images/icons/contract.png" width="13" height="13px">&nbsp;&nbsp;Unlike
		
	<?php
	}
?>