<?php
header("Content-Type: application/json");


// Récupérer le token d'authentification
$headers = getallheaders();
if (isset($headers['Authorization'])) {
    $authorizationHeader = $headers['Authorization'];
    $token = str_replace('Bearer ', '', $authorizationHeader);
} else {
    $json = array("status" => 401, "message" => "Unauthorized");
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode($json);
    exit();
}

// Connexion à la base de données
$servername = "timothzbtsppe.mysql.db";
$username = "timothzbtsppe";
$password = "jesuisTim2414";
$dbname = "timothzbtsppe";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $json = array("status" => 500, "message" => "Database connection failed");
    echo json_encode($json);
    exit();
}

// Vérifier le token d'authentification
$stmt = $conn->prepare("SELECT ID_User FROM user WHERE token = :token");
$stmt->execute(['token' => $token]);
$user = $stmt->fetch();

if (!$user) {
    $json = array("status" => 401, "message" => "Unauthorized");
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode($json);
    exit();
}

$userId = $user['ID_User'];

// Ajouter les lignes suivantes pour afficher des informations de débogage
error_log('Token: ' . $token); // Affiche le token dans les logs
error_log('User ID: ' . $userId); // Affiche l'ID de l'utilisateur dans les logs

// Récupérer les données de la base de données pour l'utilisateur spécifié par son ID
$stmt = $conn->prepare("SELECT * FROM user WHERE ID_User = :userId");
$stmt->execute(['userId' => $userId]);
$userinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérifier si des données ont été trouvées
if (empty($userinfo)) {
    $json = array("status" => 404, "message" => "No data found");
    echo json_encode($json);
    exit();
}

// Créer un tableau pour stocker les données des fiches de frais
$tableau = array();

// Parcourir les fiches de frais et ajouter les données au tableau
foreach ($userinfo as $users) {
    $row = array(
        "nom" => $users['Nom'],
        "prenom" => $users['Prenom'],
        "poste" => $users['Poste'],
        "adresse" => $users['adresse'],
        "mail" => $users['Mail'],
        
        
    );
    $tableau[] = $row;
}

// Retourner les données sous forme de réponse JSON
$json = array("status" => 200, "data" => $tableau);
echo json_encode($json);

$conn = null;
?>