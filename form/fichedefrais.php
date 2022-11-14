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
            <legend></legend>

            





        </form>
        </fieldset>


    </form>

</body>
</html>