<?php
$errorMSG = "";

// Validate and sanitize name input
if (empty($_POST["name"])) {
    $errorMSG .= "Name is required. ";
} else {
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
}

// Validate and sanitize email input
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required. ";
} else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMSG .= "Invalid email format. ";
    }
}

// Validate and sanitize message input
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required. ";
} else {
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
}

// Check if there are any errors
if (empty($errorMSG)) {
    $toEmail = "sales@digikyar.org";
    $subject = "New message from SALES digikyar";

    // Prepare email body text
    $body = "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Message: " . $message . "\n";

    // Set additional email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Send the email
    if (mail($toEmail, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "Something went wrong while sending the email.";
    }
} else {
    echo $errorMSG;
}
?>
