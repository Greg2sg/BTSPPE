<?php
//session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleNoteDeFrais.css">
    <title></title>
</head>

<style>
    table,td,th, tr{
        border: 1px solid;
        color: black;
    }
    h1{
        color: black;
    }
</style>

<?php 
include "header.php";
?>

<body>
   

<?php
//Connexion à la base de donnée
include "db.php";

//Récupérer les donnée de la table 
$req = $conn->prepare("SELECT * FROM user ");
$req->execute();




//Mise en forme du tableau de note de frais
echo"
<h2>Note de Frais de ". $_SESSION['nom']; ?> <?php echo $_SESSION['prenom']."</h2>
<div class='table-wrapper'>
    <table class='fl-table'>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Validation</th>
        </tr>
        </thead>";



        while($donnee = $req->fetch()){
    
            echo "
        

        <tbody>
        <tr>
            <td>".$donnee['Nom']."</td>
            <td>".$donnee['Prenom']."</td>
            <td><a href='note_de_frais_valid.php?id=".$donnee['ID_User']."'>voir</a></td>
            
        </tr>
        
        <tbody>       

    

</div>";}
    