<?php
include_once(__DIR__ . "/../../../Config/conexao.php");
include_once(__DIR__ . "/../../../Controller/Fornecedores-Controller.php");

$nomeFornecedor = $_POST['nomeFornecedor'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$CNPJ = $_POST['CNPJ'] ?? null;

$fornecedoresController = new FornecedoresController();

//Verifica se email ja existe
$fornecedorExistente = $fornecedoresController->buscaPorEmail($email);

if ($fornecedorExistente) {
    header("Location: ../refornecedor.php?erro=email");
    exit;
}

//Cadastra
$fornecedoresController->registro(
    $nomeFornecedor,
    $CNPJ,
    $email,
    $senha,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null
);

header("Location: ../../../login.php?sucesso=1");
exit;
