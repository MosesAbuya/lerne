<?php
// Include database connection
include 'includes/connection.php';

// Start session to manage user login state
session_start();

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form data
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Check if email and password are empty
    if (empty($email) || empty($password)) {
        echo 'Please enter both email and password!';
        exit();
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format!';
        exit();
    }

    // Prepare SQL statement to select the user by email
    $sql = "SELECT * FROM members WHERE email = :email LIMIT 1";

    try {
        // Prepare and execute the statement using PDO
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Check if the email exists in the database
        if ($stmt->rowCount() > 0) {
            // Fetch the user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password using password_verify
            if (password_verify($password, $user['password'])) {
                // Set session variables or cookies if needed
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];

                echo 'success';  // Respond with success
            } else {
                echo 'Incorrect password!';  // Password mismatch
            }
        } else {
            echo 'Email not found!';  // Email does not exist in the database
        }

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();  // Error handling
    }
}
?>
