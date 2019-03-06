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
});