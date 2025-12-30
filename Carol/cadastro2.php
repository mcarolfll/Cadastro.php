<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? '';
    $cnpj = $_POST['cnpj'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    try {
        $stmt = $pdo->prepare("INSERT INTO empresas (nome, cnpj, email, telefone, endereco, descricao) 
                               VALUES (:nome, :cnpj, :email, :telefone, :endereco, :descricao)");
        $stmt->execute([
            ':nome' => $nome,
            ':cnpj' => $cnpj ?: null,
            ':email' => $email,
            ':telefone' => $telefone,
            ':endereco' => $endereco,
            ':descricao' => $descricao
        ]);

        header('Location: dashboard2.php?success=1');
        exit;
    } catch(PDOException $e) {
        $error_code = $e->getCode();
        if ($error_code == 23000) {
            header('Location: empresa.php?error=cnpj_existe');
        } else {
            $error_message = urlencode("Erro ao cadastrar: " . $e->getMessage());
            header('Location: empresa.php?error=' . $error_message);
        }
        exit;
    }
} else {
    header('Location: empresa.php');
    exit;
}
?>

