<?php
require_once 'conexion.php';

// CLASE TABLA PERSONAL
    class Entrada extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA TABLA PERSONAL
       public function entrada(){
            $resultado = $this->mysqli->query
            ("SELECT
                entrada.identrada,
                entrada.fechaentrada,
                dotacion.nombred,
                entrada.talla,
                entrada.cantidad,
                proveedor.nombrepro,
                entrada.remision,
                personal.nombre,
                entrada.nota
                FROM
                entrada            
                INNER JOIN dotacion ON entrada.iddotacion = dotacion.iddotacion
                INNER JOIN proveedor ON entrada.idproveedor = proveedor.idproveedor
                INNER JOIN personal ON entrada.idpersona = personal.idpersona
            ");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
    }
    
    // AGREGAR PERSONAL
    public function add_entrada() {
        $fecha_actual = date("Y-m-d");

        $consulta = sprintf(
            "INSERT INTO entrada values(null, %s, %s, %s, %s, %s, %s, %s);",
            parent::comillas_inteligentes($fecha_actual),  
            parent::comillas_inteligentes($_POST['iddotacion']), 
            parent::comillas_inteligentes($_POST['talla']), 
            parent::comillas_inteligentes($_POST['cantidad']),
            parent::comillas_inteligentes($_POST['idproveedor']),
            parent::comillas_inteligentes($_POST['remision']),
            parent::comillas_inteligentes($_POST['idpersona']),
            parent::comillas_inteligentes($_POST['nota'])
            );
        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_entrada.php';</script>";

    }

    // MODIFICAR PERSONAL
    public function update_entrada() {

        $consulta = sprintf
        ("UPDATE entrada SET
            iddotacion = %s,
            talla = %s,
            cantidad = %s,
            idproveedor = %s,
            remision = %s,
            idpersona = %s,
            nota = %s
            WHERE
            identrada = %s;", 
            parent::comillas_inteligentes($_POST['iddotacion']), 
            parent::comillas_inteligentes($_POST['talla']),
            parent::comillas_inteligentes($_POST['cantidad']),
            parent::comillas_inteligentes($_POST['idproveedor']),
            parent::comillas_inteligentes($_POST['remision']),
            parent::comillas_inteligentes($_POST['idpersona']),
            parent::comillas_inteligentes($_POST['nota']),
            parent::comillas_inteligentes($_POST['id'])
            );

        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_entrada.php';</script>";
    }
    
    // ELIMINAR PERSONAL
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM personal WHERE idpersona = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ../form_personal.php");
    }

    
    // PERSONAL POR ID
    public function entradaPorId($id){
        $consulta = sprintf
        ("SELECT
            entrada.identrada,
            entrada.fechaentrada,
            dotacion.nombred,
            entrada.talla,
            proveedor.nombrepro,
            entrada.remision,
            personal.nombre,
            entrada.nota
            FROM
            entrada            
            INNER JOIN dotacion ON entrada.iddotacion = dotacion.iddotacion
            INNER JOIN proveedor ON entrada.idproveedor = proveedor.idproveedor
            INNER JOIN personal ON entrada.idpersona = personal.idpersona
            WHERE
            entrada.identrada = %s", 
            parent::comillas_inteligentes($id)
        );

        $resultado = $this->mysqli->query($consulta);

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        }
    }

}

    // INFO TABLA PROVEEDOR
    class Proveedor extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA DE CIUDAD
        public function Proveedor(){
            $resultado = $this->mysqli->query("SELECT * FROM proveedor");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
        }

    }


    // INFO TABLA PERSONAL
    class Personal extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA DE PERSONAL
        public function Personal(){
            $resultado = $this->mysqli->query("SELECT * FROM personal");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
        }

    }

    // INFO TABLA CONTRATOS
    class Dotacion extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA DE CONTRATO
        public function Dotacion(){
            $resultado = $this->mysqli->query("SELECT * FROM dotacion");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
        }
}

?>