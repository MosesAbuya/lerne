$files = @("education.php", "junior.php", "holiday.php", "vocational.php", "mothers.php", "community.php")

$replacement = @"
                        <ul class="other-programs-list">
                            <li>
                                <a href="education.php">
                                    <img src="assets/new/h2.jpg" alt="Education">
                                    <span>Education Support</span>
                                </a>
                            </li>
                            <li>
                                <a href="junior.php">
                                    <img src="assets/new/junior.jpeg" alt="Junior">
                                    <span>Secondary Education</span>
                                </a>
                            </li>
                            <li>
                                <a href="vocational.php">
                                    <img src="assets/img/gallery/vocational.jpg" alt="Vocational">
                                    <span>Vocational Training</span>
                                </a>
                            </li>
                            <li>
                                <a href="mothers.php">
                                    <img src="assets/new/young.jpeg" alt="Mothers">
                                    <span>Support for Young Mothers</span>
                                </a>
                            </li>
                            <li>
                                <a href="holiday.php">
                                    <img src="assets/img/gallery/sports.jpg" alt="Holiday">
                                    <span>Holiday Programmes</span>
                                </a>
                            </li>
                            <li>
                                <a href="community.php">
                                    <img src="assets/img/gallery/women.jpg" alt="Community">
                                    <span>Community Transformation</span>
                                </a>
                            </li>
                        </ul>
"@

foreach ($f in $files) {
    $path = "e:\xampp\htdocs\barrizi\$f"
    $content = Get-Content $path -Raw
    
    # Regex to match the entire <ul> block
    $content = $content -replace '(?s)<ul class="other-programs-list">.*?</ul>', $replacement
    
    Set-Content $path $content
    Write-Host "Updated $f"
}
