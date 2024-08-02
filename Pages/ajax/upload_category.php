<?php  
 include('../db.php'); 
 
  $cat_name= mysqli_real_escape_string($conn,$_POST['cat_name']);
  $cat_desc= mysqli_real_escape_string($conn,$_POST['cat_desc']);
 if(empty($cat_name) || empty($cat_desc)){
  echo "Fill all the fields";
 }
 else{
   $sql="INSERT INTO `categories`(`cat_name`, `cat_description`) VALUES ('$cat_name', '$cat_desc')";
   $result=mysqli_query($conn,$sql);
   if($result){
    echo 1;
   }
   else{
    echo 0;
   }
  
 }
  
 


 ?> 