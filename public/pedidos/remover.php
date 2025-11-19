<?php include_once("controller.php"); ?>
<div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Remover Pedido</h5>
    
    <div class="input-group mb-3">
        <input type="search" id="mySearch" class="form-control" placeholder="Localizar">
        <button onclick="search(document.getElementById('mySearch').value)" class="btn btn-outline-secondary" type="button"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
    </div>
    <p><i class="fa-solid fa-trash"></i> Clique na lixeira para remover</p>

    <table class="table table-striped table-hover caption-top">
        <thead>
            <tr>
                <th style="width: 15px;">Ação</th>
                <th style="width: 50px;">#ID</th>
                <th>Cliente</th>
                <th>Data</th>
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
function remover(id){
    var res = confirm('Deseja realmente excluir o pedido Nº ' + id + '?');
    if(res){
        removerAjax('pedidos/controller', {id: id} , '#corpo');
    }
}
</script>