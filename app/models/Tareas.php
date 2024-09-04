<?php

require_once '../app/config/database.php';

class Tarea
{
    private $conexion;

    public function __construct()
    {
        global $conexion;
        $this->conexion = $conexion;
    }

    public function crearTarea($titulo, $descripcion, $fechaVencimiento)
    {
        $consulta = $this->conexion->prepare("
        INSERT INTO tareas (tareas_titulo, tareas_descripcion, tarea_vencimiento, tareas_creacion, tarea_completada, tarea_eliminada)
        VALUES (:titulo, :descripcion, :vencimiento, NOW(), false, false)
    ");
        $consulta->execute([
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':vencimiento' => $fechaVencimiento
        ]);
    }

    public function modificarTarea($id, $titulo, $descripcion, $fechaVencimiento)
    {
        $consulta = $this->conexion->prepare("
            UPDATE tareas
            SET tareas_titulo = :titulo, tareas_descripcion = :descripcion, tarea_vencimiento = :vencimiento
            WHERE tareas_id = :id
        ");
        $consulta->execute([
            ':id' => $id,
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':vencimiento' => $fechaVencimiento
        ]);
    }

    public function obtenerTareas()
    {
        $consulta = $this->conexion->prepare("SELECT * FROM `tareas` ");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }       

    public function obtenerTareasPorEstado($estadoCompletada) {
        $consultaBd = "SELECT * FROM tareas WHERE tarea_eliminada = 0 AND tarea_completada = :estado";
        $estado = [':estado' => $estadoCompletada];
        
        $consultaBd .= " ORDER BY tarea_vencimiento ASC";
    
        $consulta = $this->conexion->prepare($consultaBd);
        $consulta->execute($estado);
    
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function buscarTareasPorTitulo($buscar) {
        $consultaBd = "SELECT * FROM tareas WHERE tarea_eliminada = 0 AND tareas_titulo LIKE :buscar ORDER BY tarea_vencimiento ASC";
        $buscar = [':buscar' => '%' . $buscar . '%'];
    
        $consulta = $this->conexion->prepare($consultaBd);
        $consulta->execute($buscar);
    
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function actualizarEstadoCompletada($id, $completada) {
        $consulta = $this->conexion->prepare("UPDATE tareas SET tarea_completada = :completada WHERE tareas_id = :id");
        $consulta->execute([':completada' => $completada, ':id' => $id]);
    }
        

    public function eliminarTarea($id) {
        $consulta = $this->conexion->prepare("DELETE FROM tareas WHERE tareas_id = :id");
        $consulta->execute([':id' => $id]);
    }
    
    public function obtenerTareaPorId($id) {
        $consulta = $this->conexion->prepare("SELECT * FROM tareas WHERE tareas_id = :id");
        $consulta->execute([':id' => $id]);
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarTarea($id, $titulo, $descripcion, $vencimiento) {
        $consulta = $this->conexion->prepare("UPDATE tareas SET tareas_titulo = :titulo, tareas_descripcion = :descripcion, tarea_vencimiento = :vencimiento WHERE tareas_id = :id");
        $consulta->execute([
            ':titulo' => $titulo,
            ':descripcion' => $descripcion,
            ':vencimiento' => $vencimiento,
            ':id' => $id,
        ]);
    }
}

?>
