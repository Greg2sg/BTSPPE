<?php
//Lancement de la session
session_start();

$userinfo = $_SESSION;

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
            <?php if(isset($_SESSION['id'])){
                if($userinfo['id_role'] == 3){?>
                    <li><a href="inscription.php">Inscription</a></li>
                <?php } ?>
                <?php if($userinfo['id_role'] == 2){?>
                    <li><a href="validation.php">Validation</a></li>
                <?php } ?>
                
            <li><a href="fichedefrais.php?id=<?php echo $_SESSION['id'] ?>">Fiche de frais</a></li> 
            <li><a href="note_de_frais.php?id=<?php echo $_SESSION['id'] ?>">Note de frais</a></li>
            <li><a href="profil.php?id=<?php echo $_SESSION['id'] ?>">Profil</a></li>
            
            <!-- Afficher si l'on est pas connecter -->
            <?php }else{  ?>
             
            <li><a href="conn.php">Connexion</a></li>

            <?php }; ?>
            <li><a href="propos.php">A propos</a></li>
        </ul>
    </header>

</body>
</html>