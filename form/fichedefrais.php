<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche de frais</title>
</head>
<body>
    <img src="/asset/logo.png"><br />

    <h1>Bienvenue chez GSBs</h1>
    <h2>Saisie fiche de frais pour le mois .....</h2>
    <h2>Saisie de frais pour la date du <input type="date" name="date" value="date"> au <input type="date" name="date" value="date"></h2>
    <fieldset>
    <legend>Visiteur</legend>
    <form method="POST" action="fichedefrais.php" name="Visiteur">
        <legend>Nom</legend>
        <input type="text" name="Nom" required>
        <legend>Prénom</legend>
        <input type="text" name="Prénom" required>
        <legend>Matricule</legend>
        <input type="text" name="Matricule" required>
     </form>
    </fieldset>
    <form>
        <fieldset>
            <legend>Frais Forfaitaires</legend>
            <form method="POST" action="fichedefrais.php" name="FraisForfaitaires">
            <table>
  <thead>
    <tr>
      <th scope="col">Libelle</th>
      <th scope="col">Quantite</th>
      <th scope="col">Montant Unitaire</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Nuitée</th>
      <td><input type="text"></td>
      <td>80.00€</td>
      <td><input type="text"></td>
    </tr>
    <tr>
      <th scope="row">Repas midi</th>
      <td><input type="text"></td>
      <td>29.00€</td>
      <td><input type="text"></td>
    </tr>

    <!-- quelques lignes supprimées pour condenser le texte -->

    <tr>
      <th scope="row">Kilométrage</th>
      <td><input type="text"></td>
      <td></td>
      <td><input type="text"></td>
    </tr>
  </tbody>
  <tfoot>
  <tr>
      <th</th>
      <td></td>
      <td></td>
      <td></td>
      <td><input type="texte"></td>
    </tr>
  </tfoot>
</table>

            





        </form>
        </fieldset>


    </form>

</body>
</html>