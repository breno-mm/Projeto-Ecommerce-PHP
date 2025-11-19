<?php
session_start();

// 1. Verifica se usuário está logado
if (!isset($_SESSION['fornecedor'])) {
    header("Location: login.php?erro=nao-autorizado");
    exit;
}

require_once __DIR__ . '/../Config/conexao.php';
require_once __DIR__ . '/../Controller/Fornecedores-Controller.php';

// Busca os dados completos no banco
$codigoSession = $_SESSION['fornecedor']['codigoFornecedor'];
$controller = new FornecedoresController();
$fornecedor = $controller->buscaCodigo($codigoSession);

// Caso fornecedor não esteja logado
if (!$fornecedor) {
    session_destroy();
    header("Location: login.php?erro=usuario-nao-encontrado");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard do Fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand"><i class="bi bi-speedometer2"></i> Minha Conta</span>
            <div class="d-flex align-items-center">
                <span class="text-white me-3 d-none d-md-block">Olá,
                    <?= htmlspecialchars($fornecedor->nomeFornecedor) ?></span>
                <a href="logout.php" class="btn btn-sm btn-outline-light">Sair</a>
            </div>
        </div>
    </nav>

    <div class="container min-vh-100 ">
        <div class="row">
            <!-- Coluna lateral -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-bold">Acesso Rápido</div>
                    <div class="list-group list-group-flush">
                        <a href="index.php" class="list-group-item list-group-item-action">
                            <i class="bi bi-shop"></i> Ir para a Loja
                        </a>
                        <a href="#" id="btnEditarMeusDados" class="list-group-item list-group-item-action">
                            <i class="bi bi-person-gear"></i> Editar Meus Dados
                        </a>
                    </div>
                </div>
            </div>

            <!-- Coluna principal -->
            <div class="col-md-8">
                <div class="alert alert-success shadow-sm border-0">
                    <h4 class="alert-heading">Bem-vindo(a) de volta!</h4>
                    <p class="mb-0">Este é o seu painel administrativo. Mantenha seus dados sempre atualizados.</p>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white fw-bold">
                        <i class="bi bi-person-vcard"></i> Dados da Empresa
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small">Nome Fantasia</label>
                                <div class="fw-bold"><?= htmlspecialchars($fornecedor->nomeFornecedor) ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small">CNPJ</label>
                                <div class="fw-bold"><?= htmlspecialchars($fornecedor->CNPJ) ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-muted small">E-mail</label>
                                <div><?= htmlspecialchars($fornecedor->email) ?></div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="text-muted small">Telefone Comercial</label>
                                <div><?= htmlspecialchars($fornecedor->telefoneComercial ?? '-') ?></div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="text-muted small">Celular</label>
                                <div><?= htmlspecialchars($fornecedor->telefoneCelular ?? '-') ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-bold">
                        <i class="bi bi-box-seam"></i> Meus Produtos
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Aqui você poderá gerenciar os produtos cadastrados.</p>
                        <div id="corpo" class="container flex-grow-1"></div>
                        <a href="../produtos/cadastro.php" class="btn btn-primary">Cadastrar novo produto</a>
                        <a class="btn btn-secondary mouse-click" onclick="ajaxopen('produtos/produto-fornecedor',{},'#corpo')">Ver todos os produtos</a>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>

    <div id="areaEdicao"></div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $('#btnEditarMeusDados').click(function (e) {
            e.preventDefault();
            window.location.href = 'fornecedores/editar-fornecedor.php';
        });
    </script>

    <!-- Footer -->
    <footer class="footer-copyright text-center text-white py-3" style="background-color: #004085;">
        © <?= $_SESSION['version'] ?> Copyright: <a class="text-white"
            href="https://rafaellfrasson.com.br/"><?= $_SESSION['copyright'] ?></a>
    </footer>
    <!-- Bootstrp scrip -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <!--JQuery -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.7.1.js"></script>
    <!-- func Ajax pré-configuradas -->
    <script src="./assets/js/ajaxpg.js"></script>

</body>

</html>