CREATE TABLE produtos (
    id SERIAL PRIMARY KEY,
    img VARCHAR(255) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    tipo VARCHAR(50) NOT NULL
);


INSERT INTO produtos (img, nome, descricao, valor, tipo) VALUES 
('hamburguer1.jpg', 'Hambúrguer Clássico', 'Delicioso hambúrguer com carne, queijo e alface.', 19.99, 'Hambúrguer'),
('hamburguer2.jpg', 'Hambúrguer Vegano', 'Saboroso hambúrguer à base de plantas.', 17.50, 'Hambúrguer'),
('hamburguer3.jpg', 'Cheeseburguer', 'Hambúrguer com queijo cheddar e bacon crocante.', 22.00, 'Hambúrguer'),
('hamburguer4.jpg', 'Hambúguer Acebolado', 'Hambúger com bastante cebola', 18.59, 'Hambúrguer');



INSERT INTO produtos (img, nome, descricao, valor, tipo) VALUES 
('suco_laranja.jpg', 'Suco de Laranja', 'Suco natural de laranja 400ml', 5.90, 'Bebida'),
('suco_abacaxi.jpg', 'Suco Abacaxi com Hortelã', 'Suco natural de abacaxi com hortelã 400ml', 5.90, 'Bebida'),
('torre.jpg', 'Torre de Chopp', 'Torre de cerveja 3,5l', 20.00, 'Bebida'),
('cerveja.jpg', 'Copo de Cerveja', 'Copo de cerveja 400ml', 8.50, 'Bebida');
