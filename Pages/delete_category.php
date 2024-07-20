
<?php
include('db.php');
$id = $_GET['upid'];
$sql = "DELETE FROM `categories` WHERE `cat_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo "<script>alert('Category deleted sucessfully!')</script>";  

} else {
echo "<script>alert('Error deleting Category!')</script>"; 
}
header("Refresh:0, url=view_category.php");
exit();

?>

