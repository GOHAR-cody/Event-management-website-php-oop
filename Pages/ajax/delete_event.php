<?php
include('../db.php'); 
$id = $_POST['id'];
$sql = "DELETE FROM `events` WHERE `event_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo 1;  
$sql="SELECT * FROM `events` WHERE `event_id`= '$id'";
$res=mysqli_query($conn,$sql);
$ar=mysqli_fetch_assoc($res);
$oldImage = $ar['event_pics'];
if (file_exists("../../uploads/" . $oldImage)) {
    unlink("../../uploads/" . $oldImage); 
    
}
} else {
echo 0; 
}


?>