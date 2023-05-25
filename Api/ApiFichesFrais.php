<?php
header("Content-Type: application/json");

// Récupérer les données envoyées en POST
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

// Vérifier si les données sont présentes
if (!$data) {
    $json = array("status" => 400, "message" => "Bad Request");
    echo json_encode($json);
    exit();
}

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

// Vérifier si tous les champs sont remplis
if (empty($data['nom']) || empty($data['prenom']) || empty($data['poste']) || empty($data['mois']) || empty($data['date']) || empty($data['hebergement']) || empty($data['repas']) || empty($data['transport'])) {
    $json = array("status" => 400, "message" => "All fields are required");
    echo json_encode($json);
    exit();
}

// Insérer les données dans la table "fichefrais"
try {
    $stmt = $conn->prepare("INSERT INTO fichefrais (ID_User, nom, prenom, poste, mois, date, hebergement, repas, transport, prix_total, autres) VALUES (:userId, :nom, :prenom, :poste, :mois, :date, :hebergement, :repas, :transport, :prixTotal, :autres)");
    $stmt->execute([
        'userId' => $userId,
        'nom' => $data['nom'],
        'prenom' => $data['prenom'],
        'poste' => $data['poste'],
        'mois' => $data['mois'],
        'date' => $data['date'],
        'hebergement' => $data['hebergement'],
        'repas' => $data['repas'],
        'transport' => $data['transport'],
        'prixTotal' => $data['repas'] + $data['hebergement'] + $data['transport']+$data['autres'],
        'autres' => $data['autres']
    ]);

    $json = array("status" => 200, "message" => "Data inserted successfully");
    echo json_encode($json);
} catch (PDOException $e) {
    $json = array("status" => 500, "message" => "Data insertion failed");
    echo json_encode($json);
}

$conn = null;
?>
