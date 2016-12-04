<?php
    /*conexion*/
    require("db/utilidades_sql1.php"); 
    include "header.php";     
        
    if(isset($_GET['u'])){
        if(isset($_POST['bts'])){
            $pro = new Ttecno();
            $pro->update_tecno();
        }


        $obj = new Ttecno();
        $tecno = $obj->tecnoPorId($_GET["u"]);
        <h4>
        </h4>
         <h4>
        </h4>

?>
<!doctype html>
<html>
    
<body>
    <div class="contenido">
        <div><img src="img/log1.png" class="logo"></div>
            <div class="tabs">
                <ul>
                    <li><a href="index.php"> <img src="img/menu-4.png" width=40 height=40> Inicio </a></li>
                    <li><a href="#ventanaauto"> <img src="img/user-3.png" width=40 height=40> Producto Tecnologia </a></li>
                </ul>

                <!--actualizar personal--> 
                <div id="ventanaauto">
                    <div class="ventana-contenedor" align="center">	                    	
                        <form action="#" method="post">
                            <table class="tablanuevo" border=0>
                                <thead>                                            

                                	<!--encabezado--> 
                                    <tr><th colspan=2 class="tablaimagen"><img src="img/user-1.png" width=80 height=80></th></tr>
                                    <tr><th colspan=2 class="tablatitulo">Actualizar Producto Tecnologia</th></tr>

                                    <!--tabla--> 
                                    <tr>
                                        <th><input type="hidden" value="<?php echo $tecno[0]['idtecno']; ?>" name="idtecno"/></th>
                                    </tr>
                                    <tr>
                                        <td>Producto</td>
                                        <td><input type="text" name="nombret" value="<?php echo $tecno[0]['nombret']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Marca</td>
                                        <td><input type="text" name="marca" value="<?php echo $tecno[0]['marca']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Modelo</td>
                                        <td><input type="text" name="modelo" value="<?php echo $tecno[0]['modelo']; ?>"></td>
                                    </tr>

                                    <tr>
                                        <td>Estado</td>
                                        <td>
                                            <select name="estado">
                                                <?php
                                                if($tecno[0]['estado'] == "Activo"){
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
                                    <tr>                                   
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