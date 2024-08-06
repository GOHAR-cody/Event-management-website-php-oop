<?php  
include('../db.php'); 
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $access = mysqli_real_escape_string($conn, $_POST['access']);
  if($access=='all'){
    $roles=[];
    $selected=serialize($roles);
  }
  else{
  $roles =  $_POST['exampleRadios'];
  $selected=serialize($roles);}
 
   
    $sql = "INSERT INTO `roles`(`role_name`, `role_access`, `role_roles`) VALUES ('$role','$access', '$selected')";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo 1;
    } else {
      echo 0;
    }
  

?>