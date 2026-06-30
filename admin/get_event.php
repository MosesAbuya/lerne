<?php
include '../includes/connection.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM events WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $event = mysqli_fetch_assoc($result);
    echo json_encode($event);
}
?>
