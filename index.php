<?php
    //mostramos el header
    require_once('header.php');
    require("db/utilidades_sql2.php");
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
                <li><a href="form_proveedor.php"><img src="img/user-3.png" width=40 height=40 title="Ver Proveedores"> Proveedores</a></li>
                

                <li><a href="form_producto.php"> <img src="img/ico-2.png" width=40 height=40> Productos </a></li>
                <li><a href="form_entrada.php"> <img src="img/ico-3.png" width=40 height=40> Inventario </a></li>

                <li><a href="form_opciones.php"> <img src="img/boton-4.png" width=40 height=40> Opciones </a></li>
                <li><a href="ajustes.php"><img src="img/boton-18.png" width=40 height=40 title="Ajustes"> Ajustes</a></li>
            </ul>                          
        </div>

        <!--inicio reportes-->  
                <div id="inicio">
                    <form action="#" method="post">
                    <!--Salto de linea--> 
                    <p><br/></p>

                    <table class="tablainforme">
                        <thead><!--informe de salidas-->
                            <tr><td class="tablainformes" colspan="3">Productos en Stock</td></tr> 
                            <tr>
                                <td class="tablainformes">Codigo</td>
                                <td class="tablainformes">Producto</td>
                                <td class="tablainformes">Total</td>
                            </tr>
                            <tbody>
                            <!--codigo de consulta-->
                            <?php
                                $objentradas = new Entrada();
                                $entrada_stock = $objentradas->entrada_stock();
                                if(sizeof($entrada_stock) > 0){
                                foreach ($entrada_stock as $row){
                            ?>
                                <tr>
                                    <td class="tablainformes"><?php echo $row['identrada'] ?></td>
                                    <td class="tablainformes"><?php echo $row['nombred'] ?></td>
                                    <td class="tablainformes"><?php echo $row['cantidad'] ?></td>                                    
                                </tr>
                            <?php
                                }
                            }
                            ?>
                            </tbody>
                            <tr><td><br></td></tr>
                        </thead>

                        <thead><!--informe de salidas-->
                            <tr><td class="tablainformes" colspan="3">Productos Entregados</td></tr> 
                            <tr>
                                <td class="tablainformes">Codigo</td>
                                <td class="tablainformes">Producto</td>
                                <td class="tablainformes">Total</td>
                            </tr>
                            <tbody>
                            <!--codigo de consulta-->
                            <?php
                                $objsalida = new Salida();
                                $salida_stock = $objsalida->salida_stock();
                                if(sizeof($salida_stock) > 0){
                                foreach ($salida_stock as $row){
                            ?>
                                <tr>
                                    <td class="tablainformes"><?php echo $row['idsalida'] ?></td>
                                    <td class="tablainformes"><?php echo $row['nombred'] ?></td>
                                    <td class="tablainformes"><?php echo $row['cantidads'] ?></td>                                    
                                </tr>
                            <?php
                                }
                            }
                            ?>
                            </tbody>
                            <tr><td><br></td></tr>
                        </thead>
                        
                    </table>
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