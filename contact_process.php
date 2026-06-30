<?php
// Include the database connection
include 'includes/connection.php';
require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and validate inputs
    $message = !empty($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';
    $name = !empty($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $email = !empty($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) : '';
    $subject = !empty($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : '';

    // Validate inputs
    if (empty($message) || empty($name) || empty($email) || empty($subject)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    // Insert data into the database
    try {
        // Prepare the SQL query
        $stmt = $connection->prepare("INSERT INTO contact (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subject, $message]);

        // Send an email notification to info@barriziorganizationkenya.org
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'mail.barriziorganizationkenya.org';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@barriziorganizationkenya.org';
        $mail->Password = 'Barriziinfo1admin@';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Set the email sender and recipient
        $mail->setFrom($email, $name); // Send email from the user's email and name
        $mail->addAddress('info@barriziorganizationkenya.org'); // Send a copy to the organization

        // Set email content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission: ' . $subject;
        $mail->Body = "
            <p>You have received a new contact form submission.</p>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong> $message</p>
        ";

        // Send the email
        $mail->send();

        // Return success response
        echo json_encode(['status' => 'success', 'message' => 'Your message has been sent successfully.']);
    } catch (PDOException $e) {
        // Return error response
        echo json_encode(['status' => 'error', 'message' => 'Something went wrong. Please try again.']);
    } catch (Exception $e) {
        // Handle errors for email sending
        echo json_encode(['status' => 'error', 'message' => 'Failed to send email notification.']);
    }
}
?>
