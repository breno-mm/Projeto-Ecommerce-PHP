<?php
include_once("../../Config/conexao.php");
include_once("../../Controller/Pedidos-Controller.php");

$tarefa = new PedidosController();

// POST - Cadastro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)){
        $tarefa->registro($_POST['CodigoCliente'], $_POST['dataEnvio'], $_POST['dataPedido']);
        print "<div class=\"alert alert-success text-center\">Pedido criado com sucesso!!</div>";
    }
}

// DELETE - Remover
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['id'])) {
        $tarefa->remover($dados_array['id']);
        print "<div class=\"alert alert-success text-center\">Pedido removido!!</div>";
    }
}

// PUT - Atualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['codigoPedidos'])) {
        $tarefa->atualiza($dados_array['codigoPedidos'], $dados_array['CodigoCliente'], $dados_array['dataEnvio'], $dados_array['dataPedido']);
        print "<div class=\"alert alert-success text-center\">Pedido atualizado com sucesso!!</div>";
    }
}
?>