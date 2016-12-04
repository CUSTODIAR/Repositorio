<?php
require_once 'conexion.php';


    // CLASE TABLA PERSONAL
    class Personal extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA TABLA PERSONAL
       public function personal(){
            $resultado = $this->mysqli->query
            ("SELECT
                personal.idpersona,
                personal.documento,
                personal.nombre,
                personal.apellido,
                personal.telefono,
                cargos.nombrecargo,
                ciudad.nombreciudad,
                contrato.nombrecontrato
                FROM
                personal            
                INNER JOIN cargos ON personal.idcargo = cargos.idcargo
                INNER JOIN ciudad ON personal.idciudad = ciudad.idciudad
                INNER JOIN contrato ON personal.idcontrato = contrato.idcontrato
            ");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
    }
    
    // AGREGAR PERSONAL
    public function add() {

        $consulta = sprintf(
            "INSERT INTO personal values(null, %s, %s, %s, %s, %s, %s, %s);",  
            parent::comillas_inteligentes($_POST['documento']), 
            parent::comillas_inteligentes($_POST['nombre']), 
            parent::comillas_inteligentes($_POST['apellido']),
            parent::comillas_inteligentes($_POST['telefono']),
            parent::comillas_inteligentes($_POST['cargo']),
            parent::comillas_inteligentes($_POST['ciudad']),
            parent::comillas_inteligentes($_POST['contrato'])
            );
        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_personal.php';</script>";

    }

    // MODIFICAR PERSONAL
    public function update() {

        $consulta = sprintf
        ("UPDATE personal SET
            documento = %s,
            nombre = %s,
            apellido = %s,
            telefono = %s,
            idcargo = %s,
            idciudad = %s,
            idcontrato = %s
            WHERE
            idpersona = %s;", 
            parent::comillas_inteligentes($_POST['documento']), 
            parent::comillas_inteligentes($_POST['nombre']),
            parent::comillas_inteligentes($_POST['apellido']),
            parent::comillas_inteligentes($_POST['telefono']),
            parent::comillas_inteligentes($_POST['cargo']),
            parent::comillas_inteligentes($_POST['ciudad']),
            parent::comillas_inteligentes($_POST['contrato']),
            parent::comillas_inteligentes($_POST['id'])
            );

        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_personal.php';</script>";
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
    public function personalPorId($id){
        $consulta = sprintf
        ("SELECT
            personal.idpersona,
            personal.documento,
            personal.nombre,
            personal.apellido,
            personal.telefono,
            cargos.nombrecargo,
            ciudad.nombreciudad,
            contrato.nombrecontrato
            FROM
            personal            
            INNER JOIN cargos ON personal.idcargo = cargos.idcargo
            INNER JOIN ciudad ON personal.idciudad = ciudad.idciudad
            INNER JOIN contrato ON personal.idcontrato = contrato.idcontrato
            WHERE
            personal.idpersona = %s", 
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


    // INFO TABLA CARGOS
    class Cargos extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA DE CARGO
        public function cargos(){
            $resultado = $this->mysqli->query("SELECT * FROM cargos");

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



// ******************************
// CLASE TABLA CARGOS

class cargo extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    
    // LISTAMOS TODO EL PERSONAL
    
    public function cargo(){
        $resultado = $this->mysqli->query("SELECT
            cargos.idcargo,
            cargos.nombrecargo
            FROM cargos            
            ");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
        
    }

}


    // CLASE TABLA CARGOS
    class Tcargo extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        
        // LISTA CARGOS        
        public function cargo(){
            $resultado = $this->mysqli->query("SELECT
                cargos.idcargo,
                cargos.nombrecargo
                FROM cargos            
                ");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
        }


    // AGREGAR CARGO
    public function add_cargo() {

        $consulta = sprintf(
            "INSERT INTO cargos values(null, %s);",  
            parent::comillas_inteligentes($_POST['nombrecargo'])
            );
        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_opciones.php';</script>";

    }


    // MODIFICAR CARGO
    public function update_cargo() {

        $consulta = sprintf(
            "UPDATE cargos SET
            nombrecargo = %s
            WHERE
            idcargo = %s;", 
            parent::comillas_inteligentes($_POST['nombrecargo']), 
            parent::comillas_inteligentes($_POST['idcargo'])
            );

        $this->mysqli->query($consulta);

        echo "<script type='text/javascript'>window.location='form_opciones.php';</script>";
    }


    // ELIMINAR CARGO
    public function delete_cargo($id) {
        $query = sprintf(
            "DELETE FROM cargos WHERE idcargo = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location:../form_cargo.php");
    }


    // CARGO POR ID
    public function cargoPorId($id){
        $consulta = sprintf("SELECT
            cargo.idcargo,
            cargo.nombrecargo,
            FROM cargo
            WHERE
            cargo.idcargo = %s", 
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


// ******************************
// CLASE TABLA CONTRATO

class contrato extends Conexion {

    public $mysqli;
    public $data;

    public function __construct() {
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    
    // LISTAMOS TODO EL PERSONAL
    
    public function cargo(){
        $resultado = $this->mysqli->query("SELECT
            contrato.idcontrato,
            contrato.nombrecontrato
            FROM contrato            
            ");

        while( $fila = $resultado->fetch_assoc() ){
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data; 
        } 
        
    }

}


// CLASE TABLA CARGOS
    class Tcontrato extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        
        // LISTA CARGOS        
        public function contrato(){
            $resultado = $this->mysqli->query("SELECT
                contrato.idcontrato,
                contrato.nombrecontrato
            FROM contrato            
                ");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
        }


    // AGREGAR CARGO
    public function add_contrato() {

        $consulta = sprintf(
            "INSERT INTO contrato values(null, %s);",  
            parent::comillas_inteligentes($_POST['nombrecontrato'])
            );
        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_opciones.php';</script>";

    }


    // MODIFICAR CARGO
    public function update_contrato() {

        $consulta = sprintf(
            "UPDATE contrato SET
            nombrecontrato = %s
            WHERE
            idcontrato = %s;", 
            parent::comillas_inteligentes($_POST['nombrecontrato']), 
            parent::comillas_inteligentes($_POST['idcontrato'])
            );

        $this->mysqli->query($consulta);

        echo "<script type='text/javascript'>window.location='form_opciones.php';</script>";
    }


    // ELIMINAR CARGO
    public function delete_contrato($id) {
        $query = sprintf(
            "DELETE FROM contrato WHERE idcontrato = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location:../form_contrato.php");
    }


    // CARGO POR ID
    public function contratoPorId($id){
        $consulta = sprintf("SELECT
            contrato.idcontrato,
            contrato.nombrecontrato,
            FROM contrato
            WHERE
            contrato.idcontrato = %s", 
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

    // CLASE TABLA PROVEEDOR
    class Tproveedor extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA TABLA PROVEEDOR
       public function proveedor(){
            $resultado = $this->mysqli->query
            ("SELECT
                proveedor.idproveedor,
                proveedor.nit,
                proveedor.nombrepro,
                proveedor.categoria,
                proveedor.contacto,
                proveedor.cargo,
                proveedor.correo,
                proveedor.telefono,
                proveedor.direccion
                FROM
                proveedor ");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
    }
    
    // AGREGAR PERSONAL
    public function add_proveedor() {

        $consulta = sprintf(
            "INSERT INTO proveedor values(null, %s, %s, %s, %s, %s, %s, %s, %s);",  
            parent::comillas_inteligentes($_POST['nit']),  
            parent::comillas_inteligentes($_POST['nombrepro']),
            parent::comillas_inteligentes($_POST['categoria']),
            parent::comillas_inteligentes($_POST['contacto']),
            parent::comillas_inteligentes($_POST['cargo']),
            parent::comillas_inteligentes($_POST['correo']),
            parent::comillas_inteligentes($_POST['telefono']),
            parent::comillas_inteligentes($_POST['direccion'])
            );
        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_proveedor.php';</script>";

    }

    // MODIFICAR PERSONAL
    public function update_proveedor() {

        $consulta = sprintf
        ("UPDATE proveedor SET
            nit = %s,
            nombrepro = %s,
            categoria = %s,
            contacto = %s,
            cargo = %s,
            correo = %s,
            telefono = %s,
            direccion = %s
            WHERE
            idproveedor = %s;", 
            parent::comillas_inteligentes($_POST['nit']), 
            parent::comillas_inteligentes($_POST['nombrepro']),
            parent::comillas_inteligentes($_POST['categoria']),
            parent::comillas_inteligentes($_POST['contacto']),
            parent::comillas_inteligentes($_POST['cargo']),
            parent::comillas_inteligentes($_POST['correo']),
            parent::comillas_inteligentes($_POST['telefono']),
            parent::comillas_inteligentes($_POST['direccion']),
            parent::comillas_inteligentes($_POST['id'])
            );

        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_proveedor.php';</script>";
    }
    
    // ELIMINAR PROVEEDOR
    public function delete_proveedor($id) {
        $query = sprintf(
            "DELETE FROM proveedor WHERE idproveedor = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ../form_proveedor.php");
    }

    
    // PROVEEDOR POR ID
    public function proveedorPorId($id){
        $consulta = sprintf
        ("SELECT
            proveedor.idproveedor,
            proveedor.nit,
            proveedor.nombrepro,
            proveedor.categoria,
            proveedor.contacto,
            proveedor.cargo,
            proveedor.correo,
            proveedor.telefono,
            proveedor.direccion
            FROM
            proveedor            
            WHERE
            proveedor.idproveedor = %s", 
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

// CLASE TABLA DOTACION
    class Tdotacion extends Conexion {

        public $mysqli;
        public $data;

        public function __construct() {
            $this->mysqli = parent::conectar();
            $this->data = array();
        }

        // LISTA TABLA DOTACION
       public function dotacion(){
            $resultado = $this->mysqli->query
            ("SELECT
                dotacion.iddotacion,
                dotacion.nombred,
                dotacion.estado
                FROM
                dotacion ");

            while( $fila = $resultado->fetch_assoc() ){
                $data[] = $fila;
            }

            if (isset($data)) {
                return $data; 
            } 
            
    }
    
    // AGREGAR DOTACION
    public function add_dotacion() {

        $consulta = sprintf(
            "INSERT INTO dotacion values(null, %s, %s);",  
            parent::comillas_inteligentes($_POST['nombred']), 
            parent::comillas_inteligentes($_POST['estado'])
            );
        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_producto.php';</script>";

    }

    // MODIFICAR DOTACION
    public function update_dotacion() {

        $consulta = sprintf
        ("UPDATE dotacion SET
            nombred = %s,
            estado = %s
            WHERE
            iddotacion = %s;",  
            parent::comillas_inteligentes($_POST['nombred']),
            parent::comillas_inteligentes($_POST['estado']),
            parent::comillas_inteligentes($_POST['iddotacion'])
            );

        $this->mysqli->query($consulta);
        echo "<script type='text/javascript'>window.location='form_producto.php';</script>";
    }
    
    // ELIMINAR DOTACION
    public function delete_dotacion($id) {
        $query = sprintf(
            "DELETE FROM dotacion WHERE iddotacion = %s;", 
            parent::comillas_inteligentes($id)
            );
        $this->mysqli->query($query);
        header("Location: ../form_dotacion.php");
    }

    
    // DOTACION POR ID
    public function dotacionPorId($id){
        $consulta = sprintf
        ("SELECT
            dotacion.iddotacion,
            dotacion.nombred,
            dotacion.estado
            FROM
            dotacion            
            WHERE
            dotacion.iddotacion = %s", 
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

  

?>