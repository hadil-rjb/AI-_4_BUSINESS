<?php
session_start();

require_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($prenom) || empty($nom) || empty($email) || empty($password) || empty($password2)) {
        $_SESSION['message'] = "Veuillez remplir tous les champs.";
        header("Location: ../register.php");
    } elseif ($password !== $password2) {
        $_SESSION['message'] = "Les mots de passe ne correspondent pas.";
        header("Location: ../register.php");
    } else {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (nom, prenom, email, password) VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($sql);

            $stmt->execute([$nom, $prenom, $email, $hashed_password]);

            $_SESSION['success'] = "Enregistrement réussi.";
            header("Location: ../login.php");
        } catch (PDOException $e) {
            $_SESSION['message'] = "Erreur lors de l'enregistrement : " . $e->getMessage();
            header("Location: ../register.php");
        }
    }
    exit();
}

$db = null;
