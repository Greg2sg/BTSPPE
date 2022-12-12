<?php
session_start();

include 'db.php';

if(isset($_SESSION['id'])){ 

    $req=$conn->prepare("SELECT * FROM fichefrais WHERE ID_fichefrais=? ");
    $req->execute(array($_SESSION['id']));
    $user = $req->fetch();

    if(isset($_POST['newdate']) AND !empty($_POST['newdate']) AND $_POST['newdate'] != $fichefrais['date'])
    {
        $newdate=htmlspecialchars($_POST['newdate']);
        $insertdate = $conn->prepare("UPDATE fichefrais SET date=? WHERE ID_fichefrais=?");
        $insertdate->execute(array($newdate,$_SESSION['id']));
        header('Location:../form/note_de_frais.php');
    }
    
    if(isset($_POST['newdescription']) AND !empty($_POST['newdescription']) AND $_POST['newdescription'] != $fichefrais['description'])
    {
        $newdescription=htmlspecialchars($_POST['newdescription']);
        $insertdescription = $conn->prepare("UPDATE fichefrais SET description=? WHERE ID_fichefrais=?");
        $insertdescription->execute(array($newdescription,$_SESSION['id']));
        header('Location:../form/note_de_frais.php');
    }

    if(isset($_POST['newtransport']) AND !empty($_POST['newtransport']) AND $_POST['newtransport'] != $fichefrais['transport'])
    {
        $newtransport=htmlspecialchars($_POST['newtransport']) ;
        $inserttransport = $conn->prepare("UPDATE fichefrais SET transport=? WHERE ID_fichefrais=?");
        $inserttransport->execute(array($newtransport,$_SESSION['id']));
        header('Location:../form/note_de_frais.php');
    }

    if(isset($_POST['newrepas']) AND !empty($_POST['newrepas']) AND $_POST['newrepas'] != $fichefrais['repas'])
    {
        $newrepas=htmlspecialchars($_POST['newrepas']) ;
        $insertrepas = $conn->prepare("UPDATE fichefrais SET repas=? WHERE ID_fichefrais=?");
        $insertrepas->execute(array($newrepas,$_SESSION['id']));
        header('Location:../form/note_de_frais.php');
    }

    if(isset($_POST['newhebergement']) AND !empty($_POST['newhebergement']) AND $_POST['newhebergement'] != $fichefrais['hebergement'])
    {
        $newhebergement=htmlspecialchars($_POST['newhebergement']) ;
        $inserthebergement = $conn->prepare("UPDATE fichefrais SET hebergement=? WHERE ID_fichefrais=?");
        $inserthebergement->execute(array($newhebergement,$_SESSION['id']));
        header('Location:../form/note_de_frais.php');
    }

    if(isset($_POST['newautres']) AND !empty($_POST['newautres']) AND $_POST['newautres'] != $fichefrais['autres'])
    {
        $newautres=htmlspecialchars($_POST['newautres']) ;
        $insertautres = $conn->prepare("UPDATE fichefrais SET autres=? WHERE ID_fichefrais=?");
        $insertautres->execute(array($newautres,$_SESSION['id']));
        header('Location:../form/note_de_frais.php');
    }
    
    if(isset($_POST['newprix_total']) AND !empty($_POST['newprix_total']) AND $_POST['newprix_total'] != $fichefrais['prix_total'])
    {
        $newprix_total=htmlspecialchars($_POST['newprix_total']) ;
        $insertprix_total = $conn->prepare("UPDATE fichefrais SET prix_total=? WHERE ID_fichefrais=?");
        $insertprix_total->execute(array($newprix_total,$_SESSION['id']));
        header('Location:../form/note_de_frais.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer fiche frais</title>
</head>
    <body>
        <form method="POST" action="editfichefrais.php">
            <h2>Edition de ma fiche de frais</h2>
            <label >Date : </label><br>
            <input type="date" name="newdate" placeholder="date" value="<?php echo $fichefrais['date']; ?>"><br><br>
            <label >Description : </label><br>
            <input type="text" name="newdescription" placeholder="description" value="<?php echo $fichefrais['descripton']; ?>"><br><br>
            <label >Deplacement : </label><br>
            <input type="number" name="newtransport" placeholder="transport" value="<?php echo $fichefrais['transport']; ?>"><br><br>
            <label >Repas : </label><br>
            <input type="number" name="newrepas" placeholder="repas" value="<?php echo $fichefrais['repas']; ?>"><br><br>
            <label >Hebergement : </label><br>
            <input type="number" name="newhebergement" placeholder="hebergement" value="<?php echo $fichefrais['hebergement']; ?>"><br><br>
            <label >Autres : </label><br>
            <input type="number" name="newautres" placeholder="autres" value="<?php echo $fichefrais['autres']; ?>"><br><br>
            <input type="submit" value="editer">
        </form>
    </body>
</html>
<?php

}
else{
    header('Location:note_de_frais.php');
}

?>