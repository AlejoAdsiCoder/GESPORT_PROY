$(document).ready(function() {

    $("#escenario").change(function() {
        var id = $(this).find(":selected").val();
        var dataString = "esc=" + id;
        console.log(dataString);
        $.ajax({
            type: 'POST',
            url: "./php/getDetalles.php",
            dataType: "json",
            data: dataString,
            cache: false,
            success: function (escData) {
                if(escData) {
                    console.log(escData);
                }
            }
        });
    });
});