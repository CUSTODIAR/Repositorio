$(document).ready(function () {

    var url = '';

    $("#btn_salir").click(function () {
        var url = '../trafico/fin.php';
        $(location).attr('href', url);
    });

    $("#btn_salon1").click(function () {
        url = "salon1.php";
        $(location).attr('href', url);
    });

    $("#btn_salon2").click(function () {
        url = "salon2.php";
        $(location).attr('href', url);
    });

    $("#btn_productos").click(function () {
        var url = './productos.php';
        $(location).attr('href', url);
    });

});

