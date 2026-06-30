<?php
/**
 * Lerne Adams Foundation — Database Initialization Script
 * Run once to create all required tables in the 'lerne' database.
 * Access via: http://localhost/lerne/init_db.php
 * DELETE this file after running in production!
 */

require_once __DIR__ . '/includes/connection.php';

$tables = [];

// 1. Admin Users
$tables['users'] = "CREATE TABLE IF NOT EXISTS users (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(255) NOT NULL,
    email        VARCHAR(255) NOT NULL UNIQUE,
    password     VARCHAR(255) NOT NULL,
    role         ENUM('admin','editor') DEFAULT 'editor',
    avatar       VARCHAR(255) DEFAULT NULL,
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at   DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// 2. Blog / News & Stories
$tables['blog'] = "CREATE TABLE IF NOT EXISTS blog (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(500) NOT NULL,
    content      LONGTEXT NOT NULL,
    excerpt      TEXT DEFAULT NULL,
    main_image   VARCHAR(500) DEFAULT NULL,
    category_id  INT DEFAULT NULL,
    author       VARCHAR(255) DEFAULT 'LAF Team',
    status       ENUM('published','draft') DEFAULT 'published',
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at   DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// 3. Blog Categories
$tables['blog_categories'] = "CREATE TABLE IF NOT EXISTS blog_categories (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(255) NOT NULL,
    slug         VARCHAR(255) NOT NULL UNIQUE,
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// 4. Events
$tables['events'] = "CREATE TABLE IF NOT EXISTS events (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(500) NOT NULL,
    description  LONGTEXT NOT NULL,
    location     VARCHAR(255) DEFAULT NULL,
    event_date   DATE NOT NULL,
    event_time   TIME DEFAULT NULL,
    end_date     DATE DEFAULT NULL,
    main_image   VARCHAR(500) DEFAULT NULL,
    status       ENUM('upcoming','ongoing','past') DEFAULT 'upcoming',
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at   DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// 5. Gallery
$tables['gallery'] = "CREATE TABLE IF NOT EXISTS gallery (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    title        VARCHAR(255) DEFAULT NULL,
    main_image   VARCHAR(500) NOT NULL,
    category_id  INT DEFAULT NULL,
    caption      TEXT DEFAULT NULL,
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// 6. Gallery Categories
$tables['gallery_categories'] = "CREATE TABLE IF NOT EXISTS gallery_categories (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(255) NOT NULL,
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// 7. Projects
$tables['projects'] = "CREATE TABLE IF NOT EXISTS projects (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(500) NOT NULL,
    description  LONGTEXT NOT NULL,
    sector       VARCHAR(255) DEFAULT NULL,
    location     VARCHAR(255) DEFAULT NULL,
    status       ENUM('active','completed','upcoming') DEFAULT 'active',
    start_date   DATE DEFAULT NULL,
    end_date     DATE DEFAULT NULL,
    main_image   VARCHAR(500) DEFAULT NULL,
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at   DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// 8. Annual Reports
$tables['annual_reports'] = "CREATE TABLE IF NOT EXISTS annual_reports (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    title        VARCHAR(255) NOT NULL,
    year         YEAR NOT NULL,
    file_path    VARCHAR(500) NOT NULL,
    description  TEXT DEFAULT NULL,
    cover_image  VARCHAR(500) DEFAULT NULL,
    downloads    INT DEFAULT 0,
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at   DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// 9. Newsletter Subscribers
$tables['newsletter_subscribers'] = "CREATE TABLE IF NOT EXISTS newsletter_subscribers (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    email        VARCHAR(255) NOT NULL UNIQUE,
    subscribed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_active    TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// 10. Volunteers
$tables['volunteers'] = "CREATE TABLE IF NOT EXISTS volunteers (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    full_name    VARCHAR(255) NOT NULL,
    email        VARCHAR(255) NOT NULL,
    phone        VARCHAR(30) DEFAULT NULL,
    county       VARCHAR(100) DEFAULT NULL,
    interest     VARCHAR(255) DEFAULT NULL,
    message      TEXT DEFAULT NULL,
    status       ENUM('pending','approved','rejected') DEFAULT 'pending',
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// 11. Contact Messages
$tables['contact_messages'] = "CREATE TABLE IF NOT EXISTS contact_messages (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(255) NOT NULL,
    email        VARCHAR(255) NOT NULL,
    phone        VARCHAR(30) DEFAULT NULL,
    subject      VARCHAR(255) DEFAULT NULL,
    message      TEXT NOT NULL,
    is_read      TINYINT(1) DEFAULT 0,
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// 12. Donations (info only, no payment processing yet)
$tables['donation_inquiries'] = "CREATE TABLE IF NOT EXISTS donation_inquiries (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(255) NOT NULL,
    email        VARCHAR(255) NOT NULL,
    phone        VARCHAR(30) DEFAULT NULL,
    amount       DECIMAL(10,2) DEFAULT NULL,
    currency     VARCHAR(10) DEFAULT 'KES',
    message      TEXT DEFAULT NULL,
    created_at   DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// Execute all table creation
