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
    <link rel="stylesheet" href="css/styles.css">
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
    <h1 class="mt-5">Registration For Events</h1><br>

    <br>
    
            <?php
            
            $sql = "SELECT * FROM events ORDER BY date DESC";
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
