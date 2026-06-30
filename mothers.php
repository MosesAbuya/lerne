<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Single Parents Project | Lerne Adams Foundation</title>
  <meta name="description" content="Empowering single parents through income-generating activities, counselling, and health financing in Homa Bay County.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- SECTION 1: PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/480753520_956776056658946_1736053035405773232_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Single Parents Project</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> <a href="program.php">Our Work</a> <span class="mx-2">/</span> Single Parents
          </div>
      </div>
  </section>

  <!-- ACCENT BAR -->
  <div style="height: 10px; background-color: var(--laf-orange); width: 100%;"></div>

  <!-- SECTION 2: PROGRAMME OVERVIEW -->
  <section class="laf-section bg-white laf-observe">
      <div class="container">
          <div class="row align-items-center g-5">
              <div class="col-lg-6">
                  <span class="laf-badge" style="color: var(--laf-orange); border-color: var(--laf-orange);">Programme Overview</span>
                  <h2 class="laf-section-title" style="border-color: var(--laf-orange);">Empowering Single Parents</h2>
                  <p class="lead mb-4">Initiated in 2019, the Single Parents Project is dedicated to uplifting vulnerable single parents — including widows, divorcees, separated spouses, and never-married individuals.</p>
                  <p class="mb-4">Targeting individuals aged between 18 and 35 years across six sub-counties in Homa Bay, this initiative addresses the unique socio-economic and psychosocial challenges faced by single parents raising children in resource-poor settings.</p>
                  <div class="p-4 bg-laf-off-white rounded border-start border-4 border-laf-orange">
                      <h5 class="text-laf-navy mb-2"><i class="fas fa-map-marker-alt text-laf-orange me-2"></i> Operational Areas</h5>
                      <p class="mb-0 text-muted">Homa Bay Town, Karachuonyo, Kasipul Kabondo, Rangwe, Suba North, and Suba South.</p>
                  </div>
              </div>
              <div class="col-lg-6">
                  <img src="images/lerne/pexels-ladiwaynegrafix-18449719.jpg" alt="Single Parents Project" class="img-fluid rounded shadow-lg w-100" style="height: 450px; object-fit: cover;">
              </div>
          </div>
      </div>
  </section>

  <!-- SECTION 3: KEY ACTIVITIES & APPROACH -->
  <section class="laf-section laf-section-bg-light laf-observe">
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-6">
                  <h3 class="font-heading mb-4 text-laf-navy">Key Interventions</h3>
                  <div class="row g-4">
                      <div class="col-sm-6">
                          <div class="bg-white p-4 rounded shadow-sm h-100 border-top border-4 border-laf-orange">
                              <i class="fas fa-comments fa-2x text-laf-orange mb-3"></i>
                              <h5 class="mb-2">Group Therapies</h5>
                              <p class="small text-muted mb-0">Psychosocial counseling and peer support groups to address trauma and stigma.</p>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="bg-white p-4 rounded shadow-sm h-100 border-top border-4 border-laf-orange">
                              <i class="fas fa-hand-holding-usd fa-2x text-laf-orange mb-3"></i>
                              <h5 class="mb-2">Revolving Funds</h5>
                              <p class="small text-muted mb-0">Financial support for Income-Generating Activities (IGAs) to build self-reliance.</p>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="bg-white p-4 rounded shadow-sm h-100 border-top border-4 border-laf-orange">
                              <i class="fas fa-briefcase-medical fa-2x text-laf-orange mb-3"></i>
                              <h5 class="mb-2">Health Financing</h5>
                              <p class="small text-muted mb-0">Establishing mechanisms to help single parents access affordable healthcare.</p>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="bg-white p-4 rounded shadow-sm h-100 border-top border-4 border-laf-orange">
                              <i class="fas fa-graduation-cap fa-2x text-laf-orange mb-3"></i>
                              <h5 class="mb-2">Education Support</h5>
                              <p class="small text-muted mb-0">Scholarship and fee linkages for both the parents (vocational) and their children.</p>
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="col-lg-6">
                  <h3 class="font-heading mb-4 text-laf-navy">Implementation Approach</h3>
                  <div class="card border-0 shadow-sm bg-white rounded">
                      <div class="card-body p-4">
                          <p class="text-muted">We believe in participatory socio-economic empowerment:</p>
                          <ul class="list-unstyled mb-0">
                              <li class="mb-3 d-flex">
                                  <i class="fas fa-check-circle text-laf-orange mt-1 me-3"></i>
                                  <span class="text-muted"><strong>Table Banking:</strong> Training groups on savings and credit methodologies.</span>
                              </li>
                              <li class="mb-3 d-flex">
                                  <i class="fas fa-check-circle text-laf-orange mt-1 me-3"></i>
                                  <span class="text-muted"><strong>Skill Building:</strong> Equipping parents with entrepreneurial and vocational skills.</span>
                              </li>
                              <li class="mb-3 d-flex">
                                  <i class="fas fa-check-circle text-laf-orange mt-1 me-3"></i>
                                  <span class="text-muted"><strong>Advocacy:</strong> Challenging societal norms that stigmatize single parenthood.</span>
                              </li>
                          </ul>
                      </div>
                  </div>
                  
                  <div class="mt-4 p-4 text-white rounded" style="background: var(--laf-navy);">
                      <h4 class="font-heading mb-3 text-laf-yellow">Who We Serve</h4>
                      <p class="mb-0 text-white-50">Single parents aged 18-35 in Homa Bay County who face extreme economic hardship.</p>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- SECTION 4: PHOTO GALLERY -->
  <section class="py-5 bg-white laf-observe">
      <div class="container">
          <h3 class="font-heading text-center mb-5 text-laf-navy">Impact in Pictures</h3>
          <div class="row g-4 justify-content-center">
              <div class="col-md-4">
                  <img src="images/lerne/activities/480753520_956776056658946_1736053035405773232_n.jpg" class="img-fluid rounded shadow-sm w-100" style="height: 250px; object-fit: cover;" alt="Single Parents Activity 1">
              </div>
              <div class="col-md-4">
                  <img src="images/lerne/pexels-ladiwaynegrafix-18449719.jpg" class="img-fluid rounded shadow-sm w-100" style="height: 250px; object-fit: cover;" alt="Single Parents Activity 2">
              </div>
              <div class="col-md-4">
                  <img src="images/lerne/pexels-kelly-2869085.jpg" class="img-fluid rounded shadow-sm w-100" style="height: 250px; object-fit: cover;" alt="Single Parents Activity 3">
              </div>
          </div>
      </div>
  </section>

  <!-- CTA BANNER -->
  <section class="laf-cta-banner laf-observe" style="background: linear-gradient(135deg, var(--laf-orange), #b8570b);">
      <div class="container position-relative z-2">
          <h2 class="display-5 font-heading fw-bold">Empower a Family</h2>
          <p class="lead mb-5 max-w-700 mx-auto opacity-75">Your support can help a single parent start a business and provide for their children.</p>
          <div class="d-flex flex-wrap justify-content-center gap-3">
              <a href="donate.php" class="laf-btn laf-btn-yellow text-laf-navy">Donate to the Fund</a>
              <a href="contact.php" class="laf-btn laf-btn-outline-white">Partner With Us</a>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
