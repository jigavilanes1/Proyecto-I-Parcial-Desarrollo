<?php
    include_once("../config/Database.php");

    class Usuarios {
        private $id;
        private $nombre;
        private $usuario;
        private $password;
        private $cedula;
        private $email;
        private $genero;
        private $tipo;
        private $estado;
        private $compPeli;

        public function __construct()
        {            
        }

        public function setId($_ID) {
            $this->id = $_ID;
        }
        
        public function getId() {
            return $this->id;
        }
        
        public function setNombre($_nombre) {
            $this->nombre = $_nombre;            
        }

        public function getNombre() {
            return $this->nombre;
        }
                
        public function setUsuario($_usuario) {
            $this->usuario = $_usuario;
        }
        
        public function getUsuario() {
            return $this->usuario;
        }        

        public function setPassword($_password) {
            $this->password = $_password;
        }
        
        public function getPassword() {
            return $this->password;
        }

        public function setCedula($_cedula) {
            $this->cedula = $_cedula;
        }
        
        public function getCedula() {
            return $this->cedula;
        }

        public function setEmail($_email) {
            $this->email = $_email;
        }
        
        public function getEmail() {
            return $this->email;
        }

        public function setGenero($_genero) {
            $this->genero = $_genero;
        }
        
        public function getGenero() {
            return $this->genero;
        }

        public function setTipo($_tipo) {
            $this->tipo = $_tipo;
        }
        
        public function getTipo() {
            return $this->tipo;
        }

        public function setEstado($_estado) {
            $this->estado = $_estado;
        }
        
        public function getEstado() {
            return $this->estado;
        }

        public function setCompPeli($_compPeli) {
            $this->compPeli = $_compPeli;
        }
        
        public function getCompPeli() {
            return $this->compPeli;
        } 

        public function insertar() {
            $conn = new DataBase();

            $sql = "insert into usuarios(usu_id,usu_nombre,usu_user,usu_password,usu_cedula,usu_email,usu_genero,usu_tipo,usu_estado) values (null,?,?,?,?,?,?,?,?);";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("ssssssis",$this->nombre,$this->usuario,$this->password,$this->cedula,$this->email,$this->genero,$this->tipo,$this->estado);
            $stmt->execute();
            $id = $stmt->insert_id;
            return ($id);
        }

        public function actualizar() {
            $conn = new DataBase();
            
            $sql = "update usuarios set usu_nombre = ?,usu_user = ?,usu_cedula = ?,usu_email = ?,usu_genero = ? where usu_id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("sssssi",$this->nombre,$this->usuario,$this->cedula,$this->email,$this->genero,$this->id);
            $stmt->execute();            
        }

        public function eliminar() {
            $conn = new DataBase();
            
            $sql = "update usuarios set usu_estado = 'Inactivo' where usu_id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$this->id);
            $stmt->execute();            
        }

        public function BuscarTodos($i) {
            $conn = new DataBase();

            $sql = "select * from usuarios where usu_estado = 'Activo' and usu_tipo =". $i .";";
            $stmt = $conn->ms->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();
        }

        public function BuscarPorId() {
            $conn = new DataBase();

            $sql = "select * from usuarios where usu_id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$this->id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();            
        }

        public function Login($i) {
            $conn = new DataBase();

            $sql = "select * from usuarios where usu_user = ? and usu_password = ? and usu_estado = 'Activo' and usu_tipo =". $i .";";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("ss",$this->usuario,$this->password);
            $stmt->execute();
            $result = $stmt->get_result();            
            while ($row = $result->fetch_assoc()) {                
                if($row != null) {
                    return true;
                }
            }            
        }

        public function BuscarRepetido() {
            $conn = new DataBase();

            $sql = "select * from usuarios where usu_user = ? or usu_cedula = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("ss",$this->usuario,$this->cedula);
            $stmt->execute();
            $result = $stmt->get_result();   
            while ($row = $result->fetch_assoc()) {    
                if($row != null) {
                    return true;
                }
            }  
        }

        public function BuscarPorUsuario() {
            $conn = new DataBase();

            $sql = "select * from usuarios where usu_user = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("s",$this->usuario);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();            
        }

        public function Seleccionar() {
            $conn = new DataBase();

            $sql = "select * from usuarios u, peliculas p where u.usu_id = ? and p.pel_id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("ii",$this->id,$this->compPeli);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return json_encode($data);
        }
    }
?>