<?php
session_start();
include_once("controller.php");

if (!isset($_SESSION['fornecedor'])) {
    header("Location: ../login.php?erro=nao-autorizado");
    exit;
}

$codigoFornecedor = $_SESSION['fornecedor']['codigoFornecedor'];
$res = $tarefa->buscaPorFornecedor($codigoFornecedor);
$cont = 1;
?>
<div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Relatório de Produtos</h5>
    <div class="input-group mb-3">
        <input type="search" id="mySearch" name="mySearch" class="form-control" placeholder="Localizar" aria-label="Localizar">
        <button onclick="search(document.getElementById('mySearch').value)" class="btn btn-outline-secondary mouse-pointer" type="button" id="btsearch">
            <i class="fa-solid fa-magnifying-glass-plus"></i>
        </button>
    </div>

    <table class="table table-striped table-hover caption-top">
        <thead>
            <tr>
                <th style="width: 15px;" scope="row">#</th>
                <th class="w-auto" scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Foto</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody id="listx">
            <?php include_once "relatorio-lista.php"; ?>
        </tbody>
    </table>
</div>
