<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../includes/connection.php';
    header('Content-Type: application/json');
    $name = $_POST['name'] ?? '';
    $event_date = $_POST['event_date'] ?? '';
    $event_time = $_POST['event_time'] ?? '';
    $location = $_POST['location'] ?? '';
    $p_category = (int)($_POST['p_category'] ?? 0);
    $description = $_POST['description'] ?? '';
    
    // Photo handling
    $photoName = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoName = time() . '_event_' . preg_replace("/[^a-zA-Z0-9.]/", "_", basename($_FILES['photo']['name']));
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $photoName);
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO events (name, event_date, event_time, location, p_category, description, photo) VALUES (:name, :date, :time, :loc, :cat, :desc, :photo)");
        $stmt->execute([
            'name' => $name,
            'date' => $event_date,
            'time' => $event_time,
            'loc' => $location,
            'cat' => $p_category,
            'desc' => $description,
            'photo' => $photoName
        ]);
        
        echo json_encode(['status' => 'success', 'message' => 'Event added successfully.']);
        exit();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database insert failed.']);
        exit();
    }
}

require_once 'includes/header.php';

// Fetch categories
try {
    $stmt = $pdo->query("SELECT * FROM p_category");
    $categories = $stmt->fetchAll();
} catch (Exception $e) {
    $categories = [];
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Add New Event</h3>
    <a href="events.php" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left"></i> Back to Events
    </a>
</div>

<div class="admin-card p-4">
    <form id="addEventForm" enctype="multipart/form-data">
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Event Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label fw-semibold">Date</label>
                <input type="date" name="event_date" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label fw-semibold">Time</label>
                <input type="time" name="event_time" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Category</label>
                <select name="p_category" class="form-select" required>
                    <option value="">Select a Category</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['category_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Description / Details</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Event Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*" required>
            
            <!-- Progress Bar -->
            <div id="upload-progress-wrapper" class="upload-progress-wrapper mt-2">
                <div class="progress" style="height: 20px;">
                    <div id="upload-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Save Event</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    submitFormAjax('addEventForm', 'add_event.php', 'events.php');
});
</script>
