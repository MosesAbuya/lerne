<?php
/**
 * LAF Footer - Premium NGO design
 * Dark forest green, 4-column layout, newsletter strip
 */
?>

<footer class="laf-footer">

    <!-- Newsletter Strip -->
    <div class="laf-footer-newsletter-row">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:44px;height:44px;background:rgba(245,197,24,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-envelope" style="color:var(--laf-yellow);"></i>
                        </div>
                        <div>
                            <h4 style="font-size:1.2rem;margin-bottom:2px;color:#fff;">Stay Informed</h4>
                            <p style="font-size:0.85rem;color:rgba(255,255,255,0.6);margin:0;">Subscribe for updates, stories &amp; impact reports.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form id="laf-newsletter-form" action="newsletter_subscribe.php" method="POST" class="laf-footer-newsletter-form ms-lg-auto" style="max-width:480px;">
                        <input type="email" name="email" placeholder="Enter your email address" required>
                        <button type="submit">Subscribe <i class="fas fa-arrow-right ms-1"></i></button>
                        <div id="laf-newsletter-msg" style="margin-top: 8px; font-size: 0.85rem; color: #fff; display: none;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer Body -->
    <div class="footer-top">
        <div class="container">
            <div class="row g-5">

                <!-- Col 1: Brand + Social -->
                <div class="col-lg-4 col-md-6">
                    <a href="index" class="d-flex align-items-center gap-3 text-decoration-none mb-4">
                        <img src="images/lerne/logo/logo.png" alt="Lerne Adams Foundation" style="height:65px;object-fit:contain;">
                    </a>
                    <p style="font-size:0.9rem;line-height:1.8;color:rgba(255,255,255,0.6);margin-bottom:24px;">
                        Lerne Adams Foundation (LAF) is an indigenous Kenyan NGO empowering marginalized communities in the Lake Victoria Region through health, education, SGBV advocacy, and socio-economic programmes.
                    </p>
                    <div class="laf-social-icons">
                        <a href="https://www.facebook.com/p/Lerne-Adams-Foundation-100069796814785/" target="_blank" rel="noopener" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://wa.me/254713736700" target="_blank" rel="noopener" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="mailto:info@lerneadamsfoundation.org" title="Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="#" title="Twitter / X">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                    </div>
                    <!-- Hidden Google Translate -->
                    <div id="google_translate_element" style="display:none;"></div>
                </div>

                <!-- Col 2: Quick Links -->
                <div class="col-lg-2 col-md-4 col-6">
                    <h5 class="laf-footer-heading">Quick Links</h5>
                    <ul class="laf-footer-links">
                        <li><a href="index">Home</a></li>
                        <li><a href="about">About LAF</a></li>
                        <li><a href="program">Our Work</a></li>
                        <li><a href="impact">Our Impact</a></li>
                        <li><a href="events">Events</a></li>
                        <li><a href="blog">News &amp; Stories</a></li>
                        <li><a href="gallery">Gallery</a></li>
                        <li><a href="contact">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Col 3: Programmes -->
                <div class="col-lg-3 col-md-4 col-6">
                    <h5 class="laf-footer-heading">Our Programmes</h5>
                    <ul class="laf-footer-links">
                        <li><a href="program.php#women">Women &amp; Youth</a></li>
                        <li><a href="hiv">HIV Prevention</a></li>
                        <li><a href="program.php#hygiene">Environmental Hygiene</a></li>
                        <li><a href="srh">Sexual Reproductive Health</a></li>
                        <li><a href="sgbv">SGBV Advocacy</a></li>
                        <li><a href="junior">Child Care &amp; Support</a></li>
                        <li><a href="mental-health">Mental Health</a></li>
                        <li><a href="education">Education Support</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact -->
                <div class="col-lg-3 col-md-4">
                    <h5 class="laf-footer-heading">Contact Information</h5>

                    <div class="laf-footer-contact-item">
                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="text">P.O. Box 1740-40100,<br>Kisumu, Kenya</div>
                    </div>

                    <div class="laf-footer-contact-item">
                        <div class="icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="text">
                            <a href="tel:+254713736700" style="color:rgba(255,255,255,0.65);text-decoration:none;display:block;">+254 713 736 700</a>
                            <a href="tel:+254722116416" style="color:rgba(255,255,255,0.65);text-decoration:none;">+254 722 116 416</a>
                        </div>
                    </div>

                    <div class="laf-footer-contact-item">
                        <div class="icon"><i class="fas fa-envelope"></i></div>
                        <div class="text">
                            <a href="mailto:info@lerneadamsfoundation.org" style="color:rgba(255,255,255,0.65);text-decoration:none;">info@lerneadamsfoundation.org</a>
                        </div>
                    </div>

                    <div class="laf-footer-contact-item">
                        <div class="icon"><i class="fas fa-clock"></i></div>
                        <div class="text">Mon - Fri: 8:00 AM - 5:00 PM<br><span style="font-size:0.8rem;opacity:0.7;">East Africa Time (EAT)</span></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom Bar -->
    <div class="laf-footer-bottom">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <span style="color:rgba(255,255,255,0.5);">Copyright &copy; <?= date('Y') ?> Lerne Adams Foundation. All rights reserved.</span>
                <div class="d-flex flex-wrap">
                    <a href="privacy-policy">Privacy Policy</a>
                    <a href="terms">Terms</a>
                    <a href="safeguarding">Safeguarding</a>
                    <a href="#" style="opacity:0.35;">Designed by MM Techpro</a>
                </div>
            </div>
        </div>
    </div>

</footer>

<!-- Inner Page Yellow Marquee Strip -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var pageHeader = document.querySelector('.laf-page-header');
    if (pageHeader) {
        var marqueeHtml = `
            <div class="laf-marquee-strip" style="background-color: var(--laf-yellow); height: 10vh; min-height: 80px; display: flex; align-items: center; overflow: hidden; white-space: nowrap; border-bottom: 2px solid rgba(0,0,0,0.05);">
                <marquee scrollamount="12" style="width: 100%; color: var(--laf-green-deep); font-weight: 700; font-size: 1.5rem; letter-spacing: 1px;">
                    <span class="mx-4"><i class="fas fa-asterisk mx-3"></i> Community Support</span>
                    <span class="mx-4"><i class="fas fa-asterisk mx-3"></i> Health Support</span>
                    <span class="mx-4"><i class="fas fa-asterisk mx-3"></i> Volunteer Impact</span>
                    <span class="mx-4"><i class="fas fa-asterisk mx-3"></i> Future Ready</span>
                    <span class="mx-4"><i class="fas fa-asterisk mx-3"></i> Empowerment</span>
                    <span class="mx-4"><i class="fas fa-asterisk mx-3"></i> Transparency</span>
                    <span class="mx-4"><i class="fas fa-asterisk mx-3"></i> Equality</span>
                    <span class="mx-4"><i class="fas fa-asterisk mx-3"></i> Resilience</span>
                </marquee>
            </div>
        `;
        pageHeader.insertAdjacentHTML('afterend', marqueeHtml);
    }
});
</script>


