<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Our Impact | Lerne Adams Foundation</title>
  <meta name="description" content="Discover the impact of the Lerne Adams Foundation across the Lake Victoria Region in Kenya.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/470062625_1813644372741487_2345710461182012947_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Our Impact</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> Our Impact
          </div>
      </div>
  </section>

  <!-- INTRO -->
  <section class="laf-section bg-white laf-observe">
      <div class="container text-center max-w-800 mx-auto">
          <span class="laf-badge mb-4 mx-auto" style="display: table;">Making a Difference</span>
          <h2 class="laf-section-title text-center mb-4">Transforming Lives in the Lake Victoria Region</h2>
          <p class="lead text-muted">Since our inception, the Lerne Adams Foundation has been committed to creating measurable, sustainable change for marginalized communities across Homa Bay, Migori, Kisumu, and Siaya counties.</p>
      </div>
  </section>

  <!-- STATS GRID (Dynamic Counters) -->
  <section class="py-5 bg-laf-navy text-white laf-observe">
      <div class="container">
          <div class="row g-4 text-center">
              <div class="col-md-3 col-sm-6">
                  <div class="p-4 border border-secondary border-opacity-25 rounded h-100">
                      <i class="fas fa-users fa-3x text-laf-yellow mb-3"></i>
                      <h2 class="display-5 font-heading fw-bold laf-counter" data-target="10000">0</h2>
                      <p class="mb-0 text-white-50">Direct Beneficiaries</p>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6">
                  <div class="p-4 border border-secondary border-opacity-25 rounded h-100">
                      <i class="fas fa-graduation-cap fa-3x text-laf-green mb-3"></i>
                      <h2 class="display-5 font-heading fw-bold laf-counter" data-target="500">0</h2>
                      <p class="mb-0 text-white-50">Students Supported</p>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6">
                  <div class="p-4 border border-secondary border-opacity-25 rounded h-100">
                      <i class="fas fa-ribbon fa-3x text-laf-red mb-3"></i>
                      <h2 class="display-5 font-heading fw-bold laf-counter" data-target="1200">0</h2>
                      <p class="mb-0 text-white-50">PLHIV Linked to Care</p>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6">
                  <div class="p-4 border border-secondary border-opacity-25 rounded h-100">
                      <i class="fas fa-map-marker-alt fa-3x text-laf-orange mb-3"></i>
                      <h2 class="display-5 font-heading fw-bold laf-counter" data-target="6">0</h2>
                      <p class="mb-0 text-white-50">Sub-Counties Reached</p>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- TESTIMONIALS / SUCCESS STORIES -->
  <section class="laf-section laf-section-bg-light laf-observe">
      <div class="container">
          <h2 class="laf-section-title text-center mb-5">Voices from the Community</h2>
          <div class="row g-4">
              <div class="col-md-4">
                  <div class="bg-white p-4 rounded shadow-sm h-100 border-top border-4 border-laf-green position-relative">
                      <i class="fas fa-quote-left fa-2x text-laf-off-white position-absolute top-0 start-0 mt-3 ms-3"></i>
                      <p class="fst-italic text-muted mt-4">"The Single Parents Project helped me start my own small business. Through the table banking training, I can now comfortably feed my children and keep them in school. I am no longer viewed as a burden in my village."</p>
                      <h6 class="font-heading mb-0 text-laf-navy fw-bold">- Mary, Homa Bay Town</h6>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="bg-white p-4 rounded shadow-sm h-100 border-top border-4 border-laf-blue position-relative">
                      <i class="fas fa-quote-left fa-2x text-laf-off-white position-absolute top-0 start-0 mt-3 ms-3"></i>
                      <p class="fst-italic text-muted mt-4">"After losing both my parents, I thought my education had ended. LAF stepped in to pay my secondary school fees and assigned me a mentor. Today, I am looking forward to joining university."</p>
                      <h6 class="font-heading mb-0 text-laf-navy fw-bold">- Kevin, Karachuonyo</h6>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="bg-white p-4 rounded shadow-sm h-100 border-top border-4 border-laf-orange position-relative">
                      <i class="fas fa-quote-left fa-2x text-laf-off-white position-absolute top-0 start-0 mt-3 ms-3"></i>
                      <p class="fst-italic text-muted mt-4">"The women baraza created a safe space for us to speak about the SGBV issues affecting our community. For the first time, we know our rights and where to seek legal and psychosocial help."</p>
                      <h6 class="font-heading mb-0 text-laf-navy fw-bold">- Sarah, Suba South</h6>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- CTA -->
  <section class="py-5 bg-laf-green text-center laf-observe">
      <div class="container">
          <h3 class="font-heading text-white mb-4">Be Part of the Impact</h3>
          <a href="reports.php" class="laf-btn laf-btn-outline-white mx-2">Read Annual Reports</a>
          <a href="donate.php" class="laf-btn laf-btn-yellow mx-2 text-laf-navy">Support Our Work</a>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
