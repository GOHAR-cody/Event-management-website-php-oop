
<?php
include('db.php');
$id = $_GET['upid'];
$sql = "DELETE FROM `venue` WHERE `venue_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo "<script>alert('Venue deleted sucessfully!')</script>";  

} else {
echo "<script>alert('Error deleting the Venue!')</script>"; 
}
header("Refresh:0, url=view_venue.php");
exit();

?>

