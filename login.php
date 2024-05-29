<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="shortcut icon" href="Images/Logo1.png" type="image/x-icon">

    <title>AI 4 BUSINESS - Connecter</title>
</head>

<body>
    <header>
        <?php
        include 'includes/nav.php';
        ?>
    </header>

    <div class="py-3 py-md-5">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
                    <div class="bg-white p-4 p-md-5 rounded shadow">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <a href="#!">
                                        <img src="Images/Logo.png" alt="Logo" height="200">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php

                        // Vérifier s'il y a un message d'erreur
                        if (isset($_SESSION['message'])) {
                            // Afficher le message d'erreur
                            echo "<div class='alert alert-danger text-center'>
                                <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['message'] . "
                                </div>";

                            // Supprimer le message de la session
                            unset($_SESSION['message']);
                        }

                        // Vérifier s'il y a un message de succès
                        if (isset($_SESSION['success'])) {
                            // Afficher le message de succès
                            echo "<div class='alert alert-success text-center'>
                                <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
                                </div>";

                            // Supprimer le message de la session
                            unset($_SESSION['success']);
                        }
                        ?>

                        <form action="Backend/login.php" method="POST">
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                            </svg>
                                        </span>
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '';
                                                                                                                unset($_SESSION['email']) ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                                <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                            </svg>
                                        </span>
                                        <input type="password" class="form-control" name="password" id="password" value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : '';
                                                                                                                            unset($_SESSION['password']) ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-outline-primary btn-lg" type="submit">Se
                                            connecter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <hr class="mt-4 mb-4 border-secondary-subtle">
                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center">
                                    <a href="register.php" class="link-secondary text-decoration-none">Créer un nouveau
                                        compte</a>
                                    <a href="reset.php
                                    " class="link-secondary text-decoration-none">Mot de passe oublié</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <?php
        include 'includes/footer.php'
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>