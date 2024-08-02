<?php
include('../db.php'); 
$id = $_POST['id'];
$que = "SELECT * FROM `users` WHERE `user_id`='$id'";
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
    $sql = "UPDATE `users` SET `user_name`='$name', `user_mail`='$mail', `user_pass`='$pwd', `user_role`='$role'";
   
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