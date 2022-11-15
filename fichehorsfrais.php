<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie hors frais</title>
</head>
<body>
    <img src="/asset/logo.png"><br />
    <h1>Bienvenue chez GSB</h1>
    <h2>Saisie fiche de frais pour le mois .....</h2>
    <h3>Saisie de frais pour la date du <input type="date" name="date" value="date"> au <input type="date" name="date" value="date"></h3>
    <fieldset>
        <form method="POST" action="fichehorsfrais.php" name="HorsFrais">
        <legend>Visiteur</legend>

        <legend>Nom</legend>
        <input type="text">

        <legend>Prénom</legend>
        <input type="text">

        <legend>Matricule</legend>
        <input type="text">
        
    </fieldset>
    <fieldset>
    <table>
  <thead>
    <tr>
      <th scope="col">Libelle</th>
      <th scope="col">Montant</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td><input type="text"></td>
      <td><input type="text"></td>
    </tr>

  </tbody>
  <tfoot>
  </tfoot>
</table>

    </fieldset>
    </form>
</body>
</html>