<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set the recipient email address
        $to = 'kamohelommotaung889@gmail.com'; // Replace with your email address

        // Set the email subject
        $subject = 'New Contact Form Submission';

        // Build the email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers
        $email_headers = "From: $name <$email>";

        // Send the email
        if (mail($to, $subject, $email_content, $email_headers)) {
            // Redirect to a thank you page (or show a success message)
            echo "Thank you for your message!";
        } else {
            // Redirect to an error page (or show an error message)
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
    } else {
        // Invalid email address
        echo "Invalid email address.";
    }
} else {
    // Accessing the script directly is not allowed
    echo "There was a problem with your submission, please try again.";
}
?>
