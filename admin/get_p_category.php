<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);

    // Validate ID
    if ($id <= 0) {
        die(json_encode(["error" => "Invalid category ID."]));
    }

    // Use prepared statements to fetch category data
    $query = $connection->prepare("SELECT * FROM p_category WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["error" => "Category not found."]);
    }
}
?>
