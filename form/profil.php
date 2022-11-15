<?php
session_start();
include 'conn.php';
 
if(isset($_POST['id']) AND $_POST['id'] > 0) {
   $sql = $bdd->prepare('SELECT * FROM user WHERE id = ?');
   $sql->execute();
   $userinfo = $sql->fetch();
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
         <h2>Profil de <?php echo $userinfo['nom'];echo $userinfo['prenom']; ?></h2>
         <br /><br />
        Role = <?php echo $userinfo['role']; ?>
         <br />
        Email = <?php echo $userinfo['email']; ?>
         <br />
        Rôle = <?php echo $userinfo['role']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
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