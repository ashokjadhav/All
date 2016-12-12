<?php
//The mail() function allows you to send emails directly from a script. Remember, that most of shared hosting providers require (for security reasons) to use the domain name of your hosting in "FROM" email, e.g. from@yourdomain.com for http://yourdomain.com site. 

$to = 'myfriend@gmail.com';
$subject = 'Test Email';
$body = 'Body of your message here. You can use HTML tags also, e.g. <br><b>Bold</b>';
$headers = 'From: John Smith'."\r\n";
$headers .= 'Reply-To: from@email.me'."\r\n";
$headers .= 'Return-Path: from@email.me'."\r\n";
$headers .= 'X-Mailer: PHP5'."\n";
$headers .= 'MIME-Version: 1.0'."\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
mail($to, $subject, $body, $headers);
?>
