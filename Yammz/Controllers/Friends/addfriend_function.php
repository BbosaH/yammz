<?php

$user=$_SESSION['SESS_MEMBER_ID'];
function check_ip($item_id,$kind,$user) {
$query = mysql_query("SELECT * FROM friends WHERE friend_id='$item_id' AND user_id='$user' LIMIT 1");
$likes = mysql_num_rows($query);
return $likes;
}

function likes($item_id,$kind) {
$query = mysql_query("SELECT * FROM  friends WHERE friend_id='$item_id' AND user_id='$user'");
$likes = mysql_num_rows($query);
return $likes;
}