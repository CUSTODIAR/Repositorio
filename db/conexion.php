<?php
Class Conexion {

   public function conectar(){
      $mysqli = new mysqli('localhost','root','','Lyra',3306);

      if ($mysqli->connect_errno)
         header('');

      $mysqli->set_charset('utf8');

      return $mysqli;
   }

   public function comillas_inteligentes($valor) {
      // Retirar las barras
      if (get_magic_quotes_gpc()) {
         $valor = stripslashes($valor);
      }
      // Colocar comillas si no es entero
      if (!is_numeric($valor)) {
         $valor = "'" . $this->mysqli->real_escape_string($valor) . "'";
      }
      return $valor;
   }

}