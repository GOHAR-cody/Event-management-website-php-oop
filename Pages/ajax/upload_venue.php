<?php  
 include('../db.php');
 
  $ven_name= mysqli_real_escape_string($conn,$_POST['ven_name']);
  $ven_desc= mysqli_real_escape_string($conn,$_POST['ven_desc']);
 if(empty($ven_name) || empty($ven_desc)){
  echo "Fill all the fields";
 }
 else{
   $sql="INSERT INTO `venue`(`venue_name`, `venue_desc`) VALUES ('$ven_name', '$ven_desc')";
   $result=mysqli_query($conn,$sql);
   if($result){
    echo 1;
   }
   else{
    echo 1;
   }
 }
  

 ?> 