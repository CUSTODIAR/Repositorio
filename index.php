<?php
    //mostramos el header
    require_once('header.php');
    require("db/utilidades_sql1.php");
?>

<!doctype html>
<html>
    
<body>
<div class="contenido">
    <div><img src="img/log1.png" class="logo"></div>
        <div class="tabs">
            <ul>
                <li><a href="#inicio" class="active"> <img src="img/menu-4.png" width=40 height=40> Inicio </a></li>
                <li><a href="form_personal.php"><img src="img/user-1.png" width=40 height=40 title="Ver Empleados"> Empleados</a></li>
                <li><a href="form_proveedor.php"><img src="img/user-2.png" width=40 height=40 title="Ver Proveedores"> Proveedores</a></li>
                <li><a href="form_opciones.php"> <img src="img/ajuste-2.png" width=40 height=40> Mas Opciones </a></li>

                <li><a href="form_producto.php"> <img src="img/caja.png" width=40 height=40> Productos </a></li>
                <li><a href="form_entrada.php"> <img src="img/contrato_1.png" width=40 height=40> Inventario </a></li>


                <li><a href="ajustes.php"><img src="img/boton-18.png" width=40 height=40 title="Ajustes"> Ajustes</a></li>
            </ul>                          
        </div>

        <!--inicio reportes-->  
                <div id="inicio">
                    <form action="#" method="post">
                    hola
                    </form>                        
                </div> 

                <div id="dos">
                    <form action="#" method="post">
                    
                    </form>                        
                </div>               
    <div style="clear:both"></div>        
</div> 
</body>
</html>