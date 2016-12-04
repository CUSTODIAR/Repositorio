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
                    <li><a href="#ajustes" class="active"> <img src="img/boton-17.png" width=40 height=40> Ajustes </a></li>
                </ul>

                <!--agregar cargo-->  
                <div id="lcargo">
                    <form action="#" method="post">                      
                    <!--Salto de linea--><p><br/></p>

                        <table class="tablalist" border=1> 

                            <!--Menu-->
                            <tr>
                                <th colspan="4" class="tablaimagen"><a href="#ventana"><img src="img/database-1.png" width=80 height=80></th>
                                <th colspan="4" class="tablaimagen"><img src="img/database-2.png" width=80 height=80></th>
                            </tr>
                            <tr>
                                <th colspan="4" class="tablatitulo">Realizar Backup</th>
                                <th colspan="4" class="tablatitulo">Backup</th>
                            </tr>

                            
                        </table>

                    </form> 
                </div>

                <div id="ventana">
                    <div class="ventana-contenedor">
                        <div>
                            <form action="#" method="post" align="center">

                                <?php
                                    //servidor MySql  
                                    $C_SERVER='localhost';  
                                    //base de datos  
                                    $C_BASE_DATOS='lyra';  
                                    //usuario y contraseña de la base de datos mysql  
                                    $C_USUARIO='root';  
                                    $C_CONTRASENA='';  

                                    //ruta archivo de salida   
                                    $C_RUTA_ARCHIVO = 'C:/xampp/htdocs/custodiar/bk/';

                                    //(el nombre lo componemos con Y_m_d_H_i_s para que sea diferente en cada backup)  
                                    $C_FILE=date("Y_m_d_H_i_s").'.sql';
                                    //si vamos a comprimirlo  
                                    $C_COMPRIMIR_MYSQL='true';  

                                    //comando  
                                    $command =  "Backup Realizado:".$C_SERVER."-".$C_BASE_DATOS."-".$C_USUARIO."<br>"
                                                ."Ubicacion:".$C_RUTA_ARCHIVO.$C_FILE; 
                                         echo $command;
                                         ;  
                                       
                                    //ejecutamos  
                                    system($command);  
                                      
                                    //comprimimos  
                                    if ($C_COMPRIMIR_MYSQL == 'true') {  
                                     system('bzip2 "'.$C_RUTA_ARCHIVO.'"');  
                                    } 
                                ?>
                                <p><br/></p>
                                <th><a href="ajustes.php"><img src="img/boton-1.png" width=25 height=25 title="Cancelar"</a></th>
                            </form> 
                        </div>
                    </div>
                </div>

            </div>
        <div style="clear:both"></div>        
    </div> 
</body>
</html>