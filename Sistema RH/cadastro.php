<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $cargo = $_POST['cargo'] ?? '';
    $experiencia = $_POST['experiencia'] ?? '';
    $habilidades = $_POST['habilidades'] ?? '';

    try {
        $stmt = $pdo->prepare("INSERT INTO candidatos (nome, email, telefone, cargo, experiencia, habilidades) 
                               VALUES (:nome, :email, :telefone, :cargo, :experiencia, :habilidades)");
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':telefone' => $telefone,
            ':cargo' => $cargo,
            ':experiencia' => $experiencia,
            ':habilidades' => $habilidades
        ]);

        header('Location: dashboard.php?success=1');
        exit;
    } catch(PDOException $e) {
        $error_code = $e->getCode();
        if ($error_code == 23000) {
            header('Location: candidato.php?error=email_existe');
        } else {
            $error_message = urlencode("Erro ao cadastrar: " . $e->getMessage());
            header('Location: candidato.php?error=' . $error_message);
        }
        exit;
    }
} else {
    header('Location: candidato.php');
    exit;
}
?>

