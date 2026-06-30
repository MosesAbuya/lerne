<?php
session_start();
require_once 'includes/connection.php';
?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Volunteer With Us | Lerne Adams Foundation</title>
  <meta name="description" content="Volunteer with Lerne Adams Foundation and make a lasting impact in the Lake Victoria Region.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/470215991_1813636732742251_1092272697177516536_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Volunteer With Us</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> Get Involved <span class="mx-2">/</span> Volunteer
          </div>
      </div>
  </section>

  <!-- CONTENT -->
  <section class="laf-section bg-laf-off-white laf-observe">
      <div class="container">
          
          <div class="text-center mb-5">
              <span class="laf-badge mb-3 mx-auto" style="display: table;">Make a Difference</span>
              <h2 class="laf-section-title">Transform a Life Today</h2>
              <p class="text-muted max-w-800 mx-auto lead">
                  Volunteering with the Lerne Adams Foundation allows you to make a lasting impact by supporting projects that uplift vulnerable young girls, families, and communities. Your time and skills will help drive positive change, whether through educational programs, outreach, or advocacy.
              </p>
          </div>

          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="bg-white p-5 rounded shadow-sm" style="border-top: 5px solid var(--laf-green);">
                      <h3 class="font-heading mb-2 text-laf-navy text-center">Volunteer Application</h3>
                      <p class="text-center text-muted mb-4">Fill in the form below to participate and share your skills with us.</p>
                      
                      <div id="responseMessage" class="mb-4 text-center fw-bold"></div>
                      
                      <form id="volunteerForm">
                          <div class="row g-3">
                              <div class="col-md-6">
                                  <label class="form-label small fw-bold text-muted">First Name *</label>
                                  <input type="text" name="first-name" class="form-control form-control-lg bg-light border-0" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label small fw-bold text-muted">Last Name *</label>
                                  <input type="text" name="last-name" class="form-control form-control-lg bg-light border-0" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label small fw-bold text-muted">Email Address *</label>
                                  <input type="email" name="email" class="form-control form-control-lg bg-light border-0" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label small fw-bold text-muted">Phone Number *</label>
                                  <input type="text" name="phone" class="form-control form-control-lg bg-light border-0" required>
                              </div>
                              <div class="col-12">
                                  <label class="form-label small fw-bold text-muted">Physical Address *</label>
                                  <input type="text" name="address" class="form-control form-control-lg bg-light border-0" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label small fw-bold text-muted">Your Age *</label>
                                  <input type="number" name="age" class="form-control form-control-lg bg-light border-0" required min="18" max="99">
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label small fw-bold text-muted">Gender *</label>
                                  <select name="gender" class="form-select form-select-lg bg-light border-0" required>
                                      <option value="" disabled selected>Select your gender</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                      <option value="Other">Other</option>
                                  </select>
                              </div>
                              <div class="col-12">
                                  <label class="form-label small fw-bold text-muted">Areas of Interest *</label>
                                  <input type="text" name="interests" class="form-control form-control-lg bg-light border-0" placeholder="e.g. Health outreach, education, fundraising" required>
                              </div>
                              
                              <div class="col-12 mt-4">
                                  <button type="submit" class="laf-btn laf-btn-green w-100" id="submitBtn">
                                      Submit Application <i class="fas fa-paper-plane ms-2"></i>
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- CTA BANNER -->
  <section class="laf-cta-banner laf-observe">
      <div class="container position-relative z-2">
          <h2 class="display-5 font-heading fw-bold">Be Part of the Change</h2>
          <p class="lead mb-0 max-w-700 mx-auto opacity-75">Join our dedicated team committed to transforming lives.</p>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
  
  <script>
  document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('volunteerForm');
      const msg = document.getElementById('responseMessage');
      const btn = document.getElementById('submitBtn');
      
      form.addEventListener('submit', function(e) {
          e.preventDefault();
          
          btn.innerHTML = 'Submitting... <i class="fas fa-spinner fa-spin ms-2"></i>';
          btn.disabled = true;
          
          const formData = new FormData(form);
          
          fetch('volunteer_process.php', {
              method: 'POST',
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              if(data.status === 'success') {
                  msg.innerHTML = '<span class="text-success"><i class="fas fa-check-circle me-2"></i>' + data.message + '</span>';
                  form.reset();
              } else {
                  msg.innerHTML = '<span class="text-danger"><i class="fas fa-exclamation-circle me-2"></i>' + data.message + '</span>';
              }
              btn.innerHTML = 'Submit Application <i class="fas fa-paper-plane ms-2"></i>';
              btn.disabled = false;
          })
          .catch(error => {
              msg.innerHTML = '<span class="text-danger"><i class="fas fa-exclamation-circle me-2"></i>An error occurred. Please try again.</span>';
              btn.innerHTML = 'Submit Application <i class="fas fa-paper-plane ms-2"></i>';
              btn.disabled = false;
          });
      });
  });
  </script>
</body>
</html>
