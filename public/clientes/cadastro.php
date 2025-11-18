<div class="container mt-5">
    <div class="col-md-5 mx-auto">
        <div class="card p-4 shadow">
            <h3 class="text-center mb-3">Cadastrar Cliente</h3>

            <form action="./clientes/actions/registrar-cliente.php" method="POST">

                <div class="mb-3">
                    <label for="nomeCliente">Nome Completo</label>
                    <input type="input" name="nomeCliente" class="form-control" id="nomeCliente" aria-describedby="nomeAjuda" required>
                    <div id="nomeAjuda" class="form-text">Informe o nome completo.</div>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailAjuda" required>
                    <div id="emailAjuda" class="form-text">Informe seu email.</div>
                </div>

                <div class="mb-3">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" aria-describedby="senhaAjuda" required>
                    <div id="senhaAjuda" class="form-text">Informe uma senha.</div>
                </div>

                <button class="btn btn-primary w-100">Cadastrar</button>

            </form>
        </div>
    </div>
</div>


<script>
  $("form#formCliente").submit(function(e) {
    
    e.preventDefault();
    
    var data = new FormData(this);
    
    $.ajax({
        url: "./clientes/actions/registrar-cliente.php",
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