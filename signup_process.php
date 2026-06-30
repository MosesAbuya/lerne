<?php
// Include database connection
include 'includes/connection.php';

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate inputs
    $firstname = htmlspecialchars(trim($_POST['first-name']));
    $lastname = htmlspecialchars(trim($_POST['last-name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $country = htmlspecialchars(trim($_POST['country']));
    $organisation = htmlspecialchars(trim($_POST['organisation']));
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm-password']);
    $transaction_id = trim($_POST['transaction_id']);

    // Basic validations
    if (empty($firstname) || empty($lastname) || empty($email) || empty($country) || empty($organisation) || empty($password) || empty($confirm_password) || empty($transaction_id)) {
        echo 'All fields are required!';
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format!';
        exit();
    }

    if ($password !== $confirm_password) {
        echo 'Passwords do not match!';
        exit();
    }

    try {
        // Begin transaction to ensure both inserts succeed or fail together
        $connection->beginTransaction();

        // First insert into transaction_map
        $mapSql = "INSERT INTO transaction_map (email, transaction_id) VALUES (:email, :transaction_id)";
        $stmtMap = $connection->prepare($mapSql);
        $stmtMap->bindParam(':email', $email, PDO::PARAM_STR);
        $stmtMap->bindParam(':transaction_id', $transaction_id, PDO::PARAM_STR);
        $stmtMap->execute();

        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Then insert into members
        $memberSql = "INSERT INTO members (firstname, lastname, email, organisation, country, password, transaction_id)
                      VALUES (:firstname, :lastname, :email, :organisation, :country, :password, :transaction_id)";
        $stmtMember = $connection->prepare($memberSql);
        $stmtMember->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmtMember->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $stmtMember->bindParam(':email', $email, PDO::PARAM_STR);
        $stmtMember->bindParam(':organisation', $organisation, PDO::PARAM_STR);
        $stmtMember->bindParam(':country', $country, PDO::PARAM_STR);
        $stmtMember->bindParam(':password', $passwordHash, PDO::PARAM_STR);
        $stmtMember->bindParam(':transaction_id', $transaction_id, PDO::PARAM_STR);
        $stmtMember->execute();

        // Commit the transaction
        $connection->commit();

        echo 'success';
    } catch (PDOException $e) {
        // Roll back the transaction if something failed
        $connection->rollBack();
        echo 'Error: ' . $e->getMessage();
    }
}
?>
