<?php
session_start();
require 'conn.php'; // Inclure le fichier de configuration pour la connexion à la base de données

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et valider les données du formulaire
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if ($email && $password) {
        try {
            // Préparer une requête SQL pour vérifier les informations d'identification
            $sql = "SELECT id, nom, prenom, password FROM users WHERE email = :email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            // Récupérer l'utilisateur
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier si l'utilisateur existe et si le mot de passe est correct
            if ($user && password_verify($password, $user['password'])) {
                // Créer une session utilisateur
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['prenom'] = ucfirst(strtolower($user['prenom']));  // Stocker le prénom avec la première lettre en majuscule
                $_SESSION['nom'] = ucfirst(strtolower($user['nom']));
                $_SESSION['email'] = $email;
                $_SESSION['success'] = 'Connexion réussie !';

                // Rediriger vers une page protégée (par exemple, tableau de bord)
                header('Location: ../dashboard.php');
                exit();
            } else {
                $_SESSION['message'] = 'Email ou mot de passe incorrect.';
                header('Location: ../login.php');
                exit();
            }
        } catch (PDOException $e) {
            // En cas d'erreur de base de données
            $_SESSION['message'] = 'Erreur de base de données : ' . $e->getMessage();
            header('Location: ../login.php');
            exit();
        }
    } else {
        $_SESSION['message'] = 'Veuillez remplir tous les champs correctement.';
        header('Location: ../login.php');
        exit();
    }
} else {
    // Si le formulaire n'est pas soumis, rediriger vers le formulaire de connexion
    header('Location: ../login.php');
    exit();
}
