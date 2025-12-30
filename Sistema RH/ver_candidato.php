<?php
require_once 'conexao.php';

$id = $_GET['id'] ?? 0;
$candidato = $pdo->prepare("SELECT * FROM candidatos WHERE id = ?");
$candidato->execute([$id]);
$candidato = $candidato->fetch();

if (!$candidato) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Candidato - <?= htmlspecialchars($candidato['nome']) ?></title>
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
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                    <h2 class="form-title">
                        <i class="fas fa-user"></i> Perfil do Candidato
                    </h2>
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="editar_candidato.php?id=<?= $candidato['id'] ?>" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="dashboard.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>

                <div class="detail-view">
                    <div class="detail-section">
                        <h3><i class="fas fa-info-circle"></i> Informações Pessoais</h3>
                        <div class="detail-grid">
                            <div class="detail-item">
                                <label>Nome Completo</label>
                                <p><?= htmlspecialchars($candidato['nome']) ?></p>
                            </div>
                            <div class="detail-item">
                                <label>E-mail</label>
                                <p><a href="mailto:<?= htmlspecialchars($candidato['email']) ?>"><?= htmlspecialchars($candidato['email']) ?></a></p>
                            </div>
                            <div class="detail-item">
                                <label>Telefone</label>
                                <p><?= htmlspecialchars($candidato['telefone'] ?: 'Não informado') ?></p>
                            </div>
                            <div class="detail-item">
                                <label>Cargo Desejado</label>
                                <p><?= htmlspecialchars($candidato['cargo']) ?></p>
                            </div>
                            <div class="detail-item">
                                <label>Data de Cadastro</label>
                                <p><?= date('d/m/Y H:i', strtotime($candidato['data_cadastro'])) ?></p>
                            </div>
                        </div>
                    </div>

                    <?php if ($candidato['experiencia']): ?>
                    <div class="detail-section">
                        <h3><i class="fas fa-briefcase"></i> Experiência Profissional</h3>
                        <div class="detail-text">
                            <?= nl2br(htmlspecialchars($candidato['experiencia'])) ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($candidato['habilidades']): ?>
                    <div class="detail-section">
                        <h3><i class="fas fa-star"></i> Habilidades e Competências</h3>
                        <div class="detail-text">
                            <?= nl2br(htmlspecialchars($candidato['habilidades'])) ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="form-actions" style="margin-top: 2rem; border-top: 2px solid var(--border-color); padding-top: 1.5rem;">
                    <a href="deletar.php?id=<?= $candidato['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este candidato?')">
                        <i class="fas fa-trash"></i> Excluir Candidato
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

