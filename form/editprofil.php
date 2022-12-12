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
        
    }

    if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $_SESSION['prenom'])
    {
        $newprenom=htmlspecialchars($_POST['newprenom']) ;
        $insertprenom = $conn->prepare("UPDATE user SET Prenom=? WHERE ID_user=?");
        $insertprenom->execute(array($newprenom,$_SESSION['id']));
        
    }
    if(isset($_POST['newposte']) AND !empty($_POST['newposte']) AND $_POST['newposte'] != $_SESSION['poste'])
    {
        $newposte=htmlspecialchars($_POST['newposte']) ;
        $insertposte = $conn->prepare("UPDATE user SET Poste=? WHERE ID_user=?");
        $insertposte->execute(array($newposte,$_SESSION['id']));
        
    }
    if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $_SESSION['poste'])
    {
        $newemail=htmlspecialchars($_POST['newemail']) ;
        $insertemail = $conn->prepare("UPDATE user SET Mail=? WHERE ID_user=?");
        $insertemail->execute(array($newemail,$_SESSION['id']));
        
    }
    if(isset($_POST['newresponsable']) AND !empty($_POST['newresponsable']) AND $_POST['newresponsable'] != $_SESSION['responsable'])
    {
        $newresponsable=htmlspecialchars($_POST['newresponsable']) ;
        $insertresponsable = $conn->prepare("UPDATE user SET Responsable=? WHERE ID_user=?");
        $insertresponsable->execute(array($newresponsable,$_SESSION['id']));
        
    }
    if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $_SESSION['adresse'])
    {
        $newadresse=htmlspecialchars($_POST['newadresse']) ;
        $insertadresse = $conn->prepare("UPDATE user SET adresse=? WHERE ID_user=?");
        $insertadresse->execute(array($newadresse,$_SESSION['id']));
        
    }

    



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
            <h2>Edition de mon profil</h2>
            <label >Nom : </label><br>
            <input type="text" name="newnom" placeholder="nom" value="<?php echo $user['Nom']; ?>"><br><br>
            <label >Prenom : </label><br>
            <input type="text" name="newprenom" placeholder="prenom" value="<?php echo $user['Prenom']; ?>"><br><br>
            <label >Poste : </label><br>
            <input type="text" name="newposte" placeholder="Poste" value="<?php echo $user['Poste']; ?>"><br><br>
            <label > Email : </label><br>
            <input type="text" name="newemail" placeholder="email" value="<?php echo $user['Mail']; ?>"><br><br>
            <label > Responsable : </label><br>
            <input type="text" name="newresponsable" placeholder="Responsable" value="<?php echo $user['Responsable']; ?>"><br><br>
            <label > adresse postale : </label><br>
            <input type="text" name="newadresse" placeholder="adresse" value="<?php echo $user['adresse']; ?>"><br><br>
            
            <input type="submit" value="editer">
            
        </form>
        <button onClick="javascript:document.location.href='profil.php'">Retour</button>
    </body>
</html>
<?php


}
else{
    header('Location:conn.php');
}


?>

