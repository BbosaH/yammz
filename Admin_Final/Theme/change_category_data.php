
<?php 
	require_once "classes/connector.php";
	$conn2 = new connector();
	$category_id=$_GET['id'];
?>

<div class="dataTable_wrapper" style="background-color:#fff;">
	<table class="table table-bordered table-hover" style="background-color:#fff;margin-left:2%;margin-right:2%;width:96%;" id="dataTables2">
		<thead>
		<tr>
			<th>No.</th>
			<th>Sub category</th>												
			<th>Status</th>
			<th>Edit</th>
		</tr>
		</thead>
		<tbody>
		  <?php
		$sql = $conn2->getAll("SELECT * FROM sub_category WHERE category_id='".$category_id."'");
		
		$number=0;
		foreach ($sql as $value) {
						
			$sql2 = $conn2->getAll("SELECT count(*) FROM sub_category WHERE category_id = '".$value["id"]."'"); 
			
			$sub_category_no=$sql2;
			$number +=1;
		?>
		  <tr>
			<td><?php echo $number; ?></td>
			<td><?php echo $value["name"];  ?></td>
			
			<td><?php echo "active";  ?> </td>
			<input type="hidden" id="<?php echo $value['id']; ?>" value="<?php echo $value['name']; ?>" />
			<td><a class="yammz_red" style="cursor:pointer;text-decoration:none;" onclick="showSubCategoryName(<?php echo $value['id']; ?>);">Edit</a></td>
							
		  </tr>
		<?php
		}
		  ?>
		</tbody>
	</table>
</div>