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
    // Optional: fetch images to delete them from server
    $stmt = $pdo->prepare("SELECT images FROM gallery WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();
    
    if ($row && !empty($row['images'])) {
        $images = explode(',', $row['images']);
        foreach($images as $img) {
            $filePath = '../images/gallery/' . trim($img);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }

    $deleteStmt = $pdo->prepare("DELETE FROM gallery WHERE id = :id");
    $deleteStmt->execute(['id' => $id]);
    
    echo json_encode(['status' => 'success', 'message' => 'Gallery deleted successfully.']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error.']);
}
?>
