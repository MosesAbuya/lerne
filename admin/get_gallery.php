<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Unauthorized access. Please log in.']);
    exit();
}

// Include database connection
include '../includes/connection.php';

// Check if ID is provided
if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo json_encode(['error' => 'Gallery ID is required.']);
    exit();
}

// Sanitize ID
$id = intval($_POST['id']);

// Fetch gallery details by ID
$query = "SELECT * FROM gallery WHERE id = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode([
        'id' => $row['id'],
        'description' => $row['description'],
        'images' => $row['images'] // Comma-separated image filenames
    ]);
} else {
    echo json_encode(['error' => 'Gallery not found.']);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
