<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>SGBV Advocacy Programme | Lerne Adams Foundation</title>
  <meta name="description" content="LAF runs a robust SGBV Advocacy Programme combating gender-based violence through prevention campaigns, survivor support, legal aid linkage, and policy advocacy in the Lake Victoria region.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- SECTION 1: PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/girl-469157_1280.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">SGBV Advocacy Programme</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> <a href="program.php">Our Work</a> <span class="mx-2">/</span> SGBV Advocacy
          </div>
      </div>
  </section>

  <!-- ACCENT BAR -->
  <div style="height: 10px; background-color: var(--laf-sgbv-red); width: 100%;"></div>

  <!-- SECTION 2: PROGRAMME CONTENT (two-column sidebar layout) -->
  <section class="laf-section bg-white">
      <div class="container">
          <div class="row g-5">

              <!-- ========== MAIN CONTENT (col-lg-8) ========== -->
              <div class="col-lg-8">

                  <!-- Hero Image -->
                  <img src="images/lerne/women-7346252_1280.jpg"
                       onerror="this.onerror=null;this.src='images/lerne/girl-469157_1280.jpg';"
                       alt="SGBV Advocacy"
                       class="img-fluid rounded mb-5 w-100"
                       style="max-height: 480px; object-fit: cover;">

                  <!-- Headline & Body -->
                  <h2 class="laf-program-section-title">Combating Gender-Based Violence</h2>
                  <p class="laf-program-text">Lerne Adams Foundation runs a robust SGBV (Sexual and Gender-Based Violence) Advocacy Programme in partnership with county governments, law enforcement, and community organizations. We work to prevent violence before it occurs through education and community sensitization, while also providing comprehensive support services for survivors including legal aid linkage, psychosocial counseling, and safe shelter referrals.</p>

                  <!-- Key Interventions -->
                  <h3 class="font-heading text-laf-navy mb-4 mt-5" style="font-size:1.8rem;">Key Interventions</h3>
                  <ul class="laf-check-list">
                      <li><i class="fas fa-check-circle"></i> <strong>Prevention Campaigns:</strong> Community education drives targeting schools, markets, and religious centers on GBV prevention.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Survivor Support:</strong> Safe spaces, psychosocial counseling, and legal aid linkage for SGBV survivors.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Bystander Training:</strong> Empowering community members to safely intervene when witnessing GBV.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Male Engagement:</strong> Working with men and boys as champions for gender equality and GBV prevention.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Policy Advocacy:</strong> Engaging county and national government on enforcement of anti-SGBV legislation.</li>
                  </ul>

                  <!-- Goal Cards -->
                  <div class="laf-goal-cards-wrapper">
                      <div class="laf-goal-card short-term">
                          <h4><i class="fas fa-bullseye"></i> Short-Term Goals</h4>
                          <ul>
                              <li><i class="fas fa-angle-right"></i> Train 2,000 community members as GBV prevention champions.</li>
                              <li><i class="fas fa-angle-right"></i> Establish 3 safe spaces for survivors.</li>
                              <li><i class="fas fa-angle-right"></i> Link 100% of survivors to legal and medical services.</li>
                              <li><i class="fas fa-angle-right"></i> Sensitize 50 local administrators.</li>
                          </ul>
                      </div>
                      <div class="laf-goal-card long-term">
                          <h4><i class="fas fa-chart-line"></i> Long-Term Goals</h4>
                          <ul>
                              <li><i class="fas fa-angle-right"></i> Eliminate domestic violence in target communities.</li>
                              <li><i class="fas fa-angle-right"></i> Build a community-led GBV reporting system.</li>
                              <li><i class="fas fa-angle-right"></i> Achieve full prosecution of all GBV perpetrators.</li>
                              <li><i class="fas fa-angle-right"></i> Change social norms around gender and violence.</li>
                          </ul>
                      </div>
                  </div>

                  <!-- Impact Box -->
                  <div class="laf-impact-box">
                      <h4 class="text-laf-navy mb-3"><i class="fas fa-chart-bar text-laf-sgbv-red me-2"></i> Our Impact So Far</h4>
                      <div class="row g-3 mt-2">
                          <div class="col-sm-4 text-center">
                              <div style="font-size:2.5rem;font-weight:800;color:var(--laf-sgbv-red);">800+</div>
                              <div class="text-muted" style="font-size:0.9rem;">Community Members Sensitized</div>
                          </div>
                          <div class="col-sm-4 text-center">
                              <div style="font-size:2.5rem;font-weight:800;color:var(--laf-sgbv-red);">120</div>
                              <div class="text-muted" style="font-size:0.9rem;">Survivors Supported</div>
                          </div>
                          <div class="col-sm-4 text-center">
                              <div style="font-size:2.5rem;font-weight:800;color:var(--laf-sgbv-red);">5</div>
                              <div class="text-muted" style="font-size:0.9rem;">Safe Spaces Established</div>
                          </div>
                      </div>
                  </div>

              </div><!-- /col-lg-8 -->

              <!-- ========== SIDEBAR (col-lg-4) ========== -->
              <div class="col-lg-4">
                  <div class="sticky-top" style="top: 100px;">

                      <!-- Help Box -->
                      <div class="laf-help-box">
                          <h3>Support Survivors</h3>
                          <p class="text-muted mb-4">Help us provide safe spaces, legal aid, and psychosocial support to survivors of gender-based violence.</p>
                          <a href="donate.php" class="laf-btn laf-btn-yellow w-100 mb-3" style="display:block;text-align:center;">Donate Now &rarr;</a>
                          <a href="volunteer.php" class="laf-btn laf-btn-outline-green w-100" style="display:block;text-align:center;">Volunteer or Mentor</a>
                      </div>

                      <!-- Other Programmes -->
                      <div class="mt-4 p-4 rounded" style="background:var(--laf-navy);">
                          <h5 class="text-white mb-3">Other Programmes</h5>
                          <ul class="list-unstyled" style="margin:0;">
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="hiv.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>HIV Prevention &amp; Care</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="srh.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Sexual &amp; Reproductive Health</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="education.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Education Support</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="junior.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Child Care &amp; Support</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="mental-health.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Mental Health</a></li>
                              <li style="padding:8px 0;"><a href="community.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Community Empowerment</a></li>
                          </ul>
                      </div>

                  </div>
              </div><!-- /col-lg-4 -->

          </div><!-- /row -->
      </div><!-- /container -->
  </section>

  <!-- CTA BANNER -->
  <section class="laf-cta-banner laf-observe" style="background: linear-gradient(135deg, var(--laf-sgbv-red), #501010);">
      <div class="container text-center position-relative" style="z-index:2;">
          <h2 class="display-5 fw-bold mb-4 text-white">Stand Against Gender-Based Violence</h2>
          <p class="lead mb-5" style="max-width:680px;margin:0 auto 40px;color:rgba(255,255,255,0.8);">Together we can end SGBV. Support our advocacy programmes and help survivors rebuild their lives.</p>
          <div class="d-flex flex-wrap justify-content-center gap-3">
              <a href="donate.php" class="laf-btn laf-btn-yellow text-laf-navy">Donate to Help</a>
              <a href="contact.php" class="laf-btn laf-btn-outline-white">Partner With Us</a>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
