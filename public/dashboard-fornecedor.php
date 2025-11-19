<?php
session_start();

// Verifica se usuario esta logado
if (!isset($_SESSION['fornecedor'])) {
    header("Location: login.php?erro=nao-autorizado");
    exit;
}

//dados da sessao
$nome = $_SESSION['fornecedor']['nomeFornecedor'];
$email = $_SESSION['fornecedor']['email'];
$codigo = $_SESSION['fornecedor']['codigoFornecedor'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard do Fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand">Dashboard do Fornecedor</span>
            <div>
                <a href="logout.php" class="btn btn-outline-light">Sair</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">

        <div class="alert alert-success">
            Bem-vindo(a), <strong><?= htmlspecialchars($nome) ?></strong>!
        </div>

        <div class="card shadow">
            <div class="card-body">
                <h4 class="mb-3">Seus dados</h4>
                <p><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>

                <hr>

                <p class="text-muted">Aqui você poderá ver seus produtos, atualizar dados, etc.</p>

                <a href="index.php" class="btn btn-secondary mt-2">Pagina inicial</a>
            </div>
        </div>
    </div>

</body>

</html>