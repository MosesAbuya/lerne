<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>About Us | Lerne Adams Foundation</title>
  <meta name="description" content="Learn about Lerne Adams Foundation — an indigenous Kenyan NGO working to empower marginalized communities in the Lake Victoria Region since 2016.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- SECTION 1: PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/pexels-charldurand-6486185.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">About Lerne Adams Foundation</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> About Us
          </div>
      </div>
  </section>

  <!-- SECTION 2: Movement Built Hope and Humanity (Screenshot 2 style) -->
  <section class="laf-section bg-white laf-observe" style="overflow: hidden;">
      <div class="container py-5">
          <div class="row align-items-center g-5">
              <!-- Left side: Circular Overlapping Images -->
              <div class="col-lg-6">
                  <div class="laf-about-circle-wrapper">
                      <!-- Using LAF generic images that match our theme -->
                      <img src="images/lerne/pexels-charldurand-6486185.jpg" alt="Community Support" class="laf-about-circle-1 laf-about-circle-img shadow-lg">
                      <img src="images/lerne/kids-3311090_1280.jpg" alt="Youth Empowerment" class="laf-about-circle-2 laf-about-circle-img shadow-lg">
                      <div class="laf-pill-badge" style="position: absolute; bottom: 80px; left: -20px; z-index: 3; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                          <div style="text-align:center;">
                              <div style="font-size:1.5rem;font-weight:900;color:var(--laf-green-deep);">8+</div>
                              <div style="font-size:0.7rem;text-transform:uppercase;">Years of<br>Experience</div>
                          </div>
                      </div>
                  </div>
              </div>
              
              <!-- Right side: Text & Feature Box -->
              <div class="col-lg-6 ps-lg-5">
                  <span class="laf-pill-badge">About Our NGO</span>
                  <h2 class="display-5 fw-bold mb-4" style="color: var(--laf-green-deep); line-height: 1.1;">Movement Built Hope<br>and Humanity</h2>
                  <p class="lead mb-4 text-muted" style="font-size: 1.05rem;">We believe in the power of collective compassion. Through dedicated efforts and inclusive programs, we support vulnerable communities across the Lake Victoria Region.</p>
                  
                  <div class="laf-feature-box-yellow d-flex gap-4 align-items-center">
                      <div class="icon-box m-0 flex-shrink-0">
                          <i class="fas fa-hand-holding-heart"></i>
                      </div>
                      <div>
                          <h5 class="fw-bold mb-2 text-laf-navy">Empowering Communities</h5>
                          <div class="d-flex align-items-start gap-2">
                              <i class="fas fa-check-circle text-laf-yellow mt-1"></i>
                              <p class="mb-0 text-muted" style="font-size:0.9rem;">We work closely with communities to identify real needs and deliver sustainable solutions.</p>
                          </div>
                      </div>
                  </div>
                  
                  <div class="d-flex flex-wrap gap-3 mt-5 align-items-center">
                      <a href="contact.php" class="laf-btn laf-btn-yellow">Contact Us <span class="arrow">↗</span></a>
                      <a href="program.php" class="text-decoration-none fw-bold" style="color: var(--laf-green-deep); display:flex; align-items:center; gap: 10px;">
                          <div style="width:40px;height:40px;border-radius:50%;background:var(--laf-yellow);display:flex;align-items:center;justify-content:center;color:var(--laf-text-dark);"><i class="fas fa-play"></i></div>
                          View Our Work
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- SECTION 3: From Understanding to Meaningful Action (3 Columns) -->
  <section class="laf-section bg-white laf-observe py-5">
      <div class="container">
          <div class="row mb-5">
              <div class="col-lg-6">
                  <span class="laf-pill-badge">Our Approach</span>
                  <h2 class="display-5 fw-bold" style="color: var(--laf-green-deep);">From Understanding<br>to Meaningful Action</h2>
              </div>
              <div class="col-lg-5 offset-lg-1 d-flex flex-column justify-content-center">
                  <p class="text-muted mb-4">Through careful planning, collaboration, and transparent execution, we turn insights into practical initiatives that create lasting, positive impact where it matters most.</p>
                  <div><a href="donate.php" class="laf-btn laf-btn-yellow">Support Us <span class="arrow">↗</span></a></div>
              </div>
          </div>

          <div class="row g-4">
              <!-- Mission -->
              <div class="col-lg-4 col-md-6">
                  <div class="laf-mvv-card">
                      <div class="laf-mvv-icon"><i class="fas fa-globe"></i></div>
                      <h4>Our Mission</h4>
                      <p>To improve the quality of life in underserved communities by delivering accessible healthcare, championing education, and advocating against SGBV in Western Kenya.</p>
                      <div class="laf-mvv-check">
                          <i class="fas fa-check-circle"></i>
                          <span>To empower communities by addressing real social challenges.</span>
                      </div>
                  </div>
              </div>
              <!-- Vision -->
              <div class="col-lg-4 col-md-6">
                  <div class="laf-mvv-card">
                      <div class="laf-mvv-icon"><i class="fas fa-eye"></i></div>
                      <h4>Our Vision</h4>
                      <p>A society where every community has equal opportunities, dignity, and the power to build a better, healthier, and more resilient future together.</p>
                      <div class="laf-mvv-check">
                          <i class="fas fa-check-circle"></i>
                          <span>A world where empowered communities thrive with opportunities.</span>
                      </div>
                  </div>
              </div>
              <!-- Values -->
              <div class="col-lg-4 col-md-6">
                  <div class="laf-mvv-card">
                      <div class="laf-mvv-icon"><i class="fas fa-hands-helping"></i></div>
                      <h4>Our Values</h4>
                      <p>We work with honesty, transparency, and accountability, building trust with the communities we serve and our dedicated development partners.</p>
                      <div class="laf-mvv-check">
                          <i class="fas fa-check-circle"></i>
                          <span>Guiding every action we take to create meaningful & lasting social impact.</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- SECTION 4: Creating Change That Truly Matters (Rectangular Images & Stats) -->
  <section class="laf-section bg-white laf-observe py-5" style="border-top: 1px solid rgba(0,0,0,0.05);">
      <div class="container">
          <div class="row align-items-center g-5">
              <!-- Left side: Rectangular Overlapping Images -->
              <div class="col-lg-6">
                  <div class="laf-rect-images-wrapper">
                      <img src="images/lerne/friends-6065345_1280.jpg" alt="Volunteers" class="laf-rect-img-1">
                      <img src="images/lerne/activities/470152716_1813642036075054_4537111035744741174_n.jpg" alt="Community Action" class="laf-rect-img-2">
                  </div>
              </div>
              
              <!-- Right side: Text & Stat Cards -->
              <div class="col-lg-6 ps-lg-5">
                  <span class="laf-pill-badge">Our Impact</span>
                  <h2 class="display-5 fw-bold mb-4" style="color: var(--laf-green-deep);">Creating Change That<br>Truly Matters</h2>
                  <p class="text-muted mb-5">Through dedicated programs, transparent processes, and long-term commitment, we ensure every effort leads to meaningful and lasting impact.</p>
                  
                  <div class="row g-4">
                      <div class="col-md-6">
                          <div class="laf-stat-card-white">
                              <h2>2,500<span>+</span></h2>
                              <h4>Lives Reached</h4>
                              <p>A strong network dedicated to actively transforming lives.</p>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="laf-stat-card-white">
                              <h2>15<span>+</span></h2>
                              <h4>Active Projects</h4>
                              <p>Successfully delivering impactful initiatives.</p>
                          </div>
                      </div>
                  </div>
                  
                  <div class="mt-5">
                      <a href="contact.php" class="laf-btn laf-btn-yellow">Contact Us <span class="arrow">↗</span></a>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- SECTION 5: Focused Actions That Deliver Impacts (Dark Green Section) -->
  <section class="laf-dark-impact-section laf-observe">
      <!-- Optional: SVG zigzag background pattern could be added here -->
      <div class="container">
          <div class="row align-items-center g-5">
              <!-- Left side: Collage -->
              <div class="col-lg-6">
                  <div class="laf-dark-collage">
                      <img src="images/lerne/child-child-2083973_1280.jpg" alt="Health Initiative" class="laf-dark-collage-img1">
                      <img src="images/lerne/woman-2886580_1280.jpg" alt="Women Empowerment" class="laf-dark-collage-img2">
                      
                      <!-- Floating Stat 1 -->
                      <div class="laf-dark-stat-float top-left">
                          <div class="fw-bold" style="font-size:1.4rem;">1,000+ Active</div>
                          <div class="text-muted" style="font-size:0.9rem;">Beneficiaries</div>
                      </div>
                      
                      <!-- Floating Stat 2 -->
                      <div class="laf-dark-stat-float bottom-left">
                          <div class="icon"><i class="fas fa-project-diagram"></i></div>
                          <div>
                              <div class="fw-bold" style="font-size:1.4rem;">4+</div>
                              <div class="text-muted" style="font-size:0.9rem;">Major Sectors</div>
                          </div>
                      </div>
                  </div>
              </div>
              
              <!-- Right side: Content -->
              <div class="col-lg-6 ps-lg-5">
                  <span class="laf-pill-badge" style="background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2); color: #fff;">
                      What We Do
                  </span>
                  <h2 class="display-4 fw-bold mb-4">Focused Actions That<br>Deliver Impacts</h2>
                  <p class="lead mb-5" style="color: rgba(255,255,255,0.8);">Through thoughtfully planned programs and community-led action, we empower individuals, strengthen neighborhoods, and foster lasting positive change one initiative at a time.</p>
                  
                  <div class="mb-4">
                      <span class="laf-action-pill">Health & SRH</span>
                      <span class="laf-action-pill outline">Capacity Building</span>
                      <span class="laf-action-pill outline">Collaboration</span>
                  </div>
                  
                  <div class="laf-feature-row">
                      <div class="icon"><i class="fas fa-server"></i></div>
                      <div>
                          <h4 class="fw-bold mb-2">Empowering Communities</h4>
                          <p class="mb-0" style="color: rgba(255,255,255,0.7); font-size: 0.95rem;">We design and implement programs that address real community needs—ranging from education and healthcare to women and youth empowerment.</p>
                      </div>
                  </div>
                  
                  <div>
                      <a href="contact.php" class="laf-btn laf-btn-yellow">Contact Us <span class="arrow">↗</span></a>
                      <div class="mt-4 d-flex align-items-center gap-3">
                          <img src="images/lerne/logo/logo.png" alt="LAF" style="height:40px; background:white; border-radius:50%; padding:5px;">
                          <span style="font-size:0.9rem; color:rgba(255,255,255,0.8);">Let's make something great work together. <a href="donate.php" class="text-laf-yellow text-decoration-none fw-bold">Support LAF</a></span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- CTA BANNER -->
  <section class="laf-cta-banner">
      <div class="container text-center position-relative" style="z-index:2;">
          <h2 class="display-5 fw-bold mb-4 text-white">Join Our Mission</h2>
          <p class="lead mb-5" style="max-width:600px;margin:0 auto 40px;color:rgba(255,255,255,0.8);">Support our work across Western Kenya. Together we can build resilient and empowered communities.</p>
          <a href="donate.php" class="laf-btn laf-btn-yellow me-3">Donate Now</a>
          <a href="contact.php" class="laf-btn laf-btn-outline-white">Contact Us</a>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>