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
            
        ?>
        
    </form>
</body>
</html>