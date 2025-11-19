<?php
include_once("controller.php");
echo "<h5 class=\"card-title fw-semibold mb-4\">Alterar Categoria<h5>";
// Busca os dados da categoria pelo ID passado via GET
$dados = $tarefa->buscaCodigo($_GET['id']);
?>

<form id="formCategoriaEdit" method="GET">
  <input type="hidden" name="codigoCategoria" id="codigoCategoria" value="<?=$dados->codigoCategoria?>">
  
  <div class="mb-3">
    <label for="nomeCategoria" class="form-label">Nome da Categoria</label>
    <input type="text" class="form-control" value="<?=$dados->nomeCategoria?>" id="nomeCategoria" name="nomeCategoria" required>
  </div>

  <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<script>
  $("form#formCategoriaEdit").submit(function(e) {
    
    e.preventDefault();
    
    var dados_serializados = $(this).serialize();
    
    $.ajax({
        url: "./categorias/controller.php",
        type: "PUT",
        data: dados_serializados,
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function () {
                $('#corpo').html("<div class=\"text-center\"><div class=\"spinner-border\" role=\"status\"></div></div>");
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