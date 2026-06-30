<?php
session_start();
require_once 'includes/connection.php';

$slug = $_GET['slug'] ?? null;
$event = null;

if ($slug) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM events WHERE slug = ?");
        $stmt->execute([$slug]);
        $event = $stmt->fetch();
    } catch (PDOException $e) {
        // Silently handle error, redirect if not found
    }
}

if (!$event) {
    header("Location: events.php");
    exit();
}

$image = !empty($event['photo']) ? "images/" . htmlspecialchars($event['photo']) : "images/lerne/placeholder.jpg";
?>
<!doctype html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
  <title><?= htmlspecialchars($event['name']) ?> | Lerne Adams Foundation</title>
  <meta name="description" content="<?= htmlspecialchars(substr($event['description'], 0, 150)) ?>...">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <!-- PAGE HEADER -->
  <section class="laf-page-header">
      <div class="laf-page-header-bg" style="background-image: url('images/lerne/activities/469909348_1813644576074800_7061410995148019999_n.jpg');"></div>
      <div class="laf-page-header-content container">
          <h1 class="display-5 fw-bold text-truncate mx-auto" style="max-width: 900px;"><?= htmlspecialchars($event['name']) ?></h1>
          <div class="laf-breadcrumb">
              <a href="index.php">Home</a> <span class="mx-2">/</span> <a href="events.php">Events</a> <span class="mx-2">/</span> Details
          </div>
      </div>
  </section>

  <!-- EVENT DETAIL SECTION -->
  <section class="laf-section bg-white laf-observe">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-10">
                  <div class="bg-white rounded shadow-sm overflow-hidden border border-1">
                      <img src="<?= $image ?>" alt="<?= htmlspecialchars($event['name']) ?>" class="img-fluid w-100" style="max-height: 500px; object-fit: cover;">
                      
                      <div class="p-5">
                          <div class="d-flex flex-wrap gap-4 mb-4">
                              <div class="d-flex align-items-center text-laf-orange fw-bold">
                                  <i class="far fa-calendar-alt me-2 fa-lg"></i> <?= htmlspecialchars($event['event_date']) ?>
                              </div>
                              <div class="d-flex align-items-center text-laf-navy fw-bold">
                                  <i class="far fa-clock me-2 fa-lg text-laf-orange"></i> <?= htmlspecialchars($event['event_time']) ?>
                              </div>
                          </div>
                          
                          <h2 class="font-heading text-laf-navy mb-4"><?= htmlspecialchars($event['name']) ?></h2>
                          
                          <div class="text-muted lh-lg fs-5 mb-5">
                              <?= nl2br(htmlspecialchars($event['description'])) ?>
                          </div>
                          
                          <!-- CTA -->
                          <div class="p-4 bg-laf-off-white rounded border-start border-4 border-laf-orange text-center mb-5">
                              <h4 class="font-heading mb-3 text-laf-navy">Join Us for this Event</h4>
                              <p class="text-muted mb-4">Your participation makes a difference. Register your attendance below.</p>
                              <!-- Using contact.php as a placeholder for registration since register.php might be for auth -->
                              <a href="contact.php?subject=Register%20for%20<?= urlencode($event['name']) ?>" class="laf-btn laf-btn-orange">Register Now <i class="fas fa-arrow-right ms-2"></i></a>
                          </div>
                          
                          <hr class="my-5">
                          
                          <!-- Navigation -->
                          <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                              <a href="events.php" class="laf-btn laf-btn-outline-navy"><i class="fas fa-arrow-left me-2"></i> Back to Events</a>
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
