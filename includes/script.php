 <!-- JS here -->

 <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
 <!-- Jquery, Popper, Bootstrap -->
 <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
 <!-- Jquery Mobile Menu -->
 <script src="./assets/js/jquery.slicknav.min.js"></script>

 <!-- Jquery Slick , Owl-Carousel Plugins -->
 <script src="./assets/js/owl.carousel.min.js"></script>
 <script src="./assets/js/slick.min.js"></script>
 <!-- One Page, Animated-HeadLin -->
 <script src="./assets/js/wow.min.js"></script>
 <script src="./assets/js/animated.headline.js"></script>
 <script src="./assets/js/jquery.magnific-popup.js"></script>

 <!-- Date Picker -->
 <script src="./assets/js/gijgo.min.js"></script>
 <!-- Nice-select, sticky -->
 <script src="./assets/js/jquery.nice-select.min.js"></script>
 <script src="./assets/js/jquery.sticky.js"></script>
 <!-- Progress -->
 <script src="./assets/js/jquery.barfiller.js"></script>

 <!-- counter , waypoint,Hover Direction -->
 <script src="./assets/js/jquery.counterup.min.js"></script>
 <script src="./assets/js/waypoints.min.js"></script>
 <script src="./assets/js/jquery.countdown.min.js"></script>
 <script src="./assets/js/hover-direction-snake.min.js"></script>

 <!-- contact js -->
 <script src="./assets/js/contact.js"></script>
 <script src="./assets/js/jquery.form.js"></script>
 <script src="./assets/js/jquery.validate.min.js"></script>
 <script src="./assets/js/mail-script.js"></script>
 <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

 <!-- Jquery Plugins, main Jquery -->
 <script src="./assets/js/plugins.js"></script>
 <script src="./assets/js/main.js"></script>
 <script>
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
        }
    });
});

const animatedElements = document.querySelectorAll(
    '.fade-in, .slide-in-left, .slide-in-right, .zoom-in, .rotate-in, .blur-in, .parallax, .bounce-in');
animatedElements.forEach(el => observer.observe(el));
 </script>

 <script>
const image = document.querySelector('.scroll-image');
let scrollPosition = 0;

window.addEventListener('scroll', () => {
    if (image) {
        scrollPosition = window.scrollY;
        image.style.transform = `translateY(${scrollPosition * 0.5}px)`; // Adjust multiplier for speed
    }
});

// Barrizi Brand Intersection Observer for animations
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
 </script>