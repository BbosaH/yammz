<?php 

require_once "classes/connector.php";
  $conn = new connector();
  $id=$_GET['id'];

  $types=$conn->getAdTypeDetails($id);

  echo json_encode($types);
?>