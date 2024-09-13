<?php


require("class.phpmailer.php");


$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
//$mail->Host = "mail.elgo.co.in";                 // Specify main and backup server
$mail->Host = "103.93.16.21";                 // If the above does not work.
$mail->Port = 25;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "admin@elgo.co.in";                // SMTP username
$mail->Password = "icom@oss_2023";                  // SMTP password
$mail->SMTPSecure = "ssl";                            // Enable encryption, 'ssl' also accepted

$mail->From = 'admin@elgo.co.in';
$mail->FromName = $_POST["name"];
$mail->AddAddress('rajesh1976@hotmail.com');  // Add a recipient

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = "Contact Enquery - ".$_POST["subject"];
//$mail->Body    = $_POST["message"];
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
exit(0);?>
