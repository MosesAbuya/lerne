<?php
session_start();
require_once 'includes/connection.php';
?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Annual Reports | Lerne Adams Foundation</title>
  <meta name="description" content="Download and read the annual reports of the Lerne Adams Foundation to track our progress, financials, and community impact.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/pexels-jorgeural-9170036.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Annual Reports</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> Get Involved <span class="mx-2">/</span> Reports
          </div>
      </div>
  </section>

  <!-- INTRO SECTION -->
  <section class="laf-section bg-white laf-observe">
      <div class="container text-center max-w-800 mx-auto">
          <span class="laf-badge mb-4 mx-auto" style="display: table;">Transparency & Accountability</span>
          <h2 class="laf-section-title text-center mb-4">Our Commitment to Transparency</h2>
          <p class="lead text-muted mb-5">At the Lerne Adams Foundation, we believe that transparency is the foundation of trust. We are committed to openly sharing our financial records, strategic progress, and community impact with our partners, donors, and the communities we serve.</p>
      </div>
  </section>

  <!-- REPORTS GRID -->
  <section class="laf-section laf-section-bg-light laf-observe pt-0">
      <div class="container">
          <div class="row g-4 justify-content-center">
              <?php
              try {
                  $stmt = $pdo->query("SELECT * FROM annual_reports ORDER BY year DESC, id DESC");
                  $reports = $stmt->fetchAll();

                  if (count($reports) > 0) {
                      foreach ($reports as $report) {
                          $cover = !empty($report['cover_image']) ? "images/reports/" . htmlspecialchars($report['cover_image']) : "images/lerne/placeholder.jpg";
              ?>
              <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="card border-0 shadow-sm h-100 text-center rounded overflow-hidden" style="border-top: 4px solid var(--laf-green);">
                      <div class="bg-laf-off-white py-4 d-flex justify-content-center align-items-center" style="height: 200px;">
                          <!-- Use cover image if provided, else generic icon -->
                          <?php if(!empty($report['cover_image'])): ?>
                              <img src="<?= $cover ?>" alt="Cover" class="img-fluid h-100 w-100" style="object-fit: cover;">
                          <?php else: ?>
                              <i class="fas fa-file-pdf fa-5x text-danger opacity-75"></i>
                          <?php endif; ?>
                      </div>
                      <div class="card-body p-4 d-flex flex-column">
                          <span class="badge bg-laf-navy text-laf-yellow mb-3 mx-auto" style="font-size: 1rem;"><?= htmlspecialchars($report['year']) ?></span>
                          <h5 class="font-heading mb-4 text-laf-navy"><?= htmlspecialchars($report['title']) ?></h5>
                          
                          <a href="uploads/reports/<?= htmlspecialchars($report['pdf_path']) ?>" target="_blank" class="laf-btn laf-btn-outline-green mt-auto w-100" download>
                              <i class="fas fa-download me-2"></i> Download PDF
                          </a>
                      </div>
                  </div>
              </div>
              <?php
                      }
                  } else {
                      echo "<div class='col-12 text-center py-5'><div class='p-5 bg-white rounded shadow-sm text-muted'><i class='fas fa-folder-open fa-3x mb-3 opacity-50'></i><p class='mb-0'>Reports are currently being updated and will be available soon.</p></div></div>";
                  }
              } catch (PDOException $e) {
                  echo "<div class='col-12 text-center py-5'><div class='alert alert-warning'>Unable to load reports at this time.</div></div>";
              }
              ?>
          </div>
      </div>
  </section>

  <!-- CTA BANNER -->
  <section class="laf-cta-banner laf-observe">
      <div class="container position-relative z-2">
          <h2 class="display-5 font-heading fw-bold">Have Questions About Our Work?</h2>
          <p class="lead mb-5 max-w-700 mx-auto opacity-75">We are happy to provide further details regarding our operations and financial allocations.</p>
          <div class="d-flex flex-wrap justify-content-center gap-3">
              <a href="contact.php" class="laf-btn laf-btn-yellow text-laf-navy">Contact Us</a>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
