<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Inscription</title>
</head>
<body>
    <form method="POST" action="method">
        <div>
            <legend> Prenom</legend>
            <input type="text" name="prenom" required>
        </div>
        <div>
            <legend> Nom</legend>
            <input type="text" name="nom" required>
        </div>
        <div>
            <legend> email</legend>
            <input type="text" name="email" required>
        </div>
        <div>
            <legend> mot de passe</legend>
            <input type="text" name="password" required>
        </div>
        <div>
            <legend> rôle</legend>
            <input type="text" name="role" required>
        </div>
        <div>
            <legend> Responsable</legend>
            <input type="text" name="responsable" required>
        </div>
        <input type="submit" name="envoyer">
    </form>
    <?php
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
    var_dump($email);
    var_dump($password);
 
    $q = $db->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
    $q->bindValue('email', $email);
    $q->bindValue('password', $password);
    $res = $q->execute();
 
    if ($res) {
        echo "Inscription réussie";
    }
}
    ?>
</body>
</html>