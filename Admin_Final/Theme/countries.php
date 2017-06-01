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
          if(isset($_GET['c'])){

            $msgb = "";
            if(isset($_POST['addcity'])){
              $name = trim($_POST['name']);
              $country_id = trim($_POST['country_id']);
              $other = trim($_POST['other']);
              if(strlen($name) == 0){
                $msgb = "The name of the city is required";
              }else if(strlen($country_id) == 0){
                $msgb = "The city's country is required";
              }else{
                if(strlen($other) == 0){
                  $other = " ";
                }
                try{
                  $sql = "INSERT INTO city (name, country_id, other) 
                  VALUES ('".$name."', ".$country_id.",  '".$other."')";         
                  $conn->exec($sql);
                  header("Location: countries.php?c=".$country_id);
                  exit(0);
                }catch(PDOException $e)
                {
                  $msgb = $e->getMessage();
                }
              }                 
            }

            if(isset($_GET['delete'])){
              $sql = "DELETE FROM city WHERE id = " . $_GET['delete'];
              
              $cnt = $conn->exec($sql);
              header("Location: countries.php?c=".$_GET['c']);
              exit(0);
            }

            $sql = "SELECT * FROM country WHERE id = " . $_GET['c'];
            $res =  $conn->query($sql);
            foreach ($res as $row ) {                
              foreach ($row as $key => $value) {
                if(is_numeric($key) == false){
                  $country[$key] = is_numeric($value) ? intval($value) : $value;
                }
              }
              //add cities of this country
              $cities = getCitiesOfCountryId($country["id"]);
              $country["cities"] = $cities;
              break;
            }
        ?>
            <h3>
              <a href="countries.php"><i class="fa fa-angle-right"></i> Countries </a>
              &nbsp;<i class="fa fa-angle-right"></i> Country details
            </h3>

            <div class="row mt">

              <div class="col-lg-6">

                <div class="col-lg-12 noSidePadding">
                  <div class="content-panel pn">
                    <div id="spotify" style="background: url(<?php echo $country["flag"];?>) no-repeat center top; background-size: 100% 100%;">
                      <div class="col-xs-4 col-xs-offset-8">
                        <!-- <a href="" class="btn btn-sm btn-clear-g">FOLLOW</a> -->
                      </div>
                      <div class="sp-title" style="width:85%; background-color:rgba(0,0,0,0.3);">
                        <h3 >&nbsp;&nbsp;&nbsp;<?php echo $country["name"];?></h3>
                      </div>
                      <div class="play">
                        <!-- <i class="fa fa-play-circle"></i> -->
                      </div>
                    </div>
                    <p class="followers"><i class="fa fa-map-marker"></i> <?php echo count($country["cities"]);?> CITIES</p>
                  </div>
                  <br/>
                </div>

                <div class="col-lg-12 noSidePadding">
                  <div class="form-panel padding yammzitPanel">
                    <h4 class="mb noMarginBottom">
                      <i class="fa fa-angle-right"></i> Add a city 
                      <a data-toggle="collapse" data-parent="#countriesPanel" href="#collapseTwo" aria-expanded="true" class=""><i class="fa fa-crosshairs pull-right"></i></a>
                    </h4>
                    <div id="collapseTwo" class="panel-collapse collapse in" aria-expanded="true">
                      <form action="countries.php?c=<?php echo $country["id"]; ?>" class="form-horizontal style-form padding" method="POST" >
                          <input type="hidden"  class="form-control input-sm" name="country_id" value="<?php echo $country["id"]; ?>" />
                          <div class="errorDiv"><?php echo $msga; ?></div>
                          <div class="form-group padding10 noMarginBottom">
                              <label class=" padding">Name</label>
                              <input type="text" class="form-control input-sm" name="name" required />
                          </div>
                          <div class="form-group padding10 noMarginBottom">
                              <label class=" padding">Country</label>
                              <input type="text" disabled  class="form-control input-sm"  value="<?php echo $country["name"]; ?>" />
                          </div>
                          <div class="form-group padding10 noMarginBottom">
                              <label class=" padding">Other <small>*optional</small></label>
                              <input type="text" class="form-control input-sm" name="other"  />
                          </div>
                          <button type="submit" name="addcity" class="btn btn-block yammzit whiteColor">Submit</button>
                      </form>
                    </div>
                  </div>
                  <br/><br/><br/><br/><br/>
                </div>

              </div>

              <div class="col-lg-6">
                <div class="col-lg-12 col-md-12 col-sm-12 mb noSidePadding" >
                  <div class="form-panel padding yammzitPanel">
                    <h4 class="mb noMarginBottom">
                      <i class="fa fa-angle-right"></i> Cities of this country
                    </h4>
                    <div class="dataTable_wrapper">
                          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Other</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  foreach ($country["cities"] as $theCity) {
                              ?>
                                    <tr>
                                      <td><?php echo $theCity["name"];  ?> </td>
                                      <td><?php echo $theCity["other"];  ?></td>
                                      <td><a href="countries.php?c=<?php echo $country["id"]; ?>&delete=<?php echo $theCity["id"]; ?>"><i class="fa fa-times"></i> Delete</a></td>
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
              <br/><br/><br/><br/>
            </div>

        <?php
          }else{
        ?>
        <!-- Wilson  <h3><i class="fa fa-angle-right"></i> Countries and cities</h3> -->
          <?php
              $msga = "";
              if(isset($_POST['addcountry'])){
                 $res = AdminImageUpload("addcountry","flag");
                 if(is_array($res) && count($res) > 0){
                    foreach ($res as $value) {
                      $msga = $msga . "<br/> " . $value;
                    }
                 }else{
                    $name = trim($_POST['name']);
                    $code = trim($_POST['code']);
                    $other = trim($_POST['other']);
                    $flag = $res;
                    if(strlen($name) == 0){
                      $msga = "The name of the country is required";
                    }else{
                      if(strlen($other) == 0){
                        $other = " ";
                      }
                      if(strlen($code) == 0){
                        $code = " ";
                      }
                      try{
                        $sql = "INSERT INTO country (name, code, other, flag) 
                        VALUES ('".$name."', '".$code."',  '".$other."', '".$flag."')";         
                        $conn->exec($sql);
                      }catch(PDOException $e)
                      {
                        $msga = $e->getMessage();
                      }
                    }
                 }   
              }
              $msgb = "";
              if(isset($_POST['addcity'])){
                $name = trim($_POST['name']);
                $country_id = trim($_POST['country_id']);
                $other = trim($_POST['other']);
                if(strlen($name) == 0){
                  $msgb = "The name of the city is required";
                }else if(strlen($country_id) == 0){
                  $msgb = "The city's country is required";
                }else{
                  if(strlen($other) == 0){
                    $other = " ";
                  }
                  try{
                    $sql = "INSERT INTO city (name, country_id, other) 
                    VALUES ('".$name."', ".$country_id.",  '".$other."')";         
                    $conn->exec($sql);
                    header("Location: countries.php?c=".$country_id);
                    exit(0);
                  }catch(PDOException $e)
                  {
                    $msgb = $e->getMessage();
                  }
                }                 
              }
          ?>
          <div class="row mt">
			<!--
            <div class="col-lg-6" id="countriesPanel">

              <div class="col-lg-12 col-md-12 col-sm-12 mb noSidePadding" >
                <div class="form-panel padding yammzitPanel">
                  <h4 class="mb noMarginBottom">
                    <i class="fa fa-angle-right"></i> Add a country 
                    <a data-toggle="collapse" data-parent="#countriesPanel" href="#collapseOne" aria-expanded="false" class=""><i class="fa fa-crosshairs pull-right"></i></a>
                  </h4>
                  <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false">
                    <form action="countries.php" class="form-horizontal style-form padding" method="POST" enctype="multipart/form-data" >
                        <div class="errorDiv"><?php // [Wilson] echo $msga; ?></div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Name</label>
                            <input type="text" class="form-control input-sm" name="name" required />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Postal Code <small>*optional</small></label>
                            <input type="text" class="form-control input-sm" name="code"  />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Other <small>*optional</small></label>
                            <input type="text" class="form-control input-sm" name="other"  />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Image of flag</label>
                            <input type="file" class="form-control input-sm" name="flag" required />
                        </div>
                        <button type="submit" name="addcountry" class="btn btn-block yammzit whiteColor">Submit</button>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 col-md-12 col-sm-12 mb noSidePadding" >
                <div class="form-panel padding yammzitPanel">
                  <h4 class="mb noMarginBottom">
                    <i class="fa fa-angle-right"></i> Add a city 
                    <a data-toggle="collapse" data-parent="#countriesPanel" href="#collapseTwo" aria-expanded="false" class=""><i class="fa fa-crosshairs pull-right"></i></a>
                  </h4>
                  <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
                    <form class="form-horizontal style-form padding" method="POST" >
                        <div class="errorDiv"><?php // [Wilson] echo $msga; ?></div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Name</label>
                            <input type="text" class="form-control input-sm" name="name" required />
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Country</label>
                            <select class="form-control input-sm" name="country_id" required >
                                <?php
								/*
								[Wilson]

                                  $sql = "SELECT * FROM country ";
                                  $res = $conn->query($sql);
                                  foreach ($res as $row) {
                            ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                                  }
								  */
                                ?>
                            </select>
                        </div>
                        <div class="form-group padding10 noMarginBottom">
                            <label class=" padding">Other <small>*optional</small></label>
                            <input type="text" class="form-control input-sm" name="other"  />
                        </div>
                        <button type="submit" name="addcity" class="btn btn-block yammzit whiteColor">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
			-->
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="col-lg-12 col-md-12 col-sm-12 mb noSidePadding" >
                <div class="form-panel padding yammzitPanel">
                 
				  <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 " style="margin-bottom:20px;" >
						 <div class="pull-left yammz_red">
						   View all Countries and Cities
						 </div>
						 <span class="pull-right">
						    <form action="add_new_country_city.php" method="POST">
								<button class="btn" name="add_city_country" style="border:none;background-color:#BE2633;color:#ffffff;font-size:12px;">
								 <!-- [Wilson] <i class="icon icon-add182" ></i> --><span style="font-size:16px;"> +</span> &nbsp;Country/City
								</button>
						    </form>
						 </span>
					</div>
				  </div>
                  <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
									<th>No.</th>
                                    <th>Flag</th>
                                    <th>Country</th>
									<th>No of City</th>
                                    <th>Edit info</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sql = "SELECT * FROM country";
                                $res = $dbase->query($sql);
								$number=0;
                                foreach ($res as $value) {
								
								$sql2 = "SELECT count(*) FROM city WHERE country_id = '".$value["id"]."'"; 
								$result = $dbase->prepare($sql2); 
								$result->execute(); 
								$number_of_rows = $result->fetchColumn(); 
								$number +=1;
                            ?>
                                  <tr>
									<td><?php echo $number; ?></td>
                                    <td><img src="<?php echo $photoBase.$value["flag"];  ?>" class="tableFlag" /></td>
                                    <td><?php echo $value["name"]; ?></td>
									<td><?php echo $number_of_rows;  ?> </td>
                                    <td><a style="color:#000;" href="edit_country_cities.php?country=<?php echo $value["id"];  ?>"> <!--<i class="fa fa-eye"></i> -->View</a></td>
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
          </div>
        <?php 
          }
        ?>
    	</section>
    </section>

    <?php
      include("footing.php");
    ?>

</section>

<?php 
  include("footer.php");
?>