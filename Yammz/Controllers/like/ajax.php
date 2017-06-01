<?php
session_start();
include("../db_connect.php");

	$db = new DB_CONNECT();
include('like_functions.php');
if(isset($_POST)) {
$item_id = abs(intval($_POST['item_id']));
//$ip = get_real_ip();
$ip=$_SESSION['SESS_MEMBER_ID'];
$query = mysql_query("SELECT * FROM likes WHERE newsfeed_id='$item_id' AND user_id='$ip' LIMIT 1");
$check = mysql_num_rows($query);
if ($check == 0) {
$datetime = time();
$add = mysql_query("INSERT INTO likes (newsfeed_id,user_id) VALUES ('$item_id','$ip')");
if ($add) {
$check = mysql_query("SELECT id FROM likes WHERE newsfeed_id='$item_id'");
$number = mysql_num_rows($check);
sleep(1);
?>
	<a href="javascript:void();"  style="font-size:9px; background-color:white;text-decoration:none;" id="<?php ?>"><span class="icon redbright " style="font-size:16px;" data-icon="z"> &nbsp;<span class="simplegrey" style="font-size:12;"><?php echo $number; ?> </span>&nbsp;<span style="font-size:12;" class="simplegrey">
		<?php if($number>=2){
			echo"Likes";
		}
		else{
			echo"Like";
		}
		?>
	</span></a>
<?php

}
} else {
echo 0;
}
} else {
echo 0;
}