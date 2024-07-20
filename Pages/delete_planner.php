
<?php
include('db.php');
$id = $_GET['upid'];
$sql = "DELETE FROM `planner` WHERE `planner_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo "<script>alert('Planner deleted sucessfully!')</script>";  

} else {
echo "<script>alert('Error deleting Planner!')</script>"; 
}
header("Refresh:0, url=view_planner.php");
exit();

?>

