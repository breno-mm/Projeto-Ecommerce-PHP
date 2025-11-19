<?php
//Config da sessao
session_set_cookie_params(0, '/');
session_start();

if (file_exists("../Config/config.php")) {
    include "../Config/config.php";
}

require_once __DIR__ . "/../Controller/Produtos-Controller.php";

//Autenticacao do user
$usuarioLogado = null;
$tipoUsuario = null;

if (isset($_SESSION['cliente']) && is_array($_SESSION['cliente'])) {
    $usuarioLogado = $_SESSION['cliente'];
    $tipoUsuario = 'cliente';
} elseif (isset($_SESSION['fornecedor']) && is_array($_SESSION['fornecedor'])) {
    $usuarioLogado = $_SESSION['fornecedor'];
    $tipoUsuario = 'fornecedor';
}
$logado = !empty($usuarioLogado);


$produtosController = new ProdutosController();

//Roteamento do carrinho
$paginaCarrinho = isset($_GET['carrinho']);
$produtos = [];

if (!$paginaCarrinho) {
    // Se a pagina for a home busca os produtos para exibir
    $produtos = $produtosController->buscaTodos();
}
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
    <link href="./assets/CSS/index.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="?home">
                <img src="./assets/image/icon_face.png" alt="Logo" width="35" height="35" class="me-2" onerror="this.style.display='none'">
                E-Commerce
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                
                <?php if (!$paginaCarrinho): ?>
                <form id="formBusca" class="d-flex mx-auto my-2 my-lg-0 w-50">
                    <div class="input-group">
                        <input id="campoBusca" class="form-control border-end-0" type="search" placeholder="O que você procura?">
                        <button class="btn btn-outline-secondary border-start-0" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
                <?php else: ?>
                <div class="mx-auto w-50"></div>
                <?php endif; ?>

                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item"><a class="nav-link" href="?home">Home</a></li>

                    <?php if ($tipoUsuario === 'fornecedor'): ?>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Produtos</a>
                            <ul class="dropdown-menu shadow">
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('produtos/cadastro',{},'#corpo')">Cadastrar</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('produtos/editar',{},'#corpo')">Alterar</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('produtos/remover',{},'#corpo')">Remover</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('produtos/relatorio',{},'#corpo')">Relatório</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Categorias</a>
                            <ul class="dropdown-menu shadow">
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('categorias/cadastro',{},'#corpo')">Cadastrar</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('categorias/editar',{},'#corpo')">Alterar</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('categorias/remover',{},'#corpo')">Remover</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('categorias/relatorio',{},'#corpo')">Relatório</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Unidades</a>
                            <ul class="dropdown-menu shadow">
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('unidades/cadastro',{},'#corpo')">Cadastrar</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('unidades/editar',{},'#corpo')">Alterar</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('unidades/remover',{},'#corpo')">Remover</a></li>
                            </ul>
                        </li>

                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="?carrinho">
                            <i class="bi bi-cart3 fs-5"></i>
                            <?php 
                                $qtdItens = isset($_SESSION['carrinho']) ? array_sum($_SESSION['carrinho']) : 0;
                                if($qtdItens > 0): 
                            ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $qtdItens ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-primary dropdown-toggle btn-sm ms-2" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i>
                            <?= $logado ? htmlspecialchars(strtok($usuarioLogado['nomeCliente'] ?? $usuarioLogado['nomeFornecedor'], " ")) : 'Entrar' ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <?php if ($logado): ?>
                                <li><span class="dropdown-item-text text-muted small">Logado como <br><strong><?= $usuarioLogado['nomeCliente'] ?? $usuarioLogado['nomeFornecedor'] ?></strong></span></li>
                                <li><hr class="dropdown-divider"></li>
                                
                                <?php if ($tipoUsuario === 'cliente'): ?>
                                    <li><a class="dropdown-item" href="dashboard-cliente.php">Meu Painel</a></li>
                                    <li><a class="dropdown-item mouse-click" onclick="ajaxopen('clientes/editar-cliente',{},'#corpo')">Meus Dados</a></li>
                                <?php else: ?>
                                    <li><a class="dropdown-item" href="dashboard-fornecedor.php">Painel Geral</a></li>
                                    <li><a class="dropdown-item mouse-click" onclick="ajaxopen('pedidos/relatorio',{},'#corpo')">Ver Pedidos</a></li>
                                <?php endif; ?>
                                
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Sair</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><a class="dropdown-item" href="cadastro.php">Cadastrar-se</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="corpo" class="container mt-4 mb-5">
        
        <?php if ($paginaCarrinho): ?>
            <?php include "carrinho/carrinho.php"; ?>
        
        <?php else: ?>
            <div class="bg-primary text-white p-4 rounded-3 mb-4 shadow-sm">
                <h1 class="fw-light">Bem-vindo!</h1>
                <p class="lead mb-0">Confira nossas ofertas especiais.</p>
            </div>

            <h3 class="fw-bold text-dark mb-4"><i class="bi bi-shop me-2"></i>Produtos em Destaque</h3>
            
            <div class="row g-4">
                <?php foreach ($produtos as $p): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card card-produto h-100 border-0 shadow-sm">
                        <img src="uploads/produtos/<?= $p->foto ?>" class="img-produto card-img-top" alt="<?= $p->nomeProduto ?>" onerror="this.src='assets/image/sem-foto.png'">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fs-6 fw-bold text-truncate"><?= $p->nomeProduto ?></h5>
                            <div class="mt-auto">
                                <p class="card-text fs-4 text-primary fw-bold mb-2">R$ <?= number_format($p->precoUnitario, 2, ',', '.') ?></p>
                                <button onclick="adicionarAoCarrinho(<?= $p->codigoProduto ?>)" class="btn btn-primary w-100 rounded-pill">
                                    <i class="bi bi-bag-plus me-1"></i> Comprar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; <?= date('Y') ?> E-Commerce. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.7.1.js"></script>
    <script src="./assets/js/ajaxpg.js?v=<?= time() ?>"></script>

    <script>
        $(document).ready(function() {
            if($('#formBusca').length){
                configurarBusca('#formBusca', '#campoBusca', 'produtos/buscar.php', '#corpo');
            }
        });
    </script>
</body>
</html>