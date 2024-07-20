
<?php
include('db.php');
$id = $_GET['upid'];
$sql = "DELETE FROM `designer` WHERE `designer_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo "<script>alert('Designer deleted sucessfully!')</script>";  

} else {
echo "<script>alert('Error deleting Designer!')</script>"; 
}
header("Refresh:0, url=view_designer.php");
exit();

?>

