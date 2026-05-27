<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = isset($_POST['first_name']) ? htmlspecialchars(trim($_POST['first_name'])) : '';
    $lastName  = isset($_POST['last_name']) ? htmlspecialchars(trim($_POST['last_name'])) : '';
    $email     = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $message   = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

    // Check empty fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($message)) {
        die("All fields are required.");
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    $to = "mh60426853@gmail.com";
    $subject = "New Contact Form Message";

    $body = "First Name: $firstName\n";
    $body .= "Last Name: $lastName\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    $headers = "From: noreply@yourwebsite.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message failed to send.";
    }

} else {
    echo "Invalid request.";
}

?>
