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
        <title>Document</title>
    </head>
   <body>
      <div align="center">
         <h2><?php echo $userinfo['nom']?> <?php echo $userinfo['prenom']; ?></h2>
         <br /><br/>
         Nom/Prenom = <?php echo $userinfo['nom']; ?> <?php echo $userinfo['prenom']; ?>
         <br />
         Email = <?php echo $userinfo['email']; ?>
         <br />
         Rôle = <?php echo $userinfo['role']; ?>
         <br />
         Responsable = <?php echo $userinfo['responsable']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="../index2.php">page d'accueil</a>
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="logout.php">Se déconnecter</a>
         
         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
}
?>