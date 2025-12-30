<?php
require_once 'conexao.php';

$id = $_GET['id'] ?? 0;
$empresa = $pdo->prepare("SELECT * FROM empresas WHERE id = ?");
$empresa->execute([$id]);
$empresa = $empresa->fetch();

if (!$empresa) {
    header('Location: dashboard2.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? '';
    $cnpj = $_POST['cnpj'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $descricao = $_POST['descricao'] ?? '';

    try {
        $stmt = $pdo->prepare("UPDATE empresas SET nome = :nome, cnpj = :cnpj, email = :email, 
                               telefone = :telefone, endereco = :endereco, descricao = :descricao 
                               WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
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
        $erro = "Erro ao atualizar empresa";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empresa</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-briefcase"></i>
                    <h1>Sistema RH</h1>
                </div>
                <nav class="nav">
                    <a href="index.html" class="nav-link">
                        <i class="fas fa-home"></i> Início
                    </a>
                    <a href="candidato.php" class="nav-link">
                        <i class="fas fa-user-tie"></i> Candidatos
                    </a>
                    <a href="empresa.php" class="nav-link">
                        <i class="fas fa-building"></i> Empresas
                    </a>
                    <a href="dashboard.php" class="nav-link">
                        <i class="fas fa-chart-bar"></i> Dashboard
                    </a>
                </nav>
            </div>
        </header>

        <main class="main-content">
            <div class="form-container">
                <h2 class="form-title">
                    <i class="fas fa-edit"></i> Editar Empresa
                </h2>
                <p class="form-subtitle">Atualize os dados da empresa</p>

                <?php if (isset($erro)): ?>
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <span><?= $erro ?></span>
                    </div>
                <?php endif; ?>

                <form action="editar_empresa.php?id=<?= $id ?>" method="POST">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nome">
                                <i class="fas fa-building"></i> Nome da Empresa *
                            </label>
                            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($empresa['nome']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="cnpj">
                                <i class="fas fa-id-card"></i> CNPJ
                            </label>
                            <input type="text" id="cnpj" name="cnpj" value="<?= htmlspecialchars($empresa['cnpj']) ?>" placeholder="00.000.000/0000-00">
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="fas fa-envelope"></i> E-mail *
                            </label>
                            <input type="email" id="email" name="email" value="<?= htmlspecialchars($empresa['email']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="telefone">
                                <i class="fas fa-phone"></i> Telefone
                            </label>
                            <input type="tel" id="telefone" name="telefone" value="<?= htmlspecialchars($empresa['telefone']) ?>" placeholder="(00) 00000-0000">
                        </div>

                        <div class="form-group full-width">
                            <label for="endereco">
                                <i class="fas fa-map-marker-alt"></i> Endereço
                            </label>
                            <textarea id="endereco" name="endereco"><?= htmlspecialchars($empresa['endereco']) ?></textarea>
                        </div>

                        <div class="form-group full-width">
                            <label for="descricao">
                                <i class="fas fa-info-circle"></i> Descrição
                            </label>
                            <textarea id="descricao" name="descricao"><?= htmlspecialchars($empresa['descricao']) ?></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Atualizar Empresa
                        </button>
                        <a href="dashboard2.php" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </main>

        <footer class="footer">
            <p>&copy; 2024 Sistema de Gestão de RH. Todos os direitos reservados.</p>
        </footer>
    </div>

    <script src="script.js"></script>
</body>
</html>

