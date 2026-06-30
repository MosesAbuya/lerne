<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../includes/connection.php';
    header('Content-Type: application/json');
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $category_name = $_POST['category_name'] ?? '';
    
    try {
        $stmt = $pdo->prepare("UPDATE p_category SET category_name = :name WHERE id = :id");
        $stmt->execute(['name' => $category_name, 'id' => $id]);
        echo json_encode(['status' => 'success', 'message' => 'Program Category updated successfully.']);
        exit();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database update failed.']);
        exit();
    }
}

require_once 'includes/header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$category = null;

if ($id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM p_category WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $category = $stmt->fetch();
}

if (!$category) {
    echo "<div class='alert alert-danger'>Category not found.</div>";
    require_once 'includes/footer.php';
    exit();
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Edit Program Category</h3>
    <a href="p_category.php" class="btn btn-secondary shadow-sm">
        <i class="fas fa-arrow-left"></i> Back to Categories
    </a>
</div>

<div class="admin-card p-4">
    <form id="editPCategoryForm">
        <input type="hidden" name="id" value="<?= $category['id'] ?>">
        <div class="mb-4">
            <label class="form-label fw-semibold">Category Name</label>
            <input type="text" name="category_name" class="form-control" required value="<?= htmlspecialchars($category['category_name']) ?>">
        </div>

        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Update Category</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    submitFormAjax('editPCategoryForm', 'edit_p_category.php', 'p_category.php');
});
</script>
