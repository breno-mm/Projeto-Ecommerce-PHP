<h5 class="card-title fw-semibold mb-4">Adicionar Item ao Pedido<h5>

<form id="formItem" method="POST">
  
  <div class="mb-3">
    <label class="form-label">Número do Pedido</label>
    <input type="number" class="form-control" name="codigoPedido" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Código do Produto</label>
    <input type="number" class="form-control" name="codigoProduto" required>
  </div>
  
  <div class="mb-3">
    <label class="form-label">Quantidade</label>
    <input type="number" class="form-control" name="quantidade" required>
  </div>

  <button type="submit" class="btn btn-primary">Adicionar</button>
</form>

<script>
  $("form#formItem").submit(function(e) {
    e.preventDefault();
    var data = new FormData(this);
    
    $.ajax({
        url: "./itensPedido/controller.php",
        type: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function(result){ $('#corpo').html(result); }
    });
});
</script>