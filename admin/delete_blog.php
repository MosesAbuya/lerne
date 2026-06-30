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
    // Fetch photos to delete them from server
    $stmt = $pdo->prepare("SELECT photo, other_photos FROM products WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();
    
    if ($row) {
        // Delete main photo
        if (!empty($row['photo'])) {
            $mainPhotoPath = '../images/' . trim($row['photo']);
            if (file_exists($mainPhotoPath)) unlink($mainPhotoPath);
        }
        
        // Delete other photos
        if (!empty($row['other_photos'])) {
            $images = json_decode($row['other_photos'], true);
            if (is_array($images)) {
                foreach($images as $img) {
                    $filePath = '../images/' . trim($img);
                    if (file_exists($filePath)) unlink($filePath);
                }
            }
        }
    }

    $deleteStmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
    $deleteStmt->execute(['id' => $id]);
    
    echo json_encode(['status' => 'success', 'message' => 'Story deleted successfully.']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error.']);
}
?>
