<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["message" => "Método não permitido. Use POST."]);
    exit;
}

include_once '../../config/Database.php';
include_once '../../models/Bebidas.php';

$data = json_decode(file_get_contents("php://input"));
if (!$data || !isset($data->nome, $data->ingredientes, $data->valor)) {
    http_response_code(400);
    echo json_encode(["message" => "Envie JSON com nome, ingredientes e valor."]);
    exit;
}

$database = new Database();
$db = $database->getConnection();
if (!$db) {
    http_response_code(500);
    echo json_encode(["message" => "Erro de conexão com o banco."]);
    exit;
}

$bebidas = new Bebidas($db);
$bebidas->nome = $data->nome;
$bebidas->ingredientes = $data->ingredientes;
$bebidas->valor = $data->valor;

if ($bebidas->create()) {
    http_response_code(201);
    echo json_encode([
        "message" => "Bebidas criada.",
        "id" => (int) $bebidas->idBebidas,
        "nome" => $bebidas->nome,
        "ingredientes" => $pizza->ingredientes,
        "valor" => (float) $bebidas->valor,
    ]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Não foi possível criar a bebidas."]);
}
