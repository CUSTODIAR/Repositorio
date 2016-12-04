<?php
    /*conexion*/
    require("db/utilidades_sql1.php"); 
    include "header.php";     

    if(isset($_GET['u'])){
        if(isset($_POST['bts'])){
            $pro = new Tproveedor();
            $pro->update_proveedor();
        }


        $obj = new Tproveedor();
        $proveedor = $obj->proveedorPorId($_GET["u"]);
?>

<!doctype html>
<html>
    
<body>
    <div class="contenido">
        <div><img src="img/log1.png" class="logo"></div>
            <div class="tabs">
                <ul>
                    <li><a href="index.php"> <img src="img/menu-4.png" width=40 height=40> Inicio </a></li>
                    <li><a href="#ventanaauto"> <img src="img/user-3.png" width=40 height=40> Proveedores </a></li>
                </ul>

                <!--actualizar personal--> 
                <div id="ventanaauto">
                    <div class="ventana-contenedor" align="center">	                    	
                        <form action="#" method="post">
                            <table class="tablanuevo" border=0>
                                <thead>                                            

                                	<!--encabezado--> 
                                    <tr><th colspan=2 class="tablaimagen"><img src="img/user-1.png" width=80 height=80></th></tr>
                                    <tr><th colspan=2 class="tablatitulo">Actualizar proveedor</th></tr>

                                    <!--tabla--> 
                                    <tr>
                                        <td><input type="hidden" value="<?php echo $proveedor[0]['idproveedor']; ?>" name="id"/></td>
                                    </tr>
                                    <tr>
                                        <td>NIT</td>
                                        <td><input type="text" name="nit" value="<?php echo $proveedor[0]['nit']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Razon Social</td>
                                        <td><input type="text" name="nombrepro" value="<?php echo $proveedor[0]['nombrepro']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Categoria</td>
                                        <td>
                                            <select id="categoria" name="categoria">
                                                <?php

                                                    /*Opcion 1*/
                                                    if($proveedor[0]['categoria'] == "Tipo A Bienes"){
                                                    ?>
                                                        <option value="Tipo A Bienes" selected="selected">Tipo A Bienes</option>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <option value="Tipo A Bienes">Tipo A Bienes</option>
                                                        <?php
                                                    }

                                                    /*Opcion 2*/
                                                    if($proveedor[0]['categoria'] == "Tipo A Servicios"){
                                                        ?>
                                                        <option value="Tipo A Servicios" selected="selected">Tipo A Servicios</option>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <option value="Tipo A Servicios">Tipo A Servicios</option>
                                                        <?php
                                                    }

                                                    /*Opcion 3*/
                                                    if($proveedor[0]['categoria'] == "Tipo C Contratista"){
                                                        ?>
                                                        <option value="Tipo C Contratista" selected="selected">Tipo C Contratista</option>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <option value="Tipo C Contratista">Tipo C Contratista</option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Contacto</td>
                                        <td><input type="text" name="contacto" value="<?php echo $proveedor[0]['contacto']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Cargo</td>
                                        <td><input type="text" name="cargo" value="<?php echo $proveedor[0]['cargo']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Correo</td>
                                        <td><input type="mail" name="correo" value="<?php echo $proveedor[0]['correo']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Telefono</td>
                                        <td><input type="text" name="telefono" value="<?php echo $proveedor[0]['telefono']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Direccion</td>
                                        <td><input type="text" name="direccion" value="<?php echo $proveedor[0]['direccion']; ?>"></td>
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
                                            <input type="button" value="Cancelar" class="boton3" onClick=" window.location.href='form_proveedor.php' ">
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