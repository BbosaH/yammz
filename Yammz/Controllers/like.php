<?php
	session_start();
	require_once __DIR__ . '/db_connect.php';

    $db = new DB_CONNECT();	
	if(isset($_POST)) {
		$content = abs(intval($_POST['item_id']));
		$id=$_SESSION['SESS_MEMBER_ID'];
		
		//$content=$_POST['feed'];
		$qry="SELECT * FROM  likes WHERE user_id='$id' AND newsfeed_id='$content' LIMIT 1";
		$result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());
		$row=mysql_num_rows($result);
		if($row>=1){
			echo 0;
		}
		else{
			
			$comments=mysql_query("INSERT INTO  likes (user_id,newsfeed_id) VALUES ('$id','$content')") or die('Error:'.mysql_error());
			if($comments){
				$check = mysql_query("SELECT id FROM likes WHERE newsfeed_id='$$content'");
				$number = mysql_num_rows($check);
				sleep(1);
				echo 'Liked <span>'.$number.'
					
				</span>';
				
			}
			else{
				echo 0;
				
			}
			
		}
	
	}
	else{
		echo 0;		
	}
	
	
?>