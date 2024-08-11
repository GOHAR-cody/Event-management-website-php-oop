<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';
include('../db.php');

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$receiver = mysqli_real_escape_string($conn, $_POST['name']);
$contact = mysqli_real_escape_string($conn, $_POST['phone']);
$email = mysqli_real_escape_string($conn, $_POST['mail']);
$body = mysqli_real_escape_string($conn, $_POST['desc']);

if(empty($receiver)||empty($mail)||empty($body)){
    echo 0;
}
else{

try {
    $mail->isSMTP();            
                                //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'goharfatimaali7@gmail.com';                     //SMTP username
    $mail->Password   = 'rejn yspw lpnt oybs';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('goharfatimaali7@gmail.com', 'Eventor');
    $mail->addAddress($email, $receiver);     //Add a recipient            //Name is optional
    $mail->addReplyTo('goharfatimaali7@gmail.com', 'Eventor');
   
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = $body;

    $mail->send();
    echo 1;
} catch (Exception $e) {
    echo 2;
}
}
?>