<?php
// Include database connection
include '../includes/connection.php';

if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);
    
    // Query to fetch user data
    $sql = "SELECT id, email, firstname, lastname, contact_info, username FROM users WHERE id = ?";
    
    if ($stmt = mysqli_prepare($connection, $sql)) {
        // Bind the parameter to the statement
        mysqli_stmt_bind_param($stmt, 'i', $user_id);
        
        // Execute the statement and get the result
        mysqli_stmt_execute($stmt);
        
        // Bind the result to variables
        mysqli_stmt_bind_result($stmt, $id, $email, $firstname, $lastname, $contact_info, $username);
        
        // Fetch the result into an array and return as JSON
        if (mysqli_stmt_fetch($stmt)) {
            $user = array(
                'id' => $id,
                'email' => $email,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'contact_info' => $contact_info,
                'username' => $username
            );
            echo json_encode($user); // Return user data as JSON
        } else {
            echo json_encode(array('error' => 'User not found.'));
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(array('error' => 'Database query failed.'));
    }
} else {
    echo json_encode(array('error' => 'User ID is required.'));
}

// Close the database connection
mysqli_close($connection);
?>
