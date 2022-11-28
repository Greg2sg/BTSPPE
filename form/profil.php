<?php
session_start();
 
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $userinfo = $_SESSION;

?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/profil.css">
        <title>Document</title>
    </head>
   <body>
      <div align="center" class="wrapper">
         <h2><?php echo $userinfo['nom']?> <?php echo $userinfo['prenom']; ?></h2>
         <div class="img-area">
  <div class="zone-intérieure">
    <img src="../asset/imageProfil.pn" alt="">
  </div>
</div>
         
         <div class="name">Nom/Prenom = <?php echo $userinfo['nom']; ?> <?php echo $userinfo['prenom']; ?></div>
         
         <p>Email = <?php echo $userinfo['email']; ?></p>
         
         <p>Rôle = <?php echo $userinfo['role']; ?></p>
         
         <p>Responsable = <?php echo $userinfo['responsable']; ?></p>
         
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <div class="buttons">


         <a href="../index2.php">Page d'accueil</a>
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="logout.php">Se déconnecter</a>
         </div>
         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
}
?>