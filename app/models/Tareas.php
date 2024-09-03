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

    public function obtenerTareasPorEstado($estadoCompletada) {
        $cunsultaBd = "SELECT * FROM tareas WHERE tarea_eliminada = 0 AND tarea_completada = :estado";
        $estado = [':estado' => $estadoCompletada];
           
        $cunsultaBd .= " ORDER BY tarea_vencimiento ASC";
    
        $cunsulta = $this->conexion->prepare($cunsultaBd);
        $cunsulta->execute($estado);
    
        return $cunsulta->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function buscarTareasPorTitulo($buscar) {
        $consultaBd = "SELECT * FROM tareas WHERE tarea_eliminada = 0 AND tareas_titulo LIKE :buscar ORDER BY tarea_vencimiento ASC";
        $buscar = [':buscar' => '%' . $buscar . '%'];
    
        $consulta = $this->conexion->prepare($consultaBd);
        $consulta->execute($buscar);
    
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function actualizarEstadoCompletada($id, $completada) {
        $cunsulta = $this->conexion->prepare("UPDATE tareas SET tarea_completada = :completada WHERE tareas_id = :id");
        $cunsulta->execute([':completada' => $completada, ':id' => $id]);
    }
        

    public function eliminarTarea($id) {
        $cunsulta = $this->conexion->prepare("DELETE FROM tareas WHERE tareas_id = :id");
        $cunsulta->execute([':id' => $id]);
    }
    
    public function obtenerTareaPorId($id) {
        $cunsulta = $this->conexion->prepare("SELECT * FROM tareas WHERE tareas_id = :id");
        $cunsulta->execute([':id' => $id]);
        return $cunsulta->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarTarea($id, $titulo, $descripcion, $vencimiento) {
        $cunsulta = $this->conexion->prepare("UPDATE tareas SET tareas_titulo = :titulo, tareas_descripcion = :descripcion, tarea_vencimiento = :vencimiento WHERE tareas_id = :id");
        $cunsulta->execute([
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':vencimiento' => $vencimiento,
            ':id' => $id,
        ]);
    }

  }

?>
