<?php
include('../db.php');
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
  echo "<script>alert('fill all the fields')</script>";
}
else {
   
   $sql = "INSERT INTO `booking`( `book_name`, `book_phone`, `book_mail`, `book_date`,
    `book_time`, `book_desc`, `book_status`, `book_city`, `book_occ`, `book_seats`, `book_ven`, `book_cat`

) VALUES (
    '$name', 
    '$phone', 
    '$mail', 
    '$date', 
    '$time',  
    '$desc', 
    '$radio', 
    '$city',  
    '$occ', 
    '$seats', 
    '$ven', 
    '$cat'
)";
    $result=mysqli_query($conn, $sql);
    if($result) {
        echo 1;
    } else {
        echo 0;
    }

    }


?>