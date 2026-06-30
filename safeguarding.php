<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Safeguarding & Child Protection | Lerne Adams Foundation</title>
  <meta name="description" content="Lerne Adams Foundation's Safeguarding and Child Protection Policy - our absolute commitment to the safety and dignity of every child and vulnerable adult in our care.">
  <style>
      .policy-card {
          background: #fff;
          border-radius: var(--card-radius);
          padding: 50px 55px;
          box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
      }
      .policy-effective {
          display: inline-block;
          background: rgba(243, 112, 33, 0.1);
          color: var(--laf-orange);
          font-size: 0.88rem;
          font-weight: 700;
          letter-spacing: 0.08em;
          text-transform: uppercase;
          padding: 6px 16px;
          border-radius: 50px;
          margin-bottom: 28px;
      }
      .policy-intro {
          font-size: 1.1rem;
          line-height: 1.85;
          color: var(--text-muted);
          margin-bottom: 40px;
          padding-bottom: 30px;
          border-bottom: 2px solid rgba(0, 0, 0, 0.05);
      }
      .policy-section-heading {
          font-family: var(--font-heading);
          font-size: 1.7rem;
          color: var(--laf-navy);
          margin-top: 40px;
          margin-bottom: 14px;
          display: flex;
          align-items: center;
          gap: 12px;
      }
      .policy-section-heading i {
          color: var(--laf-orange);
          font-size: 1.4rem;
      }
      .policy-text {
          font-size: 1.02rem;
          line-height: 1.85;
          color: var(--text-dark);
          margin-bottom: 18px;
      }
      .policy-list {
          list-style: none;
          padding: 0;
          margin: 0 0 20px;
      }
      .policy-list li {
          position: relative;
          padding-left: 30px;
          margin-bottom: 12px;
          font-size: 1.02rem;
          line-height: 1.7;
          color: var(--text-dark);
      }
      .policy-list li::before {
          content: '';
          position: absolute;
          left: 0;
          top: 10px;
          width: 8px;
          height: 8px;
          border-radius: 50%;
          background: var(--laf-orange);
      }
      .safeguarding-report-box {
          background: linear-gradient(135deg, var(--laf-orange) 0%, #c8520f 100%);
          border-radius: 16px;
          padding: 35px 40px;
          margin-bottom: 50px;
          color: #fff;
          position: relative;
          overflow: hidden;
      }
      .zero-tolerance-badge {
          display: inline-flex;
          align-items: center;
          gap: 10px;
          background: var(--laf-navy);
          color: #fff;
          border-radius: 8px;
          padding: 12px 22px;
          font-family: var(--font-heading);
          font-size: 1.1rem;
          letter-spacing: 0.05em;
          margin-bottom: 24px;
      }
      .commitment-statement {
          background: #FDFBF7;
          border-left: 5px solid var(--laf-navy);
          border-radius: 0 12px 12px 0;
          padding: 24px 28px;
          margin: 20px 0 28px;
          font-style: italic;
      }
      .prohibited-list li {
          position: relative;
          padding-left: 32px;
          margin-bottom: 12px;
      }
      .prohibited-list li i {
          position: absolute;
          left: 0;
          top: 4px;
          color: var(--laf-red);
      }
      @media (max-width: 767px) {
          .policy-card { padding: 30px 22px; }
          .safeguarding-report-box { padding: 28px 24px; }
      }
  </style>
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/470215991_1813636732742251_1092272697177516536_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Safeguarding Policy</h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> Safeguarding
          </div>
      </div>
  </section>

  <!-- CONTENT -->
  <section class="laf-section bg-laf-off-white laf-observe">
      <div class="container">
          <div class="row">
              <div class="col-lg-10 offset-lg-1">
                  <div class="policy-card">

                      <span class="policy-effective"><i class="fas fa-calendar-alt me-1"></i> Effective Date: January 2024 &nbsp;|&nbsp; Reviewed Annually</span>

                      <div class="zero-tolerance-badge d-flex w-100 mb-4 justify-content-center">
                          <i class="fas fa-shield-alt text-laf-orange me-2"></i>
                          ZERO TOLERANCE FOR ABUSE OF ANY KIND
                      </div>

                      <!-- Report a Concern Box -->
                      <div class="safeguarding-report-box shadow-sm mb-5">
                          <h3 class="font-heading mb-3"><i class="fas fa-exclamation-triangle me-2"></i> Report a Safeguarding Concern</h3>
                          <p class="mb-4 text-white-50">
                              If you have witnessed, experienced, or suspect any form of abuse, exploitation, or harm involving a child or vulnerable adult in connection with Lerne Adams Foundation, please report it immediately. All reports are treated with strict confidentiality.
                          </p>
                          <div class="d-flex flex-wrap gap-3">
                              <a href="mailto:safeguarding@lerneadamsfoundation.org" class="btn btn-light rounded-pill fw-bold text-laf-orange px-4">
                                  <i class="fas fa-envelope me-2"></i> safeguarding@lerneadamsfoundation.org
                              </a>
                              <a href="tel:+254713736700" class="btn btn-outline-light rounded-pill fw-bold px-4">
                                  <i class="fas fa-phone-alt me-2"></i> +254 713 736700
                              </a>
                          </div>
                      </div>

                      <!-- Introduction -->
                      <p class="policy-intro">
                          Lerne Adams Foundation (LAF) is committed to transforming lives in the Lake Victoria Region. We work directly with children, young mothers, and vulnerable adults. The safety, dignity, and well-being of every person in our care is our <strong>highest priority</strong>. This Safeguarding and Child Protection Policy sets out our firm commitment, standards of behaviour, and operational procedures to ensure a safe environment for all.
                      </p>

                      <!-- 1. Our Commitment -->
                      <h2 class="policy-section-heading"><i class="fas fa-heart"></i> 1. Our Commitment</h2>
                      <div class="commitment-statement">
                          <p>"Lerne Adams Foundation is unequivocally committed to the protection of every child and vulnerable adult who comes into contact with our organization. We believe in the inherent dignity and right to safety of every person. Any form of abuse, exploitation, harm, or neglect—whether physical, emotional, sexual, or financial—will not be tolerated under any circumstances."</p>
                      </div>
                      <p class="policy-text">This commitment applies without exception to all activities, programmes, events, partnerships, and communications conducted by or on behalf of LAF.</p>

                      <hr class="my-5 opacity-25">

                      <!-- 2. Scope -->
                      <h2 class="policy-section-heading"><i class="fas fa-users"></i> 2. Scope of This Policy</h2>
                      <p class="policy-text">This policy applies to <strong>all individuals</strong> who are involved with LAF, including:</p>
                      <ul class="policy-list">
                          <li>Paid staff and employees</li>
                          <li>Volunteers and interns</li>
                          <li>Board members and trustees</li>
                          <li>Consultants and contractors</li>
                          <li>Partner organizations and their staff</li>
                          <li>Visitors, donors, and journalists</li>
                      </ul>

                      <hr class="my-5 opacity-25">

                      <!-- 3. Code of Conduct -->
                      <h2 class="policy-section-heading"><i class="fas fa-clipboard-check"></i> 3. Code of Conduct for Staff & Volunteers</h2>
                      <p class="policy-text">All LAF staff and volunteers are required to sign and adhere to our Code of Conduct. The following standards of behaviour are expected at all times:</p>
                      <ul class="policy-list mb-4">
                          <li>Treat all beneficiaries with respect, dignity, and kindness.</li>
                          <li>Ensure that interactions with children occur in visible, open environments.</li>
                          <li>Report any concerns about a child's welfare immediately.</li>
                          <li>Maintain professional boundaries at all times.</li>
                      </ul>
                      
                      <p class="policy-text fw-bold">The following behaviours are strictly prohibited:</p>
                      <ul class="prohibited-list list-unstyled">
                          <li><i class="fas fa-times-circle mt-1"></i> Physical punishment or rough handling of any beneficiary.</li>
                          <li><i class="fas fa-times-circle mt-1"></i> Spending time alone with a child away from others.</li>
                          <li><i class="fas fa-times-circle mt-1"></i> Photographing or filming children without explicit guardian consent.</li>
                          <li><i class="fas fa-times-circle mt-1"></i> Engaging in any sexual conduct or discussion with or in the presence of children.</li>
                      </ul>

                      <hr class="my-5 opacity-25">

                      <!-- 4. Data Protection -->
                      <h2 class="policy-section-heading"><i class="fas fa-lock"></i> 4. Data Protection of Beneficiaries</h2>
                      <p class="policy-text">The privacy and dignity of our beneficiaries is paramount. LAF is committed to the following standards:</p>
                      <ul class="policy-list">
                          <li>Personal data is stored securely and accessed only by authorized staff.</li>
                          <li>Photographs or videos of vulnerable individuals are only taken and used with informed consent.</li>
                          <li>Beneficiary data is never sold, shared publicly, or transferred to third parties without explicit consent.</li>
                      </ul>
                      
                  </div>
              </div>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
