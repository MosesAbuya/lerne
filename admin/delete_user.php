<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit();
}

require_once '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    
    if ($id == $_SESSION['user_id']) {
        echo json_encode(['status' => 'error', 'message' => 'You cannot delete yourself.']);
        exit();
    }

    try {
        $stmt = $pdo->prepare("SELECT photo FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        
        if ($user && !empty($user['photo'])) {
            $filePath = '../images/' . trim($user['photo']);
            if (file_exists($filePath)) unlink($filePath);
        }

        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        echo json_encode(['status' => 'success', 'message' => 'User deleted successfully']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error during deletion']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
