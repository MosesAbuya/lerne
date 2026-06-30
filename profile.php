<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}

// Database connection
$servername = "localhost";
$username = "barrizio_admin";
$password = "Barrizi2025";
$dbname = "barrizio_charity_db";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Fetch user details
    $stmt = $connection->prepare("SELECT firstname, lastname, email, organisation, country FROM members WHERE id = :user_id");
    $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit();
    }

    // Handle Profile Update
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $organisation = $_POST['organisation'];
        $country = $_POST['country'];

        $updateStmt = $connection->prepare(
            "UPDATE members SET firstname = :firstname, lastname = :lastname, email = :email, organisation = :organisation, country = :country WHERE id = :user_id"
        );
        $updateStmt->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':organisation' => $organisation,
            ':country' => $country,
            ':user_id' => $_SESSION['user_id']
        ]);

        header('Location: profile.php');
        exit();
    }

    // Handle Unsubscribe
    if (isset($_POST['unsubscribe'])) {
        $unsubscribeStmt = $connection->prepare(
            "INSERT INTO unsubscribers (id, firstname, lastname, email, organisation, country) 
             SELECT id, firstname, lastname, email, organisation, country FROM members WHERE id = :user_id"
        );
        $unsubscribeStmt->execute([':user_id' => $_SESSION['user_id']]);

        $deleteStmt = $connection->prepare("DELETE FROM members WHERE id = :user_id");
        $deleteStmt->execute([':user_id' => $_SESSION['user_id']]);

        session_destroy(); // End session after unsubscribe
        header('Location: signin.php');
        exit();
    }
        // Fetch transaction_id
    $stmtTid = $connection->prepare("SELECT transaction_id FROM members WHERE id = :user_id");
    $stmtTid->execute([':user_id' => $_SESSION['user_id']]);
    $tidResult = $stmtTid->fetch(PDO::FETCH_ASSOC);
    $transaction_id = $tidResult['transaction_id'] ?? null;

    // Fetch subscription details
    $subscription = [];
    if ($transaction_id) {
        $subStmt = $connection->prepare("SELECT plan_name, amount, status, intervals, next_payment_date FROM subscriptions WHERE transaction_id = :tid");
        $subStmt->execute([':tid' => $transaction_id]);
        $subscription = $subStmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fetch payment history using email
    $paymentsStmt = $connection->prepare("SELECT amount, currency, channel, paid_at, purpose FROM payments WHERE customer_email = :email ORDER BY paid_at DESC");
    $paymentsStmt->execute([':email' => $user['email']]);
    $payments = $paymentsStmt->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
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
    </style>
    <!--<link rel="stylesheet" href="profile.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

</head>

<body>
    <?php include 'includes/sidebar.php' ?>
    <?php include 'includes/navbar.php'?>
<style>
    .profile-section {
        max-width: 800px;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
        padding: 30px;
        font-family: 'Segoe UI', sans-serif;
    }

    .profile-section h1 {
        color: #f27420;
        font-size: 2.2em;
        text-align: center;
        margin-bottom: 30px;
    }

    .bio-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #eee;
    }

    .bio-item:last-child {
        border-bottom: none;
    }

    .bio-left h2 {
        margin: 0;
        color: #555;
        font-weight: 600;
    }

    .bio-right h3 {
        margin: 0;
        color: #333;
        font-weight: normal;
    }

    .b-out {
        margin-top: 30px;
        text-align: center;
    }

    .b-out button,
    .b-out a button {
        background-color: #f27420;
        color: white;
        border: none;
        padding: 10px 20px;
        margin: 8px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 1em;
    }

    .b-out button:hover {
        background-color: #d35f14;
    }

    .b-out a {
        text-decoration: none;
        color: white;
    }

    .b-out form {
        display: inline-block;
    }

    @media (max-width: 600px) {
        .bio-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .bio-left h2,
        .bio-right h3 {
            font-size: 1em;
        }
    }
