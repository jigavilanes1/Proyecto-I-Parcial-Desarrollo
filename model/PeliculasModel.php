<?php
    include_once("../config/Database.php");

    class Peliculas {
        private $id;
        private $nombre;
        private $genero;
        private $duracion;
        private $sinopsis;
        private $trailer;
        private $foto;                
        private $estado;

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

        public function setGenero($_genero) {
            $this->genero = $_genero;
        }
        
        public function getGenero() {
            return $this->genero;
        }

        public function setDuracion($_duracion) {
            $this->duracion = $_duracion;
        }
        
        public function getDuracion() {
            return $this->duracion;
        }

        public function setSinopsis($_sinopsis) {
            $this->sinopsis = $_sinopsis;
        }
        
        public function getSinopsis() {
            return $this->sinopsis;
        }

        public function setTrailer($_trailer) {
            $this->trailer = $_trailer;            
        }

        public function getTrailer() {
            return $this->trailer;
        } 

        public function setFoto($_foto) {
            $this->foto = $_foto;
        }
        
        public function getFoto() {
            return $this->foto;
        }

        public function setEstado($_estado) {
            $this->estado = $_estado;
        }
        
        public function getEstado() {
            return $this->estado;
        }

        public function insertar() {
            $conn = new DataBase();

            $sql = "insert into peliculas(pel_id,pel_nombre,gen_id,pel_duracion,pel_sinopsis,pel_trailer,pel_foto,pel_estado) values (null,?,?,?,?,?,?,?);";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("siissss",$this->nombre,$this->genero,$this->duracion,$this->sinopsis,$this->trailer,$this->foto,$this->estado);
            $stmt->execute();
            $id = $stmt->insert_id;
            return ($id);
        }

        public function actualizar() {
            $conn = new DataBase();
            
            $sql = "update peliculas set pel_nombre = ?,pel_duracion = ?,gen_id = ?,pel_sinopsis = ?,pel_trailer = ?,pel_foto = ? where pel_id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("siisssi",$this->nombre,$this->duracion,$this->genero,$this->sinopsis,$this->trailer,$this->foto,$this->id);
            $stmt->execute();            
        }

        public function eliminar() {
            $conn = new DataBase();
            
            $sql = "update peliculas set pel_estado = 'Inactivo' where pel_id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$this->id);
            $stmt->execute();            
        }

        public function BuscarTodos() {
            $conn = new DataBase();

            $sql = "select p.pel_id, p.pel_nombre, g.gen_nombre, p.pel_duracion, p.pel_sinopsis, p.pel_trailer, p.pel_foto from peliculas p, genero g where p.gen_id = g.gen_id and pel_estado = 'Activo';";
            $stmt = $conn->ms->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();
        }

        public function BuscarPorId() {
            $conn = new DataBase();

            $sql = "select p.pel_id, p.pel_nombre, g.gen_nombre, p.pel_duracion, p.pel_sinopsis, p.pel_trailer, p.pel_foto from peliculas p, genero g where p.gen_id = g.gen_id and pel_id = ?;";            
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$this->id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();            
        }

        public function BuscarRepetido() {
            $conn = new DataBase();

            $sql = "select * from peliculas where pel_nombre = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("s",$this->nombre);
            $stmt->execute();
            $result = $stmt->get_result();   
            while ($row = $result->fetch_assoc()) {    
                if($row != null) {
                    return true;
                }
            }  
        }

        public function Seleccionar() {
            $conn = new DataBase();

            $sql = "select * from peliculas where pel_id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$this->id);
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