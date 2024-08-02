<?php
include('../db.php'); 
$id = $_POST['id'];
$sql = "DELETE FROM `events` WHERE `event_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo 1;  

} else {
echo 0; 
}


?>