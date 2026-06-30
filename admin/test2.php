<?php
require '../includes/connection.php';
$stmt = $pdo->query('SELECT images FROM gallery WHERE images IS NOT NULL AND images != "" LIMIT 1');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
file_put_contents('dump2.json', json_encode($rows));
?>
