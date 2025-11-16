<?php
include "../Config/config.php";
modDev(true);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <!--bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fbccb1ecd5.js" crossorigin="anonymous"></script>
    
    <link href="./assets/css/index.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Header -->
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="?home">
                <img src="./assets/image/icon_face.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                E-Commerce
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?home">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Clientes
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('clientes/cadastro',{},'#corpo')">Cadastro</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('clientes/editar',{},'#corpo')">Alterar</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('clientes/remover',{},'#corpo')">Remover</a></li>
                                <li><hr class="dropdown-divider "></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('clientes/relatorio',{},'#corpo')">Relatórios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Produtos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('produtos/cadastro',{},'#corpo')">Cadastro</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('produtos/editar',{},'#corpo')">Alterar</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('produtos/remover',{},'#corpo')">Remover</a></li>
                                <li><hr class="dropdown-divider "></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('produtos/relatorio',{},'#corpo')">Relatórios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Fornecedores
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('fornecedores/cadastro',{},'#corpo')">Cadastro</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('fornecedores/editar',{},'#corpo')">Alterar</a></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('fornecedores/remover',{},'#corpo')">Remover</a></li>
                                <li><hr class="dropdown-divider "></li>
                                <li><a class="dropdown-item mouse-click" onclick="ajaxopen('fornecedores/relatorio',{},'#corpo')">Relatórios</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>   
            </div>
        </nav>
    </div>
    <!-- Body da APP -->
    <div id="corpo" class="container flex-grow-1" ></div>
    
    <!-- Footer -->
    <footer class="footer-copyright text-center text-white py-3" style="background-color: #004085;">
          © <?=$_SESSION['version']?> Copyright: <a class="text-white"  href="https://rafaellfrasson.com.br/"><?=$_SESSION['copyright']?></a>
    </footer>
    <!-- Bootstrp scrip -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!--JQuery -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.7.1.js"></script>
    <!-- func Ajax pré-configuradas -->
     <script src="./assets/js/ajaxpg.js"></script>
  </body>
</body>
</html>