<?php
session_start();

include 'db.php';

if(isset($_SESSION['id'])){

    $req=$conn->prepare("SELECT * FROM fichefrais WHERE ID_FicheFrais= :id");

    $req->bindValue('id', $_GET['id']);
    $req->execute();
    $fichefrais = $req->fetch();

    $id_ff = $_GET['id'];

    if(isset($_GET['newdate'])){

        $newfichefrais['date']=$_GET['newdate'];
        $newfichefrais['description']=$_GET['newdescription'];
        $newfichefrais['transport']=$_GET['newdeplacement'];
        $newfichefrais['repas']=$_GET['newrepas'];
        $newfichefrais['hebergement']=$_GET['newhebergement'];
        $newfichefrais['autres']=$_GET['newautres'];
    
        $update = "UPDATE fichefrais SET ";
        if (!empty($newfichefrais['date'])) 
                    {
                        $update= $update."date='".$newfichefrais['date']."',";
                    }       
        if (!empty( $newfichefrais['description'])) 
                    {
                        $update= $update."description='". $newfichefrais['description']."',";
                    }
        if (!empty($newfichefrais['transport'])) 
                    {
                        $update= $update."transport='".$newfichefrais['transport']."',";
                    }
        if (!empty($newfichefrais['repas'])) 
                    {
                        $update= $update."repas='".$newfichefrais['repas']."',";
                    }
        if (!empty($newfichefrais['hebergement'])) 
                    {
                        $update= $update."hebergement='".$newfichefrais['hebergement']."',";
                    }
        if (!empty($newfichefrais['autres'])) 
                    {
                        $update= $update."autres='".$newfichefrais['autres']."',";
                    } 
    
    
        $update=substr($update, 0,-1)." WHERE fichefrais.ID_FicheFrais=$id_ff";
        
    
    
                if ($conn->exec($update)) 
                {
                    echo "<p style='color:green;'>Modifiée avec succés</p>";
                }
                else
                {
                    echo "impossible d'inserer";
                }         
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/editprofil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Editer</title>
</head>
    <body>
        <form method="GET" action="editfichefrais.php">
            <h2>Edition de mon profil</h2>
            <label >Date : </label><br>
            <input type="date" name="newdate" placeholder="Date" value="<?php echo $fichefrais['date']; ?>"><br><br>
            <label >Description : </label><br>
            <input type="text" name="newdescription" placeholder="Description" value="<?php echo $fichefrais['description']; ?>"><br><br>
            <label >Deplacement : </label><br>
            <input type="number" name="newdeplacement" placeholder="Deplacement" value="<?php echo $fichefrais['hebergement']; ?>"><br><br>
            <label > Repas : </label><br>
            <input type="number" name="newrepas" placeholder="Repas" value="<?php echo $fichefrais['repas']; ?>"><br><br>
            <label > Hebergement : </label><br>
            <input type="number" name="newhebergement" placeholder="Hebergement" value="<?php echo $fichefrais['hebergement']; ?>"><br><br>
            <label > Autres : </label><br>
            <input type="text" name="newautres" placeholder="autres" value="<?php echo $fichefrais['autres']; ?>"><br><br>
            
            <input class="edit" type="submit" value="editer">
            <a href="note_de_frais.php?id=<?php echo $_SESSION['id'] ?>">Retour</a>
            <input type="hidden" name="id" value="<?php echo $id_ff; ?>">
            
        </form>
        
        
    </body>
</html>
<?php


}
else{
    header('Location:conn.php');
}


?>

