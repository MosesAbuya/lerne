<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$isHeroPage = in_array($currentPage, ['index.php']);
?>

<header id="laf-header" class="laf-header <?= $isHeroPage ? '' : 'laf-solid' ?>">
    <div class="laf-navbar-inner position-relative w-100">

        <!-- Brand: Logo (Left) -->
        <a href="index.php" class="laf-navbar-brand me-4">
            <img src="images/lerne/logo/logo.png" alt="Lerne Adams Foundation" style="height: 80px; max-height: 80px;">
        </a>

        <!-- Desktop Navigation (Left-aligned next to logo) -->
        <ul class="laf-nav-links d-none d-lg-flex">
            <li class="<?= $currentPage === 'index.php' ? 'active' : '' ?>">
                <a href="index.php" class="nav-link">Home</a>
            </li>

            <li class="dropdown <?= in_array($currentPage, ['about.php','team.php']) ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About Us</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="about.php">Who We Are</a></li>
                    <li><a class="dropdown-item" href="team.php">Our Team</a></li>
                </ul>
            </li>

            <!-- Mega Menu -->
            <li class="dropdown mega-menu-fw <?= in_array($currentPage, ['program.php','hiv.php','srh.php','sgbv.php','junior.php','mental-health.php','education.php','holiday.php','impact.php']) ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-display="static">Our Work & Impact</a>
                <div class="dropdown-menu laf-mega-menu shadow">
                    <div class="row w-100 m-0 p-3">
                        <div class="col-md-3">
                            <h6 class="laf-nav-links mega-menu-title text-laf-orange mb-3">OUR PROJECTS</h6>
                            <ul class="list-unstyled mb-0 laf-mega-links">
                                <li><a class="dropdown-item" href="program.php">All Programmes Overview</a></li>
                                <li><a class="dropdown-item" href="program.php#women">Women &amp; Youth Empowerment</a></li>
                                <li><a class="dropdown-item" href="hiv.php">HIV Prevention &amp; Care</a></li>
                                <li><a class="dropdown-item" href="program.php#hygiene">Environmental Hygiene</a></li>
                                <li><a class="dropdown-item" href="srh.php">Sexual Reproductive Health</a></li>
                                <li><a class="dropdown-item" href="sgbv.php">SGBV Advocacy</a></li>
                                <li><a class="dropdown-item" href="junior.php">Child Care &amp; Support</a></li>
                                <li><a class="dropdown-item" href="mental-health.php">Mental Health</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h6 class="laf-nav-links mega-menu-title text-laf-orange mb-3">GET INVOLVED</h6>
                            <ul class="list-unstyled mb-0 laf-mega-links">
                                <li><a class="dropdown-item" href="donate.php">Donate</a></li>
                                <li><a class="dropdown-item" href="volunteer.php">Volunteer</a></li>
                                <li><a class="dropdown-item" href="events.php">Events</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h6 class="laf-nav-links mega-menu-title text-laf-orange mb-3">IMPACT & STORIES</h6>
                            <ul class="list-unstyled mb-0 laf-mega-links">
                                <li><a class="dropdown-item" href="impact.php">Impact Overview</a></li>
                                <li><a class="dropdown-item" href="blog.php">News & Stories</a></li>
                                <li><a class="dropdown-item" href="gallery.php">Photo Gallery</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h6 class="laf-nav-links mega-menu-title text-laf-orange mb-3">ACCOUNTABILITY</h6>
                            <ul class="list-unstyled mb-0 laf-mega-links">
                                <li><a class="dropdown-item" href="reports.php">Annual Reports</a></li>
                                <li><a class="dropdown-item" href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <li class="<?= $currentPage === 'blog.php' ? 'active' : '' ?>">
                <a href="blog.php" class="nav-link">News</a>
            </li>

            <li class="<?= $currentPage === 'contact.php' ? 'active' : '' ?>">
                <a href="contact.php" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Donate + Mobile Toggle (Right-aligned) -->
        <div class="laf-nav-donate ms-auto d-flex align-items-center">
            
            <!-- Custom EN Dropdown for Google Translate -->
            <div class="dropdown me-3">
                <a class="text-white text-decoration-none dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 0.9rem;">
                    EN
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="min-width: 120px; background-color: var(--laf-navy);">
                    <li><a class="dropdown-item text-white lang-select" href="#" data-lang="en">English</a></li>
                    <li><a class="dropdown-item text-white lang-select" href="#" data-lang="sw">Swahili</a></li>
                    <li><a class="dropdown-item text-white lang-select" href="#" data-lang="fr">French</a></li>
                </ul>
            </div>
            <!-- Hidden original google translate widget -->
            <div id="google_translate_element" style="display:none;"></div>

            <!-- Donate button -->
            <a href="donate.php" class="btn-donate d-none d-lg-flex">
                Donate Now <span class="arrow">↗</span>
            </a>

            <!-- Mobile hamburger -->
            <button class="laf-nav-hamburger d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNav" aria-controls="mobileNav" aria-label="Open menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>

    </div>
