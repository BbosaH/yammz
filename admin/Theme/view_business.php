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
 
      <!-- -->
      <section id="main-content">
      	<section class="wrapper">
      	

      	<?php
            		require_once('classes/businessmodel.php');
            		require_once('classes/connector.php');
            		require_once('classes/util.php');
            		$model = new business();
            		$connn = new connector();
            		$countries=$connn->getAll("SELECT * FROM country");
            		$cities= $connn->getAll("SELECT * FROM city"); //to be filtered
                        $categories=$connn->getAll("SELECT * FROM category");
                        $subcategories=$connn->getAll("SELECT * FROM sub_category");//to be filtered

                        //below is true code
            		/*foreach($countries as $country)
            		{
            			global $cities;
            			$cities=$connn->getAll("SELECT * FROM city Where country_id =".$country['id']);
      					//echo '<pre>',print_r($cities),'</pre>';
            		}*/
                        //just to fill

            		

            		
            if(isset($_GET['bus_id']))
             {
              $business_id =$_GET['bus_id'];
          
              $thisBusiness = $connn->getBusinessOfId(intval($_GET['bus_id']), false);
              $categoriesSubcategories=fill_business_category_edits($business_id);
              if(isset($_POST['edit_business']))
                {

                   echo 'i posted 1';
                                          $image_string=AdminImageUploader('add_business','image');
                                          var_dump($image_string);
                                          if(is_array($image_string))
                                          {
                                                for($i=0;$i<count($image_string);$i++)
                                                {
                                                  /*echo "Error at index".$i." :".$image_string[$i];    */
                                                }
                                                $image_string ='';
                                                

                                          }else{

                                          }

                                          $model->setName($_POST['name']);
                                          $model->setAddress($_POST['address']);
                                          $model->setDateAdded(Time());
                                          $model->setPhone1($_POST['phone1']);
                                          $model->setPhone2($_POST['phone2']);
                                          $model->setEmail($_POST['email']);
                                          $model->setWebsite($_POST['website']);
                                          $model->setBanner($image_string);
                                          $model->setDescription($_POST['desc']);
                                          $model->setWhoAddedId(25); // user who added
                                          echo 'i updated 2';


                                          $countryid = $_POST['country'];
                                          $cityid =$_POST['city'];
                                          $category1id =$_POST['category1'];
                                          $category2id =$_POST['category2'];
                                          $category3id =$_POST['category3'];
                                          $subcategory1id =$_POST['subcategory1'];
                                          $subcategory2id =$_POST['subcategory2'];
                                          $subcategory3id =$_POST['subcategory3'];

                                          $model->setcountryId($countryid);
                                          $model->setCityId($cityid);
                                          $model->setCategory1Id($category1id);
                                          $model->setCategory2Id($category2id);
                                          $model->setCategory3Id($category3id);
                                          $model->setSubCategory1Id($subcategory1id);
                                          $model->setSubCategory2Id($subcategory2id);
                                          $model->setSubCategory3Id($subcategory3id);
                                          /*echo 'i updated 3 the modal is here <br/> ';
                                          var_dump($model);
                                          echo '<br/> -------- ---- <br/> ';*/
                                          $conn->updateBusiness($model,$business_id);

                                          $thisBusiness = $connn->getBusinessOfId(intval($_GET['bus_id']), false);
              $categoriesSubcategories=fill_business_category_edits($business_id);

                                          
                }

        ?>      
                  <div class="panel panel-default">
                    <form role="form" action="" method="post" style="padding-left:30px; padding-right:100px;" enctype="multipart/form-data" > 
                      <h4> <label for="name" class="help-block" style="color:#BD2532;"><B>Edit business</B></label> </h4>
                      
                      <?php
                      if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
                        ?>
                        ﻿<div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">×</button>
                        <strong>Message!</strong>
                        
                        <?php
                        echo '<span class="err">';
                        foreach($_SESSION['ERRMSG_ARR'] as $msg) {
                          echo "$msg" ;
                        }
                        echo '</span>';
                        unset($_SESSION['ERRMSG_ARR']);
                        ?>
                      </div>
                      <?php
                    }
                    ?>

                    <div class="form-group" > 
                      <h6> 
                        
                        <img  src ="<?php echo $thisBusiness['banner']; ?>" class="form-control"style="width:200px;height:200px;" id="logo" name="logo" placeholder=""/>  
                        
                        <span>
                          <h6><label for="inputfile" class="help-block">Select business profile photo</label> 
                            <input type="file" name="image" id="inputfile" onchange="readURL(this);"> </h6></span>
                          </h6> 

                        </div>
                        
                        <div class="form-group"> 
                          <h6> <label for="name" class="help-block">Name<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
                          <!--<input type="text" class="form-control"style="width:900px; border-color:#868686; border-radius:0;" id="name" name="name" placeholder="">--> 
                          <input type="text" required class="form-control input-sm " name="name" value="<?php echo $thisBusiness['name']; ?>" style="width: 700px;" />         
                        </div>
                        <?php


                        ?>
                        
                        
                        <div class="form-group"> 
                          <h6> <label for="name" class="help-block">Country<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
                          <select class="form-control input-sm" id="country" name="country" style=" border-radius:5px; width:400px; " onchange="makecities()">
                            <?php
                            fill_country_drop_down($countries);
                            //$cities= return_citie($connn);
                            ?>
                          </select>
                        </div>
                        <div class="form-group"> 
                          <h6> <label for="name" class="help-block">City<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
                          <select class="form-control input-sm" id="city" name="city" style=" border-radius:5px; width:400px; ">
                            <?php
                            fill_city_drop_down($cities);
                            ?>
                            
                          </select>
                        </div>
                        
                        <B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>

                        <div class="form-group  noMarginBottom">
                          <h6> <label for="name" class="help-block">contact phone<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
                          <input type="text"  class="form-control input-sm " name="phone1" value="<?php echo $thisBusiness['phone_1']; ?>" style="width: 700px;" />
                        </div>
                        <div class="form-group  noMarginBottom">
                          <h6> <label for="name" class="help-block">Business phone<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
                          <input type="text"  class="form-control input-sm " name="phone2" value="<?php echo $thisBusiness['phone_2']; ?>" style="width: 700px;"/>
                        </div>
                        <div class="form-group  noMarginBottom">
                          <h6> <label for="name" class="help-block">Email<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
                          <input type="text"  class="form-control input-sm " name="email" value="<?php echo $thisBusiness['email']; ?>" style="width: 700px;"/>
                        </div>
                        <div class="form-group  noMarginBottom">
                          <h6> <label for="name" class="help-block">Website<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
                          <input type="text"  class="form-control input-sm " name="website" value="<?php echo $thisBusiness['website']; ?>" style="width: 700px;" />
                        </div>
                        <!--<div class="form-group  noMarginBottom">
                          <h6> <label for="name" class="help-block">Banner<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
                          <input type="file" class="form-control input-sm " name="banner_image" required style="width: 700px;"/>
                        </div>-->

                        <B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>
                        
                        
                        
                        
                        <div class="form-group"> 
                          <h6> <label for="name" class="help-block">Address<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span></label> </h6>
                          <textarea class="form-control" rows="3" id="address" name="address" style="background-color:#E9EAEE;resize:none; border-color:#868686; width:700px; height:100px;" placeholder="Write a review......" >
                          <?php
                          echo $thisBusiness['address'];
                          ?>
                          </textarea>  
                        </div>

                        <div class="form-group"> 
                          <h6> <label for="name" class="help-block">Business Description<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
                          <textarea class="form-control" rows="3" id="desc" name="desc" style="background-color:#E9EAEE;resize:none; border-color:#868686; width:700px; height:100px;" placeholder="Write a review......">
                          <?php
                          echo $thisBusiness['description'];
                          ?>
                          </textarea>  
                        </div>
                        
                        
                        <br/>
                        <B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>
                        <br/>
                        <div class="form-group"> 
                          <h6> 
                            <span style="font-size:16; font-weight:bold;">
                              Select Category
                            </span>
                            <span style="font-size:12; font-weight:small;" class="simplegrey">
                              3 Maximum
                            </span>
                            <span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;">*</span>
                          </h6>
                          <table>
                            <tr style="font-size:12; font-weight:medium;" class="simplegrey">
                              <td>Category</td>
                              <td>Subcategory</td>
                            </tr>
                            <tr>
                              <td width="300px">
                                <select class="form-control input-sm" id="category1" name="category1" style=" border-radius:5px; width:250px; " onchange="makeSubcategories('category1','subcategory1')">
                                 <?php
                                  
                                  //$categoriesSubcategories[0].['category_name'];
                                  if(empty($categoriesSubcategories)){
                                    echo "<option value=''> No Category  </option>";
                                    fill_category_drop_down($categories);
                                  }else{
                                    echo "<option value=''>";echo $categoriesSubcategories[0]['category_name']; echo "</option>";
                                    fill_category_drop_down($categories);

                                  }
                                  ?>
                                                                                
                                  
                                </select>
                              </td>
                              <td>
                                <select class="form-control input-sm" id="subcategory1" name="subcategory1" style=" border-radius:5px; width:250px; ">
                                  <?php
                                  if(empty($categoriesSubcategories)){
                                    echo "<option value=''> No SubCategory  </option>";
                                    fill_subcategory_drop_down($subcategories);
                                  }else{
                                    echo "<option value=''>";echo $categoriesSubcategories[0]['subcategory_name']; echo "</option>";
                                                                              fill_subcategory_drop_down($subcategories);
                                                                                           
                                  }
                                   ?>
                                  
                                </select>
                              </td>
                            </tr>
                            
                          </table>
                          <div id="addcategory" class="collapse out">
                            <table>
                              <tr style="font-size:12; font-weight:medium;" class="simplegrey">
                                <td>Category</td>
                                <td>Subcategory</td>
                              </tr>
                              <tr>
                                <td width="300px">
                                  <select class="form-control input-sm" id="category2" name="category2" style=" border-radius:5px; width:250px; "
                                                                              onchange="makeSubcategories('category2','subcategory2')">
                                  <?php
                                  
                                  //$categoriesSubcategories[0].['category_name'];
                                        if(empty($categoriesSubcategories)){
                                          echo "<option value=''> No Category  </option>";
                                          fill_category_drop_down($categories);
                                        }else{
                                          if(empty($categoriesSubcategories[1]))
                                          {
                                            echo "<option value=''> No Category  </option>";
                                            fill_category_drop_down($categories);
                                          }else{
                                          echo "<option value=''>";echo $categoriesSubcategories[1]['category_name']; echo "</option>";
                                          fill_category_drop_down($categories);
                                          }

                                        }
                                  ?>           
                                  </select>
                                </td>
                                <td>
                                  <select class="form-control input-sm" id="subcategory2" name="subcategory2" style=" border-radius:5px; width:250px; ">
                                    <?php
                                    if(empty($categoriesSubcategories)){
                                      echo "<option value=''> No SubCategory  </option>";
                                      fill_subcategory_drop_down($subcategories);
                                    }else{
                                     if(empty($categoriesSubcategories[1]))
                                        {
                                          echo "<option value=''> No SubCategory  </option>";
                                          fill_subcategory_drop_down($subcategories);

                                        }else{
                                        echo "<option value=''>";echo $categoriesSubcategories[1]['subcategory_name']; echo "</option>";
                                                                                  fill_subcategory_drop_down($subcategories);
                                              }
                                                                                             
                                    }
                                   ?>          
                                  </select>
                                </td>
                              </tr>
                              
                            </table>
                            <table>
                              <tr style="font-size:12; font-weight:medium;" class="simplegrey">
                                <td>Category</td>
                                <td>Subcategory</td>
                              </tr>
                              <tr>
                                <td width="300px">
                                  <select class="form-control input-sm" id="category3" name="category3" style=" border-radius:5px; width:250px; "
                                                                              onchange="makeSubcategories('category3','subcategory3')">
                                         <?php
                                         if(empty($categoriesSubcategories)){
                                          echo "<option value=''> No Category  </option>";
                                          fill_category_drop_down($categories);
                                        }else{
                                          if(empty($categoriesSubcategories[2]))
                                          {
                                            echo "<option value=''> No Category  </option>";
                                            fill_category_drop_down($categories);
                                          }else{
                                          echo "<option value=''>";echo $categoriesSubcategories[2]['category_name']; echo "</option>";
                                          fill_category_drop_down($categories);
                                          }

                                        }
                                                                              
                                            
                                            ?>              
                                  </select>
                                </td>
                                <td>
                                  <select class="form-control input-sm" id="subcategory3" name="subcategory3" style=" border-radius:5px; width:250px; ">
                                    <?php
                                      if(empty($categoriesSubcategories)){
                                        echo "<option value=''> No SubCategory  </option>";
                                        fill_subcategory_drop_down($subcategories);
                                      }else{
                                        if(empty($categoriesSubcategories[2]))
                                        {
                                          echo "<option value=''> No SubCategory  </option>";
                                          fill_subcategory_drop_down($subcategories);

                                        }else{
                                        echo "<option value=''>";echo $categoriesSubcategories[2]['subcategory_name']; echo "</option>";
                                                                                  fill_subcategory_drop_down($subcategories);
                                              }
                                                                                               
                                      }
                                   ?>                  
                                  </select>
                                </td>
                              </tr>
                              
                            </table>
                          </div>
                          
                          <br/>
                          <a class=" btn redbright" data-toggle="collapse"style="height:30px;border-radius:4; background-color:#BD2532;color:white;" data-target="#addcategory">Add category</a>
                          <br/> <br/>
                          <B><hr style="height:7px; background-color:#E9EAEE;"></hr></B>
                          
                          
                          <br/>
                          
                   <!--<h6> 
                    <span style="font-size:16; font-weight:bold;">
                       Working hours  
                     </span>
                    </h6>-->
                    
                   
                    
                    
                    
                    
                    
                    <br/><br/><br/><br/>
                    <table>             
                      <tr>
                        <td>
                          <button  type="submit" name="edit_business" class="btn btn-default" style="height:50px;font-size: 25px; width:300px; background-color:#BD2532; font-weight:bold;border-radius:10px;margin-left:250px;color:#EED1D5;">Add Changes</button>
                        </td>
                        <td><B>&nbsp;&nbsp;&nbsp;&nbsp;Cancel</B></td>
                        
                      </tr>
                      
                    </table>
                    
                    
                  </div>
                  
                </form>

              </div>    
              <?php
              	
               ?>           
            <?php 

              }
              else
              {
              	//echo 'maama yangu';
            ?> 	
              <div class="col-lg-12 noSidePadding">
    				<div class="form-panel padding yammzitPanel">
			            <h4 class="mb noMarginBottom">
			              <i class="fa fa-angle-right"></i>Added  businesses
			            </h4>
        				<div class="panel-body" style="font-size:13px; color:black;">

              				<div class="dataTable_wrapper" style="text-align: center ">
              					<table class="table table-striped table-bordered table-hover" id="dataTables-examplex" style="cursor:pointer">
	                      			<thead >
				                          <tr>
				                              <th>Name</th>
				                              <th>Address</th>
				                              <th>Country</th>
				                              <th>City</th>
				                              <th></th>
				                          </tr>
				                    </thead>
				                    <tbody>
				                    	<?php
					                          $sql = "SELECT * FROM business";
					                          $res = $connn->getAll($sql);
					                          
					                          foreach ($res as $value) {
					                            
					                            $thisBusiness =$connn->getBusinessOfId(intval($value["id"]), false);
                                      $thiscountry = $connn->getCountryOfId($thisBusiness['country_id']);
                                      $thiscity =$connn->getCityOfId($thisBusiness['city_id'])
					                          
					                    ?>
					                    		 <tr >

					                              <td style="text-align: left;"><?php echo $thisBusiness["name"]; ?></td>
					                              <td style="text-align: left;"><?php echo $thisBusiness["address"];  ?></td>
					                              <td style="text-align: left;"><?php echo $thiscountry["name"];  ?></td>
					                              <td style="text-align: left;"><?php echo $thiscity["name"];  ?></td>
					                              <td><a  href='view_business.php?bus_id=<?php echo $thisBusiness["id"];?>' class="btn" style="height:30px;border-radius:4; background-color:#BD2532;color:white;"   >edit business</a>
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
 
       		 <?php
              }
              ?>


      	</section>

      	<?php
      	include("footing.php");
    	  ?>

      </section>

</section>
<?php 
  include("footer.php");
?>