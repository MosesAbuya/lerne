<?php
require_once 'includes/header.php';


// Handle Delete
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM newsletter_subscribers WHERE id = ?");
        $stmt->execute([$_GET['delete']]);
        $_SESSION['success_msg'] = "Subscriber deleted successfully.";
        header("Location: newsletter.php");
        exit();
    } catch (PDOException $e) {
        $error_msg = "Error deleting subscriber: " . $e->getMessage();
    }
}

// Handle Status Toggle
if (isset($_GET['toggle']) && is_numeric($_GET['toggle'])) {
    try {
        $stmt = $pdo->prepare("UPDATE newsletter_subscribers SET status = IF(status='active', 'unsubscribed', 'active') WHERE id = ?");
        $stmt->execute([$_GET['toggle']]);
        header("Location: newsletter.php");
        exit();
    } catch (PDOException $e) {
        $error_msg = "Error updating status: " . $e->getMessage();
    }
}

// Fetch Subscribers
$stmt = $pdo->query("SELECT * FROM newsletter_subscribers ORDER BY subscribed_at DESC");
$subscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Newsletter Subscribers</h3>
    <div>
        <a href="?export=csv" class="btn btn-primary shadow-sm"><i class="fas fa-file-csv"></i> Export CSV</a>
    </div>
</div>

<?php if(isset($_SESSION['success_msg'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION['success_msg'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['success_msg']); ?>
<?php endif; ?>

<?php if(isset($error_msg)): ?>
    <div class="alert alert-danger"><?= $error_msg ?></div>
<?php endif; ?>

<div class="admin-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Email Address</th>
                    <th>Subscribed On</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($subscribers) > 0): ?>
                    <?php foreach ($subscribers as $sub): ?>
                        <tr>
                            <td><?= $sub['id'] ?></td>
                            <td><?= htmlspecialchars($sub['email']) ?></td>
                            <td><?= date('M d, Y g:i A', strtotime($sub['subscribed_at'])) ?></td>
                            <td>
                                <?php if ($sub['status'] == 'active'): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Unsubscribed</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end">
                                <a href="newsletter.php?toggle=<?= $sub['id'] ?>" class="btn btn-sm btn-outline-secondary" title="Toggle Status">
                                    <i class="fas fa-power-off"></i>
                                </a>
                                <a href="newsletter.php?delete=<?= $sub['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this subscriber?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No subscribers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
// Handle CSV Export inline
if (isset($_GET['export']) && $_GET['export'] == 'csv') {
    // Clear output buffer
    ob_end_clean();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=newsletter_subscribers.csv');
    
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Email', 'Subscribed At', 'Status']);
    
    foreach ($subscribers as $row) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit();
}
?>

<?php require_once 'includes/footer.php'; ?>
