<?php
include_once("controller.php");
?>
<div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Alterar Produto</h5>
    <div class="input-group mb-3">
        <input type="search" id="mySearch" name="mySearch" class="form-control" placeholder="Localizar" aria-label="Localizar" enterkeyhint="btsearch" aria-describedby="button-addon2">
        <button onclick="search(document.getElementById('mySearch').value)" class="btn btn-outline-secondary mouse-pointer" type="button" id="btsearch"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
    </div>
    <p><i class="fa-solid fa-user-pen"></i> Alterar</p>

    <table class="table table-striped table-hover caption-top">
        <thead>
            <tr>
                <th style="width: 15px;" scope="row">Ação</th>
                <th style="width: 15px;" scope="row">#</th>
                <th class="w-auto" scope="col">Nome</th>
            </tr>
        </thead>
        <tbody id="listx">
            <?php
            include_once "controller.php";
            $res = $tarefa->buscaTodos();
            $cont = 1;
            include_once "editar-lista.php";
            ?>
        </tbody>
    </table>
</div>
<script>
function alterar(id){
    ajaxopen('./Produtos/editar-produto', {id: id} , '#corpo');
}
</script>