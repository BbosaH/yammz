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

      		 	
              <div class="col-lg-12 noSidePadding">
    				<!-- <div class="form-panel padding yammzitPanel"> -->
    				<div class="panel panel-default padding ym_panel">
    					<div class="panel-heading"  style="background-color:#ffffff;">
				            <h4 class="mb noMarginBottom bold red_yammz">
				              REQUESTS
				            </h4>
			            </div>
        				<div class="panel-body" style="font-size:13px; color:black;">

              				<div class="dataTable_wrapper" style="text-align: center ">
              					<!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="cursor:pointer"> -->
              					<table class="table table-bordered table-hover" id="dataTables-example" cellspacing="30" style="cursor:pointer;">
	                      			<thead >
				                          <tr>
				                              <th>No</th>
				                              <th>Business Name</th>
				                              <th>Address</th>
				                              <th>Country</th>
				                              <th>City</th>
				                              <th>View</th>
				                          </tr>
				                    </thead>
				                    <tbody>
				                    	<?php
					                          
					                          $res = $connn->getClaimedBusinesses();
					                         
					                          $no=0;
					                          foreach ($res as $value) {
					                            $no +=1;					                           
					                    ?>
					                    		 <tr>
				                    		 	  <td style="text-align: left;"><?php echo $no; ?></td>
					                              <td style="text-align: left;"><?php echo $value["name"]; ?></td>
					                              <td style="text-align: left;"><?php echo $value["address"];  ?></td>
					                              <td style="text-align: left;"><?php echo $value["country"];  ?></td>
					                              <td style="text-align: left;"><?php echo $value["city"];  ?></td>
					                              <td><a  href='claimed_business_detail.php?k=300&bus_id=<?php echo $value["id"];?>'  style="color:#5A5A5A;"   >View</a>
					                              <!--<button   name="add_business" class="btn redbright" style="height:30px; width:150px; background-color:#BD2532; font-weight:bold;border-radius:5px;color:#EED1D5;" onclick="editbusiness(28)">edit Business</button>-->
					                              </td>

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
 
      	</section>

      	<?php
      	include("footing.php");
    	  ?>

      </section>

</section>
<?php 
  include("footer.php");
?>
