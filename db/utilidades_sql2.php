<?php
require_once 'conexion.php';


    // CLASE TABLA ENTRADA
    class Entrada extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // CONSULTA SQL
       public function entrada_stock(){
            $resultado = $this->mysqli->query
            (" SELECT
                entrada.identrada, 
                dotacion.nombred, 
                SUM(cantidad) AS cantidad, 
                entrada.stock
                 
                FROM entrada 
                INNER JOIN dotacion ON entrada.iddotacion = dotacion.iddotacion 

                WHERE stock =1
                GROUP BY dotacion.nombred
            ");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
    }

     // LISTA TABLA STOCK
       public function entrada(){
            $resultado = $this->mysqli->query
            ("SELECT
                entrada.identrada,
                entrada.fechae,
                dotacion.nombred,
                entrada.talla,
                entrada.cantidad,
                proveedor.nombrepro,
                entrada.remision,
                personal.nombre,
                entrada.notas,
                entrada.stock
                FROM
                entrada            
                INNER JOIN dotacion ON entrada.iddotacion = dotacion.iddotacion
                INNER JOIN proveedor ON entrada.idproveedor = proveedor.idproveedor
                INNER JOIN personal ON entrada.idpersona = personal.idpersona
                WHERE stock =1
            ");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
    }
    
    // AGREGAR 
    public function add_entrada() {
        $fecha_actual = date("Y-m-d");
        $consulta = sprintf(
            "INSERT INTO entrada values(null, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
            parent::comillas_inteligentes($fecha_actual),  
            parent::comillas_inteligentes($_POST['iddotacion']), 
            parent::comillas_inteligentes($_POST['talla']), 
            parent::comillas_inteligentes($_POST['cantidad']),
            parent::comillas_inteligentes($_POST['idproveedor']),
            parent::comillas_inteligentes($_POST['remision']),
            parent::comillas_inteligentes($_POST['idpersona']),
            parent::comillas_inteligentes($_POST['notas']),
            parent::comillas_inteligentes($_POST['stock'])
            );
        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_entrada.php';</script>";
        

    }

    // MODIFICAR ENTRADA
    public function update_entrada() {
        $consulta = sprintf
        ("UPDATE entrada SET
            iddotacion = %s,
            talla = %s,
            cantidad = %s,
            idproveedor = %s,
            remision = %s,
            idpersona = %s,
            notas = %s
            WHERE
            identrada = %s;", 
            parent::comillas_inteligentes($_POST['iddotacion']), 
            parent::comillas_inteligentes($_POST['talla']),
            parent::comillas_inteligentes($_POST['cantidad']),
            parent::comillas_inteligentes($_POST['idproveedor']),
            parent::comillas_inteligentes($_POST['remision']),
            parent::comillas_inteligentes($_POST['idpersona']),
            parent::comillas_inteligentes($_POST['notas']),
            parent::comillas_inteligentes($_POST['identrada'])
            );

        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_entrada.php';</script>";
    }

    // MODIFICAR ENTRADA
    public function salida() {
        $consulta = sprintf
        ("UPDATE entrada SET
            iddotacion = %s,
            talla = %s,
            cantidad = %s,
            idproveedor = %s,
            remision = %s,
            idpersona = %s,
            notas = %s
            WHERE
            identrada = %s;", 
            parent::comillas_inteligentes($_POST['iddotacion']), 
            parent::comillas_inteligentes($_POST['talla']),
            parent::comillas_inteligentes($_POST['cantidad']),
            parent::comillas_inteligentes($_POST['idproveedor']),
            parent::comillas_inteligentes($_POST['remision']),
            parent::comillas_inteligentes($_POST['idpersona']),
            parent::comillas_inteligentes($_POST['notas']),
            parent::comillas_inteligentes($_POST['identrada'])
            );

        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_entrada.php';</script>";
    }
    
    // ELIMINAR 
    public function delete($id) {
        $query = sprintf(
            "DELETE FROM entrada WHERE identrada = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ../form_entrada.php");
    }

    
    // TABALA ENTRADA POR ID
    public function entradaPorId($id){
        $consulta = sprintf
        ("SELECT
            entrada.identrada,
            entrada.fechae,
            dotacion.nombred,
            entrada.talla,
            entrada.cantidad,
            proveedor.nombrepro,
            entrada.remision,
            personal.nombre,
            entrada.notas           
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

    // INFO TABLA DOTACION
    class Dotacion extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA DE DOTACION
        public function dotacion(){
            $resultado = $this->mysqli->query("SELECT * FROM dotacion");

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

        // LISTA DE CARGO
        public function proveedor(){
            $resultado = $this->mysqli->query("SELECT * FROM proveedor");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
        }

    }

    // INFO TABLA CONTRATOS
    class Personal extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA DE CONTRATO
        public function personal(){
            $resultado = $this->mysqli->query("SELECT * FROM personal");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
        }


}
    

///////////////////////////////////////////////////////////////////
    // CLASE TABLA ENTRADA
     class Salida extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        

     // LISTA TABLA STOCK
       public function salida(){
            $resultado = $this->mysqli->query
            ("SELECT
                salida.idsalida,
                salida.fechas,
                dotacion.nombred,
                salida.talla,
                salida.cantidads,
                personal.nombre,
                ciudad.nombreciudad,
                contrato.nombrecontrato,
                salida.nota,
                salida.stock
                FROM
                salida            
                INNER JOIN dotacion ON salida.iddotacion = dotacion.iddotacion
                INNER JOIN personal ON salida.idpersona = personal.idpersona
                INNER JOIN ciudad ON salida.idciudad = ciudad.idciudad
                INNER JOIN contrato ON salida.idcontrato = contrato.idcontrato
            ");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            }        
    }

    // CONSULTA SQL
       public function salida_stock(){
            $resultado = $this->mysqli->query
            (" SELECT 
                salida.idsalida, 
                dotacion.nombred,  
                SUM(cantidads) AS cantidads, salida.stock 
                FROM salida 
                INNER JOIN dotacion ON salida.iddotacion = dotacion.iddotacion
                WHERE stock =3 
                GROUP BY dotacion.nombred
            ");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
    }
    
    // AGREGAR 
    public function add_salida() {
        $fecha_actual = date("Y-m-d");
        $consulta = sprintf(
            "INSERT INTO salida values(null, %s, %s, %s, %s, %s, %s, %s, %s, %s);",
            parent::comillas_inteligentes($fecha_actual),  
            parent::comillas_inteligentes($_POST['iddotacion']), 
            parent::comillas_inteligentes($_POST['talla']), 
            parent::comillas_inteligentes($_POST['cantidads']),
            parent::comillas_inteligentes($_POST['idpersona']),
            parent::comillas_inteligentes($_POST['idciudad']),
            parent::comillas_inteligentes($_POST['idcontrato']),
            parent::comillas_inteligentes($_POST['notas']),
            parent::comillas_inteligentes($_POST['stock'])
            );
        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_entrada.php';</script>";
    }


    // MODIFICAR ENTRADA
    public function update_salida() {
        $consulta = sprintf
        ("UPDATE salida SET
            iddotacion = %s,
            talla = %s,
            cantidads = %s,
            idpersona = %s,
            idciudad = %s,
            idcontrato = %s,
            notas = %s
            WHERE
            idsalida = %s;", 
            parent::comillas_inteligentes($_POST['iddotacion']), 
            parent::comillas_inteligentes($_POST['talla']),
            parent::comillas_inteligentes($_POST['cantidads']),
            parent::comillas_inteligentes($_POST['idpersona']),
            parent::comillas_inteligentes($_POST['idciudad']),
            parent::comillas_inteligentes($_POST['idcontrato']),
            parent::comillas_inteligentes($_POST['notas']),
            parent::comillas_inteligentes($_POST['idsalida'])
            );

        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_entrada.php';</script>";
    }

    // MODIFICAR ENTRADA
    public function salida_inventario() {
        $consulta = sprintf
        ("UPDATE entrada SET
            stock = %s
            WHERE
            identrada = %s;", 
            parent::comillas_inteligentes($_POST['stock']),
            parent::comillas_inteligentes($_POST['identrada'])
            );

        $this->mysqli->query($consulta);
        
    }
    
    // TABALA ENTRADA POR ID
    public function entradaPorId($id){
        $consulta = sprintf
        ("SELECT
            salida.idsalida,
            salida.fechas,
            dotacion.nombred,
            salida.talla,
            salida.cantidads,
            personal.nombre,
            ciudad.nombreciudad,
            contrato.nombrecontrato,
            entrada.notas           
            FROM
            salida            
            INNER JOIN dotacion ON entrada.iddotacion = dotacion.iddotacion
            INNER JOIN personal ON entrada.idpersona = personal.idpersona
            INNER JOIN ciudad ON entrada.idciudad = ciudad.idciudad
            INNER JOIN contrato ON entrada.idcontrato = contrato.idcontrato
            WHERE
            salida.idsalida = %s", 
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

    
// INFO TABLA CIUDAD
    class Ciudades extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA DE CIUDAD
        public function ciudades(){
            $resultado = $this->mysqli->query("SELECT * FROM ciudad");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
        }

    }


    

    // INFO TABLA CONTRATOS
    class Contratos extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA DE CONTRATO
        public function Contratos(){
            $resultado = $this->mysqli->query("SELECT * FROM contrato");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
        }



}
?>