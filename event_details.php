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
