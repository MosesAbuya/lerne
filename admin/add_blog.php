<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../includes/connection.php';
    header('Content-Type: application/json');
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $product_date = $_POST['product_date'] ?? date('Y-m-d');
    
    // Main Photo handling
    $photoName = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoName = time() . '_main_' . preg_replace("/[^a-zA-Z0-9.]/", "_", basename($_FILES['photo']['name']));
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $photoName);
    }
    
    // Other Photos handling
    $imageNames = [];
    if (isset($_FILES['other_photos']) && $_FILES['other_photos']['name'][0] != '') {
        $files = $_FILES['other_photos'];
        foreach ($files['name'] as $key => $n) {
            $fileTmpPath = $files['tmp_name'][$key];
            $fileName = time() . '_other_' . preg_replace("/[^a-zA-Z0-9.]/", "_", basename($n));
            if (move_uploaded_file($fileTmpPath, '../images/' . $fileName)) {
                $imageNames[] = $fileName;
            }
        }
    }
    
    try {
        $imagesString = json_encode($imageNames);
        $stmt = $pdo->prepare("INSERT INTO products (name, description, product_date, photo, other_photos) VALUES (:name, :desc, :date, :photo, :other)");
        $stmt->execute([
            'name' => $name,
            'desc' => $description,
            'date' => $product_date,
            'photo' => $photoName,
            'other' => $imagesString
        ]);
        
        echo json_encode(['status' => 'success', 'message' => 'Story added successfully.']);
        exit();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        exit();
    }
}

require_once 'includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Add New Story</h3>
    <a href="blog.php" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left"></i> Back to Stories
    </a>
</div>

<div class="admin-card p-4">
    <form id="addBlogForm" enctype="multipart/form-data">
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Story Title / Name</label>
                <input type="text" name="name" class="form-control" required placeholder="E.g. A life changed in Dandora">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Date</label>
                <input type="date" name="product_date" class="form-control" value="<?= date('Y-m-d') ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Description / Content</label>
            <textarea name="description" class="form-control" rows="5" required placeholder="Write the story here..."></textarea>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Main Photo (Cover)</label>
                <input type="file" name="photo" class="form-control" accept="image/*" required>
            </div>
            
            <div class="col-md-6">
                <label class="form-label fw-semibold">Upload More Photos (Gallery)</label>
                <input type="file" name="other_photos[]" class="form-control" multiple accept="image/*">
                <small class="text-muted">You can select multiple supporting photos.</small>
            </div>
        </div>
        
        <!-- Progress Bar -->
        <div id="upload-progress-wrapper" class="upload-progress-wrapper mb-3">
            <div class="progress" style="height: 20px;">
                <div id="upload-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Save Story</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    submitFormAjax('addBlogForm', 'add_blog.php', 'blog.php');
});
</script>
