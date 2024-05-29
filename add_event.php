<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Échapper les entrées utilisateur pour éviter les erreurs de syntaxe SQL
    $name = $conn->real_escape_string($_POST['name']);
    $date = $conn->real_escape_string($_POST['date']);
    $description = $conn->real_escape_string($_POST['description']);
    $location = $conn->real_escape_string($_POST['location']);

    // Gérer l'upload de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_path = 'uploads/' . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            $image_url = $conn->real_escape_string($image_path);
        } else {
            $image_url = '';
        }
    } else {
        $image_url = '';
    }

    // Construire la requête SQL en utilisant les entrées échappées
    $sql = "INSERT INTO events (name, date, description, location, image_url) VALUES ('$name', '$date', '$description', '$location', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit(); // Assurez-vous de quitter après la redirection
    } else {
        // Améliorer la gestion des erreurs pour faciliter le débogage
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
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
        <h1 class="mt-5">Add Event</h1>
        <form method="post" action="add_event.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="image">Event Image</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Event</button>
        </form>
    </div>
</body>
</html>
