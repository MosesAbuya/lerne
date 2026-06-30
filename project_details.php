<?php
ob_start();
require 'includes/connection.php';

$project_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$project = null;

if ($project_id > 0) {
    $query_run = mysqli_query($connection, "SELECT * FROM blog WHERE id = " . $project_id);
    if ($query_run && mysqli_num_rows($query_run) > 0) {
        $project = mysqli_fetch_assoc($query_run);
    }
}

if (!$project) {
    ob_end_clean();
    header("Location: index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
    <title><?php echo htmlspecialchars($project['name']); ?> | Barrizi Organisation</title>
    <style>
        body { padding-top: 0; background: var(--off-white); }
        .header-area { display: none !important; }

        /* Inner Page Header */
        .brz-page-header {
            background: var(--navy);
            padding: 180px 0 100px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        .brz-page-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url('images/<?php echo htmlspecialchars($project['photo']); ?>');
            background-size: cover;
            background-position: center;
            opacity: 0.25;
            
        }
        .brz-page-header__content {
            position: relative;
            z-index: 2;
        }
        .brz-page-header__title {
            font-family: var(--font-heading);
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            color: var(--white);
            line-height: 1.1;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        .brz-page-header__breadcrumb {
            font-family: var(--font-heading);
            font-size: 1.2rem;
            color: var(--yellow);
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }
        .brz-page-header__breadcrumb a {
            color: var(--white);
            transition: color 0.3s;
        }
        .brz-page-header__breadcrumb a:hover {
            color: var(--orange);
        }

        .brz-project-content {
            background: #fff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.05);
            margin-top: -60px;
            position: relative;
            z-index: 10;
            border-top: 5px solid var(--purple);
        }
        
        .brz-project-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #444;
            margin-bottom: 40px;
        }

        .brz-progress-widget {
            background: var(--off-white);
            padding: 30px;
            border-radius: 8px;
            border-left: 5px solid var(--orange);
            margin-bottom: 30px;
        }
        
        .brz-progress-widget h3 {
            font-family: var(--font-heading);
            font-size: 2rem;
            color: var(--navy);
            margin-bottom: 15px;
        }

        .brz-stat-row {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            font-family: var(--font-heading);
            font-size: 1.5rem;
        }
        .brz-stat-raised { color: var(--purple); }
        .brz-stat-goal { color: var(--navy); }

    </style>
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<main>
    <!-- Page Header -->
    <section class="brz-page-header">
        <div class="container brz-page-header__content">
            <h1 class="brz-page-header__title brz-observe slide-up"><?php echo htmlspecialchars($project['name']); ?></h1>
            <div class="brz-page-header__breadcrumb brz-observe slide-up anim-delay-1">
                <a href="index">Home</a> / <a href="projects">Projects</a> / Details
            </div>
        </div>
    </section>

    <!-- Brush Stroke Divider -->
    <div class="brz-svg-divider" style="background:transparent; margin-top:-59px; position:relative; z-index:10; pointer-events:none;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60" preserveAspectRatio="none" style="display:block;width:100%;height:60px;">
            <path fill="#FDFBF7" d="M0,30 C150,60 350,0 600,20 C850,40 1000,10 1200,30 C1350,45 1440,20 1440,20 L1440,60 L0,60 Z"/>
        </svg>
    </div>

    <!-- Content Section -->
    <section style="padding-bottom: 90px; background: var(--off-white);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="brz-project-content brz-observe slide-up">
                        
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="brz-project-text">
                                    <p><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="brz-progress-widget">
                                    <h3>Project Funding</h3>
                                    <?php
                                    $raised = $project['raised'];
                                    $target = $project['target'];
                                    $percentage = ($target > 0) ? round(($raised / $target) * 100, 2) : 0;
                                    ?>
                                    <div class="brz-progress">
                                        <div class="brz-progress-bar" style="width: <?php echo $percentage; ?>%;"></div>
                                    </div>
                                    <div class="brz-stat-row">
                                        <span class="brz-stat-raised">Raised: $<?php echo number_format($raised); ?></span>
                                        <span class="brz-stat-goal">Goal: $<?php echo number_format($target); ?></span>
                                    </div>
                                    <a href="donate.php?event_id=<?php echo $project['id']; ?>" class="brz-btn brz-btn-orange w-100 mt-4 text-center">DONATE TOWARDS THIS CAUSE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Brush Stroke Divider -->
    <div class="brz-svg-divider" style="background:var(--off-white);">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60" preserveAspectRatio="none" style="display:block;width:100%;height:60px;">
            <path fill="#F37021" d="
                M0,20 C100,40 200,5 300,25 C400,45 500,10 600,30
                C700,50 800,15 900,35 C1000,55 1100,20 1200,40
                C1300,60 1380,25 1440,40
                L1440,60 L0,60 Z
            "/>
        </svg>
    </div>

    <!-- Direct CTA -->
    <section class="brz-cta-banner" style="background:var(--orange); padding:80px 0; text-align:center;">
        <div class="container" style="position:relative; z-index:2;">
            <h2 class="brz-cta-banner__title brz-observe slide-up" style="font-family:var(--font-heading); font-size:clamp(2rem, 5vw, 4rem); color:var(--navy);">
                A PATHWAY OUT OF POVERTY. A FUTURE FULL OF HOPE.
            </h2>
            <div class="mt-4 brz-observe slide-up anim-delay-1">
                <a href="projects" class="brz-btn" style="background:var(--navy); color:var(--white);">VIEW MORE PROJECTS</a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/script.php'; ?>
</body>
</html>

