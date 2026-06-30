<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../includes/connection.php';
    header('Content-Type: application/json');
    $category_name = $_POST['category_name'] ?? '';
    
    try {
        $stmt = $pdo->prepare("INSERT INTO p_category (category_name) VALUES (:name)");
        $stmt->execute(['name' => $category_name]);
        echo json_encode(['status' => 'success', 'message' => 'Program Category added successfully.']);
        exit();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error while saving.']);
        exit();
    }
}

require_once 'includes/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Add New Program Category</h3>
    <a href="p_category.php" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left"></i> Back to Categories
    </a>
</div>

<div class="admin-card p-4">
    <form id="addPCategoryForm">
        <div class="mb-4">
            <label class="form-label fw-semibold">Category Name</label>
            <input type="text" name="category_name" class="form-control" required placeholder="e.g. Health, Education...">
        </div>

        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Save Category</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    submitFormAjax('addPCategoryForm', 'add_p_category.php', 'p_category.php');
});
</script>
