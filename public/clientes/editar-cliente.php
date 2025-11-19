<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['cliente'])) {
    header("Location: ../login.php?erro=nao-autorizado");
    exit;
}

$idLogado = $_SESSION['cliente']['codigoCliente'];

include_once(__DIR__ . "/controller.php");

$dados = $tarefa->buscaCodigo($idLogado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Meus Dados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title fw-bold mb-0">Meus Dados</h5>
                        <a href="../dashboard-cliente.php" class="btn btn-sm btn-outline-secondary">Voltar</a>
                    </div>

                    <form id="formCliente" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="codigoCliente" id="codigoCliente" value="<?= $dados->codigoCliente ?>">

                        <div class="mb-3">
                            <label for="nomeCliente" class="form-label">Nome</label>
                            <input type="text" class="form-control" value="<?= $dados->nomeCliente ?>" id="nomeCliente" name="nomeCliente" readonly style="background-color: #e9ecef;">
                            <div class="form-text">Para alterar o nome, entre em contato com o suporte.</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="CPF" class="form-label">CPF</label>
                                <input type="text" class="form-control" value="<?= $dados->CPF ?>" id="CPF" name="CPF">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telefoneCelular" class="form-label">Celular</label>
                                <input type="text" class="form-control" value="<?= $dados->telefoneCelular ?>" id="telefoneCelular" name="telefoneCelular">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telefoneFixo" class="form-label">Telefone Fixo</label>
                                <input type="text" class="form-control" value="<?= $dados->telefoneFixo ?>" id="telefoneFixo" name="telefoneFixo">
                            </div>
                        </div>

                        <hr>
                        <h6 class="mb-3 text-muted">Endereço</h6>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="CEP" class="form-label">CEP</label>
                                <input type="text" class="form-control" value="<?= $dados->CEP ?>" id="CEP" name="CEP">
                            </div>
                            <div class="col-md-7 mb-3">
                                <label for="logradouro" class="form-label">Logradouro</label>
                                <input type="text" class="form-control" value="<?= $dados->logradouro ?>" id="logradouro" name="logradouro">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="numero" class="form-label">Número</label>
                                <input type="number" class="form-control" value="<?= $dados->numero ?>" id="numero" name="numero">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" value="<?= $dados->bairro ?>" id="bairro" name="bairro">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" value="<?= $dados->cidade ?>" id="cidade" name="cidade">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" value="<?= $dados->estado ?>" id="estado" name="estado">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="complemento" class="form-label">Complemento</label>
                            <input type="text" class="form-control" value="<?= $dados->complemento ?>" id="complemento" name="complemento">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="../dashboard-cliente.php" class="btn btn-light me-md-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
  $("form#formCliente").submit(function (e) {
    e.preventDefault();

    var dados_serializados = $(this).serialize();

    $.ajax({
      // CORREÇÃO: Como estamos na mesma pasta, removemos o "./clientes/"
      url: "controller.php",
      type: "PUT",
      data: dados_serializados,
      contentType: 'application/x-www-form-urlencoded',
      beforeSend: function () {
        // Efeito visual
        $('button[type="submit"]').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Salvando...').prop('disabled', true);
      },
      success: function (result) {
        $('button[type="submit"]').html('Salvar Alterações').prop('disabled', false);
        
        alert("Dados atualizados com sucesso!");
        
        // CORREÇÃO: Redireciona para a pasta anterior (raiz do public)
        window.location.href = "../dashboard-cliente.php";
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $('button[type="submit"]').html('Salvar Alterações').prop('disabled', false);
        // Mostra mensagem de erro detalhada
        console.log(jqXHR.responseText);
        alert("Erro ao processar: " + textStatus);
      }
    });
  });
</script>

</body>
</html>