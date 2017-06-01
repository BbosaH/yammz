<?php 
  include("header.php");
 
?>
<style>
	.btn-file {
		position: relative;
		overflow: hidden;
		max-width: 110%;
		height:20px;
		padding-left:2px;
		background-color:#BE2633;
		padding-top:2px;
		font-size:12px;
		color:#ffffff;
	}
	.btn-file input[type=file] {
		position: absolute;
		top: 0;
		right: 0;
		max-width: 50px;
		max-height: 20px;
		font-size: 100px;
		text-align: right;
		filter: alpha(opacity=0);
		opacity: 0;
		outline: none;
		background: white;
		cursor: inherit;
		display: block;
		color:#ffffff;
		
	}

</style>
<section id="container" >
      <?php 
        include("heading.php");
      ?>

      <?php 
        include("sidemenu.php");
      ?>
 
      <!-- -->
      <section id="main-content">
      	<section class="wrapper" style="margin-top:80px;">
      	

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
				      $currentbusiness=$_GET['bus_id'];
				      $current_user=$_SESSION['admin_id'];
              $thisBusiness = $connn->getBusinessOfId(intval($_GET['bus_id']), false);
              $categoriesSubcategories=fill_business_category_edits($business_id);
              
              ?>      
      					<?php
      						if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
      							
      							foreach($_SESSION['ERRMSG_ARR'] as $msg) {
      								echo $msg;
      							}
      						
      							unset($_SESSION['ERRMSG_ARR']);
      						}
      				?>
                  <div class="panel panel-default">
					
                    <form role="form" action="store_edit_business.php" method="post" style="padding-left:30px; padding-right:100px;" enctype="multipart/form-data" > 
                      <h4> <label for="name" class="help-block" style="color:#BD2532;"><B>Edit business</B></label> </h4>
						<input type="hidden" name="bus_id" value="<?php echo $_GET['bus_id']; ?>" />
                        <div class="form-group" > 
							<h6> 
								<input type="hidden" name="business_banner" value="<?php echo $photoBase.$thisBusiness['banner']; ?>" />
								<img  class="" src="<?php echo $photoBase.$thisBusiness['banner']; ?>" style="width:92%;height:200px;background-color:#E9EAEE;" id="logo" name="logo" placeholder=""/> 	
								
						</div>
						<span class="btn btn-small btn-file" style="margin-left:75%;">
							&nbsp;&nbsp;&nbsp;Edit Photo <input type="file" name="image1" value="" id="inputfile" onchange="readURL(this)">
						</span>
						<B><hr style="height:7px; background-color:#E9EAEE;border:0px;"></hr></B>
						
						<label>Logo Photo</label>
						<div class="form-group" > 
						
								<!--<img src="uploads/shop3.jpg" style="width:50px;height:50px;margin-left:30%;margin-top:28%;"> -->
								<input type="hidden" name="business_logo" value="<?php echo $photoBase.$thisBusiness['logo']; ?>" />
								<img  class="" src="<?php  if(strcmp($thisBusiness['logo'], "")==0){ echo $photoBase."uploads/deflogo.png";}else{ echo $photoBase.$thisBusiness['logo'];} ?>" style="width:120px;height:120px;border-radius:50%; background-color:#E9EAEE;" id="logo2" name="logo2" placeholder=""/> 	
								
                
						</div>
						
							<span class="btn btn-small btn-file" style="margin-left:20%;margin-top:-11%;">
								&nbsp;&nbsp;&nbsp;Edit Photo <input type="file" name="image" id="inputfile" value="<?php echo $thisBusiness['logo']; ?>" onchange="readURLLogo(this)">
							</span>
						
						<B><hr style="height:7px; background-color:#E9EAEE;border:0px;"></hr></B>
						
						<h5> <label for="name" class="help-block" style="color:#BD2532;"><B>Add business</B></label> </h5>
						
                        <div class="form-group"> 
                          <h6> <label for="name" class="help-block">Name</label> </h6>
                          <!--<input type="text" class="form-control"style="width:900px; border-color:#868686; border-radius:0;" id="name" name="name" placeholder="">--> 
                          <input type="text" required class="form-control input-sm " name="name" value="<?php echo $thisBusiness['name']; ?>" style="width: 700px;" />         
                        </div>
                        <?php


                        ?>
                        
                        
                        <div class="form-group"> 
                          <h6> <label for="name" class="help-block">Country</label> </h6>
                          <select class="form-control input-sm" id="country" name="country" style=" border-radius:5px; width:400px; " onchange="makecities()">
                            
							<?php 
								$business_country= $connn->getAll("SELECT country_id FROM business WHERE id='".$currentbusiness."'");
								
								$ctry="";
								foreach($business_country as $bcountry){
									$ctry=$bcountry['country_id'];
								}
								
								$real_country= $connn->getAll("SELECT name,id FROM country WHERE id='".$ctry."'");
								
								$rcctry="";
								$rcctry_id="";
								foreach($real_country as $rccountry){
									$rcctry=$rccountry['name'];
									$rcctry_id=$rccountry['id'];
								}
								
								echo"<option value='".$rcctry_id."'>";
								echo $rcctry;
								echo"</option>";
							?>
							
							<?php
                            fill_country_drop_down($countries);
                            //$cities= return_citie($connn);
                            ?>
                          </select>
                        </div>
                        <div class="form-group"> 
                          <h6> <label for="name" class="help-block">City</label> </h6>
                          <select class="form-control input-sm" id="city" name="city" style=" border-radius:5px; width:400px; ">
                            
							<?php 
								$business_city= $connn->getAll("SELECT city_id FROM business WHERE id='".$currentbusiness."'");
								
								$ctyry="";
								foreach($business_city as $bcity){
									$ctyry=$bcity['city_id'];
								}
								
								$real_city= $connn->getAll("SELECT name,id FROM  city WHERE id='".$ctyry."'");
								
								$rccty="";
								$rccty_id="";
								foreach($real_city as $rccity){
									$rccty=$rccity['name'];
									$rccty_id=$rccity['id'];
								}
								echo"<option value='".$rccty_id."'>";
								echo $rccty;
								echo"</option>";
							?>
							
							<?php
                            fill_city_drop_down($cities);
                            ?>
                            
                          </select>
                        </div>
                        
                        <B><hr style="height:7px; background-color:#E9EAEE;border:0px;"></hr></B>

                        <div class="form-group  noMarginBottom">
                          <h6> <label for="name" class="help-block">contact phone<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
                          <?php 
								$business_country2= $connn->getAll("SELECT phone_1 FROM business WHERE id='".$currentbusiness."'");
								
								$ctry2="";
								foreach($business_country2 as $bcountry2){
									$ctry2=$bcountry2['phone_1'];
								}
								
								//echo $ctry;
							?>
						  <input type="text"  class="form-control input-sm " name="phone1" value="<?php echo $ctry2; ?>" style="width: 700px;" />
                        </div>
                        <div class="form-group  noMarginBottom">
                          <h6> <label for="name" class="help-block">Business phone<span style="color:red;padding-left:10px;font-size:18px;font-weight:bold;"></span></label> </h6>
                          <?php 
								$business_country= $connn->getAll("SELECT phone_2 FROM business WHERE id='".$currentbusiness."'");
								
								$ctry="";
								foreach($business_country as $bcountry){
									$ctry=$bcountry['phone_2'];
								}
								
								//echo $ctry;
							?>
						  <input type="text"  class="form-control input-sm " name="phone2" value="<?php echo $ctry; ?>" style="width: 700px;"/>
							
						  
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

                        <B><hr style="height:7px; background-color:#E9EAEE;border:0px;"></hr></B>
                        
                        
                        
                        
                        <div class="form-group"> 
                          <h6> <label for="name" class="help-block">Address</label> </h6>
                          <textarea class="form-control" rows="3" id="address" name="address" style="background-color:#E9EAEE;resize:none; border-color:#868686; width:700px; height:100px;" value="" placeholder="Write a review......" ><?php echo $thisBusiness['address']; ?></textarea>
                         
                        </div>

                        <div class="form-group"> 
                          <h6> <label for="name" class="help-block">Business Description</label> </h6>
                          <textarea class="form-control" rows="3" id="desc" name="desc" style="background-color:#E9EAEE;resize:none; border-color:#868686; width:700px; height:100px;" placeholder="Write a review......"><?php echo $thisBusiness['description'];?></textarea> 
                          
                        </div>
                        
                        
                        <br/>
                        <B><hr style="height:7px; background-color:#E9EAEE;border:0px;"></hr></B>
                        <br/>
                        <div class="form-group"> 
                          <h6> 
                            <span style="font-size:16; font-weight:bold;">
                              Select Category
                            </span>
                            <span style="font-size:12; font-weight:small;" class="simplegrey">
                              3 Maximum
                            </span>
                           
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
                                    echo "<option value='".$categoriesSubcategories[0]['category_name']."'>";echo $categoriesSubcategories[0]['category_name']; echo "</option>";
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
						
                                    echo "<option value='".$categoriesSubcategories[0]['sub_category_id']."'>";echo $categoriesSubcategories[0]['subcategory_name']; echo "</option>";
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
                                          echo "<option value='".$categoriesSubcategories[1]['category_name']."'>";echo $categoriesSubcategories[1]['category_name']; echo "</option>";
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
										
										
                                        echo "<option value='".$categoriesSubcategories[1]['sub_category_id']."'>";echo $categoriesSubcategories[1]['subcategory_name']; echo "</option>";
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
                                          echo "<option value='".$categoriesSubcategories[2]['category_name']."'>";echo $categoriesSubcategories[2]['category_name']; echo "</option>";
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
										
										
                                        echo "<option value='".$categoriesSubcategories[2]['sub_category_id']."'>";echo $categoriesSubcategories[2]['subcategory_name']; echo "</option>";
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
                          <B><hr style="height:7px; background-color:#E9EAEE;border:0px;"></hr></B>
                          
                          
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
                          <button  type="submit" name="edit_business" value="edit_business" class="btn btn-default" style="height:50px;font-size: 25px; width:300px; background-color:#BD2532; font-weight:bold;border-radius:10px;margin-left:250px;color:#EED1D5;">Add Changes</button>
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
              					<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="cursor:pointer">
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
					                          $sql = "SELECT * FROM business WHERE id !=1";
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
