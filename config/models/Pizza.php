<?php
references!o implementations

class Pizza

0 references
private $coon;
0 references
private $tabela = "pizzas";

o references
public 3idPizza;
0 references
public $nome;
o references
public $ingredientes;
0 references
public $valor;


public function __construct($db) {
    $this->conn = $db;

} 

public function add(){

Pizza.php
 
       $query = 'INSERT INTO ' . $this->table_name . ' SET nome = :nome, ingredientes = :ingredientes, valor = :valor';
 
        // Preparar a query

        $stmt = $this->conn->prepare($query);
 
        // Limpar os dados

        $this->nome = htmlspecialchars(strip_tags($this->nome));

        $this->ingredientes = htmlspecialchars(strip_tags($this->ingredientes));

        $this->valor = htmlspecialchars(strip_tags($this->valor));
 
        // Vincular os parâmetros

        $stmt->bindParam(':nome', $this->nome);

        $stmt->bindParam(':ingredientes', $this->ingredientes);

        $stmt->bindParam(':valor', $this->valor);
 
        // Executar a query

        if ($stmt->execute()) {

            return true;

        }        

        return false;
 


}