<?php
include_once("controller.php");
echo "<h5 class=\"card-title fw-semibold mb-4\">Alterar Cliente<h5>";
$dados = $tarefa->buscaCodigo($_GET['id']);
?>

<form id="formCliente" method="GET" enctype="multipart/form-data">
  <input type="hidden" name="codigoCliente" id="codigoCliente" value="<?=$dados->codigoCliente?>">
  <div class="mb-3">
    <label for="nomeCliente" class="form-label">Nome</label>
    <input type="input" class="form-control" value="<?=$dados->nomeCliente?>" id="nomeCliente" name="nomeCliente" aria-describedby="nomeAjuda">
    <div id="nomeAjuda" class="form-text">Informe o nome completo do cliente.</div>
  </div>

  <div class="mb-3">
    <label for="CPF" class="form-label">CPF</label>
    <input type="input" class="form-control" value="<?=$dados->CPF?>" id="CPF" name="CPF" aria-describedby="CPFAjuda">
    <div id="CPFAjuda" class="form-text">Informe o CPF com apenas números.</div>
  </div>
  
  <div class="mb-3">
    <label for="telefoneFixo" class="form-label">Telefone Fixo</label>
    <input type="input" class="form-control" value="<?=$dados->telefoneFixo?>" id="telefoneFixo" name="telefoneFixo" aria-describedby="telefoneFixoAjuda">
    <div/ id="telefoneFixoAjuda" class="form-text">Informe o telefone fixo, se não houve ignore.</div>
  </div>
  <div class="mb-3">
    <label for="telefoneCelular" class="form-label">Celular</label>
    <input type="input" class="form-control" value="<?=$dados->telefoneCelular?>" id="telefoneCelular" name="telefoneCelular" aria-describedby="telefoneCelulaAjuda">
    <div id="telefoneCelulaAjuda" class="form-text">Informe o telefone celular.</div>
  </div>

  <div class="mb-3">
    <label for="logradouro" class="form-label">Logradouro</label>
    <input type="input" class="form-control" value="<?=$dados->logradouro?>" id="logradouro" name="logradouro" aria-describedby="logradouroAjuda">
    <div id="logradouroAjuda" class="form-text">Informe o Endereço.</div>
  </div>
  
  <div class="mb-3">
    <label for="numero" class="form-label">Número</label>
    <input type="number" class="form-control" value="<?=$dados->numero?>" id="numero" name="numero" aria-describedby="numeroAjuda">
    <div id="numeroAjuda" class="form-text">Informe o número.</div>
  </div>
  
  <div class="mb-3">
    <label for="complemento" class="form-label">Complemento</label>
    <input type="input" class="form-control" value="<?=$dados->complemento?>" id="complemento" name="complemento" aria-describedby="complementoAjuda">
    <div id="complementoAjuda" class="form-text">Informe o Endereço.</div>
  </div>

  <div class="mb-3">
    <label for="bairro" class="form-label">Bairro</label>
    <input type="input" class="form-control" value="<?=$dados->bairro?>" id="bairro" name="bairro" aria-describedby="bairroAjuda">
    <div id="bairroAjuda" class="form-text">Informe o bairro.</div>
  </div>
  
  <div class="mb-3">
    <label for="cidade" class="form-label">Cidade</label>
    <input type="input" class="form-control" value="<?=$dados->cidade?>" id="cidade" name="cidade" aria-describedby="cidadeAjuda">
    <div id="cidadeAjuda" class="form-text">Informe o bairro.</div>
  </div>

  <div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <input type="input" class="form-control" value="<?=$dados->estado?>" id="estado" name="estado" aria-describedby="estadoAjuda">
    <div id="estadoAjuda" class="form-text">Informe o estado.</div>
  </div>

  <div class="mb-3">
    <label for="CEP" class="form-label">CEP</label>
    <input type="input" class="form-control" value="<?=$dados->CEP?>" id="CEP" name="CEP" aria-describedby="CEPAjuda">
    <div id="CEPAjuda" class="form-text">Informe o CEP.</div>
  </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<script>
  $("form#formCliente").submit(function(e) {
    
    e.preventDefault();
    
    var dados_serializados = $(this).serialize();
    
    $.ajax({
        url: "./clientes/controller.php",
        type: "PUT",
        data: dados_serializados,
        contentType: 'application/x-www-form-urlencoded',
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