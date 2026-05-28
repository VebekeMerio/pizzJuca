<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido. Use DELETE."]);
    exit;
}

include_once '../../config/Database.php';
include_once '../../models/Pizza.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
    http_response_code(400);
    echo json_encode(["message" => "Parâmetro id é obrigatório."]);
    exit;
}

$database = new Database();
$db = $database->getConnection();
if (!$db) {
    http_response_code(500);
    echo json_encode(["message" => "Erro de conexão com o banco."]);
    exit;
}

$pizza = new Pizza($db);
$pizza->idPizza = $id;

if ($pizza->delete()) {
    http_response_code(200);
    echo json_encode(["message" => "Pizza removida.", "id" => (int) $id]);
} else {
    http_response_code(404);
    echo json_encode(["message" => "Pizza não encontrada."]);
}
