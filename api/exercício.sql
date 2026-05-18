CREATE TABLE Bebidas (
    idBebidas INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
   
    valor DECIMAL(10, 2) NOT NULL
);

INSERT INTO bebidas (nome, valor) VALUES
('refrigerante', 10.00),
('vinho' 145.00),
('cerveja', 15.00),
('água tônica', 4.90);
SELECT * FROM bebidas