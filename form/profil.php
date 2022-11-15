<?php 
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {

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
     <h1>Profil: <?php echo $_SESSION['nom'];echo $_SESSION['prenom']; ?></h1>
     <a href="index.php">Page principale</a>
     <h4>Ou</h4>
     <a href="logout.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: conn.php");
     exit();
}
 ?>