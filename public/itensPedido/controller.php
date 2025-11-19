<?php
include_once("../../Config/conexao.php");
include_once("../../Controller/ItensPedido-Controller.php");

$tarefa = new ItensPedidoController();

// POST - Cadastro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)){
        $tarefa->registro($_POST['codigoPedido'], $_POST['codigoProduto'], $_POST['quantidade']);
        print "<div class=\"alert alert-success text-center\">Item adicionado ao pedido!</div>";
    }
}

//Remover pedido    
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    
    if (isset($dados_array['codigoPedido']) && isset($dados_array['codigoProduto'])) {
        $tarefa->remover($dados_array['codigoPedido']);
        print "<div class=\"alert alert-success text-center\">Item removido!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center\">Erro: Identificação do item inválida.</div>";
    }
}

// PUT - Atualizar Quantidade
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    
    if (isset($dados_array['codigoPedido']) && isset($dados_array['codigoProduto'])) {
        $tarefa->atualiza($dados_array['codigoPedido'], $dados_array['codigoProduto'], $dados_array['quantidade']);
        print "<div class=\"alert alert-success text-center\">Quantidade atualizada!</div>";
    }
}
?>