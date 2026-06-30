<?php
session_start();
require_once 'includes/connection.php';
?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title>Upcoming Events | Lerne Adams Foundation</title>
  <meta name="description" content="Discover and participate in upcoming events, workshops, and community outreach programs organized by the Lerne Adams Foundation.">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/469909348_1813644576074800_7061410995148019999_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-4 fw-bold">Upcoming Events</h1>
          <div class="laf-breadcrumb">
              <a href="index">Home</a> <span class="mx-2">/</span> Events
          </div>
      </div>
  </section>

  <!-- INTRO -->
  <section class="laf-section bg-white laf-observe pb-0">
      <div class="container text-center max-w-800 mx-auto">
          <span class="laf-badge mb-4 mx-auto" style="display: table;">Join Us</span>
          <h2 class="laf-section-title text-center mb-4">Engage with Our Community</h2>
          <p class="lead text-muted">Be part of the change. Join our upcoming community dialogues, health camps, training sessions, and advocacy events.</p>
      </div>
  </section>

  <!-- EVENTS GRID -->
  <section class="laf-section bg-white laf-observe">
      <div class="container">
          <div class="row g-4">
              <?php
              try {
                  $stmt = $pdo->query("SELECT * FROM events ORDER BY event_date ASC");
                  $events = $stmt->fetchAll();

                  if (count($events) > 0) {
                      foreach ($events as $event) {
                          $image = !empty($event['photo']) ? "images/" . htmlspecialchars($event['photo']) : "images/lerne/placeholder.jpg";
              ?>
              <div class="col-lg-4 col-md-6 mb-4 d-flex">
                  <div class="laf-card border-0 h-100 shadow-sm w-100 d-flex flex-column" style="border-top: 4px solid var(--laf-orange);">
                      <div class="position-relative">
                          <img class="img-fluid w-100" src="<?= $image ?>" alt="<?= htmlspecialchars($event['name']) ?>" style="height: 220px; object-fit: cover;">
                          <div class="position-absolute bottom-0 start-0 bg-laf-orange text-white px-3 py-2 fw-bold m-3 rounded shadow-sm">
                              <i class="far fa-calendar-alt me-2"></i> <?= htmlspecialchars($event['event_date']) ?>
                          </div>
                      </div>
                      <div class="laf-card-body d-flex flex-column p-4 flex-grow-1">
                          <div class="small text-laf-navy fw-bold mb-2">
                              <i class="far fa-clock text-laf-orange me-1"></i> <?= htmlspecialchars($event['event_time']) ?>
                          </div>
                          <h4 class="font-heading mb-3 text-laf-navy"><?= htmlspecialchars($event['name']) ?></h4>
                          <p class="text-muted mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                              <?= htmlspecialchars($event['description']) ?>
                          </p>
                          <a href="events/<?= $event['slug'] ?>" class="laf-btn laf-btn-outline-orange mt-auto align-self-start" style="padding: 8px 20px; font-size: 0.9rem;">View Details <i class="fas fa-arrow-right ms-1"></i></a>
                      </div>
                  </div>
              </div>
              <?php
                      }
                  } else {
                      echo "<div class='col-12 text-center py-5'><div class='p-5 bg-laf-off-white rounded text-muted'><i class='far fa-calendar-times fa-3x mb-3 opacity-50'></i><p class='mb-0'>There are no upcoming events at this time.</p></div></div>";
                  }
              } catch (PDOException $e) {
                  echo "<div class='col-12 text-center py-5'><div class='alert alert-warning'>Unable to load events at this time.</div></div>";
              }
              ?>
          </div>
      </div>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
