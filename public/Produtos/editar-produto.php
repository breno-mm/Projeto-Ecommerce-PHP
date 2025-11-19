<?php
include_once("controller.php");

// Buscar listas para os selects
include_once("../../Controller/Fornecedores-Controller.php");
include_once("../../Controller/Unidades-Controller.php");
include_once("../../Controller/Categorias-Controller.php");

$fornecedoresController = new FornecedoresController();
$fornecedores = $fornecedoresController->buscaTodos();

$unidadesController = new UnidadesController();
$unidades = $unidadesController->buscaTodos();

$categoriasController = new CategoriasController();
$categorias = $categoriasController->buscaTodos();

// Buscar produto
$dados = $tarefa->buscaCodigo($_GET['id']);
?>

<h5 class="card-title fw-semibold mb-4">Alterar produto</h5>

<form id="formProduto" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="codigoProduto" value="<?= $dados->codigoProduto ?>">

  <div class="mb-3">
    <label for="nomeProduto" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" value="<?= htmlspecialchars($dados->nomeProduto) ?>" required>
  </div>

  <div class="mb-3">
    <label for="codigoFornecedor" class="form-label">Fornecedor</label>
    <select name="codigoFornecedor" id="codigoFornecedor" class="form-control" required>
      <option value="">Selecione um fornecedor</option>
      <?php foreach ($fornecedores as $f): ?>
        <option value="<?= $f->codigoFornecedor ?>" <?= ($dados->codigoFornecedor == $f->codigoFornecedor) ? 'selected' : '' ?>>
          <?= htmlspecialchars($f->nomeFornecedor) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="codigoUnidade" class="form-label">Unidade</label>
    <select name="codigoUnidade" id="codigoUnidade" class="form-control" required>
      <option value="">Selecione uma unidade</option>
      <?php foreach ($unidades as $u): ?>
        <option value="<?= $u->codigoUnidade ?>" <?= ($dados->codigoUnidade == $u->codigoUnidade) ? 'selected' : '' ?>>
          <?= htmlspecialchars($u->descricaoUnidade) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="codigoCategoria" class="form-label">Categoria</label>
    <select name="codigoCategoria" id="codigoCategoria" class="form-control" required>
      <option value="">Selecione a categoria</option>
      <?php foreach ($categorias as $c): ?>
        <option value="<?= $c->codigoCategoria ?>" <?= ($dados->codigoCategoria == $c->codigoCategoria) ? 'selected' : '' ?>>
          <?= htmlspecialchars($c->nomeCategoria) ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="precoUnitario" class="form-label">Preço do produto</label>
    <input type="number" class="form-control" id="precoUnitario" name="precoUnitario" value="<?= htmlspecialchars($dados->precoUnitario) ?>" step="0.01" min="0" required>
  </div>

  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

<script>
$("form#formProduto").submit(function(e) {
    e.preventDefault();
    var dados_serializados = $(this).serialize();

    $.ajax({
        url: "./Produtos/controller.php",
        type: "PUT",
        data: dados_serializados,
        contentType: 'application/x-www-form-urlencoded',
        success: function(result){        
            alert(result);
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(textStatus + " " + errorThrown);
        }
    });
});
</script>
