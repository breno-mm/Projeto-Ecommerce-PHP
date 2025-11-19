<?php
include_once("../../Config/conexao.php");
include_once("../../Controller/Categorias-Controller.php");

$tarefa = new CategoriasController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST)) {
        $tarefa->registro($_POST['nomeCategoria']);

        print "<div class=\"alert alert-success text-center \" role=\"alert\">Cadastro realizado com sucesso!!</div>";

    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Categoria não pode ser cadastrado!!</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    
    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    
    if (isset($dados_array['id'])) {
        $status = $tarefa->remover($dados_array['id']);

        if ($status == "vinculado") {
            // Mensagem de ERRO
            print "<div class=\"alert alert-warning text-center\" role=\"alert\"><i class=\"fa-solid fa-triangle-exclamation\"></i> Não é possível excluir! Existem produtos vinculados a esta categoria.</div>";
        } else {
            // Mensagem de SUCESSO
            print "<div class=\"alert alert-success text-center\" role=\"alert\">Remoção realizada com sucesso!!</div>";
        }

    } else {
        print "<div class=\"alert alert-danger text-center\" role=\"alert\">Categoria não encontrada!!</div>";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['codigoCategoria'])) {
        $tarefa->atualiza($dados_array['codigoCategoria'], $dados_array['nomeCategoria']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Ateração realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Categoria não encontrado!!</div>";
    }

}


?>