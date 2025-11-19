<?php include_once("controller.php"); ?>
<div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Relatório de Pedidos</h5>
    
    <div class="input-group mb-3">
        <input type="search" id="mySearch" class="form-control" placeholder="Localizar" aria-label="Localizar">
        <button onclick="search(document.getElementById('mySearch').value)" class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
    </div>

    <table class="table table-striped table-hover caption-top">
        <thead>
            <tr>
                <th style="width: 50px;" scope="row">#ID</th>
                <th scope="col">Cód. Cliente</th>
                <th scope="col">Data Pedido</th>
                <th scope="col">Data Envio</th>
            </tr>
        </thead>
        <tbody id="listx">
            <?php
            include_once "controller.php";
            $res = $tarefa->buscaTodos();
            include_once "relatorio-lista.php";
            ?>
        </tbody>
    </table>
</div>