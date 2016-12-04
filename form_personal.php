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
                    <li><a href="#personal" class="active"> <img src="img/user-2.png" width=40 height=40> Empleados </a></li>
                </ul>

                <!--inicio-->  
                <div id="personal">
                    <form action="#" method="post">

                        <!--Salto de linea--> 
                        <p><br/></p>

                        <table class="tablalista">
                        <thead>

                            <!--encabezado--> 
                            <tr><td colspan=10 class="tablaimagen"><img src="img/user-2.png" width=80 height=80></td></tr>
                            <tr><td colspan=10 class="tablatitulo">Empleados</td></tr>
                            <tr><td colspan=10 align="right"><input type="button" value="Agregar" class="boton1" onClick=" window.location.href='#ventana' "></td></tr>
                            <tr><td><br></td></tr>

                        
                            <!--tabla--> 
                            <tr>
                                <td class="tablabordes">Codigo</td>
                                <td class="tablabordes">Documento</td>
                                <td class="tablabordes">Nombres</td>
                                <td class="tablabordes">Apellidos</td>
                                <td class="tablabordes">Telefono</td>
                                <td class="tablabordes">Cargo</td>
                                <td class="tablabordes">Ciudad</td>
                                <td class="tablabordes">Contrato</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $objpersonal = new Personal();
                                $personal = $objpersonal->personal();
                                if(sizeof($personal) > 0){
                                foreach ($personal as $row){
                            ?>
                                <tr>
                                    <td><?php echo $row['idpersona'] ?></td>
                                    <td><?php echo $row['documento'] ?></td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['apellido'] ?></td>
                                    <td><?php echo $row['telefono'] ?></td>
                                    <td><?php echo $row['nombrecargo'] ?></td>
                                    <td><?php echo $row['nombreciudad'] ?></td>
                                    <td><?php echo $row['nombrecontrato'] ?></td>
                                    <td>
                                        <a href="actualizar_personal.php?u=<?php echo $row['idpersona'] ?>">
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

                <!--agregar personal-->
                <div id="ventana">
                    <div class="ventana-contenedor" align="center">
                        <form action="#" method="post">
                            <table class="tablanuevo" border=0>
                                <thead>                        
                                    
                                    <!--encabezado-->
                                    <tr><td colspan=2 class="tablaimagen"><img src="img/user-1.png" width=80 height=80></td></tr>
                                    <tr><td colspan=2 class="tablatitulo">Agregar Empleado</td></tr>
                                    <tr><td><br></td></tr>

                                    <!--tabla--> 
                                    <tr>
                                        <td>Documento</td>
                                        <td><input type="text" name="documento" placeholder="Documento" required></td>
                                    </tr>
                                    <tr>
                                        <td>Nombres Completos</td>
                                        <td><input type="text" name="nombre" placeholder="Nombres Completos" required></td>
                                    </tr>
                                    <tr>
                                        <td>Apellidos Completos</td>
                                        <td><input type="text" name="apellido" placeholder="Apellidos Completos" required></td>
                                    </tr>
                                    <tr>
                                        <td>Telefono</td>
                                        <td><input type="text" name="telefono" placeholder="Telefono" required/></td>
                                    </tr>
                                    <tr>
                                        <td>Cargo</td>
                                        <td>
                                            <select name="cargo">
                                            <option value="0"></option>
                                                <?php
                                                    $objC = new Cargos();
                                                    $cargos = $objC->cargos();
                                                    foreach ($cargos as $cargo) {
                                                ?>
                                            <option value="<?php echo $cargo["idcargo"]; ?>"><?php echo $cargo["nombrecargo"]; ?></option>
                                            <?php
                                                }
                                            ?>
                                            </select>
                                        </td>                                   
                                    </tr>
                                    <tr>
                                        <td>Ciudad</td>
                                        <td>
                                            <select name="ciudad">
                                            <option value="0"></option>
                                                <?php
                                                    $objC = new Ciudades();
                                                    $ciudades = $objC->ciudades();
                                                    foreach ($ciudades as $ciudad) {
                                                ?>
                                            <option value="<?php echo $ciudad["idciudad"]; ?>"><?php echo $ciudad["nombreciudad"]; ?></option>
                                            <?php
                                                }
                                            ?>
                                            </select>
                                        </td>                               
                                    </tr>
                                    <tr>
                                        <td>Contrato</td>
                                        <td>
                                            <select name="contrato">
                                            <option value="0"></option>
                                                <?php
                                                    $objC = new Contratos();
                                                    $contratos = $objC->contratos();
                                                    foreach ($contratos as $contrato) {
                                                ?>
                                            <option value="<?php echo $contrato["idcontrato"]; ?>"><?php echo $contrato["nombrecontrato"]; ?></option>
                                            <?php
                                                }
                                            ?>
                                            </select>
                                        </td>                               
                                    </tr>
                                    <tr><td><br></td></tr>
                                    <tr>
                                        <td  colspan=2><center>
                                            <button type="submit"  name="bts" class="boton1">Guardar</button>
                                            <button type="reset"  name="bts" class="boton2">Borrar</button>
                                            <input type="button" value="Cancelar" class="boton3" onClick=" window.location.href='form_personal.php' ">
                                        </td>                          
                                    </tr>
                                    <tr>
                                        <td colspan=2 align="center">
                                            
                                            <!-- codigo ingresar datos-->
                                            <?php
                                                if(isset($_POST['bts'])){
                                                    if($_POST['documento']!=null && $_POST['nombre']!=null && $_POST['apellido']!=null  && $_POST['telefono']!=null){
                                                        $paginas = new Personal();
                                                        $paginas->add();
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