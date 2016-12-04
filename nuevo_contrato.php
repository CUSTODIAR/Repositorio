<?php
session_start();
    require_once 'conexion.php';

$conexion = new Conexion();

if (!$_POST["txt_email"] || !$_POST["txt_clave"]) {
    header("Location: ../index.php?a=1");
} else {

    $consulta = "select id_rol,user from usuarios where email='" . $_POST["txt_email"] . "' and password='" . $_POST["txt_clave"] . "';";
		
    $prepare = $conexion->prepare($consulta);
    $prepare->execute();
    $resultado = $prepare->fetchAll();

    if ($resultado) {

        $_SESSION['id_rol'] = $resultado[0]['id_rol'];
        $_SESSION['user'] = $resultado[0]['user'];

        switch ($_SESSION['id_rol']) {
            case 1:
                header("Location: ../salones/index.php");
                break;

            case 2:
                header("Location: ../salones/salon1.php");    
                break;
        }
    } else {
        header("Location: ../index.php?a=2");
    }
}


$conexion = null;

