<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../includes/connection.php';
    header('Content-Type: application/json');
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $product_date = $_POST['product_date'] ?? date('Y-m-d');
    
    $stmt = $pdo->prepare("SELECT photo, other_photos FROM products WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $story = $stmt->fetch();

    // Main Photo handling
    $photoName = $story['photo'] ?? '';
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
        $existingImages = !empty($story['other_photos']) ? json_decode($story['other_photos'], true) : [];
        if (!is_array($existingImages)) $existingImages = []; // fallback if corrupt
        $allImages = array_merge($existingImages, $imageNames);
        $imagesString = json_encode(array_values($allImages));
        
        $updateStmt = $pdo->prepare("UPDATE products SET name = :name, description = :desc, product_date = :date, photo = :photo, other_photos = :other_photos WHERE id = :id");
        $updateStmt->execute([
            'name' => $name,
            'desc' => $description,
            'date' => $product_date,
            'photo' => $photoName,
            'other_photos' => $imagesString,
            'id' => $id
        ]);
        
        echo json_encode(['status' => 'success', 'message' => 'Story updated successfully.']);
        exit();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        exit();
    }
}

require_once 'includes/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$story = null;

if ($id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $story = $stmt->fetch();
}

if (!$story) {
    echo "<div class='alert alert-danger'>Story not found.</div>";
    require_once 'includes/footer.php';
    exit();
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Edit Story #<?= $id ?></h3>
    <a href="blog.php" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left"></i> Back to Stories
    </a>
</div>

<div class="admin-card p-4">
    <form id="editBlogForm" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Story Title / Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($story['name']) ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Date</label>
                <input type="date" name="product_date" class="form-control" value="<?= htmlspecialchars($story['date'] ?? '') ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Description / Content</label>
            <textarea name="description" class="form-control" rows="5" required><?= htmlspecialchars($story['description']) ?></textarea>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Main Photo (Replace)</label>
                <?php if(!empty($story['photo'])): ?>
                    <div class="mb-2">
                        <img src="../images/<?= htmlspecialchars($story['photo']) ?>" alt="Main Photo" class="rounded border" style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                <?php endif; ?>
                <input type="file" name="photo" class="form-control" accept="image/*">
                <small class="text-muted">Leave empty to keep existing photo.</small>
            </div>
            
            <div class="col-md-6">
                <label class="form-label fw-semibold">Upload More Photos (Gallery)</label>
                <input type="file" name="other_photos[]" class="form-control" multiple accept="image/*">
                <small class="text-muted">Select multiple. They'll be appended to existing ones.</small>
            </div>
        </div>
        
        <!-- Progress Bar -->
        <div id="upload-progress-wrapper" class="upload-progress-wrapper mb-3">
            <div class="progress" style="height: 20px;">
                <div id="upload-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Save Changes</button>
    </form>
</div>

<div class="admin-card p-4 mt-4">
    <h5 class="fw-bold mb-3">Manage Gallery Photos for this Story</h5>
    <div class="image-edit-grid">
        <?php 
        $images = !empty($story['other_photos']) ? json_decode($story['other_photos'], true) : [];
        if (!is_array($images)) $images = [];
        
        if (count($images) > 0):
            foreach ($images as $img): 
                $imgName = trim($img);
                if (empty($imgName)) continue;
        ?>
            <div class="image-edit-item">
                <img src="../images/<?= htmlspecialchars($imgName) ?>" alt="Other Photo">
                <button type="button" class="image-delete-btn" title="Delete Image" onclick="deleteSingleImage('<?= $id ?>', 'blog', this, '<?= htmlspecialchars($imgName) ?>')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        <?php 
            endforeach;
        else:
        ?>
            <p class="text-muted">No additional photos currently attached to this story.</p>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    window.deleteSingleImage = function(id, entityType, buttonElement, imageName) {
        Swal.fire({
            title: 'Delete this photo?',
            text: "It will be permanently removed.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('delete_single_image.php', {
                    id: id,
                    type: entityType,
                    image_name: imageName
                })
                .then(function(response) {
                    if (response.data.status === 'success') {
                        buttonElement.closest('.image-edit-item').remove();
                        Swal.fire('Deleted!', 'Photo has been removed.', 'success');
                    } else {
                        Swal.fire('Error', response.data.message, 'error');
                    }
                })
                .catch(function(error) {
                    Swal.fire('Error', 'Server communication failed.', 'error');
                });
            }
        });
    };

    submitFormAjax('editBlogForm', 'edit_blog.php?id=<?= $id ?>', 'blog.php');
});
</script>
