<?php  
include('../db.php');  
  $id= $_POST['id'];
  $cat_name= mysqli_real_escape_string($conn,$_POST['cat_name']);
  $cat_desc= mysqli_real_escape_string($conn,$_POST['cat_desc']);
  if(empty($cat_name) || empty($cat_desc)){
    echo "Fill all the fields";
   }
   else{
   $sql="UPDATE `categories` SET  `cat_name`='$cat_name', `cat_description`='$cat_desc' WHERE `cat_id`='$id'";
   $result=mysqli_query($conn,$sql);
   if($result){
    echo 1;
   }
   else{
    echo 0;
   }
 }
 ?>  