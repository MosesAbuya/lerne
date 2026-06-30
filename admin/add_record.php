<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $target = $_POST['target'];
    $raised = $_POST['raised'];

    // Handle file upload
    $photo = $_FILES['photo']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);
    move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);

    // Insert into database
    $query = "INSERT INTO blog (category, name, description, photo, target, raised) VALUES ('$category', '$name', '$description', '$photo', '$target', '$raised')";
    mysqli_query($connection, $query);

    header('Location: home.php'); // Redirect back to dashboard
}
?>
