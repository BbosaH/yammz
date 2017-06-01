
<?php 

	$user=$_SESSION['SESS_MEMBER_ID'];
	$qry="SELECT * FROM user WHERE id='$user'";
	$results=$conn->getAll($qry);
	// $result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());
	$rowCount=count($results);
	if($rowCount>=1){
		foreach($results as $result){
			$name=$result['first_name'].' '.$result['last_name'];
			$photo=$result['avatar'];
			if($photo==null || $photo=='' ){
				$photo = BaseImageURL."uploads/defavatar.png";
			}else if(strpos($photo, 'http', 0)===0){
	    		$photo=$photo;

		    }else
		    {
		    	$photo=BaseImageURL.$photo;
		    }
			
?>
	<img src="<?php echo $photo  ?>" width="25" height="25px" style="margin-top: -7px;" class="img-circle">&nbsp;<?php echo "$name";  ?>

	<?php
		}
	}
	

?>
	