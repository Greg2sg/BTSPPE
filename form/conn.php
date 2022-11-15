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

        <button name="envoyer">Vous connecter</button>
    </form>

        <?php
session_start();
include 'db.php';

if(isset($_POST['envoyer'])) {
   $email = htmlspecialchars($_POST['email']);
   $password = sha1($_POST['password']);
   if(!empty($email) AND !empty($password)) {
      $req = $conn->prepare("SELECT * FROM user WHERE mail = $email AND password = $password");
      $req->execute(array($email, $password));
      $result = $req->rowCount();
      if($result == 1) {
         $userinfo = $req->fetch();
         $_SESSION['id'] = $userinfo['id_user'];
         $_SESSION['nom'] = $userinfo['nom'];
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



    
        ?>
        
    </form>
</body>
</html>