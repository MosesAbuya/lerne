<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
// Include connection for any subsequent DB calls
require_once '../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAF Admin Dashboard</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <style>
        :root {
            --admin-primary: #0B192C; /* Navy */
            --admin-secondary: #F37021; /* Orange */
            --admin-accent: #4A154B; /* Purple */
            --admin-bg: #f4f7f6;
            --admin-card-bg: #ffffff;
            --admin-text: #333333;
            --admin-text-light: #6c757d;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--admin-bg);
            color: var(--admin-text);
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .admin-sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--admin-primary);
            color: #fff;
            z-index: 1000;
            transition: all 0.3s;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        }

        .admin-sidebar .sidebar-header {
            padding: 20px;
            background: rgba(0,0,0,0.2);
            text-align: center;
        }

        .admin-sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 4px 15px;
            border-radius: 8px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }
        .admin-sidebar .nav-link i {
            width: 24px;
            font-size: 1.1rem;
            margin-right: 10px;
        }

        .admin-sidebar .nav-link:hover, .admin-sidebar .nav-link.active {
            background: var(--admin-secondary);
            color: #fff;
        }

        /* Main Content Wrapper */
        .admin-main {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s;
        }

        /* Top Navbar */
        .admin-topbar {
            background: var(--admin-card-bg);
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-content {
            padding: 30px;
            flex-grow: 1;
        }

        /* Cards & UI Elements */
        .admin-card {
            background: var(--admin-card-bg);
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            margin-bottom: 24px;
            transition: transform 0.2s;
        }

        .admin-card:hover {
            transform: translateY(-2px);
        }

        .metric-card {
            padding: 24px;
            border-radius: 12px;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .metric-card .icon-bg {
            position: absolute;
            right: -10px;
            bottom: -10px;
            font-size: 5rem;
            opacity: 0.2;
            transform: rotate(-15deg);
        }

        .bg-navy { background: var(--admin-primary); }
        .bg-orange { background: var(--admin-secondary); }
        .bg-purple { background: var(--admin-accent); }
        .bg-success-custom { background: #198754; }

        /* Progress Bar wrapper */
        .upload-progress-wrapper {
            display: none;
            margin-top: 15px;
        }

        /* Image Grid for deletion */
        .image-edit-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        .image-edit-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            aspect-ratio: 1;
        }
        .image-edit-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .image-delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(220, 53, 69, 0.9);
            color: #fff;
            border: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .image-delete-btn:hover {
            transform: scale(1.1);
            background: #dc3545;
        }

    </style>
</head>
<body>
    
    <!-- Sidebar Included -->
    <?php include_once 'sidebar.php'; ?>
    
    <!-- Main Wrapper -->
    <div class="admin-main">
        <!-- Topbar Included -->
        <?php include_once 'nav.php'; ?>
        
        <!-- Page Content -->
        <div class="admin-content">
