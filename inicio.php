<?php
    //mostramos el header
    require_once('header.php');
    require("db/utilidades_sql1.php");
?>

<!doctype html>
<html>    
    <body>
    <div class="contenido" align="center">
        <img src="img/log1.png" class="logo">
            <div>
                <form action="./trafico/validarUsuario.php" method="post">
                    <table class="tablanuevo" border=0>                        

                                <!--encabezado--> 
                                <tr><th class="tablaimagen"><img src="img/user-6.png" width=120 height=100></th></tr>
                                <tr><th class="tablatitulo">Iniciar Session</th></tr>

                                <!--tabla--> 
                                <tr><th class="tbalainicio">Correo</th></tr>
                                <tr><th class="tbalainicio"><input type="text" id="txt_email" name="txt_email" required></th></tr>
                                    
                                <tr><th class="tbalainicio">Contraseña</th></tr>
                                <tr><th class="tbalainicio"><input type="password" id="txt_clave" name="txt_clave"></th></tr>

                                <tr><th><center>
                                    <button type="submit" id="btn_enviar"  name="btn_enviar"  value="INGRESAR" required>
                                    <img src="img/aceptar.png" width=38 height=38 title="Agregar">
                                </th></tr>
                                <tr><th class="tbalainicio">Aceptar</th></tr>                              
                    </table>
                </form>                        
            </div>                       
    </div> 
    </body>
</html>


<?php

switch (@$_GET['a']) {
    case 1:
        echo '<script>alert("Por favor llene todos los campos");</script>';
        break;

     case 2:
        echo '<script>alert("La clave o el usuario no coinciden, por favor rectifique");</script>';
        break;
   
}
