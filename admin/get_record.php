<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Fetch the record by ID
    $query = "SELECT * FROM blog WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $record = mysqli_fetch_assoc($result);
        echo json_encode($record); // Return record as JSON
    } else {
        echo json_encode(['error' => 'Record not found']);
    }
}
?>
