<?php
require '../includes/connection.php';
$stmt = $pdo->query('SELECT id, other_photos FROM products WHERE other_photos IS NOT NULL AND other_photos != ""');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
file_put_contents('dump.json', json_encode($rows));
?>
