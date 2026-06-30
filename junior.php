<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Child Care & Support | Lerne Adams Foundation</title>
  <meta name="description" content="LAF Junior Programme provides child protection, nutritional support, and education access to vulnerable children in the Lake Victoria region.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/kids-3311090_1280.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Child Care &amp; Support</h1>
          <div class="laf-breadcrumb"><a href="index.php">Home</a> <span>/</span> <a href="program.php">Our Work</a> <span>/</span> Child Care</div>
      </div>
  </section>

  <section class="laf-section bg-white">
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-8">
                  <img src="images/lerne/child-child-2083973_1280.jpg" alt="Child Care" class="img-fluid rounded mb-5 w-100" style="max-height: 480px; object-fit: cover;">
                  <h2 class="laf-program-section-title">Protecting and Empowering Children</h2>
                  <p class="laf-program-text">LAF's Child Care & Support Programme (Junior Programme) focuses on improving the welfare, health, and educational outcomes of vulnerable children, particularly orphans and children from disadvantaged families. We believe every child deserves protection, love, and the opportunity to reach their full potential.</p>
                  <p class="laf-program-text">Our programme works closely with families, community leaders, and government child protection services to identify at-risk children and connect them with the comprehensive support they need to thrive.</p>
                  
                  <h3 style="font-size:1.8rem;font-weight:800;margin:40px 0 20px;">Key Interventions</h3>
                  <ul class="laf-check-list">
                      <li><i class="fas fa-check-circle"></i> <strong>Child Protection:</strong> Identifying and reporting child abuse, neglect, and exploitation through community networks.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Nutritional Support:</strong> Providing meals and nutritional guidance to malnourished children.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Psychosocial Support:</strong> Play therapy, group counseling, and recreational activities for children who have experienced trauma.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Education Access:</strong> Facilitating enrollment and retention of out-of-school children.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Foster Family Support:</strong> Training and supporting foster families to provide safe, nurturing environments.</li>
                  </ul>

                  <div class="laf-goal-cards-wrapper">
                      <div class="laf-goal-card short-term">
                          <h4><i class="fas fa-bullseye"></i> Short-Term Goals</h4>
                          <ul>
                              <li><i class="fas fa-angle-right"></i> Identify and support 300 at-risk children.</li>
                              <li><i class="fas fa-angle-right"></i> Establish child-friendly safe spaces in 3 communities.</li>
                              <li><i class="fas fa-angle-right"></i> Train 100 caregivers on child protection.</li>
                              <li><i class="fas fa-angle-right"></i> Enroll 200 out-of-school children.</li>
                          </ul>
                      </div>
                      <div class="laf-goal-card long-term">
                          <h4><i class="fas fa-chart-line"></i> Long-Term Goals</h4>
                          <ul>
                              <li><i class="fas fa-angle-right"></i> Eliminate child labor and abuse in target communities.</li>
                              <li><i class="fas fa-angle-right"></i> Achieve 100% school enrollment for children under 18.</li>
                              <li><i class="fas fa-angle-right"></i> Build strong community-based child protection systems.</li>
                              <li><i class="fas fa-angle-right"></i> Ensure every orphaned child has a safe, nurturing home.</li>
                          </ul>
                      </div>
                  </div>

                  <div class="laf-impact-box">
                      <h4><i class="fas fa-chart-bar text-laf-green me-2"></i> Our Impact So Far</h4>
                      <div class="row g-3 mt-2">
                          <div class="col-sm-4 text-center"><div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">300+</div><div class="text-muted">Children Supported</div></div>
                          <div class="col-sm-4 text-center"><div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">15</div><div class="text-muted">Foster Families Trained</div></div>
                          <div class="col-sm-4 text-center"><div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">6</div><div class="text-muted">Safe Spaces</div></div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="sticky-top" style="top: 100px;">
                      <div class="laf-help-box">
                          <h3>Protect a Child</h3>
                          <p class="text-muted mb-4">Your donation provides meals, education support, and psychosocial care for vulnerable children in our communities.</p>
                          <a href="donate.php" class="laf-btn laf-btn-yellow w-100 mb-3" style="display:block;text-align:center;">Donate Now &rarr;</a>
                          <a href="volunteer.php" class="laf-btn laf-btn-outline-green w-100" style="display:block;text-align:center;">Volunteer for Children</a>
                      </div>
                      <div class="mt-4 p-4 rounded" style="background:var(--laf-green-deep);">
                          <h5 class="text-white mb-3">Other Programmes</h5>
                          <ul class="list-unstyled" style="margin:0;">
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="education.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Education Support</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="srh.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Sexual &amp; Reproductive Health</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="sgbv.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>SGBV Advocacy</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="hiv.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>HIV Prevention &amp; Care</a></li>
                              <li style="padding:8px 0;"><a href="mental-health.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Mental Health</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="laf-cta-banner">
      <div class="container text-center position-relative" style="z-index:2;">
          <h2 class="display-5 fw-bold mb-4 text-white">Give Every Child a Chance</h2>
          <p class="lead mb-5" style="max-width:600px;margin:0 auto 40px;color:rgba(255,255,255,0.8);">Help us protect and nurture vulnerable children so they can grow into healthy, educated, and empowered individuals.</p>
          <a href="donate.php" class="laf-btn laf-btn-yellow me-3">Protect a Child</a>
          <a href="volunteer.php" class="laf-btn laf-btn-outline-white">Become a Volunteer</a>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
