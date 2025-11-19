<?php
include_once("controller.php");
echo "<h5 class=\"card-title fw-semibold mb-4\">Editar Pedido #".$_GET['id']."<h5>";
$dados = $tarefa->buscaCodigo($_GET['id']);
?>

<form id="formPedidoEdit">
  <input type="hidden" name="codigoPedidos" value="<?=$dados->codigoPedidos?>">
  
  <div class="mb-3">
    <label class="form-label">Código do Cliente</label>
    <input type="number" class="form-control" name="CodigoCliente" value="<?=$dados->CodigoCliente?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Data do Pedido</label>
    <input type="date" class="form-control" name="dataPedido" value="<?=$dados->dataPedido?>">
  </div>

  <div class="mb-3">
    <label class="form-label">Data de Envio</label>
    <input type="date" class="form-control" name="dataEnvio" value="<?=$dados->dataEnvio?>">
  </div>

  <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<script>
  $("form#formPedidoEdit").submit(function(e) {
    e.preventDefault();
    var dados_serializados = $(this).serialize();
    $.ajax({
        url: "./pedidos/controller.php",
        type: "PUT",
        data: dados_serializados,
        beforeSend: function () { $('#corpo').html("<div class=\"text-center\"><div class=\"spinner-border\"></div></div>"); },
        success: function(result){ $('#corpo').html(result); }
    });
});
</script>