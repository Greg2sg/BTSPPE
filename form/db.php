<?php

$user= 'timothzbtsppe';
$password='jesuisTim2414';

//Connexion à la base de donnée
try{
    $conn = new PDO('mysql:host=timothzbtsppe.mysql.db;dbname=timothzbtsppe;charset=utf8', $user, $password );
    // echo'Connexion réussi';
} catch(PDOException $e){
    die('Erreur: impossible de se connecter');
}

?>