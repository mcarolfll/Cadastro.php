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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $cargo = $_POST['cargo'] ?? '';
    $experiencia = $_POST['experiencia'] ?? '';
    $habilidades = $_POST['habilidades'] ?? '';

    try {
        $stmt = $pdo->prepare("UPDATE candidatos SET nome = :nome, email = :email, telefone = :telefone, 
                               cargo = :cargo, experiencia = :experiencia, habilidades = :habilidades 
                               WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
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
        $erro = "Erro ao atualizar candidato";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Candidato</title>
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
                    <i class="fas fa-edit"></i> Editar Candidato
                </h2>
                <p class="form-subtitle">Atualize os dados do candidato</p>

                <?php if (isset($erro)): ?>
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <span><?= $erro ?></span>
                    </div>
                <?php endif; ?>

                <form action="editar_candidato.php?id=<?= $id ?>" method="POST">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nome">
                                <i class="fas fa-user"></i> Nome Completo *
                            </label>
                            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($candidato['nome']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="fas fa-envelope"></i> E-mail *
                            </label>
                            <input type="email" id="email" name="email" value="<?= htmlspecialchars($candidato['email']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="telefone">
                                <i class="fas fa-phone"></i> Telefone
                            </label>
                            <input type="tel" id="telefone" name="telefone" value="<?= htmlspecialchars($candidato['telefone']) ?>" placeholder="(00) 00000-0000">
                        </div>

                        <div class="form-group">
                            <label for="cargo">
                                <i class="fas fa-briefcase"></i> Cargo Desejado *
                            </label>
                            <input type="text" id="cargo" name="cargo" value="<?= htmlspecialchars($candidato['cargo']) ?>" required>
                        </div>

                        <div class="form-group full-width">
                            <label for="experiencia">
                                <i class="fas fa-file-alt"></i> Experiência Profissional
                            </label>
                            <textarea id="experiencia" name="experiencia"><?= htmlspecialchars($candidato['experiencia']) ?></textarea>
                        </div>

                        <div class="form-group full-width">
                            <label for="habilidades">
                                <i class="fas fa-star"></i> Habilidades
                            </label>
                            <textarea id="habilidades" name="habilidades"><?= htmlspecialchars($candidato['habilidades']) ?></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Atualizar Candidato
                        </button>
                        <a href="dashboard.php" class="btn btn-secondary">
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

