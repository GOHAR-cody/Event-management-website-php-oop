<?php
include('../db.php');
$id=mysqli_real_escape_string($conn,$_POST['id']);
$que = "SELECT * FROM `designer` WHERE `designer_id`='$id'";
$res = mysqli_query($conn, $que);
$designer = mysqli_fetch_assoc($res);
$name=mysqli_real_escape_string($conn,$_POST['name']);
$mail=mysqli_real_escape_string($conn,$_POST['mail']);
$dob=mysqli_real_escape_string($conn,$_POST['dob']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$desc=mysqli_real_escape_string($conn,$_POST['desc']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$exp=mysqli_real_escape_string($conn,$_POST['experience']);
$ordered=mysqli_real_escape_string($conn,$_POST['ordered']);
$company=mysqli_real_escape_string($conn,$_POST['company']);
$color=mysqli_real_escape_string($conn,$_POST['color']);
$tools=mysqli_real_escape_string($conn,$_POST['tools']);
$content=mysqli_real_escape_string($conn,$_POST['content']);
$number=mysqli_real_escape_string($conn,$_POST['number']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
$address2=mysqli_real_escape_string($conn,$_POST['address2']);
$img=$_FILES['img']['name'];
$pwd2=mysqli_real_escape_string($conn,$_POST['pwd2']);
$radio=mysqli_real_escape_string($conn,$_POST['exampleRadios']);
if(empty($name)||empty($mail)||empty($dob)||empty($phone)||empty($desc)||empty($gender)||empty($ordered)||empty($city)
|| empty($exp)||empty($company)||empty($color)||empty($tools)||empty($content)||empty($number)||empty($pwd)||empty($address2)||empty($pwd2)||empty($radio))
{
  echo "<script>alert('fill all the fields')</script>";
}
else {
    if($pwd==$pwd2){
        if (!empty($img)) {
            $oldImage = $designer['designer_img'];
              $arr = array('png', 'jpeg', 'jpg');
              $exe = strtolower(pathinfo($img, PATHINFO_EXTENSION));
              if (in_array($exe, $arr)) {
                  $pic = rand(100, 500) . "." . $exe;
                  if (file_exists("../../uploads/" . $oldImage)) {
                    unlink("../../uploads/" . $oldImage); 
                    
                }
                    $sql = "UPDATE `designer` SET
                        `designer_name` = '$name', 
                        `designer_mail` = '$mail', 
                        `designer_dob` = '$dob', 
                        `designer_gender` = '$gender', 
                        `designer_phone` = '$phone', 
                        `designer_desc` = '$desc', 
                        `designer_city` = '$city', 
                        `designer_experience` = '$exp', 
                        `designer_ordered` = '$ordered', 
                        `designer_company` = '$company', 
                        `designer_color` = '$color', 
                        `designer_tools` = '$tools', 
                        `designer_content` = '$content', 
                        `designer_number` = '$number', 
                        `designer_pwd` = '$pwd', 
                        `designer_address2` = '$address2', 
                        `designer_img` = '$pic', 
                        `designer_exampleRadios` = '$radio'
                    WHERE `designer_id` = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo 1;
                move_uploaded_file($_FILES['img']['tmp_name'], "../../uploads/" . $pic);
                
            } else {
                echo 0;
            }
        } else {
            echo 2;
        }
    } else {
        $pic = $designer['designer_img'];
        
        $sql = "UPDATE `designer` SET
        `designer_name` = '$name', 
        `designer_mail` = '$mail', 
        `designer_dob` = '$dob', 
        `designer_gender` = '$gender', 
        `designer_phone` = '$phone', 
        `designer_desc` = '$desc', 
        `designer_city` = '$city', 
        `designer_experience` = '$exp', 
        `designer_ordered` = '$ordered', 
        `designer_company` = '$company', 
        `designer_color` = '$color', 
        `designer_tools` = '$tools', 
        `designer_content` = '$content', 
        `designer_number` = '$number', 
        `designer_img` = '$pic', 
        `designer_pwd` = '$pwd', 
        `designer_address2` = '$address2', 
        `designer_exampleRadios` = '$radio'
    WHERE `designer_id` = '$id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo 1;
    
} else {
    echo 0;
}
}
} else {
echo 2;
}
}

?>