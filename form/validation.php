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

//Récupérer les donnée de la table 
$req = $conn->prepare("SELECT * FROM user ");
$req->execute();

//Mise en forme du tableau de note de frais
echo "  
    <table>
        <thead>
            <tr>
            <th>Nom</th>  
            <th>Prenom</th> 
            <th>Validation</th>
            </tr>
            
    </thead>";


while($donnee = $req->fetch()){
            echo "  <tbody>
                        <tr>
                            <td>".$donnee['Nom']."</td>
                            <td>".$donnee['Prenom']." </td>
                            <td><a href='note_de_frais_valid.php?id=".$donnee['ID_User']."'>voir</a></td>
                        </tr>
                        
                    </tbody>";
}
?>
<button onClick="javascript:document.location.href='../index.php'">Retour</button>
</body>
</html>