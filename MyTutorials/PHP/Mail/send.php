<?php 

require_once('class.phpmailer.php');

$mail             = new PHPMailer(); // defaults to using php "mail()"

$body             = file_get_contents('templates/basic.html');
$body             = eregi_replace("[\]",'',$body);

$mail->AddReplyTo("ashok.jadhav@wwindia.com","First Last");

$mail->SetFrom('ashok.jadhav@wwindia.com', 'First Last');

$mail->AddReplyTo("ashok.jadhav@wwindia.com","First Last");

$address = "ashok.jadhav@wwindia.com";
$mail->AddAddress($address, "John Doe");

$mail->Subject    = "PHPMailer Test Subject via mail(), basic";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$mail->AddAttachment("demoform1.pdf");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
?>    