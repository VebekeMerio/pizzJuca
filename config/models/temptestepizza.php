<?php


require_once "/models/Pizza.php";
require_once "config/Database.php";
//inserir a referencia para as classes que serão usadas

echo "<h1>Testando conexão e Modelo Pizza</h1>";

$database =  new Database()