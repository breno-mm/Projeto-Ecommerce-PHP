<?php include_once("controller.php"); ?>
<div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Remover Item de Pedido</h5>
    
    <div class="input-group mb-3">
        <input type="search" id="mySearch" class="form-control" placeholder="Localizar">
        <button onclick="search(document.getElementById('mySearch').value)" class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
    </div>

    <table class="table table-striped table-hover caption-top">
        <thead>
            <tr>
                <th style="width: 15px;">Ação</th>
                <th>Pedido</th>
                <th>Produto</th>
                <th>Qtd</th>
            </tr>
        </thead>
        <tbody id="listx">
            <?php
            include_once "controller.php";
            $res = $tarefa->buscaTodos();
            include_once "remover-lista.php";
            ?>
        </tbody>
    </table>
</div>

<script>
// Função customizada para remover com chave composta
function removerItem(pedido, produto){
    var res = confirm('Remover o produto ' + produto + ' do pedido ' + pedido + '?');
    if(res){
        $.ajax({
            url: 'itensPedido/controller.php',
            type: 'DELETE',
            data: { codigoPedido: pedido, codigoProduto: produto }, // Envia os dois IDs
            success: function(result) {
                $('#corpo').html(result);
            }
        });
    }
}
</script>