<?php  
include('db.php'); 
$id = $_GET['upid'];
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $access = mysqli_real_escape_string($conn, $_POST['access']);
  $roles = $_POST['exampleRadios'];
  if(empty($role) || empty($access) || empty($roles)){
    echo "Fill all the fields";
  } else {
    $selected = serialize($roles);
    $sql = "UPDATE `roles` SET `role_name`='$role', `role_roles`='$selected', `role_access`='$access' WHERE `role_id`='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo "<script>alert('Role has been added ')</script>";
    } else {
      echo "<script>alert('Error! Role not added')</script>";
    }
  }
}
?>

<?php
include('../include/header.php'); 
include('../include/sidebar.php'); 
?>
<div class="app" id="app">
    <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
                <i class="material-icons">&#xe5d2;</i>
            </a>
            <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>
            <div class="collapse navbar-collapse" id="collapse">
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
            </div>
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
        </div>
    </div>
    <div class="app-footer">
        <div class="p-2 text-xs">
            <div class="pull-right text-muted py-1">
                &copy; Copyright <strong>Flatkit</strong> <span class="hidden-xs-down">- Built with Love v1.1.3</span>
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
                <div class="col-sm-6 ">
                    <form Method="POST">
                        <div class="box">
                            <?php
                                $sql = "SELECT * FROM `roles` WHERE `role_id`='$id'";
                                $result = mysqli_query($conn, $sql);
                                $data = mysqli_fetch_assoc($result);
                                $role_access = $data['role_access'];
                                $stored_roles = unserialize($data['role_roles']);
                                $new = array('category','planner','designer','volunteer','venue','booking','news','event');
                            ?>
                            <div class="box-header">
                                <h2>Edit Role</h2>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" value="<?php echo $data['role_name']; ?>" name="role" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Role Access</label>
                                    <select name="access" class="form-select input_text form-control" id="opt" onchange="toggleDiv()" required>
                                        <option value="all" <?php echo ($role_access == 'all') ? 'selected' : ''; ?>>All</option>
                                        <option value="custom" <?php echo ($role_access == 'custom') ? 'selected' : ''; ?>>Custom</option>
                                    </select>
                                </div>
                                <div style="display: <?php echo ($role_access == 'custom') ? 'block' : 'none'; ?>;" id="showdiv">
                                    <div class="form-group">
                                        <div style=" margin-left: 4em;">
                                            <?php foreach($new as $value) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="exampleRadios[]" id="exampleRadios<?php echo $value; ?>" value="<?php echo $value; ?>" <?php echo (in_array($value, $stored_roles)) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="exampleRadios<?php echo $value; ?>"><?php echo ucfirst($value); ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
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
function toggleDiv() {
    let val1 = document.getElementById("opt").value;
    let divShow = document.getElementById("showdiv");

    if (val1 === "custom") {
        divShow.style.display = "block";
    } else {
        divShow.style.display = "none";
    }
}

// Initial check for setting div display
document.addEventListener('DOMContentLoaded', function() {
    toggleDiv();
});
</script>
