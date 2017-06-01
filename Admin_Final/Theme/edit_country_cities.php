<?php 
  include("header.php");
  require_once "classes/connector.php";
	$conn2 = new connector();
	$country_id=$_GET['country'];
	//$country_id=3;
?>
	<script>
		function showSubQuestions(str) {
			
			var nm=document.getElementById(str).value;
			document.getElementById("name").value=nm;
			document.getElementById("dd").value=str;
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
								<p style="font-size:18px;">Add New Country and City</p>
							</div>
							<hr style="margin-left:-2%;margin-right:-2%;border-color:#F0F0F0;"></hr>
							<div style="height:1.1px;;"></div>
							<hr style="margin-left:-2%;margin-right:-2%;border-color:#F0F0F0;"></hr>						
							<div style="margin-top:-15px;margin-bottom:-20px;">
								<p class="yammz_red" style="margin-left:35%;">View Country</p>
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
										$sql= $conn2->getAll("SELECT * FROM country WHERE id='$country_id'");
										
										$flag="";
										$this_country_name="";
										foreach($sql as $ctr){
											$flag=$ctr['flag'];
											$this_country_name=$ctr['name'];
										}													
								?>
								<p><B><?php echo $this_country_name; ?></B></p>
								<img  src="<?php echo $photoBase.$flag;?>" style="width:100%;height:150px;border:0px;background-color:#D7D7D7;border-color:#D7D7D7;border-radius:0px;border:0px;" id="logo" name="logo" placeholder=""/> 
								
								<label style="margin-top:0px;;margin-right:4%;margin-top:15%;font-weight:bold;"><u>Summary of Cities</u></label>
								<p style="margin-right:4%;" >No. of Cities&nbsp;<span style="font-weight:bold;">
									<?php
										$sql22 = $conn2->getAll("SELECT * FROM city WHERE country_id='".$country_id."'");
										//$res2 = $conn->query($sql2);
										$no2=count($sql22);
										echo $no2;
									?>
									</span>
								</p>
								<?php 
									if (!empty($_POST['edit_city']) && $_POST['edit_city']=="edit_city" ){
										$app= $conn2->city_update($_POST['dd'],$_POST['name'],$_POST['country'],$_POST['other']);
										foreach($app as $app){
											$response=$app['response'];
											if(strcmp($response,"true")==0){
												$conn2->success_alert("Thanks, City updated");
											}else{
												$conn2->Error_alert("Error! An error has occurred and updating city has failed");
											}
										}
									}
								?>
								<hr style="height:3px;background-color:#D7D7D7;border-color:#D7D7D7;"></hr>
								<div id="replaceable">
									<form role="form" method="post" action="">
										<div class="form-group">
											<input type="hidden" id="dd" name="dd" value=""/>
											<label>Name</label>
											<input type="text" class="form-control" id="name" name="name" style="border-radius:0px;background-color:#D7D7D7;"/>
										</div>
										
										<div class="form-group">
											<label>Country</label>
											<select class="form-control" name="country" style="border-radius:0px;background-color:#D7D7D7;">
												<?php
														$sql= $conn2->getAll("SELECT * FROM country WHERE id='$country_id'");
														
														foreach($sql as $ctr){
															echo"<option value='".$ctr['id']."'>".$ctr['name']."</option>";
														}													
												?>
												<?php
														$sql4= $conn2->getAll("SELECT * FROM country WHERE id !='$country_id'");
														
														foreach($sql4 as $ctr4){
															echo"<option value='".$ctr4['id']."'>".$ctr4['name']."</option>";
														}													
												?>
												
											</select>
										</div>
										
										<div class="form-group">
											<label>Other Details</label>
											<textarea class="form-control" id="other" name="other" style="resize:none;border-radius:0px;background-color:#D7D7D7;"></textarea>
										</div>
										<button type="submit" name="edit_city" value="edit_city" class="btn btn-small" style="height:26px;color:#fff;background-color:#BE2633;padding-top:2px;font-size:16px;width:45%;margin-left:30%;margin-top:30px;" name="addCategory" value="insert_category">Submit</button>
									</form>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-lg-7 col-md-7 col-xl-7 col-sm-7">
						<div class="panel panel-default" style="border:0px;margin-top:-3%;margin-left:-5.5%;min-height:630px;border:0px;">						
							<div class="panel-body">
								<div class="dataTable_wrapper" style="background-color:#fff;">
										<table class="table table-bordered table-hover" style="background-color:#fff;margin-left:2%;margin-right:2%;width:96%;" id="dataTables-example">
										    <thead>
												<tr>
													<th>No.</th>
													<th>City</th>												
													<th>Status</th>
													<th>Edit</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$sql2 = $conn2->getAll("SELECT * FROM city WHERE country_id='".$country_id."'");
													
													$number=0;
													foreach($sql2 as $cities){	
														$number +=1;
												?>
														<tr >
															<td><?php echo $number; ?></td>
														
															<td><?php echo $cities['name']; ?></td>
														
															<td></td>
															<input type="hidden" id="<?php echo $cities['id']; ?>" value="<?php echo $cities['name']; ?>" />
															<td><a  style="text-decoration:none;color:#BE2633;cursor:pointer;" onclick="showSubQuestions(<?php echo $cities['id']; ?>);"   id="edit" >Edit</a></td>
														</tr>
												<?php } ?>
											</tbody>
										</table>
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