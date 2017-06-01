
<?php
require_once "classes/connector.php";

$conn = new connector();
$searchTerm = $_POST['keyword'];

$query = $dbase->query("SELECT * FROM country WHERE name LIKE '%".$_POST["keyword"]."%'");

echo '<ul id="country-list">';
foreach ($query as $key => $row) {
	
?>
<li onClick="selectCountry('<?php echo $row["name"]; ?>','country_item','<?php echo $row["id"]; ?>');"><?php echo $row["name"]; ?></li>
<?php
}

echo "</ul>";

?>

<?php

$query2 = $dbase->query("SELECT * FROM city WHERE name LIKE '%".$_POST["keyword"]."%'");

echo '<ul id="country-list">';
foreach ($query2 as $key => $row2) {
	
?>
<li onClick="selectCountry('<?php echo $row2["name"]; ?>','city_item','<?php echo $row2["id"]; ?>');"><?php echo $row2["name"]; ?></li>
<?php
}

echo "</ul>";

?>