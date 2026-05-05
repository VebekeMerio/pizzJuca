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

        // consulta SQL para selecionar os campos idPizza, nome, ingredientes e valor da tabela de pizzas
        $query ="SELECT idPizza, nome, ingredientes, valor FROM " . $this->tabela;
        // prepara a consulta SQL usando a conexão com o banco de dados e executa a consulta, retornando o resultado
        $stmt = $this->conn->prepare($query);
        // executa a consulta SQL preparada
        $stmt->execute();
        // retorna o resultado da consulta SQL, que é um objeto PDOStatement contendo as linhas selecionadas da tabela de pizzas
        return $stmt;

    }
 
    function read() {
    $query = "SELECT idPizza, nome, ingredientes, valor FROM " . $this->tabela;
 
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
 
    return $stmt;
    }
}