<?php
    /*conexion*/
    require("db/utilidades_sql2.php"); 
    include "header.php";     
      
    /*codigo para actualizar*/  
    if(isset($_GET['u'])){
        if(isset($_POST['bts'])){
            $pro = new salida();
            $pro->salida_inventario();
    }

    if(isset($_POST['bts'])){
    if($_POST['nombred']!=null && 
        $_POST['estado']!=null){
        $paginas = new Tdotacion();
        $paginas->add_dotacion();
        }

        /*Buscar ID del registro*/
        $obj = new Entrada();
        $entrada = $obj->entradaporId($_GET["u"]);

                                        
?>
<!doctype html>
<html>
    
<body>
    <div class="contenido">
        <div><img src="img/log1.png" class="logo"></div>
            <div class="tabs">
                <ul>
                    <li><a href="index.php"> <img src="img/menu-4.png" width=40 height=40> Inicio </a></li>
                    <li><a href="#ventanaauto"> <img src="img/user-3.png" width=40 height=40> Inventario </a></li>
                </ul>

                <!--actualizar personal--> 
                <div id="ventanaauto">
                    <div class="ventana-contenedor" align="center">	                    	
                        <form action="#" method="post">
                            <table class="tablanuevo" border=0>
                                <thead>                                            

                                	<!--encabezado--> 
                                    <tr><th colspan=2 class="tablaimagen"><img src="img/user-1.png" width=80 height=80></th></tr>
                                    <tr><th colspan=2 class="tablatitulo">Entrega de Producto</th></tr>

                                    <!--tabla--> 
                                    <tr>
                                        <td><input type="hidden" value="<?php echo $entrada[0]['identrada']; ?>" name="identrada"/></td>
                                    </tr>
                                    <tr>
                                        <td><select name="iddotacion" style="visibility:hidden" required>
                                            <?php
                                                $objC = new Dotacion();
                                                $dotacion = $objC->Dotacion();
                                                foreach ($dotacion as $dotacion) {
                                                if($dotacion[0]["iddotacion"] == $dotacion["iddotacion"]){
                                            ?> <?php } } ?>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>Producto</td>
                                        <td><input type="text" name="iddotacion" value="<?php echo $dotacion["nombred"]; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Talla</td>
                                        <td><input type="text" name="talla" value="<?php echo $entrada[0]['talla']; ?>"></td>
                                    </tr>

                                    <tr>
                                        <td>Cantidad</td>
                                        <td><input type="number" name="cantidad" value="<?php echo $entrada[0]['cantidad']; ?>"></td>
                                    </tr>
                                    <tr><td><br></td></tr>

                                    <tr>
                                        <td>Empleado</td>
                                        <td><select name="idpersona" required>
                                            <option value="1"></option>
                                            <?php
                                                $objC = new Personal();
                                                $Personal = $objC->Personal();
                                                foreach ($Personal as $Personal) {
                                                if($Personal[0]["idpersona"] == $Personal["idpersona"]){
                                            ?>
                                                <option value="<?php echo $Personal["idpersona"]; ?>" 
                                                selected="selected"><?php echo $Personal["nombre"]; ?></option>
                                            <?php
                                                }else{
                                            ?>
                                                <option value="<?php echo $Personal["idpersona"]; ?>"><?php echo $Personal["nombre"]; ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            
                                        </td></select>                              
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
                                        <td>Observaciones</td>
                                        <td><input type="text" name="notas" value="<?php echo $entrada[0]['notas']; ?>"></td>
                                    </tr>

                                    <!--stock salida de inventario-->
                                    <select name="stock" style="visibility:hidden" required><option value="3">1</option></select>
                                    
                                                                        
                                    <?php } ?> 
                                    <?php } ?>
                                                                  
                                    </tr>
                                    <tr><td><br></td></tr>
                                    <tr>
                                        <td  colspan=2><center>
                                            <button type="submit"  name="bts" class="boton1">Guardar</button>
                                            <input type="button" value="Cancelar" class="boton3" onClick=" window.location.href='form_entrada.php' ">
                                        </td>                          
                                    </tr>
                                <thead>                      
                            </table>
                        </form>
                    </div>                         
                </div>          
            </div>
        <div style="clear:both"></div>        
    </div> 
</body>
</html>