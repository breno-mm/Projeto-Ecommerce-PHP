<h5 class="card-title fw-semibold mb-4">Cadastro de Produto<h5>

<form id="formCliente" method="POST" enctype="multipart/form-data">
  
  <div class="mb-3">
    <label for="descricaoUnidade" class="form-label">Descrição da unidade</label>
    <input type="input" class="form-control" id="descricaoUnidade" name="descricaoUnidade" aria-describedby="descricaoAjuda" required>
    <div id="descricaoAjuda" class="form-text">Informe um tipo de unidade (Ex. P, M, G).</div>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<script>
  $("form#formCliente").submit(function(e) {
    
    e.preventDefault();
    
    var data = new FormData(this);
    
    $.ajax({
        url: "./unidades/controller.php",
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