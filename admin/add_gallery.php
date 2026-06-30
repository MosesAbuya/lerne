<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../includes/connection.php';
    header('Content-Type: application/json');
    $description = $_POST['description'] ?? '';
    
    $imageNames = [];
    $uploadError = false;

    if (isset($_FILES['images']) && $_FILES['images']['name'][0] != '') {
        $files = $_FILES['images'];
        foreach ($files['name'] as $key => $name) {
            $fileTmpPath = $files['tmp_name'][$key];
            $fileName = time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", basename($name));
            $fileDest = '../images/gallery/' . $fileName;
            
            if (move_uploaded_file($fileTmpPath, $fileDest)) {
                $imageNames[] = $fileName;
            } else {
                $uploadError = true;
            }
        }
    }
    
    try {
        $imagesString = implode(',', $imageNames);
        $stmt = $pdo->prepare("INSERT INTO gallery (description, images) VALUES (:desc, :images)");
        $stmt->execute(['desc' => $description, 'images' => $imagesString]);
        
        echo json_encode(['status' => 'success', 'message' => 'Gallery added successfully.']);
        exit();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        exit();
    }
}

require_once 'includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Add New Gallery</h3>
    <a href="gallery.php" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left"></i> Back to Gallery
    </a>
</div>

<div class="admin-card p-4">
    <form id="addGalleryForm" enctype="multipart/form-data">
        <div class="mb-4">
            <label class="form-label fw-semibold">Description / Title</label>
            <input type="text" name="description" class="form-control" required placeholder="Enter gallery title or description">
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Upload Images</label>
            <input type="file" name="images[]" class="form-control" multiple accept="image/*" required>
            <small class="text-muted">You can select multiple images to upload at once.</small>
            
            <!-- Progress Bar -->
            <div id="upload-progress-wrapper" class="upload-progress-wrapper">
                <div class="progress" style="height: 20px;">
                    <div id="upload-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Save Gallery</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    submitFormAjax('addGalleryForm', 'add_gallery.php', 'gallery.php');
});
</script>
