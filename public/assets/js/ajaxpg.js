function ajaxopen(pg, obj, div) {
    $.ajax({
        type: "GET",
        url: pg + ".php",
        data: obj,
        beforeSend: function () {
            //Aqui adicionas o loader
            $(div).html("<div class=\"text-center\"><div class=\"spinner-border\" role=\"status\"></div><div class=\"spinner-grow text-danger\" role=\"status\"></div></div>");
        },
        success: function (result) {
            $(div).html(result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $(div).html(textStatus + errorThrown);
        }
    });
}

function removerAjax(pg, obj, div) {
    $.ajax({
        type: "DELETE",
        url: pg + ".php",
        data: obj,
        beforeSend: function () {
            //Aqui adicionas o loader
            $(div).html("<div class=\"text-center\"><div class=\"spinner-border\" role=\"status\"></div><div class=\"spinner-grow text-danger\" role=\"status\"></div></div>");
        },
        success: function (result) {
            $(div).html(result);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $(div).html(textStatus + errorThrown);
        }
    });
}


/**
 * Configura um formulário de busca via AJAX
 * @param {string} formId - ID do formulário
 * @param {string} inputId - ID do campo de texto
 * @param {string} urlAction - Caminho do arquivo PHP
 * @param {string} targetId - Onde o resultado vai aparecer 
 */
function configurarBusca(formId, inputId, urlAction, targetId) {
    $(formId).off('submit').on('submit', function (e) {
        e.preventDefault();

        var termo = $(inputId).val();

        $.ajax({
            url: urlAction,
            type: "POST",
            data: { termo: termo },
            beforeSend: function () {
                $(targetId).html(
                    '<div class="text-center my-5">' +
                    '<div class="spinner-border text-primary" role="status"></div>' +
                    '<p class="mt-2 text-muted">Pesquisando...</p>' +
                    '</div>'
                );
            },
            success: function (result) {
                $(targetId).html(result);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $(targetId).html(
                    '<div class="alert alert-danger text-center">' +
                    '<i class="bi bi-exclamation-triangle"></i> Erro ao buscar: ' + errorThrown +
                    '</div>'
                );
            }
        });
    });
}

function adicionarAoCarrinho(idProduto) {
    console.log("Tentando adicionar produto ID: " + idProduto); // Debug no Console

    $.ajax({
        url: 'carrinho/adicionar.php', // O caminho relativo a partir do index.php
        type: 'POST',
        data: { id: idProduto },
        success: function(response) {
            var resp = response.trim(); // Remove espaços extras
            console.log("Resposta do servidor: " + resp);

            if(resp === "sucesso") {
                // Redireciona para a visualização do carrinho
                window.location.href = '?carrinho';
            } else {
                alert("Erro ao adicionar! O servidor respondeu: " + resp);
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr);
            alert("Erro de comunicação com o servidor: " + status);
        }
    });
}