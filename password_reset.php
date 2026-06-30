<?php
include 'includes/connection.php';

$token = $_GET['token'] ?? '';

if (empty($token)) {
    die('Invalid or expired reset link.');
}

// Validate token
$stmt = $connection->prepare("SELECT user_id, expires_at FROM password_resets WHERE token = :token");
$stmt->bindParam(':token', $token);
$stmt->execute();

$reset = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reset || strtotime($reset['expires_at']) < time()) {
    die('Invalid or expired reset link.');
}

// Handle password reset form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $userId = $reset['user_id'];

    $stmt = $connection->prepare("UPDATE members SET password = :password WHERE id = :id");
    $stmt->execute([
        ':password' => $newPassword,
        ':id' => $userId
    ]);

    // Remove token
    $stmt = $connection->prepare("DELETE FROM password_resets WHERE token = :token");
    $stmt->execute([':token' => $token]);

    header('Location: profile.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <?php include 'includes/head.php'?>
    <?php include 'includes/preloader.php'; ?>
    <style>
    html {
        width: 100%;
    }

    .cont {
        height: 50vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;

    }

    h1 {
        font-size: 4.5rem;
        font-weight: 800;
        text-align: center;
        color: #f27420;
    }

    .h-container {
        background-image: url('assets/img/hero/back5.png');
        background-size: cover;
        background-attachment: fixed;
    }

    .slider-area2 {
        background-color: rgba(0, 0, 0, 0.252);
    }

    .header-area .header-top .header-info-left>ul>li {
        color: #1f2b7b;
    }

    .header-area .header-top .header-info-left .header-social>ul>li>a {
        color: #f27420;
    }

    .header-area .header-top .header-info-right .contact-now li a {
        color: #1f2b7b;
    }

    form {
        margin: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 90%;

        input {
            height: 50px;
            margin: 10px;
            width: 90%;
        }

        button {
            background-color: #f27420;
            border: 1px solid #f27420;
            height: 50px;
            width: 50%;
            color: #ffffff;
            width: 90%;
        }
    }

    html,
    body {
        width: 100%;
        overflow-x: hidden;
    }

    @media(max-width: 768px) {

        html,
        body {
            width: 100%;
            overflow-x: hidden;
            /* Prevent horizontal scroll */
            margin: 0;
            /* Optional: remove default margin */
            padding: 0;
        }

        .cont {
            width: 100%;
        }

        form {
            width: 80%;
        }
    }
    </style>
    <link rel="stylesheet" href="donate.css">

</head>

<body>
    <?php include 'includes/sidebar.php' ?>
    <?php include 'includes/navbar.php'?>

    <div class="cont">
        <form method="POST">
            <label>New Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>


    <?php include 'includes/footer.php'?>
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <?php include 'includes/script.php'; ?>
</body>

</html>
