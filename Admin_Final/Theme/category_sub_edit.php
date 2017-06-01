<?php 
  include("header.php");
  require_once "classes/connector.php";
	$conn2 = new connector();
	$category_id=$_GET['ctgy'];

?>
	<script>
		function showSubCategoryName(str) {
			
			var nm=document.getElementById(str).value;
			document.getElementById("sub_category").value=nm;
			document.getElementById("dd").value=str;
		}
		
		function changeData(str) {
			  
			  if (window.XMLHttpRequest) {
			    // code for IE7+, Firefox, Chrome, Opera, Safari
			    xmlhttp=new XMLHttpRequest();
			  } else { // code for IE6, IE5
			    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function() {
			    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			      document.getElementById("change_data").innerHTML=xmlhttp.responseText;
			    }
			  }
			  xmlhttp.open("GET","change_category_data.php?id="+str,true);
			  xmlhttp.send();
			}
			
	</script>
<section id="container" >
    <?php 
      include("heading.php");

    ?>
   
    <?php 
      include("sidemenu.php");
    ?>

    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content" style="margin-bottom:-10px;" >
		<section class="wrapper">  
			<div class="row mt">			
				<div class="col-lg-12 col-md-12 col-xl-12 col-sm-12" >
				
					<div class="panel panel-default" style="border:0px;">						
						<div class="panel-body">
							<div class="yammz_red" style="margin-top:-7px;margin-bottom:-12px;">
								<p style="font-size:18px;">View sub categories</p>
							</div>
							<hr style="margin-left:-2%;margin-right:-2%;border-color:#F0F0F0;"></hr>
							<div style="height:1.1px;;"></div>
							<hr style="margin-left:-2%;margin-right:-2%;border-color:#F0F0F0;"></hr>						
							<div style="margin-top:-15px;margin-bottom:-20px;">
								<p class="yammz_red" style="margin-left:35%;">View sub Categories</p>
							</div>
						</div>
						
						
					</div>
				</div>
				
			</div>
			
			<div class="row" >	
				
					<div class="col-lg-5 col-md-5 col-xl-5 col-sm-5">
						<div class="panel panel-default" style="border:0px;margin-top:-4%;min-height:500px;border:0px;">						
							<div class="panel-body">
								<?php
									if (!empty($_POST['edit_subcategory']) && $_POST['edit_subcategory']=="edit_subcategory" ){
										$app= $conn2->subcategory_update($_POST['dd'],$_POST['sub_category'],$_POST['category'],$_POST['other_details']);
										
										$response="";
										foreach($app as $app){
											$response=$app['response'];
											
										}
										if(strcmp($response,"true")==0){
											$conn2->success_alert("Thanks, Sub category Updated");
										}else{
											$conn2->Error_alert("Error! An error has occurred and Updating sub category has failed");
										}
									
									}
									
								?>
								<div id="flash"></div>
								<div id="show"></div>
								<form action="" role="form" action="" method="post" style="margin-left:4%;margin-right:4%;">											
									<div class="form-group">
										<input type="hidden" id="dd" name="dd" value=""/>
										 <label style="margin-top:15px;">Subcategory Name</label>
										 <input type="text" class="form-control" id="sub_category" name="sub_category" style="border-radius:0px;background-color:#DCDFE4;border:0px;" required>
									</div>
									<div class="form-group">											
										 <label style="">Category</label>
										 
										 <select class="form-control" name="category" style="border-radius:0px;background-color:#DCDFE4;border:0px;" onchange="changeData(this.value);" required>
											<?php
													$sql= $conn2->getAll("SELECT * FROM category WHERE id='$category_id'");
													
													foreach($sql as $ctr){
														echo"<option value='".$ctr['id']."'>".$ctr['name']."</option>";
													}													
											?>
											<?php
													$sql4= $conn2->getAll("SELECT * FROM category WHERE id !='$category_id'");
													
													foreach($sql4 as $ctr4){
														echo"<option value='".$ctr4['id']."'>".$ctr4['name']."</option>";
													}													
											?>
											
										</select>
								</div>
									<div class="form-group">											
										 <label style="" class="">Other Details</label>
										 <textarea class="form-control" name="other_details" style="border-radius:0px;resize:none;background-color:#DCDFE4;border:0px;"></textarea>
									</div>
									<button type="submit" class="btn btn-small submit_button" style="height:25px;color:#fff;background-color:#BE2633;padding-top:2px;width:30%;margin-left:30%;" name="edit_subcategory" value="edit_subcategory">Save</button>
								</form>
								<hr style="margin-left:4%;margin-right:4%;background-color:#DCDFE4;border-color:#DCDFE4;height:2px;"></hr>
								<label style="margin-left:4%;margin-right:4%;" >All Icons ID</label>
								
								<iframe src="yammzfonts/icons-reference.html" style="width:100%; height:300px;"></iframe>
								<hr style="margin-left:4%;margin-right:4%;background-color:#DCDFE4;border-color:#DCDFE4;height:2px;"></hr>
								
								<label style="margin-top:0px;margin-left:4%;margin-right:4%;font-weight:bold;"><u>Summary of categories and sub categories</u></label>
								<p style="margin-left:20%;margin-right:4%;">No. of Categories&nbsp;<span style="font-weight:bold;">
								<?php
									$sql = $conn2->getAll("SELECT * FROM category");
									$no = count($sql);
									//echo $no2;;
									//$res = $conn->query($sql);
									//$no=$res->rowCount();
									echo $no;
								?>
								</span><p>
								<p style="margin-left:20%;margin-right:4%;" >No. of Categories&nbsp;<span style="font-weight:bold;">
								<?php
									$sql2 = $conn2->getAll("SELECT * FROM sub_category");
									//$res2 = $conn->query($sql2);
									$no2=count($sql2);
									echo $no2;
								?>
								</span></p>
							</div>
						</div>
					</div>
					<div class="col-lg-7 col-md-7 col-xl-7 col-sm-7">
						<div class="panel panel-default" style="border:0px;margin-top:-3%;margin-left:-5.5%;min-height:630px;border:0px;">						
							<div class="panel-body">
								<div id="change_data">
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
								</div>
							</div>
						</div>
					</div>
				
			</div>
	
		</section>
    </section>

    <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>