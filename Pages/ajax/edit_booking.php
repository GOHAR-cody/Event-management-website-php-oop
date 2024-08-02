<?php
include('../db.php'); 
$id= $_POST['id'];
$sql="SELECT * FROM `booking` WHERE `book_id`='$id'";
$res = mysqli_query($conn, $sql);
$booking= mysqli_fetch_assoc($res);
$name=mysqli_real_escape_string($conn,$_POST['name']);
$mail=mysqli_real_escape_string($conn,$_POST['mail']);
$date=mysqli_real_escape_string($conn,$_POST['date']);
$cat=mysqli_real_escape_string($conn,$_POST['cat']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$desc=mysqli_real_escape_string($conn,$_POST['desc']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$occ=mysqli_real_escape_string($conn,$_POST['occ']);
$time=mysqli_real_escape_string($conn,$_POST['time']);
$seats=mysqli_real_escape_string($conn,$_POST['seats']);
$ven=mysqli_real_escape_string($conn,$_POST['ven']);
$radio=mysqli_real_escape_string($conn,$_POST['exampleRadios']);
if(empty($name)||empty($mail)||empty($date)||empty($phone)||empty($desc)||empty($cat)||empty($occ)||empty($city)
|| empty($time)||empty($seats)||empty($ven)||empty($radio))
{
  echo 2;
}
else {
   
   $sql=" UPDATE `booking` SET `book_name`='$name',`book_phone`='$phone',
    `book_mail`='$mail',`book_date`='$date',`book_time`='$time',`book_desc`='$desc'
    ,`book_status`='$radio',`book_city`='$city'
    ,`book_occ`='$occ',`book_seats`='$seats',`book_ven`='$ven',`book_cat`='$cat' WHERE `book_id`= '$id'";
    

    $result=mysqli_query($conn, $sql);
    if($result) {
        echo 1;
    } else {
        echo 0;
    }

    }



?>