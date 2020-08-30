<?php

// ------------------generate otp code------------


// $otp=random_int(100000, 999999);

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host ="smtp.gmail.com";
$mail->SMTPAuth ="true";
$mail->SMTPSecure ="tls";
$mail->Port ="587";
$mail->Username ="manishagora52@gmail.com";
$mail->Password="cupcake07";
$mail->Subject ="Code to verify your email address";
$mail->setFrom("manishagora52@gmail.com");

$mail->isHTML(true);



?>