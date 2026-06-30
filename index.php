<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php'; ?>
    <style>
        /* Homepage-specific additions */
        .cta-section {
            background: linear-gradient(rgba(13, 59, 46, 0.85), rgba(13, 59, 46, 0.85)), url('images/lerne/pexels-prince-beguin-81839921-14419891.jpg') center/cover;
            padding: 120px 0;
            color: #fff;
        }
        .news-card {
            border-radius: var(--card-radius);
            overflow: hidden;
            position: relative;
            height: 400px;
            display: block;
        }
        .news-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
        .news-card:hover img { transform: scale(1.05); }
        .news-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(13,59,46,0.9) 0%, transparent 60%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 30px;
            color: #fff;
        }
        .news-overlay h4, .news-overlay span { color: #fff !important; }
        .news-tag {
            background: rgba(255,255,255,0.2);
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 12px;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255,255,255,0.3);
            width: fit-content;

        }
    </style>
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<main>

    <!-- HERO SECTION -->
    <section class="laf-hero">
        <div id="heroCarousel" class="carousel slide carousel-fade w-100" data-bs-ride="carousel" data-bs-interval="6000">
            <div class="carousel-inner h-100">
                <!-- Slide 1 -->
                <div class="carousel-item active h-100">
                    <div class="laf-hero-bg" style="background-image: url('images/lerne/friends-6065345_1280.jpg');"></div>
                    <div class="laf-hero-overlay"></div>
                    <div class="laf-hero-content">
                        <div class="laf-observe">
                            <span class="laf-hero-eyebrow">Lerne Adams Foundation</span>
                            <h1>Empowering Communities Towards Prosperity</h1>
                            <p>We are an indigenous Kenyan NGO dedicated to health, education, SGBV advocacy, and socio-economic empowerment in the Lake Victoria Region.</p>
                            <div class="d-flex gap-3 flex-wrap" style="margin-bottom: 60px;">
                                <a href="donate.php" class="laf-btn laf-btn-yellow">Donate Now <span class="arrow">↗</span></a>
                                <a href="about.php" class="laf-btn laf-btn-outline-white">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item h-100">
                    <div class="laf-hero-bg" style="background-image: url('images/lerne/kids-3311090_1280.jpg');"></div>
                    <div class="laf-hero-overlay"></div>
                    <div class="laf-hero-content">
                        <div class="laf-observe">
                            <span class="laf-hero-eyebrow">Health & Wellness</span>
                            <h1>Building Resilient &amp; Healthy Communities</h1>
                            <p>Providing critical HIV prevention, SRH education, and mental health support to vulnerable populations.</p>
                            <div class="d-flex gap-3">
                                <a href="program.php" class="laf-btn laf-btn-yellow">Our Programmes <span class="arrow">↗</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="carousel-item h-100">
                    <div class="laf-hero-bg" style="background-image: url('images/lerne/woman-2886580_1280.jpg');"></div>
                    <div class="laf-hero-overlay"></div>
                    <div class="laf-hero-content">
                        <div class="laf-observe">
                            <span class="laf-hero-eyebrow">Advocacy & Action</span>
                            <h1>Standing Up Against Gender-Based Violence</h1>
                            <p>Advocating for the rights and protection of women, girls, and marginalized individuals across the region.</p>
                            <div class="d-flex gap-3">
                                <a href="sgbv.php" class="laf-btn laf-btn-yellow">SGBV Advocacy <span class="arrow">↗</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>

            <div class="laf-hero-stat-card d-none d-lg-block laf-observe anim-delay-3">
                <div class="stat-icon"><i class="fas fa-hands-helping"></i></div>
                <h4>Making a Lasting Impact</h4>
                <p>Since 2019, our interventions have transformed thousands of lives across Homa Bay and Kisumu counties.</p>
                <div class="laf-hero-stat-numbers">
                    <div class="laf-hero-stat-item">
                        <div class="num laf-counter" data-target="2500" data-suffix="+">0</div>
                        <div class="label">Lives Reached</div>
                    </div>
                    <div class="laf-hero-stat-item">
                        <div class="num laf-counter" data-target="15" data-suffix="+">0</div>
                        <div class="label">Active Programmes</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- IMPACT CARDS SECTION -->
    <section class="position-relative laf-section bg-white" style="z-index: 10;">
        <div class="container">
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6 laf-observe">
                    <div class="initiatives-card">
                        <img src="images/lerne/child-child-2083973_1280.jpg" alt="Health">
                        <div class="initiatives-card-body">
                            <div class="initiatives-card-icon"><i class="fas fa-heartbeat"></i></div>
                            <h4 class="initiatives-card-title">Health &amp; Wellness</h4>
                            <p class="initiatives-card-text">Comprehensive HIV prevention, care for infected individuals, and Sexual Reproductive Health education.</p>
                        </div>
                        <a href="hiv.php" class="initiatives-btn">Read More</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-2">
                    <div class="initiatives-card">
                        <img src="images/lerne/girl-469157_1280.jpg" alt="Advocacy">
                        <div class="initiatives-card-body">
                            <div class="initiatives-card-icon"><i class="fas fa-balance-scale"></i></div>
                            <h4 class="initiatives-card-title">SGBV Advocacy</h4>
                            <p class="initiatives-card-text">Combating Sexual and Gender-Based Violence through community sensitization and support for survivors.</p>
                        </div>
                        <a href="sgbv.php" class="initiatives-btn">Read More</a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-3">
                    <div class="initiatives-card">
                        <img src="images/lerne/istockphoto-1016454514-612x612.jpg" alt="Empowerment">
                        <div class="initiatives-card-body">
                            <div class="initiatives-card-icon"><i class="fas fa-seedling"></i></div>
                            <h4 class="initiatives-card-title">Women &amp; Youth</h4>
                            <p class="initiatives-card-text">Economic empowerment through skills training, financial literacy, and sustainable livelihood support.</p>
                        </div>
                        <a href="program.php#women" class="initiatives-btn">Read More</a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 laf-observe anim-delay-4">
                <p style="font-weight: 600; font-size: 1.05rem;">
                    <span class="badge bg-laf-yellow text-dark py-2 px-3 me-2" style="border-radius: 20px;">Explore</span>
                    View all our community impact programmes. <a href="program.php" class="text-laf-green text-decoration-underline">Our Programmes</a>
                </p>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="laf-section laf-section-offwhite" style="padding-top: 60px;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="laf-observe">
                        <span class="laf-badge">About Our NGO</span>
                        <h2 class="laf-section-title">Working Together for a Just Society</h2>
                        <p class="mb-5 text-laf-muted" style="font-size: 1.1rem;">Lerne Adams Foundation is a mission-driven organization committed to improving lives and strengthening communities in Kenya. We believe in grassroots solutions to systemic challenges.</p>
                        
                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="rounded-circle bg-laf-yellow d-flex align-items-center justify-content-center" style="width:40px;height:40px;color:var(--laf-text-dark);"><i class="fas fa-bullseye"></i></div>
                                    <h5 class="mb-0">Our Mission</h5>
                                </div>
                                <p class="text-laf-muted" style="font-size:0.95rem;">To empower marginalized communities by providing access to health, education, and socio-economic opportunities.</p>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="rounded-circle bg-laf-yellow d-flex align-items-center justify-content-center" style="width:40px;height:40px;color:var(--laf-text-dark);"><i class="fas fa-eye"></i></div>
                                    <h5 class="mb-0">Our Vision</h5>
                                </div>
                                <p class="text-laf-muted" style="font-size:0.95rem;">A world where every individual has equal opportunities to thrive and live in dignity, free from poverty and violence.</p>
                            </div>
                        </div>

                        <a href="about.php" class="laf-btn laf-btn-yellow">More About Us <span class="arrow">↗</span></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative laf-observe anim-delay-2">
                        <img src="images/lerne/istockphoto-1064465542-612x612.jpg" alt="About LAF" class="rounded-laf shadow-laf" style="width:90%; border-radius: 20px;">
                        <div class="position-absolute" style="bottom: -30px; right: 0; background: var(--laf-yellow); padding: 30px; border-radius: 16px; box-shadow: var(--shadow-hover);">
                            <div class="font-heading" style="font-size: 2.5rem; font-weight: 800; line-height: 1; color: var(--laf-text-dark);">5+</div>
                            <div style="font-size: 0.9rem; font-weight: 600; color: var(--laf-text-dark); margin-top: 8px;">Years Of<br>Experience</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US / FEATURES -->
    <section class="laf-section laf-section-light">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 laf-observe">
                    <span class="laf-badge">Why Choose Us</span>
                    <h2 class="laf-section-title">Choosing us Means Driving Real Positive Change</h2>
                    <p class="text-laf-muted mb-4" style="font-size: 1.1rem;">We are committed to creating real, lasting change in the communities we serve. With transparency, integrity, and a people-first approach, our organization focuses on empowering individuals.</p>
                    
                    <div class="laf-video-block mt-5 shadow-laf">
                        <img src="images/lerne/istockphoto-1071198328-612x612.jpg" alt="Video Cover">
                        <div class="laf-video-play"><i class="fas fa-play"></i></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex flex-column gap-4">
                        <div class="bg-white p-4 rounded-laf shadow-laf laf-observe anim-delay-1">
                            <div class="d-flex gap-4">
                                <div class="initiatives-card-icon mt-1" style="margin-bottom:0;"><i class="fas fa-users"></i></div>
                                <div>
                                    <h4 style="font-size: 1.15rem;">Community-Centered Approach</h4>
                                    <p class="text-laf-muted mb-3" style="font-size: 0.95rem;">Programs designed with and for the communities we serve, ensuring relevance and sustainability.</p>
                                    <div style="font-size: 0.85rem; font-weight: 600; color: var(--laf-text-body);">
                                        <span style="color:var(--laf-yellow); margin-right:6px;">•</span> Transparent and ethical use of resources
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-laf shadow-laf laf-observe anim-delay-2">
                            <div class="d-flex gap-4">
                                <div class="initiatives-card-icon mt-1" style="margin-bottom:0;"><i class="fas fa-shield-alt"></i></div>
                                <div>
                                    <h4 style="font-size: 1.15rem;">Transparent & Ethical Practices</h4>
                                    <p class="text-laf-muted mb-3" style="font-size: 0.95rem;">Every action and donation is handled responsibly with full accountability to our partners.</p>
                                    <div style="font-size: 0.85rem; font-weight: 600; color: var(--laf-text-body);">
                                        <span style="color:var(--laf-yellow); margin-right:6px;">•</span> Focus on sustainable, long-term solutions
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4 rounded-laf shadow-laf laf-observe anim-delay-3">
                            <div class="d-flex gap-4">
                                <div class="initiatives-card-icon mt-1" style="margin-bottom:0;"><i class="fas fa-hands-helping"></i></div>
                                <div>
                                    <h4 style="font-size: 1.15rem;">Dedicated Team & Volunteers</h4>
                                    <p class="text-laf-muted mb-3" style="font-size: 0.95rem;">Passionate individuals committed to service, integrity, and uplifting the marginalized.</p>
                                    <div style="font-size: 0.85rem; font-weight: 600; color: var(--laf-text-body);">
                                        <span style="color:var(--laf-yellow); margin-right:6px;">•</span> Dedicated team & passionate volunteers
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DONATE CTA BANNER -->
    <section class="laf-cta-banner">
        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center g-5">
                <div class="col-lg-7 laf-observe">
                    <span class="laf-badge" style="border-color: rgba(255,255,255,0.2); color: rgba(255,255,255,0.8);">Join Us in Making Change</span>
                    <h2 class="laf-section-title text-white" style="font-size: clamp(2.2rem, 4vw, 3.5rem);">Your Support Brings Hope and Real Change</h2>
                    <p class="mb-5" style="font-size: 1.1rem; color: rgba(255,255,255,0.8); max-width: 560px;">Every donation and volunteer hour directly impacts lives in the Lake Victoria region. Together, we can build a society where no one is left behind.</p>
                    
                    <div class="row g-4 border-top pt-4" style="border-color: rgba(255,255,255,0.15) !important;">
                        <div class="col-4">
                            <div class="font-heading text-white" style="font-size: 2.2rem; font-weight: 800;">2.5k+</div>
                            <div style="font-size: 0.85rem; color: rgba(255,255,255,0.6);">Lives Empowered</div>
                        </div>
                        <div class="col-4">
                            <div class="font-heading text-white" style="font-size: 2.2rem; font-weight: 800;">15+</div>
                            <div style="font-size: 0.85rem; color: rgba(255,255,255,0.6);">Active Programs</div>
                        </div>
                        <div class="col-4">
                            <div class="font-heading text-white" style="font-size: 2.2rem; font-weight: 800;">7+</div>
                            <div style="font-size: 0.85rem; color: rgba(255,255,255,0.6);">Years of Impact</div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5 laf-observe anim-delay-2">
                    <div class="bg-white p-5 rounded-laf shadow-lg" style="color: var(--laf-text-dark);">
                        <h4 class="text-center mb-2" style="color: var(--laf-text-dark);">Support Our Mission</h4>
                        <p class="text-center mb-4" style="font-size: 0.9rem; color: var(--laf-text-muted);">All contributions directly fund our community programmes.</p>
                        
                        <div class="d-grid gap-3 mb-4">
                            <a href="donate.php" class="laf-btn laf-btn-yellow w-100 py-3" style="font-size: 1.05rem;">Make a Donation ↗</a>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="volunteer.php" class="btn btn-outline-secondary py-2" style="border-color: var(--laf-border);">Become a Volunteer</a>
                            <a href="contact.php" class="btn btn-outline-secondary py-2" style="border-color: var(--laf-border);">Partner With Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- IMPACT SECTION -->
    <section class="laf-section laf-section-white">
        <div class="container text-center mb-5">
            <span class="laf-badge">Our core value</span>
            <h2 class="laf-section-title mx-auto" style="max-width: 800px;">How we Turn Compassion Into Real Action</h2>
        </div>

        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 d-flex flex-column gap-4 laf-observe">
                    <div class="bg-laf-off-white p-4 rounded-laf text-center" style="flex: 1; display:flex; flex-direction:column; justify-content:center;">
                        <h4 class="font-heading mb-3" style="font-size: 1.8rem; font-weight:800; color:var(--laf-green-deep);">We serve with empathy, respect, and genuine care</h4>
                        <div class="d-flex justify-content-center mt-3"><div class="initiatives-card-icon" style="margin:0;"><i class="fas fa-heart"></i></div></div>
                    </div>
                    <div class="rounded-laf overflow-hidden" style="height: 250px;">
                        <img src="images/lerne/istockphoto-1138864843-612x612.jpg" alt="Impact" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                </div>
                
                <div class="col-lg-4 laf-observe anim-delay-2">
                    <div class="rounded-laf overflow-hidden position-relative h-100" style="min-height: 400px;">
                        <img src="images/lerne/istockphoto-1140153149-612x612.jpg" alt="Action" style="width:100%;height:100%;object-fit:cover;">
                        <div class="position-absolute bottom-0 start-0 w-100 p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                            <h4 class="text-white mb-2">Empowering Women</h4>
                            <p class="text-white opacity-75 mb-0" style="font-size: 0.9rem;">Building stronger communities through collective action and support.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 d-flex flex-column gap-4 laf-observe anim-delay-3">
                    <div class="rounded-laf overflow-hidden" style="height: 250px;">
                        <img src="images/lerne/istockphoto-1150928289-612x612.jpg" alt="Impact" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                    <div class="bg-laf-off-white p-4 rounded-laf text-center" style="flex: 1; display:flex; flex-direction:column; justify-content:center;">
                        <h4 class="font-heading mb-3" style="font-size: 1.8rem; font-weight:800; color:var(--laf-green-deep);">5+ Years of Social Impact</h4>
                        <div class="d-flex justify-content-center mt-3"><div class="initiatives-card-icon" style="margin:0;"><i class="fas fa-chart-line"></i></div></div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <p class="fw-bold"><i class="fas fa-phone-alt text-laf-yellow me-2"></i> Connect with us to empower communities and transform lives together. <a href="contact.php" class="text-laf-yellow text-decoration-underline">Contact Us</a></p>
            </div>
        </div>
    </section>

    <!-- NEWS SECTION -->
    <section class="laf-section laf-section-light">
        <div class="container text-center mb-5">
            <span class="laf-badge">Latest News</span>
            <h2 class="laf-section-title mx-auto" style="max-width: 800px;">Insights, Stories & Impact</h2>
            <p class="text-laf-muted mx-auto" style="max-width: 600px;">Read real stories from the field, community experiences, and thought-provoking perspectives that reflect our mission and impact.</p>
        </div>

        <div class="container">
            <div class="row g-4">
                <!-- News 1 -->
                <div class="col-lg-4 col-md-6 laf-observe">
                    <a href="blog.php" class="news-card">
                        <img src="images/lerne/istockphoto-1154518272-612x612.jpg" alt="News 1">
                        <div class="news-overlay">
                            <span class="news-tag">Social Impact</span>
                            <h4 class="mb-3" style="font-size: 1.25rem;">Building Stronger Communities Through Collective Action</h4>
                            <span class="text-white fw-bold" style="font-size: 0.9rem;">Read More ↗</span>
                        </div>
                    </a>
                </div>
                <!-- News 2 -->
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-2">
                    <a href="blog.php" class="news-card">
                        <img src="images/lerne/istockphoto-1226009612-612x612.jpg" alt="News 2">
                        <div class="news-overlay">
                            <span class="news-tag">Advocacy</span>
                            <h4 class="mb-3" style="font-size: 1.25rem;">Why SGBV Awareness Remains a Priority in Our Region</h4>
                            <span class="text-white fw-bold" style="font-size: 0.9rem;">Read More ↗</span>
                        </div>
                    </a>
                </div>
                <!-- News 3 -->
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-3">
                    <a href="blog.php" class="news-card">
                        <img src="images/lerne/istockphoto-157617620-612x612.jpg" alt="News 3">
                        <div class="news-overlay">
                            <span class="news-tag">Health</span>
                            <h4 class="mb-3" style="font-size: 1.25rem;">Empowering Youth Through Comprehensive Health Education</h4>
                            <span class="text-white fw-bold" style="font-size: 0.9rem;">Read More ↗</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
