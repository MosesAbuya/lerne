<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Transparency & Accountability | Lerne Adams Foundation</title>
  <meta name="description" content="At Lerne Adams Foundation, we are committed to transparency, open communication, and evidence-based reporting on our community impact.">
  <style>
      .laf-callout {
          border-left: 5px solid var(--laf-orange);
          background: rgba(243, 112, 33, 0.05);
          border-radius: 0 12px 12px 0;
          padding: 28px 32px;
          margin-bottom: 50px;
          font-size: 1.08rem;
          line-height: 1.85;
      }
      .breakdown-card {
          background: #fff;
          border-radius: var(--card-radius);
          padding: 36px 28px;
          text-align: center;
          box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
          position: relative;
          overflow: hidden;
      }
      .breakdown-card::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          height: 5px;
      }
      .breakdown-card.orange-top::before { background: var(--laf-orange); }
      .breakdown-card.navy-top::before { background: var(--laf-navy); }
      .breakdown-card.green-top::before { background: var(--laf-green); }
  </style>
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/473365074_1837315983707659_3696841068555528541_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Transparency</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> Transparency
          </div>
      </div>
  </section>

  <!-- CONTENT -->
  <section class="laf-section bg-laf-off-white laf-observe">
      <div class="container">

          <div class="row justify-content-center">
              <div class="col-lg-10">
                  
                  <!-- 1. Commitment to Transparency -->
                  <div class="mb-5">
                      <h2 class="laf-section-title mb-4">Our Commitment</h2>
                      <div class="laf-callout">
                          <i class="fas fa-quote-left text-laf-orange me-3 fa-2x float-start"></i>
                          At the Lerne Adams Foundation, we believe that every donor, partner, and community member has the right to know exactly how resources are utilized. We are committed to honest, open, and evidence-based communication about our finances, governance, and community impact.
                      </div>
                  </div>

                  <!-- 2. How Donations Are Used -->
                  <div class="mb-5">
                      <h2 class="laf-section-title mb-4">Resource Allocation target</h2>
                      <p class="text-muted mb-4">We continually work to maximize the proportion of funds reaching our beneficiaries directly through strategic planning and efficient operations.</p>
                      
                      <div class="row g-4 mb-4">
                          <div class="col-md-4">
                              <div class="breakdown-card green-top h-100">
                                  <i class="fas fa-hands-helping fa-3x text-laf-green mb-3"></i>
                                  <h3 class="display-5 font-heading fw-bold text-laf-navy">75%</h3>
                                  <h5 class="font-heading text-laf-navy mb-3">Direct Programmes</h5>
                                  <p class="small text-muted mb-0">Health outreach, educational support, seed capital, and direct community interventions.</p>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="breakdown-card orange-top h-100">
                                  <i class="fas fa-bullhorn fa-3x text-laf-orange mb-3"></i>
                                  <h3 class="display-5 font-heading fw-bold text-laf-orange">15%</h3>
                                  <h5 class="font-heading text-laf-navy mb-3">Advocacy & Capacity</h5>
                                  <p class="small text-muted mb-0">Community dialogues, training workshops, and broad-scale SGBV and health advocacy.</p>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="breakdown-card navy-top h-100">
                                  <i class="fas fa-cog fa-3x text-laf-navy mb-3"></i>
                                  <h3 class="display-5 font-heading fw-bold text-laf-navy">10%</h3>
                                  <h5 class="font-heading text-laf-navy mb-3">Operations</h5>
                                  <p class="small text-muted mb-0">Staffing, monitoring, evaluation, and organizational infrastructure.</p>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- 3. Legal Status -->
                  <div class="mb-5">
                      <h2 class="laf-section-title mb-4">Legal Status & Registration</h2>
                      <div class="bg-white p-4 rounded shadow-sm border border-1 border-light">
                          <ul class="list-unstyled mb-0">
                              <li class="d-flex align-items-center py-3 border-bottom">
                                  <i class="fas fa-certificate text-laf-green fa-lg me-3" style="width: 30px;"></i>
                                  <div>
                                      <strong class="d-block text-laf-navy">Registration Status</strong>
                                      <span class="text-muted">Registered Non-Governmental Organization (NGO) in Kenya.</span>
                                  </div>
                              </li>
                              <li class="d-flex align-items-center py-3 border-bottom">
                                  <i class="fas fa-calendar-alt text-laf-orange fa-lg me-3" style="width: 30px;"></i>
                                  <div>
                                      <strong class="d-block text-laf-navy">Operating Since</strong>
                                      <span class="text-muted">2016 (as CBO), 2019 (as Foundation)</span>
                                  </div>
                              </li>
                              <li class="d-flex align-items-center py-3">
                                  <i class="fas fa-envelope text-laf-blue fa-lg me-3" style="width: 30px;"></i>
                                  <div>
                                      <strong class="d-block text-laf-navy">Legal Enquiries</strong>
                                      <a href="mailto:info@lerneadamsfoundation.org" class="text-laf-green fw-bold">info@lerneadamsfoundation.org</a>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
                  
                  <!-- 4. Reports Link -->
                  <div class="mb-5 p-5 bg-laf-navy rounded text-white text-center shadow">
                      <i class="fas fa-file-invoice fa-3x text-laf-yellow mb-3"></i>
                      <h3 class="font-heading mb-3">Annual Reports</h3>
                      <p class="mb-4 text-white-50 max-w-700 mx-auto">We publish our programmatic and financial reports annually to ensure full accountability to our stakeholders.</p>
                      <a href="reports.php" class="laf-btn laf-btn-yellow">View Annual Reports</a>
                  </div>

              </div>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
