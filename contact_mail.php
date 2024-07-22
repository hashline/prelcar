<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'PHPMailer.php';
    require 'SMTP.php';
    require 'Exception.php';

$mail = new PHPMailer;

$mail->IsSMTP();                                      

$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPDebug = 2;
$mail->Username = ''; 
$mail->Password = ''; 
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->From = 'hashlineinfo@gmail.com';
$mail->FromName = $_POST["name"];
$mail->AddAddress('hashlineinfo@gmail.com');  

$mail->IsHTML(true);                          

$mail->Subject = "Contact Enquery - ".$_POST["subject"];

$mail->Body    ='<html>
                    <head>
                        <title>Contact Enquery - '.$_POST["name"].'</title>
                    </head>
                    <body>
                        <table style="vertical-align: bottom;border-bottom: 2px solid #E3EBF3;border-top: 1px solid #E3EBF3;" cellspacing="3" width="90%">
                            <tr>
                                <td>Name</td>
                                <td>: '.$_POST["name"].'</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: '.$_POST["email"].'</td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td>: '.$_POST["subject"].'</td>
                            </tr>
                            <tr>
                                <td>Message</td>
                                <td>: '.$_POST["message"].'</td>
                            </tr>
                        </table>
                    </body>
                </html>';
$mail->AltBody = '';

if(!$mail->Send()) {
	print_r($mail);
   echo "<p class='Error'>Message could not be sent.</p>";
   echo "<p class='Error'>Mailer Error: " . $mail->ErrorInfo."</p>";
   exit;
}

echo "<p class='success'>Contact Mail Sent.</p>";

} else {
    echo "Invalid request.";
}
?>
