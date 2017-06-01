<?php 
  include("header.php");
  //include("mail.php");

  $add_id=$_GET['k'];
  $sts=$_GET['st'];
  $fr="".$_SERVER['HTTP_REFERER']."";
  $dc=0;
  require_once "classes/connector.php";
	$conn = new connector();
?>
<style>
							
		.btn:focus, .btn:active:focus, .btn.active:focus {
			outline: 0 none;
		}

		.btn-primary {
			background: white;
			color:black;
			border-color:#C1C4C9;
		}
		.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
			background: white;
			color:black;
		}
		.btn-primary:active, .btn-primary.active {
			background: #BD2532;
			box-shadow: none;
		}
		
		.btn-file {
			position: relative;
			overflow: hidden;
			background:#3B3B3A;
			border:0px;
			min-width: 70px;
			min-height: 18px;
		}
		.btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			filter: alpha(opacity=0);
			opacity: 0;
			outline: none;
			background:#3B3B3A;
			cursor: inherit;
			display: block;
		}
		.badge-background{
		background-color:#EBEAEF;
		}
		.download{
			background-color:#424A5D;color:#fff;border-radius:8px;margin-left:20%;
		
		}
		.download:hover, .download:focus {
			background: #BD2532;
			color:#ffffff;
		}
		.download:active, .download.active {
			background: #BD2532;
			box-shadow: none;
		}
		
		.decline_accept{
			background-color:#424A5D;color:#fff;border-radius:8px;margin-right:40px;
		
		}
		.decline_accept:hover, .decline_accept:focus {
			background: #BD2532;
			color:#ffffff;
		}
		.decline_accept:active, .decline_accept.active {
			background: #BD2532;
			box-shadow: none;
		}
	</style>
