<?php
include('../db.php'); 
$id = $_POST['id'];
$sql = "DELETE FROM `users` WHERE `user_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo 1;  

} else {
echo 0; 
}


?>