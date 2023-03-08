<?php
    include_once("../config/Database.php");

    class Compras {
        private $id;
        private $sala;
        private $horario;
        private $cantidad;
        private $total;
        private $pelId;
        private $usuId;        

        public function __construct()
        {            
        }

        public function setId($_ID) {
            $this->id = $_ID;
        }
        
        public function getId() {
            return $this->id;
        }
        
        public function setSala($_sala) {
            $this->sala = $_sala;            
        }

        public function getSala() {
            return $this->sala;
        }                        

        public function setHorario($_horario) {
            $this->horario = $_horario;
        }
        
        public function getHorario() {
            return $this->horario;
        }

        public function setCantidad($_cantidad) {
            $this->cantidad = $_cantidad;
        }
        
        public function getCantidad() {
            return $this->cantidad;
        }

        public function setTotal($_total) {
            $this->total = $_total;
        }
        
        public function getTotal() {
            return $this->total;
        }

        public function setPelId($_pelId) {
            $this->pelId = $_pelId;            
        }

        public function getPelId() {
            return $this->pelId;
        } 

        public function setUsuId($_usuId) {
            $this->usuId = $_usuId;            
        }

        public function getUsuId() {
            return $this->usuId;
        } 

        public function insertar() {
            $conn = new DataBase();

            $sql = "insert into compras(comp_id,sala_id,comp_horario,comp_cantidad,comp_total,pel_id,usu_id) values (null,?,?,?,?,?,?);";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("isidii",$this->sala,$this->horario,$this->cantidad,$this->total,$this->pelId,$this->usuId);
            $stmt->execute();
            $id = $stmt->insert_id;
            return ($id);
        }

        public function BuscarTodos() {
            $conn = new DataBase();

            $sql = "select c.comp_id, u.usu_nombre, u.usu_email, p.pel_nombre, c.comp_horario, s.sala_descripcion, c.comp_cantidad, c.comp_total from compras c, peliculas p, salas s, usuarios u where c.pel_id = p.pel_id and c.usu_id = u.usu_id and c.sala_id = s.sala_id;";
            $stmt = $conn->ms->prepare($sql);            
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();
        }

        public function BuscarCompraUsuario() {
            $conn = new DataBase();

            $sql = "select c.comp_id, u.usu_nombre, u.usu_email, p.pel_nombre, c.comp_horario, s.sala_descripcion, c.comp_cantidad, c.comp_total from compras c, peliculas p, salas s, usuarios u where c.pel_id = p.pel_id and c.usu_id = u.usu_id and c.sala_id = s.sala_id and c.usu_id = ?;";
            $stmt = $conn->ms->prepare($sql);
            $stmt->bind_param("i",$this->usuId);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all();
        }
    }
?>