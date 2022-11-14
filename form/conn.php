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
            <legend class="ok">Identifiants</legend>
            <input type="text" name="identifiant" required/>
        </div>
        <div>
            <legend>Mots de passe</legend>
            <input type="password" name="password" required/>
        </div>
        <div>
            <input type="submit" name="envoyer" required/>
        </div>

        <?php
    if (!empty($_POST['identifiant']) && !empty($_POST['password'])) {
        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];
    
        var_dump($identifiant);
        var_dump($password);
    
        $q = $db->prepare('SELECT * FROM users WHERE identifiant = :identifiant');
        $q->bindValue('identifiant', $identifiant);
        $q->execute();
        $res = $q->fetch(PDO::FETCH_ASSOC);
        
        var_dump($res);
        
        if ($res) {
            $passwordHash = $res['password'];
            if (password_verify($password, $passwordHash)) {
                echo "Connexion réussie !";
            } else {
                echo "Identifiants invalides";
            }
        } else {
            echo "Identifiants invalides";
        }
} 
        ?>
        
    </form>
</body>
</html>