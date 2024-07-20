
<?php
include('db.php');
$id = $_GET['id'];
$sql = "DELETE FROM `volunteer` WHERE `volunteer_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo "<script>alert('Volunteer deleted sucessfully!')</script>";  

} else {
echo "<script>alert('Error deleting the Volunteer!')</script>"; 
}
header("Refresh:0, url=view_volunteer.php");
exit();

?>

