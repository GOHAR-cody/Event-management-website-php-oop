<?php  
include('../db.php'); 
$id = $_POST['id'];

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
      echo 1;
    } else {
      echo 0;
    }
  }

?>
