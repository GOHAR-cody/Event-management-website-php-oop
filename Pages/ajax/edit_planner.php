<?php

include('../db.php');  
$id = mysqli_real_escape_string($conn, $_POST['id']);
$que = "SELECT * FROM `planner` WHERE `planner_id`='$id'";
$res = mysqli_query($conn, $que);
$planner = mysqli_fetch_assoc($res);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $exp = mysqli_real_escape_string($conn, $_POST['experience']);
    $achi = mysqli_real_escape_string($conn, $_POST['achievements']);
    $skill = mysqli_real_escape_string($conn, $_POST['skills']);
    $partner = mysqli_real_escape_string($conn, $_POST['partners']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $address2 = mysqli_real_escape_string($conn, $_POST['address2']);
    $img = $_FILES['img']['name'];
    $pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);
    $radio = mysqli_real_escape_string($conn, $_POST['exampleRadios']);

    if (empty($name) || empty($mail) || empty($dob) || empty($phone) || empty($desc) || empty($city)
        || empty($exp) || empty($achi) || empty($skill) || empty($partner) || empty($pwd) || empty($address2) || empty($pwd2) || empty($radio)) {
        echo "<script>alert('Fill all the fields')</script>";
    } else {
        if ($pwd == $pwd2) {
            // Check if there's a new image uploaded
            if (!empty($img)) {
              $oldImage = $planner['planner_pic'];
                $arr = array('png', 'jpeg', 'jpg');
                $exe = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                if (in_array($exe, $arr)) {
                    $pic = rand(100, 500) . "." . $exe;
                    if (file_exists("../../uploads/" . $oldImage)) {
                      unlink("../../uploads/" . $oldImage); 
                      
                  }
                    $sql = "UPDATE `planner` SET  
                        `planner_name`='$name', 
                        `planner_mail`='$mail', 
                        `planner_dob`='$dob', 
                        `planner_phone`='$phone', 
                        `planner_desc`='$desc',  
                        `planner_city`='$city', 
                        `planner_exp`='$exp', 
                        `planner_achi`='$achi',
                        `planner_skills`='$skill', 
                        `planner_partner`='$partner', 
                        `planner_pwd`='$pwd', 
                        `planner_address`='$address2', 
                        `planner_pic`='$pic', 
                        `planner_status`='$radio' 
                        WHERE `planner_id`='$id'";
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
                // No new image uploaded, use existing image path
                $pic = $planner['planner_pic'];
                $sql = "UPDATE `planner` SET  
                        `planner_name`='$name', 
                        `planner_mail`='$mail', 
                        `planner_dob`='$dob', 
                        `planner_phone`='$phone', 
                        `planner_desc`='$desc', 
                        `planner_city`='$city', 
                        `planner_exp`='$exp', 
                        `planner_achi`='$achi',
                        `planner_skills`='$skill', 
                        `planner_partner`='$partner', 
                        `planner_pwd`='$pwd', 
                        `planner_address`='$address2', 
                        `planner_pic`='$pic', 
                        `planner_status`='$radio' 
                        WHERE `planner_id`='$id'";
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