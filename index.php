<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

echo json_encode([
    "message" => "Bemm 'Vindo ao PizzaH Hut API!'"
]);

