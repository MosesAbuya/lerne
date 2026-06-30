<?php
include '../includes/connection.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Fetch product details
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $product = mysqli_fetch_assoc($result);

    // Return product details as JSON
    echo json_encode($product);
}
?>
