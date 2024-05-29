<?php
session_start();

require_once "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    try {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $new_password = bin2hex(random_bytes(8));
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $update_query = "UPDATE users SET password = :password WHERE email = :email";
            $update_stmt = $db->prepare($update_query);
            $update_stmt->bindParam(':password', $hashed_password);
            $update_stmt->bindParam(':email', $email);
            $update_stmt->execute();

            $to = $email;
            $subject = "Réinitialisation du mot de passe";
            $message = "Bonjour,\n\nVotre mot de passe a été réinitialisé. Voici votre nouveau mot de passe : $new_password\n\nMerci.";
            $headers = "From: AI4B@Ai4business.com";

            if (mail($to, $subject, $message, $headers)) {
                $_SESSION['success'] = "Votre mot de passe a été réinitialisé avec succès. Veuillez vérifier votre e-mail pour le nouveau mot de passe.";
            } else {
                $_SESSION['message'] = "Erreur lors de l'envoi de l'e-mail de réinitialisation du mot de passe.";
            }
        } else {
            $_SESSION['message'] = "Aucun utilisateur trouvé avec cet e-mail.";
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = "Erreur lors de la réinitialisation du mot de passe : " . $e->getMessage();
    }

    header("Location: ../reset.php");
    exit();
}

$db = null;
