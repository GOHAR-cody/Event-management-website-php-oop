<?php
include('../db.php'); 
$name=mysqli_real_escape_string($conn,$_POST['name']);
$cat=mysqli_real_escape_string($conn,$_POST['cat']);
$desc=mysqli_real_escape_string($conn,$_POST['desc']);
$radio=mysqli_real_escape_string($conn,$_POST['exampleRadios']);
$image = $_FILES['imageFile']['name'];
if(empty($name)||empty($cat)||empty($radio)||empty($image)||empty($desc))
{
  echo 2;
}
else {
    $new= [];
    foreach($image as $key => $im){
    $arr = array('png', 'jpeg', 'jpg');
    $exe = strtolower(pathinfo($im, PATHINFO_EXTENSION));
    if(in_array($exe, $arr)){
    $pic= rand(10000,99999).".".$exe;
    if (move_uploaded_file($_FILES['imageFile']['tmp_name'][$key], "../../uploads/" . $pic)) {
     $new[] = $pic;
 }
    }
 }
    $imageSerial = serialize($new);
    $sql="INSERT INTO `news`( `news_title`, `news_desc`, `news_pics`, `news_cat`, `news_status`) VALUES ('$name','$desc','$imageSerial','$cat','$radio')";
    $result=mysqli_query($conn, $sql);
    if($result) {
        echo 1;
    } else {
        echo 0;
    }

    }

?>