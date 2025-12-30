<?php
require_once 'conexao.php';

$id = $_GET['id'] ?? 0;

if ($id) {
    try {
        $stmt = $pdo->prepare("DELETE FROM empresas WHERE id = ?");
        $stmt->execute([$id]);
        header('Location: dashboard2.php?deleted=1');
        exit;
    } catch(PDOException $e) {
        header('Location: dashboard2.php?error=1');
        exit;
    }
}

header('Location: dashboard2.php');
?>

