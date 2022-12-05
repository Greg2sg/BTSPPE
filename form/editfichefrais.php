<?php
session_start();

include 'db.php';

if(isset($_SESSION['id'])){

    $req=$conn->prepare("SELECT * FROM fiche WHERE ID_user=? ");
    $req->execute(array($_SESSION['id']));
    $user = $req->fetch();

}
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label >Numero de la fiche frais que vous voulez modifier </label>
    <input type="text" name="newnom" placeholder="nom" value="<?php echo $user['Nom']; ?>"><br><br>




</body>
</html>