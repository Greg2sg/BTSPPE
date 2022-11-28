<?php
session_start();
 
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $userinfo = $_SESSION;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="editprofil.php">
        <div>
            <label>Nom: </label>
            <input type="text" name="nom" required>
        </div>
        <div>
            <label>prenom: </label>
            <input type="text" name="prenom" required>
        </div>
        <div>
            <label>Rôle: </label>
            <input type="text" name="role" required>
        </div>
        <div>
            <label>Email: </label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Poste: </label>
            <input type="text" name="poste" required>
        </div>
        <div>
            <label>Responsable: </label>
            <input type="text" name="responsable" required>
        </div>
        <div>
            <label>Password: </label>
            <input type="password" name="password" required>
        </div>
        <input type="submit" name="editer">
    </form>

<?php
if(isset($_POST['editer'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $nom = $_POST['password'];
    $poste = $_POST['poste'];
    $role = $_POST['role'];
    $responsable = $_POST['responsable'];

    $data = "SELECT * FROM user" ;
    $sql = "UPDATE user SET Role =$role ,Prenom = $prenom ,Nom =$nom ,Mail = $email ,Mdp = $password ,Responsable = $responsable ,Poste = $poste WHERE 1";
    $req= $conn->prepare($sql);
    $req->execute($data);
}
?>
</body>
</html>
<?php
}
?>