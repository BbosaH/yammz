<?php
include("../classes/connection_variables");
$hasConnectionError = false;
$errors = array();

$admin = array(
	"id" => 0,
	"username" => "",
	"avatar" => "",
	"status" => "",
);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
{
	array_push($errors, $e->getMessage());
}
?>
