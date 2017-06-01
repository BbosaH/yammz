<?php
require_once "classes/connector.php";
$conn = new connector();

$id=$_GET['id'];
$n=$conn->getCallToAction("specific",$id);
echo json_encode($n);
?>