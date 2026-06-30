<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Include the database connection
require_once '../includes/connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_full_name = "Admin User";
$photo = "default_avatar.jpg";

// Fetch logged-in user info using PDO securely
try {
    $user_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare("SELECT firstname, lastname, photo FROM users WHERE id = :id");
    $stmt->execute(['id' => $user_id]);
    $user = $stmt->fetch();
    
    if ($user) {
        $user_full_name = htmlspecialchars($user['firstname'] . ' ' . $user['lastname']);
        $photo = !empty($user['photo']) ? htmlspecialchars($user['photo']) : 'default_avatar.jpg';
    }
} catch (Exception $e) {
    // Fail silently for nav
}
?>

<div class="admin-topbar">
    <div class="d-flex align-items-center">
        <!-- Toggle button could go here for mobile -->
        <h5 class="mb-0 text-dark fw-bold">Dashboard</h5>
    </div>
    
    <div class="d-flex justify-content-end align-items-center">
        <!-- Notifications (placeholder) -->
        <button class="btn btn-link text-secondary me-3 position-relative">
            <i class="fas fa-bell fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
        </button>
        
        <!-- User Info Dropdown -->
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle d-flex align-items-center rounded-pill shadow-sm py-1 px-2 border" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="images/<?= $photo ?>" alt="User" class="rounded-circle me-2" width="32" height="32" style="object-fit: cover;">
                <span class="fw-semibold text-dark me-1"><?= $user_full_name ?></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="userDropdown" style="border-radius: 12px;">
                <li><a class="dropdown-item py-2" href="profile.php"><i class="fas fa-user-circle me-2 text-secondary"></i> My Profile</a></li>
                <li><a class="dropdown-item py-2" href="change_password.php"><i class="fas fa-key me-2 text-secondary"></i> Change Password</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item py-2 text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
