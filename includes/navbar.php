<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$isHeroPage = in_array($currentPage, ['index.php']);
?>

<header id="laf-header" class="laf-header">
    <div class="laf-navbar-inner position-relative w-100 container-fluid px-4">
        <!-- Brand: Logo (Left) -->
        <a href="index" class="laf-navbar-brand mr-4">
            <img src="images/lerne/logo/logo-square.png" alt="Lerne Adams Foundation" style="height: 80px; max-height: 80px;">
        </a>

        <!-- Desktop Navigation (Left-aligned next to logo) -->
        <ul class="laf-nav-links d-none d-lg-flex mb-0 pl-0">
            <li class="<?= $currentPage === 'index.php' ? 'active' : '' ?>">
                <a href="index" class="nav-link">Home</a>
            </li>

            <li class="dropdown <?= in_array($currentPage, ['about.php','team.php']) ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Us</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about">Who We Are</a>
                    <a class="dropdown-item" href="team">Our Team</a>
                </div>
            </li>

            <!-- Mega Menu -->
            <li class="dropdown mega-menu-fw <?= in_array($currentPage, ['program.php','hiv.php','srh.php','sgbv.php','junior.php','mental-health.php','education.php','holiday.php','impact.php']) ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Work & Impact</a>
                <div class="dropdown-menu laf-mega-menu shadow">
                    <div class="row w-100 m-0 p-3">
                        <div class="col-md-3">
                            <h6 class="laf-nav-links mega-menu-title text-laf-orange mb-3">OUR PROJECTS</h6>
                            <ul class="list-unstyled mb-0 laf-mega-links">
                                <li><a class="dropdown-item" href="program">All Programmes Overview</a></li>
                                <li><a class="dropdown-item" href="program.php#women">Women &amp; Youth Empowerment</a></li>
                                <li><a class="dropdown-item" href="hiv">HIV Prevention &amp; Care</a></li>
                                <li><a class="dropdown-item" href="program.php#hygiene">Environmental Hygiene</a></li>
                                <li><a class="dropdown-item" href="srh">Sexual Reproductive Health</a></li>
                                <li><a class="dropdown-item" href="sgbv">SGBV Advocacy</a></li>
                                <li><a class="dropdown-item" href="junior">Child Care &amp; Support</a></li>
                                <li><a class="dropdown-item" href="mental-health">Mental Health</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h6 class="laf-nav-links mega-menu-title text-laf-orange mb-3">GET INVOLVED</h6>
                            <ul class="list-unstyled mb-0 laf-mega-links">
                                <li><a class="dropdown-item" href="donate">Donate</a></li>
                                <li><a class="dropdown-item" href="volunteer">Volunteer</a></li>
                                <li><a class="dropdown-item" href="events">Events</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h6 class="laf-nav-links mega-menu-title text-laf-orange mb-3">IMPACT & STORIES</h6>
                            <ul class="list-unstyled mb-0 laf-mega-links">
                                <li><a class="dropdown-item" href="impact">Impact Overview</a></li>
                                <li><a class="dropdown-item" href="blog">News & Stories</a></li>
                                <li><a class="dropdown-item" href="gallery">Photo Gallery</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h6 class="laf-nav-links mega-menu-title text-laf-orange mb-3">ACCOUNTABILITY</h6>
                            <ul class="list-unstyled mb-0 laf-mega-links">
                                <li><a class="dropdown-item" href="reports">Annual Reports</a></li>
                                <li><a class="dropdown-item" href="contact">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>

            <li class="<?= $currentPage === 'blog.php' ? 'active' : '' ?>">
                <a href="blog" class="nav-link">News</a>
            </li>

            <li class="<?= $currentPage === 'contact.php' ? 'active' : '' ?>">
                <a href="contact" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Donate + Mobile Toggle (Right-aligned) -->
        <div class="laf-nav-donate ml-auto d-flex align-items-center">
            
            <!-- Custom EN Dropdown for Google Translate -->
            <div class="dropdown mr-3">
                <a class="text-white text-decoration-none dropdown-toggle fw-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 0.9rem;">
                    EN
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow-sm border-0" style="min-width: 120px; background-color: var(--laf-navy);">
                    <a class="dropdown-item text-white lang-select" href="#" data-lang="en">English</a>
                    <a class="dropdown-item text-white lang-select" href="#" data-lang="sw">Swahili</a>
                    <a class="dropdown-item text-white lang-select" href="#" data-lang="fr">French</a>
                </div>
            </div>
            <!-- Hidden original google translate widget -->
            <div id="google_translate_element" style="display:none;"></div>

            <!-- Donate button -->
            <a href="donate" class="btn-donate d-none d-lg-flex">
                Donate Now <span class="arrow">↗</span>
            </a>

            <!-- Mobile hamburger (Since BS4 doesn't have offcanvas natively, we use a collapse for navbar) -->
            <button class="navbar-toggler laf-nav-hamburger d-lg-none ml-3 border-0 bg-transparent" type="button" data-toggle="collapse" data-target="#mobileNav" aria-controls="mobileNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars" style="color:#fff; font-size:1.5rem;"></i>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Nav Collapse (BS4 Native) -->
<div class="collapse d-lg-none" id="mobileNav" style="background: var(--laf-green-deep); position: absolute; width: 100%; z-index: 999; top: 100px;">
    <div class="p-4">
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

        <div style="margin-top:24px;padding-top:20px;border-top:1px solid rgba(255,255,255,0.1);">
            <a href="donate" style="display:block;text-align:center;background:var(--laf-yellow);color:var(--laf-text-dark);font-weight:700;font-size:0.9rem;padding:14px;border-radius:8px;text-decoration:none;margin-bottom:16px;">
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