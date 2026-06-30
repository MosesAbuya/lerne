<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Our Team | Lerne Adams Foundation</title>
  <meta name="description" content="Meet the dedicated team behind Lerne Adams Foundation, driving positive change across the Lake Victoria Region.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/472317098_1829204007852190_6604253429193190882_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Our Team</h1>
          <div class="laf-breadcrumb">
              <a href="index">Home</a> <span class="mx-2">/</span> <a href="about">About</a> <span class="mx-2">/</span> Our Team
          </div>
      </div>
  </section>

  <!-- TEAM MESSAGE -->
  <section class="laf-section bg-white laf-observe">
      <div class="container text-center max-w-800 mx-auto">
          <span class="laf-badge mb-4 mx-auto" style="display: table;">The People Behind LAF</span>
          <h2 class="laf-section-title text-center mb-5">Dedicated to Community Transformation</h2>
          
          <p class="lead text-muted mb-5 text-start">At the heart of the Lerne Adams Foundation is a passionate team of community health promoters, social workers, educators, and volunteers who work tirelessly to uplift marginalized communities across the Lake Victoria Region.</p>
          
          <div class="row g-4 mb-5 text-start">
              <div class="col-md-6">
                  <div class="p-4 bg-laf-off-white rounded h-100 border-start border-4 border-laf-green">
                      <i class="fas fa-users fa-2x text-laf-green mb-3"></i>
                      <h4 class="font-heading mb-3">Local Roots</h4>
                      <p class="mb-0">Our team members are drawn directly from the communities we serve. They understand the local culture, speak the local languages, and share the lived experiences of our beneficiaries. This grassroots connection is the secret to our effective mobilization and trust.</p>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="p-4 bg-laf-off-white rounded h-100 border-start border-4 border-laf-orange">
                      <i class="fas fa-heart fa-2x text-laf-orange mb-3"></i>
                      <h4 class="font-heading mb-3">Unwavering Commitment</h4>
                      <p class="mb-0">From tracing vulnerable children in slums to organizing peace dialogues in tense regions, our staff brave difficult terrains and challenging circumstances driven purely by the vision of a prosperous, equitable society.</p>
                  </div>
              </div>
          </div>
          
          <p class="text-muted text-start">We are incredibly proud of our Board of Directors, Management Team, and Field Officers for their sacrifice, resilience, and dedication to the mission of the Lerne Adams Foundation.</p>
          
          <div class="mt-5 p-5 bg-laf-navy text-white rounded">
              <h3 class="font-heading text-laf-yellow mb-3">Join Our Mission</h3>
              <p class="mb-4">We are always looking for passionate individuals to volunteer or partner with us in our community initiatives.</p>
              <a href="volunteer" class="laf-btn laf-btn-green">Become a Volunteer</a>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
