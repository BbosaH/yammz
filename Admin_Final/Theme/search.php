
<?php
require_once "classes/connector.php";

$conn = new connector();
$searchTerm = $_POST['keyword'];

$query = $dbase->query("SELECT * FROM business WHERE name LIKE '%".$_POST["keyword"]."%' ORDER BY name ASC");

echo '<ul id="country-list">';
foreach ($query as $key => $row) {
	
?>
<li onClick="selectCountry('<?php echo $row["name"]; ?>','<?php echo $row["id"]; ?>');"><?php echo $row["name"]; ?></li>
<?php
}

echo "</ul>";

?>