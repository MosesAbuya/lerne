<?php
session_start();

// Check if it's an AJAX POST for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../includes/connection.php';
    header('Content-Type: application/json');
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
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
        if (!empty($imageNames)) {
            // Fetch existing first
            $stmt = $pdo->prepare("SELECT images FROM gallery WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $gallery = $stmt->fetch();
            
            $existingImages = !empty($gallery['images']) ? explode(',', $gallery['images']) : [];
            $allImages = array_merge($existingImages, $imageNames);
            $imagesString = implode(',', $allImages);
            
            $stmt = $pdo->prepare("UPDATE gallery SET description = :desc, images = :images WHERE id = :id");
            $stmt->execute(['desc' => $description, 'images' => $imagesString, 'id' => $id]);
        } else {
            // Update description only
            $stmt = $pdo->prepare("UPDATE gallery SET description = :desc WHERE id = :id");
            $stmt->execute(['desc' => $description, 'id' => $id]);
        }
        
        echo json_encode(['status' => 'success', 'message' => 'Gallery updated successfully.']);
        exit();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        exit();
    }
}

require_once 'includes/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$gallery = null;

if ($id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM gallery WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $gallery = $stmt->fetch();
}

if (!$gallery) {
    echo "<div class='alert alert-danger'>Gallery not found.</div>";
    require_once 'includes/footer.php';
    exit();
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Edit Gallery #<?= $id ?></h3>
    <a href="gallery.php" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left"></i> Back to Gallery
    </a>
</div>

<div class="admin-card p-4">
    <form id="editGalleryForm" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        
        <div class="mb-4">
            <label class="form-label fw-semibold">Description / Title</label>
            <input type="text" name="description" class="form-control" value="<?= htmlspecialchars($gallery['description']) ?>" required>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Upload More Images</label>
            <input type="file" name="images[]" class="form-control" multiple accept="image/*">
            <small class="text-muted">You can select multiple images. They will be added to the existing ones.</small>
            
            <!-- Progress Bar -->
            <div id="upload-progress-wrapper" class="upload-progress-wrapper">
                <div class="progress" style="height: 20px;">
                    <div id="upload-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Save Changes</button>
    </form>
</div>

<div class="admin-card p-4 mt-4">
    <h5 class="fw-bold mb-3">Manage Existing Images</h5>
    <div class="image-edit-grid">
        <?php 
        $images = !empty($gallery['images']) ? explode(',', $gallery['images']) : [];
        if (count($images) > 0):
            foreach ($images as $img): 
                $imgName = trim($img);
                if (empty($imgName)) continue;
        ?>
            <div class="image-edit-item">
                <img src="../images/gallery/<?= htmlspecialchars($imgName) ?>" alt="Gallery Image">
                <button type="button" class="image-delete-btn" title="Delete Image" onclick="deleteSingleImage('<?= $id ?>', 'gallery', this, '<?= htmlspecialchars($imgName) ?>')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        <?php 
            endforeach;
        else:
        ?>
            <p class="text-muted">No images currently in this gallery.</p>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Override the generic deleteSingleImage to pass the specific image name
    window.deleteSingleImage = function(id, entityType, buttonElement, imageName) {
        Swal.fire({
            title: 'Delete this image?',
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
                        Swal.fire('Deleted!', 'Image has been removed.', 'success');
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

    // Use our global AJAX form submit helper
    submitFormAjax('editGalleryForm', 'edit_gallery.php?id=<?= $id ?>', 'gallery.php');
});
</script>
