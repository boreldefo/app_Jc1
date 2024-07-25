<?php
require_once __DIR__.'/database/database.php';

$authDB = require __DIR__.'/database/security.php';
$currentUser =$authDB->isLoggdin();
if($currentUser){
$trajetDB = require_once __DIR__ . '/database/models/TrajetDB.php';

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';
if ($id) {



  $trajetDB->deleteOne($id);


}

}
header('Location: /trajetlist.php');