<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $customer_type = htmlspecialchars($_POST['customer_type'] ?? 'Not provided');
    $house_type = htmlspecialchars($_POST['house_type'] ?? 'Not provided');
    $interior_type = htmlspecialchars($_POST['interior_type'] ?? 'Not provided');
    $sqft = htmlspecialchars($_POST['sqft'] ?? 'Not provided');
    $message = htmlspecialchars($_POST['message']);

    // Validate required fields
    if (empty($name) || empty($phone) || empty($email)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Email recipient (change this to your email)
    $to = "liveinteria@gmail.com";

    // Email subject
    $subject = "New Contact Form Submission from $name";

    // Email body
    $body = "You have received a new submission:\n\n";
    $body .= "Name: $name\n";
    $body .= "Phone: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Customer Type: $customer_type\n";
    $body .= "House Type: $house_type\n";
    $body .= "Interior Type: $interior_type\n";
    $body .= "Sq. Ft.: $sqft\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\r\nReply-To: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Success! Your message has been sent.";
    } else {
        echo "Error: Unable to send email.";
    }
}
?>
