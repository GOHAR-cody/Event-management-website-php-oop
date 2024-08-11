<?php
 include('../db.php');
$name=mysqli_real_escape_string($conn,$_POST['name']);
$mail=mysqli_real_escape_string($conn,$_POST['mail']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
if(empty($name)||empty($mail)||empty($phone)||empty($msg)){
    echo 2;
}
else{
    $sql = "INSERT INTO `messages` (
        `msg_name`, 
        `msg_mail`, 
        `msg_phone`, 
        `msg_msg`
    ) VALUES (
        '$name', 
        '$mail', 
        '$phone', 
        '$msg'
    )";
     $result=mysqli_query($conn, $sql);
     if($result) {
         echo 1;
         
     } else {
         echo 0;
     }
}
?>