</style>
  <style>
    /* Modal Background */
    .modal {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* Modal Box */
    .modal-content {
        background-color: #fff;
        margin: 80px auto;
        padding: 30px 40px;
        border-radius: 10px;
        max-width: 500px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        position: relative;
        font-family: 'Segoe UI', sans-serif;
    }

    /* Close Button */
    .modal-content .close {
        color: #aaa;
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s;
    }

    .modal-content .close:hover {
        color: #f27420;
    }

    .modal-content h2 {
        margin-top: 0;
        color: #f27420;
        text-align: center;
    }

    .modal-content form {
        display: flex;
        flex-direction: column;
    }

    .modal-content label {
        margin-top: 15px;
        font-weight: 600;
        color: #444;
    }

    .modal-content input {
        margin-top: 5px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1em;
        transition: border 0.3s ease;
    }

    .modal-content input:focus {
        border-color: #f27420;
        outline: none;
        box-shadow: 0 0 5px rgba(242, 116, 32, 0.4);
    }

    .modal-content button[type="submit"] {
        margin-top: 25px;
        background-color: #f27420;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s ease;
    }

    .modal-content button[type="submit"]:hover {
        background-color: #d35f14;
    }
</style>


<div class="profile-section">
    <h1>User Profile</h1>

    <div class="bio-item">
        <div class="bio-left">
            <h2>Name</h2>
        </div>
        <div class="bio-right">
            <h3><?php echo htmlspecialchars($user['firstname'] . ' ' . $user['lastname']); ?></h3>
        </div>
    </div>

    <div class="bio-item">
        <div class="bio-left">
            <h2>Email</h2>
        </div>
        <div class="bio-right">
            <h3><?php echo htmlspecialchars($user['email']); ?></h3>
        </div>
    </div>

    <div class="bio-item">
        <div class="bio-left">
            <h2>Organisation</h2>
        </div>
        <div class="bio-right">
            <h3><?php echo htmlspecialchars($user['organisation']); ?></h3>
        </div>
    </div>

    <div class="bio-item">
        <div class="bio-left">
            <h2>Country</h2>
        </div>
        <div class="bio-right">
            <h3><?php echo htmlspecialchars($user['country']); ?></h3>
        </div>
    </div>

    <div class="b-out">
        <button onclick="openModal()">Edit Profile</button>

        <form method="post">
            <button type="submit" name="unsubscribe"
                onclick="return confirm('Are you sure you want to unsubscribe?');">Unsubscribe</button>
        </form>

        <a href="signout">
            <button onclick="return confirm('Are you sure you want to log out?');">Log Out</button>
        </a>
    </div>
</div>

    
    <section style="background-color: #fff7f3; padding: 2rem 1rem; text-align: center;">
    <div style="max-width: 700px; margin: 0 auto; border-radius: 16px; padding: 2rem; background-color: #ffffff; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);">
        <h2 style="color: #f27420;">Your Subscription</h2>
        <?php if ($subscription): ?>
            <p><strong>Plan:</strong> <?php echo htmlspecialchars($subscription['plan_name']); ?></p>
            <p><strong>Status:</strong> <?php echo htmlspecialchars($subscription['status']); ?></p>
            <p><strong>Amount:</strong> KES <?php echo number_format($subscription['amount'] / 100, 2); ?></p>
            <p><strong>Billing:</strong> <?php echo htmlspecialchars($subscription['intervals']); ?></p>
            <p><strong>Next Payment Date:</strong> <?php echo htmlspecialchars($subscription['next_payment_date']); ?></p>
        <?php else: ?>
            <p style="color: #999;">No subscription found.</p>
        <?php endif; ?>
        
    </div>
    
</section>

<section style="background-color: #fff7f3; padding: 2rem 1rem;">
    <div style="max-width: 900px; margin: 0 auto; border-radius: 16px; padding: 2rem; background-color: #ffffff; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);">
        <h2 style="text-align:center; color: #f27420;">Payment History</h2>
        <?php if ($payments): ?>
            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse: collapse; margin-top: 1rem;">
                    <thead>
                        <tr style="background-color: #f27420; color: white;">
                            <th style="padding: 0.75rem;">Amount</th>
                            <th style="padding: 0.75rem;">Currency</th>
                            <th style="padding: 0.75rem;">Channel</th>
                            <th style="padding: 0.75rem;">Date</th>
                            <th style="padding: 0.75rem;">Purpose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $pay): ?>
                        <tr style="text-align:center; border-bottom: 1px solid #ddd;">
                            <td style="padding: 0.75rem;">KES <?php echo number_format($pay['amount'] / 100, 2); ?></td>
                            <td style="padding: 0.75rem;"><?php echo htmlspecialchars($pay['currency']); ?></td>
                            <td style="padding: 0.75rem;"><?php echo htmlspecialchars($pay['channel']); ?></td>
                            <td style="padding: 0.75rem;"><?php echo date('d M Y', strtotime($pay['paid_at'])); ?></td>
                            <td style="padding: 0.75rem;"><?php echo htmlspecialchars($pay['purpose']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p style="text-align:center; color: #999;">No payment records found.</p>
        <?php endif; ?>
    </div>
</section>



  
<!-- Modal HTML -->
<div id="editProfileModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Edit Profile</h2>
        <form method="post">
            <label>First Name:</label>
            <input type="text" name="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>" required>

            <label>Last Name:</label>
            <input type="text" name="lastname" value="<?php echo htmlspecialchars($user['lastname']); ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label>Organisation:</label>
            <input type="text" name="organisation" value="<?php echo htmlspecialchars($user['organisation']); ?>" required>

            <label>Country:</label>
            <input type="text" name="country" value="<?php echo htmlspecialchars($user['country']); ?>" required>

            <button type="submit" name="update_profile">Save Changes</button>
        </form>
    </div>
</div>


    <?php include 'includes/footer.php'?>
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <?php include 'includes/script.php'; ?>
    <script>
    function openModal() {
        document.getElementById('editProfileModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('editProfileModal').style.display = 'none';
    }
    window.onclick = function(event) {
        if (event.target === document.getElementById('editProfileModal')) {
            closeModal();
        }
    }
    </script>
</body>

</html>