</header>

<!-- ===== MOBILE OFFCANVAS ===== -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileNav" aria-labelledby="mobileNavLabel" style="background: var(--laf-green-deep); width: 310px;">
    <div class="offcanvas-header border-bottom" style="border-color: rgba(255,255,255,0.1) !important; padding: 20px 24px;">
        <a href="index.php" class="d-flex align-items-center gap-3 text-decoration-none">
            <img src="images/lerne/logo/logo.png" alt="LAF" style="height:40px;object-fit:contain;">
        </a>
        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body" style="padding: 20px 24px;">
        <nav>
            <ul class="list-unstyled" style="display:flex;flex-direction:column;gap:4px;">
                <?php
                $mobileLinks = [
                    'index.php'   => 'Home',
                    'about.php'   => 'About LAF',
                    'program.php' => 'Our Work & Impact',
                    'blog.php'    => 'News & Stories',
                    'contact.php' => 'Contact',
                ];
                foreach ($mobileLinks as $file => $label):
                    $isActive = $currentPage === $file;
                ?>
                <li>
                    <a href="<?= $file ?>" style="display:flex;align-items:center;gap:10px;padding:12px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;transition:all 0.2s;<?= $isActive ? 'background:rgba(245,197,24,0.15);color:var(--laf-yellow);' : 'color:rgba(255,255,255,0.85);' ?>">
                        <?php if ($isActive): ?>
                        <span style="width:6px;height:6px;border-radius:50%;background:var(--laf-yellow);flex-shrink:0;"></span>
                        <?php endif; ?>
                        <?= $label ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div style="margin-top:24px;padding-top:20px;border-top:1px solid rgba(255,255,255,0.1);">
            <a href="donate.php" style="display:block;text-align:center;background:var(--laf-yellow);color:var(--laf-text-dark);font-weight:700;font-size:0.9rem;padding:14px;border-radius:8px;text-decoration:none;margin-bottom:16px;">
                Donate Now ↗
            </a>
            <div style="display:flex;flex-direction:column;gap:8px;">
                <a href="tel:+254713736700" style="color:rgba(255,255,255,0.65);font-size:0.85rem;text-decoration:none;display:flex;align-items:center;gap:8px;">
                    <i class="fas fa-phone-alt" style="color:var(--laf-yellow);width:16px;"></i> +254 713 736700
                </a>
                <a href="mailto:info@lerneadamsfoundation.org" style="color:rgba(255,255,255,0.65);font-size:0.85rem;text-decoration:none;display:flex;align-items:center;gap:8px;">
                    <i class="fas fa-envelope" style="color:var(--laf-yellow);width:16px;"></i> info@lerneadamsfoundation.org
                </a>
            </div>
        </div>
    </div>
</div>

<script>
// Navbar scroll transparency behaviour & Dropdown Hover
document.addEventListener('DOMContentLoaded', function(){
    var header = document.getElementById('laf-header');
    if (header) {
        var isHeroPage = <?= $isHeroPage ? 'true' : 'false' ?>;
        
        if (isHeroPage) {
            function onScroll(){
                if (window.scrollY > 60) {
                    header.classList.add('laf-scrolled');
                } else {
                    header.classList.remove('laf-scrolled');
                }
            }
            window.addEventListener('scroll', onScroll, {passive: true});
            onScroll();
        }
    }

    // Custom Google Translate Dropdown Logic
    const langSelectors = document.querySelectorAll('.lang-select');
    langSelectors.forEach(selector => {
        selector.addEventListener('click', function(e) {
            e.preventDefault();
            const lang = this.getAttribute('data-lang');
            // Set cookie for google translate
            document.cookie = `googtrans=/en/${lang}; path=/`;
            document.cookie = `googtrans=/en/${lang}; domain=.${location.hostname}; path=/`;
            // Reload to apply translation
            window.location.reload();
        });
    });
});
</script>