<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lerne Adams Foundation | Empowering Communities Towards Prosperity</title>
<meta name="description" content="Lerne Adams Foundation (LAF) is an indigenous Kenyan NGO empowering marginalized communities in the Lake Victoria Region through health, education, SGBV advocacy, and socio-economic programmes.">
<meta name="keywords" content="Lerne Adams Foundation, LAF, Kenya NGO, Homa Bay, community development, HIV, SGBV, education, Lake Victoria, Kisumu">
<meta name="author" content="Lerne Adams Foundation">
<meta property="og:title" content="Lerne Adams Foundation | Empowering Communities">
<meta property="og:description" content="Indigenous Kenyan NGO working in the Lake Victoria Region. Registered foundation since 2019.">
<meta property="og:image" content="images/lerne/logo/logo.png">
<meta property="og:url" content="https://www.lerneadamsfoundation.org">

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="images/lerne/favicon/favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="images/lerne/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/lerne/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/lerne/favicon/favicon-16x16.png">
<link rel="manifest" href="images/lerne/favicon/site.webmanifest">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Bootstrap 4.6.2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- Font Awesome 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<!-- LAF Design System -->
<link rel="stylesheet" href="css/laf-brand.css">
<link rel="stylesheet" href="css/laf-sections.css">

<!-- Google Translate -->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    includedLanguages: 'en,sw,fr,es,ar,zh-CN,hi',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
    autoDisplay: false
  }, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
<!-- IntersectionObserver animations -->
<script defer>
document.addEventListener('DOMContentLoaded', function() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if(e.isIntersecting) { e.target.classList.add('animated'); } });
  }, { threshold: 0.1 });
  document.querySelectorAll('.laf-observe').forEach(el => observer.observe(el));
  
  // Navbar scroll effect
  const header = document.getElementById('laf-header');
  if(header) {
    window.addEventListener('scroll', () => {
      header.classList.toggle('laf-scrolled', window.scrollY > 80);
    });
  }
  
  // Counter animation
  document.querySelectorAll('.laf-counter').forEach(counter => {
    const target = +counter.getAttribute('data-target');
    const increment = target / 80;
    let current = 0;
    const update = () => {
      current += increment;
      if(current < target) { 
          counter.textContent = Math.ceil(current).toLocaleString(); 
          requestAnimationFrame(update); 
      }
      else { 
          counter.textContent = target.toLocaleString() + '+'; 
      }
    };
    const obs = new IntersectionObserver((entries) => {
      if(entries[0].isIntersecting) { update(); obs.disconnect(); }
    });
    obs.observe(counter);
  });
});
</script>