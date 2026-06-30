<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $query = "DELETE FROM blog WHERE id = $id";
    mysqli_query($connection, $query);

    echo "Record deleted successfully!";
}
?>
