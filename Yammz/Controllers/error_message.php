<?php
 function error_message($errmsg,$page){
	
	$errmsg_arr[] = $errmsg;
	$errflag = true;
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header($page);
		exit();
	}
 }
?>