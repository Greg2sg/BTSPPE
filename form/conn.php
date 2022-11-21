<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleConn.css"> 
    <title>Formulaire de connexion</title>
</head>
<body>
    
    <form method="post" action="conn.php">
        <form>
        <h3>Connexion</h3>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button name="envoyer">Connexion</button>
    </form>
</styel>

        <?php

include 'db.php';

if(isset($_POST['envoyer'])) {
   $email = $_POST['email'];
   $password =$_POST['password'];
   if(!empty($email) AND !empty($password)) {
      $r = "SELECT * FROM user WHERE mail = '$email' AND mdp = '$password'";
      $req = $conn->prepare($r);
      $req->execute();
      $userinfo = $req->fetch();
      if($req) {
         $passwordHash = $userinfo['password'];
         if(password_verify($password, $passwordHash)){
            $_SESSION['id'] = $userinfo['ID_User'];
            $_SESSION['nom'] = $userinfo['Nom'];
            $_SESSION['prenom'] = $userinfo['Prenom'];
            $_SESSION['email'] = $userinfo['Mail'];
            $_SESSION['responsable'] = $userinfo['Responsable'];
            $_SESSION['role'] = $userinfo['Role'];
            header("Location: profil.php?id=".$_SESSION['id']);
         }else{
             echo "<label>Mauvais email ou mot de passe !</label>";
         }
      } else {
         echo "impossible de se connecter";
      }

   } else {
      echo "Tous les champs doivent être complétés !";
   }
}
?>
        
    </form>
</body>
</html>