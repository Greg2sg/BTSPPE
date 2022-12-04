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
        <form method="POST" action="editprofil2.php">
            <h2>Edition de mon profil</h2>
            <label >Nom : </label><br>
            <input type="text" name="newnom" placeholder="nom" value="<?php echo $user['Nom']; ?>"><br><br>
            <label >Prenom : </label><br>
            <input type="text" name="newprenom" placeholder="prenom" value="<?php echo $user['Prenom']; ?>"><br><br>
            <label >Poste : </label><br>
            <input type="text" name="newposte" placeholder="Poste" value="<?php echo $user['Poste']; ?>"><br><br>
            <label > Email : </label><br>
            <input type="text" name="newemail" placeholder="email" value="<?php echo $user['Mail']; ?>"><br><br>
            <input type="submit" value="editer">


        </form>
    </body>
</html>
<?php


}
else{
    header('Location:conn.php');
}


?>

