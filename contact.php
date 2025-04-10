<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $business_email = $_POST['business-email'];
    $alt_email = $_POST['alt-email'];
    $phone_number = $_POST['phone-number'];
    $company = $_POST['company'];
    $project_description = $_POST['project-description'];

    // Define the email address to which the message will be sent
    $to = "info@technopick.net"; // Replace with your email
    $subject = "New Contact Form Submission from $first_name $last_name";

    // Create the email content
    $message = "
    Name: $first_name $last_name\n
    Business Email: $business_email\n
    Alternative Email: $alt_email\n
    Phone Number: $phone_number\n
    Company: $company\n
    Project Description: $project_description
    ";

    // Send the email
    $headers = "From: $business_email\r\n";
    $headers .= "Reply-To: $business_email\r\n";

    // Send the email using the mail() function
    if (mail($to, $subject, $message, $headers)) {
        // Success: Redirect to home page or show success message
        header("Location: index.html?success=1");
        exit();
    } else {
        // Failure: Redirect to error page or show error message
        echo "There was an error sending your message.";
    }
}
?>
