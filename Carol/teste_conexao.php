<?php
// Arquivo de teste de conexão
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Teste de Conexão</h1>";

// Teste básico do PHP
echo "<p>PHP está funcionando! Versão: " . phpversion() . "</p>";

// Teste de extensão PDO
if (extension_loaded('pdo')) {
    echo "<p style='color: green;'>✓ Extensão PDO está carregada</p>";
} else {
    echo "<p style='color: red;'>✗ Extensão PDO NÃO está carregada</p>";
}

if (extension_loaded('pdo_mysql')) {
    echo "<p style='color: green;'>✓ Extensão PDO MySQL está carregada</p>";
} else {
    echo "<p style='color: red;'>✗ Extensão PDO MySQL NÃO está carregada</p>";
}

// Teste de conexão
echo "<h2>Teste de Conexão com Banco de Dados</h2>";
try {
    require_once 'conexao.php';
    echo "<p style='color: green;'>✓ Conexão com banco de dados estabelecida com sucesso!</p>";
    echo "<p>Banco de dados: sistema_rh</p>";
    
    // Teste de consulta
    $result = $pdo->query("SELECT COUNT(*) as total FROM candidatos");
    $count = $result->fetch()['total'];
    echo "<p>Total de candidatos: " . $count . "</p>";
    
    $result = $pdo->query("SELECT COUNT(*) as total FROM empresas");
    $count = $result->fetch()['total'];
    echo "<p>Total de empresas: " . $count . "</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Erro na conexão: " . $e->getMessage() . "</p>";
    echo "<p><strong>Possíveis soluções:</strong></p>";
    echo "<ul>";
    echo "<li>Verifique se o MySQL/MariaDB está rodando</li>";
    echo "<li>Verifique as credenciais em conexao.php (usuário: root, senha: vazio)</li>";
    echo "<li>Instale o MySQL/MariaDB se ainda não tiver</li>";
    echo "</ul>";
}

echo "<hr>";
echo "<p><a href='index.html'>← Voltar para a página inicial</a></p>";
?>

