


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
$command = "C:\xampp\mysql\bin>mysqldump.exe -h".$C_SERVER." ".$C_BASE_DATOS." -u".$C_USUARIO."  -p".$C_RUTA_ARCHIVO.$C_FILE; 
     echo $command;  
   
//ejecutamos  
system($command);  
  
//comprimimos  
if ($C_COMPRIMIR_MYSQL == 'true') {  
 system('bzip2 "'.$C_RUTA_ARCHIVO.'"');  
} 
?>