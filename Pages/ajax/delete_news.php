<?php
include('../db.php'); 
$id = $_POST['id'];
$sql = "DELETE FROM `news` WHERE `news_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo 1;  
$sql="SELECT * FROM `news` WHERE `news_id`= '$id'";
$res=mysqli_query($conn,$sql);
$ar=mysqli_fetch_assoc($res);
$oldImage = $ar['news_pics'];
if (file_exists("../../uploads/" . $oldImage)) {
    unlink("../../uploads/" . $oldImage); 
    
}
} else {
echo 0; 
}


?>