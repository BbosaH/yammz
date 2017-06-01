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

    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <?php 
          if(isset($_GET['a'])){
          }else{
        ?>

        	<h3>
            <i class="fa fa-angle-right"></i>   Businesses
          </h3>
          <?php
              $msga = "";
              if(isset($_POST['addSearchAdd'])){
                $res = AdminImageUpload("addSearchAdd","slide_image");
                if(is_array($res) && count($res) > 0){
                  foreach ($res as $value) {
                    $msga = $msga . "<br/> " . $value;
                  }
                }else{
                  $business_id = trim($_POST['business_id']);
                  $strength = trim($_POST['strength']); 
                
                  try{
                    $sql = "INSERT INTO sponsored_search_results (business_id, strength, slide_image) 
                    VALUES (".$business_id.", ".$strength.",  '".$res."')";         
                    $conn->exec($sql);
                  }catch(PDOException $e)
                  {
                    $msga = $e->getMessage();
                  }
                }   
              }
          ?>
          <div class="row mt" >
            <div class="col-lg-6" >
              <div class="col-lg-12 noSidePadding">
                <div class="form-panel padding yammzitPanel">
                  <h4 class="mb noMarginBottom">
                    <i class="fa fa-angle-right"></i> Add Business
                    <a data-toggle="collapse" data-parent="#countriesPanel" href="#collapseTwo" aria-expanded="true" class=""><i class="fa fa-crosshairs pull-right"></i></a>
                  </h4>
                  <div id="collapseTwo" class="panel-collapse collapse in" aria-expanded="true">
                    <form action="searchadds.php" class="form-horizontal style-form padding" method="POST" enctype="multipart/form-data" >
                        <div class="errorDiv"><?php echo $msga; ?></div>
                       <!-- <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Select business from the table below </label>
                            <input type="hidden" id="business_id" name="business_id" value="" />
                            <input type="text" class="form-control input-sm" id="selectedBusiness" disabled name="selectedBusiness" value="" />
                        </div>-->
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Business Name</label>
                            <input type="text" required class="form-control input-sm " name="strength" value="" />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Address</label>
                            <input type="text" required class="form-control input-sm " name="strength" value="" />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">City</label>
                            <input type="text" required class="form-control input-sm " name="strength" value="" />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Contact phone</label>
                            <input type="text" required class="form-control input-sm " name="strength" value="" />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Business phone</label>
                            <input type="text" required class="form-control input-sm " name="strength" value="" />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Email</label>
                            <input type="text" required class="form-control input-sm " name="strength" value="" />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Website</label>
                            <input type="text" required class="form-control input-sm " name="strength" value="" />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Logo</label>
                            <input type="file" class="form-control input-sm " name="slide_image" required />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Banner</label>
                            <input type="file" class="form-control input-sm " name="slide_image" required />
                        </div> 
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Location</label>
                            <input type="text" required class="form-control input-sm " name="strength" value="" />
                        </div> 
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">good</label>
                            <input type="text" required class="form-control input-sm " name="strength" value="" />
                        </div> 
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">cost</label>
                            <input type="text" required class="form-control input-sm " name="strength" value="" />
                        </div>                      
                        <button type="submit" name="addSearchAdd" class="btn btn-block yammzit whiteColor">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 noSidePadding">
                <div class="form-panel padding yammzitPanel">
                  <h4 class="mb noMarginBottom">
                    <i class="fa fa-angle-right"></i>View Businesses
                  </h4>
                  <div class="panel-body" style="font-size:13px; color:black;">
                    <?php include("businessviewer.php"); ?>
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