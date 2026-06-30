<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../includes/connection.php';
    header('Content-Type: application/json');
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $name = $_POST['name'] ?? '';
    $event_date = $_POST['event_date'] ?? '';
    $event_time = $_POST['event_time'] ?? '';
    $location = $_POST['location'] ?? '';
    $p_category = (int)($_POST['p_category'] ?? 0);
    $description = $_POST['description'] ?? '';
    
    // Photo handling
    $stmt = $pdo->prepare("SELECT photo FROM events WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $event = $stmt->fetch();
    $photoName = $event['photo'] ?? '';

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoName = time() . '_event_' . preg_replace("/[^a-zA-Z0-9.]/", "_", basename($_FILES['photo']['name']));
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $photoName);
    }
    
    try {
        $stmt = $pdo->prepare("UPDATE events SET name = :name, event_date = :date, event_time = :time, location = :loc, p_category = :cat, description = :desc, photo = :photo WHERE id = :id");
        $stmt->execute([
            'name' => $name,
            'date' => $event_date,
            'time' => $event_time,
            'loc' => $location,
            'cat' => $p_category,
            'desc' => $description,
            'photo' => $photoName,
            'id' => $id
        ]);
        
        echo json_encode(['status' => 'success', 'message' => 'Event updated successfully.']);
        exit();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database update failed.']);
        exit();
    }
}

require_once 'includes/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$event = null;

try {
    $stmt = $pdo->prepare("SELECT * FROM events WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $event = $stmt->fetch();
    
    $catStmt = $pdo->query("SELECT * FROM p_category");
    $categories = $catStmt->fetchAll();
} catch (Exception $e) {
    $categories = [];
}

if (!$event) {
    echo "<div class='alert alert-danger'>Event not found.</div>";
    require_once 'includes/footer.php';
    exit();
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Edit Event #<?= $id ?></h3>
    <a href="events.php" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left"></i> Back to Events
    </a>
</div>

<div class="admin-card p-4">
    <form id="editEventForm" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Event Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($event['name']) ?>" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label fw-semibold">Date</label>
                <input type="date" name="event_date" class="form-control" value="<?= htmlspecialchars($event['event_date']) ?>" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label fw-semibold">Time</label>
                <input type="time" name="event_time" class="form-control" value="<?= htmlspecialchars($event['event_time']) ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Location</label>
                <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($event['location']) ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Category</label>
                <select name="p_category" class="form-select" required>
                    <option value="">Select a Category</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>" <?= ($cat['id'] == $event['p_category']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cat['category_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Description / Details</label>
            <textarea name="description" class="form-control" rows="4" required><?= htmlspecialchars($event['description']) ?></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Event Photo</label>
            <?php if(!empty($event['photo'])): ?>
                <div class="mb-2">
                    <img src="../images/<?= htmlspecialchars($event['photo']) ?>" alt="Current Photo" class="rounded border" style="width: 100px; height: 100px; object-fit: cover;">
                </div>
            <?php endif; ?>
            <input type="file" name="photo" class="form-control" accept="image/*">
            <small class="text-muted">Leave empty to keep the existing photo.</small>
            
            <!-- Progress Bar -->
            <div id="upload-progress-wrapper" class="upload-progress-wrapper mt-2">
                <div class="progress" style="height: 20px;">
                    <div id="upload-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Save Changes</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    submitFormAjax('editEventForm', 'edit_event.php?id=<?= $id ?>', 'events.php');
});
</script>
