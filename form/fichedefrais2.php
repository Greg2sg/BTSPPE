<!DOCTYPE html>

<html lang="fr" >
   <head>
      <meta charset="utf-8">
      <title>Saisie frais forfaitaires</title>
      <link rel="stylesheet" href="../css/frais.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
    <div class="container">
      <img src="/asset/logo.png"></img>
        <div class="text">Bienvenue chez GSB
        <br />
        </div>
        <form method="POST" action="fichedefrais2.php" name="Visiteur">

        <div class="form-row">
        <div class="input-data">
              <input type="number" name="mois" min="1" max="12" required>
                 <div class="underline"></div>
                 <label for=""><h3>Saisie fiche de frais pour le mois :</h3></label>
              </div></div>


        <div class="form-row">
              <div class="input-data">
              <input type="text" name="nom" required>
                 <div class="underline"></div>
                 <label for="">Nom:</label>
              </div>
              <div class="input-data">
              <input type="text" name="prenom" required>
                 <div class="underline"></div>
                 <label for="">Prénom:</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data">
              <input type="text" name="poste" required>
                 <div class="underline"></div>
                 <label for="">Poste:</label>
              </div>
              <div class="input-data2">
              <input type="date" name="date" required>
                 <div class="underline"></div>
                 <label for="">Date:</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data textarea">
                 
                 <br />
                 <div class="underline"></div>
                 <label for="">Frais Forfaitaires :</label>
                 
                 <br />
                 <div class="form-row">
              <div class="input-data">
               <input type="number" name="hebergement" placeholder="En euros" min="0" required>
                 <div class="underline"></div>
                 <label for="">Hébergement:</label>
              </div>
              <div class="input-data">
              <input type="number" name="repas" placeholder="En euros" required>
                 <div class="underline"></div>
                 <label for="">Repas:</label>
              </div>
              
           </div>
           <div class="form-row">
              <div class="input-data">
               <input type="number" name="transport" placeholder="En euros" min="0" required>
                 <div class="underline"></div>
                 <label for="">Transport:</label>
              </div>
              <div class="input-data">
              <input type="number" name="prix_total" placeholder="En euros" min="0" required>
                 <div class="underline"></div>
                 <label for="">Prix Total:</label>
              </div>
                 
                 </div>               
                 <div class="form-row submit-btn">
                    <div class="input-data">
                       <div class="inner"></div>
                       <input type="submit" name="Envoyer">     
                    </div></div>   
                    </div>
              </div>             
           </div>
        </form>
     </div>
   </body>
</html>

<?php
    //Connexion à la base de donnée
    include "db.php";


if(isset($_POST['Envoyer'])) 
{

  //Déclaration des variables
    $date = $_POST['date'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $poste =$_POST['poste'];
    $mois = $_POST['mois'];
    $hebergement = $_POST['hebergement'];
    $repas = $_POST['repas'];
    $transport = $_POST['transport'];
    $prixtotal = $_POST['prix_total'];

    //Insérer les données dans la base de données
    $req = $conn->prepare("INSERT INTO `fichefrais`( `nom`, `prenom`, `poste`, `mois`, `date`, `hebergement`, `repas`, `transport`, `prix_total`) VALUES ('$nom','$prenom','$poste','$mois','$date','$hebergement','$repas','$transport','$prixtotal')");
    $res = $req ->execute();

    if($res){
      echo "envoie réussi";
    }else{
      echo "rien ne marche";
    }

}

?>
</body>
</html>
