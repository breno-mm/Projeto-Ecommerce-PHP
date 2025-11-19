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
        $status = $tarefa->remover($dados_array['id']); // Recebe o status do service

        if ($status == "vinculado") {
            print "<div class=\"alert alert-warning text-center\" role=\"alert\"><i class=\"fa-solid fa-triangle-exclamation\"></i> Não é possível excluir! Existem produtos usando esta unidade.</div>";
        } else {
            print "<div class=\"alert alert-success text-center\" role=\"alert\">Unidade removida com sucesso!!</div>";
        }
    } else {
        print "<div class=\"alert alert-danger text-center\" role=\"alert\">Unidade não encontrada!!</div>";
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