<?php
include_once("../../Config/conexao.php");
include_once("../../Controller/Produtos-Controller.php");

$tarefa = new ProdutosController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Upload de imagem
    $nomeArquivo = null;

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {

        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . "." . $ext;

        //Local onde imagem fica salvo
        $destino = __DIR__ . "/../../public/uploads/produtos/" . $nomeArquivo;

        //move arquivo
        move_uploaded_file($_FILES['foto']['tmp_name'], $destino);
    }

    if (!empty($_POST)) {
        $tarefa->registro(
            $_POST['nomeProduto'],
            $_POST['codigoFornecedor'],
            $nomeArquivo,
            $_POST['codigoUnidade'],
            $_POST['precoUnitario'],
            $_POST['codigoCategoria']
        );

        print "<div class=\"alert alert-success text-center \" role=\"alert\">Cadastro realizado com sucesso!!</div>";

    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Produto não pode ser cadastrado!!</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['id'])) {
        $tarefa->remover($dados_array['id']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Remoção realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Produto não encontrado!!</div>";
    }

}


if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $dados_brutos = file_get_contents('php://input');
    parse_str($dados_brutos, $dados_array);
    if (isset($dados_array['codigoPorduto'])) {
        $tarefa->atualiza($dados_array['codigoPorduto'], $dados_array['nomeProduto'], $dados_array['codigoFornecedor'], $dados_array['foto'], $dados_array['codigoUnidade'], $dados_array['precoUnitario'], $dados_array['codigoCategoria']);
        print "<div class=\"alert alert-success text-center \" role=\"alert\">Ateração realizada com sucesso!!</div>";
    } else {
        print "<div class=\"alert alert-danger text-center \" role=\"alert\">Cliente não encontrado!!</div>";
    }

}

?>