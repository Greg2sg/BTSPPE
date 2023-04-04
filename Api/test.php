<?php
header("Content-Type: application/json");

// Connexion à la base de données avec PDO
$host = "localhost";
$dbname = "gsb_bdd";
$username = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// Récupération des valeurs envoyées par l'application externe
$email = $_POST["email"];
$password = $_POST["password"];

// Requête pour vérifier si les valeurs correspondent à celles de la base de données
$stmt = $pdo->prepare("SELECT * FROM user WHERE Mail=:email ");
$stmt->execute(['email' => $email]);
$userinfo = $stmt->fetch();

if($userinfo) {

         //Hashage de mots de passe
         $passwordHash = $userinfo['Mdp'];
         //echo $password." ".$passwordHash;

         //Vérification du mots de passe hashé
         if(password_verify($password, $passwordHash)){
        $count = $stmt->rowCount();
        if ($count > 0) {
            $json = array("status" => 200, "message" => "Success");
        } else {
            $json = array("status" => 400, "message" => "Error");
        }

        echo json_encode($json);
    
    } else {
    echo "Mots de passe incorect";
    }
}

// Fermeture de la connexion à la base de données
$pdo = null;
?>