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

    <!-- **********************************************************************************************************************************************************************************************************************************************************
      MAIN CONTENT
      ********************************************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <?php 
          if(isset($_GET['a'])){
          }else{
        ?>

        	<h3>
            <i class="fa fa-angle-right"></i>  Sliders
          </h3>
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
            <div class="col-lg-6">
              <div class="col-lg-12 noSidePadding">
                <div class="form-panel padding ya
                mmzitPanel">
                  <h4 class="mb noMarginBottom">
                    <i class="fa fa-angle-right"></i> Add an advert for sliders
                    <a data-toggle="collapse" data-parent="#countriesPanel" href="#collapseTwo" aria-expanded="true" class=""><i class="fa fa-crosshairs pull-right"></i></a>
                  </h4>
                  <div id="collapseTwo" class="panel-collapse collapse in" aria-expanded="true">
                    <form action="sliders.php" class="form-horizontal style-form padding" method="POST" enctype="multipart/form-data" >
                        <div class="errorDiv"><?php echo $msga; ?></div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Select business from the table below </label>
                            <input type="hidden" id="business_id" name="business_id" value="" />
                            <input type="text" class="form-control input-sm" id="selectedBusiness" disabled name="selectedBusiness" value="" />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Image</label>
                            <input type="file" class="form-control input-sm " name="slide_image" required />
                        </div>                       
                        <button type="submit" name="addSlideAdd" class="btn btn-block yammzit whiteColor">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 noSidePadding">
                <div class="form-panel padding yammzitPanel">
                  <h4 class="mb noMarginBottom">
                    <i class="fa fa-angle-right"></i>Click a row to select the business
                  </h4>
                  <div class="panel-body" style="font-size:13px; color:black;">
                    <?php include("businessSelector.php"); ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="col-lg-6 noSidePadding">
                <div class="form-panel padding yammzitPanel">
                  <h4 class="mb noMarginBottom">
                    <i class="fa fa-angle-right"></i> Slide adds
                  </h4>
                  <div class="dataTable_wrapper scroll500">
                      <?php 
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
                      ?>
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

    <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>