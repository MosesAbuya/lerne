<?php
require_once 'includes/header.php';

try {
    // Secure PDO fetching
    $stmt = $pdo->query("SELECT * FROM gallery ORDER BY id DESC");
    $galleries = $stmt->fetchAll();
} catch (Exception $e) {
    $galleries = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Gallery Management</h3>
    <a href="add_gallery.php" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus"></i> Add New Gallery
    </a>
</div>

<div class="admin-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title/Description</th>
                    <th scope="col">Images</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($galleries) > 0): ?>
                    <?php foreach ($galleries as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['description'] ?? 'No Title') ?></td>
                            <td>
                                <?php 
                                    $images = !empty($row['images']) ? explode(',', $row['images']) : [];
                                    $count = count($images);
                                    if ($count > 0) {
                                        echo "<span class='badge bg-secondary'>$count Images</span>";
                                    } else {
                                        echo "<span class='badge bg-light text-dark'>Empty</span>";
                                    }
                                ?>
                            </td>
                            <td class="text-end">
                                <a href="edit_gallery.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="deleteRecord(<?= $row['id'] ?>, 'delete_gallery.php', 'gallery.php')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">No gallery items found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
