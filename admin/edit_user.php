<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../includes/connection.php';
    header('Content-Type: application/json');
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact_info = $_POST['contact_info'] ?? '';
    $password = $_POST['password'] ?? ''; // Only update if not empty
    
    $stmt = $pdo->prepare("SELECT photo, password FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();
    
    // Password handling
    $hashed_password = $user['password']; // keep old by default
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }
    
    // Photo handling
    $photoName = $user['photo'] ?? '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoName = time() . '_user_' . preg_replace("/[^a-zA-Z0-9.]/", "_", basename($_FILES['photo']['name']));
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $photoName);
    }
    
    try {
        $updateStmt = $pdo->prepare("UPDATE users SET firstname = :fn, lastname = :ln, email = :em, username = :un, contact_info = :ci, password = :pass, photo = :photo WHERE id = :id");
        $updateStmt->execute([
            'fn' => $firstname,
            'ln' => $lastname,
            'em' => $email,
            'un' => $email,
            'ci' => $contact_info,
            'pass' => $hashed_password,
            'photo' => $photoName,
            'id' => $id
        ]);
        
        echo json_encode(['status' => 'success', 'message' => 'User updated successfully.']);
        exit();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database update failed.']);
        exit();
    }
}

require_once 'includes/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$user = null;

if ($id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch();
}

if (!$user) {
    echo "<div class='alert alert-danger'>User not found.</div>";
    require_once 'includes/footer.php';
    exit();
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Edit Admin User</h3>
    <a href="manage_users.php" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left"></i> Back to Users
    </a>
</div>

<div class="admin-card p-4">
    <form id="editUserForm" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">First Name</label>
                <input type="text" name="firstname" class="form-control" required value="<?= htmlspecialchars($user['firstname']) ?>">
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">Last Name</label>
                <input type="text" name="lastname" class="form-control" required value="<?= htmlspecialchars($user['lastname']) ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">Email Address (Used for Login)</label>
                <input type="email" name="email" class="form-control" required value="<?= htmlspecialchars($user['email']) ?>">
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold">Phone Number</label>
                <input type="text" name="contact_info" class="form-control" value="<?= htmlspecialchars($user['contact_info']) ?>">
            </div>
        </div>
        
        <div class="mb-4">
            <label class="form-label fw-semibold">Password <small class="text-muted">(Leave blank to keep current password)</small></label>
            <input type="password" name="password" class="form-control" placeholder="Enter new password to change">
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Profile Photo</label>
            <?php if (!empty($user['photo'])): ?>
                <div class="mb-2">
                    <img src="../images/<?= htmlspecialchars($user['photo']) ?>" alt="Current Photo" width="80" class="rounded border">
                </div>
            <?php endif; ?>
            <input type="file" name="photo" class="form-control" accept="image/*">
            <small class="text-muted">Upload a new photo to replace the current one.</small>
        </div>

        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Update User</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    submitFormAjax('editUserForm', 'edit_user.php', 'manage_users.php');
});
</script>
