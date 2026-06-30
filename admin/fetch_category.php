<?php
include '../includes/connection.php';

if (isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

    // Prepared statement for security
    $stmt = $connection->prepare("SELECT * FROM category WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();

    echo json_encode($category);
}
?>
