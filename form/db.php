<?php

$user= 'root';
$password='root';

try{
    $conn = new PDO('mysql:host=localhost:8889;dbname=gsb_bdd;charset=utf8', $user, $password );
    // echo'Connexion réussi';
} catch(PDOException $e){
    die('Erreur: impossible de se connecter');
}