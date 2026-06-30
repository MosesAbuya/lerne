<?php
$dir = __DIR__;
$files = glob($dir . '/*.php');

foreach ($files as $file) {
    if (basename($file) == 'fix_dividers.php') continue;
    $content = file_get_contents($file);
    $original = $content;

    // Fix 1: The gap under brz-page-header
    // We want to replace `<div class="brz-svg-divider" style="background:var(--navy);">`
    // ONLY when it comes right after `</section>` (the brz-page-header).
    // Let's just find the pattern of the page header ending.
    $pattern = '/(<\/section>\s*<!--.*Divider.*-->\s*)<div class="brz-svg-divider" style="background:var\(--navy\);(.*)">/i';
    $replacement = '$1<div class="brz-svg-divider" style="background:transparent; margin-top:-59px; position:relative; z-index:10; pointer-events:none;$2">';
    $content = preg_replace($pattern, $replacement, $content);

    // Also some files might just have `<!-- Brush Stroke Divider -->` without extra words.
    // Let's just target ANY divider that has background:var(--navy) right after </section>
    
    // Actually, maybe the simplest regex is to match `</section>` then any whitespace/comments then `<div class="brz-svg-divider" style="background:var(--navy);">`
    $pattern2 = '/(<\/section>\s*(?:<!--.*?-->\s*)*)<div class="brz-svg-divider" style="background:var\(--navy\);">/s';
    $replacement2 = '$1<div class="brz-svg-divider" style="background:transparent; margin-top:-59px; position:relative; z-index:10; pointer-events:none;">';
    $content = preg_replace($pattern2, $replacement2, $content);

    if ($original !== $content) {
        file_put_contents($file, $content);
        echo "Fixed header gap in: " . basename($file) . "\n";
    }
}
?>
