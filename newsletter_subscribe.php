<?php
/**
 * Lerne Adams Foundation — Newsletter Subscription Handler
 * Saves subscriber email to the newsletter_subscribers table in the 'lerne' DB.
 */
require_once __DIR__ . '/includes/connection.php';

// Handle POST request only
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = ['success' => false, 'message' => 'Please enter a valid email address.'];
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO newsletter_subscribers (email) VALUES (?) ON DUPLICATE KEY UPDATE subscribed_at = CURRENT_TIMESTAMP");
            $stmt->execute([$email]);
            $response = ['success' => true, 'message' => 'Thank you for subscribing! We will keep you updated on our work.'];
        } catch (PDOException $e) {
            error_log("Newsletter subscription error: " . $e->getMessage());
            $response = ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
        }
    }

    // Return JSON if AJAX, redirect if standard form
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $status = $response['success'] ? 'success' : 'error';
        $msg = urlencode($response['message']);
        // Redirect back to referring page with status message
        $ref = $_SERVER['HTTP_REFERER'] ?? 'index.php';
        header("Location: {$ref}?newsletter={$status}&msg={$msg}");
    }
    exit;
}

// If accessed directly via GET, redirect home
header('Location: index.php');
exit;
?>
