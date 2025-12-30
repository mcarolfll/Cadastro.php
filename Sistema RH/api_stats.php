<?php
require_once 'conexao.php';

header('Content-Type: application/json');

try {
    $totalCandidatos = $pdo->query("SELECT COUNT(*) as total FROM candidatos")->fetch()['total'];
    $totalEmpresas = $pdo->query("SELECT COUNT(*) as total FROM empresas")->fetch()['total'];
    
    echo json_encode([
        'candidatos' => (int)$totalCandidatos,
        'empresas' => (int)$totalEmpresas
    ]);
} catch(PDOException $e) {
    echo json_encode([
        'candidatos' => 0,
        'empresas' => 0
    ]);
}
?>


