<?php
include('db.php'); 
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
$name=mysqli_real_escape_string($conn,$_POST['name']);
$cat=mysqli_real_escape_string($conn,$_POST['cat']);
$desc=mysqli_real_escape_string($conn,$_POST['desc']);
$date=mysqli_real_escape_string($conn,$_POST['date']);
$image = $_FILES['imageFile']['name'];
if(empty($name)||empty($cat)||empty($date)||empty($image)||empty($desc))
{
  echo "<script>alert('fill all the fields')</script>";
}
else {
    $new= [];
    foreach($image as $key => $im){
    $arr = array('png', 'jpeg', 'jpg');
    $exe = strtolower(pathinfo($im, PATHINFO_EXTENSION));
    if(in_array($exe, $arr)){
    $pic= rand(100,500).".".$exe;
    if (move_uploaded_file($_FILES['imageFile']['tmp_name'][$key], "../uploads/" . $pic)) {
     $new[] = $pic;
 }
    }
 }
    $imageSerial = serialize($new);
    $sql="INSERT INTO `events`( `event_title`, `event_desc`, `event_date`, `event_pics`, `event_cat`) VALUES 
    ('$name','$desc','$date','$imageSerial','$cat')";
    $result=mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Event has been created')</script>";
    } else {
        echo "<script>alert('Error! creating the Event ')</script>";
    }

    }
}

include('../include/header.php'); ?>
<style>
.tags-input-container {
    display: flex;
    flex-wrap: wrap;
    border: 1px solid #ccc;
    padding: 5px;

    cursor: text;

}

.tags-input-container input {
    border: none;
    outline: none;
    padding: 5px;
    flex-grow: 1;
}

.tag {
    display: inline-block;
    background-color: #e1e1e1;
    padding: 5px;
    margin: 2px;
    border-radius: 3px;
    font-size: 14px;
}

.tag .remove-tag {
    margin-left: 5px;
    cursor: pointer;
}
</style>

</head>

<body>
    <?php
include('../include/sidebar.php'); 

?>

    <div class="app" id="app">
        <div class="app-header white box-shadow">
            <div class="navbar navbar-toggleable-sm flex-row align-items-center">
                <!-- Open side - Naviation on mobile -->
                <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
                    <i class="material-icons">&#xe5d2;</i>
                </a>
                <!-- / -->

                <!-- Page title - Bind to $state's title -->
                <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>

                <!-- navbar collapse -->
                <div class="collapse navbar-collapse" id="collapse">
                    <!-- link and dropdown -->
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href data-toggle="dropdown">
                                <i class="fa fa-fw fa-plus text-muted"></i>
                                <span>New</span>
                            </a>
                            <div ui-include="'../views/blocks/dropdown.new.html'"></div>
                        </li>
                    </ul>

                    <div ui-include="'../views/blocks/navbar.form.html'"></div>
                    <!-- / -->
                </div>
                <!-- / navbar collapse -->

                <!-- navbar right -->
                <ul class="nav navbar-nav ml-auto flex-row">
                    <li class="nav-item dropdown pos-stc-xs">
                        <a class="nav-link mr-2" href data-toggle="dropdown">
                            <i class="material-icons">&#xe7f5;</i>
                            <span class="label label-sm up warn">3</span>
                        </a>
                        <div ui-include="'../views/blocks/dropdown.notification.html'"></div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                            <span class="avatar w-32">
                                <img src="../assets/images/a0.jpg" alt="...">
                                <i class="on b-white bottom"></i>
                            </span>
                        </a>
                        <div ui-include="'../views/blocks/dropdown.user.html'"></div>
                    </li>
                    <li class="nav-item hidden-md-up">
                        <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
                            <i class="material-icons">&#xe5d4;</i>
                        </a>
                    </li>
                </ul>
                <!-- / navbar right -->
            </div>
        </div>

        <div class="app-footer">
            <div class="p-2 text-xs">
                <div class="pull-right text-muted py-1">
                    &copy; Copyright <strong>Flatkit</strong> <span class="hidden-xs-down">- Built with Love
                        v1.1.3</span>
                    <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
                </div>
                <div class="nav">
                    <a class="nav-link" href="../">About</a>
                    <a class="nav-link" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">Get it</a>
                </div>
            </div>
        </div>
        <div ui-view class="app-body" id="view">
            <div class="padding">
                <div class="row " style="margin-left:40em">
                    <div class="col-sm-6">

                        <form method="POST" enctype="multipart/form-data">
                            <div class="box">
                                <div class="box-header">
                                    <h2>Add Event</h2>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Event Category</label><br>
                                        <select name="cat" class="form-select input_text form-control" required>
                                            <option value="null">Select Category</option>
                                            <?php
                                     $city_query = "SELECT * FROM categories ";
                                     $city_result=$city_result = mysqli_query($conn, $city_query);
                                     while ($city = mysqli_fetch_assoc($city_result)) {?>
                                            <option value="<?php echo $city['cat_name']?>">
                                                <?php echo $city['cat_name']?></option>";
                                            <?php      }
                                  ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Event Title</label>
                                        <input type="text" name="name" class="form-control" placeholder="e.g. john"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="imageFile" class="form-label">
                                            Featured Images
                                        </label>
                                        <input type="file" class="form-control" id="imageFile"
                                            name="imageFile[]" accept=".jpg,.jpeg,.png,.gif" multiple required>
                                    </div>
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" name="date" class="form-control" placeholder="e.g. john"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label> Description</label>
                                        <textarea class="form-control" name="desc" rows="6" data-minwords="6" required
                                            placeholder="Add description here"></textarea>
                                    </div>


                                    
                                </div>
                                <br>
                                <div class="dker p-a text-right">
                                    <button type="submit" name="submit" class="btn info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
    include('../include/footer.php'); 
    ?>

    <script>