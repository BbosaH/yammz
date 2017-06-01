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
        <?php 
          if(isset($_GET['a'])){
          }else{
        ?>

          <?php
              $msga = "";
              if(isset($_POST['addSlideAdd'])){
                $res = AdminImageUpload("addSlideAdd","slide_image");
                if(is_array($res) && count($res) > 0){
                  foreach ($res as $value) {
                    $msga = $msga . "<br/> " . $value;
                  }
                }else{
                  $business_id = trim($_POST['business_id']);
                
                  try{
                    $sql = "INSERT INTO slide (business_id, slide_image) 
                    VALUES (".$business_id.", '".$res."')";         
                    $conn->exec($sql);
                  }catch(PDOException $e)
                  {
                    $msga = $e->getMessage();
                  }
                }   
              }
          ?>
          <div class="row mt">
            <div class="col-lg-12 col-md-12 col-xlg-12">
              <div class="col-lg-12 noSidePadding">
                
              </div>
              <div class="col-lg-12 noSidePadding">
                <div class="form-panel padding yammzitPanel">
                  <h4 class="mb noMarginBottom">
                    <span class="yammz_red" style="margin-left:18px;font-size:14px;">Approved Adverts.<span>
                  </h4>
                  <div class="panel-body" style="font-size:13px; color:black;">
                    <?php
						$status="Declined";
						
						include("addrequestselector.php");							
					?>
                  </div>
                </div>
              </div>
            </div>
			<!-- Wilson
            <div class="col-lg-6">
              <div class="col-lg-6 noSidePadding">
                <div class="form-panel padding yammzitPanel">
                  <h4 class="mb noMarginBottom">
                    <i class="fa fa-angle-right"></i> Slide adds
                  </h4>
                  <div class="dataTable_wrapper scroll500">
                      <?php 
						/*
                        $sql = "SELECT * FROM slide ";
                        $res = $conn->query($sql);
                        foreach ($res as $value) {
                          $thisBusiness = getBusinessOfId(intval($value["business_id"]), false);
                      ?>
                          <div class="sponsored_search_div">
                            <img src="<?php echo $value["slide_image"]; ?>" />
                            <div class="blog-title">
                              <?php echo $thisBusiness['name'];?> <i style="font-size:10px"><?php echo $thisBusiness['address'];?></i>
                            </div>
                          </div>
                      <?php
                        }
						*/
                      ?>
                  </div>
                </div>
              </div>
            </div>
			-->
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
