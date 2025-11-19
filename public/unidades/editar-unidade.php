<?php
include_once("controller.php");
echo "<h5 class=\"card-title fw-semibold mb-4\">Alterar Unidade<h5>";
// Busca os dados da unidade pelo ID recebido
$dados = $tarefa->buscaCodigo($_GET['id']);
?>

<form id="formUnidadeEdit" method="GET">
  <input type="hidden" name="codigoUnidade" id="codigoUnidade" value="<?=$dados->codigoUnidade?>">
  
  <div class="mb-3">
    <label for="descricaoUnidade" class="form-label">Descrição da Unidade</label>
    <input type="text" class="form-control" value="<?=$dados->descricaoUnidade?>" id="descricaoUnidade" name="descricaoUnidade" required>
    <div class="form-text">Ex: Peça, Caixa, Kg, Litro.</div>
  </div>

  <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<script>
  $("form#formUnidadeEdit").submit(function(e) {
    
    e.preventDefault();
    
    var dados_serializados = $(this).serialize();
    
    $.ajax({
        url: "./unidades/controller.php",
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