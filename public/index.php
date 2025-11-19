<?php
include "../Config/config.php";
include_once(__DIR__ . "/../Controller/Produtos-Controller.php");

$usuarioLogado = null;
$tipoUsuario = null;

//Identeifica se e cliente ou forncedor na sessao
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
    <!--bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fbccb1ecd5.js" crossorigin="anonymous"></script>

    <link href="./assets/CSS/index.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Header -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 px-5">
            <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 w-100">
                <div class="container-fluid">

                    <!-- LOGO -->
                    <a class="navbar-brand fw-bold" href="?home">
                        <img src="./assets/image/icon_face.png" alt="Logo" width="35" height="35"
                            class="d-inline-block align-text-top">
                        E-Commerce
                    </a>

                    <!-- Mobile button -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- MENU INTERNO -->
                    <div class="collapse navbar-collapse" id="navbarNav">

                        <!-- CAMPO DE BUSCA -->
                        <form class="d-flex mx-auto w-50" role="search" action="?buscar" method="GET">
                            <input class="form-control me-2" type="search" name="q" placeholder="Buscar produtos..."
                                aria-label="Search">
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>

                        <!-- MENUS À DIREITA -->
                        <ul class="navbar-nav ms-auto">

                            <!-- HOME -->
                            <li class="nav-item">
                                <a class="nav-link active" href="?home">Home</a>
                            </li>

                            <!-- PRODUTOS -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Produtos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item mouse-click"
                                            onclick="ajaxopen('produtos/cadastro',{},'#corpo')">Cadastro</a></li>
                                    <li><a class="dropdown-item mouse-click"
                                            onclick="ajaxopen('produtos/editar',{},'#corpo')">Alterar</a></li>
                                    <li><a class="dropdown-item mouse-click"
                                            onclick="ajaxopen('produtos/remover',{},'#corpo')">Remover</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item mouse-click"
                                            onclick="ajaxopen('produtos/relatorio',{},'#corpo')">Relatórios</a></li>
                                </ul>
                            </li>

                            <!-- CATEGORIAS -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Categorias
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item mouse-click"
                                            onclick="ajaxopen('categorias/cadastro',{},'#corpo')">Cadastro</a></li>
                                    <li><a class="dropdown-item mouse-click"
                                            onclick="ajaxopen('categorias/editar',{},'#corpo')">Alterar</a></li>
                                    <li><a class="dropdown-item mouse-click"
                                            onclick="ajaxopen('categorias/remover',{},'#corpo')">Remover</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item mouse-click"
                                            onclick="ajaxopen('categorias/relatorio',{},'#corpo')">Relatórios</a></li>
                                </ul>
                            </li>

                            <!-- CARRINHO -->
                            <li class="nav-item">
                                <a class="nav-link" href="?carrinho">
                                    <i class="bi bi-cart3"></i> Carrinho
                                </a>
                            </li>

                            <!-- LOGIN -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="loginMenu" role="button"
                                    data-bs-toggle="dropdown">
                                    <?php if ($logado): ?>
                                        <?= htmlspecialchars($usuarioLogado['nomeCliente'] ?? $usuarioLogado['nomeFornecedor']); ?>
                                    <?php else: ?>
                                        Login
                                    <?php endif; ?>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">
                                    <?php if ($logado): ?>
                                        <li><span class="dropdown-item-text text-muted">
                                                Logado como<br><strong>
                                                    <?= htmlspecialchars($usuarioLogado['nomeCliente'] ?? $usuarioLogado['nomeFornecedor']); ?>
                                                </strong>
                                            </span></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <?php if ($tipoUsuario === 'cliente'): ?>
                                            <li><a class="dropdown-item" href="dashboard-cliente.php">Dashboard</a></li>
                                        <?php else: ?>
                                            <li><a class="dropdown-item" href="dashboard-fornecedor.php">Dashboard</a></li>
                                            <li><a class="dropdown-item mouse-click" onclick="ajaxopen('Produtos/relatorio',{},'#corpo')">Meus Produtos</a></li>
                                        <?php endif; ?>
                                        <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                                    <?php else: ?>
                                        <li><a class="dropdown-item" href="login.php">Acessar conta</a></li>
                                        <li><a class="dropdown-item" href="cadastro.php">Criar conta</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

    </div>

    <!-- Body da APP -->
    <div id="corpo" class="container flex-grow-1">
        <div class="container my-5">
            <h2 class="mb-4">Produtos</h2>

            <div class="row g-4">

                <?php foreach ($produtos as $p): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card shadow-sm h-100">

                            <!-- FOTO -->
                            <img src="uploads/produtos/<?= $p->foto ?>" class="card-img-top card-img-fixed"
                                alt="<?= $p->nomeProduto ?>">

                            <div class="card-body d-flex flex-column">

                                <!-- NOME -->
                                <h5 class="card-title"><?= $p->nomeProduto ?></h5>

                                <!-- PREÇO -->
                                <p class="card-text fs-5 text-success fw-bold">
                                    R$ <?= number_format($p->precoUnitario, 2, ',', '.') ?>
                                </p>

                                <!-- BOTÃO VER MAIS -->
                                <a href="#" class="btn btn-primary mt-auto">
                                    Ver mais
                                </a>

                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

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
</body>

</html>