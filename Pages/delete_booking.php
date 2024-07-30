
<?php
include('db.php');
$id = $_GET['id'];
$sql = "DELETE FROM `booking` WHERE `book_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo "<script>alert('Booking deleted sucessfully!')</script>";  

} else {
echo "<script>alert('Error deleting Booking!')</script>"; 
}
header("Refresh:0, url=view_booking.php");
exit();

?>

