<?php
 include('../db.php');
$name=mysqli_real_escape_string($conn,$_POST['name']);
$mail=mysqli_real_escape_string($conn,$_POST['mail']);
$dob=mysqli_real_escape_string($conn,$_POST['dob']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$desc=mysqli_real_escape_string($conn,$_POST['desc']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$exp=mysqli_real_escape_string($conn,$_POST['experience']);
$occ=mysqli_real_escape_string($conn,$_POST['occasions']);
$achi=mysqli_real_escape_string($conn,$_POST['achievements']);
$skills=mysqli_real_escape_string($conn,$_POST['skills']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
$address2=mysqli_real_escape_string($conn,$_POST['address2']);
$img=$_FILES['img']['name'];
$pwd2=mysqli_real_escape_string($conn,$_POST['pwd2']);
$radio=mysqli_real_escape_string($conn,$_POST['exampleRadios']);
if(empty($name)||empty($mail)||empty($dob)||empty($phone)||empty($desc)||empty($gender)||empty($occ)||empty($city)
|| empty($exp)||empty($achi)||empty($skills)||empty($pwd)||empty($address2)||empty($img)||empty($pwd2)||empty($radio))
{
  echo 4;
}
else {
    // Check if the email already exists in any of the three tables
    $checkEmailQuery = "
    SELECT 'planner' AS source FROM planner WHERE planner_mail = '$mail'
    UNION
    SELECT 'designer' AS source FROM designer WHERE designer_mail = '$mail'
    UNION
    SELECT 'volunteer' AS source FROM volunteer WHERE volunteer_mail = '$mail'
";
$emailResult = mysqli_query($conn, $checkEmailQuery);

if (mysqli_num_rows($emailResult) > 0) {
   
    echo 3;
} 
else {
    if($pwd==$pwd2){
    $arr = array('png', 'jpeg', 'jpg');
   $exe = strtolower(pathinfo($img, PATHINFO_EXTENSION));
   if(in_array($exe, $arr)){
   $pic= rand(100,500).".".$exe;
   $sql = "INSERT INTO `volunteer` (
    `volunteer_name`, 
    `volunteer_mail`, 
    `volunteer_dob`, 
    `volunteer_gender`, 
    `volunteer_phone`, 
    `volunteer_desc`, 
    `volunteer_city`, 
    `volunteer_experience`, 
    `volunteer_occasions`, 
    `volunteer_achievements`, 
    `volunteer_skills`, 
    `volunteer_pwd`, 
    `volunteer_address2`, 
    `volunteer_img`, 
    `volunteer_exampleRadios`
) VALUES (
    '$name', 
    '$mail', 
    '$dob', 
    '$gender', 
    '$phone', 
    '$desc', 
    '$city', 
    '$exp', 
    '$occ', 
    '$achi', 
    '$skills', 
    '$pwd', 
    '$address2', 
    '$pic', 
    '$radio'
)";
if($radio == 'confirm'){
    $sql="INSERT INTO `login_users`(`login_name`, `login_mail`, `login_pass`,`login_role`) VALUES ('$name','$mail', '$pwd', 3)";
    $res=mysqli_query($conn,$sql);
   
}

    $result=mysqli_query($conn, $sql);
    if($result) {
        echo 1;
        move_uploaded_file($_FILES['img']['tmp_name'], "../../uploads/" . $pic);
    } else {
        echo 0;
    }
}
    }
else{
    echo 2;
}

}
}

?>