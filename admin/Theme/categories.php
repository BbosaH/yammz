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
              if(isset($_POST['addsubcategory'])){
                $name = trim($_POST['name']);
                $category_id = trim($_POST['category_id']);
                $icon = trim($_POST['icon']);
                $description = trim($_POST['description']);
                if(strlen($name) == 0){
                  $msgb = "The name of the sub category is required";
                }else if(strlen($category_id) == 0){
                  $msgb = "The category is required";
                }else{
                  if(strlen($icon) == 0){
                    $icon = " ";
                  }
                  if(strlen($description) == 0){
                    $description = " ";
                  }
                  try{
                    $sql = "INSERT INTO sub_category (name, category_id, icon, description) 
                    VALUES ('".$name."', ".$category_id.",  '".$icon."',  '".$description."')";         
                    $conn->exec($sql);
                    header("Location: categories.php?c=".$category_id);
                    exit(0);
                  }catch(PDOException $e)
                  {
                    $msgb = $e->getMessage();
                  }
                }                        
              }

              $sql = "SELECT * FROM category WHERE id = " . $_GET['c'];
              $res =  $conn->query($sql);
              foreach ($res as $row ) {                
                foreach ($row as $key => $value) {
                  if(is_numeric($key) == false){
                    $category[$key] = is_numeric($value) ? intval($value) : $value;
                  }
                }
                //add sub categories of this category
                $subcategories = getSubCategoriesOfCategoryId($category["id"]);
                $category["sub_categories"] = $subcategories;
                break;
              }
          ?>
              <h3>
                <a href="categories.php"><i class="fa fa-angle-right"></i> Categories </a>
                &nbsp;<i class="fa fa-angle-right"></i> Category details

              </h3>

              <div class="row mt">

                <div class="col-lg-6">
                  <div class="col-lg-12 noSidePadding">
                    <div class="form-panel padding yammzitPanel">
                      <h4 class="mb noMarginBottom">
                        <i class="fa <?php echo $category['icon']; ?>"></i> <?php echo $category['name']; ?>
                      </h4>
                      <div>
                        <?php echo $category['description']; ?>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12 noSidePadding">
                    <div class="form-panel padding yammzitPanel">
                      <h4 class="mb noMarginBottom">
                        <i class="fa fa-angle-right"></i> Add a sub category
                        <a data-toggle="collapse" data-parent="#countriesPanel" href="#collapseThree" aria-expanded="false" class=""><i class="fa fa-crosshairs pull-right"></i></a>
                      </h4>
                      <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                        <form action="categories.php?c=<?php echo $category["id"]; ?>" class="form-horizontal style-form padding" method="POST" >
                            <div class="errorDiv"><?php echo $msgb; ?></div>
                            <input type="hidden" name="category_id" value="<?php echo $category["id"]; ?>" required />
                            <div class="form-group padding10 noMarginBottom">
                                <label class=" padding">Name</label>
                                <input type="text" class="form-control input-sm" name="name" required />
                            </div>
                            <div class="form-group padding10 noMarginBottom">
                                <label class=" padding">Category</label>
                                <input type="text" disabled class="form-control input-sm" value="<?php echo $category["name"]; ?>"  />
                            </div>
                            <div class="form-group padding10 noMarginBottom">
                                <label class=" padding">Icon</label>
                                <input type="text" class="form-control input-sm iconsDivInput" name="icon" required />
                            </div>
                            <div class="form-group padding10 noMarginBottom">
                                <label class=" padding">Description <small>*optional</small></label>
                                <textarea class="form-control input-sm" name="description"></textarea>
                            </div>
                            <button type="submit" name="addsubcategory" class="btn btn-block yammzit whiteColor">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <br/>
                  <div class="col-lg-12 noSidePadding">
                    <div class="form-panel padding yammzitPanel">
                      <h4 class="mb noMarginBottom">
                        <i class="fa fa-angle-right"></i>Get icon names from here
                      </h4>
                      <div class="panel-body" style="font-size:13px; color:black;">
                      <?php //include("ionicons.php"); ?>
                        <iframe src="yammzfonts/icons-reference.html" style="width:100%; height:300px;"></iframe>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="col-lg-12 col-md-12 col-sm-12 mb noSidePadding" >
                    <div class="form-panel padding yammzitPanel">
                      <h4 class="mb noMarginBottom">
                        <i class="fa fa-angle-right"></i> Sub categories
                      </h4>
                      <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($category["sub_categories"] as $theSubCategory) {
                                ?>
                                      <tr>
                                        <td><i class="icon icon-<?php echo $theSubCategory["icon"];  ?>"></i> <?php echo $theSubCategory["name"];  ?></td>
                                        <td><?php echo $theSubCategory["description"];  ?></td>
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
            }else{
          ?>

          	<h3>
              <i class="fa fa-angle-right"></i> Categories 
            </h3>
            <?php
                $msga = "";
                if(isset($_POST['addcategory'])){
                  $name = trim($_POST['name']);
                  $icon = trim($_POST['icon']);
                  $description = trim($_POST['description']);
                  if(strlen($name) == 0){
                    $msga = "The name of the category is required";
                  }else{
                    if(strlen($icon) == 0){
                      $icon = " ";
                    }
                    if(strlen($description) == 0){
                      $description = " ";
                    }
                    try{
                      $sql = "INSERT INTO category (name, icon, description) 
                      VALUES ('".$name."', '".$icon."',  '".$description."')";         
                      $conn->exec($sql);
                    }catch(PDOException $e)
                    {
                      $msga = $e->getMessage();
                    }
                  }   
                }
                $msgb = "";
                if(isset($_POST['addsubcategory'])){
                  $name = trim($_POST['name']);
                  $category_id = trim($_POST['category_id']);
                  $icon = trim($_POST['icon']);
                  $description = trim($_POST['description']);
                  if(strlen($name) == 0){
                    $msgb = "The name of the sub category is required";
                  }else if(strlen($category_id) == 0){
                    $msgb = "The category is required";
                  }else{
                    if(strlen($icon) == 0){
                      $icon = " ";
                    }
                    if(strlen($description) == 0){
                      $description = " ";
                    }
                    try{
                      $sql = "INSERT INTO sub_category (name, category_id, icon, description) 
                      VALUES ('".$name."', ".$category_id.",  '".$icon."',  '".$description."')";         
                      $conn->exec($sql);
                      header("Location: categories.php?c=".$category_id);
                      exit(0);
                    }catch(PDOException $e)
                    {
                      $msgb = $e->getMessage();
                    }
                  }                 
                }
            ?>
            <div class="row mt">
              <div class="col-lg-6">
                <div class="col-lg-6 noSidePadding">
                  <div class="form-panel padding yammzitPanel">
                    <h4 class="mb noMarginBottom">
                      <i class="fa fa-angle-right"></i> Add a category
                      <a data-toggle="collapse" data-parent="#countriesPanel" href="#collapseTwo" aria-expanded="false" class=""><i class="fa fa-crosshairs pull-right"></i></a>
                    </h4>
                    <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">
                      <form action="categories.php" class="form-horizontal style-form padding" method="POST" >
                          <div class="errorDiv"><?php echo $msga; ?></div>
                          <div class="form-group padding10 noMarginBottom">
                              <label class=" padding">Name</label>
                              <input type="text" class="form-control input-sm" name="name" required />
                          </div>
                          <div class="form-group padding10 noMarginBottom">
                              <label class=" padding">Icon</label>
                              <input type="text" class="form-control input-sm iconsDivInput" name="icon" required />
                          </div>
                          <div class="form-group padding10 noMarginBottom">
                              <label class=" padding">Description <small>*optional</small></label>
                              <textarea class="form-control input-sm" name="description"></textarea>
                          </div>
                          <button type="submit" name="addcategory" class="btn btn-block yammzit whiteColor">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 noSidePadding">
                  <div class="form-panel padding yammzitPanel">
                    <h4 class="mb noMarginBottom">
                      <i class="fa fa-angle-right"></i> Add a sub category
                      <a data-toggle="collapse" data-parent="#countriesPanel" href="#collapseThree" aria-expanded="false" class=""><i class="fa fa-crosshairs pull-right"></i></a>
                    </h4>
                    <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                      <form action="categories.php" class="form-horizontal style-form padding" method="POST" >
                          <div class="errorDiv"><?php echo $msgb; ?></div>
                          <div class="form-group padding10 noMarginBottom">
                              <label class=" padding">Name</label>
                              <input type="text" class="form-control input-sm" name="name" required />
                          </div>
                          <div class="form-group padding10 noMarginBottom">
                              <label class=" padding">Category</label>
                              <select class="form-control input-sm" name="category_id" required >
                                  <?php
                                    $sql = "SELECT * FROM category ";
                                    $res = $conn->query($sql);
                                    foreach ($res as $row) {
                              ?>
                                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                              <?php
                                    }
                                  ?>
                              </select>
                          </div>
                          <div class="form-group padding10 noMarginBottom">
                              <label class=" padding">Icon</label>
                              <input type="text" class="form-control input-sm iconsDivInput" name="icon" required />
                          </div>
                          <div class="form-group padding10 noMarginBottom">
                              <label class=" padding">Description <small>*optional</small></label>
                              <textarea class="form-control input-sm" name="description"></textarea>
                          </div>
                          <button type="submit" name="addsubcategory" class="btn btn-block yammzit whiteColor">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
                <br/>
                <div class="col-lg-12 noSidePadding">
                  <div class="form-panel padding yammzitPanel">
                    <h4 class="mb noMarginBottom">
                      <i class="fa fa-angle-right"></i>Get icon names from here
                    </h4>
                    <div class="panel-body" style="font-size:13px; color:black;">
                      <?php //include("ionicons.php"); ?>
                      <iframe src="yammzfonts/icons-reference.html" style="width:100%; height:300px;"></iframe>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="col-lg-12 noSidePadding">
                  <div class="form-panel padding yammzitPanel">
                    <h4 class="mb noMarginBottom">
                      <i class="fa fa-angle-right"></i> Categories list
                    </h4>
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $sql = "SELECT * FROM category";
                                $res = $conn->query($sql);
                                foreach ($res as $value) {
                            ?>
                                  <tr>
                                    <td><i class="icon icon-<?php echo $value["icon"];  ?>"></i> <?php echo $value["name"];  ?></td>
                                    <td></div><?php echo $value["description"];  ?></td>
                                    <td><a href="categories.php?c=<?php echo $value["id"];  ?>"><i class="fa fa-eye"></i> View</a></td>
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