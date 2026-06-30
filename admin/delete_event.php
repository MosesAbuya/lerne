<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit();
}

require_once '../includes/connection.php';
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing ID']);
    exit();
}

$id = (int)$data['id'];

try {
    $stmt = $pdo->prepare("SELECT photo FROM events WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();
    
    if ($row && !empty($row['photo'])) {
        $photoPath = '../images/' . trim($row['photo']);
        if (file_exists($photoPath)) unlink($photoPath);
    }

    $deleteStmt = $pdo->prepare("DELETE FROM events WHERE id = :id");
    $deleteStmt->execute(['id' => $id]);
    
    echo json_encode(['status' => 'success', 'message' => 'Event deleted successfully.']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error.']);
}
?>
