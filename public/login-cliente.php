<?php
session_start();

require_once __DIR__ . "/../Config/conexao.php";
require_once __DIR__ . "/../Controller/Clientes-Controller.php";

if (!isset($_POST['email']) || !isset($_POST['senha'])) {
    header("Location: login.php?erro=campos");
    exit;
}

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

$clientesController = new ClientesController();

//Busca cliente pelo email
$cliente = $clientesController->buscaPorEmail($email);

if (!$cliente) {
    header("Location: login.php?erro=email");
    exit;
}

//Busca informacoes pelo id
$clienteCompleto = $clientesController->buscaCodigo($cliente['codigoCliente']);

// 4 — Validar senha
if (!password_verify($senha, $clienteCompleto->senha)) {
    header("Location: login.php?erro=senha");
    exit;
}

//Criar sessao padrao
$_SESSION['cliente'] = [
    'codigoCliente' => $clienteCompleto->codigoCliente, 
    'nomeCliente'   => $clienteCompleto->nomeCliente,
    'email'         => $clienteCompleto->email
];

//Redireciona para dashboard
header("Location: dashboard-cliente.php");
exit;
