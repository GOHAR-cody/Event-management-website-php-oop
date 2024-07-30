
<?php
include('db.php');
$id = $_GET['id'];
$sql = "DELETE FROM `events` WHERE `event_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo "<script>alert('Event deleted sucessfully!')</script>";  

} else {
echo "<script>alert('Error deleting the event!')</script>"; 
}
header("Refresh:0, url=view_event.php");
exit();

?>

