<?php
// Inclure votre fichier de configuration pour les informations de connexion à la base de données
include_once 'conn.php';

try {

    // Vérifier si l'ID de la question et la réponse sont définis
    if (isset($_GET['id']) && isset($_POST['answer'])) {
        $questionId = $_GET['id'];
        $answer = $_POST['answer'];

        // Préparer et exécuter la requête d'insertion
        $sql = "INSERT INTO reponses (question_id, reponse) VALUES (:question_id, :reponse)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':question_id', $questionId, PDO::PARAM_INT);
        $stmt->bindParam(':reponse', $answer, PDO::PARAM_STR);
        $stmt->execute();

        // Récupérer la prochaine question
        $questionId = $_GET['id'] + 1; // Supposons que l'ID suivant est l'ID actuel + 1
        $sql = "SELECT * FROM questions WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $questionId, PDO::PARAM_INT);
        $stmt->execute();
        $question = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($question) {
            // Rediriger vers la page de question avec la nouvelle question
            header("Location: ../questions.php?id=" . $question['id']);
            exit();
        } else {
            header("Location: ../terminer.php");
        }
    } else {
        echo "Données manquantes.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
