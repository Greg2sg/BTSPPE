<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table,td,th, tr{
        border: 1px solid;
    }
</style>
<body>
<?php
//Connexion à la base de donnée
include "db.php";

//Récupérer les donnée de la table fiche frais
$req = $conn->prepare("SELECT * FROM fichefrais");
$req->execute();
            echo "  
                <table>
                    <thead>
                        <tr>
                        <th>date</th>  
                        <th>Poste</th> 
                        <th>Deplacement:KM parcourus</th>
                        <th>Deplacement: indemnité KM</th> 
                        <th>Repas </th> 
                        <th>Hebergement</th> 
                        <th>Autres</th> 
                        <th>Sous-total</th>
                        <th>Etat</th> 
                        </tr>
                    </thead>";

//
while($donnee = $req->fetch()){
            echo "  <tbody>
                        <tr>
                            <td>".$donnee['date']."</td>
                            <td>".$donnee['prenom']."</td>
                            <td>".$donnee['']."</td>
                            <td>".$donnee['']."</td>
                            <td>".$donnee['repas']."</td>
                            <td>".$donnee['hebergement']."</td>
                            <td>".$donnee['']."</td>
                            <td>".$donnee['prix_total']."</td>
                            <td>".$donnee['']."</td>
                        </tr>
                        <br/>
                    </tbody>";
}
?>
</body>
</html>