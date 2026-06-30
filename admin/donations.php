<?php
require_once 'includes/header.php';

try {
    // Fetch One-time donations
    $stmt1 = $pdo->query("SELECT * FROM payments WHERE (transaction_id IS NULL OR transaction_id = '') ORDER BY id DESC");
    $oneTimeDonations = $stmt1->fetchAll();

    // Fetch Subscriptions
    $stmt2 = $pdo->query("SELECT * FROM payments WHERE transaction_id IS NOT NULL AND transaction_id != '' ORDER BY id DESC");
    $subscriptions = $stmt2->fetchAll();
} catch (Exception $e) {
    $oneTimeDonations = [];
    $subscriptions = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Donations Dashboard</h3>
    <button class="btn btn-outline-secondary shadow-sm" onclick="window.print()">
        <i class="fas fa-print"></i> Print Records
    </button>
</div>

<div class="admin-card p-4">
    <!-- Nav tabs -->
    <ul class="nav nav-pills mb-4" id="donationTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active rounded-pill px-4" id="one-time-tab" data-bs-toggle="tab" data-bs-target="#one-time" type="button" role="tab" aria-controls="one-time" aria-selected="true">
                <i class="fas fa-hand-holding-heart me-1"></i> One-time Donations
            </button>
        </li>
        <li class="nav-item ms-2" role="presentation">
            <button class="nav-link rounded-pill px-4" id="subscriptions-tab" data-bs-toggle="tab" data-bs-target="#subscriptions" type="button" role="tab" aria-controls="subscriptions" aria-selected="false">
                <i class="fas fa-sync-alt me-1"></i> Subscriptions
            </button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content" id="donationTabsContent">
        
        <!-- One-time Donations -->
        <div class="tab-pane fade show active" id="one-time" role="tabpanel" aria-labelledby="one-time-tab">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Donor Name</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Currency</th>
                            <th>Channel</th>
                            <th>Paid At</th>
                            <th>Purpose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($oneTimeDonations) > 0): ?>
                            <?php foreach ($oneTimeDonations as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['id']) ?></td>
                                    <td class="fw-semibold"><?= htmlspecialchars(($row['customer_first_name'] ?? '') . ' ' . ($row['customer_last_name'] ?? '')) ?></td>
                                    <td><?= htmlspecialchars($row['customer_email'] ?? '') ?></td>
                                    <td class="text-success fw-bold"><?= htmlspecialchars($row['amount'] ?? '') ?></td>
                                    <td><?= htmlspecialchars($row['currency'] ?? '') ?></td>
                                    <td><span class="badge bg-primary"><?= htmlspecialchars($row['channel'] ?? 'Unknown') ?></span></td>
                                    <td><?= htmlspecialchars($row['paid_at'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($row['purpose'] ?? 'General') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="8" class="text-center py-4 text-muted">No one-time donations found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Subscriptions -->
        <div class="tab-pane fade" id="subscriptions" role="tabpanel" aria-labelledby="subscriptions-tab">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Donor Name</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Currency</th>
                            <th>Transaction ID</th>
                            <th>Paid At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($subscriptions) > 0): ?>
                            <?php foreach ($subscriptions as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['id']) ?></td>
                                    <td class="fw-semibold"><?= htmlspecialchars(($row['customer_first_name'] ?? '') . ' ' . ($row['customer_last_name'] ?? '')) ?></td>
                                    <td><?= htmlspecialchars($row['customer_email'] ?? '') ?></td>
                                    <td class="text-success fw-bold"><?= htmlspecialchars($row['amount'] ?? '') ?></td>
                                    <td><?= htmlspecialchars($row['currency'] ?? '') ?></td>
                                    <td><span class="badge bg-info text-dark"><?= htmlspecialchars($row['transaction_id'] ?? '') ?></span></td>
                                    <td><?= htmlspecialchars($row['paid_at'] ?? 'N/A') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="7" class="text-center py-4 text-muted">No subscriptions found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
