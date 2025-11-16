<?php
include_once("../../Config/conexao.php");
include_once("../../Controller/Fornecedores-Controller.php");

$tarefa = new FornecedoresController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST)) {
        $tarefa->registro(
            $_POST['nomeFornecedor'], 
            $_POST['CNPJ'], 
            $_POST['fax'], 
            $_POST['telefoneFixo'], 
            $_POST['telefoneCelular'], 
            $_POST['site'], 
            $_POST['logradouro'], 
            $_POST['numero'], 
            $_POST['complemento'], 
            $_POST['bairro'], 
            $_POST['cidade'], 
            $_POST['estado'], 
            $_POST['CEP']);

        print "<div class=\"alert alert-success text-center \" role=\"alert\">Cadastro realizado com sucesso!!</div>";

    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Fornecedor não pode ser cadastrado!!</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['id'])) {
        $tarefa->remover($dados_array['id']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Remoção realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Fornecedor não encontrado!!</div>";
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['codigoPorduto'])) {
        $tarefa->atualiza($dados_array['codigoPorduto'], $dados_array['nomeFornecedor'], $dados_array['CNPJ'], $dados_array['fax'], $dados_array['telefoneFixo'], $dados_array['telefoneCelular'], $dados_array['site'], $dados_array['logradouro'], $dados_array['numero'], $dados_array['complemento'], $dados_array['bairro'], $dados_array['cidade'], $dados_array['estado'], $dados_array['CEP']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Ateração realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Fornecedor não encontrado!!</div>";
    }

}

?>