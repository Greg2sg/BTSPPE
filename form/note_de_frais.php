<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
$req->execute(array(':ID_user'=>$_SESSION['id']));

echo "  
    <table>
        <thead>
            <tr>
            <th>date</th>  
            <th>description</th> 
            <th>Deplacement</th> 
            <th>Repas </th> 
            <th>Hebergement</th> 
            <th>Autres</th> 
            <th>Sous-total</th>
            
            </tr>
    </thead>";

while($donnee = $req->fetch()){
            echo "  <tbody>
                        <tr>
                            <td>".$donnee['date']."</td>
                            <td>".$donnee['description']."</td>
                            <td>".$donnee['transport']."</td>
                            <td>".$donnee['repas']."</td>
                            <td>".$donnee['hebergement']."</td>
                            <td>".$donnee['autres']."</td>
                            <td>".$donnee['prix_total']."</td>
                            
                        </tr>
                        <br/>
                    </tbody>";
}
?>
<button onClick="javascript:document.location.href='editfichefrais.php'">Editer la fiches frais</button>
</body>

</html>