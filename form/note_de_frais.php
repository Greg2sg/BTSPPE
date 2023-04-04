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

//Récupérer les donnée de la table fiche frais
$req = $conn->prepare("SELECT * FROM fichefrais WHERE ID_USER = :ID_user");
$req->execute(array(':ID_user'=>$_GET['id']));

//Mise en forme du tableau de note de frais
echo"
<h2>Note de Frais de ". $_SESSION['nom']; ?> <?php echo $_SESSION['prenom']."</h2>
<div class='table-wrapper'>
    <table class='fl-table'>
        <thead>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Deplacement</th>
            <th>Repas</th>
            <th>Hebergement</th>
            <th>Autres</th>
            <th>Etat</th>
            <th>Modifier</th>
        </tr>
        </thead>";



        while($donnee = $req->fetch()){
    if($donnee['etat']==0){
        $etat='Attente';
        }
        elseif($donnee['etat']==1){
            $etat="validée";
        }
        else{
            $etat="refusée";
        }
            echo "
        

        <tbody>
        <tr>
            <td>".$donnee['date']."</td>
            <td>".$donnee['description']."</td>
            <td>".$donnee['transport']."</td>
            <td>".$donnee['repas']."</td>
            <td>".$donnee['hebergement']."</td>
            <td>".$donnee['autres']." euro</td>
            <td>".$etat."</td>
            <td>";if(($donnee['etat']==0)OR ($donnee['etat']==2))echo "<a href='editfichefrais.php?id=".$donnee['ID_FicheFrais']."'>editer</a></td>
        </tr>
        
        <tbody>       

    

</div>";}
?>




</body>


<?php


//Connexion à la base de donnée
include "db.php";

//Récupérer les donnée de la table fiche frais
$req = $conn->prepare("SELECT SUM(transport) AS total_deplacement, SUM(repas) AS total_repas, SUM(hebergement) AS total_hebergement, SUM(autres) AS total_autres, etat FROM fichefrais WHERE ID_USER = :ID_user GROUP BY etat");
$req->execute(array(':ID_user'=>$_GET['id']));

//Mise en forme du tableau de note de frais
echo "
    <thead>
        <tr>
            <th>Deplacement totaux</th>
            <th>Repas totaux</th>
            <th>Hebergemnt totaux</th>
            <th>Autres totaux</th>
            <th>Etats</th>
        </tr>
    </thead>
    <tbody>";


while($donnees = $req->fetch()) {
    $total_deplacement = $donnees['total_deplacement'];
    $total_repas = $donnees['total_repas'];
    $total_hebergement = $donnees['total_hebergement'];
    $total_autres = $donnees['total_autres'];
    $etat = $donnees['etat'];

    echo "
        <tr>
            <td>".$total_deplacement."</td>
            <td>".$total_repas."</td>
            <td>".$total_hebergement."</td>
            <td>".$total_autres."</td>
            <td>";
    
    
    switch($etat) {
        case 0:
            echo "Attente";
            break;
        case 1:
            echo "Validée";
            break;
        case 2:
            echo "Refusée";
            break;
        default:
            echo "Inconnu";
            break;
    }

    echo "</td>
        </tr>";
}

echo "
    </tbody>
</div>";
?>

</html>


    