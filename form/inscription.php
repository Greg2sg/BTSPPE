<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Inscription</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
    position: fixed;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 950px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 0px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

select{
    font-size: .9rem;
    padding: 2px 5px;
    background-color: rgba(255,255,255,0.13);
}


    </style>
</head>
<body>
    
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="inscription.php">
        <h3>Inscription</h3>

        <label for="username">Prenom</label>
        <input type="text" name="prenom" id="prenom" >
        
        <label for="username">Nom</label>
        <input type="text" name="nom"  id="nom" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="poste">Poste</label>
        <input type="text" name="poste" id="poste" required>
        
        <label for="adresse">Adresse postale</label>
        <input type="text" name="adresse" id="adresse" >

        <label for="responsable">Responsable</label>
        <input type="text" name="responsable" id="responsable" required>

        <label for="role">Role</label>
        <input type="number" name="role" id="role" required>

        <!-- <label for="pet-select">Choisir un role:</label>

        <select name="pets" id="pet-select">
            <option value="">--Choisir le role--</option>
            <option value="1">Visiteur</option>
            <option value="2">Comptable</option>
            <option value="3">Admin</option>
            
        </select> -->

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button name="envoyer">S'inscrire</button>
    </form>

    <?php 


    
    if(isset($_POST['envoyer'])){
        //Connexion ?? la base de donn??e 
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
    
        //Inserer des donn??es dans la base de donn??e
        $q = $conn->prepare("INSERT INTO `user`(`Poste`, `Prenom`, `Nom`, `Mail`, `Mdp`, `Responsable`,`id_role`, `adresse`) VALUES ('$poste','$prenom','$nom','$email','$password','$responsable' ,'$role', '$adresse')");
        $res = $q->execute();

        //Verifier si la requ??te fonctionne
        if ($res) {
            echo "Inscription r??ussie";
            header("location:../index.php");
        } else {
            echo "ne marche pas";
        }
}}
    ?>
</body>
</html>

