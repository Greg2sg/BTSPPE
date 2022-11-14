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
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $q = $db->prepare('SELECT email FROM user WHERE email = :email');
        $q->execute();
        $res = $q->fetch(PDO::FETCH_ASSOC);
 
        if ($res) {
            $passwordHash = $res['password'];
            if (password_verify($password, $passwordHash)) {
                echo "Connexion réussie !";
            } else {
                echo "emails invalides";
            }
        } else {
            echo "emails invalides";
        }
} 
        ?>
        
    </form>
</body>
</html>