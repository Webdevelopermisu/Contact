<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$firstName = htmlspecialchars($_POST['first_name']);
$lastName = htmlspecialchars($_POST['last_name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);
// Email where messages will be sent
$to = "mh60426853@gmail.com";
$subject = "New Contact Form Message";
$body = "First Name: $firstName\n";
$body .= "Last Name: $lastName\n";
$body .= "Email: $email\n\n";
$body .= "Message:\n$message";
$headers = "From: $email";
if(mail($to, $subject, $body, $headers)) {
echo "Message sent successfully!";
} else {
echo "Message failed to send.";
}
}
?>
