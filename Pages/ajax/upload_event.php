<?php
include('../db.php'); 
$name=mysqli_real_escape_string($conn,$_POST['name']);
$cat=mysqli_real_escape_string($conn,$_POST['cat']);
$desc=mysqli_real_escape_string($conn,$_POST['desc']);
$date=mysqli_real_escape_string($conn,$_POST['date']);
$image = $_FILES['imageFile']['name'];
if(empty($name)||empty($cat)||empty($date)||empty($image)||empty($desc))
{
  echo 2;
}
else {
    $new= [];
    foreach($image as $key => $im){
    $arr = array('png', 'jpeg', 'jpg');
    $exe = strtolower(pathinfo($im, PATHINFO_EXTENSION));
    if(in_array($exe, $arr)){
    $pic= rand(100,500).".".$exe;
    if (move_uploaded_file($_FILES['imageFile']['tmp_name'][$key], "../../uploads/" . $pic)) {
     $new[] = $pic;
 }
    }
 }
    $imageSerial = serialize($new);
    $sql="INSERT INTO `events`( `event_title`, `event_desc`, `event_date`, `event_pics`, `event_cat`) VALUES 
    ('$name','$desc','$date','$imageSerial','$cat')";
    $result=mysqli_query($conn, $sql);
    if($result) {
        echo 1;
    } else {
        echo 0;
    }

    }

?>