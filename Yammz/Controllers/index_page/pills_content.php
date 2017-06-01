<?php 
		$active=mysql_query("SELECT * FROM category LIMIT 1");
		$activerow=mysql_num_rows($active);
		$idactive="";
		while($rows=mysql_fetch_array($active)){
			$idactive=$rows['id'];
		}
			
		$qry="SELECT * FROM category";
		$result=mysql_query($qry) or die ('Unable to execute query!!'.mysql_error());
		$row=mysql_num_rows($result);
		if($row>=1){	
						
			while($rows=mysql_fetch_array($result)){
				$name=$rows['name'];
				$id=$rows['id'];
				
?>
			
			<?php  if($id==$idactive) {?>
				<div class="tab-pane active" id="<?php echo"$id"; ?>">	
					<h4 ><span class="redbright" style="padding-top:2px;"><?php echo"$name"; ?></span></h4>
					<?php include("pills_content_select.php");?> 
					<?php	getPillContent($id,$name);
					?>
				</div>
			<?php } ?>	
				<div class="tab-pane" id="<?php echo"$id"; ?>">	
					<h4 ><span class="redbright" style="padding-top:2px;"><?php echo"$name"; ?></span></h4>
					
				</div>
				
<?php 
			}
		}

?>