<?php
//Para buscar fornecedores
include_once("../../Config/conexao.php");
include_once("../../Controller/Fornecedores-Controller.php");
include_once("../../Controller/Unidades-Controller.php");
include_once("../../Controller/Categorias-Controller.php");

$unidadesController = new UnidadesController();
$unidades = $unidadesController->buscaTodos();

$categoriasController = new CategoriasController();
$categorias = $categoriasController->buscaTodos();

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

  <div class="mb-3">
    <label for="descricaoUnidade" class="form-label">Selecione a unidade</label>
    <select name="codigoUnidade" id="codigoUnidade" class="form-control" required>
    <option value="">Selecione uma unidade</option>

    <?php foreach ($unidades as $u): ?>
      <option value="<?= $u->codigoUnidade ?>">
          <?= $u->descricaoUnidade ?>
      </option>
    <?php endforeach; ?>
    </select>
    <div id="nomeFornecedorAjuda" class="form-text">Selecione a unidade do produto.</div>
  </div>

  <div class="mb-3">
    <label for="nomeCategoria" class="form-label">Selecione a categoria</label>
    <select name="codigoCategoria" id="codigoCategoria" class="form-control" required>
    <option value="">Selecione a categoria</option>

    <?php foreach ($categorias as $c): ?>
      <option value="<?= $c->codigoCategoria ?>">
          <?= $c->nomeCategoria ?>
      </option>
    <?php endforeach; ?>
    </select>
    <div id="nomeFornecedorAjuda" class="form-text">Selecione a unidade do produto.</div>
  </div>

  <div class="mb-3">
    <label for="precoUnitario" class="form-label">Preço do produto</label>
    <input type="number" class="form-control" id="precoUnitario" name="precoUnitario" step="0.01" min="0" aria-describedby="precoAjuda" required>
    <div id="precoAjuda" class="form-text">Informe o preço do produto.</div>
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