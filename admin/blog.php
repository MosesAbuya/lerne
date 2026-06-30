<?php
require_once 'includes/header.php';

try {
    $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
    $stories = $stmt->fetchAll();
} catch (Exception $e) {
    $stories = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Success Stories Management</h3>
    <a href="add_blog.php" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus"></i> Add New Story
    </a>
</div>

<div class="admin-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Main Photo</th>
                    <th scope="col">Name / Title</th>
                    <th scope="col" style="max-width: 250px;">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($stories) > 0): ?>
                    <?php foreach ($stories as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td>
                                <?php if (!empty($row['photo'])): ?>
                                    <img src="../images/<?= htmlspecialchars($row['photo']) ?>" alt="Photo" class="rounded shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="fw-semibold"><?= htmlspecialchars($row['name'] ?? 'No Name') ?></td>
                            <td class="text-truncate" style="max-width: 250px;" title="<?= htmlspecialchars($row['description'] ?? '') ?>">
                                <?= htmlspecialchars($row['description'] ?? '') ?>
                            </td>
                            <td><?= htmlspecialchars($row['date'] ?? '') ?></td>
                            <td class="text-end">
                                <a href="edit_blog.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="deleteRecord(<?= $row['id'] ?>, 'delete_blog.php', 'blog.php')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No stories found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
