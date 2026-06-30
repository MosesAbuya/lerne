<?php
session_start();
require_once 'includes/connection.php';

// Form Handling (AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $name = filter_var($_POST['name'] ?? '', FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'] ?? '', FILTER_SANITIZE_STRING);
    $subject = filter_var($_POST['subject'] ?? '', FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'] ?? '', FILTER_SANITIZE_STRING);

    if ($name && $email && $message && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $email, $phone, $subject, $message]);
            echo json_encode(['status' => 'success', 'message' => 'Thank you for contacting us! We have received your message and will get back to you shortly.']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'Something went wrong. Please try again later.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields with valid information.']);
    }
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Contact Us | Lerne Adams Foundation</title>
  <meta name="description" content="Get in touch with Lerne Adams Foundation. Find our office address in Homa Bay, Kenya, phone numbers, email, and contact form.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- SECTION 1: PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/pexels-hidlson-10394594.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Contact Us</h1>
          <div class="laf-breadcrumb">
              <a href="index">Home</a> <span class="mx-2">/</span> Contact
          </div>
      </div>
  </section>

  <!-- SECTION 2: CONTACT INFO & FORM -->
  <section class="laf-section bg-laf-off-white laf-observe">
      <div class="container">
          <div class="row g-5">
              <!-- Left Column: Info -->
              <div class="col-lg-5">
                  <span class="laf-badge">Reach Out</span>
                  <h2 class="laf-section-title">Get In Touch</h2>
                  <p class="mb-5 text-muted">Have a question about our programmes, want to partner with us, or need more information? We'd love to hear from you.</p>

                  <div class="card border-0 shadow-sm mb-4 bg-white" style="border-radius: var(--card-radius); border-left: 5px solid var(--laf-green) !important;">
                      <div class="card-body p-4 d-flex align-items-start">
                          <div class="bg-laf-off-white rounded-circle d-flex align-items-center justify-content-center me-4" style="width: 50px; height: 50px; min-width: 50px;">
                              <i class="fas fa-map-marker-alt text-laf-green fs-5"></i>
                          </div>
                          <div>
                              <h5 class="font-heading mb-1 text-laf-navy">Our Office</h5>
                              <p class="mb-0 text-muted">P.O. Box 1740-40100<br>Kisumu, Kenya</p>
                          </div>
                      </div>
                  </div>

                  <div class="card border-0 shadow-sm mb-4 bg-white" style="border-radius: var(--card-radius); border-left: 5px solid var(--laf-orange) !important;">
                      <div class="card-body p-4 d-flex align-items-start">
                          <div class="bg-laf-off-white rounded-circle d-flex align-items-center justify-content-center me-4" style="width: 50px; height: 50px; min-width: 50px;">
                              <i class="fas fa-phone-alt text-laf-orange fs-5"></i>
                          </div>
                          <div>
                              <h5 class="font-heading mb-1 text-laf-navy">Phone Number</h5>
                              <p class="mb-0 text-muted">+254 713 736700<br>+254 722 116416</p>
                          </div>
                      </div>
                  </div>

                  <div class="card border-0 shadow-sm mb-4 bg-white" style="border-radius: var(--card-radius); border-left: 5px solid var(--laf-blue) !important;">
                      <div class="card-body p-4 d-flex align-items-start">
                          <div class="bg-laf-off-white rounded-circle d-flex align-items-center justify-content-center me-4" style="width: 50px; height: 50px; min-width: 50px;">
                              <i class="fas fa-envelope text-laf-blue fs-5"></i>
                          </div>
                          <div>
                              <h5 class="font-heading mb-1 text-laf-navy">Email Address</h5>
                              <p class="mb-0 text-muted">info@lerneadamsfoundation.org</p>
                          </div>
                      </div>
                  </div>

                  <div class="mt-5">
                      <h5 class="font-heading mb-3">Connect With Us</h5>
                      <div class="d-flex gap-3">
                          <a href="https://www.facebook.com/p/Lerne-Adams-Foundation-100069796814785/" target="_blank" class="btn btn-outline-primary rounded-circle" style="width:45px; height:45px; padding:10px;"><i class="fab fa-facebook-f"></i></a>
                          <a href="https://wa.me/254713736700" target="_blank" class="btn btn-outline-success rounded-circle" style="width:45px; height:45px; padding:10px;"><i class="fab fa-whatsapp"></i></a>
                      </div>
                  </div>
              </div>

              <!-- Right Column: Form -->
              <div class="col-lg-7">
                  <div class="bg-white p-5 shadow-sm h-100" style="border-radius: var(--card-radius);">
                      <h3 class="font-heading mb-4 text-laf-navy">Send Us a Message</h3>
                      
                      <div id="formMessageStatus"></div>

                      <form id="contactForm">
                          <div class="row g-3">
                              <div class="col-md-6">
                                  <label class="form-label fw-bold text-muted small">Full Name *</label>
                                  <input type="text" name="name" class="form-control form-control-lg bg-light border-0" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label fw-bold text-muted small">Email Address *</label>
                                  <input type="email" name="email" class="form-control form-control-lg bg-light border-0" required>
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label fw-bold text-muted small">Phone Number</label>
                                  <input type="text" name="phone" class="form-control form-control-lg bg-light border-0">
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label fw-bold text-muted small">Subject</label>
                                  <input type="text" name="subject" class="form-control form-control-lg bg-light border-0">
                              </div>
                              <div class="col-12">
                                  <label class="form-label fw-bold text-muted small">Your Message *</label>
                                  <textarea name="message" class="form-control form-control-lg bg-light border-0" rows="5" required></textarea>
                              </div>
                              <div class="col-12 mt-4">
                                  <button type="submit" class="laf-btn laf-btn-green w-100 border-0" id="submitBtn">Send Message <i class="fas fa-paper-plane ms-2"></i></button>
                              </div>
                          </div>
                      </form>
                      
                      <script>
                          document.getElementById('contactForm').addEventListener('submit', function(e) {
                              e.preventDefault();
                              const form = this;
                              const btn = document.getElementById('submitBtn');
                              const statusDiv = document.getElementById('formMessageStatus');
                              const formData = new FormData(form);
                              
                              btn.disabled = true;
                              btn.innerHTML = 'Sending... <i class="fas fa-spinner fa-spin ms-2"></i>';
                              statusDiv.innerHTML = '';
                              
                              fetch('contact.php', {
                                  method: 'POST',
                                  body: formData
                              })
                              .then(response => response.json())
                              .then(data => {
                                  btn.disabled = false;
                                  btn.innerHTML = 'Send Message <i class="fas fa-paper-plane ms-2"></i>';
                                  if(data.status === 'success') {
                                      statusDiv.innerHTML = `<div class='alert alert-success'><i class='fas fa-check-circle me-2'></i>${data.message}</div>`;
                                      form.reset();
                                  } else {
                                      statusDiv.innerHTML = `<div class='alert alert-danger'><i class='fas fa-exclamation-circle me-2'></i>${data.message}</div>`;
                                  }
                              })
                              .catch(error => {
                                  btn.disabled = false;
                                  btn.innerHTML = 'Send Message <i class="fas fa-paper-plane ms-2"></i>';
                                  statusDiv.innerHTML = `<div class='alert alert-danger'><i class='fas fa-exclamation-circle me-2'></i>A network error occurred. Please try again.</div>`;
                              });
                          });
                      </script>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- SECTION 3: MAP -->
  <section class="laf-observe">
      <div style="height: 500px; width: 100%;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510567!2d34.2!3d-0.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182a9cf21f76db79%3A0x8a20fc60c57fbc94!2sHoma%20Bay!5e0!3m2!1sen!2ske!4v1" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
  </section>

  <!-- SECTION 4: OPERATIONAL AREAS -->
  <section class="laf-section bg-laf-navy text-white laf-observe">
      <div class="container text-center">
          <h2 class="font-heading mb-5">Our Operational Scope</h2>
          <div class="row g-4 justify-content-center">
              <div class="col-lg-3 col-sm-6">
                  <div class="p-4 border border-secondary border-opacity-25 rounded h-100 text-center">
                      <i class="fas fa-map text-laf-green fs-1 mb-3"></i>
                      <h4 class="mb-2">Homa Bay</h4>
                      <p class="small text-white-50 mb-0">Headquarters & primary operations area.</p>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="p-4 border border-secondary border-opacity-25 rounded h-100 text-center">
                      <i class="fas fa-map-pin text-laf-yellow fs-1 mb-3"></i>
                      <h4 class="mb-2">Migori</h4>
                      <p class="small text-white-50 mb-0">Active outreach and advocacy programmes.</p>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="p-4 border border-secondary border-opacity-25 rounded h-100 text-center">
                      <i class="fas fa-compass text-laf-orange fs-1 mb-3"></i>
                      <h4 class="mb-2">Kisumu</h4>
                      <p class="small text-white-50 mb-0">Administrative linkage and urban initiatives.</p>
                  </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                  <div class="p-4 border border-secondary border-opacity-25 rounded h-100 text-center">
                      <i class="fas fa-globe-africa text-laf-blue fs-1 mb-3"></i>
                      <h4 class="mb-2">Siaya</h4>
                      <p class="small text-white-50 mb-0">Lake Victoria basin health and environment.</p>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
