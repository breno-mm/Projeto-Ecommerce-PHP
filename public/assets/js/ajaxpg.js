function ajaxopen(pg, obj , div){
    $.ajax({
        type: "GET",
        url: pg+".php",
        data: obj,
        beforeSend: function () {
            //Aqui adicionas o loader
            $(div).html("<div class=\"text-center\"><div class=\"spinner-border\" role=\"status\"></div><div class=\"spinner-grow text-danger\" role=\"status\"></div></div>");
        },
        success: function(result)
        {
          $(div).html(result);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $(div).html(textStatus + errorThrown);
        }
    });
}

function removerAjax(pg, obj, div){
    $.ajax({
        type: "DELETE",
        url: pg+".php",
        data: obj,
        beforeSend: function () {
            //Aqui adicionas o loader
            $(div).html("<div class=\"text-center\"><div class=\"spinner-border\" role=\"status\"></div><div class=\"spinner-grow text-danger\" role=\"status\"></div></div>");
        },
        success: function(result)
        {
          $(div).html(result);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $(div).html(textStatus + errorThrown);
        }
    });
}