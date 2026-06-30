<?php session_start(); require_once 'includes/connection.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Frequently Asked Questions | Lerne Adams Foundation</title>
  <meta name="description" content="Find answers to common questions about Lerne Adams Foundation, our programmes, volunteering, and more.">
  <style>
      .laf-faq-item {
          background: #fff;
          border-radius: var(--card-radius);
          margin-bottom: 15px;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
          overflow: hidden;
          border: 2px solid transparent;
          transition: border-color 0.25s;
      }
      .laf-faq-item.open {
          border-color: var(--laf-green);
      }
      .laf-faq-question {
          display: flex;
          align-items: center;
          justify-content: space-between;
          gap: 16px;
          padding: 20px 24px;
          cursor: pointer;
          user-select: none;
          transition: background 0.2s;
      }
      .laf-faq-question:hover {
          background: rgba(61, 139, 55, 0.04);
      }
      .laf-faq-question .fq-text {
          font-family: var(--font-heading);
          font-size: 1.1rem;
          color: var(--laf-navy);
          font-weight: bold;
          flex: 1;
      }
      .laf-faq-item.open .fq-text {
          color: var(--laf-green);
      }
      .laf-faq-question .fq-icon {
          width: 34px;
          height: 34px;
          border-radius: 50%;
          background: rgba(61, 139, 55, 0.1);
          color: var(--laf-green);
          display: flex;
          align-items: center;
          justify-content: center;
          flex-shrink: 0;
          transition: transform 0.3s, background 0.2s;
      }
      .laf-faq-item.open .fq-icon {
          transform: rotate(180deg);
          background: var(--laf-green);
          color: #fff;
      }
      .laf-faq-answer {
          display: none;
          padding: 0 24px 22px 24px;
          font-size: 0.98rem;
          line-height: 1.8;
          color: var(--text-muted);
          border-top: 1px solid rgba(61, 139, 55, 0.1);
      }
      .laf-faq-item.open .laf-faq-answer {
          display: block;
      }
  </style>
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/470215991_1813636732742251_1092272697177516536_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Frequently Asked Questions</h1>
          <div class="laf-breadcrumb">
              <a href="index">Home</a> <span class="mx-2">/</span> FAQ
          </div>
      </div>
  </section>

  <!-- CONTENT -->
  <section class="laf-section bg-laf-off-white laf-observe">
      <div class="container">
          
          <div class="text-center mb-5 max-w-800 mx-auto">
              <h2 class="laf-section-title">Got Questions? We Have Answers.</h2>
              <p class="text-muted lead">
                  Find answers to the most common questions about the Lerne Adams Foundation, our programmes, volunteering, and safeguarding. Can't find what you're looking for? <a href="contact" class="text-laf-green fw-bold">Contact us</a>.
              </p>
          </div>

          <div class="row justify-content-center">
              <div class="col-lg-8">
                  
                  <!-- CATEGORY 1 -->
                  <h4 class="font-heading text-laf-navy mb-4 mt-4 d-flex align-items-center">
                      <i class="fas fa-info-circle text-laf-green me-3 fa-lg"></i> About LAF
                  </h4>
                  
                  <div class="laf-faq-item open" id="faq-1">
                      <div class="laf-faq-question" onclick="toggleFaq('faq-1')">
                          <span class="fq-text">What is the Lerne Adams Foundation?</span>
                          <span class="fq-icon"><i class="fas fa-chevron-down"></i></span>
                      </div>
                      <div class="laf-faq-answer">
                          Lerne Adams Foundation (LAF) is an indigenous Kenyan Non-Governmental Organization (NGO). We focus on empowering marginalized communities in the Lake Victoria Region through health initiatives, educational support, SGBV advocacy, and socio-economic empowerment.
                      </div>
                  </div>
                  
                  <div class="laf-faq-item" id="faq-2">
                      <div class="laf-faq-question" onclick="toggleFaq('faq-2')">
                          <span class="fq-text">Where do you operate?</span>
                          <span class="fq-icon"><i class="fas fa-chevron-down"></i></span>
                      </div>
                      <div class="laf-faq-answer">
                          Our operations primarily cover the Lake Victoria Region in Kenya, with active programmes in Homa Bay, Kisumu, Migori, and Siaya counties.
                      </div>
                  </div>
                  
                  <div class="laf-faq-item" id="faq-3">
                      <div class="laf-faq-question" onclick="toggleFaq('faq-3')">
                          <span class="fq-text">How long have you been operating?</span>
                          <span class="fq-icon"><i class="fas fa-chevron-down"></i></span>
                      </div>
                      <div class="laf-faq-answer">
                          LAF began as a Community Based Organization (CBO) in 2016 and formally transitioned into a fully registered foundation in 2019 to expand our impact across the region.
                      </div>
                  </div>

                  <!-- CATEGORY 2 -->
                  <h4 class="font-heading text-laf-navy mb-4 mt-5 d-flex align-items-center">
                      <i class="fas fa-hand-holding-heart text-laf-orange me-3 fa-lg"></i> Support & Donations
                  </h4>
                  
                  <div class="laf-faq-item" id="faq-4">
                      <div class="laf-faq-question" onclick="toggleFaq('faq-4')">
                          <span class="fq-text">How can I support your work?</span>
                          <span class="fq-icon"><i class="fas fa-chevron-down"></i></span>
                      </div>
                      <div class="laf-faq-answer">
                          You can support us by volunteering your skills, partnering with us on projects, or providing financial support. Please visit our <a href="donate" class="text-laf-green fw-bold">Support Us</a> page to find our direct contact details for partnerships and donations.
                      </div>
                  </div>
                  
                  <div class="laf-faq-item" id="faq-5">
                      <div class="laf-faq-question" onclick="toggleFaq('faq-5')">
                          <span class="fq-text">How are funds utilized?</span>
                          <span class="fq-icon"><i class="fas fa-chevron-down"></i></span>
                      </div>
                      <div class="laf-faq-answer">
                          We are committed to transparency. Funds are directly channeled into our core programmes such as school fees, health outreach, and economic empowerment initiatives, with minimal overhead costs to ensure maximum community impact.
                      </div>
                  </div>

                  <!-- CATEGORY 3 -->
                  <h4 class="font-heading text-laf-navy mb-4 mt-5 d-flex align-items-center">
                      <i class="fas fa-users text-laf-blue me-3 fa-lg"></i> Volunteering
                  </h4>
                  
                  <div class="laf-faq-item" id="faq-6">
                      <div class="laf-faq-question" onclick="toggleFaq('faq-6')">
                          <span class="fq-text">How can I volunteer?</span>
                          <span class="fq-icon"><i class="fas fa-chevron-down"></i></span>
                      </div>
                      <div class="laf-faq-answer">
                          We welcome volunteers from all backgrounds. You can fill out the application form on our <a href="volunteer" class="text-laf-green fw-bold">Volunteer page</a>. Our team will review your skills and get in touch regarding available opportunities.
                      </div>
                  </div>
                  
                  <div class="laf-faq-item" id="faq-7">
                      <div class="laf-faq-question" onclick="toggleFaq('faq-7')">
                          <span class="fq-text">Do volunteers need to undergo background checks?</span>
                          <span class="fq-icon"><i class="fas fa-chevron-down"></i></span>
                      </div>
                      <div class="laf-faq-answer">
                          Yes. Child and community safety is our priority. Volunteers working directly with vulnerable groups will undergo a vetting process as part of our safeguarding policy.
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>

  <script>
      function toggleFaq(id) {
          var item = document.getElementById(id);
          if (!item) return;
          var isOpen = item.classList.contains('open');
          
          document.querySelectorAll('.laf-faq-item').forEach(function (el) { 
              el.classList.remove('open'); 
          });
          
          if (!isOpen) {
              item.classList.add('open');
          }
      }
  </script>
</body>
</html>
