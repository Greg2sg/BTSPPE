<?php
//session_start();
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
    <h1>Note de Frais de <?php echo $_SESSION['nom']; ?> <?php echo $_SESSION['prenom']; ?></h1>
<?php
//Connexion à la base de donnée
include "db.php";

//Récupérer les donnée de la table fiche frais
$req = $conn->prepare("SELECT * FROM fichefrais WHERE ID_USER = :ID_user");
$req->execute(array(':ID_user'=>$_SESSION['id']));

//Mise en forme du tableau de note de frais
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
            <th>Modifier</th>
            </tr>
            
    </thead>";


while($donnee = $req->fetch()){
            echo "  <tbody>
                        <tr>
                            <td>".$donnee['date']."</td>
                            <td>".$donnee['description']." </td>
                            <td>".$donnee['transport']." euro</td>
                            <td>".$donnee['repas']." euro</td>
                            <td>".$donnee['hebergement']." euro</td>
                            <td>".$donnee['autres']." euro</td>
                            <td><a href='editfichefrais.php'>editer</a></td>
                        </tr>
                        
                    </tbody>";
}
?>
<button onClick="javascript:document.location.href='../index.php'">Retour</button>
</body>
</html>