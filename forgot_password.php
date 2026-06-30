<?php


session_start();
include 'includes/connection.php';
require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Handle JSON input
$data = json_decode(file_get_contents('php://input'), true);
$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['message' => 'Invalid email address.']);
    exit();
}

try {
    // Check if email exists
    $stmt = $connection->prepare("SELECT id FROM members WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        echo json_encode(['message' => 'Email not found.']);
        exit();
    }

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $userId = $user['id'];

    // Generate reset token
    $token = bin2hex(random_bytes(32));
    $expires = date('Y-m-d H:i:s', strtotime('+10 minutes'));

    // Save token to database
    $stmt = $connection->prepare("INSERT INTO password_resets (user_id, token, expires_at) VALUES (:user_id, :token, :expires)");
    $stmt->execute([
        ':user_id' => $userId,
        ':token' => $token,
        ':expires' => $expires
    ]);

    // Send Email with PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'mail.barriziorganizationkenya.org';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@barriziorganizationkenya.org';
    $mail->Password = 'Barriziinfo1admin@';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('info@barriziorganizationkenya.org', 'Barrizi Organization Kenya');
    $mail->addAddress($email);

    $resetLink = "https://barriziorganizationkenya.org/password_reset.php?token=$token";

    $mail->isHTML(true);
    $mail->Subject = 'Password Reset';
    $mail->Body = "Click <a href='$resetLink'>here</a> to reset your password. This link will expire in 10 minutes.";

    $mail->send();

    echo json_encode(['message' => 'Password reset email sent.']);

} catch (Exception $e) {
    echo json_encode(['message' => 'Failed to send email.']);
}
?>
