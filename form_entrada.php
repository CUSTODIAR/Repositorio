<?php
    //mostramos el header
    require_once('header.php');
    require("db/utilidades_sql2.php");
?>
<!doctype html>
<body>
    <div class="contenido">
        <div><img src="img/log1.png" class="logo"></div>
            <div class="tabs">
                <ul>
                    <li><a href="index.php"> <img src="img/menu-4.png" width=40 height=40> Inicio </a></li>
                    <li><a href="#inicio" class="active"><img src="img/ico-3.png" width=40 height=40> Inventario</a></li>
                    <li><a href="#salidas"><img src="img/ico-4.png" width=40 height=40> Entregas Realizadas</a></li>
                </ul>
            
            <!--inicio cargos-->     
            <div id="inicio" class="tab">
                <form action="#" method="post">
                    <!--Salto de linea--> 
                    <p><br/></p>

                    <table class="tablalista">
                        <thead>

                            <!--encabezado--> 
                            <tr><td colspan=10 class="tablaimagen"><img src="img/ico-3.png" width=80 height=80></td></tr>
                            <tr><td colspan=10 class="tablatitulo">Inventario</td></tr>
                            <tr><td colspan=10 align="right"><input type="button" value="Agregar" class="boton1" onClick=" window.location.href='#ventana' "></td></tr>
                            <tr><td><br></td></tr>
                        
                            <!--tabla--> 
                            <tr>
                                <td class="tablabordes">Codigo</td>
                                <td class="tablabordes">Fecha</td>
                                <td class="tablabordes">Producto</td>
                                <td class="tablabordes">Talla</td>
                                <td class="tablabordes">Cantidad</td>
                                <td class="tablabordes">Proveedor</td>
                                <td class="tablabordes">Remision</td>
                                <td class="tablabordes">Almacenista</td>
                                <td class="tablabordes">Observaciones</td>
                                <td class="tablabordes">Entregar</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!--codigo de consulta-->
                            <?php
                                $objentradas = new Entrada();
                                $entrada = $objentradas->entrada();
                                if(sizeof($entrada) > 0){
                                foreach ($entrada as $row){
                            ?>
                                <tr>
                                    <td><?php echo $row['identrada'] ?></td>
                                    <td><?php echo $row['fechae'] ?></td>
                                    <td><?php echo $row['nombred'] ?></td>
                                    <td><?php echo $row['talla'] ?></td>
                                    <td><?php echo $row['cantidad'] ?></td>
                                    <td><?php echo $row['nombrepro'] ?></td>
                                    <td><?php echo $row['remision'] ?></td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['notas'] ?></td>

                                    <td>
                                        <a href="form_salida.php?u=<?php echo $row['identrada'] ?>">
                                        <img src="img/salida.png" width=20 height=20 title="Editar Registro"></a>
                                    </td>
                                    <td>
                                        <a href="actualizar_entrada.php?u=<?php echo $row['identrada'] ?>">
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


            <!--inicio contratos-->
            <div id="salidas" class="tab">
                <form action="#" method="post">
                    <!--Salto de linea--> 
                    <p><br/></p>

                    <table class="tablalista">
                        <thead>

                            <!--encabezado--> 
                            <tr><td colspan=10 class="tablaimagen"><img src="img/ico-4.png" width=80 height=80></td></tr>
                            <tr><td colspan=10 class="tablatitulo">Entregas Realizadas</td></tr>
                            
                            <tr><td><br></td></tr>
                        
                            <!--tabla--> 
                            <tr>
                                <td class="tablabordes">Codigo</td>
                                <td class="tablabordes">Fecha</td>
                                <td class="tablabordes">Producto</td>
                                <td class="tablabordes">Talla</td>
                                <td class="tablabordes">Cantidad</td>
                                <td class="tablabordes">Empleado</td>
                                <td class="tablabordes">Ciudad</td>
                                <td class="tablabordes">Contrato</td>
                                <td class="tablabordes">Observaciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!--codigo de consulta-->
                            <?php
                                $objsalida = new Salida();
                                $salida = $objsalida->salida();
                                if(sizeof($salida) > 0){
                                foreach ($salida as $row){
                            ?>
                                <tr>
                                    <td><?php echo $row['idsalida'] ?></td>
                                    <td><?php echo $row['fechas'] ?></td>
                                    <td><?php echo $row['nombred'] ?></td>
                                    <td><?php echo $row['talla'] ?></td>
                                    <td><?php echo $row['cantidads'] ?></td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['nombreciudad'] ?></td>
                                    <td><?php echo $row['nombrecontrato'] ?></td>
                                    <td><?php echo $row['nota'] ?></td>

                                    <td>
                                        <a href="form_salida.php?u=<?php echo $row['identrada'] ?>">
                                        <img src="img/salida.png" width=20 height=20 title="Editar Registro"></a>
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
                                <tr><td colspan=2 class="tablaimagen"><img src="img/ico-2.png" width=80 height=80></td></tr>
                                <tr><td colspan=2 class="tablatitulo">Agregar Producto</td></tr>
                                <tr><td><br></td></tr>

                                <!--tabla-->
                                <tr>
                                    <th>Fecha</th>
                                    <th class="fecha"><?php echo (date("Y-m-d")); ?></th>
                                </tr>
                                <tr>
                                    <td>Producto</td>
                                    <td>
                                        <select name="iddotacion">
                                        <option value="0"></option>
                                            <?php
                                                $objC = new Dotacion();
                                                $dotacion = $objC->dotacion();
                                                foreach ($dotacion as $dotacion) {
                                            ?>
                                        <option value="<?php echo $dotacion["iddotacion"]; ?>"><?php echo $dotacion["nombred"]; ?></option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </td>                                   
                                </tr>

                                <tr>
                                    <td>Talla</td>
                                    <td><input type="text" name="talla" placeholder="Talla" required></td>
                                </tr>
                                <tr>
                                    <td>Cantidad</td>
                                    <td><input type="number" name="cantidad" placeholder="Cantidad" required></td>
                                </tr>

                                <!--salto--> <tr><td><br></td></tr>
                                
                                <tr>
                                    <td>Proveedor</td>
                                    <td>
                                        <select name="idproveedor">
                                        <option value="0"></option>
                                            <?php
                                                $objC = new Proveedor();
                                                $proveedor = $objC->proveedor();
                                                foreach ($proveedor as $proveedor) {
                                            ?>
                                        <option value="<?php echo $proveedor["idproveedor"]; ?>"><?php echo $proveedor["nombrepro"]; ?></option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </td>                                   
                                </tr>

                                <tr>
                                    <td>Remision</td>
                                    <td><input type="text" name="remision" placeholder="Remision" required></td>
                                </tr>

                                <!--salto--><tr><td><br></td></tr>
                                <tr>
                                    <td>Almacenista</td>
                                    <td>
                                        <select name="idpersona">
                                        <option value="0"></option>
                                            <?php
                                                $objC = new Personal();
                                                $personal = $objC->personal();
                                                foreach ($personal as $personal) {
                                            ?>
                                        <option value="<?php echo $personal["idpersona"]; ?>"><?php echo $personal["nombre"]; ?><?php echo $personal["apellido"]; ?></option>
                                        <?php
                                            }
                                        ?>
                                        </select>
                                    </td>                                   
                                </tr>
                                <tr>
                                    <td>Observaciones</td>
                                    <td><input type="text" name="notas" placeholder="Observaciones" required></td>
                                </tr>
                                
                                <!--stock entrada de inventario-->
                                <select name="stock" style="visibility:hidden" required><option value="1">1</option></select>

                                <!--salto--><tr><td><br></td></tr>
                                <tr>
                                    <td  colspan=2><center>
                                        <button type="submit"  name="bts" class="boton1">Guardar</button>
                                        <input type="button" value="Cancelar" class="boton3" onClick=" window.location.href='form_entrada.php' ">
                                    </td>                          
                                </tr>

                                <tr>
                                    <td>

                                    <!-- codigo ingresar datos-->
                                    <?php
                                                if(isset($_POST['bts'])){
                                                    if($_POST['iddotacion']!=null && 
                                                        $_POST['talla']!=null && 
                                                        $_POST['cantidad']!=null  &&
                                                        $_POST['idproveedor']!=null && 
                                                        $_POST['remision']!=null && 
                                                        $_POST['idpersona']!=null && 
                                                        $_POST['notas']!=null && 
                                                        $_POST['stock']!=null){
                                                        $paginas = new Entrada();
                                                        $paginas->add_entrada();
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

                <!--ventana agregar contrato-->
                <div id="ventanab">
                    <div class="ventanab-contenedor" align="center">
                        <form action="#" method="post">
                            <table class="tablanuevo" border=0>
                                <thead>                        
                                    
                                    <!--encabezado-->
                                    <tr><td colspan=2 class="tablaimagen"><img src="img/boton-6.png" width=80 height=80></td></tr>
                                    <tr><td colspan=2 class="tablatitulo">Agregar Contrato</td></tr>
                                    <tr><td><br></td></tr>

                                    <!--tabla--> 
                                    <tr>
                                        <td>Contrato</td>
                                        <td><input type="text" name="nombrecontrato" placeholder="Nombre Contrato" required></td>
                                    </tr>
                                        <td  colspan=2><center>
                                            <button type="submit"  name="bts" class="boton1">Guardar</button>
                                            <input type="button" value="Cancelar" class="boton3" onClick=" window.location.href='form_opciones.php' ">
                                        </td>                          
                                    </tr>
                                    <tr><td><br></td></tr>

                                    <tr>
                                        <td colspan=2 align="">

                                    <!-- codigo ingresar datos-->
                                    <?php
                                            if(isset($_POST['bts'])){
                                            if($_POST['nombrecontrato']!=null){
                                            $paginas = new Tcontrato();
                                            $paginas->add_contrato();
                                        }}
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
