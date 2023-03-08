<?php
    include_once("../config/Database.php");

    class Generos {
        private $id;
        private $nombre;                

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

        public function BuscarTodos() {
            $conn = new DataBase();

            $sql = "select * from genero;";
            $stmt = $conn->ms->prepare($sql);            
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();
        }
    }
?>