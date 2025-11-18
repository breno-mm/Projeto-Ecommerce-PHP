<?php
include_once(__DIR__ . "/../../../Config/conexao.php");
include_once(__DIR__ . "/../../../Controller/Clientes-Controller.php");

$nomeCliente = $_POST['nomeCliente'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$clientesController = new ClientesController();

//Verifica se email já existe
$clienteExistente = $clientesController->buscaPorEmail($email);

if ($clienteExistente) {
    header("Location: ../recliente.php?erro=email");
    exit;
}

//Cadastra
$clientesController->registro(
    $nomeCliente,
    $email,
    $senha,
    null, null, null, null, 
    null, null, null, null, null, null
);

header("Location: ../../../login.php?sucesso=1");
exit;
