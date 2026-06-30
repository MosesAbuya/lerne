<?php
require '../includes/connection.php';
$stmt = $pdo->query("SHOW COLUMNS FROM gallery LIKE 'images'");
print_r($stmt->fetch(PDO::FETCH_ASSOC));
?>
