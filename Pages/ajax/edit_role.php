<?php  
include('../db.php'); 
$id = $_POST['id'];

  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $access = mysqli_real_escape_string($conn, $_POST['access']);
  if($access=='all'){
    $roles=[];
    $selected=serialize($roles);
  }
  else{
  $roles =  $_POST['exampleRadios'];
  $selected=serialize($roles);}
 
    $sql = "UPDATE `roles` SET `role_name`='$role', `role_roles`='$selected', `role_access`='$access' WHERE `role_id`='$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo 1;
    } else {
      echo 0;
    }
  

?>
