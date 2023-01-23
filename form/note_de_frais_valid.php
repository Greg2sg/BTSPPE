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
    <!-- <h1>Note de Frais de <?php echo $_SESSION['nom']; ?> <?php echo $_SESSION['prenom']; ?></h1> -->
<?php
//Connexion à la base de donnée
include "db.php";


if (isset($_GET['nouvel_etat'])) 
{
    $etat = $_GET['nouvel_etat'];
    $id_ligne=$_GET['id_ligne'];

    
    $req = "UPDATE fichefrais SET etat = $etat WHERE ID_FicheFrais = $id_ligne";
    
    if ($conn->exec($req)) 
    {
        echo "<p style='color:green;'>Modifiée avec succés</p>";
        
        //header("location:validation.php");
    }
    else
    {
        echo "<b style='color:red'>Modification ratée</b>";
    }   
}




//Récupérer les donnée de la table fiche frais
$req = $conn->prepare("SELECT * FROM fichefrais WHERE ID_USER = :ID_user");
$req->execute(array(':ID_user'=>$_GET['id']));


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
            <th>Etat</th>
            
            <th></th>

            </tr>
            
    </thead>";


while($donnee = $req->fetch()){

   $etat_bdd = $donnee['etat'];
   $etat_txt = $etat_bdd;
    if ($etat_bdd == 1) { $etat_txt="acceptée"; } else if ($etat_bdd == 2) { $etat_txt ="refusée"; } else { $etat_txt = "Attente";}

    $id_ligne = $donnee['ID_FicheFrais'];

            echo "  <tbody>
                        <tr>
                         
                            <td>".$donnee['date']."</td>
                            <td>".$donnee['description']." </td>
                            <td>".$donnee['transport']." euro</td>
                            <td>".$donnee['repas']." euro</td>
                            <td>".$donnee['hebergement']." euro</td> 
                            <td>".$donnee['autres']." euro</td>
                            
                            <form action='' method='GET'>
                            <td><select name='nouvel_etat' id='pet-select'>";
                                if($etat_bdd==0){echo"<option value='0' selected='selected'>Attente</option>";}else{echo"<option value='0'>Attente</option>";};
                                if($etat_bdd==1){echo"<option value='1' selected='selected'>valider</option>";}else{echo"<option value='1'>valider</option>";};
                                if($etat_bdd==2){echo"<option value='2' selected='selected'>refuser</option>";}else{echo"<option value='2'>refuser</option>";};
                                 echo"   </select></td>
                                    <input type='hidden' name='id_ligne' value='".$id_ligne."'> </input> 
                                    <input type='hidden' name='id' value='".$_GET['id']."'> </input>  
                            <td><input type='submit' name='envoyer'></input></td></form>
                        </tr>
                        
                    </tbody>";

        } 

?>
<button onClick="javascript:document.location.href='validation.php'">Retour</button>

</body>
</html>