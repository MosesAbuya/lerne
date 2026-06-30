<?php
session_start();
require_once 'includes/connection.php';
?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Gallery | Lerne Adams Foundation</title>
  <meta name="description" content="View the photo gallery of Lerne Adams Foundation's community activities and programmes.">
  <!-- Lightbox CSS (Assuming a standard lightbox script might be added later, or just simple grid for now) -->
  <style>
      .laf-gallery-img {
          height: 300px;
          object-fit: cover;
          width: 100%;
          border-radius: var(--card-radius);
          transition: transform 0.3s ease;
          cursor: pointer;
      }
      .laf-gallery-item {
          overflow: hidden;
          border-radius: var(--card-radius);
          box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      }
      .laf-gallery-item:hover .laf-gallery-img {
          transform: scale(1.05);
      }
  </style>
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/470215991_1813636732742251_1092272697177516536_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Photo Gallery</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> Gallery
          </div>
      </div>
  </section>

  <!-- GALLERY GRID -->
  <section class="laf-section bg-white laf-observe">
      <div class="container">
          <div class="text-center max-w-800 mx-auto mb-5">
              <h2 class="laf-section-title">Moments of Impact</h2>
              <p class="text-muted">A visual journey of our work empowering marginalized communities across the Lake Victoria Region.</p>
          </div>
          
          <div class="row g-4">
              <?php
              // Fetch images from a 'gallery' table if it exists, or just display from a directory for now
              // Since we don't know if a gallery table exists in barrizi, we will dynamically scan the activities folder
              
              $dir = "images/lerne/activities/";
              $images = [];
              if (is_dir($dir)) {
                  $files = scandir($dir);
                  foreach ($files as $file) {
                      $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                      if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                          $images[] = $dir . $file;
                      }
                  }
              }
              
              if (count($images) > 0) {
                  // Display up to 12 images
                  $displayImages = array_slice($images, 0, 12);
                  foreach ($displayImages as $img) {
              ?>
              <div class="col-lg-4 col-md-6 mb-4">
                  <div class="laf-gallery-item h-100">
                      <a href="<?= $img ?>" target="_blank" title="View Full Image">
                          <img src="<?= $img ?>" class="laf-gallery-img" alt="LAF Activity">
                      </a>
                  </div>
              </div>
              <?php
                  }
              } else {
                  echo "<div class='col-12 text-center py-5'><p class='text-muted'>Gallery images will be updated shortly.</p></div>";
              }
              ?>
          </div>
      </div>
  </section>

  <!-- CTA BANNER -->
  <section class="laf-cta-banner laf-observe">
      <div class="container position-relative z-2">
          <h2 class="display-5 font-heading fw-bold">Support Our Work</h2>
          <p class="lead mb-5 max-w-700 mx-auto opacity-75">Every picture tells a story of change. Help us create more beautiful moments.</p>
          <div class="d-flex flex-wrap justify-content-center gap-3">
              <a href="donate.php" class="laf-btn laf-btn-yellow">Donate Now</a>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
