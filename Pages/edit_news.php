<?php
include('db.php'); 

$id = $_GET['id'];
$sql = "SELECT * FROM `news` WHERE `news_id`='$id'";
$res = mysqli_query($conn, $sql);
$news = mysqli_fetch_assoc($res);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $cat = mysqli_real_escape_string($conn, $_POST['cat']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $radio = mysqli_real_escape_string($conn, $_POST['exampleRadios']);
    $image = $_FILES['imageFile']['name'];

    if (empty($name) || empty($cat) || empty($radio) || empty($desc)) {
        echo "<script>alert('Fill all the fields')</script>";
    } else {
        if (!empty($image[0])) {
            $new = [];
            foreach ($image as $key => $im) {
                $arr = ['png', 'jpeg', 'jpg'];
                $exe = strtolower(pathinfo($im, PATHINFO_EXTENSION));
                if (in_array($exe, $arr)) {
                    $pic = rand(100, 500) . "." . $exe;
                    if (move_uploaded_file($_FILES['imageFile']['tmp_name'][$key], "../uploads/" . $pic)) {
                        $new[] = $pic;
                    }
                }
            }
            $imageSerial = serialize($new);
        } else {
            $imageSerial = $news['news_pics'];
        }

        $sql = "UPDATE `news` SET 
                `news_title`='$name',
                `news_desc`='$desc',
                `news_pics`='$imageSerial',
                `news_cat`='$cat',
                `news_status`='$radio' 
                WHERE `news_id`='$id'";
        
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('News has been updated')</script>";
        } else {
            echo "<script>alert('Error updating the news')</script>";
        }
    }
}

include('../include/header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Your styles and scripts -->
</head>
<body>
    <?php include('../include/sidebar.php'); ?>
    <div class="app" id="app">
        <div class="app-header white box-shadow">
            <div class="navbar navbar-toggleable-sm flex-row align-items-center">
                <!-- Open side - Navigation on mobile -->
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
                                    <h2>News</h2>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>News Category</label><br>
                                        <select name="cat" class="form-select input_text form-control" required>
                                        
                                            <?php
                                            $city_query = "SELECT * FROM categories";
                                            $city_result = mysqli_query($conn, $city_query);
                                            while ($city = mysqli_fetch_assoc($city_result)) { ?>
                                            <option value="<?php echo $city['cat_name']; ?>"
                                                <?php echo ($news['news_cat'] == $city['cat_name']) ? 'selected' : ''; ?>>
                                                <?php echo $city['cat_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>News Title</label>
                                        <input type="text" value="<?php echo $news['news_title']; ?>" name="name" class="form-control" placeholder="e.g. john" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="imageFile" class="form-label">Featured Images</label>
                                        <input type="file" class="form-control" id="imageFile" name="imageFile[]" accept=".jpg,.jpeg,.png,.gif" multiple>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="desc" rows="6" data-minwords="6" required placeholder="Add description here"><?php echo $news['news_desc']; ?></textarea>
                                    </div>

                                    <div class="form-group" style="margin-left: 1em; padding-bottom: 2em;">
                                        <label>Status</label>
                                        <div style="display: flex; margin-left: 2em;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="on" <?php echo ($news['news_status'] == 'on') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="exampleRadios1">ON</label>
                                            </div>
                                            <div class="form-check" style="margin-left: 4em;">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="off" <?php echo ($news['news_status'] == 'off') ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="exampleRadios2">OFF</label>
                                            </div>
                                        </div>
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
    <?php include('../include/footer.php'); ?>
</body>
</html>
