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
    <h1>Selectionner un utilisateur pour afficher les fiches de frais</h1>
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
            <th>ID</th>     
            <th>Prénom</th>
            <th>Nom</th>  
            <th>Sélectionner</th>  
            </tr>
    </thead>";


while($donnee = $req->fetch()){
            echo "  <tbody>
                        <tr>
                            <td><a href="editfichefrais.php?id=<?php echo $_SESSION['id'] ?>"> ".$donnee['ID_User']." </a></td>
                            <td><a href="editfichefrais.php?id=<?php echo $_SESSION['id'] ?>">".$donnee['Prenom']."</td>
                            <td><a href="editfichefrais.php?id=<?php echo $_SESSION['id'] ?>">".$donnee['Nom']." </td>
                            <td><a href="editfichefrais.php?id=<?php echo $_SESSION['id'] ?>">Selectionner</a></td>
                        </tr>
                        <br/>
                    </tbody>";
}
?>
// <button onClick="javascript:document.location.href='../index.php'">Retour</button>
</body>
</html>