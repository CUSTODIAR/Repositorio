$(document).on("ready", function() {

// evento click del botón 'Mostrar'
$("#submit").on("click", function(e) {
    e.preventDefault();
    var option = $("#select").val(); // guarda el nombre seleccionado del select
    // crea un objeto JSON para enviarlo
    var dataToSend = JSON.parse('{"name": "nombre", "value": "'+option+'"}');

    $.ajax(
        {
            url: "process.php", // url que procesara la petición
            dataType: "json", // tipo de datos a enviar
            data: dataToSend, // datos a enviar (json)
            type: "get" // metodo de petición
        }
    )
    .done( function(data) {
        $("#apellidos").html(data["apellidos"]);
        $("#anyo").html(data["anyo"]);
        console.log(dataToSend);
        console.log(data);
    })
    .fail( function(jqXHR,textStatus,errorThrown) {
        console.log("Ha ocurrido un error al obtener los datos del usuario");
    });

  });

});