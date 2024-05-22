<?php
include 'db.php';

// Récupérer les événements avec leurs images
$sql = "SELECT id, name, image_url FROM events WHERE image_url IS NOT NULL AND image_url != ''";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Carousel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Welcome to Event Management</h1>

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
                                <h5><?php echo $name; ?></h5>
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
        <br>
        <a href="index.php" class="btn btn-primary mb-3">Home Page</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
