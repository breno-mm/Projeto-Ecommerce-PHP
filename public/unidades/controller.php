<?php
include_once("../../Config/conexao.php");
include_once("../../Controller/Unidades-Controller.php");

$tarefa = new UnidadesController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST)) {
        $tarefa->registro($_POST['descricaoUnidade']);

        print "<div class=\"alert alert-success text-center \" role=\"alert\">Cadastro realizado com sucesso!!</div>";

    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Unidade não pode ser cadastrado!!</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['id'])) {
        $tarefa->remover($dados_array['id']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Remoção realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Unidade não encontrado!!</div>";
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['codigoUnidade'])) {
        $tarefa->atualiza($dados_array['codigoUnidade'], $dados_array['descricaoUnidade']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Ateração realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Unidade não encontrado!!</div>";
    }

}


?>