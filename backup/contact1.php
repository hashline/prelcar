
		  
		  <?php
if ($_SERVER["REQUEST_METHOD"] == "post") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
 echo "kjhkjashjkdkas";
    // Set up email variables
    $to = "rajesh1976@hotmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $headers = "From: $name <$email>" . "\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your message. We will contact you shortly.";
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>
	  
