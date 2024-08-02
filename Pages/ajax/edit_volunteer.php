<?php
   include('../db.php'); 
   $id = mysqli_real_escape_string($conn, $_POST['id']);
   $que = "SELECT * FROM `volunteer` WHERE `volunteer_id`='$id'";
$res = mysqli_query($conn, $que);
$volunteer = mysqli_fetch_assoc($res);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $exp = mysqli_real_escape_string($conn, $_POST['experience']);
    $occ = mysqli_real_escape_string($conn, $_POST['occasions']);
    $achi = mysqli_real_escape_string($conn, $_POST['achievements']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $address2 = mysqli_real_escape_string($conn, $_POST['address2']);
    $img = $_FILES['img']['name'];
    $pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);
    $radio = mysqli_real_escape_string($conn, $_POST['exampleRadios']);

    if (empty($name) || empty($mail) || empty($dob) || empty($phone) || empty($desc) || empty($gender) || empty($occ) || empty($city)
        || empty($exp) || empty($achi) || empty($skills) || empty($pwd) || empty($address2) || empty($pwd2) || empty($radio)) {
        echo 3;
    } else {
        if ($pwd == $pwd2) {
            if (!empty($img)) {
                $oldImage = $volunteer['volunteer_img'];
                $arr = array('png', 'jpeg', 'jpg');
                $exe = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                if (in_array($exe, $arr)) {
                    $pic = rand(100, 500) . "." . $exe;
                    if (file_exists("../../uploads/" . $oldImage)) {
                        unlink("../../uploads/" . $oldImage);
                    }
                    $sql = "UPDATE `volunteer` SET 
                                `volunteer_name` = '$name', 
                                `volunteer_mail` = '$mail', 
                                `volunteer_dob` = '$dob', 
                                `volunteer_gender` = '$gender', 
                                `volunteer_phone` = '$phone', 
                                `volunteer_desc` = '$desc', 
                                `volunteer_city` = '$city', 
                               ` volunteer_experience` = '$exp', 
                                `volunteer_occasions` = '$occ', 
                                `volunteer_achievements` = '$achi', 
                                `volunteer_skills` = '$skills', 
                                `volunteer_pwd` = '$pwd', 
                                `volunteer_address2` = '$address2', 
                                `volunteer_img` = '$pic', 
                                `volunteer_exampleRadios` = '$radio' 
                            WHERE `volunteer_id` = $id";

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
                $pic = $volunteer['volunteer_img'];
                $sql = "UPDATE `volunteer` SET 
                            `volunteer_name` = '$name', 
                            `volunteer_mail` = '$mail', 
                            `volunteer_dob` = '$dob', 
                            `volunteer_gender` = '$gender', 
                            `volunteer_phone` = '$phone', 
                            `volunteer_desc` = '$desc', 
                            `volunteer_city` = '$city', 
                            `volunteer_experience` = '$exp', 
                            `volunteer_occasions` = '$occ', 
                            `volunteer_achievements` = '$achi', 
                            `volunteer_skills` = '$skills', 
                            `volunteer_pwd` = '$pwd', 
                            `volunteer_address2` = '$address2', 
                            `volunteer_img` = '$pic', 
                            `volunteer_exampleRadios` = '$radio' 
                        WHERE `volunteer_id` = $id";

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
