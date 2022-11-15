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
    <?php
        include 'db.php';
        //require_once 'db.php'
        //include_once 'db.php'
    ?>
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



if(isset($_POST['envoyer'])) {
    session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $sql = $conn->prepare("SELECT * FROM user WHERE mail='$email' AND mdp='$password'");
        $sql->execute();
            if($email === true && $password === true){
                $_SESSION['nom'] = $sql['nom'];
                $_SESSION['prenom'] = $sql['nom'];
                $_SESSION['nom'] = $sql['mail'];
                $_SESSION['prenom'] = $sql['responsable'];
                $_SESSION['prenom'] = $sql['responsable'];
                header("location:profil.php");
                exit;
            }
            else{
                echo "Aucun compte associer avec ces identifiants <br/> <a href='conn.php'>Se connecter</a>";
                //header('location:conn.php');
                exit;
                }
    
}




    
        ?>
        
    </form>
</body>
</html>