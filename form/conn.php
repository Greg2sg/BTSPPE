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
        <div>
            <legend class="ok">email</legend>
            <input type="text" name="email" required/>
        </div>
        <div>
            <legend>Mots de passe</legend>
            <input type="password" name="password" required/>
        </div>
        <div>
            <input type="submit" name="envoyer" />
        </div>

        <?php
session_start();
include 'db.php';

if(isset($_POST['envoyer'])) {
   $email = htmlspecialchars($_POST['email']);
   $password = sha1($_POST['password']);
   if(!empty($email) AND !empty($password)) {
      $sql = $conn->prepare("SELECT * FROM user WHERE mail = '$email' AND password = '$password'");
      $sql->execute(array($email, $password));
      $result = $sql->rowCount();
      if($result == 1) {
         $userinfo = $sql->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['nom'] = $userinfo['pseudo'];
         $_SESSION['email'] = $userinfo['email'];
         $_SESSION['responsable'] = $userinfo['responsable'];
         $_SESSION['role'] = $userinfo['role'];
         header("Location: profil.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais email ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
        
    </form>
</body>
</html>