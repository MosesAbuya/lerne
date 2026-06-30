<?php
require '../includes/connection.php';
try {
    $pdo->exec("ALTER TABLE gallery MODIFY images TEXT");
    $pdo->exec("ALTER TABLE products MODIFY other_photos TEXT");
    echo "SUCCESS: Tables modified.";
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
?>
