<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit();
}

require_once '../includes/connection.php';

// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || !isset($data['image_name']) || !isset($data['type'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
    exit();
}

$id = (int)$data['id'];
$image_name = basename($data['image_name']); // sanitize path
$type = $data['type']; // 'gallery' or 'blog' or 'event'

try {
    if ($type === 'gallery') {
        $stmt = $pdo->prepare("SELECT images FROM gallery WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        
        if ($row) {
            $currentImages = explode(',', $row['images']);
            $newImages = array_filter($currentImages, function($img) use ($image_name) {
                return trim($img) !== $image_name;
            });
            $newImagesString = implode(',', $newImages);
            
            $updateStmt = $pdo->prepare("UPDATE gallery SET images = :images WHERE id = :id");
            $updateStmt->execute(['images' => $newImagesString, 'id' => $id]);
            
            $filePath = '../images/gallery/' . $image_name;
            if (file_exists($filePath)) unlink($filePath);
            
            echo json_encode(['status' => 'success', 'message' => 'Image removed']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Record not found']);
        }
    } else if ($type === 'blog') {
        $stmt = $pdo->prepare("SELECT other_photos FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        
        if ($row) {
            $currentImages = json_decode($row['other_photos'], true);
            if (!is_array($currentImages)) $currentImages = [];
            
            $newImages = array_filter($currentImages, function($img) use ($image_name) {
                return trim($img) !== $image_name;
            });
            $newImagesString = json_encode(array_values($newImages));
            
            $updateStmt = $pdo->prepare("UPDATE products SET other_photos = :images WHERE id = :id");
            $updateStmt->execute(['images' => $newImagesString, 'id' => $id]);
            
            $filePath = '../images/' . $image_name;
            if (file_exists($filePath)) unlink($filePath);
            
            echo json_encode(['status' => 'success', 'message' => 'Image removed']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Record not found']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Unsupported type']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}
?>
