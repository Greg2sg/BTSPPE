<?php
//Lancement de la session
session_start();
//
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $userinfo = $_SESSION;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Homepage</title>
</head>
<body>
    <header class="header">
        <h1 class="logo">Logo</h1>
        <ul class="nav">
          <li><a href="form/fichedefrais.php">Fiche de frais</a></li>
          <!-- <li><a href="form/inscription.php">Inscription</a></li> -->
          <li><a href="form/profil.php?id=<?php echo $_SESSION['id'] ?>">Profil</a></li>
          <li><a href="form/propos.php">A propos</a></li>
        </ul>
    </header>
     <div>


    <div2>
        
    <div3>
    <h2>Galaxy Swiss Bourdin</h2>
    </div3>

    </div2>

    </div>

</body>

</html>
