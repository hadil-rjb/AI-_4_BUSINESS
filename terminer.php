<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="Images/Logo1.png" type="image/x-icon">
    <title>AI 4 BUSINESS</title>

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/skills/skill-2/assets/css/skill-2.css">
</head>

<body>
    <header>
        <?php session_start(); ?>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="Images/Logo1.png" alt="Bootstrap" width="60" height="50"
                        class="d-inline-block align-text-top me-2">
                    <span class="h4">AI 4 BUSINESS</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item ps-3">
                            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link" href="index.php#services">Services</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link" href="index.php#about">About</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a class="nav-link" href="index.php#contact">Contact</a>
                        </li>
                        <li class="nav-item ps-3">
                            <a href="index.php" class="nav-link">Blog</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user_id']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])) { ?>
                        <li class="nav-item ps-3">
                            <a href="dashboard.php" class="nav-link">Diagnostique en ligne</a>
                        </li>
                        <?php } ?>
                        <li class="nav-item ps-3">
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                // L'utilisateur est connecté, afficher le menu de profil
                                $prenom = htmlspecialchars($_SESSION['prenom']);
                                $nom = htmlspecialchars($_SESSION['nom']); // Pour éviter les attaques XSS
                                echo '<div class="dropdown">
                        <a class="nav-link" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="Images/avatar.jpg" alt="Profile" class="rounded-circle" width="30" height="30">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-md-end bsb-dropdown-animation bsb-fadeIn"
                            aria-labelledby="dropdownMenuLink">
                            <li>
                                <h6 class="dropdown-header fs-7 text-center">Bienvenue, ' . $prenom . ' ' . $nom . '
                                </h6>
                            </li>
                            <li><a class="dropdown-item" href="Backend/logout.php">Déconnexion</a></li>
                        </ul>
                    </div>';
                            } else {
                                // L'utilisateur n'est pas connecté, afficher le bouton de connexion
                                echo '<a href="login.php" class="btn btn-primary" type="button">Connecter</a>';
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Card 1 - Bootstrap Brain Component -->
    <section class="py-3 py-md-5" style="height: 80vh;">
        <div class="container">
            <div class="progress mb-4" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 100%"></div>
            </div>
            <div class="row gy-4">
                <div class="col-12">
                    <div class="card widget-card border-light shadow-sm">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col mb-4">
                                    <h4 class="card-subtitle text-body-secondary m-0 text-center">
                                        Toutes les questions ont été répondues.
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <?php include 'includes/footer.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>