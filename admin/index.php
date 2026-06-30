<?php
// We don't need to start session here because includes/header.php handles it.
require_once 'includes/header.php'; // This also includes connection.php

// Fetch dynamic counts for metrics
$blogCount = 0;
$eventCount = 0;
$galleryCount = 0;
$userCount = 0;

try {
    $blogCount = $pdo->query("SELECT count(*) FROM blog")->fetchColumn();
    $eventCount = $pdo->query("SELECT count(*) FROM events")->fetchColumn();
    $galleryCount = $pdo->query("SELECT count(*) FROM gallery")->fetchColumn();
    $userCount = $pdo->query("SELECT count(*) FROM users")->fetchColumn();
} catch (Exception $e) {
    // Fail silently or log
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Dashboard Overview</h3>
    <div>
        <button class="btn btn-primary shadow-sm" onclick="window.location.reload();">
            <i class="fas fa-sync-alt"></i> Refresh Data
        </button>
    </div>
</div>

<!-- Metric Cards -->
<div class="row mb-4">
    <div class="col-md-3">
        <a href="blog.php" class="text-decoration-none">
            <div class="admin-card metric-card bg-navy h-100">
                <i class="fas fa-newspaper icon-bg"></i>
                <h5 class="text-white-50">Total Blogs</h5>
                <h2 class="display-5 fw-bold mb-0"><?= $blogCount ?></h2>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="events.php" class="text-decoration-none">
            <div class="admin-card metric-card bg-orange h-100">
                <i class="fas fa-calendar-check icon-bg"></i>
                <h5 class="text-white-50">Active Events</h5>
                <h2 class="display-5 fw-bold mb-0"><?= $eventCount ?></h2>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="gallery.php" class="text-decoration-none">
            <div class="admin-card metric-card bg-purple h-100">
                <i class="fas fa-images icon-bg"></i>
                <h5 class="text-white-50">Gallery Groups</h5>
                <h2 class="display-5 fw-bold mb-0"><?= $galleryCount ?></h2>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="manage_users.php" class="text-decoration-none">
            <div class="admin-card metric-card bg-success-custom h-100">
                <i class="fas fa-users icon-bg"></i>
                <h5 class="text-white-50">Registered Users</h5>
                <h2 class="display-5 fw-bold mb-0"><?= $userCount ?></h2>
            </div>
        </a>
    </div>
</div>

<!-- Charts Section -->
<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="admin-card p-4 h-100">
            <h5 class="fw-bold mb-4">Website Traffic Trends (Simulated)</h5>
            <canvas id="trafficChart" height="100"></canvas>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="admin-card p-4 h-100">
            <h5 class="fw-bold mb-4">Content Distribution</h5>
            <canvas id="contentChart" height="200"></canvas>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Traffic Trend Chart (Line Chart)
    const ctxTraffic = document.getElementById('trafficChart').getContext('2d');
    const gradient = ctxTraffic.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(11, 25, 44, 0.5)'); // Navy transparent
    gradient.addColorStop(1, 'rgba(11, 25, 44, 0)');

    new Chart(ctxTraffic, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Unique Visitors',
                data: [1200, 1900, 3000, 5000, 4200, 6800, 8500],
                borderColor: '#0B192C',
                backgroundColor: gradient,
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [5, 5] } },
                x: { grid: { display: false } }
            }
        }
    });

    // Content Distribution Chart (Doughnut Chart)
    const ctxContent = document.getElementById('contentChart').getContext('2d');
    new Chart(ctxContent, {
        type: 'doughnut',
        data: {
            labels: ['Blogs', 'Events', 'Galleries'],
            datasets: [{
                data: [<?= $blogCount ?>, <?= $eventCount ?>, <?= $galleryCount ?>],
                backgroundColor: ['#0B192C', '#F37021', '#4A154B'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
});
</script>
