<?php
require_once 'conexao.php';

$candidatos = $pdo->query("SELECT * FROM candidatos ORDER BY data_cadastro DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Candidatos</title>
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
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>Candidato cadastrado com sucesso!</span>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['deleted'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span>Candidato excluído com sucesso!</span>
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
                        <i class="fas fa-users"></i> Candidatos Cadastrados
                    </h2>
                    <a href="candidato.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Novo Candidato
                    </a>
                </div>

                <?php if (empty($candidatos)): ?>
                    <div class="empty-state">
                        <i class="fas fa-user-slash"></i>
                        <h3>Nenhum candidato cadastrado</h3>
                        <p>Comece cadastrando seu primeiro candidato</p>
                        <a href="candidato.php" class="btn btn-primary" style="margin-top: 1rem;">
                            <i class="fas fa-plus"></i> Cadastrar Candidato
                        </a>
                    </div>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Cargo</th>
                                <th>Data Cadastro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($candidatos as $candidato): ?>
                                <tr>
                                    <td><?= htmlspecialchars($candidato['id']) ?></td>
                                    <td><?= htmlspecialchars($candidato['nome']) ?></td>
                                    <td><?= htmlspecialchars($candidato['email']) ?></td>
                                    <td><?= htmlspecialchars($candidato['telefone'] ?: '-') ?></td>
                                    <td><?= htmlspecialchars($candidato['cargo']) ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($candidato['data_cadastro'])) ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="editar_candidato.php?id=<?= $candidato['id'] ?>" class="btn btn-small btn-primary btn-icon" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="deletar.php?id=<?= $candidato['id'] ?>" class="btn btn-small btn-danger btn-icon" title="Deletar" onclick="return confirm('Tem certeza que deseja excluir este candidato?')">
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

