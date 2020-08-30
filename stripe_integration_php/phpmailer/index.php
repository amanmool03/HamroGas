<?php
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
$mail->Subject ="Test Using PHPMailer";
$mail->setFrom("manishagora52@gmail.com");

$mail->isHTML(true);
$mail->addAttachment('img/tick.png');
$mail->Body ="<h1>This is h1 html heading </h1></br><p>This is html paragraph..</p>";

// $mail->Body= "This is plain text email body";
$mail->addAddress("manishagora52@gmail.com");
$mail->SMTPDebug =1;

if($mail->Send())
{
	echo "Email Sent..!";
}
else
{
	echo "Error";
}
$mail->smtpClose();




?>