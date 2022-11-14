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
    <form method="POST" action="inscription.php">
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
            <input type="email" name="email" required>
        </div>
        <div>
            <legend> mot de passe</legend>
            <input type="password" name="password" required>
        </div>
        <div>
            <legend> rôle</legend>
            <input type="number" name="role" min="1" max="3" required>
        </div>
        <div>
            <legend> Responsable</legend>
            <input type="text" name="responsable" required>
        </div>
        <input type="submit" name="envoyer">
    </form>
    <?php

    
    if(isset($_POST['envoyer'])){
        include 'db.php';
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $rôle = $_POST['role'];
            $responsable = $_POST['responsable'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
        $q = $conn->prepare("INSERT INTO `user`(`Role`, `Prenom`, `Nom`, `Mail`, `Mdp`, `Responsable`) VALUES ('$rôle','$prenom','$nom','$email','$password','$responsable')");
        $res = $q->execute();
    
        if ($res) {
            echo "Inscription réussie";
        }
}}
    ?>
</body>
</html>