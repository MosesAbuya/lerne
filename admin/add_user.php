<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../includes/connection.php';
    header('Content-Type: application/json');
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact_info = $_POST['contact_info'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Password is required.']);
        exit();
    }
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $created_on = date('Y-m-d');
    
    // Photo handling
    $photoName = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoName = time() . '_user_' . preg_replace("/[^a-zA-Z0-9.]/", "_", basename($_FILES['photo']['name']));
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $photoName);
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname, email, username, contact_info, password, created_on, photo) VALUES (:fn, :ln, :em, :un, :ci, :pass, :co, :photo)");
        $stmt->execute([
            'fn' => $firstname,
            'ln' => $lastname,
            'em' => $email,
            'un' => $email, // use email as username
            'ci' => $contact_info,
            'pass' => $hashed_password,
            'co' => $created_on,
            'photo' => $photoName
        ]);
        
        echo json_encode(['status' => 'success', 'message' => 'User added successfully.']);
        exit();
    } catch (Exception $e) {
        // Handle duplicate email error gracefully
        if ($e->getCode() == 23000) {
            echo json_encode(['status' => 'error', 'message' => 'Email already exists.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database error while saving.']);
        }
        exit();
    }
}

require_once 'includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Add New Admin User</h3>
    <a href="manage_users.php" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left"></i> Back to Users
    </a>
</div>

<div class="admin-card p-4">
    <form id="addUserForm" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">First Name</label>
                <input type="text" name="firstname" class="form-control" required placeholder="Enter first name">
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">Last Name</label>
                <input type="text" name="lastname" class="form-control" required placeholder="Enter last name">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">Email Address (Used for Login)</label>
                <input type="email" name="email" class="form-control" required placeholder="admin@example.com">
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">Phone Number</label>
                <input type="text" name="contact_info" class="form-control" placeholder="e.g. 0712345678">
            </div>
        </div>
        
        <div class="mb-4">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Enter a strong password">
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Profile Photo (Optional)</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Save User</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    submitFormAjax('addUserForm', 'add_user.php', 'manage_users.php');
});
</script>
