<?php
//Lancement de la Session
session_start();

//Connexion à la base de donnée
include 'db.php';


if(isset($_SESSION['id'])){

    $req=$conn->prepare("SELECT * FROM user WHERE ID_user=? ");
    $req->execute(array($_SESSION['id']));
    $user = $req->fetch();
    
    if($user['Poste'] == "responsable"){
      echo "
      <style>
      p{
        color: red;
      }
      </style>";
    }else{
      echo "
      <style>
      p{
        color: blue;
      }
      </style>";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="../css/profil.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <div class="background">
      <div class="shape"></div>
      <div class="shape"></div>
  </div>


   <div class="wrapper">
     <div class="img-area">
       <div class="inner-area">
         <img src="../asset/imageProfil.png" alt="">
       </div>
     </div>

     <div class="name"><?php echo $user['Nom']; ?> <?php echo $user['Prenom']; ?></div>
     <div class="about">
     <p>Email : <?php echo $user['Mail']; ?></p>
     <br>
     <p>Poste : <?php echo $user['Poste']; ?></p>
     <br>
     <p>Responsable : <?php echo $user['Responsable']; ?></p>
     <br>
     <p>Adresse postale : <?php echo $user['adresse']; ?></p>
     <br>

     <p>Role : <?php
      if($user['id_role']==1){
        $user='Visiteur';
        }
        elseif($user['id_role']==2){
            $user="Comptable";
        }
        elseif($user['id_role']==3){
            $user="Administrateur";
        }
         echo $user;  
         
         ?></p>

     <br>

     <div class="buttons">
       <button onClick="javascript:document.location.href='../index.php'">Page d'accueil</button>
       <button onClick="javascript:document.location.href='editprofil.php'">Editer mon profil</button>
     </div>

     <br>
     <div class="buttons">
       <button onClick="javascript:document.location.href='logout.php'">Se deconnecter</button> 
     </div>
     
   </div>
</body>
</html>

<?php   
}
?>