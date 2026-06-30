<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Support Us | Lerne Adams Foundation</title>
  <meta name="description" content="Support the Lerne Adams Foundation. Discover how you can partner with us to transform lives in the Lake Victoria Region.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/473365074_1837315983707659_3696841068555528541_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Support Our Work</h1>
          <div class="laf-breadcrumb">
              <a href="index">Home</a> <span class="mx-2">/</span> Support Us
          </div>
      </div>
  </section>

  <!-- CONTENT -->
  <section class="laf-section bg-laf-off-white laf-observe">
      <div class="container">
          
          <div class="text-center mb-5">
              <span class="laf-badge mb-3 mx-auto" style="display: table;">Partner With Us</span>
              <h2 class="laf-section-title">Your Support Changes Lives</h2>
              <p class="text-muted max-w-800 mx-auto lead">
                  We are currently updating our online donation portal. In the meantime, if you would like to support our initiatives, sponsor a child's education, or partner with us on any of our community projects, please reach out directly to our finance and partnerships team.
              </p>
          </div>

          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="bg-white p-5 rounded shadow-sm text-center" style="border-top: 5px solid var(--laf-green);">
                      
                      <div class="mb-5">
                          <i class="fas fa-handshake fa-4x text-laf-green mb-4"></i>
                          <h3 class="font-heading mb-3 text-laf-navy">Get In Touch To Donate</h3>
                          <p class="text-muted mb-0">We accept direct bank transfers, mobile money, and in-kind donations. Contact us for our official banking details.</p>
                      </div>
                      
                      <div class="row g-4 justify-content-center text-start">
                          <div class="col-md-6">
                              <div class="p-4 bg-light rounded h-100">
                                  <div class="d-flex align-items-center mb-3">
                                      <div class="bg-laf-orange rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                          <i class="fas fa-phone-alt text-white"></i>
                                      </div>
                                      <h5 class="mb-0 font-heading text-laf-navy">Call Us</h5>
                                  </div>
                                  <p class="mb-1 text-muted">+254 713 736700</p>
                                  <p class="mb-0 text-muted">+254 722 116416</p>
                              </div>
                          </div>
                          
                          <div class="col-md-6">
                              <div class="p-4 bg-light rounded h-100">
                                  <div class="d-flex align-items-center mb-3">
                                      <div class="bg-laf-blue rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                          <i class="fas fa-envelope text-white"></i>
                                      </div>
                                      <h5 class="mb-0 font-heading text-laf-navy">Email Us</h5>
                                  </div>
                                  <p class="mb-0 text-muted">info@lerneadamsfoundation.org</p>
                              </div>
                          </div>
                      </div>
                      
                      <div class="mt-5">
                          <a href="contact" class="laf-btn laf-btn-green w-100">Send Us a Message</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>