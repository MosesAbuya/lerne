<?php
require_once 'includes/header.php';

try {
    $stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
    $users = $stmt->fetchAll();
} catch (Exception $e) {
    $users = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">System Administrators</h3>
    <a href="add_user.php" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus"></i> Add New Admin
    </a>
</div>

<div class="admin-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Joined</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($users) > 0): ?>
                    <?php foreach ($users as $row): ?>
                        <tr>
                            <td class="fw-semibold text-secondary">#<?= $row['id'] ?></td>
                            <td class="fw-bold text-dark">
                                <?php if (!empty($row['photo'])): ?>
                                    <img src="../images/<?= htmlspecialchars($row['photo']) ?>" alt="Avatar" class="rounded-circle me-2" width="30" height="30" style="object-fit: cover;">
                                <?php else: ?>
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-secondary text-white me-2" style="width: 30px; height: 30px; font-size: 12px;">
                                        <?= strtoupper(substr($row['firstname'], 0, 1) . substr($row['lastname'], 0, 1)) ?>
                                    </div>
                                <?php endif; ?>
                                <?= htmlspecialchars($row['firstname'] . ' ' . $row['lastname']) ?>
                            </td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['contact_info']) ?></td>
                            <td><?= htmlspecialchars($row['created_on']) ?></td>
                            <td class="text-end">
                                <a href="edit_user.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <!-- Don't let the user delete themselves (Assuming ID 1 is superadmin or comparing session ID) -->
                                <?php if ($_SESSION['user_id'] != $row['id']): ?>
                                <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="deleteRecord(<?= $row['id'] ?>, 'delete_user.php', 'manage_users.php')">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