$results = [];
foreach ($tables as $tableName => $sql) {
    try {
        $pdo->exec($sql);
        $results[$tableName] = ['status' => 'success', 'message' => "Table '{$tableName}' created or already exists."];
    } catch (PDOException $e) {
        $results[$tableName] = ['status' => 'error', 'message' => "Error: " . $e->getMessage()];
    }
}

// Insert default admin user (password: Admin@LAF2024)
try {
    $defaultPass = password_hash('Admin@LAF2024', PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT IGNORE INTO users (name, email, password, role) VALUES (?, ?, ?, 'admin')");
    $stmt->execute(['LAF Administrator', 'admin@lerneadamsfoundation.org', $defaultPass]);
    $results['default_admin'] = ['status' => 'success', 'message' => "Default admin user created (if not exists). Email: admin@lerneadamsfoundation.org | Password: Admin@LAF2024"];
} catch (PDOException $e) {
    $results['default_admin'] = ['status' => 'error', 'message' => $e->getMessage()];
}

// Insert default blog categories
try {
    $cats = ['Community Empowerment', 'Health & HIV', 'Education', 'Youth & Women', 'SGBV', 'Peace & Governance', 'Environmental Hygiene', 'Mental Health', 'News & Updates'];
    $stmt = $pdo->prepare("INSERT IGNORE INTO blog_categories (name, slug) VALUES (?, ?)");
    foreach ($cats as $cat) {
        $slug = strtolower(str_replace([' ', '&', '/'], ['-', '', ''], $cat));
        $stmt->execute([$cat, $slug]);
    }
    $results['blog_categories_seed'] = ['status' => 'success', 'message' => "Default blog categories inserted."];
} catch (PDOException $e) {
    $results['blog_categories_seed'] = ['status' => 'error', 'message' => $e->getMessage()];
}

// Insert default gallery categories
try {
    $galCats = ['Community Activities', 'Health Programmes', 'Education', 'Peace Initiatives', 'Youth Empowerment', 'Events', 'Field Work'];
    $stmt = $pdo->prepare("INSERT IGNORE INTO gallery_categories (name) VALUES (?)");
    foreach ($galCats as $cat) {
        $stmt->execute([$cat]);
    }
    $results['gallery_categories_seed'] = ['status' => 'success', 'message' => "Default gallery categories inserted."];
} catch (PDOException $e) {
    $results['gallery_categories_seed'] = ['status' => 'error', 'message' => $e->getMessage()];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAF Database Initialization</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #0D1B2A; color: #fff; padding: 40px; }
        h1 { color: #3D8B37; margin-bottom: 30px; }
        .result { padding: 12px 20px; margin: 8px 0; border-radius: 8px; display: flex; align-items: center; gap: 15px; }
        .success { background: rgba(61,139,55,0.2); border-left: 4px solid #3D8B37; }
        .error { background: rgba(192,57,43,0.2); border-left: 4px solid #C0392B; }
        .icon { font-size: 1.2rem; }
        .table-name { font-weight: 700; color: #F5C518; min-width: 220px; }
        .warning { background: rgba(232,117,26,0.2); border: 2px solid #E8751A; border-radius: 12px; padding: 20px; margin-top: 30px; color: #E8751A; font-weight: 600; }
    </style>
</head>
<body>
    <h1>🌍 Lerne Adams Foundation — Database Initialization</h1>
    <?php foreach ($results as $table => $result): ?>
        <div class="result <?= $result['status'] ?>">
            <span class="icon"><?= $result['status'] === 'success' ? '✅' : '❌' ?></span>
            <span class="table-name"><?= htmlspecialchars($table) ?></span>
            <span><?= htmlspecialchars($result['message']) ?></span>
        </div>
    <?php endforeach; ?>
    <div class="warning">
        ⚠️ IMPORTANT: Delete this file (init_db.php) after running it in production to prevent unauthorized access.
    </div>
</body>
</html>
