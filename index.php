<?php include 'db.php';

// Récupérer les événements avec leurs images
$sql = "SELECT id, name, image_url FROM events WHERE image_url IS NOT NULL AND image_url != ''";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                    <a class="navbar-brand" href="#">BDE</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="add_event.php">Event Suggestion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="events.php">Registration For Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
    </nav>
    <br>





    <div class="container">
        <h1 class="mt-5">Home Page</h1><br>
        <?php if ($result && $result->num_rows > 0): ?>
            <div id="eventCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $active = true;
                    while ($row = $result->fetch_assoc()):
                        $image_url = htmlspecialchars($row['image_url']);
                        $name = htmlspecialchars($row['name']);
                    ?>
                        <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                            <img src="<?php echo $image_url; ?>" class="d-block w-50" alt="<?php echo $name; ?>">
                            <div class="carousel-caption d-none d-md-block">
                            <!--<h5><?php echo $name; ?></h5>-->
                            </div>
                        </div>
                        <?php $active = false; ?>
                    <?php endwhile; ?>
                </div>
                <a class="carousel-control-prev" href="#eventCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#eventCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        <?php else: ?>
            <p class="text-muted">No events found</p>
        <?php endif; ?>
        
        <!--<br>
        <a href="add_event.php" class="btn btn-primary mb-3">Add Event</a>
        <br>
        <a href="contact.php" class="btn btn-primary mb-3">Contact</a>
        <div class="list-group">-->
        <br>
        <h1 class="mt-5">Events To Come</h1><br>
            <?php
            $sql = "SELECT * FROM events ORDER BY date DESC LIMIT 2";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<a href="event_details.php?id='.$row["id"].'" class="list-group-item list-group-item-action">';
                    echo '<h5 class="mb-1">' . $row["name"] . '</h5>';
                    echo '<p class="mb-1">' . $row["description"] . '</p>';
                    echo '<small>' . $row["date"] . ' at ' . $row["location"] . '</small>';
                    echo '</a>';
                }
            } else {
                echo '<p class="text-muted">No events found</p>';
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
