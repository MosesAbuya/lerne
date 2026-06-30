<?php
$files = [
    'adopt.php',
    'volunteer.php',
    'blog_details.php',
    'project_details.php'
];

$divider = <<<HTML
    <!-- Brush Stroke Divider -->
    <div class="brz-svg-divider" style="background:transparent; margin-top:-59px; position:relative; z-index:10; pointer-events:none;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60" preserveAspectRatio="none" style="display:block;width:100%;height:60px;">
            <path fill="#FDFBF7" d="M0,30 C150,60 350,0 600,20 C850,40 1000,10 1200,30 C1350,45 1440,20 1440,20 L1440,60 L0,60 Z"/>
        </svg>
    </div>

HTML;

foreach ($files as $file) {
    $path = __DIR__ . '/' . $file;
    if (file_exists($path)) {
        $content = file_get_contents($path);
        
        // If it doesn't already have the divider
        if (strpos($content, '<div class="brz-svg-divider"') === false) {
            $content = preg_replace('/<\/section>\s*<!-- Content Section -->/', "</section>\n\n" . $divider . "    <!-- Content Section -->", $content);
            file_put_contents($path, $content);
            echo "Added divider to $file\n";
        }
    }
}
?>
