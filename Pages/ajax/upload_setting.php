<?php 
include('../db.php'); 

// Fetch existing image names from the database
$sql="SELECT * FROM `images`";
$res=mysqli_query($conn,$sql);
$ar=mysqli_fetch_assoc($res);

// Get uploaded image names
$profile_pic= $_FILES['img_prof']['name'];
$logo_pic=$_FILES['img_logo']['name'];

$arr = array('png', 'jpeg', 'jpg');

// Process profile picture
$exe = strtolower(pathinfo($profile_pic, PATHINFO_EXTENSION));
if(in_array($exe, $arr) ){
    $profile = rand(100,500).".".$exe;
} else {
    $profile = $ar['img_profile'];
}

// Process logo picture
$exe1 = strtolower(pathinfo($logo_pic, PATHINFO_EXTENSION));
if(in_array($exe1, $arr)){
    $logo = rand(100,500).".".$exe1;
} else {
    $logo = $ar['img_logo'];
}


if (!empty($profile_pic) && file_exists("../../uploads/" . $ar['img_profile'])) {
    unlink("../../uploads/" . $ar['img_profile']);
}
if (!empty($logo_pic) && file_exists("../../uploads/" . $ar['img_logo'])) {
    unlink("../../uploads/" . $ar['img_logo']);
}


$sql="UPDATE `images` SET `img_profile`='$profile', `img_logo`='$logo'";
$result=mysqli_query($conn,$sql);

if($result){
    echo 1;
    // Move the uploaded files to the server directory
    if(!empty($profile_pic)){
        move_uploaded_file($_FILES['img_prof']['tmp_name'], "../../uploads/" . $profile);
    }
    if(!empty($logo_pic)){
        move_uploaded_file($_FILES['img_logo']['tmp_name'], "../../uploads/" . $logo);
    }
} else {
    echo 0;
}

?>