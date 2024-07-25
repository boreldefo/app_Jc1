<?php


$pdo = require_once './database/database.php';
$authDB = require_once './database/security.php';




/*if (isset($_POST['id'])) {
    $userId = $_POST['id']; // Récupérer l'ID de l'utilisateur à supprimer

    // Préparer la requête de suppression avec PDO
    $stmt = $pdo->prepare("DELETE FROM user WHERE id = ?");
    $stmt->execute([$userId]); // Exécuter la requête en passant l'ID de l'utilisateur comme paramètre

    // Vérifier si la suppression a réussi
    if ($stmt->rowCount() > 0) {
        echo "Utilisateur supprimé avec succès";
    } else {
        echo "Impossible de supprimer l'utilisateur";
    }


    header("Location: dashboard.php");
    // exit(0);
}*/

if (isset($_POST['deleteUser'])) {
    $userId = $_POST['deleteUser']; // Récupérer l'ID de l'utilisateur à supprimer

    // Préparer la requête de suppression avec PDO
    $stmt = $pdo->prepare("DELETE FROM user WHERE id = ?");
    $stmt->execute([$userId]); // Exécuter la requête en passant l'ID de l'utilisateur comme paramètre

    // Vérifier si la suppression a réussi
    if ($stmt->rowCount() > 0) {
        echo "Utilisateur supprimé avec succès";
    } else {
        echo "Impossible de supprimer l'utilisateur";
    }

    // Rediriger vers la page index.php
    header("Location: dashboard.php");
    exit(0);
}