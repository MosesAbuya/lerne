<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <?php include 'includes/head.php'?>
    <?php include 'includes/preloader.php'; ?>
    <style>
    h1 {
        font-size: 4.5rem;
        font-weight: 800;
        text-align: center;
        color: #f27420;
    }

    .h-container {
        background-image: url('assets/img/hero/back5.png');
        background-size: cover;
        background-attachment: fixed;
    }

    .slider-area2 {
        background-color: rgba(0, 0, 0, 0.252);
    }

    .header-area .header-top .header-info-left>ul>li {
        color: #1f2b7b;
    }

    .header-area .header-top .header-info-left .header-social>ul>li>a {
        color: #f27420;
    }

    .header-area .header-top .header-info-right .contact-now li a {
        color: #1f2b7b;
    }
    </style>
    <link rel="stylesheet" href="slums.css">
    <link rel="stylesheet" href="text-area.css">
</head>

<body>
    <?php include 'includes/sidebar.php' ?>
    <?php include 'includes/navbar.php'?>

    <div class="h-container">

        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 pt-20 text-center">
                                <h2><a href="index">Home</a>/Why Nairobi Slums?</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
    </div>

    <section class="text-area" id="work">
        <div class="section-tittle mb-35">
            <span>What we offer</span>
            <h2>Empowering Communities Through Education and Advocacy</h2>
        </div>
        <div class="text-area-container">
            <div class="text-area-image-left t-area-img">
                <img class="rotate-in" src="assets/img/gallery/daycare.jpg" alt="education">
            </div>
            <div class="text-area-text-right slide-in-right t-area">
                <h3>1. Addressing Population and Educational Challenges</h3>
                <p>
                    Nairobi's slums are home to approximately 2.5 million people, representing around 60% of the city's
                    population while occupying only 6% of the land area. In settlements like Kibera, nearly 40% of over
                    500,000 school-age children are not enrolled in school. Barrizi Organisation aims to bridge this gap
                    by providing access to quality education, empowering children with the tools they need to break the
                    cycle of poverty.
                </p>
            </div>
        </div>
        <div class="text-area-container">
            <div class="text-area-text-mid-left slide-in-left t-area">
                <h2>Supporting Bright, Vulnerable Learners in Junior Secondary Education</h2>
                <p>We empower academically gifted but vulnerable learners by offering financial and educational
                    support, enabling them to access quality junior secondary education and secure their future. Our
                    goal is to break the cycle of poverty through consistent academic excellence.

                </p>
            </div>
            <div class="text-area-image-mid-right  t-area-img">
                <img class="fade-in" src="assets/img/gallery/education.jpg" alt="education">
            </div>
        </div>

        <div class="text-area-container">
            <div class="text-area-text-mid-left slide-in-left t-area">
                <h2>Engaging Holiday Activities: Sports, Music, Taekwondo, and Acrobatics</h2>
                <p>Our structured holiday programs keep children active, creative, and safe during school breaks,
                    fostering physical fitness, teamwork, and artistic expression. These activities also build
                    confidence, discipline, and a sense of achievement among participants.</p>
            </div>
            <div class="text-area-image-mid-right  t-area-img">
                <img class="fade-in" src="assets/img/gallery/sports.jpg" alt="education">
            </div>
        </div>
    </section>



    <?php include 'includes/footer.php'?>
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <?php include 'includes/script.php'; ?>
</body>

</html>
