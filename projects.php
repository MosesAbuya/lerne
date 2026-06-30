<!doctype html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Our Projects | Barrizi Organisation Kenya</title>
    <style>
        body { padding-top: 0; }
        .header-area { display: none !important; }

        /* Inner Page Header */
        .brz-page-header {
            background: var(--navy);
            padding: 160px 0 80px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        .brz-page-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url('assets/img/hero/back12.png');
            background-size: cover;
            background-position: center;
            opacity: 0.25; mix-blend-mode: luminosity;
            
        }
        .brz-page-header__content {
            position: relative;
            z-index: 2;
        }
        .brz-page-header__title {
            font-family: var(--font-heading);
            font-size: clamp(3rem, 7vw, 5rem);
            color: var(--white);
            line-height: 1;
            margin-bottom: 10px;
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

        /* Project Card Styling */
        .brz-project-card {
            background: var(--white);
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
            border-bottom: 5px solid var(--orange);
        }
        .brz-project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        .brz-project-img {
            width: 100%;
            height: 240px;
            object-fit: cover;
        }
        .brz-project-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .brz-project-title {
            font-family: var(--font-heading);
            font-size: 1.6rem;
            color: var(--purple);
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        .brz-project-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s;
        }
        .brz-project-title a:hover {
            color: var(--orange);
        }

        /* Progress Bar */
        .brz-progress-wrap {
            margin-top: auto;
            margin-bottom: 15px;
        }
        .brz-progress-bar {
            height: 8px;
            background: rgba(0,0,0,0.1);
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 10px;
        }
        .brz-progress-fill {
            height: 100%;
            background: var(--orange);
            border-radius: 4px;
        }
        .brz-progress-stats {
            display: flex;
            justify-content: space-between;
            font-family: var(--font-heading);
            font-size: 1.1rem;
            color: var(--navy);
        }
        .brz-progress-stats span {
            color: var(--orange);
        }
    </style>
</head>

<body>

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<main>

    <!-- Page Header -->
    <section class="brz-page-header">
        <div class="container brz-page-header__content">
            <h1 class="brz-page-header__title brz-observe slide-up">OUR <span style="color:var(--orange);">PROJECTS</span></h1>
            <div class="brz-page-header__breadcrumb brz-observe slide-up anim-delay-1">
                <a href="index.php">Home</a> / Our Projects
            </div>
        </div>
    </section>

    <!-- Brush Stroke Divider -->
    <div class="brz-svg-divider" style="background:transparent; margin-top:-59px; position:relative; z-index:10; pointer-events:none;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60" preserveAspectRatio="none" style="display:block;width:100%;height:60px;">
            <path fill="#FDFBF7" d="
                M0,30 C120,10 240,40 360,25 C480,10 600,45 720,30
                C840,15 960,45 1080,30 C1200,15 1320,35 1440,25
                L1440,60 L0,60 Z
            "/>
        </svg>
    </div>

    <section style="background:var(--off-white); padding:90px 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5 brz-observe slide-up">
                        <span class="brz-section-label label-orange">Active & Past Projects</span>
                        <h2 class="section-title-purple">TAKE A LOOK AT OUR LATEST CASES</h2>
                        <div class="divider-orange mx-auto"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                require 'includes/connection.php';
                $query = "SELECT * FROM blog ORDER BY id";
                $query_run = mysqli_query($connection, $query);
                
                if (mysqli_num_rows($query_run) > 0) {
                    while ($row = mysqli_fetch_array($query_run)) {
                        $raised = $row['raised'];
                        $target = $row['target'];
                        $percentage = ($target > 0) ? round(($raised / $target) * 100, 2) : 0;
                        if($percentage > 100) $percentage = 100;
                        ?>
                        <div class="col-lg-4 col-md-6 mb-4 brz-observe slide-up">
                            <div class="brz-project-card" id="category-<?php echo $row['id']; ?>">
                                <img src="images/<?php echo $row['photo']; ?>" alt="" class="brz-project-img">
                                <div class="brz-project-content">
                                    <h3 class="brz-project-title">
                                        <a href="project_details.php?id=<?php echo $row['id']; ?>">
                                            <?php echo htmlspecialchars($row['name']); ?>
                                        </a>
                                    </h3>
                                    
                                    <div class="brz-progress-wrap">
                                        <div class="brz-progress-bar">
                                            <div class="brz-progress-fill" style="width: <?php echo $percentage; ?>%;"></div>
                                        </div>
                                        <div class="brz-progress-stats">
                                            <div>Raised: <span>$<?php echo number_format($raised); ?></span></div>
                                            <div>Goal: <span>$<?php echo number_format($target); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<div class="col-12 text-center"><p>No projects found.</p></div>';
                }
                ?>
            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>

<!-- Scroll Up -->
<a href="#" id="brz-back-top" title="Go to Top">
    <i class="fas fa-chevron-up"></i>
</a>

<?php include 'includes/script.php'; ?>

<script>
// Intersection Observer for animations
(function() {
    if (!('IntersectionObserver' in window)) {
        document.querySelectorAll('.brz-observe').forEach(function(el) {
            el.classList.add('brz-visible');
        });
        return;
    }

    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('brz-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.brz-observe').forEach(function(el) {
        observer.observe(el);
    });
})();

// Back to top logic
(function() {
    var btn = document.getElementById('brz-back-top');
    if (!btn) return;
    window.addEventListener('scroll', function() {
        if (window.scrollY > 400) {
            btn.classList.add('visible');
        } else {
            btn.classList.remove('visible');
        }
    }, { passive: true });
})();
</script>

</body>
</html>

