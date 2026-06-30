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
        /* Top Stats Bar */
        .laf-top-stats-bar {
            background: var(--laf-green-deep);
            padding: 40px 0;
            color: #fff;
            position: relative;
            z-index: 11;
        }
        .laf-top-stat-item {
            text-align: center;
            border-right: 1px solid rgba(255,255,255,0.1);
        }
        @media (max-width: 991px) {
            .laf-top-stat-item { border-right: none; margin-bottom: 30px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 30px; }
            .laf-top-stat-item:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
        }
        .laf-top-stat-item:last-child { border-right: none; }
        .laf-top-stat-num { font-size: 3rem; font-weight: 900; color: var(--laf-yellow); margin-bottom: 5px; }
        .laf-top-stat-label { font-size: 1.1rem; font-weight: 700; color: rgba(255,255,255,0.9); }
        .laf-top-stat-desc { font-size: 0.85rem; color: rgba(255,255,255,0.6); margin-top: 5px; line-height: 1.6; max-width: 280px; margin-left: auto; margin-right: auto;}
        
        /* Video Popup Block */
        .laf-video-block { position: relative; border-radius: 16px; overflow: hidden; height: 400px; }
        .laf-video-block img { width: 100%; height: 100%; object-fit: cover; }
        .laf-play-btn { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80px; height: 80px; background: var(--laf-yellow); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: var(--laf-text-dark); cursor: pointer; transition: transform 0.3s; }
        .laf-play-btn:hover { transform: translate(-50%, -50%) scale(1.1); }
        
        /* Services Grid */
        .laf-service-card { background: #fff; border-radius: 12px; padding: 40px 30px; text-align: center; border: 1px solid rgba(0,0,0,0.05); transition: all 0.3s; height: 100%; }
        .laf-service-card:hover { box-shadow: 0 15px 30px rgba(0,0,0,0.08); transform: translateY(-5px); border-bottom: 4px solid var(--laf-green-deep); }
        .laf-service-icon { width: 70px; height: 70px; min-width: 70px; min-height: 70px; flex-shrink: 0; border-radius: 50%; background: rgba(13, 59, 46, 0.05); color: var(--laf-green-deep); display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 20px; transition: all 0.3s; }
        .laf-service-card:hover .laf-service-icon { background: var(--laf-green-deep); color: #fff; }
        
        /* Why Choose Us Cards */
        .laf-choose-card { background: #fff; border-radius: 12px; padding: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); margin-bottom: 20px; display: flex; gap: 20px; align-items: flex-start; }
        .laf-choose-icon { width: 50px; height: 50px; min-width: 50px; min-height: 50px; flex-shrink: 0; border-radius: 50%; background: var(--laf-green); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; }
        
        /* Project Spotlights */
        .laf-project-spotlight { border-radius: 16px; overflow: hidden; position: relative; height: 350px; }
        .laf-project-spotlight img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
        .laf-project-spotlight:hover img { transform: scale(1.05); }
        .laf-project-content { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); padding: 40px 30px 30px; color: #fff; }
        
        /* Testimonials */
        .laf-testimonial-box { background: var(--laf-light-gray); border-radius: 16px; padding: 40px; position: relative; margin-top: 40px; }
        .laf-quote-icon { position: absolute; top: -25px; left: 40px; width: 50px; height: 50px; min-width: 50px; min-height: 50px; flex-shrink: 0; border-radius: 50%; background: var(--laf-yellow); color: var(--laf-text-dark); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; }
        
        /* Accordion Custom */
        .accordion-button:not(.collapsed) { background-color: rgba(13, 59, 46, 0.05); color: var(--laf-green-deep); font-weight: 700; box-shadow: none; }
        .accordion-button:focus { box-shadow: none; border-color: rgba(0,0,0,0.1); }
        .accordion-item { border: 1px solid rgba(0,0,0,0.08); border-radius: 8px !important; margin-bottom: 15px; overflow: hidden; }
    </style>
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<main>

    <!-- HERO SECTION -->
    <section class="laf-hero">
        <div id="heroCarousel" class="carousel slide carousel-fade w-100" data-ride="carousel" data-interval="6000">
            <div class="carousel-inner h-100">
                <!-- Slide 1 -->
                <div class="carousel-item active h-100">
                    <div class="laf-hero-bg" style="background-image: url('images/lerne/friends-6065345_1280.jpg');"></div>
                    <div class="laf-hero-overlay"></div>
                    <div class="laf-hero-content">
                        <div class="container position-relative laf-observe">
                            <span class="laf-hero-eyebrow">Lerne Adams Foundation</span>
                            <h1>Empowering Communities Towards Prosperity</h1>
                            <p>We are an indigenous Kenyan NGO dedicated to health, education, SGBV advocacy, and socio-economic empowerment in the Lake Victoria Region.</p>
                            <div class="d-flex gap-3 flex-wrap" style="margin-bottom: 60px;">
                                <a href="donate" class="laf-btn laf-btn-yellow">Donate Now <span class="arrow">↗</span></a>
                                <a href="about" class="laf-btn laf-btn-outline-white">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item h-100">
                    <div class="laf-hero-bg" style="background-image: url('images/lerne/kids-3311090_1280.jpg');"></div>
                    <div class="laf-hero-overlay"></div>
                    <div class="laf-hero-content">
                        <div class="container position-relative laf-observe">
                            <span class="laf-hero-eyebrow">Health & Wellness</span>
                            <h1>Building Resilient &amp; Healthy Communities</h1>
                            <p>Providing critical HIV prevention, SRH education, and mental health support to vulnerable populations.</p>
                            <div class="d-flex gap-3 flex-wrap">
                                <a href="program" class="laf-btn laf-btn-yellow">Our Programmes <span class="arrow">↗</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="carousel-item h-100">
                    <div class="laf-hero-bg" style="background-image: url('images/lerne/woman-2886580_1280.jpg');"></div>
                    <div class="laf-hero-overlay"></div>
                    <div class="laf-hero-content">
                        <div class="container position-relative laf-observe">
                            <span class="laf-hero-eyebrow">Advocacy & Action</span>
                            <h1>Standing Up Against Gender-Based Violence</h1>
                            <p>Advocating for the rights and protection of women, girls, and marginalized individuals across the region.</p>
                            <div class="d-flex gap-3 flex-wrap">
                                <a href="sgbv" class="laf-btn laf-btn-yellow">SGBV Advocacy <span class="arrow">↗</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-indicators">
                <button type="button" data-target="#heroCarousel" data-slide-to="0" class="active"></button>
                <button type="button" data-target="#heroCarousel" data-slide-to="1"></button>
                <button type="button" data-target="#heroCarousel" data-slide-to="2"></button>
            </div>
        </div>
    </section>

    <!-- NEW: TOP STATS / IMPACT BAR -->
    <section class="laf-top-stats-bar">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-4 col-md-4 laf-top-stat-item laf-observe">
                    <div class="laf-top-stat-num laf-counter" data-target="26" data-suffix="">0</div>
                    <div class="laf-top-stat-label">Dedicated Staff Members</div>
                    <div class="laf-top-stat-desc">Working tirelessly to implement our vision across the region.</div>
                </div>
                <div class="col-lg-4 col-md-4 laf-top-stat-item laf-observe anim-delay-2">
                    <div class="laf-top-stat-num laf-counter" data-target="20" data-suffix="">0</div>
                    <div class="laf-top-stat-label">Active Volunteers</div>
                    <div class="laf-top-stat-desc">Community champions driving grassroots action and support.</div>
                </div>
                <div class="col-lg-4 col-md-4 laf-top-stat-item laf-observe anim-delay-3">
                    <div class="laf-top-stat-num laf-counter" data-target="5" data-suffix="">0</div>
                    <div class="laf-top-stat-label">Operational Sub-counties</div>
                    <div class="laf-top-stat-desc">Homa Bay Town, Karachuonyo, Kasipul Kabondo, Rangwe, Suba North &amp; South.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- EXISTING: IMPACT CARDS SECTION -->
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
                        <a href="hiv" class="initiatives-btn">Read More</a>
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
                        <a href="sgbv" class="initiatives-btn">Read More</a>
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
                    View all our community impact programmes. <a href="program" class="text-laf-green text-decoration-underline">Our Programmes</a>
                </p>
            </div>
        </div>
    </section>

    <!-- NEW: ABOUT OUR NGO -->
    <section class="laf-section laf-section-offwhite">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 laf-observe">
                    <span class="laf-pill-badge mb-3">About Our NGO</span>
                    <h2 class="display-5 fw-bold mb-4" style="color: var(--laf-green-deep);">Empowering the Lake Victoria Region</h2>
                    <p class="text-muted mb-4" style="font-size: 1.05rem; line-height: 1.8;">Lerne Adams Foundation is an indigenous Kenyan NGO that is strictly non-religious, non-political, and non-profit. Founded initially as a Community Based Organization (CBO) in January 2016, we officially registered as a foundation in 2019 to scale our impact across the region.</p>
                    
                    <div class="row g-4 mt-2">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3">
                                <div class="laf-mvv-icon" style="width:45px;height:45px;min-width:45px;min-height:45px;font-size:1.1rem;"><i class="fas fa-bullseye"></i></div>
                                <div>
                                    <h5 class="fw-bold text-laf-navy mb-2">Our Mission</h5>
                                    <p class="text-muted" style="font-size:0.85rem;">"To maximize productivity and self-reliance among the rural communities by availing opportunities for resource poor households through improved access to human development opportunities."</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start gap-3">
                                <div class="laf-mvv-icon" style="width:45px;height:45px;min-width:45px;min-height:45px;font-size:1.1rem;"><i class="fas fa-eye"></i></div>
                                <div>
                                    <h5 class="fw-bold text-laf-navy mb-2">Our Vision</h5>
                                    <p class="text-muted" style="font-size:0.85rem;">"Sustainable development for the marginalized through integrated environmental and one health approach while focusing on equity and human dignity."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="about" class="laf-btn laf-btn-yellow mt-4">Discover More <span class="arrow">↗</span></a>
                </div>
                <div class="col-lg-6 laf-observe anim-delay-2">
                    <div class="laf-video-block shadow-lg">
                        <img src="images/lerne/child-child-2083973_1280.jpg" alt="Community Video" style="width:100%; height:400px; object-fit:cover;">
                        <div class="laf-play-btn"><i class="fas fa-play" style="margin-left: 5px;"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW: OUR SERVICES / SECTORAL SCOPE -->
    <section class="laf-section bg-white text-center">
        <div class="container">
            <span class="laf-pill-badge mb-3 mx-auto">Core Operations</span>
            <h2 class="display-5 fw-bold mb-5" style="color: var(--laf-green-deep);">Our Service Pillars</h2>
            
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 laf-observe">
                    <div class="laf-service-card">
                        <div class="laf-service-icon"><i class="fas fa-users-cog"></i></div>
                        <h4 class="fw-bold mb-3 text-laf-navy">Socio-economic Empowerment</h4>
                        <p class="text-muted mb-3">Empowering women, youths, and persons with disabilities to achieve self-reliance and financial independence.</p>
                        <a href="program.php#women" class="text-laf-green fw-bold text-decoration-none" style="font-size:0.9rem;">Read More &rarr;</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-2">
                    <div class="laf-service-card">
                        <div class="laf-service-icon"><i class="fas fa-ribbon"></i></div>
                        <h4 class="fw-bold mb-3 text-laf-navy">HIV Prevention & Care</h4>
                        <p class="text-muted mb-3">Delivering comprehensive prevention programs, care, and treatment support for affected communities.</p>
                        <a href="hiv" class="text-laf-green fw-bold text-decoration-none" style="font-size:0.9rem;">Read More &rarr;</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-3">
                    <div class="laf-service-card">
                        <div class="laf-service-icon"><i class="fas fa-hand-sparkles"></i></div>
                        <h4 class="fw-bold mb-3 text-laf-navy">Environmental Hygiene</h4>
                        <p class="text-muted mb-3">Promoting sustainable environmental practices and advancing personal hygiene at the grassroots level.</p>
                        <a href="program.php#hygiene" class="text-laf-green fw-bold text-decoration-none" style="font-size:0.9rem;">Read More &rarr;</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 laf-observe">
                    <div class="laf-service-card">
                        <div class="laf-service-icon"><i class="fas fa-venus-mars"></i></div>
                        <h4 class="fw-bold mb-3 text-laf-navy">Sexual Reproductive Health</h4>
                        <p class="text-muted mb-3">Focusing on education and services for adolescents, youths, sex workers, and persons with disabilities.</p>
                        <a href="srh" class="text-laf-green fw-bold text-decoration-none" style="font-size:0.9rem;">Read More &rarr;</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-2">
                    <div class="laf-service-card">
                        <div class="laf-service-icon"><i class="fas fa-child"></i></div>
                        <h4 class="fw-bold mb-3 text-laf-navy">Child Care & Support</h4>
                        <p class="text-muted mb-3">Targeting comprehensive support, protection, and education for orphans and street children.</p>
                        <a href="junior" class="text-laf-green fw-bold text-decoration-none" style="font-size:0.9rem;">Read More &rarr;</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-3">
                    <div class="laf-service-card">
                        <div class="laf-service-icon"><i class="fas fa-brain"></i></div>
                        <h4 class="fw-bold mb-3 text-laf-navy">Mental Health</h4>
                        <p class="text-muted mb-3">Driving initiatives that provide psychosocial support and reduce stigma around mental health.</p>
                        <a href="mental-health" class="text-laf-green fw-bold text-decoration-none" style="font-size:0.9rem;">Read More &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW: WHY CHOOSE US / ORGANIZATIONAL STRENGTHS -->
    <section class="laf-section laf-section-offwhite">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 laf-observe">
                    <span class="laf-pill-badge mb-3">Why Choose Us</span>
                    <h2 class="display-5 fw-bold mb-4" style="color: var(--laf-green-deep);">Choosing us Means Driving Real Positive Change</h2>
                    <p class="text-muted mb-4" style="font-size: 1.05rem;">We are committed to creating real, lasting change in the communities we serve. With transparency, integrity, and a people-first approach, our organization focuses on empowering individuals.</p>
                    <img src="images/lerne/istockphoto-1154518272-612x612.jpg" alt="Community Support" class="img-fluid rounded-4 shadow-sm mt-3" style="width:100%; height:300px; object-fit:cover;">
                </div>
                <div class="col-lg-7 laf-observe anim-delay-2">
                    <!-- Feature 1 -->
                    <div class="laf-choose-card">
                        <div class="laf-choose-icon"><i class="fas fa-users"></i></div>
                        <div>
                            <h4 class="fw-bold text-laf-navy mb-2">Community-Centered Approach</h4>
                            <p class="text-muted mb-2">Programs designed with and for the communities we serve, ensuring relevance and long-term sustainability.</p>
                            <ul class="list-unstyled mb-0" style="font-size: 0.9rem; font-weight: 600; color: var(--laf-text-dark);">
                                <li><i class="fas fa-circle" style="color: var(--laf-yellow); font-size: 0.5rem; vertical-align: middle; margin-right: 8px;"></i> Documented and enforced policies and systems.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Feature 2 -->
                    <div class="laf-choose-card">
                        <div class="laf-choose-icon"><i class="fas fa-shield-alt"></i></div>
                        <div>
                            <h4 class="fw-bold text-laf-navy mb-2">Transparent & Ethical Practices</h4>
                            <p class="text-muted mb-2">Every action and donation is handled responsibly with full accountability to our partners and community.</p>
                            <ul class="list-unstyled mb-0" style="font-size: 0.9rem; font-weight: 600; color: var(--laf-text-dark);">
                                <li><i class="fas fa-circle" style="color: var(--laf-yellow); font-size: 0.5rem; vertical-align: middle; margin-right: 8px;"></i> Guided by our active Strategic Plan (2020-2023).</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Feature 3 -->
                    <div class="laf-choose-card">
                        <div class="laf-choose-icon"><i class="fas fa-handshake"></i></div>
                        <div>
                            <h4 class="fw-bold text-laf-navy mb-2">Strong Donor Credibility</h4>
                            <p class="text-muted mb-2">We maintain long-standing relationships and high credibility with major donors including Plan International, Care Kenya, and the County Government.</p>
                            <ul class="list-unstyled mb-0" style="font-size: 0.9rem; font-weight: 600; color: var(--laf-text-dark);">
                                <li><i class="fas fa-circle" style="color: var(--laf-yellow); font-size: 0.5rem; vertical-align: middle; margin-right: 8px;"></i> Core Values: Excellence, Integrity, Innovation, Solidarity, and Commitment.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW: PROJECTS & INITIATIVES (Spotlights) -->
    <section class="laf-section bg-white text-center">
        <div class="container">
            <span class="laf-pill-badge mb-3 mx-auto">Projects</span>
            <h2 class="display-5 fw-bold mb-5" style="color: var(--laf-green-deep);">Active Funded Initiatives</h2>
            
            <div class="row g-4 text-start">
                <div class="col-lg-4 col-md-6 laf-observe">
                    <div class="laf-project-spotlight shadow-sm">
                        <img src="images/lerne/istockphoto-1071198328-612x612.jpg" alt="Male Champions" style="width:100%; height:100%; object-fit:cover;">
                        <div class="laf-project-content">
                            <span class="badge bg-laf-yellow text-dark mb-2">Gender Equality</span>
                            <h4 class="fw-bold mb-2 text-white">Male Champions</h4>
                            <p class="mb-0" style="font-size:0.9rem; color: rgba(255,255,255,0.8);">An initiative empowering men to stand up against gender-based violence and champion women's rights.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-2">
                    <div class="laf-project-spotlight shadow-sm">
                        <img src="images/lerne/istockphoto-1136872232-612x612.jpg" alt="Peace Initiatives" style="width:100%; height:100%; object-fit:cover;">
                        <div class="laf-project-content">
                            <span class="badge bg-laf-yellow text-dark mb-2">Community</span>
                            <h4 class="fw-bold mb-2 text-white">Peace Initiatives</h4>
                            <p class="mb-0" style="font-size:0.9rem; color: rgba(255,255,255,0.8);">Promoting peaceful coexistence and conflict resolution across Western Kenya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-3">
                    <div class="laf-project-spotlight shadow-sm">
                        <img src="images/lerne/istockphoto-1140153149-612x612.jpg" alt="Abstinence Campaign" style="width:100%; height:100%; object-fit:cover;">
                        <div class="laf-project-content">
                            <span class="badge bg-laf-yellow text-dark mb-2">Youth Health</span>
                            <h4 class="fw-bold mb-2 text-white">Abstinence Campaign Programme</h4>
                            <p class="mb-0" style="font-size:0.9rem; color: rgba(255,255,255,0.8);">Focused on psychosocial wellbeing and healthy life choices for adolescents.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-5 laf-observe anim-delay-4">
                <a href="program" class="laf-btn laf-btn-yellow">View All Projects <span class="arrow">↗</span></a>
            </div>
        </div>
    </section>

    <!-- NEW: TESTIMONIALS & FAQS -->
    <section class="laf-section laf-section-offwhite">
        <div class="container">
            <div class="row g-5">
                
                <!-- FAQs -->
                <div class="col-lg-6 laf-observe">
                    <span class="laf-pill-badge mb-3">Questions & Answers</span>
                    <h2 class="display-6 fw-bold mb-4" style="color: var(--laf-green-deep);">Frequently Asked Questions</h2>
                    
                    <div class="accordion" id="faqAccordion">
                        <div class="card border-0 mb-3 shadow-sm" style="border-radius: 12px; overflow: hidden;">
                            <div class="card-header bg-white border-0 py-3" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor: pointer;">
                                <h5 class="mb-0 text-laf-navy font-weight-bold" style="font-size: 1.1rem;">Where does Lerne Adams Foundation operate?</h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                <div class="card-body text-muted pt-0" style="font-size: 0.95rem;">
                                    We focus our operations primarily in the Lake Victoria Region. This includes extensive community work across Homa Bay, Migori, Kisumu, and Siaya counties.
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 mb-3 shadow-sm" style="border-radius: 12px; overflow: hidden;">
                            <div class="card-header bg-white border-0 py-3 collapsed" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="cursor: pointer;">
                                <h5 class="mb-0 text-laf-navy font-weight-bold" style="font-size: 1.1rem;">How do you involve the community in your projects?</h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                                <div class="card-body text-muted pt-0" style="font-size: 0.95rem;">
                                    Community involvement is at the heart of our strategy. We actively engage locals through regular Community Dialogues, specialized Women Barrazas, and interactive Radio Talk Shows to ensure their voices shape our initiatives.
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 mb-3 shadow-sm" style="border-radius: 12px; overflow: hidden;">
                            <div class="card-header bg-white border-0 py-3 collapsed" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="cursor: pointer;">
                                <h5 class="mb-0 text-laf-navy font-weight-bold" style="font-size: 1.1rem;">Who are the primary beneficiaries of your programs?</h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                                <div class="card-body text-muted pt-0" style="font-size: 0.95rem;">
                                    Our programs target the most marginalized and vulnerable groups, including women, youths, orphans, street children, sex workers, and persons with disabilities.
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 mb-3 shadow-sm" style="border-radius: 12px; overflow: hidden;">
                            <div class="card-header bg-white border-0 py-3 collapsed" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="cursor: pointer;">
                                <h5 class="mb-0 text-laf-navy font-weight-bold" style="font-size: 1.1rem;">Is Lerne Adams Foundation affiliated with any political or religious group?</h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                                <div class="card-body text-muted pt-0" style="font-size: 0.95rem;">
                                    No. We are strictly a non-religious, non-political, and non-profit indigenous NGO committed solely to humanitarian and development goals.
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 mb-3 shadow-sm" style="border-radius: 12px; overflow: hidden;">
                            <div class="card-header bg-white border-0 py-3 collapsed" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="cursor: pointer;">
                                <h5 class="mb-0 text-laf-navy font-weight-bold" style="font-size: 1.1rem;">How can I support your work?</h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                                <div class="card-body text-muted pt-0" style="font-size: 0.95rem;">
                                    You can support us by volunteering your time, making a donation, or partnering with us. Please visit our <a href="donate" class="text-laf-green text-decoration-underline">Donate</a> or <a href="volunteer" class="text-laf-green text-decoration-underline">Volunteer</a> pages for more details.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonials -->
                <div class="col-lg-6 laf-observe anim-delay-2">
                    <span class="laf-pill-badge mb-3">Testimonials</span>
                    <h2 class="display-6 fw-bold mb-4" style="color: var(--laf-green-deep);">Stories of Hope</h2>
                    <p class="text-muted mb-4">Hear from the communities and individuals whose lives have been transformed by our initiatives.</p>
                    
                    <div class="laf-testimonial-box shadow-sm">
                        <div class="laf-quote-icon"><i class="fas fa-quote-left"></i></div>
                        <p class="fst-italic text-muted mb-4" style="font-size: 1.1rem; line-height: 1.8;">"The Single Parents revolving fund gave me the initial capital I needed to start a small grocery business. Today, I can comfortably feed and educate my three children. LAF didn't just give me money; they gave me my dignity back."</p>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width:50px; height:50px; border-radius:50%; background:var(--laf-green); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.2rem;">JA</div>
                            <div>
                                <h5 class="fw-bold text-laf-navy mb-0">Jane A.</h5>
                                <span class="text-muted" style="font-size:0.85rem;">Beneficiary, Single Parents Fund (Homa Bay)</span>
                            </div>
                        </div>
                    </div>

                    <div class="laf-testimonial-box shadow-sm mt-5">
                        <div class="laf-quote-icon"><i class="fas fa-quote-left"></i></div>
                        <p class="fst-italic text-muted mb-4" style="font-size: 1.1rem; line-height: 1.8;">"Thanks to the Education program, I received school fees support and mentorship that kept me in school. I am now looking forward to joining college next year."</p>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width:50px; height:50px; border-radius:50%; background:var(--laf-yellow); color:var(--laf-text-dark); display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.2rem;">KO</div>
                            <div>
                                <h5 class="fw-bold text-laf-navy mb-0">Kevin O.</h5>
                                <span class="text-muted" style="font-size:0.85rem;">Beneficiary, Education Program</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- NEW: LATEST BLOGS & EVENTS -->
    <section class="laf-section bg-white text-center">
        <div class="container">
            <span class="laf-pill-badge mb-3 mx-auto">News & Updates</span>
            <h2 class="display-5 fw-bold mb-5" style="color: var(--laf-green-deep);">Latest from the Field</h2>
            
            <div class="row g-4 text-start">
                <!-- Blog 1 -->
                <div class="col-lg-4 col-md-6 laf-observe">
                    <a href="blog" class="news-card">
                        <img src="images/lerne/activities/470178396_1815766652529259_5847160222616162347_n.jpg" alt="Capacity Building">
                        <div class="news-overlay">
                            <div class="news-tag">Capacity Building</div>
                            <h4 class="fw-bold mb-2">Empowering Local Leaders Through Financial Literacy Training</h4>
                            <span style="font-size: 0.85rem; font-weight: 500;"><i class="fas fa-calendar-alt me-2 text-laf-yellow"></i> 15 June 2026</span>
                        </div>
                    </a>
                </div>
                <!-- Blog 2 -->
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-2">
                    <a href="blog" class="news-card">
                        <img src="images/lerne/activities/469909348_1813644576074800_7061410995148019999_n.jpg" alt="Health Promotions">
                        <div class="news-overlay">
                            <div class="news-tag">Community Health</div>
                            <h4 class="fw-bold mb-2">Mass SRH Sensitization Drive Reaches Thousands in Suba South</h4>
                            <span style="font-size: 0.85rem; font-weight: 500;"><i class="fas fa-calendar-alt me-2 text-laf-yellow"></i> 02 June 2026</span>
                        </div>
                    </a>
                </div>
                <!-- Blog 3 -->
                <div class="col-lg-4 col-md-6 laf-observe anim-delay-3">
                    <a href="blog" class="news-card">
                        <img src="images/lerne/activities/472664332_1829769301128994_1469011160280985894_n.jpg" alt="Covid Relief">
                        <div class="news-overlay">
                            <div class="news-tag">Relief Efforts</div>
                            <h4 class="fw-bold mb-2">Ongoing Support: Distributing Essential Hygiene Kits to Vulnerable Families</h4>
                            <span style="font-size: 0.85rem; font-weight: 500;"><i class="fas fa-calendar-alt me-2 text-laf-yellow"></i> 28 May 2026</span>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="mt-5 laf-observe anim-delay-4">
                <a href="blog" class="laf-btn laf-btn-outline-green">Read All News</a>
            </div>
        </div>
    </section>

    <!-- CTA BANNER -->
    <section class="cta-section text-center position-relative laf-observe">
        <div class="container position-relative" style="z-index: 2;">
            <span class="badge bg-laf-yellow text-dark py-2 px-3 mb-3" style="border-radius: 20px;">Get Involved</span>
            <h2 class="display-4 fw-bold mb-4 text-white">Together We Can Build a Brighter Future</h2>
            <p class="lead mb-5" style="max-width: 700px; margin: 0 auto; color: rgba(255,255,255,0.9);">
                Join hands with Lerne Adams Foundation today. Whether you donate, volunteer, or partner with us, your contribution creates ripples of positive change across the Lake Victoria Region.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="donate" class="laf-btn laf-btn-yellow">Make a Donation <span class="arrow">↗</span></a>
                <a href="volunteer" class="laf-btn laf-btn-outline-white">Become a Volunteer</a>
            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
