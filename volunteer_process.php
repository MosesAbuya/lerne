<?php
require_once 'includes/connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = filter_var($_POST['first-name'] ?? '', FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['last-name'] ?? '', FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'] ?? '', FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'] ?? '', FILTER_SANITIZE_STRING);
    $age = (int)($_POST['age'] ?? 0);
    $gender = filter_var($_POST['gender'] ?? '', FILTER_SANITIZE_STRING);
    $interests = filter_var($_POST['interests'] ?? '', FILTER_SANITIZE_STRING);

    if ($firstName && $lastName && $email && $phone && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO volunteers (first_name, last_name, email, phone, address, age, gender, interests) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$firstName, $lastName, $email, $phone, $address, $age, $gender, $interests]);
            
            echo json_encode(['status' => 'success', 'message' => 'Thank you for your application! We will contact you soon.']);
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Database error. Please try again later.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields correctly.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
