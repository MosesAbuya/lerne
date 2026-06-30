<?php
require_once 'includes/header.php';


// Handle Add Report
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $title = $_POST['title'] ?? '';
    $year = $_POST['year'] ?? '';
    $status = $_POST['status'] ?? 'published';
    $file_path = '';

    // Handle File Upload
    if (isset($_FILES['report_file']) && $_FILES['report_file']['error'] == 0) {
        $allowed_ext = ['pdf', 'doc', 'docx'];
        $file_info = pathinfo($_FILES['report_file']['name']);
        $ext = strtolower($file_info['extension']);
        
        if (in_array($ext, $allowed_ext)) {
            $upload_dir = '../uploads/reports/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            $filename = uniqid('report_') . '.' . $ext;
            if (move_uploaded_file($_FILES['report_file']['tmp_name'], $upload_dir . $filename)) {
                $file_path = 'uploads/reports/' . $filename;
            } else {
                $error_msg = "Failed to move uploaded file.";
            }
        } else {
            $error_msg = "Invalid file type. Only PDF and Word docs are allowed.";
        }
    }

    if (empty($error_msg) && !empty($title) && !empty($year) && !empty($file_path)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO annual_reports (title, year, file_path, status) VALUES (?, ?, ?, ?)");
            $stmt->execute([$title, $year, $file_path, $status]);
            $_SESSION['success_msg'] = "Report added successfully.";
            header("Location: reports.php");
            exit();
        } catch (PDOException $e) {
            $error_msg = "Database error: " . $e->getMessage();
        }
    } else if(empty($error_msg)) {
        $error_msg = "Please fill all required fields and upload a file.";
    }
}

// Handle Delete
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    try {
        // Fetch to get file path to delete file
        $stmt = $pdo->prepare("SELECT file_path FROM annual_reports WHERE id = ?");
        $stmt->execute([$_GET['delete']]);
        $report = $stmt->fetch();
        
        if ($report) {
            if (file_exists('../' . $report['file_path'])) {
                unlink('../' . $report['file_path']);
            }
            $delStmt = $pdo->prepare("DELETE FROM annual_reports WHERE id = ?");
            $delStmt->execute([$_GET['delete']]);
            $_SESSION['success_msg'] = "Report deleted successfully.";
        }
        header("Location: reports.php");
        exit();
    } catch (PDOException $e) {
        $error_msg = "Error deleting report: " . $e->getMessage();
    }
}

// Handle Status Toggle
if (isset($_GET['toggle']) && is_numeric($_GET['toggle'])) {
    try {
        $stmt = $pdo->prepare("UPDATE annual_reports SET status = IF(status='published', 'draft', 'published') WHERE id = ?");
        $stmt->execute([$_GET['toggle']]);
        header("Location: reports.php");
        exit();
    } catch (PDOException $e) {
        $error_msg = "Error updating status: " . $e->getMessage();
    }
}

// Fetch Reports
$stmt = $pdo->query("SELECT * FROM annual_reports ORDER BY year DESC, created_at DESC");
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Annual Reports</h3>
    <div>
        <button type="button" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#addReportModal">
            <i class="fas fa-plus"></i> Add New Report
        </button>
    </div>
</div>

<?php if(isset($_SESSION['success_msg'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION['success_msg'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['success_msg']); ?>
<?php endif; ?>

<?php if(isset($error_msg)): ?>
    <div class="alert alert-danger"><?= $error_msg ?></div>
<?php endif; ?>

<div class="admin-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Year</th>
                    <th>Title</th>
                    <th>File</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($reports) > 0): ?>
                    <?php foreach ($reports as $report): ?>
                        <tr>
                            <td><?= $report['id'] ?></td>
                            <td><span class="badge bg-navy text-white px-2 py-1"><?= htmlspecialchars($report['year']) ?></span></td>
                            <td><?= htmlspecialchars($report['title']) ?></td>
                            <td>
                                <a href="../<?= htmlspecialchars($report['file_path']) ?>" target="_blank" class="text-decoration-none">
                                    <i class="fas fa-file-pdf text-danger"></i> View File
                                </a>
                            </td>
                            <td>
                                <?php if ($report['status'] == 'published'): ?>
                                    <span class="badge bg-success">Published</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Draft</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-end">
                                <a href="reports.php?toggle=<?= $report['id'] ?>" class="btn btn-sm btn-outline-secondary" title="Toggle Status">
                                    <i class="fas fa-power-off"></i>
                                </a>
                                <a href="reports.php?delete=<?= $report['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this report?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No reports found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Report Modal -->
<div class="modal fade" id="addReportModal" tabindex="-1" aria-labelledby="addReportModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title fw-bold" id="addReportModalLabel">Add Annual Report</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <input type="hidden" name="action" value="add">
            
            <div class="mb-3">
                <label class="form-label fw-bold">Report Title</label>
                <input type="text" name="title" class="form-control" required placeholder="e.g. 2024 Annual Impact Report">
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Year / Period</label>
                <input type="text" name="year" class="form-control" required placeholder="e.g. 2024-2025">
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Report File (PDF/Word)</label>
                <input type="file" name="report_file" class="form-control" accept=".pdf,.doc,.docx" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select">
                    <option value="published">Published</option>
                    <option value="draft">Draft (Hidden)</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Report</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>
