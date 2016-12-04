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
                    <li><a href="#inicio" class="active"><img src="img/user-3.png" width=40 height=40> Mas Opciones</a></li>
                    <li><a href="#cargos"><img src="img/user-3.png" width=40 height=40> Cargos</a></li>
                    <li><a href="#contratos"><img src="img/user-3.png" width=40 height=40> Contratos</a></li>
                </ul>

            <!--inicio productos--> 
            <div id="inicio" class="tab">
                <form action="#" method="post">
                    <!--Salto de linea--> 
                    <p><br/></p>

                    <table class="tablanuevo">
                        <tr>
                            <td><li><a href="#cargos"><img src="img/user-3.png" width=40 height=40> Cargos</a></li></td>
                            <td><li><a href="#contratos"><img src="img/user-3.png" width=40 height=40> Contratos</a></li></td>
                        </tr>
                    </table>
                </form>
            </div>
            
            <!--inicio cargos-->     
            <div id="cargos" class="tab">
                <form action="#" method="post">
                    <!--Salto de linea--> 
                    <p><br/></p>

                    <table class="tablanuevo">
                        <thead>

                            <!--encabezado--> 
                            <tr><td colspan=10 class="tablaimagen"><img src="img/user-3.png" width=80 height=80></td></tr>
                            <tr><td colspan=10 class="tablatitulo">Cargos</td></tr>
                            <tr><td colspan=10 align="right"><input type="button" value="Agregar" class="boton1" onClick=" window.location.href='#ventana' "></td></tr>
                            <tr><td><br></td></tr>
                        
                            <!--tabla--> 
                            <tr>
                                <td class="tablabordes">Codigo</td>
                                <td class="tablabordes">Cargo</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!--codigo de consulta-->
                            <?php
                                $objcargos = new Tcargo();
                                $cargo = $objcargos->cargo();
                                if(sizeof($cargo) > 0){
                                foreach ($cargo as $row){
                            ?>
                                <tr>
                                    <td><?php echo $row['idcargo'] ?></td>
                                    <td align="left"><?php echo $row['nombrecargo'] ?></td>
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
            <div id="contratos" class="tab">
                <form action="#" method="post">
                    <!--Salto de linea--> 
                    <p><br/></p>

                    <table class="tablanuevo">
                        <thead>
                            <!--encabezado--> 
                            <tr><td colspan=10 class="tablaimagen"><img src="img/user-3.png" width=80 height=80></td></tr>
                            <tr><td colspan=10 class="tablatitulo">Contratos</td></tr>
                            <tr><td colspan=10 align="right"><input type="button" value="Agregar" class="boton1" onClick=" window.location.href='#ventanab' "></td></tr>
                            <tr><td><br></td></tr>
                        
                            <!--tabla--> 
                            <tr>
                                <td class="tablabordes">Codigo</td>
                                <td class="tablabordes">Contrato</td>
                            </tr>
                        </thead>
                            <tbody>
                                <!--codigo de consulta-->
                                <?php
                                    $objcontratos = new Tcontrato();
                                    $contrato = $objcontratos->contrato();
                                    if(sizeof($contrato) > 0){
                                    foreach ($contrato as $row){
                                ?>
                                    <tr>
                                        <td><?php echo $row['idcontrato'] ?></td>
                                        <td align="left"><?php echo $row['nombrecontrato'] ?></td>
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
                                    <tr><td colspan=2 class="tablaimagen"><img src="img/user-1.png" width=80 height=80></td></tr>
                                    <tr><td colspan=2 class="tablatitulo">Agregar Cargo</td></tr>
                                    <tr><td><br></td></tr>

                                    <!--tabla--> 
                                    <!--tabla--> 
                                    <tr>
                                        <td>Cargo</td>
                                        <td><input type="text" name="nombrecargo" placeholder="Nombre Cargo" required></td>
                                    </tr>
                                    <tr><td><br></td></tr>

                                    <tr>
                                        <td colspan=2><center>
                                            <button type="submit"  name="bts" class="boton1">Guardar</button>
                                            <input type="button" value="Cancelar" class="boton3" onClick=" window.location.href='form_opciones.php' ">
                                        </td>                          
                                    </tr>
                                    <tr>
                                        <td colspan=2 align="center">
                                        <!-- codigo ingresar datos-->
                                            <?php
                                            if(isset($_POST['bts'])){
                                            if($_POST['nombrecargo']!=null){
                                            $paginas = new Tcargo();
                                            $paginas->add_cargo();
                                        }}
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
                                    <tr><td colspan=2 class="tablaimagen"><img src="img/user-1.png" width=80 height=80></td></tr>
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
