<?php
require_once 'includes/header.php';

try {
    $stmt = $pdo->query("
        SELECT events.*, p_category.category_name 
        FROM events 
        LEFT JOIN p_category ON events.p_category = p_category.id
        ORDER BY events.event_date DESC
    ");
    $events = $stmt->fetchAll();
} catch (Exception $e) {
    $events = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Events Management</h3>
    <a href="add_event.php" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus"></i> Add New Event
    </a>
</div>

<div class="admin-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date & Time</th>
                    <th scope="col">Location</th>
                    <th scope="col">Category</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($events) > 0): ?>
                    <?php foreach ($events as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td>
                                <?php if (!empty($row['photo'])): ?>
                                    <img src="../images/<?= htmlspecialchars($row['photo']) ?>" alt="Photo" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <i class="fas fa-calendar text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="fw-semibold"><?= htmlspecialchars($row['name'] ?? 'No Name') ?></td>
                            <td>
                                <span class="d-block"><i class="fas fa-calendar-day text-secondary me-1"></i> <?= htmlspecialchars($row['event_date'] ?? '') ?></span>
                                <small class="text-muted"><i class="fas fa-clock me-1"></i> <?= htmlspecialchars($row['event_time'] ?? '') ?></small>
                            </td>
                            <td><?= htmlspecialchars($row['location'] ?? '') ?></td>
                            <td><span class="badge bg-info text-dark"><?= htmlspecialchars($row['category_name'] ?? 'Uncategorized') ?></span></td>
                            <td class="text-end">
                                <a href="edit_event.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="deleteRecord(<?= $row['id'] ?>, 'delete_event.php', 'events.php')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No events found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
