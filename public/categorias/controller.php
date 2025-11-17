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
        $tarefa->remover($dados_array['id']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Remoção realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Categoria não encontrado!!</div>";
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