<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page d'Accueil</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('Campus François d\'assise.jpg');
            background-size: cover;
            background-position: center;
            color: white;
        }
        .carousel-item img {
            max-height: 500px;
            margin: auto;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.5);
        }
        .logo {
            max-height: 100px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="logo bde junia.png" class="logo" alt="Logo BDE Junia">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nos missions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nos partenaires</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Espace cotisation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Prêts de matériel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nous contacter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Français</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="eventCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="CampusFrançoisd'assise.jpg" class="d-block w-100" alt="Event 1">
            </div>
            <div class="carousel-item">
                <img src="LogoBdeJunia.png" class="d-block w-100" alt="Event 2">
            </div>
            <div class="carousel-item">
                <img src="image3.jpg" class="d-block w-100" alt="Event 3">
            </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
