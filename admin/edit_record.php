<?php
include '../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $target = $_POST['target'];
    $raised = $_POST['raised'];

    // Check if a new photo has been uploaded
    if (!empty($_FILES['photo']['name'])) {
        // Handle photo upload
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $upload_dir = '../images/';

        // Move the uploaded file to the images directory
        move_uploaded_file($photo_tmp, $upload_dir . $photo);

        // Update query with the new photo
        $query = "UPDATE blog SET 
                    category = '$category', 
                    name = '$name', 
                    description = '$description', 
                    target = '$target', 
                    raised = '$raised', 
                    photo = '$photo' 
                  WHERE id = $id";
    } else {
        // Update query without changing the photo
        $query = "UPDATE blog SET 
                    category = '$category', 
                    name = '$name', 
                    description = '$description', 
                    target = '$target', 
                    raised = '$raised' 
                  WHERE id = $id";
    }

    // Execute the query
    if (mysqli_query($connection, $query)) {
        header('Location: index.php'); // Redirect back to the dashboard
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
?>
