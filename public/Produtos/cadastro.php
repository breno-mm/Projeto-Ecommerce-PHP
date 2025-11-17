<?php
//Para buscar fornecedores
include_once("../../Config/conexao.php");
include_once("../../Controller/Fornecedores-Controller.php");

$fornecedoresController = new FornecedoresController();
$fornecedores = $fornecedoresController->buscaTodos();
?>

<h5 class="card-title fw-semibold mb-4">Cadastro de Produto<h5>

<form id="formCliente" method="POST" enctype="multipart/form-data">
  
  <div class="mb-3">
    <label for="nomeProduto" class="form-label">Nome</label>
    <input type="input" class="form-control" id="nomeProduto" name="nomeProduto" aria-describedby="nomeAjuda" required>
    <div id="nomeAjuda" class="form-text">Informe o nome do produto.</div>
  </div>

  
  <div class="mb-3">
    <label for="nomeFornecedor" class="form-label">Fornecedor</label>
    <select name="codigoFornecedor" id="nomeFornecedor" class="form-control" required>
    <option value="">Selecione um fornecedor</option>

    <?php foreach ($fornecedores as $f): ?>
      <option value="<?= $f->codigoFornecedor ?>">
          <?= $f->nomeFornecedor ?>
      </option>
    <?php endforeach; ?>
    </select>
    <div id="nomeFornecedorAjuda" class="form-text">Selecione o fornecedor.</div>
  </div>
  
  <div class="mb-3">
    <label for="telefoneFixo" class="form-label">Foto do produto:</label>
    <input type="file" name="foto" id="foto" accept="image/*" class="form-control" required>
    <div id="telefoneFixoAjuda" class="form-text">Selecione uma foto do produto.</div>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<script>
  $("form#formCliente").submit(function(e) {
    
    e.preventDefault();
    
    var data = new FormData(this);
    
    $.ajax({
        url: "./Produtos/controller.php",
        type: "POST",
        data: data,
        mimeType: "multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function () {
                //Aqui adicionas o loader
                $('#corpo').html("<div class=\"text-center\"><div class=\"spinner-border\" role=\"status\"></div><div class=\"spinner-grow text-danger\" role=\"status\"></div></div>");
        },
        success: function(result){        
            $('#corpo').html(result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#corpo').html(textStatus + errorThrown);
        }
    });
});
</script>