<?php
require_once 'conexao.php';

$empresas = $pdo->query("SELECT * FROM empresas ORDER BY data_cadastro DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Empresas</title>
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
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>Empresa cadastrada com sucesso!</span>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['deleted'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>Empresa excluída com sucesso!</span>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>Ocorreu um erro ao processar a operação.</span>
                </div>
            <?php endif; ?>

            <div class="table-container">
                <div class="table-header">
                    <h2 class="table-title">
                        <i class="fas fa-building"></i> Empresas Cadastradas
                    </h2>
                    <a href="empresa.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nova Empresa
                    </a>
                </div>

                <?php if (empty($empresas)): ?>
                    <div class="empty-state">
                        <i class="fas fa-building"></i>
                        <h3>Nenhuma empresa cadastrada</h3>
                        <p>Comece cadastrando sua primeira empresa</p>
                        <a href="empresa.php" class="btn btn-primary" style="margin-top: 1rem;">
                            <i class="fas fa-plus"></i> Cadastrar Empresa
                        </a>
                    </div>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CNPJ</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Data Cadastro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($empresas as $empresa): ?>
                                <tr>
                                    <td><?= htmlspecialchars($empresa['id']) ?></td>
                                    <td><?= htmlspecialchars($empresa['nome']) ?></td>
                                    <td><?= htmlspecialchars($empresa['cnpj'] ?: '-') ?></td>
                                    <td><?= htmlspecialchars($empresa['email']) ?></td>
                                    <td><?= htmlspecialchars($empresa['telefone'] ?: '-') ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($empresa['data_cadastro'])) ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="editar_empresa.php?id=<?= $empresa['id'] ?>" class="btn btn-small btn-primary btn-icon" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="deletar2.php?id=<?= $empresa['id'] ?>" class="btn btn-small btn-danger btn-icon" title="Deletar" onclick="return confirm('Tem certeza que deseja excluir esta empresa?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </main>

        <footer class="footer">
            <p>&copy; 2024 Sistema de Gestão de RH. Todos os direitos reservados.</p>
        </footer>
    </div>

    <script src="script.js"></script>
</body>
</html>

