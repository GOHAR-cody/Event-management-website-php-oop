<?php
 include('../db.php'); 
 
 $mail= mysqli_real_escape_string($conn,$_POST['mail']);
 $password= mysqli_real_escape_string($conn,$_POST['password']);
if(empty($mail) || empty($password)){
 echo 2;
}
else{
  $sql="SELECT * FROM `login_users` WHERE `login_mail`='$mail' AND `login_pass` ='$password'";
  $result=mysqli_query($conn,$sql);
  $num= mysqli_fetch_assoc($result);
  if($num>=1){
   echo 1;
   session_start();
   $_SESSION['mail']=$mail;
   $_SESSION['role']=$num['login_role'];
   
  }
  else{
   echo 0;
  }
 
}
 





?>