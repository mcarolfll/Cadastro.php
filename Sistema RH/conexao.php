<?php
// Configurações de conexão com o banco de dados
$host = "localhost";
$dbname = "sistema_rh";
$username = "root";
$password = "";

try {
    // Primeiro, conecta sem especificar o banco para poder criá-lo
    $pdo_temp = new PDO("mysql:host=$host;charset=utf8mb4", $username, $password);
    $pdo_temp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Cria o banco de dados se não existir
    $pdo_temp->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    
    // Agora conecta ao banco específico
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage() . "<br>Verifique se o MySQL está rodando e as credenciais estão corretas.");
}

// Criar tabelas se não existirem
try {
    // Tabela de candidatos
    $pdo->exec("CREATE TABLE IF NOT EXISTS candidatos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        telefone VARCHAR(20),
        cargo VARCHAR(255),
        experiencia TEXT,
        habilidades TEXT,
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

    // Tabela de empresas
    $pdo->exec("CREATE TABLE IF NOT EXISTS empresas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        cnpj VARCHAR(18) UNIQUE,
        email VARCHAR(255) NOT NULL,
        telefone VARCHAR(20),
        endereco TEXT,
        descricao TEXT,
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
} catch(PDOException $e) {
    // Log do erro mas não impede a execução
    error_log("Erro ao criar tabelas: " . $e->getMessage());
}
?>

