<?php 
  include("header.php");
?>

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
        
          <div class="row mt">
            <div class="col-lg-12 col-md-12 col-xlg-12">
              <div class="col-lg-12 noSidePadding">
                
              </div>
              <div class="col-lg-12 noSidePadding">
                <div class="form-panel padding yammzitPanel">
					<?php 
           
						$msg=$_GET['msg'];
						
						if(!empty($msg)){
							require_once "classes/connector.php";
							$conn = new connector();						
							
							$conn->success_alert($msg);
						}
					?>
                  
                  <div class="panel-body" style="font-size:13px; color:black;">
                         <h4 class="mb" style="margin-top:-10px;">
                            <p  class="yammz_red" style="font-size:14px;">Pending Advert Requests</p>
                        </h4>
                			<?php
                				$status="Pending";
                				include("addrequestselector.php");							
                			?>
                  </div>
                </div>
              </div>
            </div>
	
          </div>

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








