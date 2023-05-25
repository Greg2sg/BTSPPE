<?php

header("Content-Type: application/json");

// Connexion à la base de données avec PDO
$user = 'id20491163_naoui';
$password = 'Rayan_69126_';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// Connexion à la base de données
try {
    $conn = new PDO('mysql:host=localhost;dbname=id20491163_gsb_bdd;charset=utf8', $user, $password, $options);
} catch (PDOException $e) {
    die('Erreur: impossible de se connecter');
}

// Fonction pour générer un token unique
function generateToken()
{
    return bin2hex(random_bytes(32));
}

$email = $_POST["email"];
$password = $_POST["password"];

// Vérifier que les champs email et password sont non vides
if (empty($email) || empty($password)) {
    $json = array("status" => 300, "message" => "Error: email and password fields are required");
    echo json_encode($json);
    exit();
}

// Vérifier que l'email est au format valide
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $json = array("status" => 300, "message" => "Error: invalid email format");
    echo json_encode($json);
    exit();
}

// Récupérer l'utilisateur à partir de la base de données en utilisant une requête préparée
$stmt = $conn->prepare("SELECT * FROM user WHERE Mail = :email");
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();

if (!$user) {
    $json = array("status" => 300, "message" => "Error: user not found");
    echo json_encode($json);
    exit();
}

// Vérifier le mot de passe en utilisant la fonction password_verify
$hashedPassword = $user['Mdp'];
if (password_verify($password, $hashedPassword)) {
    // Générer un token et le stocker dans la base de données
    $token = generateToken();
    $userId = $user['ID_User']; 
    $userId = $user['ID_User'];

    // Générer un token et le stocker dans la base de données
$token = generateToken();
$userId = $user['ID_User']; // Remplacer 'id' par le nom correct de la colonne d'identifiant de l'utilisateur
$stmt = $conn->prepare("UPDATE user SET token=:token WHERE ID_User=:userId"); // Remplacer 'id' par le nom correct de la colonne d'identifiant de l'utilisateur
$stmt->execute(['token' => $token, 'userId' => $userId]);

$json = array("status" => 200, "message" => "Success", "token" => $token);

} else {
    $json = array("status" => 300, "message" => "Error: incorrect password");
    }
    
    echo json_encode($json);
    
    $conn = null;
    
    ?>