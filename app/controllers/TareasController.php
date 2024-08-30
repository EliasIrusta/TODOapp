<?php

require_once 'BaseController.php';
require_once '../app/models/Tareas.php';

class TareasController extends BaseController {
    private $modeloTarea;

    public function __construct() {
        $this->modeloTarea = new Tarea();
    }

    public function listartareas() {
        $tareas = $this->modeloTarea->obtenerTareas();
        $this->renderizar('Tareas/index', ['tareas' => $tareas]);
    }

    public function eliminar($id) {
        $this->modeloTarea->eliminarTarea($id); 
        header('Location: /TODOapp/public/index.php');
        exit;
    }

   
}


?>
