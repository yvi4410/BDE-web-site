<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
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
        <?php
        $event_id = $_GET['id'];
        $sql = "SELECT * FROM events WHERE id = $event_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<h1 class="mt-5">' . $row["name"] . '</h1>';
            echo '<p>' . $row["description"] . '</p>';
            echo '<p><strong>Date:</strong> ' . $row["date"] . '</p>';
            echo '<p><strong>Location:</strong> ' . $row["location"] . '</p>';
        } else {
            echo '<p class="text-muted">Event not found</p>';
        }
        ?>

        <h2 class="mt-5">Registrations</h2>
        <a href="register.php?event_id=<?php echo $event_id; ?>" class="btn btn-primary mb-3">Register for this Event</a>
        <ul class="list-group">
            <?php
            $sql = "SELECT users.name FROM users JOIN event_registrations ON users.id = event_registrations.user_id WHERE event_registrations.event_id = $event_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<li class="list-group-item">' . $row["name"] . '</li>';
                }
            } else {
                echo '<p class="text-muted">No registrations yet</p>';
            }
            ?>
        </ul>
  
    </div>
</body>
</html>
