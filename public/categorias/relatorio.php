<?php
include_once("controller.php");
?>
<div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Relatório de Categorias</h5>
    <div class="input-group mb-3">
        <input type="search" id="mySearch" name="mySearch" class="form-control" placeholder="Localizar" aria-label="Localizar" enterkeyhint="btsearch" aria-describedby="button-addon2">
        <button onclick="search(document.getElementById('mySearch').value)" class="btn btn-outline-secondary mouse-pointer" type="button" id="btsearch"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
    </div>

    <table class="table table-striped table-hover caption-top">
        <thead>
            <tr>
                <th style="width: 50px;" scope="row">#</th>
                <th class="w-auto" scope="col">Nome da Categoria</th>
            </tr>
        </thead>
        <tbody id="listx">
            <?php
            include_once "controller.php";
            // Chama o método buscaTodos do controller
            $res = $tarefa->buscaTodos();
            $cont = 1;
            include_once "relatorio-lista.php";
            ?>
        </tbody>
    </table>
</div>