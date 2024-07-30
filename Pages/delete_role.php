
<?php
include('db.php');
$id = $_GET['upid'];
$sql = "DELETE FROM `roles` WHERE `role_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo "<script>alert('Role deleted sucessfully!')</script>";  

} else {
echo "<script>alert('Error deleting the Role!')</script>"; 
}
header("Refresh:0, url=view_role.php");
exit();

?>

