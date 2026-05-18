<?php

class Pizza {
 
    private $conn;
    private $tabela = "pizzas";
 
    public $idPizza;
    public $nome;
    public $ingredientes;
    public $valor;
 
    public function __construct($db) {
        $this->conn = $db;
    }

    // método para obter todas as pizzas do banco de dados
    public function getall(){
models\Pizza.php
 
  public function update() {
        // Query de atualização
        $query = 'UPDATE ' . $this->tabela . ' SET nome=:nome, ingredientes=:ingredientes, valor=:valor WHERE idPizza=:id';
 
        // Preparar a query
        $stmt = $this->conn->prepare($query);
 
        // Limpar os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->ingredientes = htmlspecialchars(strip_tags($this->ingredientes));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
        $this->idPizza = htmlspecialchars(strip_tags($this->idPizza));
 
        // Vincular os parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':ingredientes', $this->ingredientes);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':id', $this->idPizza);
 
        // Executar a query
        if($stmt->execute()) {
            return true;
        }
     
        return false;
    }
 
 

// método para obter uma pizza específica do banco de dados com base no idPizza
public function get() {
    $query = "SELECT idPizza, nome, ingredientes, valor 
    FROM " . $this->tabela . " 
    WHERE idPizza = ? 
    LIMIT 1";

    // prepara a consulta SQL usando a conexão com o banco de dados, vinculando o parâmetro idPizza à consulta, executando a consulta e retornando a linha resultante como um array associativo
    $stmt = $this->conn->prepare($query);
    // vincula o valor da propriedade idPizza ao primeiro parâmetro da consulta SQL usando o método bindParam, que é uma forma segura de passar valores para a consulta e evitar ataques de injeção de SQL
    $stmt->bindParam(1, $this->idPizza);
    // executa a consulta SQL preparada
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $this->idPizza = $row['idPizza'];
        $this->nome = $row['nome'];
        $this->ingredientes = $row['ingredientes'];
        $this->valor = $row['valor'];
    }

    return $row;
}

    public function create() {
        $query = "INSERT INTO " . $this->tabela . " (nome, ingredientes, valor) VALUES (:nome, :ingredientes, :valor)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':ingredientes', $this->ingredientes);
        $stmt->bindValue(':valor', $this->valor);
        if (!$stmt->execute()) {
            return false;
        }
        $this->idPizza = $this->conn->lastInsertId();
        return true;
    }

    public function update() {
        models\Pizza.php
 
  public function update() {
        // Query de atualização
        $query = 'UPDATE ' . $this->tabela . ' SET nome=:nome, ingredientes=:ingredientes, valor=:valor WHERE idPizza=:id';
 
        // Preparar a query
        $stmt = $this->conn->prepare($query);
 
        // Limpar os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->ingredientes = htmlspecialchars(strip_tags($this->ingredientes));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
        $this->idPizza = htmlspecialchars(strip_tags($this->idPizza));
 
        // Vincular os parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':ingredientes', $this->ingredientes);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':id', $this->idPizza);
 
        // Executar a query
        if($stmt->execute()) {
            return true;
        }
     
        return false;
    }
 
 
    }

    public function delete() {
        $query = "DELETE FROM " . $this->tabela . " WHERE idPizza = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idPizza);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

}