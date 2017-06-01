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
        <h3><i class="fa fa-angle-right"></i> Yammzit system administrators </h3>
        <?php
          $msgb ="";
          if(isset($_POST["addadmin"])){
              try{
                if(strlen($_POST['password']) < 6 ){
                  $msgb = "Password must be atleast 6(six) characters long";
                }
                if(strcasecmp($_POST['password'],$_POST['confirmpassword']) != 0 ){
                  $msgb = "The new password and the confirm password are not the same";
                }
                if(strlen($msgb) == 0){
                  $sql = "INSERT INTO admin (avatar, username, password, status ) 
                  VALUES ('uploads/avatar.png', '".$_POST['username']."', '".$_POST['password']."' , 'enabled' )";
                  $cnt = $conn->exec($sql);
                  if($cnt == 0){
                    $msgb = "Operation failed";
                  }else{
                    $msgb = "Admin was added successfully";
                  }
                }
              }catch(PDOException $e)
              {
                $msgb = $e->getMessage();
              }
          }
        ?>
        <div class="row mt">
          <div class="col-lg-12">

            <?php

              if(isset($_GET["change"]) && isset($_GET["status"])){
                 $newStatus = strcmp($_GET["status"], "disabled") == 0 ? "enabled" : "disabled";
                 $sql = "UPDATE admin SET status = '" .$newStatus. "' WHERE id = " . $_GET["change"];
                 $conn->exec($sql);
              }
            ?>

            <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="content-panel pn" style="margin-bottom:10px;">
                      <div id="profile-02" class="scroll250">
              <?php 
                  $sql = "SELECT * FROM admin WHERE username != 'admin'";
                  $res = $conn->query($sql);
                  foreach ($res as $row) {
              ?>
                        <div class="user yammzitUserItem" id="ava<?php echo $row['id'];?>">
                          
                          <img src="<?php echo $row['avatar']?>" class="img-circle" width="80">
                          <h4 class="<?php echo strcmp($row['status'],'enabled') == 0?'normalText':'redText'; ?>">
                            <a class="btn btn-warning btn-outline btn-xs " href="admins.php?change=<?php echo $row['id'];?>&status=<?php echo $row['status'];?>"><i class="fa fa-refresh"></i> </a> <?php echo $row['username']?>
                          </h4>
                        </div>
              <?php
                  }
              ?>
                  </div>
              </div><! --/panel -->

            </div><!--/ col-md-4 -->

            <div class="col-lg-4 col-md-4 col-sm-4 mb" >
              <div class="form-panel padding">
                      <h4 class="mb noMarginBottom"><i class="fa fa-angle-right"></i> Add an administrator </h4>
                      <form class="form-horizontal style-form padding" method="POST" >
                          
                          <div class="errorDiv"><?php echo $msgb; ?></div>
                          <div class="form-group padding10 noMarginBottom">
                              <label class=" padding">User name</label>
                                  <input type="text" class="form-control input-sm" name="username" required />
                          </div>
                          <div class="form-group padding10 noMarginBottom">
                              <label >New password</label>
                                  <input type="password" class="form-control input-sm" name="password" required />
                          </div>
                          <div class="form-group padding10 noMarginBottom">
                              <label >Confirm password</label>
                                  <input type="password" class="form-control input-sm" name="confirmpassword" required />
                          </div>
                          <button type="submit" name="addadmin" class="btn btn-block yammzit whiteColor">Submit</button>
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