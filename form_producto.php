<?php
    //mostramos el header
    require_once('header.php');
    require("db/utilidades_sql1.php");
?>
<!doctype html>
<body>
    <div class="contenido">
        <div><img src="img/log1.png" class="logo"></div>
            <div class="tabs">
                <ul>
                    <li><a href="index.php"> <img src="img/menu-4.png" width=40 height=40> Inicio </a></li>
                    <li><a href="#producto" class="active"><img src="img/ico-2.png" width=40 height=40> Productos</a></li>
                </ul>
            
                <!--inicio-->  
                <div id="producto">
                    <form action="#" method="post">
                    <!--Salto de linea--> <p><br/></p>

                    <table class="tablanuevo">
                        <thead>

                            <!--encabezado--> 
                            <tr><td colspan=3 class="tablaimagen"><img src="img/ico-2.png" width=80 height=80></td></tr>
                            <tr><td colspan=3 class="tablatitulo">Productos</td></tr>
                            <tr><td colspan=3 align="right"><input type="button" value="Agregar" class="boton1" onClick=" window.location.href='#ventana' "></td></tr>
                            <tr><td><br></td></tr>
                        
                            <!--tabla--> 
                            <tr>
                                <td class="tablabordes">Codigo</td>
                                <td class="tablabordes">Producto</td>
                                <td class="tablabordes">Estado</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $objdotacion = new Tdotacion();
                                $dotacion = $objdotacion->dotacion();
                                if(sizeof($dotacion) > 0){
                                foreach ($dotacion as $row){
                            ?>
                                <tr>
                                    <td><?php echo $row['iddotacion'] ?></td>
                                    <td><?php echo $row['nombred'] ?></td>
                                    <td><?php echo $row['estado'] ?></td>
                                    <td>
                                        <a href="actualizar_producto.php?u=<?php echo $row['iddotacion'] ?>">
                                        <img src="img/boton-1.png" width=20 height=20 title="Editar Registro"></a>
                                    </td>
                                </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </form>  
            </div>

            <!--ventana agregar dotacion-->
                <div id="ventana">
                    <div class="ventana-contenedor" align="center">
                        <form action="#" method="post">
                        <!--Salto de linea--> 
                        <p><br/></p>
                            <table class="tablanuevo" border=0>
                                <thead>                        
                                    
                                    <!--encabezado-->
                                    <tr><td colspan=2 class="tablaimagen"><img src="img/ico-2png" width=80 height=80></td></tr>
                                    <tr><td colspan=2 class="tablatitulo">Agregar Producto Dotacion</td></tr>
                                    <tr><td><br></td></tr>

                                    <!--tabla--> 
                                    <tr>
                                        <td>Producto</td>
                                        <td><input type="text" name="nombred" placeholder="Nombre Producto" required></td>
                                    </tr>
                                    <tr>
                                        <td>Estado</td>
                                        <td><select name="estado" placeholder="Estado Producto" required>
                                                <option value="0"></option>
                                                <option value="Activo">Activo</option>
                                                <option value="Inactivo">Inactivo</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr><td><br></td></tr>

                                    <tr>
                                        <td  colspan=2><center>
                                            <button type="submit"  name="bts" class="boton1">Guardar</button>
                                            <input type="button" value="Cancelar" class="boton3" onClick=" window.location.href='form_producto.php' ">
                                        </td>                          
                                    </tr>
                                    <tr>
                                        <td colspan=2 align="center">
                                        <!-- codigo ingresar datos-->
                                        <?php
                                        if(isset($_POST['bts'])){
                                            if($_POST['nombred']!=null && 
                                                $_POST['estado']!=null){
                                                $paginas = new Tdotacion();
                                                $paginas->add_dotacion();
                                        ?>
                                            <p></p> <!-- salto de linea-->
                                            <!-- datos ingresado-->
                                            <div role="alert">                  
                                                <strong>Listo!</strong> Registro guardado con exito...                  
                                            </div>          
                                
                                        <?php

                                            } else {
                                        ?>
                                                <p></p> <!-- salto de linea-->
                                                <!-- campos vacios-->
                                                <div role="alert">                  
                                                    <strong>Error!</strong> Formulario vacio.                   
                                                </div>
                                        <?php
                                                }
                                            }
                                        ?>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </form>
                    </div>
                </div>

                

    </div>
    <div style="clear:both"></div>
    </div>
</body>
</html>
