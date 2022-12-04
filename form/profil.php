<?php
session_start();
 
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $userinfo = $_SESSION;

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
         <img src="/asset/imageProfil.png" alt="">
       </div>
     </div>

     <div class="name"><?php echo $_SESSION['nom']; ?> <?php echo $_SESSION['prenom']; ?></div>
     <div class="about">
     <p>Email : <?php echo $_SESSION['email']; ?></p>
     <br>
     <p>Poste : <?php echo $_SESSION['poste']; ?></p>
     <br>
     <p>Responsable : <?php echo $_SESSION['responsable']; ?></p>

     <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
  </div>

            



     <br>
     <div class="buttons">
       <button onClick="javascript:document.location.href='../index.php'">Page d'acceuil</button>
       <button onClick="javascript:document.location.href='editprofil2.php'">Editer mon profil</button>
     </div>
     <br>
     <div class="buttons">
       <button onClick="javascript:document.location.href='logout.php'">Se deconnecter</button>
       
     </div>
 <?php
         }
         ?>
   </div>
</body>
</html>

<?php   
}
?>