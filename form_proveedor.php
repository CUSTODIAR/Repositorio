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
                    <li><a href="index.php"> <img src="img/menu-4.png" width=40 height=40> Inicio </a></li>
                    <li><a href="#proveedor" class="active"> <img src="img/user-3.png" width=40 height=40> Proveedores </a></li>
                </ul>

                <!--inicio-->  
                <div id="proveedor">
                    <form action="#" method="post">

                        <!--Salto de linea--> 
                        <p><br/></p>

                        <table class="tablalista">
                        <thead>

                            <!--encabezado--> 
                            <tr><td colspan=10 class="tablaimagen"><img src="img/user-3.png" width=80 height=80></td></tr>
                            <tr><td colspan=10 class="tablatitulo">Proveedores</td></tr>
                            <tr><td colspan=10 align="right"><input type="button" value="Agregar" class="boton1" onClick=" window.location.href='#ventana' "></td></tr>
                            <tr><td><br></td></tr>

                        
                            <!--tabla--> 
                            <tr>
                                <td class="tablabordes">Codigo</td>
                                <td class="tablabordes">NIT</td>
                                <td class="tablabordes">Razon Social</td>
                                <td class="tablabordes">Categoria</td>
                                <td class="tablabordes">Contacto</td>
                                <td class="tablabordes">Cargo</td>
                                <td class="tablabordes">Correo</td>
                                <td class="tablabordes">Telefono</td>
                                <td class="tablabordes">Direccion</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $objproveedor = new Tproveedor();
                                $proveedor = $objproveedor->proveedor();
                                if(sizeof($proveedor) > 0){
                                foreach ($proveedor as $row){
                            ?>
                                <tr>
                                    <td><?php echo $row['idproveedor'] ?></td>
                                    <td><?php echo $row['nit'] ?></td>
                                    <td><?php echo $row['nombrepro'] ?></td>
                                    <td><?php echo $row['categoria'] ?></td>
                                    <td><?php echo $row['contacto'] ?></td>
                                    <td><?php echo $row['cargo'] ?></td>
                                    <td><?php echo $row['correo'] ?></td>
                                    <td><?php echo $row['telefono'] ?></td>
                                    <td><?php echo $row['direccion'] ?></td>
                                    <td>
                                        <a href="actualizar_proveedor.php?u=<?php echo $row['idproveedor'] ?>">
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

                <!--agregar proveedor-->
                <div id="ventana">
                    <div class="ventana-contenedor" align="center">
                        <form action="#" method="post">
                            <table class="tablanuevo" border=0>
                                <thead>                        
                                    
                                    <!--encabezado-->
                                    <tr><td colspan=2 class="tablaimagen"><img src="img/user-3.png" width=80 height=80></td></tr>
                                    <tr><td colspan=2 class="tablatitulo">Agregar Proveedor</td></tr>
                                    <tr><td><br></td></tr>

                                    <!--tabla--> 
                                    <tr>
                                        <td>NIT</td>
                                        <td><input type="text" name="nit" placeholder="Nit" required></td>
                                    </tr>
                                    <tr>
                                        <td>Razon Social</td>
                                        <td><input type="text" name="nombrepro" placeholder="Razon Social" required></td>
                                    </tr>
                                    <tr>
                                        <td>Categoria</td>
                                        <td><select name="categoria" placeholder="Tipo Proveedor" required>
                                                <option value="0"></option>
                                                <option value="Tipo A Bienes">Tipo A Bienes</option>
                                                <option value="Tipo A Servicios">Tipo A Servicios</option>
                                                <option value="Tipo B Servicios">Tipo B Servicios</option>
                                                <option value="Tipo B Bienes">Tipo B Bienes</option>
                                                <option value="Tipo C Contratista">Tipo C Contratista</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Contacto</td>
                                        <td><input type="text" name="contacto" placeholder="Nombres y Apellidos" required></td>
                                    </tr>
                                    <tr>
                                        <td>Cargo</td>
                                        <td><input type="text" name="cargo" placeholder="Cargo del Contacto" required></td>
                                    </tr>
                                    <tr>
                                        <td>Correo</td>
                                        <td><input type="mail" name="correo" placeholder="Correo" required></td>
                                    </tr>
                                    <tr>
                                        <td>Telefono</td>
                                        <td><input type="text" name="telefono" placeholder="Telefono" required></td>
                                    </tr>
                                    <tr>
                                        <td>Direccion</td>
                                        <td><input type="tetx" name="direccion" placeholder="Direccion" required></td>
                                    </tr>
                                    <tr><td><br></td></tr>
                                    <tr>
                                        <td  colspan=2><center>
                                            <button type="submit"  name="bts" class="boton1">Guardar</button>
                                            <button type="reset"  name="bts" class="boton2">Borrar</button>
                                            <input type="button" value="Cancelar" class="boton3" onClick=" window.location.href='form_proveedor.php' ">
                                        </td>                          
                                    </tr>
                                    <tr>
                                        <td colspan=2 align="center">
                                            
                                            <!-- codigo ingresar datos-->
                                            <?php
                                                if(isset($_POST['bts'])){
                                                    if($_POST['nit']!=null && $_POST['nombrepro']!=null && $_POST['categoria']!=null  && $_POST['contacto']!=null){
                                                        $paginas = new Tproveedor();
                                                        $paginas->add_proveedor();
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
                                        </th>
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