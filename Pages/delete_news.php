
<?php
include('db.php');
$id = $_GET['id'];
$sql = "DELETE FROM `news` WHERE `news_id` = '$id'";
if (mysqli_query($conn, $sql)) {   
echo "<script>alert('News deleted sucessfully!')</script>";  

} else {
echo "<script>alert('Error deleting the news!')</script>"; 
}
header("Refresh:0, url=view_news.php");
exit();

?>

