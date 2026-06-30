<?php
session_start();
require_once 'includes/connection.php';

$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    header("Location: blog.php");
    exit();
}

$story = null;
try {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $story = $stmt->fetch();
} catch (PDOException $e) {
    // Silently handle error, redirect if not found
}

if (!$story) {
    header("Location: blog.php");
    exit();
}

$image = !empty($story['photo']) ? "images/" . htmlspecialchars($story['photo']) : "images/lerne/placeholder.jpg";
?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title><?= htmlspecialchars($story['name']) ?> | Lerne Adams Foundation</title>
  <meta name="description" content="<?= htmlspecialchars(substr($story['description'], 0, 150)) ?>...">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/pexels-w-10903332.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-5 fw-bold text-truncate mx-auto" style="max-width: 900px;"><?= htmlspecialchars($story['name']) ?></h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> <a href="blog.php">News & Stories</a> <span class="mx-2">/</span> Article
          </div>
      </div>
  </section>

  <!-- STORY DETAIL SECTION -->
  <section class="laf-section bg-white laf-observe">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-10">
                  <div class="bg-white rounded shadow-sm overflow-hidden border border-1">
                      <img src="<?= $image ?>" alt="<?= htmlspecialchars($story['name']) ?>" class="img-fluid w-100" style="max-height: 500px; object-fit: cover;">
                      
                      <div class="p-5">
                          <div class="d-flex align-items-center mb-4 text-laf-green fw-bold">
                              <i class="far fa-calendar-alt me-2"></i> <?= htmlspecialchars($story['product_date']) ?>
                          </div>
                          
                          <h2 class="font-heading text-laf-navy mb-4"><?= htmlspecialchars($story['name']) ?></h2>
                          
                          <div class="text-muted lh-lg fs-5">
                              <?= nl2br(htmlspecialchars($story['description'])) ?>
                          </div>
                          
                          <hr class="my-5">
                          
                          <!-- Share Links (Static for now) -->
                          <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                              <a href="blog.php" class="laf-btn laf-btn-outline-green"><i class="fas fa-arrow-left me-2"></i> Back to Stories</a>
                              <div class="d-flex align-items-center gap-3">
                                  <span class="fw-bold text-laf-navy">Share:</span>
                                  <a href="#" class="btn btn-outline-primary rounded-circle" style="width: 40px; height: 40px; padding: 6px;"><i class="fab fa-facebook-f"></i></a>
                                  <a href="#" class="btn btn-outline-info rounded-circle" style="width: 40px; height: 40px; padding: 6px;"><i class="fab fa-twitter"></i></a>
                                  <a href="#" class="btn btn-outline-success rounded-circle" style="width: 40px; height: 40px; padding: 6px;"><i class="fab fa-whatsapp"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
