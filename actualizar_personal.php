<?php
    /*conexion*/
    require("db/utilidades_sql1.php"); 
    include "header.php";     
        
    if(isset($_GET['u'])){
        if(isset($_POST['bts'])){
            $per = new Personal();
            $per->update();
        }


        $obj = new Personal();
        $persona = $obj->personalPorId($_GET["u"]);
?>
<!doctype html>
<html>
    
<body>
    <div class="contenido">
        <div><img src="img/log1.png" class="logo"></div>
            <div class="tabs">
                <ul>
                    <li><a href="index.php"> <img src="img/menu-4.png" width=40 height=40> Inicio </a></li>
                    <li><a href="#ventanaauto"> <img src="img/user-3.png" width=40 height=40> Empleados </a></li>
                </ul>

                <!--actualizar personal--> 
                <div id="ventanaauto">
                    <div class="ventana-contenedor" align="center">	                    	
                        <form action="#" method="post">
                            <table class="tablanuevo" border=0>
                                <thead>                                            

                                	<!--encabezado--> 
                                    <tr><th colspan=2 class="tablaimagen"><img src="img/user-1.png" width=80 height=80></th></tr>
                                    <tr><th colspan=2 class="tablatitulo">Actualizar Empleado</th></tr>

                                    <!--tabla--> 
                                    <tr>
                                        <td><input type="hidden" value="<?php echo $persona[0]['idpersona']; ?>" name="id"/></td>
                                    </tr>
                                    <tr>
                                        <td>Documento</td>
                                        <td><input type="text" name="documento" value="<?php echo $persona[0]['documento']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Nombres Completos</td>
                                        <td><input type="text" name="nombre" value="<?php echo $persona[0]['nombre']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Apellidos Completos</td>
                                        <td><input type="text" name="apellido" value="<?php echo $persona[0]['apellido']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Telefono</td>
                                        <td><input type="text" name="telefono" value="<?php echo $persona[0]['telefono']; ?>"></td>
                                    </tr>

                                    <tr>
                                        <td>Cargo</td>
                                        <td><select name="cargo" required>
                                                <option value="1">-- seleccionar cargo --</option>
                                                <?php
                                                    $objC = new Cargos();
                                                    $cargos = $objC->cargos();
                                                    foreach ($cargos as $cargo) {
                                                    if($persona[0]["idcargo"] == $cargo["idcargo"]){
                                                ?>
                                                    <option value="<?php echo $cargo["idcargo"]; ?>" selected="selected"><?php echo $cargo["nombrecargo"]; ?></option>
                                                <?php
                                                    }else{
                                                ?>
                                                    <option value="<?php echo $cargo["idcargo"]; ?>"><?php echo $cargo["nombrecargo"]; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>                                  	
                                    </tr>
                                    <tr>
                                    	<td>Ciudad</td>
                                    	<td><select name="ciudad" required>
                                                <option value="1">-- seleccionar ciudad --</option>
                                                <?php
                                                    $objC = new Ciudades();
                                                    $ciudades = $objC->ciudades();
                                                    foreach ($ciudades as $ciudad) {
                                                    if($persona[0]["idciudad"] == $ciudad["idciudad"]){
                                                ?>
                                                    <option value="<?php echo $ciudad["idciudad"]; ?>" selected="selected"><?php echo $ciudad["nombreciudad"]; ?></option>
                                                <?php
                                                    }else{
                                                ?>
                                                    <option value="<?php echo $ciudad["idciudad"]; ?>"><?php echo $ciudad["nombreciudad"]; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                    	</td>                            	
                                    </tr>

                                    <tr>
                                    	<td>Contrato</td>
                                    	<td><select name="contrato" required>
                                                <option value="1">-- seleccionar contrato --</option>
                                                <?php
                                                    $objC = new Contratos();
                                                    $contratos = $objC->contratos();
                                                    foreach ($contratos as $contrato) {
                                                    if($persona[0]["idcontrato"] == $contrato["idcontrato"]){
                                                ?>
                                                    <option value="<?php echo $contrato["idcontrato"]; ?>" selected="selected"><?php echo $contrato["nombrecontrato"]; ?></option>
                                                <?php
                                                    }else{
                                                ?>
                                                    <option value="<?php echo $contrato["idcontrato"]; ?>"><?php echo $contrato["nombrecontrato"]; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                    	</td>                        	
                                    </tr>

                                    <tr>                                    
                                    <?php
                                        }
                                    ?>                                
                                    </tr>
                                    <tr><td><br></td></tr>
                                    <tr>
                                        <td  colspan=2><center>
                                            <button type="submit"  name="bts" class="boton1">Guardar</button>
                                            <input type="button" value="Cancelar" class="boton3" onClick=" window.location.href='form_personal.php' ">
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