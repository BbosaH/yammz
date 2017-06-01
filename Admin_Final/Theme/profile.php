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
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Admin Profile </h3>
        <div class="row mt">
          <div class="col-lg-12">

            <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="content-panel pn">
                <div id="profile-02">
                  <div class="user">
                    <img src="<?php echo $admin['avatar']?>" class="img-circle" width="80">
                    <h4><?php echo $admin['username']?></h4>
                  </div>
                </div>
                <div class="pr2-social centered">
                  <form style="margin-top:10px;" class="form-inline" action="profile.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group input-group">
                        <input type="file" class="form-control input-sm" name="avatar" />
                        <span class="input-group-btn">
                             <button 
                                type="submit" 
                                class="btn btn-sm yammzit whiteColor"
                                name="newprofileavatar"> 
                                <span class="fa fa-upload"></span> upload
                             </button>
                        </span>
                    </div>
                    <div class="errorDiv" style="background-color:white"><?php echo $msga; ?></div>
                  </form>
                </div>
              </div><! --/panel -->
            </div><!--/ col-md-4 -->

            <div class="col-lg-4 col-md-4 col-sm-4 mb" >
              <div class="form-panel padding">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Update your password</h4>
                      <form class="form-horizontal style-form padding" method="POST" >
                          <?php
                            $msgb ="";
                            if(isset($_POST["changepassword"])){
                                try{
                                  if(strlen($_POST['newpassword']) < 6 ){
                                    $msgb = "Password must be atleast 6(six) characters long";
                                  }
                                  if(strcasecmp($_POST['newpassword'],$_POST['confirmpassword']) != 0 ){
                                    $msgb = "The new password and the confirm password are not the same";
                                  }
                                  if(strlen($msgb) == 0){
                                    $sql = "UPDATE admin SET password = '".$_POST['newpassword']."' WHERE id =" . $_SESSION['admin_id'] . " AND password = '". $_POST['oldpassword'] ."'";
                                    $cnt = $conn->exec($sql);
                                    if($cnt == 0){
                                      $msgb = "Update failed";
                                    }else{
                                      $msgb = "Password updated successfully";
                                    }
                                  }
                                }catch(PDOException $e)
                                {
                                  $msgb = $e->getMessage();
                                }
                            }
                          ?>
                          <div class="errorDiv"><?php echo $msgb; ?></div>
                          <div class="form-group padding10">
                              <label class=" padding">Old password</label>
                                  <input type="password" class="form-control input-sm" name="oldpassword" required />
                          </div>
                          <div class="form-group padding10">
                              <label >New password</label>
                                  <input type="password" class="form-control input-sm" name="newpassword" required />
                          </div>
                          <div class="form-group padding10">
                              <label >Confirm password</label>
                                  <input type="password" class="form-control input-sm" name="confirmpassword" required />
                          </div>
                          <button type="submit" name="changepassword" class="btn btn-block yammzit whiteColor">Submit</button>
                      </form>
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