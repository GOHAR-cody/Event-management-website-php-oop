<?php
include('../db.php'); 
$id = $_POST['id'];
$que = "SELECT * FROM `login_users` WHERE `login_id`='$id'";
$res = mysqli_query($conn, $que);
$users = mysqli_fetch_assoc($res);
$name=mysqli_real_escape_string($conn,$_POST['name']);
$mail=mysqli_real_escape_string($conn,$_POST['mail']);
$role=mysqli_real_escape_string($conn,$_POST['role']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
$pwd2=mysqli_real_escape_string($conn,$_POST['pwd2']);
if(empty($name)||empty($mail)
||empty($pwd)||empty($pwd2)||empty($role))
{
  echo 3;
}
else {
    if($pwd==$pwd2){
    $sql = "UPDATE `login_users` SET `login_name`='$name', `login_mail`='$mail', `login_pass`='$pwd', `login_role`='$role'";
   
    $result=mysqli_query($conn, $sql);
    if($result) {
        echo 1;
    } else {
        echo 0;
    }
}
    
else{
    echo 2;
}

}

?>