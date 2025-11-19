<?php include_once("controller.php"); ?>
<div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Relatório de Itens Vendidos</h5>
    
    <div class="input-group mb-3">
        <input type="search" id="mySearch" class="form-control" placeholder="Localizar">
        <button onclick="search(document.getElementById('mySearch').value)" class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
    </div>

    <table class="table table-striped table-hover caption-top">
        <thead>
            <tr>
                <th>Pedido</th>
                <th>Produto</th>
                <th>Quantidade</th>
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