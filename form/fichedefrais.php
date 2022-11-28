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
    <h2>Saisie fiche de frais pour le mois <input type="number" name="date" min="1" max="12"></h2>
    <fieldset>
    <legend>Visiteur</legend>
    <form method="POST" action="fichedefrais.php" name="Visiteur">
        <legend>Nom</legend>
        <input type="text" name="Nom" required>
        <legend>Prénom</legend>
        <input type="text" name="Prénom" required>
        <legend>Poste</legend>
        <input type="text" name="Poste" required>
        <legend>Date</legend>
        <input type="date" name="Jour" required>
     
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
      <th scope="row">Hébergement</th>
      <td><input type="text" name="hebergement"></td>
      
    </tr>
    <tr>
      <th scope="row">Repas</th>
      <td><input type="text" name="repas"></td>
      
      
    </tr>

    

    <tr>
      <th scope="row">Transport</th>
      <td><input type="text" name="transport"></td>

    </tr>
  </tbody>
  <tfoot>
  <tr>
      <th</th>
      <td></td>
      <td><input type="texte"></td>
    </tr>
  </tfoot>
</table>
    </fieldset>
    <input type="button" name="Retour" value="Retour"><input type="submit" name="Envoyer"><input type="button" name="Effacer" value="Effacer">
    </form>
    



    <?php
    include "db.php";
if(isset($_POST['Envoyer'])) 
{
    $Date = $_POST['Date'];
    $nom = $_POST['nom'];
    $prénom = $_POST['prénom'];
    $poste =$_POST['poste'];
    $mois = $_POST['mois'];

    $hebergement = $_POST['hebergement'];
    $repas = $_POST['repas'];
    $transport = $_POST['transport'];
    $prixtotal = $_POST['prix total'];
 
    $req = $conn->prepare("INSERT INTO `fichefrais`(`ID_FicheFrais`, `nom`, `prénom`, `poste`, `mois`, `Date`, `hebergement`, `repas`, `transport`, `prix total`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')");

    $req ->execute();





  

  
}
?>
</body>
</html>

