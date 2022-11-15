<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <?php include 'conn.php';
        
        ?>

        <h1>Profil: <?php $_SESSION['nom']; $_SESSION['prenom']?></h1><br/> 
        <p>Nom d'utilisateur: <?php $_SESSION['email'] ?></p><br/> 
        <p>Mot de passe:<?php $_SESSION['password'] ?></p> <br/> 
        <a href='logout.php'>Se déconnecter</a>";
    </div>
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>