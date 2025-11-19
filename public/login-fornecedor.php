<?php
session_start();

require_once __DIR__ . "/../Config/conexao.php";
require_once __DIR__ . "/../Controller/Fornecedores-Controller.php";

if (!isset($_POST['email']) || !isset($_POST['senha'])) {
    header("Location: login.php?erro=campos");
    exit;
}

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

$fornecedoresController = new FornecedoresController();

//Busca fornecedor pelo email
$fornecedor = $fornecedoresController->buscaPorEmail($email);

if (!$fornecedor) {
    header("Location: login.php?erro=email");
    exit;
}

//Busca informacoes pelo id
$fornecedorCompleto = $fornecedoresController->buscaCodigo($fornecedor['codigoFornecedor']);

// 4 — Validar senha
if (!password_verify($senha, $fornecedorCompleto->senha)) {
    header("Location: login.php?erro=senha");
    exit;
}

//Criar sessao padrao
$_SESSION['fornecedor'] = [
    'codigoFornecedor' => $fornecedorCompleto->codigoFornecedor, 
    'nomeFornecedor'   => $fornecedorCompleto->nomeFornecedor,
    'email'         => $fornecedorCompleto->email
];

//Redireciona para dashboard
header("Location: dashboard-fornecedor.php");
exit;
