<?php
include('../db.php'); 
$id = $_POST['id'];
$sql = "SELECT * FROM `events` WHERE `event_id`='$id'";
$res = mysqli_query($conn, $sql);
$event = mysqli_fetch_assoc($res);
$name=mysqli_real_escape_string($conn,$_POST['name']);
$cat=mysqli_real_escape_string($conn,$_POST['cat']);
$desc=mysqli_real_escape_string($conn,$_POST['desc']);
$date=mysqli_real_escape_string($conn,$_POST['date']);
$image = $_FILES['imageFile']['name'];
 if (empty($name) || empty($cat) || empty($date) || empty($desc)) {
        echo 2;
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
            $imageSerial = $event['event_pics'];
        }
        $sql = "UPDATE `events` SET 
        `event_title`='$name',
        `event_desc`='$desc',
        `event_pics`='$imageSerial',
        `event_cat`='$cat',
        `event_date`='$date' 
        WHERE `event_id`='$id'";
        
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

?>