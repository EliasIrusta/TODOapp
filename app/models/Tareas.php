<?php

require_once '../app/config/database.php';

class Tarea {
    private $conexion;

    public function __construct() {
        global $conexion;
        $this->conexion = $conexion;
    }

    public function obtenerTareas() {
        $cunsulta = $this->conexion->prepare("SELECT * FROM `tareas` ");
        $cunsulta->execute();
        return $cunsulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarTarea($id) {
        $cunsulta = $this->conexion->prepare("DELETE FROM tareas WHERE tareas_id = :id");
        $cunsulta->execute([':id' => $id]);
    }
    

  }

?>
