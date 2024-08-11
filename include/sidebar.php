  <?php
include('../Pages/db.php');
  $role=$_SESSION['role'];
  $sql= "SELECT * FROM `roles` WHERE `role_id`='$role' ";
  $result = mysqli_query($conn, $sql);
  $ro= mysqli_fetch_assoc($result);
  $array= unserialize($ro['role_roles']);
  
 
  $sql="SELECT * FROM `images` ";
  $res=mysqli_query($conn,$sql);
  $ar=mysqli_fetch_assoc($res);


  ?>
  <!-- aside -->
  <div id="aside" class="app-aside modal nav-dropdown">
      <!-- fluid app aside -->
      <div class="left navside dark dk" data-layout="column">
          <div class="navbar no-radius">
             
                  <img src="../uploads/<?php echo $ar['img_logo']; ?>" width="150px" height="150px" alt="." >
                  
          </div>
          <div class="hide-scroll" data-flex style="margin-top:-40px">
              <nav class="scroll nav-light" >

                  <ul class="nav" ui-nav>
                     

                      <li>
                          <a href="dashboard.php">
                              <span class="nav-icon">
                              <i class="fa-solid fa-house"></i>
                              </span>
                              <span class="nav-text">Dashboard</span>
                          </a>
                      </li>
                      <?php 
                     
                      if( $ro['role_access']=='all'|| in_array('category',$array )){
                        $sql="SELECT * FROM `categories`";
                        $res= mysqli_query($conn,$sql);
                        $nums=mysqli_num_rows($res);
 ?>
                      <li>
                          <a>
                              <span class="nav-caret">
                                  <i class="fa fa-caret-down"></i>
                              </span>
                              <span class="nav-label">
                                  <b class="label rounded label-sm primary"><?php echo $nums;  ?></b>
                              </span>
                              <span class="nav-icon">
                                  <i class="fa fa-list "></i>
                              </span>
                              <span class="nav-text">Category</span>
                          </a>
                          <ul class="nav-sub">
                              <li>
                                  <a href="add_category.php">
                                      <span class="nav-text">Add Category</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="view_category.php">
                                      <span class="nav-text">Categories</span>
                                  </a>
                              </li>

                          </ul>
                      </li>
                      <?php 
                      }
                      if( $ro['role_access']=='all'|| in_array('planner',$array )){
                        $sql="SELECT * FROM `planner`";
                        $res= mysqli_query($conn,$sql);
                        $nums=mysqli_num_rows($res);
                      ?>
                      <li>
                          <a>
                              <span class="nav-caret">
                                  <i class="fa fa-caret-down"></i>
                              </span>
                              <span class="nav-label">
                                  <b class="label rounded label-sm primary"><?php echo $nums; ?></b>
                              </span>
                              <span class="nav-icon">
                                  <i class="fa fa-book "></i>
                              </span>
                              <span class="nav-text">Planner</span>
                          </a>
                          <ul class="nav-sub">
                              <li>
                                  <a href="add_planner.php">
                                      <span class="nav-text">Add Planner</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="view_planner.php">
                                      <span class="nav-text">View planner</span>
                                  </a>
                              </li>

                          </ul>
                      </li>
                      <?php 
                      }
                      if( $ro['role_access']=='all'|| in_array('designer',$array )){
                        $sql="SELECT * FROM `designer`";
                        $res= mysqli_query($conn,$sql);
                        $nums=mysqli_num_rows($res);
                      ?>
                      <li>
                          <a>
                              <span class="nav-caret">
                                  <i class="fa fa-caret-down"></i>
                              </span>
                              <span class="nav-label">
                                  <b class="label rounded label-sm primary"><?php echo $nums ; ?></b>
                              </span>
                              <span class="nav-icon">
                                  <i class="fa fa-paint-brush "></i>
                              </span>
                              <span class="nav-text">Designer</span>
                          </a>
                          <ul class="nav-sub">
                              <li>
                                  <a href="add_designer.php">
                                      <span class="nav-text">Add Designer</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="view_designer.php">
                                      <span class="nav-text">View Designer</span>
                                  </a>
                              </li>

                          </ul>
                      </li>
                      <?php 
                      }
                      if( $ro['role_access']=='all'|| in_array('volunteer',$array )){
                        $sql="SELECT * FROM `volunteer`";
                        $res= mysqli_query($conn,$sql);
                        $nums=mysqli_num_rows($res);
                      ?>
                      <li>
                          <a>
                              <span class="nav-caret">
                                  <i class="fa fa-caret-down"></i>
                              </span>
                              <span class="nav-label">
                                  <b class="label rounded label-sm primary"><?php echo $nums; ?></b>
                              </span>
                              <span class="nav-icon">
                              <i class="fa-solid fa-handshake-angle"></i>
                              </span>
                              <span class="nav-text">Volunteer</span>
                          </a>
                          <ul class="nav-sub">
                              <li>
                                  <a href="add_volunteer.php">
                                      <span class="nav-text">Add Volunteer</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="view_volunteer.php">
                                      <span class="nav-text">View Volunteer</span>
                                  </a>
                              </li>

                          </ul>
                      </li>
                      <?php 
                      }
                      if( $ro['role_access']=='all'|| in_array('venue',$array )){
                        $sql="SELECT * FROM `venue`";
                        $res= mysqli_query($conn,$sql);
                        $nums=mysqli_num_rows($res);
                      ?>
                      <li>
                          <a>
                              <span class="nav-caret">
                                  <i class="fa fa-caret-down"></i>
                              </span>
                              <span class="nav-label">
                                  <b class="label rounded label-sm primary"><?php echo $nums ; ?></b>
                              </span>
                              <span class="nav-icon">
                                  <i class="fa fa-map-marker"></i>
                              </span>
                              <span class="nav-text">Venue</span>
                          </a>
                          <ul class="nav-sub">
                              <li>
                                  <a href="add_venue.php">
                                      <span class="nav-text">Add Venue</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="view_venue.php">
                                      <span class="nav-text">View Venue</span>
                                  </a>
                              </li>

                          </ul>
                      </li>
                      <?php 
                      }
                      if( $ro['role_access']=='all'|| in_array('booking',$array )){
                        $sql="SELECT * FROM `booking`";
                        $res= mysqli_query($conn,$sql);
                        $nums=mysqli_num_rows($res);
                      ?>
                      <li>
                          <a>
                              <span class="nav-caret">
                                  <i class="fa fa-caret-down"></i>
                              </span>
                              <span class="nav-label">
                                  <b class="label rounded label-sm primary"><?php echo $nums ; ?></b>
                              </span>
                              <span class="nav-icon">
                                  <i class="fa fa-building"></i>
                              </span>
                              <span class="nav-text">Booking</span>
                          </a>
                          <ul class="nav-sub">
                              <li>
                                  <a href="add_booking.php">
                                      <span class="nav-text">Add Booking</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="view_booking.php">
                                      <span class="nav-text">View Booking</span>
                                  </a>
                              </li>

                          </ul>
                      </li>
                      <?php 
                      }
                      if( $ro['role_access']=='all'|| in_array('news',$array )){
                        $sql="SELECT * FROM `news`";
                        $res= mysqli_query($conn,$sql);
                        $nums=mysqli_num_rows($res);
                      ?>
                      <li>
                          <a>
                              <span class="nav-caret">
                                  <i class="fa fa-caret-down"></i>
                              </span>
                              <span class="nav-label">
                                  <b class="label rounded label-sm primary"><?php echo $nums  ?></b>
                              </span>
                              <span class="nav-icon">
                              <i class="fa-solid fa-newspaper"></i>
                              </span>
                              <span class="nav-text">News</span>
                          </a>
                          <ul class="nav-sub">
                              <li>
                                  <a href="add_news.php">
                                      <span class="nav-text">Add News</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="view_news.php">
                                      <span class="nav-text">View News</span>
                                  </a>
                              </li>

                          </ul>
                      </li>
                      <?php 
                      }
                      if( $ro['role_access']=='all'|| in_array('event',$array )){
                        $sql="SELECT * FROM `events`";
                        $res= mysqli_query($conn,$sql);
                        $nums=mysqli_num_rows($res);
                      ?>
                      <li>
                          <a>
                              <span class="nav-caret">
                                  <i class="fa fa-caret-down"></i>
                              </span>
                              <span class="nav-label">
                                  <b class="label rounded label-sm primary"><?php echo $nums ; ?></b>
                              </span>
                              <span class="nav-icon">
                                  <i class="fa fa-gift" aria-hidden="true"></i>
                              </span>
                              <span class="nav-text">Recent Event</span>
                          </a>
                          <ul class="nav-sub">
                              <li>
                                  <a href="add_event.php">
                                      <span class="nav-text">Add Event</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="view_event.php">
                                      <span class="nav-text">View Event</span>
                                  </a>
                              </li>

                          </ul>
                      </li>
                      <?php 
                      }
                      if( $ro['role_access']=='all'|| in_array('client',$array )){
                        $sql="SELECT * FROM `roles`";
                        $res= mysqli_query($conn,$sql);
                        $nums=mysqli_num_rows($res);
                      ?>
                      <li>
                          <a>
                              <span class="nav-caret">
                                  <i class="fa fa-caret-down"></i>
                              </span>
                              <span class="nav-label">
                                  <b class="label rounded label-sm primary"><?php echo $nums ; ?></b>
                              </span>
                              
                              <span class="nav-icon">
                                  <i class="fa fa-users" aria-hidden="true"></i>
                              </span>
                              <span class="nav-text">User Management</span>
                          </a>
                          <ul class="nav-sub">
                              <li>
                                  <a href="add_role.php">
                                      <span class="nav-text">Add Role</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="view_role.php">
                                      <span class="nav-text">View Role</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="add_user.php">
                                      <span class="nav-text">Add User</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="view_user.php">
                                      <span class="nav-text">View User</span>
                                  </a>
                              </li>

                          </ul>
                      </li>
                      <?php 
                      }
                      if( $ro['role_access']=='all'|| in_array('messgage',$array )){
                        $sql="SELECT * FROM `messages`";
                        $res= mysqli_query($conn,$sql);
                        $nums=mysqli_num_rows($res);
                      ?>
                      <li>
                          <a href="view_message.php">
                           
                          <span class="nav-label" style="margin-right:23px">
                                  <b class="label rounded label-sm primary"><?php echo $nums ; ?></b>
                              </span>
                              
                              <span class="nav-icon">
                              <i class="fas fa-envelope" aria-hidden="true"></i>
                              </span>
                              <span class="nav-text">Messages</span>
                          </a>
                         
                      </li>
                      <?php 
                      }
                     ?>
                  </ul>

              </nav>
          </div>
          <div class="b-t">
              <div class="nav-fold">
                  <a href="profile.html">
                      <span class="pull-left">
                    
                          <img src="../uploads/<?php echo $ar['img_profile']; ?>" alt="..." class="w-40 img-circle">
                      </span>
                      <span class="clear hidden-folded p-x">
                          <span class="block _500">GOHAR</span>
                          <small class="block text-muted"><i class="fa fa-circle text-success m-r-sm"></i>online</small>
                      </span>
                  </a>
              </div>
          </div>
      </div>
  </div>
  <!-- / -->