<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Privacy Policy | Lerne Adams Foundation</title>
  <meta name="description" content="Lerne Adams Foundation's Privacy Policy - how we collect, use, protect, and retain your personal data.">
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
          <h1 class="display-4 fw-bold">Privacy Policy</h1>
          <div class="laf-breadcrumb">
              <a href="index">Home</a> <span class="mx-2">/</span> Privacy Policy
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
                          Lerne Adams Foundation ("LAF", "we", "our", or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard information when you visit our website <strong>www.lerneadamsfoundation.org</strong>, make a donation, sign up for our newsletter, or otherwise interact with us. Please read this policy carefully. By using our website or services, you consent to the practices described in this policy.
                      </p>

                      <!-- 1. Data We Collect -->
                      <h2 class="policy-section-heading"><i class="fas fa-database"></i> 1. Information We Collect</h2>
                      <p class="policy-text">We collect personal information you voluntarily provide to us, as well as certain technical data collected automatically when you use our website.</p>
                      
                      <p class="policy-text fw-bold">Personal information you provide:</p>
                      <ul class="policy-list">
                          <li><strong>Contact details</strong> – your name, email address, and phone number when you submit our contact, volunteer, or other forms.</li>
                          <li><strong>Donation data</strong> – we receive transaction confirmation and a limited set of billing details. All payment processing is handled securely by our certified payment providers.</li>
                          <li><strong>Newsletter subscriptions</strong> – your email address if you subscribe to our updates.</li>
                      </ul>
                      
                      <p class="policy-text fw-bold">Automatically collected technical data:</p>
                      <ul class="policy-list">
                          <li>IP address, browser type and version, operating system.</li>
                          <li>Pages visited, time spent on pages, and referring URLs.</li>
                      </ul>

                      <hr class="my-5 opacity-25">

                      <!-- 2. How We Use Your Data -->
                      <h2 class="policy-section-heading"><i class="fas fa-cogs"></i> 2. How We Use Your Information</h2>
                      <p class="policy-text">We use the information we collect for the following purposes:</p>
                      <ul class="policy-list">
                          <li>To process and acknowledge your donations and send you donation receipts.</li>
                          <li>To respond to your enquiries, feedback, or support requests in a timely manner.</li>
                          <li>To send you our newsletter, impact updates, and programme news only where you have subscribed or otherwise consented.</li>
                          <li>To manage volunteer applications, sponsorships, and partnerships.</li>
                          <li>To improve our website, content, and services based on usage analytics.</li>
                      </ul>

                      <hr class="my-5 opacity-25">

                      <!-- 3. Who We Share With -->
                      <h2 class="policy-section-heading"><i class="fas fa-share-alt"></i> 3. How We Share Your Information</h2>
                      <p class="policy-text">We do not sell, rent, or trade your personal information to any third party for marketing purposes. We may share your data only in the following limited circumstances:</p>
                      <ul class="policy-list">
                          <li><strong>Legal requirements:</strong> We may disclose your information if required to do so by law, court order, or in response to a lawful request by public authorities.</li>
                          <li><strong>Organizational protection:</strong> We may share information to investigate, prevent, or take action regarding suspected illegal activities or violations of our terms.</li>
                      </ul>

                      <hr class="my-5 opacity-25">

                      <!-- 4. Data Security & Retention -->
                      <h2 class="policy-section-heading"><i class="fas fa-lock"></i> 4. Data Security & Retention</h2>
                      <p class="policy-text">We implement appropriate technical and organizational measures to protect your personal data against unauthorized access, disclosure, alteration, or destruction. However, no method of transmission over the internet is 100% secure.</p>
                      <p class="policy-text">We retain your personal data only for as long as necessary to fulfill the purposes described in this policy, or as required by applicable law.</p>
                      
                      <hr class="my-5 opacity-25">

                      <!-- Contact Box -->
                      <div class="policy-contact-box shadow-sm">
                          <h4><i class="fas fa-envelope text-laf-orange me-2"></i> Contact Us About Your Data</h4>
                          <p>If you have any questions, concerns, or requests regarding this Privacy Policy or your personal data, please reach out to us:</p>
                          
                          <div class="mt-4">
                              <p class="mb-2"><i class="fas fa-envelope text-laf-orange me-2" style="width: 20px;"></i> <a href="mailto:info@lerneadamsfoundation.org">info@lerneadamsfoundation.org</a></p>
                              <p class="mb-2"><i class="fas fa-phone text-laf-orange me-2" style="width: 20px;"></i> <a href="tel:+254713736700">+254 713 736700</a> / <a href="tel:+254722116416">+254 722 116416</a></p>
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
