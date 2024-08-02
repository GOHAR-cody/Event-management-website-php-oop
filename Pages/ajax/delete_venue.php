<?php
include('../db.php'); 
$id = $_POST['id'];
$sql = "DELETE FROM `venue` WHERE `venue_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo 1;  

} else {
echo 0; 
}


?>