<!-- jQuery & Bootstrap 4 JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- IntersectionObserver Animations -->
<script>
(function(){
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries){
            entries.forEach(function(e){
                if (e.isIntersecting) { e.target.classList.add('animated'); observer.unobserve(e.target); }
            });
        }, { threshold: 0.12 });
        document.querySelectorAll('.laf-observe').forEach(function(el){ observer.observe(el); });
    } else {
        document.querySelectorAll('.laf-observe').forEach(function(el){ el.classList.add('animated'); });
    }
    function animateCounter(el) {
        var target = parseInt(el.getAttribute('data-target'), 10);
        if (!target) return;
        var suffix = el.getAttribute('data-suffix') || '';
        var step = target / (1800 / 16), current = 0;
        var timer = setInterval(function(){
            current += step;
            if (current >= target) { clearInterval(timer); el.textContent = target.toLocaleString() + suffix; }
            else { el.textContent = Math.floor(current).toLocaleString() + suffix; }
        }, 16);
    }
    if ('IntersectionObserver' in window) {
        var cObserver = new IntersectionObserver(function(entries){
            entries.forEach(function(e){ if (e.isIntersecting) { animateCounter(e.target); cObserver.unobserve(e.target); } });
        }, { threshold: 0.5 });
        document.querySelectorAll('.laf-counter').forEach(function(el){ cObserver.observe(el); });
    }
})();
</script>

<!-- AJAX Newsletter JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nlForm = document.getElementById('laf-newsletter-form');
    const nlMsg = document.getElementById('laf-newsletter-msg');
    
    if (nlForm) {
        nlForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(nlForm);
            nlMsg.style.display = 'block';
            nlMsg.style.color = 'var(--laf-yellow)';
            nlMsg.textContent = 'Subscribing...';
            
            fetch(nlForm.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                nlMsg.style.color = data.success ? 'var(--laf-yellow)' : '#ff6b6b';
                nlMsg.textContent = data.message;
                if (data.success) nlForm.reset();
            })
            .catch(error => {
                nlMsg.style.color = '#ff6b6b';
                nlMsg.textContent = 'An error occurred. Please try again.';
            });
        });
    }
});
</script>
