<?php
include "../Config/config.php";
include_once(__DIR__ . "/../Controller/Produtos-Controller.php");

$usuarioLogado = null;
$tipoUsuario = null;

// Verifica sessão (cliente ou fornecedor)
if (isset($_SESSION['cliente']) && is_array($_SESSION['cliente'])) {
    $usuarioLogado = $_SESSION['cliente'];
    $tipoUsuario = 'cliente';
} elseif (isset($_SESSION['fornecedor']) && is_array($_SESSION['fornecedor'])) {
    $usuarioLogado = $_SESSION['fornecedor'];
    $tipoUsuario = 'fornecedor';
}

$logado = !empty($usuarioLogado);

// Buscar produtos
$produtosController = new ProdutosController();
$produtos = $produtosController->buscaTodos();

modDev(true);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fbccb1ecd5.js" crossorigin="anonymous"></script>
    <link href="./assets/css/index.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">

            <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="?home">
                <img src="./assets/image/icon_face.png" alt="Logo" width="35" height="35">
                E-Commerce
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <form id="formBusca" class="d-flex mx-auto my-2 my-lg-0 w-50" role="search">
                    <div class="input-group">
                        <input id="campoBusca" class="form-control border-end-0" type="search"
                            placeholder="O que você procura?">
                        <button class="btn btn-outline-secondary border-start-0" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <ul class="navbar-nav ms-auto align-items-center gap-2">

                    <li class="nav-item">
                        <a class="nav-link active" href="?home">Home</a>
                    </li>

                    <?php if ($tipoUsuario === 'fornecedor'): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Gerenciar</a>
                            <ul class="dropdown-menu shadow">
                                <li>
                                    <h6 class="dropdown-header">Produtos</h6>
                                </li>
                                <li><a class="dropdown-item mouse-click"
                                        onclick="ajaxopen('produtos/cadastro',{},'#corpo')">Cadastrar</a></li>
                                <li><a class="dropdown-item mouse-click"
                                        onclick="ajaxopen('produtos/editar',{},'#corpo')">Alterar</a></li>
                                <li><a class="dropdown-item mouse-click"
                                        onclick="ajaxopen('produtos/remover',{},'#corpo')">Remover</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <h6 class="dropdown-header">Categorias</h6>
                                </li>
                                <li><a class="dropdown-item mouse-click"
                                        onclick="ajaxopen('categorias/cadastro',{},'#corpo')">Cadastrar</a></li>
                                <li><a class="dropdown-item mouse-click"
                                        onclick="ajaxopen('categorias/relatorio',{},'#corpo')">Relatório</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link position-relative" href="?carrinho">
                            <i class="bi bi-cart3 fs-5"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-primary dropdown-toggle btn-sm ms-2" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i>
                            <?= $logado ? htmlspecialchars(strtok($usuarioLogado['nomeCliente'] ?? $usuarioLogado['nomeFornecedor'], " ")) : 'Entrar' ?>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <?php if ($logado): ?>
                                <li class="px-3 py-1"><small class="text-muted">Olá,
                                        <strong><?= $usuarioLogado['nomeCliente'] ?? $usuarioLogado['nomeFornecedor'] ?></strong></small>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <?php if ($tipoUsuario === 'cliente'): ?>
                                    <li><a class="dropdown-item" href="dashboard-cliente.php">Meu Painel</a></li>
                                    <li><a class="dropdown-item mouse-click"
                                            onclick="ajaxopen('clientes/editar-cliente',{},'#corpo')">Meus Dados</a></li>
                                <?php else: ?>
                                    <li><a class="dropdown-item" href="dashboard-fornecedor.php">Painel Fornecedor</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item text-danger" href="logout.php">Sair</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="login.php">Fazer Login</a></li>
                                <li><a class="dropdown-item" href="cadastro.php">Criar conta</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="bg-primary text-white py-4 mb-4 shadow-sm">
        <div class="container">
            <h1 class="fw-light">Bem-vindo à nossa loja!</h1>
            <p class="lead mb-0">As melhores ofertas você encontra aqui.</p>
        </div>
    </div>

    <div id="corpo" class="container flex-grow-1 mb-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-dark"><i class="bi bi-shop me-2"></i>Produtos em Destaque</h3>
        </div>

        <div class="row g-4">
            <?php foreach ($produtos as $p): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card card-produto h-100 border-0 shadow-sm">

                        <img src="uploads/produtos/<?= $p->foto ?>" class="img-produto card-img-top"
                            alt="<?= $p->nomeProduto ?>">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fs-6 fw-bold text-truncate"><?= $p->nomeProduto ?></h5>

                            <div class="mt-auto">
                                <p class="card-text fs-4 text-primary fw-bold mb-2">
                                    R$ <?= number_format($p->precoUnitario, 2, ',', '.') ?>
                                </p>
                                <a href="#" class="btn btn-primary w-100 rounded-pill">
                                    <i class="bi bi-bag-plus me-1"></i> Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-1">&copy; <?= date('Y') ?> <strong>E-Commerce</strong>. Todos os direitos reservados.</p>
            <small class="text-white-50">Versão <?= $_SESSION['version'] ?? '1.0' ?></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.7.1.js"></script>
    <script src="/assets/js/ajaxpg.js"></script>
    <script>
        $(document).ready(function() {
            //busca 
            configurarBusca('#formBusca', '#campoBusca', 'produtos/buscar.php', '#corpo');
        });
    </script>
</body>

</html>