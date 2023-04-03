<?php
session_start();

include 'db.php';

if(isset($_SESSION['id'])){

    $req=$conn->prepare("SELECT * FROM user WHERE ID_user=? ");
    $req->execute(array($_SESSION['id']));
    $user = $req->fetch();

    if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $_SESSION['nom'])
    {
        $newnom=htmlspecialchars($_POST['newnom']) ;
        $insertnom = $conn->prepare("UPDATE user SET Nom=? WHERE ID_user=?");
        $insertnom->execute(array($newnom,$_SESSION['id']));
        header('Location:profil.php');
    }

    if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $_SESSION['prenom'])
    {
        $newprenom=htmlspecialchars($_POST['newprenom']) ;
        $insertprenom = $conn->prepare("UPDATE user SET Prenom=? WHERE ID_user=?");
        $insertprenom->execute(array($newprenom,$_SESSION['id']));
        header('Location:profil.php');
    }
    if(isset($_POST['newposte']) AND !empty($_POST['newposte']) AND $_POST['newposte'] != $_SESSION['Poste'])
    {
        $newposte=htmlspecialchars($_POST['newposte']) ;
        $insertposte = $conn->prepare("UPDATE user SET Poste=? WHERE ID_user=?");
        $insertposte->execute(array($newposte,$_SESSION['id']));
        header('Location:profil.php');
    }
    if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $_SESSION['email'])
    {
        $newemail=htmlspecialchars($_POST['newemail']) ;
        $insertemail = $conn->prepare("UPDATE user SET Mail=? WHERE ID_user=?");
        $insertemail->execute(array($newemail,$_SESSION['id']));
        header('Location:profil.php');
    }
    if(isset($_POST['newresponsable']) AND !empty($_POST['newresponsable']) AND $_POST['newresponsable'] != $_SESSION['responsable'])
    {
        $newresponsable=htmlspecialchars($_POST['newresponsable']) ;
        $insertresponsable = $conn->prepare("UPDATE user SET Responsable=? WHERE ID_user=?");
        $insertresponsable->execute(array($newresponsable,$_SESSION['id']));
        header('Location:profil.php');
    }
    if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $_SESSION['adresse'])
    {
        $newadresse=htmlspecialchars($_POST['newadresse']) ;
        $insertadresse = $conn->prepare("UPDATE user SET adresse=? WHERE ID_user=?");
        $insertadresse->execute(array($newadresse,$_SESSION['id']));
        header('Location:profil.php');
    }

    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer</title>
    <link rel="stylesheet" href="../css/editprofil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
    <body>
        <form method="POST" action="editprofil.php">
            <h2>Edition de mon profil</h2>
            <label >Nom : </label><br>
            <input type="text" name="newnom" placeholder="Nom" value="<?php echo $_SESSION['nom']; ?>"><br><br>
            <label >Prenom : </label><br>
            <input type="text" name="newprenom" placeholder="Prenom" value="<?php echo $_SESSION['prenom']; ?>"><br><br>
            <label >Poste : </label><br>
            <input type="text" name="newposte" placeholder="Poste" value="<?php echo $_SESSION['poste']; ?>"><br><br>
            <label > Email : </label><br>
            <input type="text" name="newemail" placeholder="Email" value="<?php echo $_SESSION['email']; ?>"><br><br>
            <label > Responsable : </label><br>
            <input type="text" name="newresponsable" placeholder="Responsable" value="<?php echo $_SESSION['responsable']; ?>"><br><br>
            <label > Adresse postale : </label><br>
            <input type="text" name="newadresse" placeholder="Adresse" value="<?php echo $_SESSION['adresse']; ?>"><br><br>
            
           
            <input class="edit" type="submit" value="Editer">
            <a href="profil.php?id=<?php echo $_SESSION['id'] ?>">Profil<?php ?></a>
        </form>
    </body>
</html>
<?php


}
else{
    header('Location:conn.php');
}


?>

