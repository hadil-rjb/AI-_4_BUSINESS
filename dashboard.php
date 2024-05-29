<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="shortcut icon" href="Images/Logo1.png" type="image/x-icon">

    <title>AI 4 BUSINESS - Connecter</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/skills/skill-2/assets/css/skill-2.css">
</head>

<body>
    <header>
        <?php
        include 'includes/nav.php';
        ?>
    </header>

    <?php
    require 'Backend/conn.php';

    $stmt = $db->prepare('SELECT * FROM questions');
    $stmt->execute();
    $questionAi = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>

    <!-- Card 1 - Bootstrap Brain Component -->
    <section class="py-3 py-md-5" style="height: 80vh;">
        <div class="container">
            <div class="progress mb-4" role="progressbar" aria-label="Basic example" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 0%"></div>
            </div>
            <div class="row gy-4">
                <div class="col-12">
                    <div class="card widget-card border-light shadow-sm">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-8 mb-4">
                                    <h5 class="card-title widget-card-title mb-3">Question 1 :</h5>
                                    <h4 class="card-subtitle text-body-secondary m-0">
                                        <?= isset($questionAi['question']) ? htmlspecialchars($questionAi['question']) : ''; ?>
                                    </h4>
                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-end">
                                        <div
                                            class="lh-1 text-white bg-primary rounded-circle p-3 d-flex align-items-center justify-content-center">
                                            <span>?</span>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST"
                                    action="Backend/submit.php?id=<?= htmlspecialchars($questionAi['id']); ?>">
                                    <div class="form-group mb-4">
                                        <input type="text" placeholder="Entrer votre réponse" class="form-control"
                                            id="answer" name="answer" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Soumettre</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <?php
        include 'includes/footer.php'
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>