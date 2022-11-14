<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inscription/Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 
    <form method="POST" action="register.php">
        <input type="email" placeholder="Email" name="email"><br>
        <input type="password" placeholder="Mot de passe" name="password"><br>
        <button type="submit">Inscription</button>
    </form>
 
    <hr>
 
    <form method="POST" action="login.php">
        <input type="email" placeholder="Email" name="email"><br>
        <input type="password" placeholder="Mot de passe" name="password"><br>
        <button type="submit">Connexion</button>
    </form>
    
</body>
</html>