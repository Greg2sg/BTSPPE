<?php
session_start();

include 'db.php';

if(isset($_SESSION['id'])){

    $req=$conn->prepare("SELECT * FROM fichefrais WHERE ID_FicheFrais= :id");
    $req->bindValue('id', $_GET['id']);
    $req->execute();
    $fichefrais = $req->fetch();

    $id_ff = $_GET['id'];

    if(isset($_POST['newdate']) AND !empty($_POST['newdate']) AND $_POST['newdate'] != $fichefrais['newdate'])
    {
        $newdate=htmlspecialchars($_POST['newdate']) ;
        $insertdate = $conn->prepare("UPDATE fichefrais SET 'date'=? WHERE ID_FicheFrais = $id_ff");
        $insertdate->execute(array($newdate,$_SESSION['id']));
        header('Location:note_de_frais.php');
    }
    if(isset($_POST['newdescription']) AND !empty($_POST['newdescription']) AND $_POST['newdescription'] != $fichefrais['newdescription'])
    {
        $newdescription=htmlspecialchars($_POST['newdescription']) ;
        $insertdate = $conn->prepare("UPDATE fichefrais SET 'date'=? WHERE ID_FicheFrais = $id_ff");
        $insertdate->execute(array($newdescription,$id_ff));
        header('Location:note_de_frais.php');
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
        <form method="POST" action="editfichefrais2.php">
            <h2>Edition de mon profil</h2>
            <label >Date : </label><br>
            <input type="date" name="newdate" placeholder="Date" value="<?php echo $fichefrais['date']; ?>"><br><br>
            <label >Description : </label><br>
            <input type="text" name="newdescription" placeholder="Description" value="<?php echo $fichefrais['description']; ?>"><br><br>
            <label >Deplacement : </label><br>
            <input type="number" name="newdeplacement" placeholder="Deplacement" value="<?php echo $fichefrais['transport']; ?>"><br><br>
            <label > Repas : </label><br>
            <input type="number" name="newrepas" placeholder="Repas" value="<?php echo $fichefrais['repas']; ?>"><br><br>
            <label > Hebergement : </label><br>
            <input type="number" name="newhebergement" placeholder="Hebergement" value="<?php echo $fichefrais['hebergement']; ?>"><br><br>
            <label > Autres : </label><br>
            <input type="text" name="newautres" placeholder="autres" value="<?php echo $fichefrais['autres']; ?>"><br><br>
            
            <input type="submit" value="editer"><br><br>
            
        </form>
        <button onClick="javascript:document.location.href='note_de_frais.php'">Retour</button>
    </body>
</html>
<?php


}
else{
    header('Location:conn.php');
}


?>

