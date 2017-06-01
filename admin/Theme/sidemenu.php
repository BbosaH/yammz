 <!--
     **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered">
                    <a href="profile.php">
                      <img src="<?php echo $admin["avatar"]; ?>" class="img-circle" width="60">
                    </a>
                  </p>
              	  <h5 class="centered"><?php echo $admin["username"]; ?></h5>
              	  	
                  <li class="mt">
                      <a class="<?php active('index.php'); ?>" href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="<?php active('profile.php'); ?>" href="profile.php">
                          <i class="fa fa-user"></i>
                          <span>Profile</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="<?php active(array('admins.php','clients.php','businesses.php')); ?>" href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Accounts</span>
                      </a>
                      <ul class="sub">
                        <?php 
                          if(strcmp($admin["username"],"admin") == 0){
                        ?>
                          <li class="<?php active('admins.php'); ?>" ><a  href="admins.php"><i class="fa fa-users"></i> Admins</a></li>
                        <?php
                          }
                        ?>
                        <li class="<?php active('clients.php'); ?>" ><a  href="clients.php"><i class="fa fa-users"></i> Clients</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a class="<?php active(array('countries.php','categories.php')); ?>" href="javascript:;" >
                          <i class="fa fa-gears"></i>
                          <span>Setup</span>
                      </a>
                      <ul class="sub">
                          <li class="<?php active('countries.php'); ?>" ><a  href="countries.php"><i class="fa fa-globe"></i> Countries &amp; Cities</a></li>
                          <li class="<?php active('categories.php'); ?>" ><a  href="categories.php"><i class="fa fa-sitemap"></i> Categories</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a class="<?php active(array('searchadds.php','addrequests.php','sliders.php')); ?>" href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Adverts</span>
                      </a>
                      <ul class="sub">
                          <li class="<?php active('searchadds.php'); ?>" ><a  href="searchadds.php"><i class="fa fa-search"></i> Search result adds</a></li>
                          <li class="<?php active('addrequests.php'); ?>" ><a  href="addrequests.php"><i class="fa fa-search"></i> Advert Requests</a></li>
                          <li class="<?php active('sliders.php'); ?>" ><a  href="sliders.php"><i class="icon icon-tv41"></i> Slide adds</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a class="<?php active(array('add_business.php','view_business.php')); ?>" href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Businesses</span>
                      </a>
                      <ul class="sub">
                          <li class="<?php active('add_business.php'); ?>" ><a  href="add_business.php"><i class="fa fa-search"></i>  Add Businesses</a></li>

                          <li class="<?php active('view_business.php'); ?>" ><a  href="view_business.php"><i class="fa fa-search"></i> View Businesses</a></li>
                          <!--<li class="<?php active('sliders.php'); ?>" ><a  href="sliders.php"><i class="icon icon-tv41"></i> Slide adds</a></li>-->
                      </ul>
                  </li>

                  <!-- <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>UI Elements</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html">General</a></li>
                          <li><a  href="buttons.html">Buttons</a></li>
                          <li><a  href="panels.html">Panels</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Components</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Calendar</a></li>
                          <li><a  href="gallery.html">Gallery</a></li>
                          <li><a  href="todo_list.html">Todo List</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Forms</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>
 -->
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end