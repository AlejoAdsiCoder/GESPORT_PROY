$(document).ready(function() {

    $("#escenario").change(function() {
        var id = $(this).find(":selected").val();
        var dataString = "esc=" + id;
        $.ajax({
//            type: 'POST',
            url: "php/getDetalles.php?" + dataString,
//            dataType: "json",
//            data: dataString,
//            cache: false,
            success: function (escData) {
                if(escData) {
                    var datos = JSON.parse(escData);
                    alert(escData);
                    alert(datos[0].dia);
                    for(i = 0; i < datos.length; i++) {
                        if(datos[i].dia == "lunes"){
                            $("#lun").html("<li>" + datos[i].hora_inicio + "</li><li>" + datos[i].hora_fin);
                        }
                    }
                }
                else
                alert("Nanay");
            }
        });
    });

    $("#click").click(function() {
        var id = $("#id").val();
        var escenario = $("#escenario").val();
        var club = $("#club").val();
        var descripcion = $("#descripcion").val();
        var fh_inicio = $("#fecha_hora_inicio").val();
        var fh_fin = $("#fecha_hora_fin").val();
        var estado = $('#estado').val();

        $.ajax({
            type: 'POST',
            url: 'php/scriptevento.php',
            data: {id:id, escenario:escenario, club:club, descripcion:descripcion, fh_inicio:fh_inicio, fh_fin:fh_fin, estado:estado},
        }).done(function(data) {
            alert( "success" );
        });
        /*
        $.post("../php/scriptevento.php", {id:id, escenario:escenario, club:club, descripcion:descripcion, fh_inicio:fh_inicio, fh_fin:fh_fin, estado:estado}).done(function(data) {
            alert( "Datos cargados: " + data );
        });
        */
    });
});