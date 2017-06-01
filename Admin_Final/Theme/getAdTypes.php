<?php 

require_once "classes/connector.php";
  $conn = new connector();
  $id=$_GET['id'];

  $key="";
  if(strlen($id)>0){
  	$key="specific";
  }else{
  	$key="";
  	$id="";
  }

  $types=$conn->getAdTypeDetails($key,$id);

  echo json_encode($types);
?>