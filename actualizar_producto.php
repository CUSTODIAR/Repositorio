<?php
    /*conexion*/
    require("db/utilidades_sql2.php"); 
    include "header.php";     
        
    if(isset($_GET['u'])){
        if(isset($_POST['bts'])){
            $pro = new Tdotacion();
            $pro->update_dotacion();
        }


        $obj = new Tdotacion();
        $dotacion = $obj->dotacionPorId($_GET["u"]);
?>
<!doctype html>
<html>
    
<body>
    <div class="contenido">
        <div><img src="img/log1.png" class="logo"></div>
            <div class="tabs">
                <ul>
                    <li><a href="index.php"> <img src="img/menu-4.png" width=40 height=40> Inicio </a></li>
                    <li><a href="#ventanaauto"> <img src="img/user-3.png" width=40 height=40> Producto Dotacion </a></li>
                </ul>

                <!--actualizar personal--> 
                <div id="ventanaauto">
                    <div class="ventana-contenedor" align="center">	                    	
                        <form action="#" method="post">
                            <table class="tablanuevo" border=0>
                                <thead>                                            

                                	<!--encabezado--> 
                                    <tr><th colspan=2 class="tablaimagen"><img src="img/user-1.png" width=80 height=80></th></tr>
                                    <tr><th colspan=2 class="tablatitulo">Actualizar Producto Dotacion</th></tr>

                                    <!--tabla--> 
                                    <tr>
                                        <td><input type="hidden" value="<?php echo $dotacion[0]['iddotacion']; ?>" name="iddotacion"/></td>
                                    </tr>
                                    <tr>
                                        <td>Producto</td>
                                        <th><input type="text" name="nombred" value="<?php echo $dotacion[0]['nombred']; ?>"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Estado</td>
                                        <td>
                                            <select name="estado">
                                                <?php
                                                if($dotacion[0]['estado'] == "Activo"){
                                                    ?>
                                                    <option value="Activo" selected="selected">Activo</option>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <option value="Activo">Activo</option>
                                                    <?php
                                                }

                                                if($dotacion[0]['estado'] == "Inactivo"){
                                                    ?>
                                                    <option value="Inactivo" selected="selected">Inactivo</option>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <option value="Inactivo">Inactivo</option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>                                    
                                    <?php
                                        }
                                    ?>                                
                                    </tr>
                                    <tr><td><br></td></tr>
                                    <tr>
                                        <td  colspan=2><center>
                                            <button type="submit"  name="bts" class="boton1">Guardar</button>
                                            <input type="button" value="Cancelar" class="boton3" onClick=" window.location.href='form_producto.php' ">
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