<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Terms & Conditions | Lerne Adams Foundation</title>
  <meta name="description" content="Terms and Conditions governing use of the Lerne Adams Foundation website, donations, and services. Governed by the laws of Kenya.">
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
      .policy-highlight-box {
          background: #FDFBF7;
          border-left: 4px solid var(--laf-orange);
          border-radius: 0 12px 12px 0;
          padding: 20px 24px;
          margin: 20px 0 24px;
      }
      .policy-highlight-box p {
          font-size: 1rem;
          line-height: 1.75;
          color: var(--text-dark);
          margin: 0;
      }
      .policy-contact-box {
          background: var(--laf-navy);
          color: #fff;
          border-radius: 12px;
          padding: 30px 35px;
          margin-top: 40px;
      }
      .policy-contact-box h4 {
          font-family: var(--font-heading);
          font-size: 1.6rem;
          color: #fff;
          margin-bottom: 10px;
      }
      .policy-contact-box p {
          color: rgba(255, 255, 255, 0.7);
          margin-bottom: 14px;
          font-size: 0.98rem;
      }
      .policy-contact-box a {
          color: var(--laf-orange);
          font-weight: 600;
      }
      @media (max-width: 767px) {
          .policy-card {
              padding: 30px 22px;
          }
      }
  </style>
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/470215991_1813636732742251_1092272697177516536_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Terms & Conditions</h1>
          <div class="laf-breadcrumb">
              <a href="index">Home</a> <span class="mx-2">/</span> Terms & Conditions
          </div>
      </div>
  </section>

  <!-- CONTENT -->
  <section class="laf-section bg-laf-off-white laf-observe">
      <div class="container">
          <div class="row">
              <div class="col-lg-10 offset-lg-1">
                  <div class="policy-card">

                      <span class="policy-effective"><i class="fas fa-calendar-alt me-1"></i> Effective Date: January 2024</span>

                      <!-- Introduction -->
                      <p class="policy-intro">
                          These Terms and Conditions ("Terms") govern your access to and use of the Lerne Adams Foundation website at <strong>www.lerneadamsfoundation.org</strong> (the "Website") and any services, donations, or communications made through it. By accessing or using the Website, you agree to be bound by these Terms. If you do not agree, please do not use the Website.
                      </p>

                      <!-- 1. Acceptance of Terms -->
                      <h2 class="policy-section-heading"><i class="fas fa-handshake"></i> 1. Acceptance of Terms</h2>
                      <p class="policy-text">By using this Website, you confirm that you are at least 18 years of age or are accessing the Website under the supervision of a parent or legal guardian. Lerne Adams Foundation reserves the right to modify these Terms at any time. Any changes will be posted on this page with an updated effective date. Your continued use of the Website after such changes constitutes your acceptance of the revised Terms.</p>

                      <hr class="my-5 opacity-25">

                      <!-- 2. Permitted Use -->
                      <h2 class="policy-section-heading"><i class="fas fa-globe"></i> 2. Permitted Use of Website</h2>
                      <p class="policy-text">You agree to use this Website only for lawful purposes and in a manner that does not infringe the rights of others. You must not:</p>
                      <ul class="policy-list">
                          <li>Use the Website in any way that violates applicable Kenyan or international laws.</li>
                          <li>Transmit any unsolicited advertising or promotional material (spam).</li>
                          <li>Attempt to gain unauthorized access to any portion of the Website or its systems.</li>
                          <li>Reproduce, duplicate, copy, or re-sell any part of the Website in contravention of these Terms.</li>
                      </ul>

                      <hr class="my-5 opacity-25">

                      <!-- 3. Donation Policy -->
                      <h2 class="policy-section-heading"><i class="fas fa-hand-holding-heart"></i> 3. Donation Policy</h2>
                      <p class="policy-text">All donations made through the Lerne Adams Foundation Website are entirely voluntary. By making a donation, you acknowledge and agree to the following:</p>
                      <ul class="policy-list">
                          <li>All donations are used exclusively to fund our charitable programmes and operations in the Lake Victoria Region.</li>
                          <li>No goods or services are provided to donors in exchange for a donation.</li>
                          <li>Lerne Adams Foundation is a registered NGO in Kenya.</li>
                          <li>We reserve the right to use donated funds at our discretion in furtherance of our charitable mission.</li>
                      </ul>

                      <div class="policy-highlight-box">
                          <p><i class="fas fa-info-circle text-laf-orange me-2"></i> <strong>Note:</strong> Lerne Adams Foundation is committed to transparent use of all donations. We publish periodic impact reports on our website to demonstrate how your generosity makes a real difference in our community.</p>
                      </div>

                      <hr class="my-5 opacity-25">

                      <!-- 4. Intellectual Property -->
                      <h2 class="policy-section-heading"><i class="fas fa-copyright"></i> 4. Intellectual Property</h2>
                      <p class="policy-text">All content on this Website – including but not limited to text, graphics, logos, photographs, audio clips, videos, and data compilations – is the property of Lerne Adams Foundation or its content suppliers and is protected by applicable copyright, trademark, and other intellectual property laws.</p>

                      <hr class="my-5 opacity-25">

                      <!-- 5. Limitation of Liability -->
                      <h2 class="policy-section-heading"><i class="fas fa-shield-alt"></i> 5. Limitation of Liability</h2>
                      <p class="policy-text">To the maximum extent permitted by law, Lerne Adams Foundation, its directors, staff, and volunteers shall not be liable for any direct, indirect, incidental, consequential, or punitive damages arising from your use of, or inability to use, the Website.</p>

                      <hr class="my-5 opacity-25">

                      <!-- 6. Governing Law -->
                      <h2 class="policy-section-heading"><i class="fas fa-balance-scale"></i> 6. Governing Law</h2>
                      <p class="policy-text">These Terms and Conditions are governed by and construed in accordance with the <strong>laws of Kenya</strong>. Any disputes arising from or in connection with these Terms shall be subject to the exclusive jurisdiction of the courts of Kenya.</p>

                      <!-- Contact Box -->
                      <div class="policy-contact-box shadow-sm mt-5">
                          <h4><i class="fas fa-envelope text-laf-orange me-2"></i> Questions About These Terms?</h4>
                          <p>If you have any questions about these Terms and Conditions, please contact us:</p>
                          <div class="mt-4">
                              <p class="mb-2"><i class="fas fa-envelope text-laf-orange me-2" style="width: 20px;"></i> <a href="mailto:info@lerneadamsfoundation.org">info@lerneadamsfoundation.org</a></p>
                              <p class="mb-2"><i class="fas fa-phone text-laf-orange me-2" style="width: 20px;"></i> <a href="tel:+254713736700">+254 713 736700</a></p>
                              <p class="mb-0"><i class="fas fa-map-marker-alt text-laf-orange me-2" style="width: 20px;"></i> P.O. Box 1740-40100, Kisumu, Kenya</p>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
