<?php
// Get the current filename to highlight active link
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="admin-sidebar">
    <div class="sidebar-header">
        <h4 class="mb-0 text-white" style="font-family: var(--font-heading); font-weight: 700;">LAF Admin</h4>
        <small class="text-white-50">Control Panel</small>
    </div>
    
    <div class="mt-4" style="overflow-y: auto; height: calc(100vh - 100px); padding-bottom: 30px;">
        <a href="index.php" class="nav-link <?= ($current_page == 'home.php' || $current_page == 'index.php') ? 'active' : '' ?>">
            <i class="fas fa-chart-line"></i> Dashboard
        </a>
        
        <h6 class="text-uppercase text-white-50 px-4 mt-4 mb-2" style="font-size: 0.75rem; letter-spacing: 1px;">Content</h6>
        
        <a href="blog.php" class="nav-link <?= ($current_page == 'blog.php' || $current_page == 'add_blog.php' || $current_page == 'edit_blog.php') ? 'active' : '' ?>">
            <i class="fas fa-newspaper"></i> News & Stories
        </a>
        
        <a href="events.php" class="nav-link <?= ($current_page == 'events.php' || $current_page == 'add_event.php' || $current_page == 'edit_event.php') ? 'active' : '' ?>">
            <i class="fas fa-calendar-alt"></i> Events
        </a>
        
        <a href="gallery.php" class="nav-link <?= ($current_page == 'gallery.php' || $current_page == 'add_gallery.php' || $current_page == 'edit_gallery.php') ? 'active' : '' ?>">
            <i class="fas fa-images"></i> Gallery
        </a>

        <a href="reports.php" class="nav-link <?= ($current_page == 'reports.php') ? 'active' : '' ?>">
            <i class="fas fa-file-pdf"></i> Annual Reports
        </a>
        
        <h6 class="text-uppercase text-white-50 px-4 mt-4 mb-2" style="font-size: 0.75rem; letter-spacing: 1px;">System</h6>
        
        <a href="category.php" class="nav-link <?= ($current_page == 'category.php') ? 'active' : '' ?>">
            <i class="fas fa-tags"></i> Categories
        </a>
        
        <a href="manage_users.php" class="nav-link <?= ($current_page == 'manage_users.php' || $current_page == 'add_user.php' || $current_page == 'edit_user.php') ? 'active' : '' ?>">
            <i class="fas fa-users"></i> Users
        </a>
        
        <a href="donations.php" class="nav-link <?= ($current_page == 'donations.php') ? 'active' : '' ?>">
            <i class="fas fa-hand-holding-heart"></i> Donations
        </a>

        <a href="newsletter.php" class="nav-link <?= ($current_page == 'newsletter.php') ? 'active' : '' ?>">
            <i class="fas fa-envelope-open-text"></i> Newsletter
        </a>
        
        <div class="mt-5 px-3">
            <a href="logout.php" class="btn btn-danger w-100 rounded-pill shadow-sm">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</div>
