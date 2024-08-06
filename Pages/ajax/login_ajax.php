<?php
 include('../db.php'); 
 session_start();
 $mail= mysqli_real_escape_string($conn,$_POST['mail']);
 $password= mysqli_real_escape_string($conn,$_POST['password']);
if(empty($mail) || empty($password)){
 echo 2;
}
else{
  $sql = "
  SELECT 'planner' AS source FROM planner WHERE planner_mail = '$mail' AND planner_status = 'pending'
  UNION
  SELECT 'designer' AS source FROM designer WHERE designer_mail = '$mail' AND designer_exampleRadios= 'pending'
  UNION
  SELECT 'volunteer' AS source FROM volunteer WHERE volunteer_mail = '$mail' AND volunteer_exampleRadios = 'pending'
";
$res=mysqli_query($conn,$sql);
if (mysqli_num_rows($res)>0){
  echo 3;
}

else{
  $sql="SELECT * FROM `login_users` WHERE `login_mail`='$mail' AND `login_pass` ='$password'";
  $result=mysqli_query($conn,$sql);
  $num= mysqli_fetch_assoc($result);
  if($num>=1){
   echo 1;
  
   $_SESSION['mail']=$mail;
   $_SESSION['role']=$num['login_role'];
  
   
  }
  else{
   echo 0;
  }
 
}
}
 





?>