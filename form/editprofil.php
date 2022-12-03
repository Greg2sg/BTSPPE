<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer</title>
</head>
<body>
    <form method="POST" action="editprofil.php">
        <div>
            <label>Nom: </label>
            <input type="text" name="nom" value="<?php echo $userinfo['Nom']?>" required>
        </div>
        <div>
            <label>prenom: </label>
            <input type="text" name="prenom" value="<?php echo $_SESION['Prenom']?>" required>
        </div>
        <div>
            <label>Rôle: </label>
            <input type="text" name="role" value="<?php echo $_SESION['Role']?>" required>
        </div>
        <div>
            <label>Email: </label>
            <input type="email" name="email" value="<?php $userinfo['email'];?>" required>
        </div>
        <div>
            <label>Poste: </label>
            <input type="text" name="poste" value="<?php echo $_SESION['Poste']?>" required>
        </div>
        <div>
            <label>Responsable: </label>
            <input type="text" name="responsable" value="<?php echo $_SESION['Responsable']?>" required>
        </div>
        <div>
            <label>Password: </label>
            <input type="password" name="password" value="" required>
        </div>
        <input type="submit" name="editer">
    </form>

<?php

//Effectuer le code après avoir appuyé sur 'Envoyer'
if(isset($_POST['editer'])){

    //Déclaration des variables
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $nom = $_POST['password'];
    $poste = $_POST['poste'];
    $role = $_POST['role'];
    $responsable = $_POST['responsable'];

    //Update des donnée dans le profil
    $sql = "UPDATE user SET Role = $role ,Prenom = $prenom ,Nom =$nom ,Mail = $email ,Mdp = $password ,Responsable = $responsable ,Poste = $poste";
    $req= $conn->prepare($sql);
    $req->execute();
    header("location:profil.php");
}
?>
</body>
</html>