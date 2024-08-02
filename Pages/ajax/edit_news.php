<?php
include('../db.php'); 

$id = $_POST['id'];
$sql = "SELECT * FROM `news` WHERE `news_id`='$id'";
$res = mysqli_query($conn, $sql);
$news = mysqli_fetch_assoc($res);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $cat = mysqli_real_escape_string($conn, $_POST['cat']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $radio = mysqli_real_escape_string($conn, $_POST['exampleRadios']);
    $image = $_FILES['imageFile']['name'];

    if (empty($name) || empty($cat) || empty($radio) || empty($desc)) {
        echo "<script>alert('Fill all the fields')</script>";
    } else {
        if (!empty($image[0])) {
            $new = [];
            foreach ($image as $key => $im) {
                $arr = ['png', 'jpeg', 'jpg'];
                $exe = strtolower(pathinfo($im, PATHINFO_EXTENSION));
                if (in_array($exe, $arr)) {
                    $pic = rand(100, 500) . "." . $exe;
                    if (move_uploaded_file($_FILES['imageFile']['tmp_name'][$key], "../../uploads/" . $pic)) {
                        $new[] = $pic;
                    }
                }
            }
            $imageSerial = serialize($new);
        } else {
            $imageSerial = $news['news_pics'];
        }

        $sql = "UPDATE `news` SET 
                `news_title`='$name',
                `news_desc`='$desc',
                `news_pics`='$imageSerial',
                `news_cat`='$cat',
                `news_status`='$radio' 
                WHERE `news_id`='$id'";
        
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

?>