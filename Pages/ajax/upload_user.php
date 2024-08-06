<?php
include('../db.php'); 
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
    $sql = "INSERT INTO `login_users` ( `login_mail`, `login_pass`, `login_role`) 
    VALUES ( '$mail',  '$pwd', '$role')";
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