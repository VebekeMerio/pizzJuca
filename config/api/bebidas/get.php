
<?php
header("Content-Type: application/json; charset=UTF-8");

// CONEXÃO COM BANCO DE DADOS
$host = "localhost";
$db = "seu_banco";
$user = "root";
$pass = "";

{
    $conn =  PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    

    // GET ALL bebidas
    $sql = "SELECT * FROM bebidas";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($dados);

} catch (PDOException $e) {
    echo json_encode([
        "erro" => $e->getMessage()
    ]);
}
?>
