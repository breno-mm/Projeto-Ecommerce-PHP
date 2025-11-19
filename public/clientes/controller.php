<?php
include_once(__DIR__ . "/../../Config/conexao.php");
include_once(__DIR__ . "/../../Controller/Clientes-Controller.php");

$tarefa = new ClientesController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST)) {
        $tarefa->registro( $_POST['nomeCliente'], $_POST['email'], $_POST['senha'], $_POST['CPF'], $_POST['telefoneFixo'], $_POST['telefoneCelular'], $_POST['logradouro'], $_POST['numero'], $_POST['complemento'], $_POST['bairro'], $_POST['cidade'], $_POST['estado'], $_POST['CEP']);

        print "<div class=\"alert alert-success text-center \" role=\"alert\">Cadastro realizado com sucesso!!</div>";

    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Cliente não pode ser cadastrado!!</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['id'])) {
        $tarefa->remover($dados_array['id']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Remoção realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Cliente não encontrado!!</div>";
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['codigoCliente'])) {
        $tarefa->atualiza($dados_array['codigoCliente'], $dados_array['nomeCliente'], $dados_array['CPF'], $dados_array['telefoneFixo'], $dados_array['telefoneCelular'], $dados_array['logradouro'], $dados_array['numero'], $dados_array['complemento'], $dados_array['bairro'], $dados_array['cidade'], $dados_array['estado'], $dados_array['CEP']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Ateração realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Cliente não encontrado!!</div>";
    }

}


?>