<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Education Support Programme | Lerne Adams Foundation</title>
  <meta name="description" content="Supporting vulnerable community members, orphans, and single parents for secondary and tertiary education.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- SECTION 1: PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/473365074_1837315983707659_3696841068555528541_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Education Support Programme</h1>
          <div class="laf-breadcrumb">
              <a href="index">Home</a> <span class="mx-2">/</span> <a href="program">Our Work</a> <span class="mx-2">/</span> Education Support
          </div>
      </div>
  </section>

  <!-- ACCENT BAR removed in new design -->

  <!-- PROGRAMME CONTENT -->
  <section class="laf-section bg-white">
      <div class="container">
          <div class="row g-5">
              <!-- Main Content -->
              <div class="col-lg-8">
                  <img src="images/lerne/child-child-2083973_1280.jpg" alt="Education Support" class="img-fluid rounded mb-5 w-100" style="max-height: 480px; object-fit: cover;">

                  <h2 class="laf-program-section-title">Education for the Vulnerable</h2>
                  <p class="laf-program-text">Our Education Support Programme targets vulnerable community members, specifically orphans and children of single parents, facilitating their access to secondary and tertiary education. Focused largely on informal settlements, semi-urban, and rural areas around Lake Victoria, the programme ensures that brilliant but disadvantaged students receive the financial and mentorship support they need to complete their studies.</p>
                  <p class="laf-program-text">We believe education is the single most powerful tool to break the cycle of poverty. By investing in a child&rsquo;s education today, we create a ripple effect of positive change that benefits entire families and communities for generations.</p>

                  <h3 class="font-heading text-laf-navy mb-4 mt-5" style="font-size:1.8rem;">Key Interventions</h3>
                  <ul class="laf-check-list">
                      <li><i class="fas fa-check-circle"></i> <strong>Scholarship Linkage:</strong> Identifying and linking vulnerable students to scholarship opportunities at both national and county level.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Fee Support:</strong> Direct support for school fees and essential academic materials like books and uniforms.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Family Mentorship:</strong> Ensuring both family and community play an active role in the educational journey of each beneficiary.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Progress Monitoring:</strong> Regular follow-ups on academic performance and welfare of supported students.</li>
                  </ul>

                  <!-- Goal Cards -->
                  <div class="laf-goal-cards-wrapper">
                      <div class="laf-goal-card short-term">
                          <h4><i class="fas fa-bullseye"></i> Short-Term Goals</h4>
                          <ul>
                              <li><i class="fas fa-angle-right"></i> Identify 500 vulnerable students annually.</li>
                              <li><i class="fas fa-angle-right"></i> Secure tuition and learning material support.</li>
                              <li><i class="fas fa-angle-right"></i> Establish active mentorship clubs in schools.</li>
                              <li><i class="fas fa-angle-right"></i> Reduce dropout rates by 30% in target areas.</li>
                          </ul>
                      </div>
                      <div class="laf-goal-card long-term">
                          <h4><i class="fas fa-chart-line"></i> Long-Term Goals</h4>
                          <ul>
                              <li><i class="fas fa-angle-right"></i> Eradicate school dropouts in informal settlements.</li>
                              <li><i class="fas fa-angle-right"></i> Empower families to sustain education costs.</li>
                              <li><i class="fas fa-angle-right"></i> Build community scholarship endowment funds.</li>
                              <li><i class="fas fa-angle-right"></i> Increase tertiary enrollment by 50%.</li>
                          </ul>
                      </div>
                  </div>

                  <!-- Impact Box -->
                  <div class="laf-impact-box">
                      <h4 class="text-laf-navy mb-3"><i class="fas fa-chart-bar text-laf-green me-2"></i> Our Impact So Far</h4>
                      <div class="row g-3 mt-2">
                          <div class="col-sm-4 text-center">
                              <div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">150+</div>
                              <div class="text-muted" style="font-size:0.9rem;">Students Supported</div>
                          </div>
                          <div class="col-sm-4 text-center">
                              <div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">92%</div>
                              <div class="text-muted" style="font-size:0.9rem;">Completion Rate</div>
                          </div>
                          <div class="col-sm-4 text-center">
                              <div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">3</div>
                              <div class="text-muted" style="font-size:0.9rem;">Counties Reached</div>
                          </div>
                      </div>
                  </div>

                  <!-- Photo grid -->
                  <div class="row g-3 mt-4">
                      <div class="col-6">
                          <img src="images/lerne/activities/473365074_1837315983707659_3696841068555528541_n.jpg" class="img-fluid rounded w-100" style="height:220px;object-fit:cover;" alt="Education activity">
                      </div>
                      <div class="col-6">
                          <img src="images/lerne/kids-3311090_1280.jpg" class="img-fluid rounded w-100" style="height:220px;object-fit:cover;" alt="Students">
                      </div>
                  </div>
              </div>

              <!-- Sidebar -->
              <div class="col-lg-4">
                  <div class="sticky-top" style="top: 100px;">
                      <div class="laf-help-box">
                          <h3>Help Us Educate</h3>
                          <p class="text-muted mb-4">Your donation can keep a vulnerable child in school for an entire academic year.</p>
                          <a href="donate" class="laf-btn laf-btn-yellow w-100 mb-3" style="display:block;text-align:center;">Donate Now &rarr;</a>
                          <a href="volunteer" class="laf-btn laf-btn-outline-green w-100" style="display:block;text-align:center;">Become a Mentor</a>
                      </div>

                      <div class="mt-4 p-4 rounded" style="background:var(--laf-green-deep);">
                          <h5 class="text-white mb-3">Other Programmes</h5>
                          <ul class="list-unstyled" style="margin:0;">
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="hiv" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>HIV Prevention &amp; Care</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="srh" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Sexual &amp; Reproductive Health</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="sgbv" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>SGBV Advocacy</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="junior" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Child Care &amp; Support</a></li>
                              <li style="padding:8px 0;"><a href="mental-health" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Mental Health</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- CTA -->
  <section class="laf-cta-banner">
      <div class="container text-center position-relative" style="z-index:2;">
          <h2 class="display-5 fw-bold mb-4 text-white">Support a Child's Education</h2>
          <p class="lead mb-5" style="max-width:600px;margin:0 auto 40px;color:rgba(255,255,255,0.8);">Your contribution can provide a scholarship that changes a vulnerable child's future forever.</p>
          <a href="donate" class="laf-btn laf-btn-yellow me-3">Sponsor a Student</a>
          <a href="contact" class="laf-btn laf-btn-outline-white">Partner With Us</a>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>

