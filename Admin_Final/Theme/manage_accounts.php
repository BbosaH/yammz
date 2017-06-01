<?php 
  include("header.php");
  require_once "classes/connector.php";
	$conn2 = new connector();
	$info=$conn2->getOtherAdmins();
?>

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
     <style type="text/css">
     	.center{text-align: center;}

     	th{text-align: left;}
     	td{text-align: left;}
     </style>
    <!--main content start-->
    <section id="main-content" style="margin-top:0px;">
		<section class="wrapper">  
			<div class="row mt">			
				
				<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12 ">
					<div class="panel panel-default" style="border-radius:0px;border-color:#fff;height:auto;">
						<div class=" panel-body">
							<p class="yammz_red" style="margin-top: -10px;font-size: 18px;">Manage Admin Account</p>

							<div id="admin_table">
								<div class="dataTable_wrapper" style="text-align: center">
								  	<table class="table table-bordered table-hover" id="dataTables-example" style="cursor:pointer">
									      <thead >
									          <tr>
									              <th >No.</th>
												  <th>Name</th>
												  <th>Level</th>
									              <th>Country</th>
									              <th>ID No</th>
		              							</tr>
									      </thead>
									      <tbody>
							      			<?php

							      				$no=0;
									      		foreach ($info as $key => $value) {
									      			$no +=1;
									      			$id=$value['id'];
									      			echo '
									      			<tr onclick="actPageAdmin('.$id.');">
									      				<td style="width:30px;">'.$no.'</td>
									      				<td>'.$value['full_name'].'</td>
									      				<td>'.$value['securitylevel'].'</td>
									      				<td>'.$value['country'].'</td>
									      				<td>'.$value['company_id'].'</td>
								      				</tr>	';
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