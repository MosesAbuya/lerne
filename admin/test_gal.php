<?php
require '../includes/connection.php';
$stmt = $pdo->query('SELECT id, images FROM gallery ORDER BY id DESC LIMIT 5');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
file_put_contents('dump_gal.json', json_encode($rows));
?>
