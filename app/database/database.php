<?php 



$dns ='mysql:host=localhost;dbname=modal_projet';
$user = 'root';
$pwd = 'Defo2000#';

try{
  
$pdo = new PDO($dns, $user, $pwd,[
  PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC
]);
} catch(PDOException $e){
   throw new Exception( $e->getMessage());
}

return $pdo;  