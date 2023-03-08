<?php
    include_once("../config/Database.php");

    class Salas {
        private $id;
        private $descripcion;
        private $precio;        

        public function __construct()
        {            
        }

        public function setId($_ID) {
            $this->id = $_ID;
        }
        
        public function getId() {
            return $this->id;
        }
                                       
        public function setDescripcion($_descripcion) {
            $this->descripcion = $_descripcion;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setPrecio($_precio) {
            $this->precio = $_precio;
        }
        
        public function getPrecio() {
            return $this->precio;
        }        

        public function BuscarTodos() {
            $conn = new DataBase();

            $sql = "select * from salas;";
            $stmt = $conn->ms->prepare($sql);            
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();
        }

        public function BuscarPorId() {
            $conn = new DataBase();

            $sql = "select * from salas where sala_id = ?;";
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