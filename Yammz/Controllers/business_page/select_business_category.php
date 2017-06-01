<?php 
	include("db_connect.php");
	//require_once __DIR__ . '/error_message.php';
	$db = new DB_CONNECT();
	$qry="SELECT *FROM category ";
	$result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());
	$row=mysql_num_rows($result);
	$returnable="";
	if($row>=1){
		while($rows=mysql_fetch_array($result)){
			$icon=$rows['icon'];
			$name=$rows['name'];
			$returnable="<img src='$icon'  width='10px' height='10px'/>&nbsp$name";
			echo"$returnable";
		}
		
	}
?>