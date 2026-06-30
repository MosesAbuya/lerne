<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Mental Health & Psychosocial Support | Lerne Adams Foundation</title>
  <meta name="description" content="LAF's Mental Health Programme works to destigmatize mental illness, provide psychosocial first aid, and connect individuals with professional care.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/istockphoto-1064465542-612x612.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Mental Health</h1>
          <div class="laf-breadcrumb"><a href="index.php">Home</a> <span>/</span> <a href="program.php">Our Work</a> <span>/</span> Mental Health</div>
      </div>
  </section>

  <section class="laf-section bg-white">
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-8">
                  <img src="images/lerne/istockphoto-1136872232-612x612.jpg" alt="Mental Health" class="img-fluid rounded mb-5 w-100" style="max-height: 480px; object-fit: cover;">
                  <h2 class="laf-program-section-title">Breaking Barriers to Mental Health</h2>
                  <p class="laf-program-text">Mental health remains one of the most neglected aspects of public health in our communities. LAF's Mental Health Programme works to destigmatize mental illness, provide psychosocial first aid, and connect individuals experiencing mental health challenges with professional care and community support systems.</p>
                  <p class="laf-program-text">We take a holistic, community-based approach that integrates mental health awareness into all our other programmes, recognizing that trauma, poverty, HIV, and SGBV all have profound effects on psychological wellbeing.</p>
                  
                  <h3 style="font-size:1.8rem;font-weight:800;margin:40px 0 20px;">Key Interventions</h3>
                  <ul class="laf-check-list">
                      <li><i class="fas fa-check-circle"></i> <strong>Community Sensitization:</strong> Campaigns to normalize mental health conversations and reduce stigma.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Psychosocial First Aid:</strong> Training community volunteers in basic psychosocial support skills.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Support Groups:</strong> Peer support circles for people experiencing depression, anxiety, grief, and trauma.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Case Referrals:</strong> Linking individuals with serious mental illness to county mental health facilities.</li>
                      <li><i class="fas fa-check-circle"></i> <strong>Caregiver Training:</strong> Supporting families of people with mental illness through education and counseling.</li>
                  </ul>

                  <div class="laf-goal-cards-wrapper">
                      <div class="laf-goal-card short-term">
                          <h4><i class="fas fa-bullseye"></i> Short-Term Goals</h4>
                          <ul>
                              <li><i class="fas fa-angle-right"></i> Reach 2,000 people with mental health awareness campaigns.</li>
                              <li><i class="fas fa-angle-right"></i> Train 80 community psychosocial first aiders.</li>
                              <li><i class="fas fa-angle-right"></i> Establish 6 peer support groups.</li>
                              <li><i class="fas fa-angle-right"></i> Develop culturally sensitive mental health materials in Dholuo.</li>
                          </ul>
                      </div>
                      <div class="laf-goal-card long-term">
                          <h4><i class="fas fa-chart-line"></i> Long-Term Goals</h4>
                          <ul>
                              <li><i class="fas fa-angle-right"></i> Eliminate mental health stigma in target communities.</li>
                              <li><i class="fas fa-angle-right"></i> Ensure every person with mental illness receives professional support.</li>
                              <li><i class="fas fa-angle-right"></i> Integrate mental health into all community development programmes.</li>
                              <li><i class="fas fa-angle-right"></i> Achieve measurable improvements in community wellbeing indicators.</li>
                          </ul>
                      </div>
                  </div>

                  <div class="laf-impact-box">
                      <h4><i class="fas fa-chart-bar text-laf-green me-2"></i> Our Impact So Far</h4>
                      <div class="row g-3 mt-2">
                          <div class="col-sm-4 text-center"><div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">600+</div><div class="text-muted">Reached</div></div>
                          <div class="col-sm-4 text-center"><div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">45</div><div class="text-muted">Trained Volunteers</div></div>
                          <div class="col-sm-4 text-center"><div style="font-size:2.5rem;font-weight:800;color:var(--laf-green);">6</div><div class="text-muted">Support Groups</div></div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="sticky-top" style="top: 100px;">
                      <div class="laf-help-box">
                          <h3>Support Mental Wellness</h3>
                          <p class="text-muted mb-4">Your contribution funds community mental health training, support groups, and care referral services.</p>
                          <a href="donate.php" class="laf-btn laf-btn-yellow w-100 mb-3" style="display:block;text-align:center;">Donate Now &rarr;</a>
                          <a href="volunteer.php" class="laf-btn laf-btn-outline-green w-100" style="display:block;text-align:center;">Become a Support Volunteer</a>
                      </div>
                      <div class="mt-4 p-4 rounded" style="background:var(--laf-green-deep);">
                          <h5 class="text-white mb-3">Other Programmes</h5>
                          <ul class="list-unstyled" style="margin:0;">
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="education.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Education Support</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="srh.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Sexual &amp; Reproductive Health</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="sgbv.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>SGBV Advocacy</a></li>
                              <li style="padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.1);"><a href="hiv.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>HIV Prevention &amp; Care</a></li>
                              <li style="padding:8px 0;"><a href="junior.php" style="color:rgba(255,255,255,0.75);text-decoration:none;"><i class="fas fa-angle-right me-2" style="color:var(--laf-yellow);"></i>Child Care &amp; Support</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="laf-cta-banner">
      <div class="container text-center position-relative" style="z-index:2;">
          <h2 class="display-5 fw-bold mb-4 text-white">Mental Health is Everyone's Right</h2>
          <p class="lead mb-5" style="max-width:600px;margin:0 auto 40px;color:rgba(255,255,255,0.8);">Help us break the stigma and ensure every person in our communities has access to mental health support and care.</p>
          <a href="donate.php" class="laf-btn laf-btn-yellow me-3">Support Mental Health</a>
          <a href="volunteer.php" class="laf-btn laf-btn-outline-white">Get Involved</a>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
