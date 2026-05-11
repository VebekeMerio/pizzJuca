
?php
header("Content-Type: application/json; charset=UTF-8");


$host = "localhost";
$dbname = "seu_banco";
$user = "root";
$pass = "";

// PDO
 {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}

    
// BUSCAR RESULTADOS
    $stmt = $conn->prepare($sql);
    $stmt->execute();

// Buscar resultados
    $bebidas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorno JSON
    echo json_encode([
        "status" => "success",
        "data" => $bebidas
    ]);


    {
    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}
?>
