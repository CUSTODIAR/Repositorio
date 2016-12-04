<?php
    /*conexion*/
    require("db/utilidades_sql2.php"); 
    include "header.php";     
      
    /*codigo para actualizar*/  
    if(isset($_GET['u'])){
        if(isset($_POST['bts'])){
            $pro = new Entrada();
            $pro->update_entrada();
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
                                    <tr><th colspan=2 class="tablatitulo">Actualizar Entrada</th></tr>

                                    <!--tabla--> 
                                    <tr>
                                        <td><input type="hidden" value="<?php echo $entrada[0]['identrada']; ?>" name="identrada"/></td>
                                    </tr>
                                    <tr>
                                        <td>Producto</td>
                                        <td>
                                            <select name="iddotacion" required>
                                                <option value="1">selecionar producto</option>
                                                <?php
                                                    $objC = new Dotacion();
                                                    $dotacion = $objC->Dotacion();
                                                    foreach ($dotacion as $dotacion) {
                                                    if($dotacion[0]["iddotacion"] == $dotacion["iddotacion"]){
                                                ?>
                                                    <option value="<?php echo $dotacion["iddotacion"]; ?>" 
                                                    selected="selected"><?php echo $dotacion["nombred"]; ?></option>
                                                <?php
                                                    }else{
                                                ?>
                                                    <option value="<?php echo $dotacion["iddotacion"]; ?>"><?php echo $dotacion["nombred"]; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>
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
                                        <td>Proveedor</td>
                                        <td>
                                            <select name="idproveedor" required>
                                                <option value="1">seleccionar proveedor</option>
                                                <?php
                                                    $objC = new Proveedor();
                                                    $proveedor = $objC->Proveedor();
                                                    foreach ($proveedor as $proveedor) {
                                                    if($proveedor[0]["idproveedor"] == $proveedor["idproveedor"]){
                                                ?>
                                                    <option value="<?php echo $proveedor["idproveedor"]; ?>" 
                                                    selected="selected"><?php echo $proveedor["nombrepro"]; ?></option>
                                                <?php
                                                    }else{
                                                ?>
                                                    <option value="<?php echo $proveedor["idproveedor"]; ?>"><?php echo $proveedor["nombrepro"]; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>                                
                                    </tr>

                                    <tr>
                                        <td>Remision</td>
                                        <td><input type="text" name="remision" value="<?php echo $entrada[0]['remision']; ?>"></td>
                                    </tr>
                                    <tr><td><br></td></tr>

                                    <tr>
                                        <td>Almacenista</td>
                                        <td>
                                            <select name="idpersona" required>
                                                <option value="1">seleccionar almacenista</option>
                                                <?php
                                                    $objC = new Personal();
                                                    $personal = $objC->Personal();
                                                    foreach ($personal as $personal) {
                                                    if($personal[0]["idpersona"] == $personal["idpersona"]){
                                                ?>
                                                    <option value="<?php echo $personal["idpersona"]; ?>" 
                                                    selected="selected"><?php echo $personal["nombre"]; ?></option>
                                                <?php
                                                    }else{
                                                ?>
                                                    <option value="<?php echo $personal["idpersona"]; ?>"><?php echo $personal["nombre"]; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>                                
                                    </tr>

                                    <tr>
                                        <td>Observaciones</td>
                                        <td><input type="text" name="notas" value="<?php echo $entrada[0]['notas']; ?>"></td>
                                    </tr>
                                    
                                                                        
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