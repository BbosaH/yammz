<?php 
<pre>
	$app_id = "197461980617083";
	 
	$app_secret = "dd3b317872fac31003615fd13616553d";
	 
	$my_url = "http://yammzit.com/register.php";
	 
	$token_url = "https://graph.facebook.com/oauth/access_token?"
	 
	. "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
	 
	. "&client_secret=" . $app_secret . "&code=" . $code . "&scope=publish_stream,email";
	 
	&nbsp;
	 
	$response = @file_get_contents($token_url);
	 
	$params = null;
	 
	parse_str($response, $params);
</pre>
<pre>
	$graph_url = "https://graph.facebook.com/me?access_token="
	 
	. $params['access_token'];
	 
	&nbsp;
	 
	$user = json_decode(file_get_contents($graph_url));
	 
	$username = $user->username;
	 
	$email = $user->email;
	 
	$facebook_id = $user->id;
</pre>
$result = mysql_query("select * from `YOUR_TABLE_NAME` where `facebook_id`='$facebook_id'");
 
if (mysql_num_rows($result) == 1)
 
{
 
$usr = mysql_fetch_array($result);
 
$_SESSION['username'] = $usr['username'];
 
$_SESSION['uid'] = $usr['id'];
 
$_SESSION['access_token'] = $params['access_token'];
 
?>
 
<script>
 
top.location.href='home2.php'
 
</script>
 
<?php
 
}
 
else // if user not in db
 
{
 
$join_date  = date('Y-m-d h:i:s');
 
//$query = mysql_query("INSERT INTO user (name, email, facebook_id, join_date)
$query = mysql_query("INSERT INTO user (name, email,password)
 
VALUES ('$username', '$email', '$username')");
 
$_SESSION['uid'] = mysql_insert_id();
 
$_SESSION['username'] = $username;
 
$_SESSION['access_token'] = $params['access_token'];
 
?>
 
<script>
 
top.location.href='home2.php'
 
</script>
 
<?php
 
}



?>