<?php
session_start();
require_once 'includes/connection.php';
?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>News & Stories | Lerne Adams Foundation</title>
  <meta name="description" content="Read the latest news, success stories, and updates from the Lerne Adams Foundation.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/pexels-w-10903332.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">News & Stories</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> News & Stories
          </div>
      </div>
  </section>

  <!-- INTRO -->
  <section class="laf-section bg-white laf-observe pb-0">
      <div class="container text-center max-w-800 mx-auto">
          <span class="laf-badge mb-4 mx-auto" style="display: table;">Stay Updated</span>
          <h2 class="laf-section-title text-center mb-4">Latest from the Field</h2>
          <p class="lead text-muted">Discover our latest achievements, community stories, and updates on our various programmes across the Lake Victoria Region.</p>
      </div>
  </section>

  <!-- BLOG GRID -->
  <section class="laf-section bg-white laf-observe">
      <div class="container">
          <div class="row g-4">
              <?php
              // Note: Using PDO from connection.php
              try {
                  $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
                  $stories = $stmt->fetchAll();
                  
                  if (count($stories) > 0) {
                      foreach ($stories as $row) {
                          $image = !empty($row['photo']) ? "images/" . htmlspecialchars($row['photo']) : "images/lerne/placeholder.jpg";
              ?>
              <div class="col-lg-4 col-md-6 mb-4 d-flex">
                  <div class="laf-card border-0 h-100 shadow-sm w-100 d-flex flex-column" style="border-top: 4px solid var(--laf-green);">
                      <img class="img-fluid" src="<?= $image ?>" alt="<?= htmlspecialchars($row['name']) ?>" style="height: 250px; object-fit: cover; width: 100%;">
                      <div class="laf-card-body d-flex flex-column p-4 flex-grow-1">
                          <div class="small text-laf-green fw-bold mb-2">
                              <i class="far fa-calendar-alt me-1"></i> <?= htmlspecialchars($row['product_date']) ?>
                          </div>
                          <h4 class="font-heading mb-3 text-laf-navy"><?= htmlspecialchars($row['name']) ?></h4>
                          <p class="text-muted mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                              <?= htmlspecialchars($row['description']) ?>
                          </p>
                          <a href="blog_details.php?id=<?= $row['id'] ?>" class="laf-btn laf-btn-outline-green mt-auto align-self-start" style="padding: 8px 20px; font-size: 0.9rem;">Read More <i class="fas fa-arrow-right ms-1"></i></a>
                      </div>
                  </div>
              </div>
              <?php
                      }
                  } else {
                      echo "<div class='col-12 text-center py-5'><div class='p-5 bg-laf-off-white rounded text-muted'><i class='fas fa-newspaper fa-3x mb-3 opacity-50'></i><p class='mb-0'>No news stories found at this time.</p></div></div>";
                  }
              } catch (PDOException $e) {
                  echo "<div class='col-12 text-center py-5'><div class='alert alert-warning'>Unable to load stories at this time.</div></div>";
              }
              ?>
          </div>
      </div>
  </section>

  <!-- CTA BANNER -->
  <section class="laf-cta-banner laf-observe">
      <div class="container position-relative z-2">
          <h2 class="display-5 font-heading fw-bold">Be Part of the Story</h2>
          <p class="lead mb-5 max-w-700 mx-auto opacity-75">Partner with us to create more success stories across our marginalized communities.</p>
          <div class="d-flex flex-wrap justify-content-center gap-3">
              <a href="donate.php" class="laf-btn laf-btn-yellow">Support Us</a>
              <a href="contact.php" class="laf-btn laf-btn-outline-white">Get in Touch</a>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
