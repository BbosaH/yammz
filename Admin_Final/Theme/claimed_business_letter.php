<?php 
  include("header.php");
  require_once('classes/connector.php');    		
  $connn = new connector();    
 
?>

<style>
	.btn-file {
		position: relative;
		overflow: hidden;
		max-width: 110%;
		height:20px;
		padding-left:2px;
		background-color:#BE2633;
		padding-top:2px;
		font-size:12px;
		color:#ffffff;
	}
	.btn-file input[type=file] {
		position: absolute;
		top: 0;
		right: 0;
		max-width: 50px;
		max-height: 20px;
		font-size: 100px;
		text-align: right;
		filter: alpha(opacity=0);
		opacity: 0;
		outline: none;
		background: white;
		cursor: inherit;
		display: block;
		color:#ffffff;
		
	}

	.table.dataTable td {
    padding: 13px;
	}

	

</style>
<section id="container" >
      <?php 
        include("heading.php");
      ?>

      <?php 
        include("sidemenu.php");
      ?>
 
      <!-- -->
      <section id="main-content" style="background-color:#EAE9EF;">
      	
      	<section class="wrapper" style="margin-top:80px;">     	

      		 	
              <div class="col-lg-12 noSidePadding" >
    				<!-- <div class="form-panel padding yammzitPanel"> -->
    				<div class="panel panel-default padding ym_panel" style="margin-bottom:20px;" id="printables">
    					
        				<div class="panel-body" style="font-size:13px; color:black;">

              				<div class="row">
								<div class="col-md-9 col-xl-9 col-lg-9 col-sm-9 col-xs-9"></div>
								<div class="col-md-3 col-xl-3 col-lg-3 col-sm-3 col-xs-3">
									<img src="../../../admin/Theme/uploads/2246113733863431471255316.jpg" style="width:150px;height:170px;">
								</div>
							</div>

							<div class="row">
								<div class="col-md-8 col-xl-8 col-lg-8 col-sm-8 col-xs-8">
									<div class="left">
										<div ><h1 style="color:#741B1D !important;font-weight:bold !important;margin-top:10px !important;">Hello from Yammz,</h1></div>
										<p style="font-weight:lighter;font-size:20px ;">You're almost done claiming your business on Yammzit</p>
										<p style="font-weight:bold;">After you verify your identity, you will have full control of your business page in a day. Then you can easily:</p>
										
										<p><label style="font-size:30px">.</label> Keep your working hours, contacts, and address details upto date</p>

										<p><label class="bold" style="font-size:30px;margin-top:-30px;">.</label> Connect to your customers by replying to their messages</p>

										<p><label class="bold" style="font-size:30px;margin-top:-30px;">.</label> 
										View all reviews & comments made byyour customers</p>
										
									</div>
									
								</div>
								<div class="col-md-1 col-xl-1 col-lg-1 col-sm-1 col-xs-1">
									<hr style="height:250px ;width:4px;background-color:#EAE9EF !important;margin-top:15px;border:0px;margin-right:0px;">
								</div>
								<div class="col-md-3 col-xl-3 col-lg-3 col-sm-3 col-xs-3">
									<div style="margin-left:-10px;margin-top:15px;">
										<p style="color:#741B1D !important;font-weight:bold !important;">Hey: <span id="users_name" style="color:#741B1D !important;"></span></p>
										<p style="font-weight:bold !important;">Your business listing is:</p>
										<h6><span id="business_name"></span></h6>
										<h6><span id="business_address"></span></h6>
										<!-- <h6>P.O Box 3224</h6> -->
										<h6>+<span id="business_phone"></span></h6>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 col-xl-10 col-lg-10">
									<div class="left">
										<p style="color:#741B1D !important;font-weight:bold;">Customers need to know what's going on right now. Log in frequently to keep your information current and keep your customers upto date with your business.</p>
									</div>
								</div>
							</div>
							<h3 style="color:#741B1D !important;font-weight:bold !important;">After Verification</h3>

							<div class="row">
								<div class="col-md-4 col-xl-4 col-lg-4 col-sm-4 col-xs-4">
									<div class="left">
										<p style="color:#741B1D !important;font-weight:bold;">Reply to your Business Messages</p>
										<p>Stay connected to your customers by replying to messages sent in real time.</p>

										<div style="height:100px;width:150px;text-align:center;background-color:#741B1D !important;">
											<i style="margin-top:13%;font-size:60px;color:#ffffff !important;" class="ion ion-ios-email"></i>
										</div>
									</div>
								</div>
							
								<div class="col-md-4 col-xl-4 col-lg-4 col-sm-4 col-xs-4">
									<div class="left">
										<p style="color:#741B1D !important;font-weight:bold;">Advertise your product or service</p>
										<p>Reach millions of people by advertising on Yammzit to grow your business</p>

										<div style="height:100px;width:150px;text-align:center;background-color:#741B1D !important;">
											<img src="../../../admin/Theme/uploads/Redbox.png" style="height:60px;width:60px;margin-top:13%;">
										</div>
									</div>
								</div>

								<div class="col-md-4 col-xl-4 col-lg-4 col-sm-4 col-xs-4">
									<div class="left">
										<p style="color:#741B1D !important;font-weight:bold;">Reply to comments and Reviews</p>
										<p>Build a good relationship with your customers byreplying to comments and reviews as the business</p>

										<div style="height:100px;width:150px;text-align:center;background-color:#741B1D !important;">
											<i style="margin-top:13%;font-size:60px;color:#ffffff !important;" class="ion ion-chatbox"></i>
										</div>
									</div>
								</div>

							</div>

							<h5 style="color:#741B1D !important;">Verification Code</h5>

							<div class="row">
								<div class="col-md-3 col-xl-3 col-lg-3 col-sm-3 col-xs-3">
									<div class="well" style="border-color:#741B1D;background-color:#ffffff;border-radius:0px;color:#5A5A5A ;">
										<h3 class="bold" style="margin-top:-5px;margin-bottom:-5px;"><span id="code"></span></h3>
									</div>
								</div>
							</div>

							<p class="">NB: This Code will expair after 4 weeks. Use this while it is still active</p>

              			</div>
              			<div class="panel-footer" style="border-radius:0px;background-color:#741B1D !important;">
              				<div style="text-align:center;color:#F2F2F2 !important;">
              					for more information, please visit our yammzit page at www.yammzit.com
              				</div>
              			</div>

              			
              		</div>
              		<div class="row">
              			<div class="col-xl-5 col-md-5 col-xl-5 col-sm-5 col-xs-5"></div>
              			<div class="col-xl-3 col-md-3 col-xl-3 col-sm-3 col-xs-3">
          					<!-- <a href="//pdfcrowd.com/url_to_pdf/">Save to PDF</a> -->
              				<input type="button" style="background-color:#5A5A5A;color:#ffffff;border-radius:4px;border:0px;height:30px;width:100px;" value="Print Letter" onclick="PrintElem('#printables');" />
              			</div>
              			<div class="col-xl-4 col-md-4 col-xl-4 col-sm-4 col-xs-4" ></div>
              		</div>
              		
              		<br/><br/>

              </div>

 		<script type="text/javascript">
 			
 			document.onload=loadLetter();
 		</script>

      	</section>

      	<?php
      	include("footing.php");
    	  ?>

      </section>

</section>
<?php 
  include("footer.php");
?>
