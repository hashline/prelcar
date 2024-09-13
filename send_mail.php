<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'PHPMailer.php';
    require 'SMTP.php';
    require 'Exception.php';

    $name = htmlspecialchars(trim($_POST['Name']));
    $mobile = htmlspecialchars(trim($_POST['Contact']));
    $email = htmlspecialchars(trim($_POST['Mail']));
    $description = htmlspecialchars(trim($_POST['Description']));

    $mail = new PHPMailer(true);

    // Recipient email
    $to = "prelcar@prabhaengineers.com"; // Replace with your email address

    // Subject of the email
    $subject = "New Product Inquiry from " . $name;

    // HTML message
    $message = "
    <html>
    <head>
      <title>New Product Inquiry</title>
      <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f4f4f4; }
      </style>
    </head>
    <body>
      <h2>New Product Inquiry</h2>
      <p>You have received a new inquiry. The details are as follows:</p>
      <table>
        <tr>
          <th>Name</th>
          <td>{$name}</td>
        </tr>
        <tr>
          <th>Mobile</th>
          <td>{$mobile}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{$email}</td>
        </tr>
        <tr>
          <th>Description</th>
          <td>{$description}</td>
        </tr>
      </table>
      <br>
      <p>Regards,<br>Hashline Software Solutions</p>
    </body>
    </html>";

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 2;
        $mail->Username = 'hashlineinfo@gmail.com';
        $mail->Password = 'myuvoiagfcamzskz';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('hashlineinfo@gmail.com', 'hashline');
        $mail->addAddress('prelcar@prabhaengineers.com', 'Prelcar');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo "Email sent successfully for {$name}!";
    } catch (Exception $e) {
        echo "Email sending failed: {$e}";
    }
} else {
    echo "Invalid request.";
}
?>