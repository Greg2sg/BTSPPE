<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie frais forfaitaires</title>
</head>
<body>
    <img src="/asset/logo.png"><br />
      <h1>Bienvenue chez GSB</h1>
    <fieldset>
      <legend>Visiteur</legend>
    <form method="POST" action="fichedefrais.php" name="Visiteur">
      <h2>Saisie fiche de frais pour le mois <input type="number" name="mois" min="1" max="12"></h2>
        <legend>Nom:</legend>
        <input type="text" name="nom" required>

        <legend>Prénom:</legend>
        <input type="text" name="prénom" required>

        <legend>Poste:</legend>
        <input type="text" name="poste" required>

        <legend>Date:</legend>
        <input type="date" name="date" required>
     
    </fieldset>
    <fieldset>
        <legend>Frais Forfaitaires</legend>
          <table>
            <thead>
              <tr>
                <th scope="col">Libelle</th>
                <th scope="col">Prix</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th >Hébergement:</th>
                <td><input type="number" name="hebergement">Euro</td>
              </tr>
              <tr>
                <th >Repas:</th>
                <td><input type="number" name="repas">Euro</td>
              </tr>
              <tr>
                <th >Transport:</th>
                <td><input type="number" name="transport">Euro</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th>Prix Total:</th>
                <td><input type="texte" name="prixtotal">Euro</td>
              </tr>
            </tfoot>
          </table>
    </fieldset>
    <input type="submit" name="Envoyer">
    </form>
    



    <?php
    include "db.php";
if(isset($_POST['Envoyer'])) 
{
    $date = $_POST['Date'];
    $nom = $_POST['nom'];
    $prénom = $_POST['prénom'];
    $poste =$_POST['poste'];
    $mois = $_POST['mois'];
    $hebergement = $_POST['hebergement'];
    $repas = $_POST['repas'];
    $transport = $_POST['transport'];
    $prixtotal = $_POST['prixtotal'];

    $req = $conn->prepare("INSERT INTO `fichefrais`( `nom`, `prénom`, `poste`, `mois`, `Date`, `hebergement`, `repas`, `transport`, `prix total`) VALUES ('$nom','$prenom','$poste','$mois','$date','$hebergement','$repas','$transport','$prixtotal')");
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

