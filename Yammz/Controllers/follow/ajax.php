<?php
session_start();
include("../db_connect.php");

	$db = new DB_CONNECT();
	$kind ="user_profile";
include('follow_functions.php');
if(isset($_POST)) {
$item_id = abs(intval($_POST['item_id']));

$ip=$_SESSION['SESS_MEMBER_ID'];
$query = mysql_query("SELECT * FROM follow WHERE followed_id='$item_id' AND user_id='$ip' LIMIT 1");
$check = mysql_num_rows($query);
if ($check == 0) {
$datetime = time();
$add = mysql_query("INSERT INTO follow (followed_id,user_id) VALUES ('$item_id','$ip')");
if ($add) {
$check = mysql_query("SELECT id FROM follow WHERE followed_id='$item_id'");
$number = mysql_num_rows($check);
sleep(1);
?>
	<!--<a href="javascript:void();" name="follow" class="follow" id="<?php// echo"$item_id";?>" style="background-color:white; color:black; border:0px;" class="btn btn-default noborderStyle ">
		<span style="font-size:12px; color:white; font-weight:bold;"><div style="color:red;font-size:30px;" data-icon="c" class="icon"></div></span>
		
	</a>
	-->
	<a href="javascript:void();" name="follow" class="follow" id="<?php echo"$item_id";?>" style="background-color:white;text-decoration:none; color:black; border:0px;" class="btn btn-default noborderStyle ">
		<span style="font-size:10px; color:white; font-weight:bold;"><div style="color:red;font-size:20px;" data-icon="c" class="icon"></div></span>
		<span style="font-size:11px;">&nbsp;&nbsp;Unfollow</span>
	</a>
<?php

}
} else {
echo 0;

}
} else {
echo 0;

}