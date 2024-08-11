<?php  
 include '../include/header.php';
 include  './db.php';
 $sql="SELECT * FROM `images` ";
 $res=mysqli_query($conn,$sql);
 $ar=mysqli_fetch_assoc($res);


 ?> 
  <div class="app" id="app">

<!-- ############ LAYOUT START-->

<?php  
 include '../include/sidebar.php';

 ?> 
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
   
  <?php  
 include '../include/navbar.php';

 ?> 
    <div ui-view class="app-body" id="view">

<!-- ############ PAGE START-->

  <div class="item">
    <div class="item-bg">
      <img src="../uploads/<?php echo $ar['img_profile']; ?>" class="blur opacity-3">
    </div>
    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">
          <a href class="pull-left m-r-md">
            <span class="avatar w-96">
            <img src="../uploads/<?php echo $ar['img_profile']; ?>" alt="..." class=" img-circle">
              <i class="on b-white"></i>
            </span>
          </a>
          <div class="clear m-b">
            <h3 class="m-0 m-b-xs">Jean Reyes</h3>
            <p class="text-muted"><span class="m-r">UX/UI Director</span> <small><i class="fa fa-map-marker m-r-xs"></i>London, UK</small></p>
            <div class="block clearfix m-b">
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
              <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-facebook indigo"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
              <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-twitter light-blue"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
              <i class="fa-brands fa-google-plus-g"></i>
                <i class="fa-brands fa-google-plus-g red"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
              <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-linkedin cyan-600"></i>
              </a>
            </div>
            <a href class="btn btn-sm warn btn-rounded m-b">Follow</a>
          </div>
        </div>
       
        </div>
      </div>
    </div>
  </div>
  <div class="dker p-x">
    <div class="row">
      <div class="col-sm-6 push-sm-6">
        <div class="p-y text-center text-sm-right">
          <a href class="inline p-x text-center">
            <span class="h4 block m-0">2k</span>
            <small class="text-xs text-muted">Followers</small>
          </a>
          <a href class="inline p-x b-l b-r text-center">
            <span class="h4 block m-0">250</span>
            <small class="text-xs text-muted">Following</small>
          </a>
          <a href class="inline p-x text-center">
            <span class="h4 block m-0">89</span>
            <small class="text-xs text-muted">Activities</small>
          </a>
        </div>
      </div>
      
    </div>
  </div>


<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->

 

<!-- ############ LAYOUT END-->
<?php  
 include '../include/footer.php';

 ?> 