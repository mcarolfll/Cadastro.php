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
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Empresa - <?= htmlspecialchars($empresa['nome']) ?></title>
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
                    <a href="dashboard.php" class="nav-link active">
                        <i class="fas fa-chart-bar"></i> Dashboard
                    </a>
                </nav>
            </div>
        </header>

        <main class="main-content">
            <div class="form-container">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
                    <h2 class="form-title">
                        <i class="fas fa-building"></i> Perfil da Empresa
                    </h2>
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="editar_empresa.php?id=<?= $empresa['id'] ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="dashboard2.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>

                <div class="detail-view">
                    <div class="detail-section">
                        <h3><i class="fas fa-info-circle"></i> Informações da Empresa</h3>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <label>Nome da Empresa</label>
                                <p><?= htmlspecialchars($empresa['nome']) ?></p>
                            </div>
                            <div class="detail-item">
                                <label>CNPJ</label>
                                <p><?= htmlspecialchars($empresa['cnpj'] ?: 'Não informado') ?></p>
                            </div>
                            <div class="detail-item">
                                <label>E-mail</label>
                                <p><a href="mailto:<?= htmlspecialchars($empresa['email']) ?>"><?= htmlspecialchars($empresa['email']) ?></a></p>
                            </div>
                            <div class="detail-item">
                                <label>Telefone</label>
                                <p><?= htmlspecialchars($empresa['telefone'] ?: 'Não informado') ?></p>
                            </div>
                            <div class="detail-item">
                                <label>Data de Cadastro</label>
                                <p><?= date('d/m/Y H:i', strtotime($empresa['data_cadastro'])) ?></p>
                            </div>
                        </div>
                    </div>

                    <?php if ($empresa['endereco']): ?>
                    <div class="detail-section">
                        <h3><i class="fas fa-map-marker-alt"></i> Endereço</h3>
                        <div class="detail-text">
                            <?= nl2br(htmlspecialchars($empresa['endereco'])) ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($empresa['descricao']): ?>
                    <div class="detail-section">
                        <h3><i class="fas fa-info-circle"></i> Descrição</h3>
                        <div class="detail-text">
                            <?= nl2br(htmlspecialchars($empresa['descricao'])) ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="form-actions" style="margin-top: 2rem; border-top: 2px solid var(--border-color); padding-top: 1.5rem;">
                    <a href="deletar2.php?id=<?= $empresa['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta empresa?')">
                        <i class="fas fa-trash"></i> Excluir Empresa
                    </a>
                </div>
            </div>
        </main>

        <footer class="footer">
            <p>&copy; 2024 Sistema de Gestão de RH. Todos os direitos reservados.</p>
        </footer>
    </div>

    <script src="script.js"></script>
</body>
</html>

