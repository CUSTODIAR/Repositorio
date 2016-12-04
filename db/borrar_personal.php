<?php
require("../db/utilidades_sql1.php");

if(isset($_GET['d'])){
	$persona = new Personal();
	$persona->delete($_GET["d"]);
}


?>

