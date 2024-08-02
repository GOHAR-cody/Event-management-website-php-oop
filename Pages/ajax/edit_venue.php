<?php  
include('../db.php');
 $id = $_POST['id'];
  $ven_name= mysqli_real_escape_string($conn,$_POST['ven_name']);
  $ven_desc= mysqli_real_escape_string($conn,$_POST['ven_desc']);
 if(empty($ven_name) || empty($ven_desc)){
  echo "Fill all the fields";
 }
 else{
   $sql="UPDATE `venue`SET `venue_name`='$ven_name', `venue_desc`= '$ven_desc' WHERE `venue_id`='$id'";
   $result=mysqli_query($conn,$sql);
   if($result){
    echo 1;
   }
   else{
    echo 0;;
   }
 }
  



 ?> 