<section id="container" >
    <?php 
      include("heading.php");
    ?>

    <?php 
      include("sidemenu.php");
    ?>
    <!--/*************main content************/-->
	
    <section id="main-content">
    	 <section class="wrapper">
        <?php 
          if(isset($_GET['a'])){
          }else{
        ?>
        <div class="row mt">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 col-xlg-12">
				<?php 

				// $ap=$conn->Update_Approve_Decline_state("9905579579194756","approved");
				// echo "<h1>".$ap."</h1>";
					if (!empty($_POST['advert_opt']) && $_POST['advert_opt']=="declined" ){
						
						//Declaring mail data to be sent
						$message =$_POST['decline_reason'];
						$subject = 'Yammzit Advert Declination Alert';
						$to = $_POST['advert_owner'];
						$tag = "Advert";
						
						//Updating the add status
						// $app= $conn->decline_add($add_id);
						$app= $conn->Update_Approve_Decline_state($add_id,"Declined");
							// foreach($app as $app){
							// 	$response=$app['response'];
								if(strcmp($app,"true")==0){
								
									//sending mail to customer
									sendTheMail($message,$subject,$to,$tag);
									if(count($errors)>0){
									 
									 	$conn->Error_alert("Approving ad successfully processed but An error has occured with sending mail to the client email: <B>".$to."</B>. You may notify the client manually.<br/> <B>NOTE:</B> This error may be caused by slow internet connection, try checking your internet connection or contact the It support manager of your branch.");
									 // echo $errors[0];
									}
									else{
										//Printing success message
										$sts=200;//Hiding Approve button
										$dc=1; //Hiding cancel nd decline button
										// $conn->success_alert("Thanks, an email has been sent to the customer with the reason for declining the advert");
										header('location:'.$fr);
									}
									
								}
								else{
									//Printing Error message
										 $conn->Error_alert("Error! An error has occurred and advert declination has failed");
								}
								
							// }					
						
					}
					else if(!empty($_POST['advert_opt']) && $_POST['advert_opt']=="cancel" ){
						$sts=200;
						$dc=1;
						//$conn->Error_alert("You have cancelled this advert");
						//header('location:' . $_SERVER['HTTP_REFERER']);
						header('location:'.$fr);
					}
					else if(!empty($_POST['advert_opt']) && $_POST['advert_opt']=="approve" ){
					
						// $app= $conn->approve_add($add_id);
						$app= $conn->Update_Approve_Decline_state($add_id,"Approved");
						
						// foreach($app as $res){
							// $response=$res['response'];
							$true="true";
							if(strcmp($app,$true)==0){
								header("location:addrequests.php?msg=The previous advert haas been approved successfully");
					
							}
							else{
				?>
							<div class="alert alert-danger fade in">
								<a href="#" class="close" data-dismiss="alert">&times;</a>
									<h6> Error! advert approval has failed.</h6>
							</div>
				<?php
								
							}
						// }
					}
				?>
				
				<div class="col-lg-12 noSidePadding">
					<div class="panel panel-default yammzitPanel">
					  
						
							<?php

								$arres=$conn->getBusinessInfoOfAd("specific","id",$_GET['k']);
								// var_dump($arres);
								foreach ($arres as $row) {
									
									$ad_url = $row['ad_url'];
									if(strcmp($ad_url, "")==0){
										if(strcmp($row['business_banner'], "")==0){
											$ad_url=$photoBase."uploads/defphoto.jpg";
										}else{
											$ad_url=$photoBase.$row['business_banner'];
										}
									}else{
										$ad_url=$photoBase.$ad_url;
									}		
									$add_description = $row['add_description'];		
									$start_date ="";
									if($row['ad_duration']==1){
										$start_date =$row['ad_duration']." "."week";
									}else{
										$start_date =$row['ad_duration']." "."weeks";
									}
																	
									$business_id=$row['business_id'];
									$adtypeName=$row['adtypeName'];
									$add_title=$row['add_title'];
									
									$min_age=$row['min_age'];
									$max_age=$row['max_age']; 
									$viewer=$row['gender'];
									
									
									$business_logo=$row['business_logo'];									
									$name= $row['business_name'];
									
									$business_email=$row['business_email'];
									
									$country_name="";
									$count=0;
									foreach ($row['country_list'] as $key => $value1) {
										if($count == 0){
											$country_name=$value1['country_name'];
										}else{
											$country_name= $country_name.",".$value1['country_name'];
										}

										$count +=1;										
									}
									
									$city_name="";
									$count2=0;
									foreach ($row['city_list'] as $key => $value1) {
										
										if($count2 == 0){
											$city_name=$value1['city_name'];
										}else{
											$city_name= $city_name.",".$value1['city_name'];
										}

										$count2 +=1;	
									}
									
									$sub_category_name="";
									$count3=0;
									foreach ($row['subcategory_list'] as $key => $value1) {
										
										if($count3 == 0){
											$sub_category_name=$value1['subcategory_name'];
										}else{
											$sub_category_name= $sub_category_name.",".$value1['subcategory_name'];
										}

										$count3 +=1;
									}
									
									$f_category="";
									$count4=0;
									foreach ($row['category_list'] as $key => $value1) {
										
										if($count4 == 0){
											$f_category=$value1['category_name'];
										}else{
											$f_category= $f_category.",".$value1['category_name'];
										}

										$count4 +=1;
									}
									
							?>
							<div class="panel-heading" style="font-size:13px; color:red;">
								
							</div>
					  <div class="panel-body" style="font-size:13px; color:black;">
							<div class="row">
						
								<div class="col-lg-8 col-sm-8 col-xsm-8 col-xlg-8 col-md-8">
									<div class="panel panel-default" style="border-radius:0px;background-color:#EBEAEF;">
										<div class="panel-body">
											<div class="panel panel-default" style="border-radius:0px;background-color:white;margin-left:-4px;margin-top:-4px;margin-right:-4px;margin-bottom:-4px;">
												<div class="panel-body">
													<div class="row" >
														<div class="col-lg-1 col-xl-1 col-sm-1 col-md-1 col-xs-3 ">
															<?php
																if(empty($business_logo)){?>
																	<img src="<?php echo $photoBase; ?>uploads/deflogo.png" class="img-circle" style="width:45px;height:45px;"  alt="Generic placeholder thumbnail">
															<?php 
																} else{
															?> 
																	<img src="<?php echo $photoBase.$business_logo; ?>" class="img-circle" style="width:45px;height:45px;"  alt="Generic placeholder thumbnail">
															<?php
																}
															
															?>
														</div>
														<div class="col-lg-11 col-xl-11 col-sm-11 col-md-11 col-xs-9 ">
															<div style="margin-left:-8px;padding-top:5px;">
																<?php echo $name; ?>
																<p style="margin-left:0px;color:#AAAAAA;" class="grey">Sponsored</p>
															</div>
														</div>
														
													</div>
													<div class="row" >
														<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 " style="margin-top:-10px;">
														
															<h6 style="padding-left:10px;">
																<?php echo $add_description; ?>
															</h6>
															<img src="<?php echo $ad_url; ?>" style="width:100%;height:400px;" alt="Responsive image" />
															<h3></h3>
														</div>	
													</div>
													
													<span href="" style="backgroung-color:#ACAEAE;font-weight:bold;font-size:16;" class="pull-left" ><?php echo $add_title; ?></span>
													<span href="" style="backgroung-color:#F0F0F0;height:30px;color:black; margin-right:6px;padding-top:10px;" class="badge badge-background pull-right" ><?php echo $row['call_to_action']; ?></span>
												
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-sm-4 col-xsm-4 col-xlg-4 col-md-4">
									<span style="backgroung-color:#F0F0F0;color:black; margin-right:6px;border-radius:0px;width:100%;height:6%; padding-top:8px;font-size:16px;" class="badge badge-background" >Location </span>
									<table style="margin-left:10px;margin-top:25px;">
										<tr>
											<td style="font-weight:bold;width:100px;">Country</td><td  style="color:#A6A8B4;font-size:14px;"><?php echo $country_name;?></td>
										</tr>
										<tr><td colspan="2"><div style="height:13px;"></div></td></tr>
										<tr>
											<td style="font-weight:bold;width:100px;">City</td><td style="color:#A6A8B4;font-size:14px;"><?php echo $city_name;?></td>
										</tr>
										
									</table>
									<span style="backgroung-color:#F0F0F0;color:black; margin-right:6px;border-radius:0px;width:100%;height:6%; padding-top:8px;font-size:16px;margin-top:30px;" class="badge badge-background" >Duration</span>
									<table style="margin-left:10px;margin-top:15px;">
										<tr>
											<td style="font-weight:bold;width:100px;">Duration  </td><td  style="color:#A6A8B4;font-size:14px;"><?php echo $start_date; ?></td>
										</tr>
										<tr><td colspan="2"><div style="height:13px;"></div></td></tr>
										
										
									</table>
									<span style="backgroung-color:#F0F0F0;color:black; margin-right:6px;border-radius:0px;width:100%;height:6%; padding-top:8px;font-size:16px;margin-top:30px;" class="badge badge-background" >Devise </span>

									<?php 
									$url=$photoBase.$row['adtypeImage'];
									if (strcmp($row['adtypeName'], "Mobile Side Ad")==0) {
										
										echo'<img src="'.$url.'" style="margin-left:130px;margin-top:20px;width:60px; height:100px;">';
									}else{
										echo'<img src="'.$url.'" style="margin-left:60px;margin-top:20px;width:140px; height:100px;">';
									} ?>						

									<span style="backgroung-color:#F0F0F0;color:black; margin-right:6px;border-radius:0px;width:100%;height:6%; padding-top:8px;font-size:16px;margin-top:25px;" class="badge badge-background" >Category </span>
									<table style="margin-left:10px;margin-top:15px;">
										<tr>
											<td style="font-weight:bold;width:100px;">Category: &nbsp;</td><td  style="color:#A6A8B4;font-size:14px;"><?php echo $f_category; ?></td>
										</tr>
										<tr><td colspan="2"><div style="height:13px;"></div></td></tr>
										<tr>
											<td style="font-weight:bold;width:100px;">Subcategory:</td><td style="color:#A6A8B4;font-size:14px;"> &nbsp;<?php echo $sub_category_name; ?></td>
										</tr>
										
									</table>
								</div>							
								
							</div>
							<div class="row">
								<div class="col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12">
									<hr style="background-color:#EBEAEF;height:10px;"></hr>
									
									<div class="row">
										<div class="col-lg-6 col-sm-12 col-xs-12 col-xlg-6 col-md-6">
											<div class="row">
												<div class="col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12">
													<label class="col-lg-4 col-sm-12 col-xs-12 col-xlg-4 col-md-4" style="font-size:12px;font-weight:bold;"> Age</label>
									
													<label class="col-lg-8 col-sm-12 col-xs-12 col-xlg-8 col-md-8" style="font-size:12px;font-weight:bold;"><?php echo $min_age; ?> &nbsp; <?php if(empty($max_age)){} else{echo"to&nbsp;  $max_age yrs";} ?></label>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12">
													<label class="col-lg-4 col-sm-12 col-xs-12 col-xlg-4 col-md-4" style="font-size:12px;font-weight:bold;"> Gender</label>
													<label class="col-lg-8 col-sm-12 col-xs-12 col-xlg-8 col-md-8" style="font-size:12px;font-weight:bold;"><?php echo $viewer; ?></label>
												</div>
											</div>
											
											<div class="row">
												<div class="col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12">
													<label class="col-lg-4 col-sm-12 col-xs-12 col-xlg-4 col-md-4" style="font-size:12px;font-weight:bold;"> Caption</label>
													<label class="col-lg-8 col-sm-12 col-xs-12 col-xlg-8 col-md-8" style="font-size:12px;font-weight:bold;"> <?php echo $add_title; ?></label>
												</div>
											</div>
											
										</div>
										
										<div class="col-lg-1 col-sm-1 hidden-xs col-xlg-1 col-md-1">
											<hr style="background-color:#EBEAEF;height:80px;width:6px;margin-top:-10px;"></hr>
										</div>
										
										<div class="col-lg-5 col-sm-12 col-xs-12 col-xlg-5 col-md-5">
											
											<a class="btn download" href="<?php echo $ad_url; ?>" style="" download="<?php echo $add_title; ?>">Download Image</a>
											
											<h6 style="margin-left:-18px;font-size:10px;"> Download the Image and Place it  into the Photo Grid  to make sure  that it complies to the size and Type of Image</h6>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12">
											<label class="col-lg-2 col-sm-12 col-xs-12 col-xlg-2 col-md-2" style="font-size:12px;font-weight:bold;"> Description</label>
											<label class="col-lg-10 col-sm-12 col-xs-12 col-xlg-10 col-md-10" style="font-size:12px;"> 
												<span style="font-size:12px;font-weight:bold;">Short description:</span> <?php echo $add_description; ?>
											</label>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12">
											<hr style="background-color:#EBEAEF;height:8px;"></hr>
											
											<label class="col-lg-2 col-sm-12 col-xs-12 col-xlg-2 col-md-2"> Taking Action:</label>
											<label class="col-lg-10 col-sm-12 col-xs-12 col-xlg-10 col-md-10" style="font-size:12px;"> Download the Image provided in the Ad  and place it into  our Photo Grid  to make sure  it complies with our 
											16%  Text Policy  on ll Images submitted for Advertising</label>
											
											<label class="col-lg-2 col-sm-12 col-xs-12 col-xlg-2 col-md-2"> </label>
											<label class="col-lg-10 col-sm-12 col-xs-12 col-xlg-10 col-md-10" style="font-size:12px;"> NB:</label>	
											
											<label class="col-lg-2 col-sm-12 col-xs-12 col-xlg-2 col-md-2"> </label>
											<label class="col-lg-10 col-sm-12 col-xs-12 col-xlg-10 col-md-10" style="font-size:12px;">If this Ad complies  with All our Advertising Policies, Please Approve the Ad.</label>
											
											<label class="col-lg-2 col-sm-12 col-xs-12 col-xlg-2 col-md-2"> </label>
											<label class="col-lg-10 col-sm-12 col-xs-12 col-xlg-10 col-md-10" style="font-size:12px;">If this Ad doesn't comply  with All our Advertising Policies, Please Decline the Ad and contact the Business/ Company that submitted the Ad and Explain as to why 
											the Ad was Declined and what needs to be done for the d to be Approved</label>
											
										</div>
									</div>
									
									
										
										<div class="row" style="margin-top:40px;">	
											<div class="col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12">
											<label class="col-lg-2 col-sm-12 col-xs-12 col-xlg-2 col-md-2"></label>
											<?php 
												if($sts==200){
											
												}else if($sts==404 || $sts==504){
											?>
													<form action="" method="post" role="form" type="">
														<input type="hidden" name="add_id" value="<?php echo $add_id; ?>" />
														<button class="btn col-lg-2 col-sm-12 col-xs-12 col-xlg-2 col-md-2 btn-small decline_accept" type="submit" name="advert_opt"  value="approve" href="" style="">Approve Ad</button>
													</form>
											
											<?php
												}
											?>
											
											<?php if(($dc==1)||$sts==504){} else{ ?>
												
													<button class="btn col-lg-2 col-sm-12 col-xs-12 col-xlg-2 col-md-2 btn-small decline_accept" data-toggle="collapse" data-target="#demo" href="" style="">Decline Ad</button>
																									
											<?php } ?>
											
											<form action="" method="post" role="form" type="">
												<input type="hidden" name="add_id" value="<?php echo $add_id; ?>" />
												<a class="btn col-lg-2 col-sm-12 col-xs-12 col-xlg-2 col-md-2 btn-small decline_accept" type="" value="cancel" name="advert_opt" href="<?php echo $fr; ?>" style="">Cancel</a>
											</form>

											</div>
										</div>
										<div id="demo" class="collapse">
											<form action="" method="post" role="form" type="">
												<div class="row">
													<div class="col-lg-2 hidden-sm hidden-xs col-xlg-2 col-md-2">
													
													</div>
													<div class="col-lg-10 col-sm-12 col-xs-12 col-xlg-10 col-md-10">
														
														<div class="form-group">
															<input type="text" placeholder="TO:" style="margin-top:23px;border-radius:0px;background-color:#EBEAEF;" class="form-control" name="advert_owner" readonly="readonly" value="<?php echo $business_email; ?>">
														</div>
														<div class="form-group">
															<textarea class="form-control" name="decline_reason" style="margin-top:-13px;background-color:#EBEAEF;min-height:150px;border-radius:0px;" placeholder="Explain the reason" required></textarea>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-12 col-sm-12 col-xs-12 col-xlg-12 col-md-12">
														
															<input type="hidden" name="add_id" value="<?php echo $add_id; ?>" />
															<button class="btn col-lg-2 col-sm-12 col-xs-12 col-xlg-2 col-md-2 pull-right" name="advert_opt" type="submit"  value="declined" href="" style="background-color:#BE2633;color:#fff;border-radius:8px;">Send</button>
														
													</div>
												</div>	
											</form>
										</div>
									
									
								</div>
							</div>
						<?php }?>
					  </div>
					</div>
				</div>
			  
            </div>
			
        </div>

        <?php
          }
        ?>
        <br/><br/><br/><br/><br/><br/>
    	</section>

    </section>
    <!--***************end content**************-->

  <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>