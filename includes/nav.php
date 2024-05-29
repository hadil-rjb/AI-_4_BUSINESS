<?php session_start(); ?>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="Images/Logo1.png" alt="Bootstrap" width="60" height="50" class="d-inline-block align-text-top me-2">
            <span class="h4">AI 4 BUSINESS</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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