<?php
require_once 'includes/header.php';

try {
    $stmt = $pdo->query("SELECT * FROM p_category ORDER BY id DESC");
    $categories = $stmt->fetchAll();
} catch (Exception $e) {
    $categories = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Program Categories</h3>
    <a href="add_p_category.php" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus"></i> Add New Program Category
    </a>
</div>

<div class="admin-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col" width="10%">ID</th>
                    <th scope="col" width="60%">Category Name</th>
                    <th scope="col" class="text-end" width="30%">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($categories) > 0): ?>
                    <?php foreach ($categories as $row): ?>
                        <tr>
                            <td class="fw-semibold text-secondary">#<?= $row['id'] ?></td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($row['category_name']) ?></td>
                            <td class="text-end">
                                <a href="edit_p_category.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="deleteRecord(<?= $row['id'] ?>, 'delete_p_category.php', 'p_category.php')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center py-4 text-muted">No program categories found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
