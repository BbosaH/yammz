
<?php
require_once "classes/connector.php";

$conn = new connector();
$searchTerm = $_POST['keyword'];

$query = $dbase->query("SELECT * FROM category WHERE name LIKE '%".$_POST["keyword"]."%'");

echo '<ul id="country-list">';
foreach ($query as $key => $row) {
	
?>
<li onClick="selectCountry_cat('<?php echo $row["name"]; ?>','category_item','<?php echo $row["id"]; ?>');"><?php echo $row["name"]; ?></li>
<?php
}

echo "</ul>";

?>

<?php

$query2 = $dbase->query("SELECT * FROM sub_category WHERE name LIKE '%".$_POST["keyword"]."%'");

echo '<ul id="country-list">';
foreach ($query2 as $key => $row2) {
	
?>
<li onClick="selectCountry_cat('<?php echo $row2["name"]; ?>','sub_category_item','<?php echo $row2["id"]; ?>');"><?php echo $row2["name"]; ?><i class="showme"></i></li>
<?php
}

echo "</ul>";

?>