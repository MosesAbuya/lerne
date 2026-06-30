<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <?php include 'includes/head.php'?>
    <?php include 'includes/preloader.php'; ?>
    <style>
    h1 {
        font-size: 4.5rem;
        font-weight: 800;
        text-align: center;
        color: #f27420;
    }

    .h-container {
        background-image: url('assets/img/hero/back5.png');
        background-size: cover;
        background-attachment: fixed;
    }

    .slider-area2 {
        background-color: rgba(0, 0, 0, 0.252);
    }

    .header-area .header-top .header-info-left>ul>li {
        color: #1f2b7b;
    }

    .header-area .header-top .header-info-left .header-social>ul>li>a {
        color: #f27420;
    }

    .header-area .header-top .header-info-right .contact-now li a {
        color: #1f2b7b;
    }
    </style>
</head>

<body>
    <?php include 'includes/sidebar.php' ?>
    <?php include 'includes/navbar.php'?>



    <?php include 'includes/footer.php'?>
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <?php include 'includes/script.php'; ?>
</body>

</html>

<style>
                .events-p {
                    height: 300px;
                    width: 300px;
                }

                .team-g {
                    width: 250px;
                    height: 220px;
                }
                </style>
                <?php
                // Fetch events from the database
                $query = "SELECT * FROM events";
                $query_run = mysqli_query($connection, $query);
                $events = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

                // Fetch categories
                $categoryQuery = "SELECT * FROM p_category";
                $categoryResult = mysqli_query($connection, $categoryQuery);

                while ($category = mysqli_fetch_assoc($categoryResult)) {
                    // Display the category name as a section heading
                    echo "<div id='category-" . $category['id'] . "' class='category-section'>";
                    echo "<h1 ' class='h1'>" . htmlspecialchars($category['category_name']) . "</h1>";

                    // Filter events belonging to this category
                    $categoryEvents = array_filter($events, function($event) use ($category) {
                        return $event['p_category'] == $category['id'];
                    });

                    // Check if there are events for this category
                    if (!empty($categoryEvents)) {
                        echo "<div class='row'>";
                        foreach ($categoryEvents as $event) {
                            // Display the event details
                            echo "<div class='col-lg-4 col-md-6 col-sm-6'>
                                <div class='single-job-items mb-30'>
                                    <div class='job-items'>
                                        <div class='company-img'>
                                            <a href='event_details.php?id={$event['id']}'>
                                                <img class='events-p' src='images/{$event['photo']}' alt=''>
                                            </a>
                                        </div>
                                        <div class='job-tittle'>
                                            <a href='event_details.php?id={$event['id']}'>
                                                <h4>{$event['name']}</h4>
                                            </a>
                                            <ul>
                                                <li><i class='far fa-clock'></i>{$event['event_time']}</li>
                                                <li><i class='fas fa-sort-amount-down'></i>{$event['event_date']}</li>
                                                <li><i class='fas fa-map-marker-alt'></i>{$event['location']}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                        echo "</div>"; // Close row
                    } else {
                        echo "<p>No programs available in this category.</p>";
                    }

                    echo "</div>"; // Close category section
                }
                ?>

            </div>
