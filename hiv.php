<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>HIV Prevention &amp; Care | Lerne Adams Foundation</title>
  <meta name="description" content="LAF implements a comprehensive HIV response in the Lake Victoria Region combining VCT outreach, linkage to care, support groups, and stigma reduction to support People Living with HIV.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/470152716_1813642036075054_4537111035744741174_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">HIV Prevention &amp; Care</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span>/</span> <a href="program.php">Our Work</a> <span>/</span> HIV Prevention &amp; Care
          </div>
      </div>
  </section>

  <section class="laf-section bg-white">
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-8">
                  <img src="images/lerne/activities/470062625_1813644372741487_2345710461182012947_n.jpg" alt="HIV Prevention and Care activities by LAF" class="img-fluid rounded mb-5 w-100" style="max-height: 480px; object-fit: cover;">

                  <h2 class="laf-program-section-title">Combating HIV/AIDS in the Lake Victoria Region</h2>
                  <p class="laf-program-text">The Lake Victoria Region has historically faced high HIV prevalence rates. LAF implements a comprehensive HIV response to combat new infections and support those living with the virus. Our approach combines community-based prevention education, active linkage to care and treatment, and psychosocial support to reduce stigma and improve quality of life for People Living with HIV (PLHIV).</p>

                  <h3 style="font-size:1.8rem;font-weight:800;margin:40px 0 20px;">Key Interventions</h3>
                  <ul class="laf-check-list">
                      <li><i class="fas fa-check-circle"></i> <strong>VCT Outreach:</strong> Voluntary Counseling and Testing campaigns targeting marginalized areas and high-risk populations.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Linkage to Care:</strong> Ensuring newly diagnosed individuals are immediately enrolled in ART treatment.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Support Groups:</strong> Facilitating peer support networks for PLHIV to promote ARV adherence and reduce isolation.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Stigma Reduction:</strong> Community dialogues to demystify HIV/AIDS and fight discrimination.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Prevention Education:</strong> Schools and community sensitization on HIV prevention methods.</li>
                  </ul>

                  <div class="laf-goal-cards-wrapper">
                      <div class="laf-goal-card short-term">
                          <h4><i class="fas fa-bullseye"></i> Short-Term Goals</h4>
                          <ul>
                              <li><i class="fas fa-angle-right"></i> Reach 1,000 community members with VCT</li>
                              <li><i class="fas fa-angle-right"></i> Enroll 200 PLHIV in support groups</li>
                              <li><i class="fas fa-angle-right"></i> Reduce stigma incidents by 40%</li>
                              <li><i class="fas fa-angle-right"></i> Establish 5 community health champion networks</li>
                          </ul>
                      </div>
                      <div class="laf-goal-card long-term">
                          <h4><i class="fas fa-chart-line"></i> Long-Term Goals</h4>
                          <ul>
                              <li><i class="fas fa-angle-right"></i> Achieve zero new HIV infections among youth</li>
                              <li><i class="fas fa-angle-right"></i> Ensure 95% viral suppression in enrolled PLHIV</li>
                              <li><i class="fas fa-angle-right"></i> Build sustainable community-led HIV response systems</li>
                              <li><i class="fas fa-angle-right"></i> Eliminate HIV-related stigma and discrimination</li>
                          </ul>
                      </div>
                  </div>

                  <div class="laf-impact-box">
                      <h4><i class="fas fa-chart-bar text-laf-green me-2"></i> Our Impact So Far</h4>
                      <div class="row g-3 mt-2">
                          <div class="col-sm-4 text-center">
                              <div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">500+</div>
                              <div class="text-muted">Tested</div>
                          </div>
                          <div class="col-sm-4 text-center">
                              <div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">95%</div>
                              <div class="text-muted">Linked to Care</div>
                          </div>
                          <div class="col-sm-4 text-center">
                              <div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">8</div>
                              <div class="text-muted">Support Groups Active</div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-lg-4">
                  <div class="sticky-top" style="top: 100px;">
                      <div class="laf-help-box">
                          <h3>Support HIV Response</h3>
                          <p class="text-muted mb-4">Your donation funds VCT outreach, ARV adherence programs, and stigma reduction campaigns.</p>
                          <a href="donate.php" class="laf-btn laf-btn-yellow w-100 mb-3" style="display:block;text-align:center;">Donate Now &rarr;</a>
                          <a href="volunteer.php" class="laf-btn laf-btn-outline-green w-100" style="display:block;text-align:center;">Volunteer With Us</a>
                      </div>
                      <div class="mt-4 p-4 rounded" style="background:var(--laf-green-deep);">
                          <h5 class="text-white mb-3">Other Programmes</h5>
                          <ul class="list-unstyled" style="margin:0;">
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="education.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Education Support</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="srh.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Sexual &amp; Reproductive Health</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="sgbv.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>SGBV Advocacy</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="junior.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Child Care &amp; Support</a></li>
                              <li style="padding:8px 0;"><a href="mental-health.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Mental Health</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="laf-cta-banner" style="background: linear-gradient(135deg, var(--laf-green-deep), var(--laf-green-dark));">
      <div class="container text-center position-relative" style="z-index:2;">
          <h2 class="display-5 fw-bold mb-4 text-white">Join the Fight Against HIV</h2>
          <p class="lead mb-5" style="max-width:600px;margin:0 auto 40px;color:rgba(255,255,255,0.8);">Support our outreach programs to ensure zero new infections and zero stigma in our communities.</p>
          <a href="donate.php" class="laf-btn laf-btn-yellow me-3">Support Outreach</a>
          <a href="contact.php" class="laf-btn laf-btn-outline-white">Partner With Us</a>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
