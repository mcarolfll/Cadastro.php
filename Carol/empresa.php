<?php
// Habilitar exibição de erros para debug (remover em produção)
error_reporting(E_ALL);
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresas</title>
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
                    <a href="empresa.php" class="nav-link active">
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
                    <i class="fas fa-building"></i> Cadastrar Empresa
                </h2>
                <p class="form-subtitle">Preencha os dados da empresa abaixo</p>

                <?php 
                if (isset($_GET['error'])): 
                    $error = $_GET['error'];
                    if ($error == 'cnpj_existe'): ?>
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>Este CNPJ já está cadastrado. Por favor, use outro CNPJ.</span>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <span><?= htmlspecialchars(urldecode($error)) ?></span>
                        </div>
                    <?php endif; 
                endif; ?>

                <form action="cadastro2.php" method="POST">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nome">
                                <i class="fas fa-building"></i> Nome da Empresa *
                            </label>
                            <input type="text" id="nome" name="nome" required>
                        </div>

                        <div class="form-group">
                            <label for="cnpj">
                                <i class="fas fa-id-card"></i> CNPJ
                            </label>
                            <input type="text" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00">
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="fas fa-envelope"></i> E-mail *
                            </label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="telefone">
                                <i class="fas fa-phone"></i> Telefone
                            </label>
                            <input type="tel" id="telefone" name="telefone" placeholder="(00) 00000-0000">
                        </div>

                        <div class="form-group full-width">
                            <label for="endereco">
                                <i class="fas fa-map-marker-alt"></i> Endereço
                            </label>
                            <textarea id="endereco" name="endereco" placeholder="Digite o endereço completo da empresa..."></textarea>
                        </div>

                        <div class="form-group full-width">
                            <label for="descricao">
                                <i class="fas fa-info-circle"></i> Descrição
                            </label>
                            <textarea id="descricao" name="descricao" placeholder="Descreva a empresa, área de atuação, etc..."></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Salvar Empresa
                        </button>
                        <a href="dashboard2.php" class="btn btn-secondary">
                            <i class="fas fa-list"></i> Ver Lista
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

