<?php
include('../db.php'); 
$id = $_POST['id'];
$sql = "DELETE FROM `volunteer` WHERE `volunteer_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo 1;  
$sql="SELECT * FROM `volunteer` WHERE `volunteer_id`= '$id'";
$res=mysqli_query($conn,$sql);
$ar=mysqli_fetch_assoc($res);
$oldImage = $ar['volunteer_img'];
if (file_exists("../../uploads/" . $oldImage)) {
    unlink("../../uploads/" . $oldImage); 
    
}
} else {
echo 0; 
}


?>