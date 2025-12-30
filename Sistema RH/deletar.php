<?php
require_once 'conexao.php';

$id = $_GET['id'] ?? 0;

if ($id) {
    try {
        $stmt = $pdo->prepare("DELETE FROM candidatos WHERE id = ?");
        $stmt->execute([$id]);
        header('Location: dashboard.php?deleted=1');
        exit;
    } catch(PDOException $e) {
        header('Location: dashboard.php?error=1');
        exit;
    }
}

header('Location: dashboard.php');
?>


