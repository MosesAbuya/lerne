<?php
session_start();
require_once 'includes/connection.php';
?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Our Programmes | Lerne Adams Foundation</title>
  <meta name="description" content="Lerne Adams Foundation's seven core programme areas covering health, education, women empowerment, SGBV, child care, and mental health in Kenya's Lake Victoria Region.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/pexels-fiacre-500650194-27827874.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Our Programmes</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> Our Work
          </div>
      </div>
  </section>

  <!-- INTRO SECTION -->
  <section class="laf-section bg-white laf-observe">
      <div class="container">
          <div class="row align-items-center g-5">
              <div class="col-lg-7">
                  <span class="laf-badge">What We Do</span>
                  <h2 class="laf-section-title">Empowering Communities Through Action</h2>
                  <p class="lead mb-4">The Lerne Adams Foundation implements seven core sectoral pillars designed to holistically address the needs of marginalized communities in the Lake Victoria Region.</p>
                  <blockquote class="border-start border-4 border-laf-green ps-4 py-2 fst-italic text-muted bg-laf-off-white mb-0">
                      "To maximize productivity and self-reliance among the rural communities by availing opportunities for resource poor households through improved access to human development opportunities."
                  </blockquote>
              </div>
              <div class="col-lg-5">
                  <div class="bg-laf-navy text-white p-5 rounded" style="border-radius: var(--card-radius);">
                      <h4 class="font-heading mb-4 text-laf-yellow">Programme Reach</h4>
                      <div class="d-flex align-items-center mb-4">
                          <i class="fas fa-layer-group fa-2x text-laf-green me-4"></i>
                          <div>
                              <h3 class="mb-0 fw-bold">7</h3>
                              <span class="text-white-50">Core Sectors</span>
                          </div>
                      </div>
                      <div class="d-flex align-items-center mb-4">
                          <i class="fas fa-map-marker-alt fa-2x text-laf-green me-4"></i>
                          <div>
                              <h3 class="mb-0 fw-bold">6</h3>
                              <span class="text-white-50">Sub-Counties</span>
                          </div>
                      </div>
                      <div class="d-flex align-items-center">
                          <i class="fas fa-users fa-2x text-laf-green me-4"></i>
                          <div>
                              <h3 class="mb-0 fw-bold">10,000+</h3>
                              <span class="text-white-50">Beneficiaries</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- THE 7 PROGRAMME SECTORS -->
  <section class="laf-section laf-section-bg-light laf-observe">
      <div class="container">
          <div class="row justify-content-center mb-5">
              <div class="col-lg-8 text-center">
                  <h2 class="laf-section-title text-center">Our Thematic Areas</h2>
              </div>
          </div>
          
          <div class="row g-5">
              <!-- Sector 1: Women & Youth -->
              <div class="col-md-6" id="women">
                  <div class="laf-card border-0 h-100 shadow-sm" style="border-top: 5px solid var(--laf-orange);">
                      <div class="p-4 bg-laf-off-white border-bottom d-flex align-items-center gap-3">
                          <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width:60px; height:60px; color: var(--laf-orange);">
                              <i class="fas fa-female fa-xl"></i>
                          </div>
                          <h4 class="mb-0">Women, Youth & PWDs</h4>
                      </div>
                      <div class="laf-card-body">
                          <p>Empowering women, youth, and persons with disabilities through socio-economic programmes, advocacy, and participation in governance and leadership. We work to dismantle community patriarchy and promote total inclusion.</p>
                          <h6 class="mt-4 mb-3 text-laf-navy fw-bold">Key Interventions:</h6>
                          <ul class="text-muted small ps-3 mb-4">
                              <li class="mb-2">Gender advocacy and rights awareness</li>
                              <li class="mb-2">Leadership training for women</li>
                              <li class="mb-2">PWD inclusion and support</li>
                              <li class="mb-2">Economic empowerment sessions</li>
                              <li>Women baraza (community dialogues)</li>
                          </ul>
                          <a href="mothers.php" class="text-laf-orange fw-bold text-uppercase small mt-auto">View Single Parents Project <i class="fas fa-arrow-right ms-1"></i></a>
                      </div>
                  </div>
              </div>

              <!-- Sector 2: HIV -->
              <div class="col-md-6">
                  <div class="laf-card border-0 h-100 shadow-sm" style="border-top: 5px solid var(--laf-red);">
                      <div class="p-4 bg-laf-off-white border-bottom d-flex align-items-center gap-3">
                          <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width:60px; height:60px; color: var(--laf-red);">
                              <i class="fas fa-ribbon fa-xl"></i>
                          </div>
                          <h4 class="mb-0">HIV Prevention & Care</h4>
                      </div>
                      <div class="laf-card-body">
                          <p>A comprehensive HIV response including prevention education, linkage to care and treatment, community VCT outreach, and support groups for People Living with HIV (PLHIV) across the Lake Victoria region.</p>
                          <h6 class="mt-4 mb-3 text-laf-navy fw-bold">Key Interventions:</h6>
                          <ul class="text-muted small ps-3 mb-4">
                              <li class="mb-2">VCT community outreach</li>
                              <li class="mb-2">PLHIV support group facilitation</li>
                              <li class="mb-2">ARV adherence monitoring</li>
                              <li class="mb-2">Community stigma reduction</li>
                              <li>Community mobilization</li>
                          </ul>
                          <a href="hiv.php" class="text-laf-red fw-bold text-uppercase small mt-auto">Explore Programme <i class="fas fa-arrow-right ms-1"></i></a>
                      </div>
                  </div>
              </div>

              <!-- Sector 3: Environmental Hygiene -->
              <div class="col-md-6" id="hygiene">
                  <div class="laf-card border-0 h-100 shadow-sm" style="border-top: 5px solid var(--laf-teal);">
                      <div class="p-4 bg-laf-off-white border-bottom d-flex align-items-center gap-3">
                          <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width:60px; height:60px; color: var(--laf-teal);">
                              <i class="fas fa-leaf fa-xl"></i>
                          </div>
                          <h4 class="mb-0">Environmental Hygiene</h4>
                      </div>
                      <div class="laf-card-body">
                          <p>Promoting sustainable environmental practices, improved sanitation, clean water access, and community hygiene behaviours to reduce the water-borne disease burden along the Lake Victoria basin.</p>
                          <h6 class="mt-4 mb-3 text-laf-navy fw-bold">Key Interventions:</h6>
                          <ul class="text-muted small ps-3 mb-4">
                              <li class="mb-2">Community hygiene campaigns</li>
                              <li class="mb-2">Sanitation drives</li>
                              <li class="mb-2">Environmental clean-ups</li>
                              <li>WASH education</li>
                          </ul>
                      </div>
                  </div>
              </div>

              <!-- Sector 4: SRH -->
              <div class="col-md-6">
                  <div class="laf-card border-0 h-100 shadow-sm" style="border-top: 5px solid var(--laf-purple);">
                      <div class="p-4 bg-laf-off-white border-bottom d-flex align-items-center gap-3">
                          <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width:60px; height:60px; color: var(--laf-purple);">
                              <i class="fas fa-heart-pulse fa-xl"></i>
                          </div>
                          <h4 class="mb-0">Sexual Reproductive Health</h4>
                      </div>
                      <div class="laf-card-body">
                          <p>Providing comprehensive SRH services and education for adolescents, youth, sex workers, and persons with disability. We focus on abstinence campaigns, family planning, and psychosocial support.</p>
                          <h6 class="mt-4 mb-3 text-laf-navy fw-bold">Key Interventions:</h6>
                          <ul class="text-muted small ps-3 mb-4">
                              <li class="mb-2">SRH education in schools and community</li>
                              <li class="mb-2">Adolescent peer programmes</li>
                              <li class="mb-2">Abstinence campaigns</li>
                              <li>Contraception awareness</li>
                          </ul>
                          <a href="srh.php" class="text-laf-purple fw-bold text-uppercase small mt-auto">Explore Programme <i class="fas fa-arrow-right ms-1"></i></a>
                      </div>
                  </div>
              </div>

              <!-- Sector 5: SGBV -->
              <div class="col-md-6">
                  <div class="laf-card border-0 h-100 shadow-sm" style="border-top: 5px solid #8B2020);">
                      <div class="p-4 bg-laf-off-white border-bottom d-flex align-items-center gap-3">
                          <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width:60px; height:60px; color: #8B2020;">
                              <i class="fas fa-shield-halved fa-xl"></i>
                          </div>
                          <h4 class="mb-0">SGBV Advocacy</h4>
                      </div>
                      <div class="laf-card-body">
                          <p>Leading advocacy against Sexual and Gender-Based Violence. We provide survivor support, linkage to legal aid, community awareness, and mobilization for policy change.</p>
                          <h6 class="mt-4 mb-3 text-laf-navy fw-bold">Key Interventions:</h6>
                          <ul class="text-muted small ps-3 mb-4">
                              <li class="mb-2">Survivor support and counseling</li>
                              <li class="mb-2">Community sensitization</li>
                              <li class="mb-2">Legal referrals and linkage</li>
                              <li class="mb-2">Male champions programme</li>
                              <li>Policy advocacy</li>
                          </ul>
                          <a href="sgbv.php" style="color:#8B2020" class="fw-bold text-uppercase small mt-auto">Explore Programme <i class="fas fa-arrow-right ms-1"></i></a>
                      </div>
                  </div>
              </div>

              <!-- Sector 6: Child Care -->
              <div class="col-md-6">
                  <div class="laf-card border-0 h-100 shadow-sm" style="border-top: 5px solid var(--laf-blue);">
                      <div class="p-4 bg-laf-off-white border-bottom d-flex align-items-center gap-3">
                          <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width:60px; height:60px; color: var(--laf-blue);">
                              <i class="fas fa-child fa-xl"></i>
                          </div>
                          <h4 class="mb-0">Child Care & Support</h4>
                      </div>
                      <div class="laf-card-body">
                          <p>Supporting orphaned children and street children through education linkage, shelter support, psychosocial care, and family reintegration programmes.</p>
                          <h6 class="mt-4 mb-3 text-laf-navy fw-bold">Key Interventions:</h6>
                          <ul class="text-muted small ps-3 mb-4">
                              <li class="mb-2">Education support (school fees)</li>
                              <li class="mb-2">Psychosocial counseling</li>
                              <li class="mb-2">Family reintegration</li>
                              <li>Street child outreach</li>
                          </ul>
                          <a href="junior.php" class="text-laf-blue fw-bold text-uppercase small mt-auto">Explore Programme <i class="fas fa-arrow-right ms-1"></i></a>
                      </div>
                  </div>
              </div>
              
              <!-- Sector 7: Mental Health -->
              <div class="col-md-6 offset-md-3">
                  <div class="laf-card border-0 h-100 shadow-sm" style="border-top: 5px solid #5B2D8E;">
                      <div class="p-4 bg-laf-off-white border-bottom d-flex align-items-center gap-3">
                          <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width:60px; height:60px; color: #5B2D8E;">
                              <i class="fas fa-brain fa-xl"></i>
                          </div>
                          <h4 class="mb-0">Mental Health Initiatives</h4>
                      </div>
                      <div class="laf-card-body">
                          <p>Providing community-level mental health awareness, stigma reduction, psychosocial support, and referral services for vulnerable populations including youth and conflict-affected communities.</p>
                          <h6 class="mt-4 mb-3 text-laf-navy fw-bold">Key Interventions:</h6>
                          <ul class="text-muted small ps-3 mb-4">
                              <li class="mb-2">Mental health awareness</li>
                              <li class="mb-2">Counseling and peer support groups</li>
                              <li class="mb-2">Referral to health facilities</li>
                              <li>Community dialogues</li>
                          </ul>
                          <a href="mental-health.php" style="color:#5B2D8E" class="fw-bold text-uppercase small mt-auto">Explore Programme <i class="fas fa-arrow-right ms-1"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- COMMUNITY ACTIVITIES LIST -->
  <section class="laf-section bg-white laf-observe">
      <div class="container">
          <div class="row align-items-center g-5">
              <div class="col-lg-6">
                  <img src="images/lerne/activities/480748601_956776126658939_5127464968004539723_n.jpg" alt="Community Activity" class="img-fluid rounded shadow-lg" style="height: 500px; width: 100%; object-fit: cover;">
              </div>
              <div class="col-lg-6">
                  <span class="laf-badge">Grassroots Impact</span>
                  <h2 class="laf-section-title">Core Community Activities</h2>
                  <p class="mb-4 text-muted">To achieve our thematic objectives, LAF implements a wide array of activities directly within the communities we serve. Our participatory approach ensures that the community takes ownership of the development process.</p>
                  
                  <div class="row g-3">
                      <div class="col-sm-6">
                          <ul class="list-unstyled mb-0">
                              <li class="mb-3"><i class="fas fa-check-circle text-laf-green me-2"></i> Community Dialogue</li>
                              <li class="mb-3"><i class="fas fa-check-circle text-laf-green me-2"></i> Women Baraza</li>
                              <li class="mb-3"><i class="fas fa-check-circle text-laf-green me-2"></i> Community Male Champions</li>
                              <li class="mb-3"><i class="fas fa-check-circle text-laf-green me-2"></i> Radio Talk Shows</li>
                              <li class="mb-3"><i class="fas fa-check-circle text-laf-green me-2"></i> Economic Empowerment</li>
                          </ul>
                      </div>
                      <div class="col-sm-6">
                          <ul class="list-unstyled mb-0">
                              <li class="mb-3"><i class="fas fa-check-circle text-laf-green me-2"></i> Youth Forums</li>
                              <li class="mb-3"><i class="fas fa-check-circle text-laf-green me-2"></i> Teens Ambassadors</li>
                              <li class="mb-3"><i class="fas fa-check-circle text-laf-green me-2"></i> PWD Inclusion</li>
                              <li class="mb-3"><i class="fas fa-check-circle text-laf-green me-2"></i> Health Promotion</li>
                              <li class="mb-3"><i class="fas fa-check-circle text-laf-green me-2"></i> Teens Education Networks</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- CTA BANNER -->
  <section class="laf-cta-banner laf-observe">
      <div class="container position-relative z-2">
          <h2 class="display-5 font-heading fw-bold">Partner With LAF</h2>
          <p class="lead mb-5 max-w-700 mx-auto opacity-75">Support our programmes and help us deliver sustainable development to the marginalized communities of the Lake Victoria Region.</p>
          <div class="d-flex flex-wrap justify-content-center gap-3">
              <a href="contact.php" class="laf-btn laf-btn-outline-white">Become a Partner</a>
              <a href="volunteer.php" class="laf-btn laf-btn-yellow">Volunteer With Us</a>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
