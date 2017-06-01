<?php 

	session_start();
	if(session_destroy())
	{

		 $id=$_SESSION['SESS_MEMBER_ID'];
		 header("location: ../../index.php");
		 exit();
	}

?>