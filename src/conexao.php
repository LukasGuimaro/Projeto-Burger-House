<?php
// Declarar variáveis de conexão
$endereco = 'localhost';  // Definindo o endereço do servidor de banco de dados (localhost se o banco estiver na mesma máquina)
$banco = 'lanchonete';    // Nome do banco de dados que será acessado
$porta = 5433;            // Porta padrão de comunicação do PostgreSQL
$usuario = 'postgres';    // Nome de usuário para acessar o banco de dados
$senha = 'postgres';      // Senha correspondente ao usuário

// Criar uma nova instância de PDO para conexão com o banco de dados PostgreSQL
$pdo = new PDO(
    "pgsql:host=$endereco;dbname=$banco;port=$porta",  // String de conexão com o formato DSN (Data Source Name)
    $usuario,  // Nome de usuário fornecido para o PostgreSQL
    $senha,    // Senha fornecida para o PostgreSQL
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]  // Configuração para lançar exceções em caso de erros de conexão
);
//Necessário instalar driver de comunicação php - pgadmin: pdo_pgsql
?>