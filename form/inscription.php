<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../css/styleInscription.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

<body >

    
  <div class="container">
    <div class="title">Inscription</div>
    <div class="content">
      <form action="inscription.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Prenom</span>
            <input name="prenom" type="text" placeholder="Entrer votre Prénom" required>
          </div>
          <div class="input-box">
            <span class="details">Nom</span>
            <input name="nom" type="text" placeholder="Entrer votre Nom" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input name="email" type="text" placeholder="Entrer votre Email" required>
          </div>
          <div class="input-box">
            <span class="details">Adresse</span>
            <input name="adresse" type="text" placeholder="Entrer votre Adresse" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe</span>
            <input name="password" type="text" placeholder="Entrer votre Mot de passe" required>
          </div>
          <div class="input-box">
            <span class="details">Responsable</span>
            <input name="responsable" type="text" placeholder="Entrer le Responsable" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="role" id="dot-1" value="3" required>
          <input type="radio" name="role" id="dot-2" value="2" required>
          <input type="radio" name="role" id="dot-3" value="1" required>
          <span class="gender-title">Role</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Administrateur</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Comptable</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Salarier</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Inscription" name="envoyer">
        </div>

        <div class="button">
            <input type="submit" value="Retour" onClick="javascript:document.location.href='../index.php'">
        </div>
      </form>
    </div>
  </div>

</body>
</html>









    <?php 


    
    if(isset($_POST['envoyer'])){
        //Connexion à la base de donnée 
        include 'db.php';

        //On verifie si tout les champs sont remplis
        if (!empty($_POST['email']) && !empty($_POST['password'])) {

            //Declarations de variables
            $role = $_POST['role'];
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $poste = $_POST['poste'];
            $responsable = $_POST['responsable'];
            $adresse = $_POST['adresse'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
        //Inserer des données dans la base de donnée
        $q = $conn->prepare("INSERT INTO `user`(`Poste`, `Prenom`, `Nom`, `Mail`, `Mdp`, `Responsable`,`id_role`, `adresse`) VALUES ('$poste','$prenom','$nom','$email','$password','$responsable' ,'$role', '$adresse')");
        $res = $q->execute();

        //Verifier si la requête fonctionne
        if ($res) {
            echo "Inscription réussie";
            header("location:../index.php");
        } else {
            echo "ne marche pas";
        }
}}
    ?>
</body>
</html>

