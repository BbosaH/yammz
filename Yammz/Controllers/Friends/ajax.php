<?php
session_start();
include("../db_connect.php");

	$db = new DB_CONNECT();
	$kind ="user_profile";
include('addfriend_function.php');
if(isset($_POST)) {
$item_id = abs(intval($_POST['item_id']));

$user=$_SESSION['SESS_MEMBER_ID'];
$query = mysql_query("SELECT * FROM friends WHERE friend_id='$item_id' AND user_id='$user' LIMIT 1");
$check = mysql_num_rows($query);
if ($check == 0) {
$datetime = time();
$add = mysql_query("INSERT INTO friends (friend_id,user_id,date_created) VALUES ('$item_id','$user','$datetime')");
if ($add) {
$check = mysql_query("SELECT id FROM friends WHERE friend_id='$item_id' AND user_id='$user'");
$number = mysql_num_rows($check);
sleep(1);
?>
	<!--<a href="javascript:void();" name="follow" class="follow" id="<?php// echo"$item_id";?>" style="background-color:white; color:black; border:0px;" class="btn btn-default noborderStyle ">
		<span style="font-size:12px; color:white; font-weight:bold;"><div style="color:red;font-size:30px;" data-icon="c" class="icon"></div></span>
		
	</a>
	-->
	
	<a href="javascript:void();" name="adduser" class="adduser" id="<?php echo"$item_id";?>" style="background-color:white;text-decoration:none; color:black; border:0px;" class="btn btn-default noborderStyle ">
		<span style="font-size:12px; color:white; font-weight:bold;"><img src="images/icons/add a friend in black.png"  width="30px" height="30px"></span>
		<br><span style="font-size:8px; ">Unfriend</span>
	</a>
<?php

}
} else {
echo 0;

}
} else {
echo 0;

}