<?php
//Lancement de la session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <title>Homepage</title>
</head>
<body>
    <header class="header">
        <h1 class="logo">Logo</h1>
        <ul class="nav">
           <!-- Afficher lorsque l'on est connecter -->
            <?php if(isset($_SESSION['id'])): ?>
            <li><a href="fichedefrais.php?id=<?php echo $_SESSION['id'] ?>">Fiche de frais</a></li> 
            <li><a href="note_de_frais.php?id=<?php echo $_SESSION['id'] ?>">Note de frais</a></li>
            <li><a href="profil.php?id=<?php echo $_SESSION['id'] ?>">Profil</a></li>
            
            <!-- Afficher si l'on est pas connecter -->
            <?php else: ?>
            <li><a href="form/inscription.php">Inscription</a></li> 
            <li><a href="form/conn.php">Connexion</a></li>

            <?php endif; ?>
            <li><a href="form/propos.php">A propos</a></li>
        </ul>
    </header>

</body>
</html>