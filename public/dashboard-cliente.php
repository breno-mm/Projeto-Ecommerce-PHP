<?php
session_start();

// 1. Verifica se usuario esta logado
if (!isset($_SESSION['cliente'])) {
    header("Location: login.php?erro=nao-autorizado");
    exit;
}

require_once __DIR__ . '/../Config/conexao.php';
require_once __DIR__ . '/../Controller/Clientes-Controller.php';

//Busca os dados completos no banco
$codigoSession = $_SESSION['cliente']['codigoCliente'];
$controller = new ClientesController();
$cliente = $controller->buscaCodigo($codigoSession);

//caso cliente nao esteja logado
if (!$cliente) {
    session_destroy();
    header("Location: login.php?erro=usuario-nao-encontrado");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard do Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <span class="navbar-brand"><i class="bi bi-speedometer2"></i> Minha Conta</span>
        <div class="d-flex align-items-center">
            <span class="text-white me-3 d-none d-md-block">Olá, <?= htmlspecialchars($cliente->nomeCliente) ?></span>
            <a href="logout.php" class="btn btn-sm btn-outline-light">Sair</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
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
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="bi bi-box-seam"></i> Meus Pedidos (Em breve)
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="alert alert-success shadow-sm border-0">
                <h4 class="alert-heading">Bem-vindo(a) de volta!</h4>
                <p class="mb-0">Este é o seu painel administrativo. Mantenha seus dados sempre atualizados.</p>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">
                    <i class="bi bi-person-vcard"></i> Dados Pessoais
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Nome Completo</label>
                            <div class="fw-bold"><?= htmlspecialchars($cliente->nomeCliente) ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">CPF</label>
                            <div class="fw-bold"><?= htmlspecialchars($cliente->CPF) ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">E-mail</label>
                            <div><?= htmlspecialchars($cliente->email) ?></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="text-muted small">Celular</label>
                            <div><?= htmlspecialchars($cliente->telefoneCelular) ?></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="text-muted small">Telefone Fixo</label>
                            <div><?= htmlspecialchars($cliente->telefoneFixo ?? '-') ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">
                    <i class="bi bi-geo-alt"></i> Endereço de Entrega
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label class="text-muted small">Logradouro</label>
                            <div><?= htmlspecialchars($cliente->logradouro) ?>, Nº <?= htmlspecialchars($cliente->numero) ?></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="text-muted small">CEP</label>
                            <div><?= htmlspecialchars($cliente->CEP) ?></div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Bairro</label>
                            <div><?= htmlspecialchars($cliente->bairro) ?></div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Cidade/UF</label>
                            <div><?= htmlspecialchars($cliente->cidade) ?> / <?= htmlspecialchars($cliente->estado) ?></div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="text-muted small">Complemento</label>
                            <div><?= htmlspecialchars($cliente->complemento ?? '-') ?></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div id="areaEdicao"></div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $('#btnEditarMeusDados').click(function(e){
        e.preventDefault();
        //redireciona para editar
        window.location.href = 'clientes/editar-cliente.php',{},'#corpo';
    });
</script>

</body>
</html>