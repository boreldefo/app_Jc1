<?php
require_once __DIR__ . '/database/database.php';

// $articleDB= require_once __DIR__.'/database/models/ArticleDB.php';
$authDB = require __DIR__ . '/database/security.php';
$currentUser = $authDB->isLoggdin();



//var_dump($currentUser);

if (!$currentUser) {
    header('Location: /');
}



//if (isset($_POST['id']) and !empty($_POST['id'])) {
//$userId = $_POST['id'] ?? null;
$userId = $currentUser["id"] ?? null;
$sessionId = $_COOKIE['session'] ?? null;
if ($userId && $sessionId) {
    echo "Compte supprimé avec succès.";
    // Appel à la méthode de suppression uniquement si les paramètres sont présents
    $authDB->deleteUser($userId);
    $authDB->logout($sessionId);

    //$authDB->logout($sessionId);

} else {
    echo "Erreur: Paramètres manquants.";
}
//}
header('Location:/');



?>


<?php
// Inclure votre classe ou initialiser votre objet PDO et la classe AuthDB ici

// Vérifier si le formulaire a été soumis
/*if (isset($_POST['deleteAccount'])) {
    // Récupérer l'ID de l'utilisateur et la session
    $userId = $currentUser["id"] ?? null;
    $sessionId = $_COOKIE['session'] ?? null;

    // Vérifier si les paramètres nécessaires sont présents
    if ($userId && $sessionId) {
        // Appel à la méthode de suppression uniquement si les paramètres sont présents
        $authDB->deleteUser($userId, $sessionId);
        echo "Compte supprimé avec succès.";
    } else {
        echo "Erreur: Paramètres manquants.";
    }
}
*/